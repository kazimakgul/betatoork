<?php

/**
 * Games Controller
 *
 * @property Game $Game
 */
class MessagesController extends AppController {

	public $name = 'Messages';
	var $uses = array('Message','User','Favorite','Subscription','Playcount','Rate','Userstat','Category');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha','Facebook.Facebook');
    public $components = array('Amazonsdk.Amazon','Recaptcha.Recaptcha');
    

	
	public function index() {

	
	print_r($this->Message->find('all',array('limit'=>5)));


             }

}
