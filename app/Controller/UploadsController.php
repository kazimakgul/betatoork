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




	public function index($uploadtype=avatarimage,$id=NULL) {
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
	
	public function set_image($id=35,$name='mervesez.jpg') {
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	$this->layout='ajax';

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