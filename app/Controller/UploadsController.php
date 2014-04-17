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
	   if(1)
       {//User need to be logged in.COndition ekle!!!
	
	   
	   $this->set('uploadtype',$uploadtype);
	   $this->set('id',$id);
	   } 
	
	}
	
	
	public function uploadhandler() {
	$this->layout='ajax';
	
	}
	
	
	public function set_as($uploadtype=NULL,$name=NULL,$id=NULL)
	{
	Configure::write ( 'debug', 0 );
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
	$uploadtype=$this->request->data['uploadtype'];
	$name=$this->request->data['name'];
	$id=$this->request->data['id'];
	
	
	//Throw to S3 begins
	if($uploadtype=='avatar_image')
	{
	//s3 fuctions begins here
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
	}
	//Throw to S3 ends
	
	if($feedback)
	{
	//Set the picture field on db.
	//remove related id folder from users folder.
	$newurl=Configure::read('S3.url').'/upload/users/'.$id.'/'.$name;
	$this->User->query('UPDATE users SET picture="'.$basename.'" WHERE id='.$id);	
    $msg = array("title" => 'Image has been saved on s3.','result' => 1,'newlink'=>'bu yeni bir linktir');
	}else{
	$msg = array("title" => $uploadtype.$name.$id.'bu bir basliktir.'.$newname.'has been changed','result' => 0);
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