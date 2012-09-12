<?php

/**
 * Games Controller
 *
 * @property Game $Game
 */
class GamesController extends AppController {

	public $name = 'Games';
	var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha','Facebook.Facebook');
    public $components = array('Amazonsdk.Amazon','Recaptcha.Recaptcha');



 	public function isAuthorized($user) {
	    if (parent::isAuthorized($user)) {
	        return true;
	    }

	    if (($this->action === 'add') || ($this->action === 'mygames') || ($this->action === 'channel')) {
	       // All registered users can add posts
	        return true;
	    }
	    if (in_array($this->action, array('edit', 'delete'))) {
	        $gameId = $this->request->params['pass'][0];
	        return $this->Game->isOwnedBy($gameId, $user['id']);
	    }

	    return false;
	}

	
	public function afterFilter() {
	
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
	//Delete upload dir
 	 	
        $upload_dir = new Folder(WWW_ROOT ."upload");
 	    $updir=$upload_dir->pwd();
		if($updir!=NULL)
		{
		$upload_dir->delete();
		//print_r($upload_dir->errors());
		}
      
 	 	
    //Delete upload dir  
	
	
	}
	
	public function index() {

		$this->layout='base';
		$this->Game->recursive = 0;
		$this->logedin_user_panel();
		$this->leftpanel();
		$limit=12;
    	$this->set('top_rated_games', $this->Game->find('all', array('conditions' => array('Game.active'=>'1'),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    ))));
		
		$this->set('most_played_games', $this->Game->find('all', array('conditions' => array('Game.active'=>'1'),'limit' => $limit,'order' => array('Game.playcount' => 'desc'
    ))));

//ReCoded
$cond = $this->Favorite->find('all',array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => '40'),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'Category','User'=>array('fields'=>array('User.username','User.seo_username'))))));
$cond2 = $this->Favorite->find('all',array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => '5'),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'User'=>array('fields'=>array('User.username','User.seo_username'))))));
//print_r($cond);
		$this->set('slider', $cond);
		$this->set('featured', $cond2);

		$this->set('title_for_layout', 'Toork - Create Your Own Game Channel');
	}
	
	

	
	public function mostplayed() {

   		$this->paginate = array(
	   		'Game' => array('limit'=>28,'order' => array('playcount' => 'desc')));

		$this->layout='base';
		$this->leftpanel();
		$this->logedin_user_panel();


		
		$this->set('most_played_games', $this->paginate('Game',array('Game.active'=>'1')));

		$this->set('title_for_layout', 'Toork - Most Played Games - find the most played online games and play trend topic games using Toork');
	}
	
	public function lastadded() {
   		$this->paginate = array(
	   		'Game' => array('limit'=>28,'order' => array('created' => 'desc')));

		$this->layout='base';
		$this->leftpanel();
		$this->logedin_user_panel();
		
		$this->set('most_played_games', $this->paginate('Game',array('Game.active'=>'1')));

		$this->set('title_for_layout', 'Toork - Last Added Games');
	}


	public function leftpanel(){
		$this->Game->recursive = 0;
		$cat=$this->Game->Category->find('all');
		$this->set('category', $cat);


	}

	public function channel() {

		$this->layout='channel';
		$this->leftpanel();
		$this->logedin_user_panel();
		$userid = $this->Session->read('Auth.User.id');

		$authid = $userid;
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$userid),'fields'=>array('Subscription.subscriber_to_id')));
		   $mutuals=array_intersect($listofmine,$listofuser);
		   $this->set('mutuals',$mutuals);
		   }else{
		   $this->set('mutuals',NULL);
		   }



		$limit=12;
		$limit2=6;
		$cond= $this->Game->find('all', array('conditions' => array('Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.created' => 'desc'
    )));

	$subCond= $this->Subscription->find('all', array('conditions' => array('Subscription.subscriber_id' => $userid),'limit' => $limit2));
	
	$this->set('users', $subCond);
	
	//ReCoded
  $cond2 = $this->Favorite->find('all',array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => $userid),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'User'=>array('fields'=>array('User.username','User.seo_username'))))));
	
	
	    $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
	    $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
	    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
	    if($gamenumber >= 3){
	    	    $this->set('slider', $cond);
	    }else{
	    		$this->set('slider', $this->Game->find('all', array('conditions' => array('Game.active'=>'1'),'limit' => $limit,'order' => array('Game.recommend' => 'desc'))));
	    }
	    $user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	    $this->set('user',$user);

	    $this->set('subscribe', $subscribe);
	    $this->set('subscribeto', $subscribeto);
    	$this->set('userid', $userid);
    	$this->set('mygames', $cond);
    	$this->set('favorites', $cond2);
    	$this->set('limit', $limit);
    	$this->set('limit2', $limit2);
		$this->set('title_for_layout', 'Toork - Create your own game channel');
	}


	public function allchannelgames() {

		$this->layout='channel';
		$this->leftpanel();
		$this->logedin_user_panel();
		$userid = $this->Session->read('Auth.User.id');
	    $user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	    $this->set('user',$user);
    	$this->set('userid', $userid);
    	$this->set('mygames', $this->paginate('Game',array('Game.active'=>'1', 'Game.user_id'=>$userid)));
		$this->set('title_for_layout', 'Toork - Create your own game channel');
	}

		public function allchannelfavorites() {

		$this->layout='channel';
		$this->leftpanel();
		$this->logedin_user_panel();
		$userid = $this->Session->read('Auth.User.id');
	    $user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	    $this->set('user',$user);
    	$this->set('userid', $userid);
    	$this->set('favorites',$this->paginate('Favorite',array('Game.active'=>'1','Favorite.user_id'=>$userid)));
		$this->set('title_for_layout', 'Toork - Create your own game channel');
	}
	
	
	public function toprated() {
		$this->layout='base';
		$this->leftpanel();
		$this->logedin_user_panel();

		$this->set('top_rated_games', $this->paginate('Game',array('Game.active'=>'1')));

		$this->set('title_for_layout', 'Toork - Top Rated Games - find the best online games and play the most popular games using Toork');
	}

	public function playedgames() {
	$this->layout='base';

	$this->leftpanel();
    $userid = $this->request->params['pass'][0];
	$this->usergame_user_panel($userid);
    $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    $userName = $user['User']['username'];
    //print_r($this->paginate('Playcount',array('Playcount.user_id'=>$userid,'Game.active'=>1)));
    $this->set('top_rated_games', $this->paginate('Playcount',array('Playcount.user_id'=>$userid,'Game.active'=>1)));

    $this->set('username', $userName);
	$this->set('userid', $userid);
	}

	public function categorygames() {
		$this->layout='base';
		$this->leftpanel();
		$this->logedin_user_panel();
		$catid = $this->request->params['pass'][0];

		$this->set('top_rated_games', $this->paginate('Game',array('Game.active'=>'1','Game.category_id'=>$catid)));

		$this->set('title_for_layout', 'Toork - Top Rated Category Games');
	}

	public function logedin_user_panel() {

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

		public function usergame_user_panel($userid=NULL) {

		$this->layout='base';
	    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
	    $favoritenumber = $this->Game->Favorite->find('count', array('conditions' => array('Favorite.User_id' => $userid)));
	    $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
	    $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$playcount = $this->Playcount->find('count', array('conditions' => array('Playcount.user_id' => $userid,'Game.active'=>1)));
		$user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	    $this->set('user',$user);
        $this->set('userid', $userid);
	    $this->set('gamenumber', $gamenumber);
	    $this->set('favoritenumber', $favoritenumber);
	    $this->set('subscribe', $subscribe);
	    $this->set('subscribeto', $subscribeto);
	    $this->set('playcount', $playcount);

	}
	
	
	

	public function play2_user_panel($gameid) {

		$game = $this->Game->find('first', array('conditions' => array('Game.id' => $gameid)));
		$userid = $game['Game']['user_id'];
	    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
	    $favoritenumber = $this->Game->Favorite->find('count', array('conditions' => array('Favorite.User_id' => $userid)));
	    $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
	    $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$playcount = $this->Playcount->find('count', array('conditions' => array('Playcount.user_id' => $userid)));

	    $this->set('userid', $userid);
	    $this->set('gamenumber', $gamenumber);
	    $this->set('favoritenumber', $favoritenumber);
	    $this->set('subscribe', $subscribe);
	    $this->set('subscribeto', $subscribeto);
	    $this->set('playcount', $playcount);

	}


	public function mygames() {
		$this->layout='base';
    $userid = $this->Session->read('Auth.User.id');
    //$allMyGames = $this->Game->find('all', array('conditions' => array('Game.user_id' => $userid)));
    //$this->set('mygames', $allMyGames,$this->paginate());
    $cond= array('Game.user_id'=>$userid);
    $this->set('mygames', $this->paginate('Game',$cond));
   
}

	

	public function usergames() {

	$this->leftpanel();
    $this->layout='usergames';
    $userid = $this->request->params['pass'][0];
    $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
	$this->usergame_user_panel($userid);
	if($user==NULL)
	$this->redirect('/');
	
    $userName = $user['User']['username'];
	$limit=12;
	$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    )));
	//ReCoded
    $cond2 = $this->Favorite->find('all',array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => $userid),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'User'=>array('fields'=>array('User.username','User.seo_username'))))));
    $this->set('top_rated_games', $this->Game->find('all', array('conditions' => array('Game.active'=>'1'),'limit' => $limit,'order' => array('Game.recommend' => 'desc'))));
    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
    
    if($gamenumber >= 3){
    	    $this->set('slider', $cond);
    }else{
    		$this->set('slider', $this->Game->find('all', array('conditions' => array('Game.active'=>'1'),'limit' => $limit,'order' => array('Game.recommend' => 'desc'))));
    }

	if($user['User']['verify']!=null){
		$this->set('googleVerify',$user['User']['verify']);
	}else{
		$this->set('googleVerify','');	
	}

   	$this->set('limit', $limit);
    $this->set('favorites', $cond2);
    $this->set('mygames', $cond);
    $this->set('username', $userName);
	$this->set('user_id', $userid);
}


public function get_user_dict($cond2=NULL)
{

    $j=0;
	$alluserids=array();
	foreach($cond2 as $cond1)
	{
	$alluserids[$j]=$cond1['Game']['user_id'];
	$j++;
	}
	
    $userdata=$this->User->find('all',array('conditions'=>array('User.id'=>$alluserids),'fields'=>array('User.username')));
  
  
    $i=0;
	$allusernames=array();
	foreach($userdata as $username)
	{
	$allusernames[$username['User']['id']]=$username['User']['username'];
	$i++;
	}

   return $allusernames;
}

public function channelgames() {

	$this->leftpanel();
    $seo_username = $this->request->params['pass'][0];
    $user = $this->User->find('first', array('conditions' => array('User.seo_username' => $seo_username)));
	$userid=$user['User']['id'];
	$this->usergame_user_panel($userid);
	$this->layout='usergames';
	if($user==NULL)
	$this->redirect('/');

	$authid = $this->Session->read('Auth.User.id');
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$userid),'fields'=>array('Subscription.subscriber_to_id')));
		   $mutuals=array_intersect($listofmine,$listofuser);
		   $this->set('mutuals',$mutuals);
		   }else{
		   $this->set('mutuals',NULL);
		   }

    $userName = $user['User']['username'];
	$limit=12;
	$limit2=6;
	$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    )));
	
	$this->set('title_for_layout', $userName.' - Welcome to '.$userName."'s game channel published by Toork");
    
	//$cond2= $this->Favorite->find('all',array('conditions' => array('Favorite.active'=>'1','Favorite.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    //)));
	
	//ReCoded
	$cond2 = $this->Favorite->find('all',array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => $userid),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'User'=>array('fields'=>array('User.username','User.seo_username'))))));
	
	$subCond= $this->Subscription->find('all', array('conditions' => array('Subscription.subscriber_id' => $userid),'limit' => $limit2));
//print_r($cond2);
	
	$this->set('users', $subCond);
	
    $this->set('top_rated_games', $this->Game->find('all', array('conditions' => array('Game.active'=>'1'),'limit' => $limit,'order' => array('Game.recommend' => 'desc'))));
    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
    
    if($gamenumber >= 3){
    	    $this->set('slider', $cond);
    }else{
    		$this->set('slider', $this->Game->find('all', array('conditions' => array('Game.active'=>'1'),'limit' => $limit,'order' => array('Game.recommend' => 'desc'))));
    }

	if($user['User']['verify']!=null){
		$this->set('googleVerify',$user['User']['verify']);
	}else{
		$this->set('googleVerify','');	
	}

   	$this->set('limit', $limit);
   	$this->set('limit2', $limit2);
    $this->set('favorites', $cond2);
    $this->set('mygames', $cond);
    $this->set('username', $userName);
	$this->set('user_id', $userid);
	
	
}



	public function allusergames() {
	$this->layout='base';

	$this->leftpanel();
    $userid = $this->request->params['pass'][0];
	$this->usergame_user_panel($userid);
    $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    $userName = $user['User']['username'];
    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
    $this->set('mygames', $this->paginate('Game',array('Game.active' => '1','Game.user_id'=>$userid)));
    $this->set('username', $userName);
	$this->set('user_id', $userid);
}

	public function alluserfavorites() {
	$this->layout='base';

	$this->leftpanel();
    $limit=50;
    $userid = $this->request->params['pass'][0];
	$this->usergame_user_panel($userid);
    $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    $userName = $user['User']['username'];
    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
    
	//ReCoded
	$cond2 = $this->Favorite->find('all',array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => $userid),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'User'=>array('fields'=>array('User.username','User.seo_username'))))));
	
	$pagin=$this->paginate('Favorite',array('Favorite.user_id'=>$userid));
    print_r($pagin);
    $this->set('favorites',$this->paginate('Favorite',array('Favorite.user_id'=>$userid)));
    $this->set('username', $userName);
	$this->set('user_id', $userid);
	//$this->set('user_name_dict', $this->get_user_dict($cond2));
}


	

	public function followers() {

		$this->layout='base';
		$this->leftpanel();
		$userid = $this->request->params['pass'][0];

		$authid = $this->Session->read('Auth.User.id');
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$userid),'fields'=>array('Subscription.subscriber_to_id')));
		   $mutuals=array_intersect($listofmine,$listofuser);
		   $this->set('mutuals',$mutuals);
		   }else{
		   $this->set('mutuals',NULL);
		   }

		$this->usergame_user_panel($userid);
		$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    	$userName = $user['User']['username'];
    	$this->set('user_id', $userid);
		$this->set('title_for_layout', $userName.' - Followers');
		$this->set('username', $userName);

		$this->set('followers', $this->paginate('Subscription',array('Subscription.subscriber_to_id' => $userid)));

	}

	public function subscriptions() {

		$this->layout='base';
		$this->leftpanel();
		$userid = $this->request->params['pass'][0];
		$authid = $this->Session->read('Auth.User.id');
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$userid),'fields'=>array('Subscription.subscriber_to_id')));
		   $mutuals=array_intersect($listofmine,$listofuser);
		   $this->set('mutuals',$mutuals);
		   }else{
		   $this->set('mutuals',NULL);
		   }
		   
		
		$this->usergame_user_panel($userid);
		$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    	$userName = $user['User']['username'];
    	$this->set('user_id', $userid);
		$this->set('title_for_layout', $userName.' - Subscribtions');
		$this->set('username', $userName);

		$this->set('followers', $this->paginate('Subscription',array('Subscription.subscriber_id' => $userid)));

	}

		public function bestchannels() {

		$this->layout='base';
		$this->leftpanel();
		$this->logedin_user_panel();
		$userid = $this->Session->read('Auth.User.id');
		$authid = $this->Session->read('Auth.User.id');
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$userid),'fields'=>array('Subscription.subscriber_to_id')));
		   $mutuals=array_intersect($listofmine,$listofuser);
		   $this->set('mutuals',$mutuals);
		   }else{
		   $this->set('mutuals',NULL);
		   }

		$this->set('title_for_layout', 'Toork - Best Online Game Channels ');
		$this->set('user_id', $userid);
		$this->set('users', $this->paginate('User',array('User.active' => '1')));




	}


		public function follow_card($userid) {

	    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
	    $favoritenumber = $this->Game->Favorite->find('count', array('conditions' => array('Favorite.User_id' => $userid)));
	    $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
	    $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
	    $playcount = $this->Playcount->find('count', array('conditions' => array('Playcount.user_id' => $userid)));
	    $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    	$userName = $user['User']['username'];
    	$userUrl = $user['User']['seo_username'];
    	return array($userName,$gamenumber, $favoritenumber, $subscribe, $subscribeto, $playcount,$user,$userUrl);
	}


public function search() {

if($this->request->is("GET") && isset($this->request->params['pass'][0]))
{
$param = $this->request->params['pass'][0];
}

//search için veri girilmemisse ana sayfaya yönlendir.
if(!isset($param) || $param=="" )
{
$this->redirect(array("controller"=>"games","action"=>"index"));
}
else
{
$cond= array('AND'=>array('OR'=>array('Game.name LIKE'=>'%'.$param.'%','Game.description LIKE'=>'%'.$param.'%','User.username LIKE'=>'%'.$param.'%'),'Game.active'=>'1'));
$this->set('search', $this->paginate('Game',$cond));
$this->set('mygames', $cond);

$this->set('title_for_layout', 'Toork - Game Search Engine powered by Google. Toork Search is specially designed for searching games');

}


	$this->leftpanel();
	$this->logedin_user_panel();
	$this->layout='base';

	$key=$param;
	$this->set('myParam',$key);
    $userid = $this->Session->read('Auth.User.id');
    
	
	$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    $userName = $user['User']['username'];
	$limit=120;
	$this->set('limit', $limit);
    
    $this->set('username', $userName);
	$this->set('user_id', $userid);
	
	
}

	public function random() {
        $random = $this->Game->find('first',array(
                'conditions' => array(
                        'Game.active'=>1,
                ),
                'order' => 'rand()',
				'contain'=>false,
				'fields'=>array('Game.id,Game.seo_url')
        ));
        $this->set('randomgame' , $random['Game']['id']);
}


	public function view($id = null) {
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		$this->set('game', $this->Game->read(null, $id));
		
	}


public function fav_check($game_id)
{
$user_id=$this->Auth->user('id');
$favbefore=$this->Game->Favorite->find("first",array("conditions"=>array("Favorite.user_id"=>$user_id,"Favorite.game_id"=>$game_id),"fields"=>array("Favorite.user_id","Favorite.game_id","Favorite.id")));
if(empty($favbefore))
			{
			$this->set("heartwidth",0);
			
			}
			else
			{
			$this->set("heartwidth",100);
			}

}


	public function play($id = null) {
		$this->random();
		$this->layout='game_index';
		$this->fav_check($id);
		$user_id=$this->Auth->user('id');
		
		$game = $this->Game->find('first', array('conditions' => array('Game.id' => $id),'fields'=>array('User.username,User.seo_username,Game.name,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username')))));//Recoded
		
		if ($game==NULL) {
			throw new NotFoundException(__('Invalid game'));
		}
		$this->set('sharedby',$game['User']['username']);//Recoded
		$this->set('game',$game);
		$this->set('title_for_layout', 'Toork - '.$game['Game']['name'].' - '.$game['Game']['description']);

		//start size calculation for play page
		$current=$this->Game->Rate->find("first",array("conditions"=>array("Rate.user_id"=>$user_id,"Rate.game_id"=>$id)));
		$starsize=(100*$current["Rate"]["current"])/5;
		if($starsize==NULL)
		{   
		    if($game['Game']['starsize']!='')
		    $this->set("starsize",$game['Game']['starsize']);
			else
			$this->set("starsize",0);
		}
		else
		$this->set("starsize",$starsize);

		if($game['Game']['embed']==null){

		}else{
			$this->redirect(array('controller'=>'games', 'action'=>'play2',$id));
		}


	}


	public function play2($id = null) {
		$this->random();

		$this->leftpanel();
    	$this->fav_check($id);
		$this->layout='game_index';
		$this->play2_user_panel($id);
		$game = $this->Game->find('first', array('conditions' => array('Game.id' => $id),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username')))));//Recoded
		$user = $this->User->find('first', array('conditions' => array('User.id' => $game['Game']['user_id'])));
		$user_id = $user['User']['id'];
		$auth_id=$this->Auth->user('id');
		$this->set('user', $user);
		$this->set('username', $user['User']['username']);
		$this->set('user_id', $user_id);
		
		if ($game==NULL) {
			throw new NotFoundException(__('Invalid game'));
		}
		$this->set('sharedby',$game['User']['username']);//Recoded
		$this->set('game', $game);
		$this->set('title_for_layout', 'Toork - '.$game['Game']['name'].' - '.$game['Game']['description']);

		//start size calculation for play page
		$current=$this->Game->Rate->find("first",array("conditions"=>array("Rate.user_id"=>$auth_id,"Rate.game_id"=>$id)));
		$starsize=(100*$current["Rate"]["current"])/5;
		if($starsize==NULL)
		{   
		    if($game['Game']['starsize']!='')
		    $this->set("starsize",$game['Game']['starsize']);
			else
			$this->set("starsize",0);
		}
		else
		$this->set("starsize",$starsize);

	}



public function seoplay($channel=NULL,$seo_url=NULL) {

		$this->random();
		$this->layout='game_index';
		//ReCoded
		$channel_id=$this->User->find('first',array('conditions'=>array('User.seo_username'=>$channel),'fields'=>array('User.id'),'contain'=>false));
		
		//ReCoded
		$game = $this->Game->find('first', array('conditions' => array('Game.seo_url'=>$seo_url,'Game.user_id'=>$channel_id['User']['id']),'fields'=>array('User.username,User.seo_username,Game.name,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username')))));
		
		if($game!=NULL)
		$id=$game['Game']['id'];
		$this->fav_check($id);
		$user_id=$this->Auth->user('id');
		
		
		if ($game==NULL) {
			throw new NotFoundException(__('Invalid game'));
		}
		$this->set('sharedby',$game['User']['username']);//Recoded
		$this->set('game',$game);
		$this->set('title_for_layout', $game['Game']['name'].' - Toork');

		//start size calculation for play page
		//ReCoded
		$current=$this->Rate->find("first",array('contain'=>false,'fields'=>array('Rate.current'),'conditions'=>array('Rate.user_id'=>$user_id,'Rate.game_id'=>$id)));
		$starsize=(100*$current["Rate"]["current"])/5;
		if($starsize==NULL)
		{   
		    if($game['Game']['starsize']!='')
		    $this->set("starsize",$game['Game']['starsize']);
			else
			$this->set("starsize",0);
		}
		else
		$this->set("starsize",$starsize);

		if($game['Game']['embed']==null){

		}else{
			$this->redirect(array('controller'=>$channel,'action'=>$seo_url,'play2'));
		}


	}


	public function seoplay2($channel=NULL,$seo_url=NULL) {
		
		$this->layout='game_index';
		$this->random();

		$this->leftpanel();
    	
		
		//$channel_id=$this->User->find('first',array('conditions'=>array('User.seo_username'=>$channel),'fields'=>array('User.id'),'contain'=>false));
		//print_r($channel_id);
		
		//ReCoded
		$game = $this->Game->find('first', array('conditions' => array('Game.seo_url'=>$seo_url),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username'),'conditions'=>array('User.seo_username'=>$channel)))));
		
		if($game!=NULL)
		$id=$game['Game']['id'];
		$this->fav_check($id);
		
	
		if ($game==NULL) {
			throw new NotFoundException(__('Invalid game'));
		}
		
		
		$user = $this->User->find('first', array('conditions' => array('User.id' => $game['Game']['user_id']),'contain'=>false,'fields'=>'User.username'));
		print_r($user);
		$user_id = $user['User']['id'];
		$auth_id = $this->Auth->user('id');
		$this->play2_user_panel($id);
		$this->set('sharedby',$game['User']['username']);//Recoded
		$this->set('user', $user);
		$this->set('username', $user['User']['username']);
		$this->set('user_id', $user_id);
		
		
		$this->set('game', $game);
		$this->set('title_for_layout', $game['Game']['name'].' - Toork');

		//start size calculation for play page
		$current=$this->Game->Rate->find("first",array("conditions"=>array("Rate.user_id"=>$auth_id,"Rate.game_id"=>$id)));
		$starsize=(100*$current["Rate"]["current"])/5;
		if($starsize==NULL)
		{   
		    if($game['Game']['starsize']!='')
		    $this->set("starsize",$game['Game']['starsize']);
			else
			$this->set("starsize",0);
		}
		else
		$this->set("starsize",$starsize);

	}




function secureSuperGlobalPOST($value)
    {
	    $string = preg_replace('/[^\w\d_ -]/si', '', $value);
        $string = htmlspecialchars(stripslashes($string));
        $string = str_ireplace("script", "blocked", $string);
        $string = mysql_escape_string($string);
		$string = htmlentities($string);
        return $string;
    }
       

function getExtension($str) {
     $i = strrpos($str,".");
     if (!$i) { return ""; }
     $l = strlen($str) - $i;
     $ext = substr($str,$i+1,$l);
     return $ext;
}


	public function add() {
	
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
		$this->layout='base';
		$this->logedin_user_panel();
		$userid = $this->Session->read('Auth.User.id');
    	$this->leftpanel();
    	$limit=12;
		$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    )));

		if ($this->request->is('post')) {
		 
		 
		  //Replace Name of Picture Begins
		   $ext = ".".$this->getExtension($this->request->data["Game"]["picture"]["name"]);
		   $this->request->data["Game"]["picture"]["name"]="toork_".$this->request->data['Game']['name'].$ext;
          //Replace Name of Picture Ends
		 
           $this->request->data['Game']['name']=$this->secureSuperGlobalPOST($this->request->data['Game']['name']);
		   $this->request->data['Game']['description']=$this->secureSuperGlobalPOST($this->request->data['Game']['description']);

			$this->request->data['Game']['user_id'] = $this->Auth->user('id');
			
			
			//seourl begins
		 $this->request->data['Game']['seo_url']=strtolower(str_replace(' ','-',$this->request->data['Game']['name']));
		 //seourl ends
			
			$this->Game->create();
			
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash(__('You have successfully added a game to your channel.'));

			
			$id=$this->Game->getLastInsertId();
				
			//Upload to aws begins
			$dir = new Folder(WWW_ROOT ."/upload/games/".$id);
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $info=$file->info();
			$basename=$info["basename"];
			$dirname=$info["dirname"];
			//echo $file;
			 $this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/games/'.$id."/".$basename,
             array(
            'fileUpload' => WWW_ROOT ."/upload/games/".$id."/".$basename,
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			
            }
			//Upload to aws ends
				
				
				
				
				
				$this->redirect(array('action' => 'channel'));
			} else {
				$validationErrors = $this->Game->invalidFields();
				$value = key($validationErrors);
    			$this->Session->setFlash($validationErrors[$value][0]);
			}
			
			
		}

		$this->set('mygames', $cond);
    	$this->set('limit', $limit);
		$users = $this->Game->User->find('list');
		$categories = $this->Game->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
		$this->layout='base';
		$this->logedin_user_panel();
		$userid = $this->Session->read('Auth.User.id');
		$this->leftpanel();
    	$limit=12;
		$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    )));


		$this->Game->id = $id;
		
		
		
		
		
		
    	$game = $this->Game->find('first', array('conditions' => array('Game.id' => $id)));
    	$this->set("game",$game);
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
		   $this->request->data['Game']['name']=$this->secureSuperGlobalPOST($this->request->data['Game']['name']);
		   $this->request->data['Game']['description']=$this->secureSuperGlobalPOST($this->request->data['Game']['description']);
		   
			//$this->request->data['Game']['link']=$this->http_check($this->request->data['Game']['link']);
			
			$myval=$this->request->data["Game"]["edit_picture"]["name"];
			
			if($myval!="")
			{
			
			
			
			//remove objects from S3
			$prefix = 'upload/games/'.$id;
           
  
             $opt = array(
             'prefix' => $prefix,
             );
			 $bucket=Configure::read('S3.name');
			 $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
			 foreach($objs as $obj)
			 {
			 $response=$this->Amazon->S3->delete_object(Configure::read('S3.name'), $obj);
			 //print_r($response);
			 }
			//remove objects from S3
			
			
			
			//Folder Formatting begins
			$dir = new Folder(WWW_ROOT ."/upload/games/".$id);
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $file->delete();
            $file->close(); 
            }
			//Folder Formatting ends
			
			
			$this->request->data["Game"]["picture"]=$this->request->data["Game"]["edit_picture"];
			
			
			//Replace Name of Picture Begins
			$ext = ".".$this->getExtension($this->request->data["Game"]["picture"]["name"]);
		    $this->request->data["Game"]["picture"]["name"]="toork_".$this->request->data['Game']['name'].$ext;
			//Replace Name of Picture Ends
			}
			
			
			//seourl begins
		     $this->request->data['Game']['seo_url']=strtolower(str_replace(' ','-',$this->request->data['Game']['name']));
		    //seourl ends
			
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash('You have successfully updated your game.');
				
				
				
				//Upload to aws begins
			$dir = new Folder(WWW_ROOT ."/upload/games/".$id);
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $info=$file->info();
			$basename=$info["basename"];
			$dirname=$info["dirname"];
			//echo $file;
			 $this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/games/'.$id."/".$basename,
             array(
            'fileUpload' => WWW_ROOT ."/upload/games/".$id."/".$basename,
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			
            }
			//Upload to aws ends
				
				
				$this->redirect(array('action' => 'channel'));
			} else {
				$validationErrors = $this->Game->invalidFields();
				$value = key($validationErrors);
    			$this->Session->setFlash($validationErrors[$value][0]);
			}
		} else {
			$this->request->data = $this->Game->read(null, $id);
		}

		$this->set('mygames', $cond);
    	$this->set('limit', $limit);
    	$this->set('id', $id);
		$users = $this->Game->User->find('list');
		$categories = $this->Game->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->Game->delete()) {
			$this->Session->setFlash(__('You have deleted your game successfully, That game will no longer be visible'));
			$this->redirect(array('action' => 'channel'));
		}
		$this->Session->setFlash(__('Your game was not deleted'));
		$this->redirect(array('action' => 'channel'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Game->recursive = 0;
		$this->set('games', $this->paginate());
	}

	public function gameedit() {
	$this->layout='adminTry';
	if($this->request->isPost())
	{	
	//iç

	$this->Game->id =$this->request->data["Game"]["id"];
	$id=$this->request->data["Game"]["id"];
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Game->save($this->request->data)) {
			   
			    if($this->request->data["Game"]["affect"]==1)
			    {
				$value=$this->request->data["Game"]["active"];
				$this->affected($id,$value);
				
			    }
				else
				{
				$this->Session->setFlash(__('The user has been updated'));
				}
			   
				
				$this->redirect(array('action' => 'gameedit'));
			} else {
				$this->Session->setFlash(__('The game could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}

	//dis
	}
	
	
		$this->Game->recursive = 0;
		$this->set('games', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		$this->set('game', $this->Game->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Game->create();
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash(__('The game has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game could not be saved. Please, try again.'));
			}
		}
		$users = $this->Game->User->find('list');
		$categories = $this->Game->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash(__('The game has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Game->read(null, $id);
		}
		$users = $this->Game->User->find('list');
		$categories = $this->Game->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->Game->delete()) {
			$this->Session->setFlash(__('Game deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Game was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
