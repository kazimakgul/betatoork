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
			  
	   
	   
	   }elseif($uploadtype=='cover_image'){
	   
	   $this->set('gallery','Cover resimleri için galery içerigi');
	   $this->set('uploadtype',$uploadtype);
	   $this->set('id',$id);
	   
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
	
	//Load Avatar From Upload begins
	if($uploadtype=='avatar_image' && $loadfrom='upload')
	{
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
	}elseif($uploadtype=='avatar_image' && $loadfrom='gallery'){
	//Load Avatar From Gallery begins
	
	
	 $image_patch=$image_patch;
	 $basename = basename($image_patch);
	
	
	//Load Avatar From Photos ends
	}elseif($uploadtype=='avatar_image' && $loadfrom='photos'){
	//Load Avatar From Gallery begins
	
	
	//Load Avatar From Photos ends
	}
	
       $this->set('rtdata', $msg);
       $this->set('_serialize', array('rtdata'));
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