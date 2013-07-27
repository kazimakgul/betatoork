<?php
App::uses('AppController', 'Controller');
/**
 * Wallentries Controller
 *
 * @property Wallentry $Wallentry
 */
class WallentriesController extends AppController {
    
	
    public $helpers = array('Html', 'Form','Upload','Facebook.Facebook');
	public $components = array('Amazonsdk.Amazon');
/**
 * index method
 *
 * @return void
 */


	public function isAuthorized() {
	 if($this->action=='wall' || $this->action=='channelwall' || $this->action=='wall2' || $this->action=='wall3') {
	 	return true;
	 }
	 //Redirect to error notification page
	 $this->Session->setFlash('Sorry, you don\'t have permission to access that page.');
	 $this->redirect('/');
	 return false;
}

//This return necessary user data for upload plugin's image function(We use this to show images).
public function get_userdata($uid=NULL) {
$this->loadModel('User');
$a=$this->User->find('first',array('contain'=>array('Userstat'),'conditions'=>array('User.id'=>$uid)));
return $a;
}

public function get_gamedata($gid=NULL) {
$this->loadModel('Game');
$a=$this->Game->find('first',array('contain'=>array('User'),'conditions'=>array('Game.id'=>$gid)));
return $a;
}

	public function index() {
		$this->Wallentry->recursive = 0;
		$this->set('wallentries', $this->paginate());
	}

	public function leftpanel(){
		$this->loadModel('Category');
		$this->loadModel('Game');
		$this->Game->recursive = 0;
		$cat=$this->Game->Category->find('all');
		$this->set('category', $cat);
		$cond3= array('Game.active'=>'1');
    	$this->set('games', $this->paginate('Game',$cond3));

	}

	public function logedin_user_panel() {
		$this->loadModel('User');
		$this->loadModel('Subscription');
		$this->loadModel('Playcount');
		$this->loadModel('Game');
		$this->layout='base';
	    $userid = $this->Session->read('Auth.User.id');
	    $username = $this->Session->read('Auth.User.username');
	    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
	    $favoritenumber = $this->Game->Favorite->find('count', array('conditions' => array('Favorite.User_id' => $userid)));
	    $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
	    $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$playcount = $this->Playcount->find('count', array('conditions' => array('Playcount.user_id' => $userid)));
		$user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	    $this->set('user',$user);

	    $this->set('userid', $userid);
	   	$this->set('username', $username);
	    $this->set('gamenumber', $gamenumber);
	    $this->set('favoritenumber', $favoritenumber);
	   	$this->set('subscribe', $subscribe);
	    $this->set('subscribeto', $subscribeto);
	    $this->set('playcount', $playcount);

	}
	
	

	public function wall($type=NULL) {
		$this->loadModel('User');
		$this->loadModel('Game');
		$this->loadModel('Subscription');
		$this->layout='channel';
		$this->leftpanel();
		$this->logedin_user_panel();
		
	//Add recommended channel as chain
	//$this->requestAction( array('controller' => 'subscriptions', 'action' => 'quick_subscription'));
		
		
		switch($type)
		{
		case 'games':
		$this->set('type',1);
		break;
		case 'videos':
		$this->set('type',4);
		break;
		case 'photos':
		$this->set('type',3);
		break;
		default:
		$this->set('type',NULL);
		}
		
		//echo 'fb_id:'.$this->Session->read('Auth.User.facebook_id');
		if($this->Session->read('Auth.User.facebook_id')!=NULL && $this->Session->read('firstfb')==NULL)
		{
		    
		   echo '<script>document.location.reload(true)</script>';
		   $this->Session->write('firstfb',1);
		}
		
		$userid = $this->Session->read('Auth.User.id');
	    $subscriber_ids = $this->Subscription->find('all',array('conditions'=>array('subscriber_id'=>$userid)));
		if($subscriber_ids!=NULL)
		{
		    $i=0;
		    foreach ($subscriber_ids as $allids)
		    {
		    $ids[$i]=$allids['Subscription']['subscriber_to_id'];
		    $i++;
		    }
		
	        //$subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
	        $games = $this->Game->find('all', array('conditions' => array('Game.user_id' => $ids)));	
		    $this->Wallentry->recursive = 0;

		    $cond= array('Game.user_id' => $ids);
    	    $this->set('entries', $this->paginate('Game',$cond));
        }else{
		$this->set('entries', NULL);
	    }
       
	   
	   //New Wall Getting Started Below.
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   
	   
	   $Wall = new Wall_Updates();
	   $this->set('Wall',$Wall);
	   

     //Get best channels
      $authid = $this->Session->read('Auth.User.id');
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$userid),'fields'=>array('Subscription.subscriber_to_id')));
		   $mutuals=array_intersect($listofmine,$listofuser);//Gereksiz sorguyu sil.
		   $this->set('mutuals',$mutuals);
		   }else{
		   $this->set('mutuals',NULL);
		   }
		 
		//Set first situation of flags
		$restrict=50;
		$status='normal';
		$counter=0;
		//Repeat it to get data
		do{
		$suggestdata=$this->User->find('all',array('limit' => 5,'order'=>'rand()','conditions'=>array('User.id'=>$this->get_suggestions($restrict),'NOT' => array('User.id' => $listofmine))));
          if($suggestdata==NULL)
		  {
          $status='empty';
		  $restrict+=10;
		  $counter++;
		  }else{
		  $status='normal';
		  }
		  if($counter==3)
		  break;
		}while($status=='empty');
	   $this->set('users',$suggestdata);
	   
	   //Actions About Best Games On Right Sidebar
	   $suggestedgames=$this->Game->find('all',array('limit' => 5,'order'=>'rand()','conditions'=>array('Game.id'=>$this->get_game_suggestions())));
       $this->set('suggestedgames',$suggestedgames);
	   
	   //get channel description
	   $channeldata=$this->User->find('first',array('contain'=>false,'conditions'=>array('id'=>$authid),'field'=>array('User.description','User.id')));
	   $this->set('channeldata',$channeldata);

    	$user = $this->User->find('first', array('conditions' => array('User.id' => $authid)));
    	$userName = $user['User']['username'];
    	$userDesc = $user['User']['description'];
		$this->set('title_for_layout', $userName.' News - Toork');
		$this->set('description_for_layout', $userName.' Channel News - '.$userDesc);
	
	}
	
	
	public function wall2($type=NULL) {
		$this->loadModel('User');
		$this->loadModel('Game');
		$this->loadModel('Subscription');
		$this->layout='dashboard';
		$this->leftpanel();
		//$this->logedin_user_panel();
		
	//Add recommended channel as chain
	$this->requestAction( array('controller' => 'subscriptions', 'action' => 'quick_subscription'));
		
		
		switch($type)
		{
		case 'games':
		$this->set('type',1);
		break;
		case 'videos':
		$this->set('type',4);
		break;
		case 'photos':
		$this->set('type',3);
		break;
		default:
		$this->set('type',NULL);
		}
		
		//echo 'fb_id:'.$this->Session->read('Auth.User.facebook_id');
		if($this->Session->read('Auth.User.facebook_id')!=NULL && $this->Session->read('firstfb')==NULL)
		{
		    
		   echo '<script>document.location.reload(true)</script>';
		   $this->Session->write('firstfb',1);
		}
		
		$userid = $this->Session->read('Auth.User.id');
	    $subscriber_ids = $this->Subscription->find('all',array('conditions'=>array('subscriber_id'=>$userid)));
		if($subscriber_ids!=NULL)
		{
		    $i=0;
		    foreach ($subscriber_ids as $allids)
		    {
		    $ids[$i]=$allids['Subscription']['subscriber_to_id'];
		    $i++;
		    }
		
	        //$subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
	        $games = $this->Game->find('all', array('conditions' => array('Game.user_id' => $ids)));	
		    $this->Wallentry->recursive = 0;

		    $cond= array('Game.user_id' => $ids);
    	    $this->set('entries', $this->paginate('Game',$cond));
        }else{
		$this->set('entries', NULL);
	    }
       
	   
	   //New Wall Getting Started Below.
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   
	   
	   $Wall = new Wall_Updates();
	   $this->set('Wall',$Wall);
	   

     //Get best channels
      $authid = $this->Session->read('Auth.User.id');
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$userid),'fields'=>array('Subscription.subscriber_to_id')));
		   $mutuals=array_intersect($listofmine,$listofuser);//Gereksiz sorguyu sil.
		   $this->set('mutuals',$mutuals);
		   }else{
		   $this->set('mutuals',NULL);
		   }
		 
		//Set first situation of flags
		$restrict=50;
		$status='normal';
		$counter=0;
		//Repeat it to get data
		do{
		$suggestdata=$this->User->find('all',array('limit' => 5,'order'=>'rand()','conditions'=>array('User.id'=>$this->get_suggestions($restrict),'NOT' => array('User.id' => $listofmine))));
          if($suggestdata==NULL)
		  {
          $status='empty';
		  $restrict+=10;
		  $counter++;
		  }else{
		  $status='normal';
		  }
		  if($counter==3)
		  break;
		}while($status=='empty');
	   $this->set('users',$suggestdata);
	   
	   //Actions About Best Games On Right Sidebar
	   $suggestedgames=$this->Game->find('all',array('limit' => 5,'order'=>'rand()','conditions'=>array('Game.id'=>$this->get_game_suggestions())));
       $this->set('suggestedgames',$suggestedgames);
	   
	   //get channel description
	   $channeldata=$this->User->find('first',array('contain'=>false,'conditions'=>array('id'=>$authid),'field'=>array('User.description','User.id')));
	   $this->set('channeldata',$channeldata);

    	$user = $this->User->find('first', array('conditions' => array('User.id' => $authid)));
    	$userName = $user['User']['username'];
    	$userDesc = $user['User']['description'];
		$this->set('title_for_layout', $userName.' News - Toork');
		$this->set('description_for_layout', $userName.' Channel News - '.$userDesc);
	
       
	}
	

public function set_suggested_channels()
{
//Set first situation of flags
		$restrict=50;
		$status='normal';
		$counter=0;
		$limit=20;
		$authid = $this->Session->read('Auth.User.id');
		//Repeat it to get data
		$listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		do{
		$suggestdata=$this->User->find('all',array('limit' => $limit,'order'=>'rand()','conditions'=>array('User.id'=>$this->get_suggestions($restrict),'NOT' => array('User.id' => $listofmine))));
          if($suggestdata==NULL)
		  {
          $status='empty';
		  $restrict+=10;
		  $counter++;
		  }else{
		  $status='normal';
		  }
		  if($counter==3)
		  break;
		}while($status=='empty');
		$category = $this->Category->find('all');
		$this->set('category',$category);
	   	$this->set('channels',$suggestdata);

}


		public function wall3($type=NULL) {
		$this->loadModel('User');
		$this->loadModel('Game');
		$this->loadModel('Subscription');
		$this->layout='dashboard';
		$this->leftpanel();
		//$this->logedin_user_panel();
		
		//Add recommended channel as chain
		$this->requestAction( array('controller' => 'subscriptions', 'action' => 'quick_subscription'));
		
		
		switch($type)
		{
		case 'games':
		$this->set('type',1);
		break;
		case 'videos':
		$this->set('type',4);
		break;
		case 'photos':
		$this->set('type',3);
		break;
		default:
		$this->set('type',NULL);
		}
		
		//echo 'fb_id:'.$this->Session->read('Auth.User.facebook_id');
		if($this->Session->read('Auth.User.facebook_id')!=NULL && $this->Session->read('firstfb')==NULL)
		{
		    
		   echo '<script>document.location.reload(true)</script>';
		   $this->Session->write('firstfb',1);
		}
		
		$userid = $this->Session->read('Auth.User.id');
	    $subscriber_ids = $this->Subscription->find('all',array('conditions'=>array('subscriber_id'=>$userid)));
		if($subscriber_ids!=NULL)
		{
		    $i=0;
		    foreach ($subscriber_ids as $allids)
		    {
		    $ids[$i]=$allids['Subscription']['subscriber_to_id'];
		    $i++;
		    }
		
	        //$subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
	        $games = $this->Game->find('all', array('conditions' => array('Game.user_id' => $ids)));	
		    $this->Wallentry->recursive = 0;

		    $cond= array('Game.user_id' => $ids);
    	    $this->set('entries', $this->paginate('Game',$cond));
        }else{
		$this->set('entries', NULL);
	    }
       
	   
	   //New Wall Getting Started Below.
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   
	   
	   $Wall = new Wall_Updates();
	   $this->set('Wall',$Wall);
	   

     //Get best channels
      $authid = $this->Session->read('Auth.User.id');
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$userid),'fields'=>array('Subscription.subscriber_to_id')));
		   $mutuals=array_intersect($listofmine,$listofuser);//Gereksiz sorguyu sil.
		   $this->set('mutuals',$mutuals);
		   }else{
		   $this->set('mutuals',NULL);
		   }
		
	   $this->set_suggested_channels();
	   
	   //Actions About Best Games On Right Sidebar
	   $suggestedgames=$this->Game->find('all',array('limit' => 5,'order'=>'rand()','conditions'=>array('Game.id'=>$this->get_game_suggestions())));
       $this->set('suggestedgames',$suggestedgames);
	   
	   //get channel description
	   $channeldata=$this->User->find('first',array('contain'=>false,'conditions'=>array('id'=>$authid),'field'=>array('User.description','User.id')));
	   $this->set('channeldata',$channeldata);

    	$user = $this->User->find('first', array('conditions' => array('User.id' => $authid)));
    	$userName = $user['User']['username'];
    	$userDesc = $user['User']['description'];
    	$this->set('username', $userName);
    	$this->set('user', $user);
		$this->set('title_for_layout', $userName.' News - Toork');
		$this->set('description_for_layout', $userName.' Channel News - '.$userDesc);
	
       
	}

	
	//this gets channel suggestions
	public function get_suggestions($restrict)
	{
	$top50=$this->User->query('SELECT user_id from userstats ORDER BY potential desc LIMIT '.$restrict);
		$list50=array();
		$i=0;
		foreach($top50 as $oneof50)
		{
		$list50[$i]=$oneof50['userstats']['user_id'];
		$i++;
		}
		return $list50;
	}
	//this gets game suggestions
	public function get_game_suggestions()
	{
	$top50=$this->Game->find('all', array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username')),'conditions' => array('Game.active'=>'1'),'limit' => 50,'order' => array('Game.playcount' => 'desc'
    )));
	
		$list50=array();
		$i=0;
		foreach($top50 as $oneof50)
		{
		$list50[$i]=$oneof50['Game']['id'];
		$i++;
		}
		return $list50;
	}
	
	
	public function usergame_user_panel($userid=NULL) {
        
		$this->loadModel('Game');
		$this->loadModel('Favorite');
        $this->loadModel('Playcount');
		$this->layout='base';
	    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
	    $favoritenumber = $this->Game->Favorite->find('count', array('conditions' => array('Favorite.User_id' => $userid)));
	    $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
	    $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$playcount = $this->Playcount->find('count', array('conditions' => array('Playcount.user_id' => $userid)));
		$user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	    $this->set('user',$user);
        $this->set('userid', $userid);
	    $this->set('gamenumber', $gamenumber);
	    $this->set('favoritenumber', $favoritenumber);
	    $this->set('subscribe', $subscribe);
	    $this->set('subscribeto', $subscribeto);
	    $this->set('playcount', $playcount);
	}
	
	
	public function profile($channel=NULL,$type=NULL) {
		$this->loadModel('User');
		$this->loadModel('Game');
		$this->loadModel('Subscription');
		$this->layout='channel';
		$this->leftpanel();
		
		switch($type)
		{
		case 'games':
		$this->set('type',1);
		break;
		case 'videos':
		$this->set('type',4);
		break;
		case 'photos':
		$this->set('type',3);
		break;
		default:
		$this->set('type',NULL);
		}
		
		
		$userid = $this->Session->read('Auth.User.id');
		
	    $subscriber_ids = $this->Subscription->find('all',array('conditions'=>array('subscriber_id'=>$userid)));
		if($subscriber_ids!=NULL)
		{
		    $i=0;
		    foreach ($subscriber_ids as $allids)
		    {
		    $ids[$i]=$allids['Subscription']['subscriber_to_id'];
		    $i++;
		    }
		
	        //$subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
	        $games = $this->Game->find('all', array('conditions' => array('Game.user_id' => $ids)));	
		    $this->Wallentry->recursive = 0;

		    $cond= array('Game.user_id' => $ids);
    	    $this->set('entries', $this->paginate('Game',$cond));
        }else{
		$this->set('entries', NULL);
	    }
	
	   //Wall Profile Getting Started Below.
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   
	   $Wall = new Wall_Updates();
	   $this->set('Wall',$Wall);
	   
	   
	   //Get best channels
      $authid = $this->Session->read('Auth.User.id');
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$userid),'fields'=>array('Subscription.subscriber_to_id')));
		   $mutuals=array_intersect($listofmine,$listofuser);//Gereksiz sorguyu sil.
		   $this->set('mutuals',$mutuals);
		   }else{
		   $this->set('mutuals',NULL);
		   $listofmine=NULL;
		   }
		$this->set('username',$channel);
		//Set first situation of flags
		$restrict=50;
		$status='normal';
		$counter=0;
		//Repeat it to get data
		do{
		$suggestdata=$this->User->find('all',array('limit' => 5,'order'=>'rand()','conditions'=>array('User.id'=>$this->get_suggestions($restrict),'NOT' => array('User.id' => $listofmine))));
          if($suggestdata==NULL)
		  {
          $status='empty';
		  $restrict+=10;
		  $counter++;
		  }else{
		  $status='normal';
		  }
		  if($counter==3)
		  break;
		}while($status=='empty');
	   $this->set('users',$suggestdata);
	   

		if($channel)
		{
			$profile_uid=$Wall->User_ID($channel);
			//If channel does not exist
			if(empty($profile_uid))
			$this->redirect('/');
			$UserDetails=$Wall->User_Details($profile_uid);
			$this->usergame_user_panel($profile_uid);

			if(empty($profile_uid))
			{
				header('Location:404.php');
			}
		}
		else
		{
			header('Location:404.php');
		}
				
		$this->set('profile_uid',$profile_uid);
			
		//Actions About Best Games On Right Sidebar
	   $suggestedgames=$this->Game->find('all',array('limit' => 5,'order'=>'rand()','conditions'=>array('Game.id'=>$this->get_game_suggestions())));
       $this->set('suggestedgames',$suggestedgames);
	   
	   //get channel description
	   $channeldata=$this->User->find('first',array('contain'=>false,'conditions'=>array('id'=>$profile_uid),'field'=>array('User.description','User.id')));
	   $this->set('channeldata',$channeldata);	
			

	    $user = $this->User->find('first', array('conditions' => array('User.id' => $profile_uid)));
    	$userName = $user['User']['username'];
    	$userDesc = $user['User']['description'];
		$this->set('title_for_layout', $userName.' News - Toork');
		$this->set('description_for_layout', $userName.' Channel News - '.$userDesc);

}
//Part of wall function(Bootstrap Theme Adapted)
//Bu fonksiyon yeni bir post atmamizi saglar.
public function message_ajax2() {
$this->layout='ajax';
error_reporting(0);
//Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $gravatar=1;
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   $Wall = new Wall_Updates();
   if(isSet($_POST['update']))
   {
   $update=mysql_real_escape_string($_POST['update']);
   $update=str_replace('\n','<br>',$update);
   $uploads=$_POST['uploads'];
   $this->set('Wall',$Wall);
   $this->set('uploads',$uploads);
   $data=$Wall->Insert_Update($uid,$update,$uploads,0,0);

   if($data)
   {
   $msg_id=$data['msg_id'];
   $orimessage=$data['message'];
   $message=tolink(htmlcode($data['message']));
   $time=$data['created'];
   $mtime=date("c", $time);
   $uid=$data['uid_fk'];
   $username=$data['username'];
   $this->set('data',$data);
   $this->set('msg_id',$msg_id);
   $this->set('orimessage',$orimessage);
   $this->set('message',$message);
   $this->set('time',$time);
   $this->set('mtime',$mtime);
   $this->set('uid',$uid);
   $this->set('username',$username);
   $this->set('seo_username',$data['seo_username']);
	 
	 
	if(textlink($orimessage))
	{
	$Wall->Edit_Type($msg_id,4);
	} 
	 
	 
	 //Set the avatar for using on view
	 $this->set('face',$face);
	 
	 
}

}}


//Part of wall function(Bootstrap Theme Adapted)
//Bu fonksiyon yeni bir post atmamizi saglar.
public function game_comment_ajax() {
$this->layout='ajax';
error_reporting(0);
//Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $gravatar=1;
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   $Wall = new Wall_Updates();
   if(isSet($_POST['update']))
   {
   $update=mysql_real_escape_string($_POST['update']);
   $update=str_replace('\n','<br>',$update);
   $uploads=$_POST['uploads'];
   $game_id=$_POST['game_id'];
   $this->set('Wall',$Wall);
   $this->set('uploads',$uploads);
   $data=$Wall->Insert_Update($uid,$update,$uploads,$game_id,10);

   if($data)
   {
   $msg_id=$data['msg_id'];
   $orimessage=$data['message'];
   $message=tolink(htmlcode($data['message']));
   $time=$data['created'];
   $mtime=date("c", $time);
   $uid=$data['uid_fk'];
   $username=$data['username'];
   $this->set('data',$data);
   $this->set('msg_id',$msg_id);
   $this->set('orimessage',$orimessage);
   $this->set('message',$message);
   $this->set('time',$time);
   $this->set('mtime',$mtime);
   $this->set('uid',$uid);
   $this->set('username',$username);
   $this->set('seo_username',$data['seo_username']);
	 
	 
	if(textlink($orimessage))
	{
	$Wall->Edit_Type($msg_id,4);
	} 
	 
	 
	 //Set the avatar for using on view
	 $this->set('face',$face);
	 
	 
}

}}


//Part of wall function
//Bu fonksiyon yeni bir post atmamizi saglar.
public function message_ajax() {
$this->layout='ajax';
error_reporting(0);
//Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $gravatar=1;
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   $Wall = new Wall_Updates();
   if(isSet($_POST['update']))
   {
   $update=mysql_real_escape_string($_POST['update']);
   $update=str_replace('\n','<br>',$update);
   $uploads=$_POST['uploads'];
   $this->set('Wall',$Wall);
   $this->set('uploads',$uploads);
   $data=$Wall->Insert_Update($uid,$update,$uploads,0,0);

   if($data)
   {
   $msg_id=$data['msg_id'];
   $orimessage=$data['message'];
   $message=tolink(htmlcode($data['message']));
   $time=$data['created'];
   $mtime=date("c", $time);
   $uid=$data['uid_fk'];
   $username=$data['username'];
   $this->set('data',$data);
   $this->set('msg_id',$msg_id);
   $this->set('orimessage',$orimessage);
   $this->set('message',$message);
   $this->set('time',$time);
   $this->set('mtime',$mtime);
   $this->set('uid',$uid);
   $this->set('username',$username);
   $this->set('seo_username',$data['seo_username']);
	 
	 
	if(textlink($orimessage))
	{
	$Wall->Edit_Type($msg_id,4);
	} 
	 
	 
	 //Set the avatar for using on view
	 $this->set('face',$face);
	 
	 
}

}}


//Part of wall function
//Bu fonksiyon yeni bir game post atmamizi saglar.
public function gamefeed_ajax() {
	$this->layout='ajax';
	error_reporting(0);
	$this->loadModel('Game');
	$userid = $this->Session->read('Auth.User.id');
	$user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid),'field'=>array('User.username','User.id')));
	$username = $user['User']['username'];
	$status = $this->request->data['status'];
	$gamename = $this->request->data['gamename'];
	$gamelink = $this->request->data['gamelink'];
	$gameembedcode = $this->request->data['gameembedcode'];
	$gamedesc = $this->request->data['gamedesc'];
	$gamecategory = $this->request->data['gamecategory'];
	
	$this->set('status',$status);
	$this->set('username',$username);
	$this->set('gamename', $gamename);
	$this->set('gameembedcode', $gameembedcode);
	$this->set('gamedesc', $gamedesc);
	
	$this->Game->create();
	$this->request->data['Game']['name']=$this->secureSuperGlobalPOST($this->request->data['gamename']);
	//$this->request->data['Game']['link']=$this->secureSuperGlobalPOST($this->request->data['gamelink']);
	$this->request->data['Game']['description']=$this->secureSuperGlobalPOST($this->request->data['gamedesc']);
	//$this->request->data['Game']['active'] = 1;
	$this->request->data['Game']['user_id'] = $this->Auth->user('id');
	//$this->request->data['Game']['category_id'] = $this->request->data['gamecategory'];
	$this->request->data['Game']['seo_url']=strtolower(str_replace(' ','-',$this->request->data['gamename']));
	$this->Game->save($this->request->data);
}



//Part of wall function
//Bu fonksiyon yeni bir post atmamizi saglar.
//Farkli sekilde actionlar notify edilirken,ajax_action fonksiyonuna action'in türü de belirtilecek(gönderilecek).
public function action_ajax($content_id=NULL,$uid=NULL,$action=NULL,$status=NULL) {
$this->layout='ajax';
error_reporting(0);
$this->loadModel('Game');
//Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   
	
   $Wall = new Wall_Updates();
   if($content_id!=NULL)
   {
   
   if($action==NULL)
   {
   $game = $this->Game->find('first', array('conditions' => array('Game.id'=>$content_id),'fields'=>array('Game.name'),'contain'=>'false'));
   $type=1;//id of game add function is 1
   $update='A New Game has been published:'.$game['Game']['name'];
   $uploads=$_POST['uploads'];
   $data=$Wall->Insert_Update($uid,$update,$uploads,$content_id,$type);
   }
   
   if($action!=NULL && $action==5)
   {
   $auth = $this->User->find('first', array('conditions' => array('User.id'=>$uid),'fields'=>array('User.username','User.seo_username'),'contain'=>'false'));
   $channel = $this->User->find('first', array('conditions' => array('User.id'=>$content_id),'fields'=>array('User.username','User.seo_username'),'contain'=>'false'));
   $type=5;//id of game add function is 1
   if($status==0)
   $update=''.$auth['User']['username']. ' unchained from '.$channel['User']['username'].' channel';
   if($status==1)
   $update=''.$auth['User']['username']. ' chained to '.$channel['User']['username'].' channel';
   $uploads=$_POST['uploads'];
   $data=$Wall->Insert_Update($uid,$update,$uploads,$content_id,$type);
   $data2=$Wall->Insert_Update($content_id,$update,$uploads,$uid,$type);
   }
   
   if($action!=NULL && $action==6)
   {
   $auth = $this->User->find('first', array('conditions' => array('User.id'=>$uid),'fields'=>array('User.username','User.seo_username'),'contain'=>'false'));
   $game = $this->Game->find('first', array('conditions' => array('Game.id'=>$content_id),'fields'=>array('Game.name'),'contain'=>'false'));
   $type=6;//id of game add function is 1
   if($status==0)
   $update=''.$auth['User']['username']. ' removed '.$game['Game']['name'].' from favorites';
   if($status==1)
   $update=''.$auth['User']['username']. ' added '.$game['Game']['name'].' to favorites';
   $uploads=$_POST['uploads'];
   $data=$Wall->Insert_Update($uid,$update,$uploads,$content_id,$type);
   }
   
   
}
   
   



}


//Bu fonksiyon More buttonunun islevini kontrol eder.
public function moreupdates_ajax($profile_uid=NULL,$type=NULL) {
	   //$this->layout='ajax';
      //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   App::import('Vendor', 'wallscript/time_stamp');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends


     $Wall = new Wall_Updates();
	 $this->set('Wall',$Wall);
     if(isSet($_POST['lastid']))
     {
     $lastid=mysql_real_escape_string($_POST['lastid']);
     $this->set('lastid',$lastid);
     
	 }
      $this->set('profile_uid',$profile_uid);
	  $this->set('type',$type);
	  
}

//Bu fonksiyon More buttonunun islevini kontrol eder.
public function moreupdates_profile_ajax($profile_uid=NULL,$type=NULL) {
	   //$this->layout='ajax';
      //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   App::import('Vendor', 'wallscript/time_stamp');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends


     $Wall = new Wall_Updates();
	 $this->set('Wall',$Wall);
     if(isSet($_POST['lastid']))
     {
     $lastid=mysql_real_escape_string($_POST['lastid']);
     $this->set('lastid',$lastid);
     
	 }
      $this->set('profile_uid',$profile_uid);
	  $this->set('type',$type);
	  
}


//Bu fonksiyon More buttonunun islevini kontrol eder.
public function moreupdates_ajax2($profile_uid=NULL,$type=NULL) {
	   //$this->layout='ajax';
      //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   App::import('Vendor', 'wallscript/time_stamp');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends


     $Wall = new Wall_Updates();
	 $this->set('Wall',$Wall);
     if(isSet($_POST['lastid']))
     {
     $lastid=mysql_real_escape_string($_POST['lastid']);
     $this->set('lastid',$lastid);
     
	 }
      $this->set('profile_uid',$profile_uid);
	  $this->set('type',$type);
	  
}

//Bu fonksiyon More buttonunun islevini kontrol eder.My_Feed için özellestirilmis versiondur.
public function moreupdates_ajax_my($profile_uid=NULL,$type=NULL) {
	   //$this->layout='ajax';
      //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   App::import('Vendor', 'wallscript/time_stamp');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends


     $Wall = new Wall_Updates();
	 $this->set('Wall',$Wall);
     if(isSet($_POST['lastid']))
     {
     $lastid=mysql_real_escape_string($_POST['lastid']);
     $this->set('lastid',$lastid);
     
	 }
      $this->set('profile_uid',$profile_uid);
	  $this->set('type',$type);
	  
}

//Game comments feedlerini getiren version.
public function game_comments_ajax($profile_uid=NULL,$type=NULL) {
	   //$this->layout='ajax';
      //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   App::import('Vendor', 'wallscript/time_stamp');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends


     $Wall = new Wall_Updates();
	 $this->set('Wall',$Wall);
     if(isSet($_POST['lastid']))
     {
     $lastid=mysql_real_escape_string($_POST['lastid']);
     $this->set('lastid',$lastid);
	 }
	 if(isSet($_POST['game_id']))
     {
     $game_id=mysql_real_escape_string($_POST['game_id']);
     $this->set('game_id',$game_id);
	 }
      $this->set('profile_uid',$profile_uid);
	  $this->set('type',$type);
	  
}

//Bu fonksiyon More buttonunun islevini kontrol eder.
public function moreupdates_filter_ajax($type=1) {
       $this->layout='ajax';
      //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   App::import('Vendor', 'wallscript/time_stamp');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends


     $Wall = new Wall_Updates();
	 $this->set('Wall',$Wall);
     if(isSet($_POST['lastid']))
     {
     $lastid=mysql_real_escape_string($_POST['lastid']);
     $this->set('lastid',$lastid);
     
	 }
     
	  $this->set('type',$type);
}

//Yeni comment girmemizi saglayan fonksiyon.
public function comment_ajax() {
     $this->layout='ajax';
     error_reporting(0);
     //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $gravatar=1;
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   $Wall = new Wall_Updates();
	   $this->set('Wall',$Wall);
   if(isSet($_POST['comment']))
   {
   $comment=mysql_real_escape_string($_POST['comment']);
   $comment=str_replace('\n',' ',$comment);
   $msg_id=$_POST['msg_id'];
   $ip=$_SERVER['REMOTE_ADDR'];
   $cdata=$Wall->Insert_Comment($uid,$msg_id,$comment,$ip);
   if($cdata)
   {
   $com_id=$cdata['com_id'];
   $comment=tolink(htmlentities($cdata['comment'] ));
   $time=$cdata['created'];
   $mtime=date("c", $time);
   $username=$cdata['username'];
   $uid=$cdata['uid_fk'];
   $this->set('seo_username',$cdata['seo_username']);
   

     $this->set('msg_id',$msg_id);
     $this->set('ip',$ip);
     $this->set('cdata',$cdata);
     $this->set('com_id',$com_id);
     $this->set('comment',$comment);
	 $this->set('time',$time);
     $this->set('mtime',$mtime);
     $this->set('username',$username);
     $this->set('uid',$uid);
     $this->set('ip',$ip);
	 }}
	 
}


//Yeni comment girmemizi saglayan fonksiyon.
public function comment_ajax2() {
     $this->layout='ajax';
     error_reporting(0);
     //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $gravatar=1;
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/htmlcode');
	   App::import('Vendor', 'wallscript/Expand_URL');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   $Wall = new Wall_Updates();
	   $this->set('Wall',$Wall);
   if(isSet($_POST['comment']))
   {
   $comment=mysql_real_escape_string($_POST['comment']);
   $comment=str_replace('\n',' ',$comment);
   $msg_id=$_POST['msg_id'];
   $ip=$_SERVER['REMOTE_ADDR'];
   $cdata=$Wall->Insert_Comment($uid,$msg_id,$comment,$ip);
   if($cdata)
   {
   $com_id=$cdata['com_id'];
   $comment=tolink(htmlentities($cdata['comment'] ));
   $time=$cdata['created'];
   $mtime=date("c", $time);
   $username=$cdata['username'];
   $uid=$cdata['uid_fk'];
   $this->set('seo_username',$cdata['seo_username']);
   

     $this->set('msg_id',$msg_id);
     $this->set('ip',$ip);
     $this->set('cdata',$cdata);
     $this->set('com_id',$com_id);
     $this->set('comment',$comment);
	 $this->set('time',$time);
     $this->set('mtime',$mtime);
     $this->set('username',$username);
     $this->set('uid',$uid);
     $this->set('ip',$ip);
	 }}
	 
}



//Comment See All Aksiyonu
public function view_ajax() {
     $this->layout='ajax';
     error_reporting(0);
     //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $gravatar=1;
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/time_stamp');
	   App::import('Vendor', 'wallscript/htmlcode');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   $Wall = new Wall_Updates();
	   $this->set('Wall',$Wall);
	   if(isset($_POST['msg_id']))
       {
      $msg_id=mysql_real_escape_string($_POST['msg_id']);
      $x=0;
	
	   }
	 
	 $this->set('msg_id',$msg_id);
	 $this->set('x',$x);
	 
}

//Comment See All Aksiyonu
public function view_ajax2() {
     $this->layout='ajax';
     error_reporting(0);
     //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $gravatar=1;
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/textlink');
	   App::import('Vendor', 'wallscript/time_stamp');
	   App::import('Vendor', 'wallscript/htmlcode');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   $Wall = new Wall_Updates();
	   $this->set('Wall',$Wall);
	   if(isset($_POST['msg_id']))
       {
      $msg_id=mysql_real_escape_string($_POST['msg_id']);
      $x=0;
	
	   }
	 
	 $this->set('msg_id',$msg_id);
	 $this->set('x',$x);
	 
}


public function delete_comment_ajax() {
       error_reporting(0);
	   $this->layout='ajax';
      //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/time_stamp');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   
	   $Wall = new Wall_Updates();
       if(isSet($_POST['com_id']))
       {
       $com_id=$_POST['com_id'];
       $data=$Wall->Delete_Comment($uid,$com_id);
       echo $data;
       }

}

public function delete_message_ajax() {
       error_reporting(0);
	   $this->layout='ajax';
      //Import necessary files for wall script
	   App::import('Vendor', 'wallscript/config');
	   $this->set('gravatar',1);
	   $this->set('base_url','http://localhost/wall/');
	   $this->set('perpage',10);
	   App::import('Vendor', 'wallscript/Wall_Updates');
	   App::import('Vendor', 'wallscript/tolink');
	   App::import('Vendor', 'wallscript/time_stamp');
	   //Session starts
	   if($this->Auth->user('id')) 
       $session_uid=$this->Auth->user('id'); 
       if(!empty($session_uid))
       {
       $uid=$session_uid;
	   $this->set('uid',$uid);
       }else{
        //echo 'please login';
       }
	   //Session Ends
	   $Wall = new Wall_Updates();
       if(isSet($_POST['msg_id']))
      {
      $msg_id=mysql_real_escape_string($_POST['msg_id']);
      $data=$Wall->Delete_Update($uid,$msg_id);
      echo $data;
      }
}


public function image_ajax() {

      App::uses('Folder', 'Utility');
      App::uses('File', 'Utility');

$this->layout="ajax";
  
error_reporting(0);
App::import('Vendor', 'wallscript/config');
$path='wall/';
$this -> set('gravatar', 1);
$this -> set('base_url', 'http://localhost/wall/');
$this -> set('perpage', 10);
App::import('Vendor', 'wallscript/Wall_Updates');
//Session starts
if($this->Auth->user('id')) 
$session_uid=$this->Auth->user('id'); 
if (!empty($session_uid)) {
    $uid = $session_uid;
    $this -> set('uid', $uid);
} else {
   //echo 'please login';
}
//Session Ends
$Wall = new Wall_Updates();

function getExtension($str) {

    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }

    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP");
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_FILES['photoimg']['name'];
    $size = $_FILES['photoimg']['size'];

    if (strlen($name)) {
        $ext = getExtension($name);
        if (in_array($ext, $valid_formats)) {
            if ($size < (1024 * 1024)) {
                $actual_image_name = time().$uid.".".$ext;
                $tmp = $_FILES['photoimg']['tmp_name'];
				
				
				
                if (move_uploaded_file($tmp, $path.$actual_image_name)) {
				/*
		    //Upload to aws begins
			$dir = new Folder(WWW_ROOT ."/wall");
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $info=$file->info();
			$basename=$info["basename"];
			$dirname=$info["dirname"];
			//echo $file;
			 $this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'wall/'.$basename,
             array(
            'fileUpload' => WWW_ROOT ."wall/".$basename,
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			
            }
			//Upload to aws ends
			*/
			/*
			//Folder Formatting begins
			$dir = new Folder(WWW_ROOT ."wall/");
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $file->delete();
            $file->close(); 
            }
			//Folder Formatting ends
				*/   
			echo 'test'.$this->webroot;
                    $data = $Wall -> Image_Upload($uid, $actual_image_name);
                    $newdata = $Wall -> Get_Upload_Image($uid, $actual_image_name);
                    if ($newdata) {
                        //echo '<img src="data:image/jpg;base64,'.$newdata['image_base'].'" class="preview" id="'.$newdata['id'].'"/>';
						$uploadimageurl=$this->webroot.'wall/'.$actual_image_name;
                        echo "<img src='".$uploadimageurl."'  class='preview' id='".$newdata['id']."'/>";
                    }
                } else echo "failed";
            } else echo "Image file size max 1 MB";
        } else echo "Invalid file format.";
    } else echo "Please select image..!";

    exit;
}

}



/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Wallentry->id = $id;
		if (!$this->Wallentry->exists()) {
			throw new NotFoundException(__('Invalid wallentry'));
		}
		$this->set('wallentry', $this->Wallentry->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Wallentry->create();
			if ($this->Wallentry->save($this->request->data)) {
				$this->Session->setFlash(__('The wallentry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wallentry could not be saved. Please, try again.'));
			}
		}
		$users = $this->Wallentry->User->find('list');
		$games = $this->Wallentry->Game->find('list');
		$this->set(compact('users', 'games'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Wallentry->id = $id;
		if (!$this->Wallentry->exists()) {
			throw new NotFoundException(__('Invalid wallentry'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Wallentry->save($this->request->data)) {
				$this->Session->setFlash(__('The wallentry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wallentry could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Wallentry->read(null, $id);
		}
		$users = $this->Wallentry->User->find('list');
		$games = $this->Wallentry->Game->find('list');
		$this->set(compact('users', 'games'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Wallentry->id = $id;
		if (!$this->Wallentry->exists()) {
			throw new NotFoundException(__('Invalid wallentry'));
		}
		if ($this->Wallentry->delete()) {
			$this->Session->setFlash(__('Wallentry deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Wallentry was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}