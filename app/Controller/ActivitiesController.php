<?php
App::uses('AppController', 'Controller');
/**
 * Wallentries Controller
 *
 * @property Wallentry $Wallentry
 */
class ActivitiesController extends AppController {
    
	public $name = 'Activities';
    var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Category','Activity','CakeEmail', 'Network/Email');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha','Facebook.Facebook');
    public $components = array('Amazonsdk.Amazon','Recaptcha.Recaptcha','Email'); 
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
		//print_r($data);
		
		$rand1=rand(1,80);
		$rand2=rand(1,200);
		$rand3=rand(1,80);
		$rand4=rand(1,232323);
		
		$this->pushActivity($rand2,1558,0,1,10);
		
	}
	
	
	
	public function pushActivity($game_id=NULL,$channel_id=NULL,$notify=0,$email=0,$type=NULL) {
	$this->layout='ajax';
	
	if($this->Auth->user('id'))
	{ //openning of auth_id control
	
	$performer_id=$this->Session->read('Auth.User.id');
	//if user affect itself,we don't need notify or mail.
	if($performer_id==$channel_id)
	$email=0;
	
	if($channel_id=='null')
	$channel_id=NULL;
	
	//if channel_id==NULL
	if($channel_id==NULL)
	{
	$targetGame=$this->Game->find('first',array('conditions'=>array('Game.id'=>$game_id),'fields'=>array('Game.user_id'),'contain'=>false));
	$channel_id=$targetGame['Game']['user_id'];
	}
	//echo 'channel id:'.$channel_id.'<br>';
	   
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
				echo 1;
				
				    if($email==1)
					{
					$this->sendNotifyMail($performer_id,$game_id,$channel_id,$type);
				    }
				}
	
	}//closing of auth_id control			
		
 }
	
	
   public function sendNotifyMail($performer_id=NULL,$game_id=NULL,$channel_id=NULL,$type_id=NULL)
   {
     
	  if($this->mailPermission($channel_id,$type_id))
	  {
	  //if user allow to send notify by email
	  
	        if($channel_id!=NULL)
			{//-----Channel id bos degilse begins-------
	           
			   $this->User->id=$channel_id;
		$user = $this->User->find('first',array('conditions' => array('User.id'=>$channel_id)));
		
		if ($user === false) {
			$this->Session->setFlash('This mail is not registered.');
			debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
			return false;
		}
 
		    $email = new CakeEmail();
		    // Set data for the "view" of the Email
			$email->viewVars(array('reset_url' => 'http://toork.com/users/reset_now/' . $user['User']['id'] . '/' . $this->User->getActivationHash(),'username'=>$user["User"]["username"]));
			$email->config('smtp')
				->template('forgot_password') //I'm assuming these were created
			    ->emailFormat('html')
			    ->to($user["User"]["email"])
			    ->from(array('no-reply@toork.com' => 'Toork'))
			    ->subject('Toork - Password Reset')
			    ->send();
	  
	 //echo 'data has been mailed';
	             }//-----Channel id bos degilse begins-------
	        
		  }
     
  
   }
   
   public function mailPermission($user_id=NULL,$type_id=NULL)
   {
  $perm=$this->Activity->query('SELECT * FROM mailpermissions WHERE user_id='.$user_id.' AND type_id='.$type_id.'');//echo 'access has been checked for '.$user_id.' '.$type_id;
  if($perm!=NULL)
  return 1;
  else
  return 0;
   }
	
	
	
}