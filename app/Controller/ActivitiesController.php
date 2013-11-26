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
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha');
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
		echo 'this is Clone activities screen V 1.0';
		echo 'auth id'.$this->Session->read('Auth.User.id');
		$data=$this->Activity->find('all');
		//print_r($data);
		
		$rand1=rand(1,80);
		$rand2=rand(1,200);
		$rand3=rand(1,80);
		$rand4=rand(1,232323);
		
		$this->pushActivity($rand2,1558,0,1,10);
				return $this->render('/emails/html/rate');
	}
	
	public function togglelast10()
	{
	   $this->layout='ajax';
	   
	   $seenlist=json_decode($_POST['jsondata']);
	   //print_r($seenlist);
	   $seenlistcon=implode(",",$seenlist);
	   if($this->Auth->user('id'))
	   { //openning of auth_id control
	   $auth_id=$this->Session->read('Auth.User.id');
	   $toggle=$this->Activity->query('UPDATE activities SET seen=1 WHERE id IN ('.$seenlistcon.')');
	   echo 1;
	   }else{
	   echo 0;
	   }
	}
	
	public function getNotificationCount()
	{
	$this->layout='ajax';
	
	   if($this->Auth->user('id'))
	   { //openning of auth_id control
	   $auth_id=$this->Session->read('Auth.User.id');
	   $count=$this->Activity->find('count',array('contain'=>false,'conditions'=>array('Activity.channel_id'=>$auth_id,'Activity.notify'=>1,'Activity.seen'=>0)));
	   echo $count;
       }else{
	   echo 0;
	   }
	}
	
	public function getOldNotifications()
    {
    $this->layout='ajax';
    
	   if($this->Auth->user('id'))
	   { //openning of auth_id control
	  $auth_id=$this->Session->read('Auth.User.id');
	  $freshdata=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.screenname','PerformerUser.seo_username')),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username','ChannelUser.seo_username'))),'fields'=>array('Activity.id','Activity.performer_id','Activity.game_id','Activity.channel_id','Activity.msg_id','Activity.seen','Activity.notify','Activity.email','Activity.type','Activity.replied','Activity.created','PerformerUser.id','PerformerUser.username','PerformerUser.seo_username','ChannelUser.id','ChannelUser.username','ChannelUser.seo_username','Game.id','Game.name','Game.seo_url','Game.embed'),'conditions'=>array('Activity.notify'=>1,'Activity.seen'=>1,'Activity.channel_id'=>$auth_id),'limit'=>10,'order'=>'Activity.id DESC'));
      $this->set('lastactivities',$freshdata);
        }
    }
	
	public function getFreshNotification()
	{
	$this->layout='ajax';
	
	   if($this->Auth->user('id'))
	   { //openning of auth_id control
	  $auth_id=$this->Session->read('Auth.User.id');
	  $freshdata=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.screenname','PerformerUser.seo_username')),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username','ChannelUser.seo_username'))),'fields'=>array('Activity.id','Activity.performer_id','Activity.game_id','Activity.channel_id','Activity.msg_id','Activity.seen','Activity.notify','Activity.email','Activity.type','Activity.replied','Activity.created','PerformerUser.id','PerformerUser.username','PerformerUser.seo_username','ChannelUser.id','ChannelUser.username','ChannelUser.seo_username','Game.id','Game.name','Game.seo_url','Game.embed'),'conditions'=>array('Activity.notify'=>1,'Activity.seen'=>0,'Activity.channel_id'=>$auth_id),'limit'=>10,'order'=>'Activity.id DESC'));
      $this->set('lastactivities',$freshdata);
        }
  
	}
	
	public function getFreshActivity($last_id)
	{
	$this->layout='ajax';
	//$freshdata=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.seo_username')),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username','ChannelUser.seo_username'))),'fields'=>array('Activity.id','Activity.performer_id','Activity.game_id','Activity.channel_id','Activity.msg_id','Activity.seen','Activity.notify','Activity.email','Activity.type','Activity.replied','Activity.created','PerformerUser.id','PerformerUser.username','PerformerUser.seo_username','ChannelUser.id','ChannelUser.username','ChannelUser.seo_username','Game.id','Game.name','Game.seo_url','Game.embed'),'conditions'=>array('Activity.id >'=>$last_id),'limit'=>2,'order'=>'Activity.created DESC'));
//$this->set('lastactivities',$freshdata);

 if($this->Auth->user('id'))
	{ //openning of auth_id control
    $auth_id=$this->Session->read('Auth.User.id');
    $subscribed_ids=$this->Subscription->find('list',array('contain'=>false,'fields'=>array('Subscription.subscriber_to_id'),'conditions'=>array('Subscription.subscriber_id'=>$auth_id)));
	$activityData=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.screenname','PerformerUser.seo_username')),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username','ChannelUser.seo_username'))),'fields'=>array('Activity.id','Activity.performer_id','Activity.game_id','Activity.channel_id','Activity.msg_id','Activity.seen','Activity.notify','Activity.email','Activity.type','Activity.replied','Activity.created','PerformerUser.id','PerformerUser.username','PerformerUser.seo_username','ChannelUser.id','ChannelUser.username','ChannelUser.seo_username','Game.id','Game.name','Game.seo_url','Game.embed'),'conditions'=>array('Activity.id >'=>$last_id,'Activity.performer_id'=>$subscribed_ids),'limit'=>2,'order'=>'Activity.created DESC'));
$this->set('lastactivities',$activityData);
    }else{//closing of auth_id control
   //if user is no logged in,get all activity data
	$activityData=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.screenname','PerformerUser.seo_username')),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username','ChannelUser.seo_username'))),'fields'=>array('Activity.id','Activity.performer_id','Activity.game_id','Activity.channel_id','Activity.msg_id','Activity.seen','Activity.notify','Activity.email','Activity.type','Activity.replied','Activity.created','PerformerUser.id','PerformerUser.username','PerformerUser.seo_username','ChannelUser.id','ChannelUser.username','ChannelUser.seo_username','Game.id','Game.name','Game.seo_url','Game.embed'),'conditions'=>array('Activity.id >'=>$last_id),'limit'=>2,'order'=>'Activity.created DESC'));
$this->set('lastactivities',$activityData);
    }

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
			$performer = $this->User->find('first',array('conditions' => array('User.id'=>$performer_id)));
			$perstat = $this->Userstat->find('first',array('conditions' => array('Userstat.user_id'=>$performer_id)));
			$game = $this->Game->find('first',array('conditions' => array('Game.id'=>$game_id)));
		
		if ($user === false) {
			$this->Session->setFlash('This mail is not registered.');
			debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
			return false;
		}


/* Activity Type_id codes
Comment1 Follow2 Clone3 Rate4 Mention5 PostComment6 Favorite7 GameHashtag8 GameAdd9 SharePost10 PlayGame11
*/
        //Generate User Image
		$baseofs3=Configure::read('S3.url');
        $performer['User']['avatarurl']="www.toork.comavatar";

 		$email = new CakeEmail();

 		if($type_id==1){
			$email->viewVars(array('game' => $game,'performer' => $performer,'perstat' => $perstat,'perMail'=>$user["User"]["email"]));
			$email->config('smtp')
				->template('comment')
			    ->emailFormat('html')
			    ->to($user["User"]["email"])
			    ->from(array('no-reply@clone.gs' => $performer["User"]["username"].' - Clone'))
			    ->subject($performer["User"]["username"].' commented on your game.')
			    ->send();
	  	}elseif($type_id==2){
			$email->viewVars(array('performer' => $performer,'perstat' => $perstat,'perMail'=>$user["User"]["email"]));
			$email->config('smtp')
				->template('follow') 
			    ->emailFormat('html')
			    ->to($user["User"]["email"])
			    ->from(array('no-reply@clone.gs' => $performer["User"]["username"].' - Clone'))
			    ->subject($performer["User"]["username"].' is following you on Clone.')
			    ->send();
	  	}elseif($type_id==3){
			$email->viewVars(array('game' => $game,'performer' => $performer,'perstat' => $perstat,'perMail'=>$user["User"]["email"]));
			$email->config('smtp')
				->template('clone')
			    ->emailFormat('html')
			    ->to($user["User"]["email"])
			    ->from(array('no-reply@clone.gs' => $performer["User"]["username"].' - Clone'))
			    ->subject($performer["User"]["username"].' made a clone of your game.')
			    ->send();
	  	}elseif($type_id==4){
			$email->viewVars(array('game' => $game,'performer' => $performer,'perstat' => $perstat,'perMail'=>$user["User"]["email"]));
			$email->config('smtp')
				->template('rate')
			    ->emailFormat('html')
			    ->to($user["User"]["email"])
			    ->from(array('no-reply@clone.gs' => $performer["User"]["username"].' - Clone'))
			    ->subject($performer["User"]["username"].' rated your game.')
			    ->send();
	  	}elseif($type_id==5){
			$email->viewVars(array('game' => $game,'performer' => $performer,'perstat' => $perstat,'perMail'=>$user["User"]["email"]));
			$email->config('smtp')
				->template('mention')
			    ->emailFormat('html')
			    ->to($user["User"]["email"])
			    ->from(array('no-reply@clone.gs' => $performer["User"]["username"].' - Clone'))
			    ->subject($performer["User"]["username"].' is talking about you.')
			    ->send();
	  	}elseif($type_id==6){
			$email->viewVars(array('performer' => $performer,'perstat' => $perstat,'perMail'=>$user["User"]["email"]));
			$email->config('smtp')
				->template('postComment')
			    ->emailFormat('html')
			    ->to($user["User"]["email"])
			    ->from(array('no-reply@clone.gs' => $performer["User"]["username"].' - Clone'))
			    ->subject($performer["User"]["username"].' commneted on your post.')
			    ->send();
	  	}elseif($type_id==7){
			$email->viewVars(array('game' => $game,'performer' => $performer,'perstat' => $perstat,'perMail'=>$user["User"]["email"]));
			$email->config('smtp')
				->template('favorite')
			    ->emailFormat('html')
			    ->to($user["User"]["email"])
			    ->from(array('no-reply@clone.gs' => $performer["User"]["username"].' - Clone'))
			    ->subject($performer["User"]["username"].' added your game to its Favorite list.')
			    ->send();
	  	}elseif($type_id==8){
			$email->viewVars(array('game' => $game,'performer' => $performer,'perstat' => $perstat,'perMail'=>$user["User"]["email"]));
			$email->config('smtp')
				->template('hashtag')
			    ->emailFormat('html')
			    ->to($user["User"]["email"])
			    ->from(array('no-reply@clone.gs' => $performer["User"]["username"].' - Clone'))
			    ->subject($performer["User"]["username"].' is talking about your game.')
			    ->send();
	  	}else{}

	  	
	 //echo 'data has been mailed';
	             }//-----Channel id bos degilse begins-------
	        
		  }
     
  
   }
   
    public function mailPermission($user_id=NULL,$type_id=NULL)
    {
   
   $default=$this->Activity->query('SELECT * FROM mailpermissions WHERE user_id='.$user_id.'');
   if($default!=NULL)
   {
      $perm=$this->Activity->query('SELECT * FROM mailpermissions WHERE user_id='.$user_id.' AND type_id='.$type_id.'');//echo 'access has been checked for '.$user_id.' '.$type_id;
      if($perm!=NULL)
      return 1;
      else
      return 0;
   }else{
   return 1;
   }
   
  
    }
	
	
	
}