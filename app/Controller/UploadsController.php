<?php
App::uses('AppController', 'Controller');
/**
 * Wallentries Controller
 *
 * @property Wallentry $Wallentry
 */
class UploadsController extends AppController {
    
	public $name = 'Uploads';
    var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Category','Order');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha');
    public $components = array('Amazonsdk.Amazon','Recaptcha.Recaptcha','Logger');
/**
 * index method
 *
 * @return void
 */




	public function index($uploadtype='avatar_image',$id=NULL) {
	$this->layout='uploadplugin/upload';
	//echo 'upload is ready';
	//Kullanici yalnizca kendi idsinde degisiklik yaparken admin herkes için yapabilmeli.Güvenlik önlemi Al!!!
	   if($uploadtype=='avatar_image')
       {//User need to be logged in.COndition ekle!!!
	      $this->set('gallery','Avatar resimleri için galery içerigi');
	      $this->set('uploadtype',$uploadtype);
	      $this->set('id',$id);
		  
		      //get avatar gallery from S3 begins
			  $prefix = 'upload/gallery/avatars';
              $opt = array(
              'prefix' => $prefix,
              );
			  $bucket=Configure::read('S3.name');
			  $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
			  foreach($objs as $key => $obj)
			  {
			  if(substr($obj, -1)=="/")
			  unset($objs[$key]);
			  }
			  $this->set('gallery',$objs);
			  //get avatar gallery from S3 ends

			  //get avatar gallery from S3 by id begins
			  $prefix = 'upload/users/'.$id;
              $opt = array(
              'prefix' => $prefix,
              );
			  $bucket=Configure::read('S3.name');
			  $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
			  foreach($objs as $key => $obj)
			  {
			  if(substr($obj, -1)=="/")
			  unset($objs[$key]);
			  }
			  $this->set('photos',$objs);
			  //get avatar gallery from S3 by id ends
			  
	   
	   
	   }elseif($uploadtype=='cover_image'){
	   
	   $this->set('gallery','Cover resimleri için galery içerigi');
	   $this->set('uploadtype',$uploadtype);
	   $this->set('id',$id);
	   
	   
	     //get cover photos from S3 begins
	     $prefix = 'upload/users/'.$id;
         $opt = array(
         'prefix' => $prefix,
         );
	     $bucket=Configure::read('S3.name');
	     $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
		 foreach($objs as $key => $obj)
		 {
		 if(substr($obj, -1)=="/")
		 unset($objs[$key]);
		 }
	     $this->set('photos',$objs);
		 //get cover photos from S3 ends
		 
		 //get cover gallery from S3 begins
	     $prefix = 'upload/gallery/covers';
         $opt = array(
         'prefix' => $prefix,
         );
	     $bucket=Configure::read('S3.name');
	     $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
		 foreach($objs as $key => $obj)
		 {
		 if(substr($obj, -1)=="/")
		 unset($objs[$key]);
		 }
	     $this->set('gallery',$objs);
		 //get cover gallery from S3 ends
		 
	   }elseif($uploadtype=='game_image'){
	   
	   $this->set('gallery',0);
	   $this->set('uploadtype',$uploadtype);
	   $this->set('id',$id);
	   
	     //get cover photos from S3 begins
	     $prefix = 'upload/games/'.$id;
         $opt = array(
         'prefix' => $prefix,
         );
	     $bucket=Configure::read('S3.name');
	     $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
		 foreach($objs as $key => $obj)
		 {
		 if(substr($obj, -1)=="/")
		 unset($objs[$key]);
		 }
	     $this->set('photos',$objs);
		 //get cover photos from S3 ends
	   } 
	
	}
	
	
	public function uploadhandler() {
	$this->layout='ajax';
	
	}
	
	
	public function set_as($uploadtype=NULL,$name=NULL,$id=NULL,$loadfrom=NULL)
	{
	Configure::write ( 'debug', 0 );
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
	$uploadtype=$this->request->data['uploadtype'];
	$name=$this->request->data['name'];
	$id=$this->request->data['id'];
	$loadfrom=$this->request->data['from'];
	$image_patch=$this->request->data['image'];
	
  if($auth_id=$this->Auth->user('id'))
  {//Auth Control Ends
	
	//Permissions for avatar and cover upload
	if($uploadtype=='avatar_image' || $uploadtype=='cover_image')
	{
	  //If user is not admin or something like that.Cannot edit images of another person.Just admin can do this.
	  if(!$this->User->isAdmin($auth_id) && !$this->User->isOwnedBy($auth_id,$id))
	  {
	  $msg = array("title" => 'You are not admin!You cannot edit images of another users!','result' => 0,'newlink'=>'empty url');
	  $this->set('rtdata', $msg);
      $this->set('_serialize', array('rtdata'));
      break;
	  }
	}elseif($uploadtype=='game_image'){
	//check something
	}
	
	
	if($uploadtype=='avatar_image' && $loadfrom=='upload')
	{//Load Avatar From Upload begins
	   $file = new File(WWW_ROOT ."/upload/users/".$id."/".$name,false);
	   $info=$file->info();

	   $filename=$info["filename"];
	   $ext=$info["extension"];
	   $basename=$info["basename"];
	   $dirname=$info["dirname"];
	   $newname=$filename.'_original.'.$ext;
	   rename(WWW_ROOT ."/upload/users/".$id."/".$name, WWW_ROOT ."/upload/users/".$id."/".$newname);
	
	        //Upload to aws begins
			$feedback=$this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/users/'.$id."/".$newname,
             array(
            'fileUpload' => WWW_ROOT ."/upload/users/".$id."/".$newname,
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			//Upload to aws ends
	   //s3 fuctions ends here
	
	   if($feedback)
	   {
	   //Set the picture field on db.
	   //remove related id folder from users folder.
	   $newurl=Configure::read('S3.url').'/upload/users/'.$id.'/'.$newname;
	   $this->User->query('UPDATE users SET picture="'.$basename.'" WHERE id='.$id);	
       $msg = array("title" => 'Image has been saved on s3.','result' => 1,'newlink'=>$newurl);
	   }else{
	   $msg = array("title" => $uploadtype.$name.$id.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
	   }
    //Load Avatar From Upload ends
	}elseif($uploadtype=='avatar_image' && $loadfrom=='gallery'){
	//Load Avatar From Gallery begins

	 $basename = basename($image_patch);
	 //http://docs.aws.amazon.com/AWSSDKforPHP/latest/index.html#m=AmazonS3/copy_object

	 $noextension=rtrim($basename, '.'.$this->getExtension($basename));
	 $yesextension=$noextension.'_original.'.$this->getExtension($basename);

      //Upload to aws begins
      $feedback=$this->Amazon->S3->copy_object(
     array('bucket'=>Configure::read('S3.name'),'filename'=>'upload/gallery/avatars/'.$basename),
     array('bucket'=>Configure::read('S3.name'),'filename'=>'upload/users/'.$id.'/'.$yesextension),
     array( // Optional parameters
        'acl'  => AmazonS3::ACL_PUBLIC
    )
      );
      //Upload to aws ends


	   if($feedback)
	   {
	   //Set the picture field on db.
	   //remove related id folder from users folder.
	   $newurl=Configure::read('S3.url').'/upload/users/'.$id.'/'.$yesextension;
	   $this->User->query('UPDATE users SET picture="'.$basename.'" WHERE id='.$id);	
       $msg = array("title" => 'Image has been saved on s3.','result' => 1,'newlink'=>$newurl);
	   }else{
	   $msg = array("title" => $uploadtype.$name.$id.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
	   }

	//Load Avatar From Gallery ends
	}elseif($uploadtype=='avatar_image' && $loadfrom=='photos'){
	//Load Avatar From Photos begins
	$basename = basename($image_patch);
    $noextension=rtrim($basename, '.'.$this->getExtension($basename));
    $noextension=substr($noextension, 0, -9);
	$yesextension=$noextension.'.'.$this->getExtension($basename);
	
	if($basename)
	{
	//Set the picture field on db.
	//remove related id folder from users folder.
	$newurl=Configure::read('S3.url').'/upload/users/'.$id.'/'.$basename;
	$this->User->query('UPDATE users SET picture="'.$yesextension.'" WHERE id='.$id);	
    $msg = array("title" => 'Image has been saved on s3.','result' => 1,'newlink'=>$newurl);
	}else{
	$msg = array("title" => $uploadtype.$name.$id.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
	}
	//Load Avatar From Photos ends
	}elseif($uploadtype=='cover_image' && $loadfrom=='upload'){
	//Load Cover From Upload begins
	
	 $file = new File(WWW_ROOT ."/upload/users/".$id."/".$name,false);
	   $info=$file->info();

	   $filename=$info["filename"];
	   $ext=$info["extension"];
	   $basename=$info["basename"];
	   $dirname=$info["dirname"];
	   $newname=$filename.'_original.'.$ext;
	   rename(WWW_ROOT ."/upload/users/".$id."/".$name, WWW_ROOT ."/upload/users/".$id."/".$newname);
	
	        //Upload to aws begins
			$feedback=$this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/users/'.$id."/".$newname,
             array(
            'fileUpload' => WWW_ROOT ."/upload/users/".$id."/".$newname,
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			//Upload to aws ends
	   //s3 fuctions ends here
	
	   if($feedback)
	   {
	   //Set the picture field on db.
	   //remove related id folder from users folder.
	   $newurl=Configure::read('S3.url').'/upload/users/'.$id.'/'.$newname;
	   $this->User->query('UPDATE users SET banner="'.$newname.'" WHERE id='.$id);	
       $msg = array("title" => 'Image has been saved on s3 as cover by upload.'.$id.$name.$newname,'result' => 1,'newlink'=>$newurl);
	   }else{
	   $msg = array("title" => $uploadtype.$name.$id.'newurl:'.$newurl.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
	   }
	
	//Load Cover From Upload ends
	}elseif($uploadtype=='cover_image' && $loadfrom=='gallery'){
	//Load Cover From Gallery begins
	
	$basename = basename($image_patch);

	 $noextension=rtrim($basename, '.'.$this->getExtension($basename));
	 $yesextension=$noextension.'_original.'.$this->getExtension($basename);

      //Upload to aws begins
      $feedback=$this->Amazon->S3->copy_object(
     array('bucket'=>Configure::read('S3.name'),'filename'=>'upload/gallery/covers/'.$basename),
     array('bucket'=>Configure::read('S3.name'),'filename'=>'upload/users/'.$id.'/'.$yesextension),
     array( // Optional parameters
        'acl'  => AmazonS3::ACL_PUBLIC
    )
      );
      //Upload to aws ends


	   if($feedback)
	   {
	   //Set the picture field on db.
	   //remove related id folder from users folder.
	   $newurl=Configure::read('S3.url').'/upload/users/'.$id.'/'.$yesextension;
	   $this->User->query('UPDATE users SET banner="'.$yesextension.'" WHERE id='.$id);	
       $msg = array("title" => 'Image has been saved on s3 by cover.','result' => 1,'newlink'=>$newurl);
	   }else{
	   $msg = array("title" => $uploadtype.$name.$id.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
	   }

	
	//Load Cover From Gallery ends
	}elseif($uploadtype=='cover_image' && $loadfrom=='photos'){
	//Load Cover From Photos begins
	$basename = basename($image_patch);
    //$noextension=rtrim($basename, '.'.$this->getExtension($basename));
    //$noextension=substr($noextension, 0, -9);
	//$yesextension=$noextension.'.'.$this->getExtension($basename);
	
	if($basename)
	{
	//Set the picture field on db.
	//remove related id folder from users folder.
	$newurl=Configure::read('S3.url').'/upload/users/'.$id.'/'.$basename;
	$this->User->query('UPDATE users SET banner="'.$basename.'" WHERE id='.$id);	
    $msg = array("title" => 'Image has been saved on s3 by photos.','result' => 1,'newlink'=>$newurl);
	}else{
	$msg = array("title" => $uploadtype.$name.$id.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
	}
	//Load Cover From Photos ends
	}elseif($uploadtype=='game_image' && $loadfrom=='upload'){
	//Load Game Image From Upload begins
	
	$file = new File(WWW_ROOT ."/upload/games/".$id."/".$name,false);
	   $info=$file->info();

	   $filename=$info["filename"];
	   $ext=$info["extension"];
	   $basename=$info["basename"];
	   $dirname=$info["dirname"];
	   $newname=$filename.'_toorksize.'.$ext;
	   rename(WWW_ROOT ."/upload/games/".$id."/".$name, WWW_ROOT ."/upload/games/".$id."/".$newname);
	
	        //Upload to aws begins
			$feedback=$this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/games/'.$id."/".$newname,
             array(
            'fileUpload' => WWW_ROOT ."/upload/games/".$id."/".$newname,
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			//Upload to aws ends
	   //s3 fuctions ends here
	
	   if($feedback)
	   {
	   //Set the picture field on db.
	   //remove related id folder from users folder.
	   $newurl=Configure::read('S3.url').'/upload/games/'.$id.'/'.$newname;
	   $this->User->query('UPDATE games SET picture="'.$basename.'" WHERE id='.$id);	
       $msg = array("title" => 'Image has been saved on s3 as game by upload.'.$id.$name.$newname,'result' => 1,'newlink'=>$newurl);
	   }else{
	   $msg = array("title" => $uploadtype.$name.$id.'newurl:'.$newurl.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
	   }
	
	//Load Game Image From Upload ends
	}elseif($uploadtype=='game_image' && $loadfrom=='photos'){
	//Load Game Image From Upload begins
	
	$basename = basename($image_patch);
    $noextension=rtrim($basename, '.'.$this->getExtension($basename));
    $noextension=substr($noextension, 0, -10);
	$yesextension=$noextension.'.'.$this->getExtension($basename);
	
	if($basename)
	{
	//Set the picture field on db.
	//remove related id folder from users folder.
	$newurl=Configure::read('S3.url').'/upload/games/'.$id.'/'.$basename;
	$this->User->query('UPDATE games SET picture="'.$yesextension.'" WHERE id='.$id);	
    $msg = array("title" => 'Game image has been saved on s3 by photos.','result' => 1,'newlink'=>$newurl);
	}else{
	$msg = array("title" => $uploadtype.$name.$id.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
	}

	
	//Load Game Image From Upload ends
	}
	   
  }else{//Auth Control Ends
  $msg = array("title" => 'You have to be logged in!','result' => 0);
  }	   
  
  $this->set('rtdata', $msg);
  $this->set('_serialize', array('rtdata'));
	}//End of function
	

function getExtension($str) {
     $i = strrpos($str,".");
     if (!$i) { return ""; }
     $l = strlen($str) - $i;
     $ext = substr($str,$i+1,$l);
     return $ext;
   }

	
	public function set_image($id=35,$name='mervesez.jpg') {
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	$this->layout='ajax';
	
	echo 'id:'.$id.'<br>';
	echo 'name:'.$name.'<br>';

	$file = new File(WWW_ROOT ."/upload/users/".$id."/".$name,false);
	$info=$file->info();
	//print_r($info);
	$filename=$info["filename"];
	$ext=$info["extension"];
	$basename=$info["basename"];
	$dirname=$info["dirname"];
	$newname=$filename.'_original.'.$ext;
	rename(WWW_ROOT ."/upload/users/".$id."/".$name, WWW_ROOT ."/upload/users/".$id."/".$newname);
	echo 'name is changed'.$newname;
	
	        //Upload to aws begins
			$this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/users/'.$id."/".$newname,
             array(
            'fileUpload' => WWW_ROOT ."/upload/users/".$id."/".$newname,
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			//Upload to aws ends
	echo 'sent to s3';
	
	}
	
	
	
	

}