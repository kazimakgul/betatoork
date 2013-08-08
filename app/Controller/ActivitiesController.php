<?php
App::uses('AppController', 'Controller');
/**
 * Wallentries Controller
 *
 * @property Wallentry $Wallentry
 */
class ActivitiesController extends AppController {
    
	public $name = 'Activities';
    var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Category','Activity');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha','Facebook.Facebook');
    public $components = array('Amazonsdk.Amazon','Recaptcha.Recaptcha');
/**
 * index method
 *
 * @return void
 */


	public function isAuthorized() {
	 if($this->action=='addgame_ajax') {
	 	return true;
	 }
	 //Redirect to error notification page
	 $this->Session->setFlash('Sorry, you don\'t have permission to access that page.');
	 $this->redirect('/');
	 return false;
}




	public function index() {
	$this->layout='ajax';
		echo 'this is toork activities screen V 1.0';
		echo 'auth id'.$this->Session->read('Auth.User.id');
		$data=$this->Activity->find('all');
		print_r($data);
		
		$this->pushActivity(434,44,55,1,1,4);
		
	}
	
	
	
	public function pushActivity($performer_id=NULL,$game_id=NULL,$channel_id=NULL,$notify=0,$email=0,$type=NULL) {
	$this->layout='ajax';
	
	if($this->Auth->user('id'))
	{ //openning of auth_id control
	   $user_id = $this->Session->read('Auth.User.id');
	   if($performer_id==$user_id)
	   {//openning of performer owner control
		     //*********************
			 //Secure data filtering
			 //*********************
		     $filtered_data=
			 array('Activity' =>array(
			 'performer_id' => $performer_id,
			 'game_id' => $game_id,
			 'channel_id' => $channel_id,
			 'notify' => $notify,
			 'email' => $email,
			 'type' => $type));
			
			    if ($this->Activity->save($filtered_data)) {
				echo 'data has been submitted';
				
				    if($email==1)
					$this->sendNotifyMail();
				
				}
        }//closing of performer owner control
	
	}//closing of auth_id control			
		
 }
	
	
   public function sendNotifyMail($performer_id=NULL,$game_id,$channel_id,$type_id)
   {
     
	  if($this->mailPermission())
	  {
	  //if user allow to send notify by email
	 
	  }
     
  
   }
   
   public function mailPermission($user_id=NULL)
   {
  
     
   return 1;
   }
	
	
	
}