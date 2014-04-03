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




	public function index() {
	$this->layout='uploadplugin/upload';
	echo 'upload is ready';
	
	}
	
	public function uploadhandler() {
	$this->layout='ajax';
	
	}
	
	
	

}