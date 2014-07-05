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
    
    //=====Kullanici sisteme login ise=======
    public function isAuthorized($user) {
        if (parent::isAuthorized($user)) {
            return true;
        }

        //permissons for logged in users
        if (in_array($this->action, array('images','games','index'))) {
           return true;
        }


        //Edit yaparken duzenle
        if (in_array($this->action, array('edit2', 'delete'))) {
            $gameId = $this->request->params['pass'][0];
            return $this->Game->isOwnedBy($gameId, $user['id']);
        }

        return false;
    }




	public function index($uploadtype='avatar_image',$id=NULL) {
	$this->layout='uploadplugin/upload';
	//echo 'upload is ready';

	   if($uploadtype=='avatar_image')
       {//User need to be logged in.COndition ekle!!!
	      $this->set('gallery','Avatar resimleri için galery içerigi');
	      $this->set('uploadtype',$uploadtype);
	      $this->set('id',$id);
		  
		    /**
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
			 */ 
	   
	   
	   }elseif($uploadtype=='cover_image'){
	   
	   $this->set('gallery','Cover resimleri için galery içerigi');
	   $this->set('uploadtype',$uploadtype);
	   $this->set('id',$id);
	   
	   /**
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
		 */

	   }elseif($uploadtype=='game_image'){
	   
	   $this->set('gallery',0);
	   $this->set('uploadtype',$uploadtype);
	   $this->set('id',$id);
	   
	   /**
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
		 */
	   }elseif($uploadtype=='bg_image'){
	   
	   $this->set('gallery','Background resimleri için galery içerigi');
	   $this->set('uploadtype',$uploadtype);
	   $this->set('id',$id);
	   
	   /**
	     //get background photos from S3 begins
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
		 //get background photos from S3 ends
		 
		 //get background gallery from S3 begins
	     $prefix = 'upload/gallery/backgrounds';
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
		 //get background gallery from S3 ends
		 */
		 
	   } 
	
	}

	public function games($uploadtype='game_upload',$id=NULL) {
	$this->layout='uploadplugin/upload';
	$this->set('uploadtype',$uploadtype);
	$this->set('id',$id);
	
	}
	
	
	public function images($uploadtype='new_game',$id=NULL) {
	$this->layout='uploadplugin/upload';
	$this->set('uploadtype',$uploadtype);
	$this->set('id',$id);
	}
	
	
	public function uploadhandler() {
	$this->layout='ajax';
	
	}


	public function apply_file($uploadtype=NULL,$name=NULL,$id=NULL,$loadfrom=NULL)
	{
		//Guvenlik onlemleri eklenecek.User login mi yada login olan user in yetkileri nelerdir etc...
	Configure::write ( 'debug', 0 );
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');

    $uploadtype=$this->request->data['uploadtype'];
	$name=$this->request->data['name'];
	$id=$this->request->data['id'];
	$loadfrom=$this->request->data['from'];
	$image_patch=$this->request->data['image'];


    if($uploadtype=='game_upload')
	{
	   $file = new File(WWW_ROOT ."/upload/users/".$id."/".$name,false);
	   $info=$file->info();
	   $filename=$info["filename"];
	   $ext=$info["extension"];
	   $basename=$info["basename"];
	   $dirname=$info["dirname"];	
       $msg = array("title" => 'Game has been saved on s3 from game upload.'.$uploadtype.$id.$basename,'result' => 1,'newlink'=>'Game link by game upload');
	}elseif($uploadtype=='new_game'){
	   $file = new File(WWW_ROOT ."/upload/temperory/".$id."/".$name,false);
	   $info=$file->info();
	   $filename=$info["filename"];
	   $ext=$info["extension"];
	   $basename=$info["basename"];
	   $dirname=$info["dirname"];	
       $msg = array("title" => 'Game has been saved on s3 from game image upload.','result' => 1,'newlink'=>$image_patch);
	}


    $this->set('rtdata', $msg);
    $this->set('_serialize', array('rtdata'));
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
  {//Auth Control Begins
	
	//Permissions for avatar and cover upload
	if($uploadtype=='avatar_image' || $uploadtype=='cover_image' || $uploadtype=='bg_image')
	{
	  //If user is not admin or something like that.Cannot edit images of another person.Just admin can do this.(Avatar&Cover)
	  if(!$this->User->isAdmin($auth_id) && !$this->User->isOwnedBy($auth_id,$id))
	  {
	  $uploadtype='forbidden';
	  }
	}elseif($uploadtype=='game_image'){
	  //If user is not admin or something like that.Cannot edit images of another person.Just admin can do this.(Games)
	  if(!$this->User->isAdmin($auth_id) && !$this->Game->isOwnedBy($id,$auth_id))
	  {
	  $uploadtype='forbidden';
	  }
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
       $msg = array("title" => 'Cover image has been saved on s3 by gallery.','result' => 1,'newlink'=>$newurl);
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
	//Load Game Image From Photos begins
	
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
	//Load Game Image From Photos ends
	}elseif($uploadtype=='bg_image' && $loadfrom=='upload'){
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
	   $this->User->query('UPDATE users SET bg_image="'.$newname.'" WHERE id='.$id);	
       $msg = array("title" => 'Image has been saved on s3 as background by upload.'.$id.$name.$newname,'result' => 1,'newlink'=>$newurl);
	   }else{
	   $msg = array("title" => $uploadtype.$name.$id.'newurl:'.$newurl.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
	   }
	
	//Load Cover From Upload ends
	}elseif($uploadtype=='forbidden'){
	//Restricted Area Begins
	$msg = array("title" => 'You can only edit your own images!','result' => 0);
	//Restricted Area Ends
	}
	
  }else{//Auth Control Ends
  $msg = array("title" => 'You have to be logged in!','result' => 0);
  }	   
  
  //Geçici olarak yaratılan klasörü siler.
  $this->remove_temporary($id,$uploadtype);

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