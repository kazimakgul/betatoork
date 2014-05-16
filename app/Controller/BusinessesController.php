<?php
App::uses('AppController', 'Controller');
/**
 * Business Controller
 *
 * @property Business $Game
 */
class BusinessesController extends AppController {

	public $name = 'Businesses';
	var $uses = array('Businesses','Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Gamestat','Category','Activity','Cloneship','CakeEmail', 'Network/Email');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha','Time');
    public $components = array('Amazonsdk.Amazon','Recaptcha.Recaptcha','Common');
    
    //=====Kullanici sisteme login ise=======
 	public function isAuthorized($user) {
	    if (parent::isAuthorized($user)) {
	        return true;
	    }

	    if (($this->action === 'add3') || ($this->action === 'add2') || ($this->action === 'dashboard') || ($this->action === 'mygames') || ($this->action === 'favorites') || 
	    	($this->action === 'start') || ($this->action === 'settings') || ($this->action === 'chains') || 
	    	($this->action === 'channel')) {
	       // All registered users can add posts
	        return true;
	    }
	    if (in_array($this->action, array('edit2','delete'))) {
	        $gameId = $this->request->params['pass'][0];
	        return $this->Game->isOwnedBy($gameId, $user['id']);
	    }

	    return false;
	}
     
	public function afterFilter() {
	
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
	//===Eger upload adinda bir klasör varsa siler.====
        $upload_dir = new Folder(WWW_ROOT ."upload");
 	    $updir=$upload_dir->pwd();
		if($updir!=NULL)
		{
		$upload_dir->delete();
		//print_r($upload_dir->errors());
		}
    //===//Eger upload adinda bir klasör varsa siler.====
	}
	public function contactmail($user_id) {
        $this->User->id=$user_id;
		
	    $email = new CakeEmail();
		//print_r($_POST);
	    // Set data for the "view" of the Email
		$email->viewVars(array('username'=>$user["User"]["username"],'name'=>$_POST["firstname"],'surname'=>$_POST["lastname"],'e-mail'=>$_POST["email"],'subject'=>$_POST["subject"],'message'=>$_POST["comment"]));
		$email->config('smtp')
			->template('business/contact') //I'm assuming these were created
		    ->emailFormat('html')
		    ->to($user["User"]["email"])
		    ->from(array('no-reply@clone.gs' => 'Clone'))
		    ->subject($subject)
		    ->send();
	}
	public function gameswitch($id = null) {
		$gameid = $this->request->params['pass'][0];
		$game = $this->Game->find('first', array('conditions' => array('Game.id' => $gameid),'fields'=>array('Game.embed'),'contain'=>false));//Recoded
		if($game['Game']['embed']==null){
			$this->redirect(array('controller' => 'games', 'action' => 'playgameframe',$gameid));
		}else{
			$this->redirect(array('controller' => 'games', 'action' => 'playgame',$gameid));
		}
	}
	
	public function mysite($userid) {

		$this->layout	=	'Business/business';
		$PaginateLimit	=	12;
		
		$user			=	$this->User->find('first', array('conditions' => array('User.id' => $userid),'fields'=>array('*')));
		$this->paginate	=	array('Game'=>array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $PaginateLimit,'order' => array('Game.recommend' => 'desc'),'contain'=>array('Gamestat'=>array('fields'=>array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone')))));
		$cond			=	$this->paginate('Game');
		$category		=	$this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id='.$userid.' group by games.category_id');

	   //========Get Current Subscription===============
	   $authid = $this->Session->read('Auth.User.id');
	   if($authid)
	   {
	   $subscribebefore=$this->Subscription->find("first",array("contain"=>false,"conditions"=>array("Subscription.subscriber_id"=>$authid,"Subscription.subscriber_to_id"=>$userid)));
	       if($subscribebefore!=NULL)
			{
			$this->set('follow',1);
			}else{
			$this->set('follow',0);
			}
	   }else{
	   		$this->set('follow',1);
	   }
	   //=======/Get Current Subscription===============

		$this->set('category',$category);
		$this->set('games', $cond);
		$this->set('user', $user);
		
		$this->set('title_for_layout', 'Clone Games');
		$this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
		$this->set('author_for_layout', 'Clone');
	}
	
	public function play($id=NULL) {
	//Getting Random Game Data
		$game	=	$this->Game->find('first', array('conditions' => array('Game.id' => $id),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.rate_count,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username,User.adcode,User.picture')),'Gamestat'=>array('fields'=>array('Gamestat.playcount,Gamestat.favcount,Gamestat.channelclone')))));//Recoded
		$user	=	$this->User->find('first', array('conditions' => array('User.id'=>$game['Game']['user_id']),'fields'=>array('*')));
		$this->layout='Business/business';
		if($game['Game']['clone']==1)
		{
		$original=$this->User->find('first',array('conditions' => array('User.id'=>$game['Game']['owner_id']),'fields'=>array('User.adcode'),'contain'=>false));
		$game['User']['adcode']=$original['User']['adcode'];
		}
		 //it is a game
		 $limit=10;
		 $activityData=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.seo_username'  )),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username',  'ChannelUser.seo_username'))),'fields'=>array('Activity.id','Activity.performer_id','Activity.game_id','Activity.channel_id','Activity.msg_id','Activity.seen','Activity.notify','Activity.email','Activity.type','Activity.replied','Activity.created','PerformerUser.id','PerformerUser.username','PerformerUser.seo_username','ChannelUser.id','ChannelUser.username','ChannelUser.seo_username','Game.id','Game.name','Game.seo_url','Game.embed'),'conditions'=>array('Activity.game_id'=>$game['Game']['id']),'limit'=>$limit,'order'=>'Activity.created DESC'));
		 $this->set('tagActivities',$activityData);
		
		
		$limit=12;
		$this->paginate=array('Game'=>array('conditions' => array('Game.active'=>'1','Game.user_id'=>$game['Game']['user_id']),'limit' => $limit,'order' => array('Game.recommend' => 'desc')));
		$cond=$this->paginate('Game');
		$user_id=$this->Auth->user('id');
		$game_id = $game['Game']['id'];
		$fav_check=$this->Game->query('SELECT id FROM favorites WHERE user_id='.$user_id.' AND game_id='.$game_id);
		$clone_check=$this->Game->query('SELECT id FROM cloneships WHERE user_id='.$user_id.' AND game_id='.$game_id);
		
		$this->set('ownuser', $fav_check);
		$this->set('ownclone', $clone_check);
		$this->set('games', $cond);
		$this->set('user', $user);
		$this->set('game',$game);
		$this->set('title_for_layout', 'Clone Games');
		$this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
		$this->set('author_for_layout', 'Clone');
		if($game['Game']['embed']==NULL)
		{
			$this->render('/Businesses/playframe');
		}  
	}	
	
		public function category($userid,$categoryid) {

		$this->layout	=	'Business/business';
		$PaginateLimit	=	12;
		$user			=	$this->User->find('first', array('conditions' => array('User.id' => $userid),'fields'=>array('*')));
		$this->paginate	=	array('Game'=>array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid,'Game.category_id'=>$categoryid),'limit' => $PaginateLimit,'order' => array('Game.recommend' => 'desc'),'contain'=>array('Category'=>array('fields'=>array('Category.name')),'Gamestat'=>array('fields'=>array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone')))));
		$cond			=	$this->paginate('Game');
		$category		=	$this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id='.$userid.' group by games.category_id');

	   //========Get Current Subscription===============
	   $authid = $this->Session->read('Auth.User.id');
	   if($authid)
	   {
	   $subscribebefore=$this->Subscription->find("first",array("contain"=>false,"conditions"=>array("Subscription.subscriber_id"=>$authid,"Subscription.subscriber_to_id"=>$userid)));
	       if($subscribebefore!=NULL)
			{
			$this->set('follow',1);
			}else{
			$this->set('follow',0);
			}
	   }else{
	   		$this->set('follow',1);
	   }
	   //=======/Get Current Subscription===============

		$this->set('category',$category);
		$this->set('games', $cond);
		$this->set('user', $user);
		
		$this->set('title_for_layout', 'Clone Games');
		$this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
		$this->set('author_for_layout', 'Clone');
	}

		public function toprated($userid) {

		$this->layout	=	'Business/business';
		$PaginateLimit	=	12;
		$user			=	$this->User->find('first', array('conditions' => array('User.id' => $userid),'fields'=>array('*')));
		$this->paginate	=	array('Game'=>array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $PaginateLimit,'order' => array('Game.recommend' => 'desc'),'contain'=>array('Category'=>array('fields'=>array('Category.name')),'Gamestat'=>array('fields'=>array('Gamestat.playcount,Gamestat.favcount,Gamestat.totalclone')))));
		$cond			=	$this->paginate('Game');
		$category		=	$this->Game->query('SELECT categories.id as id, categories.name FROM games join categories ON games.category_id = categories.id WHERE user_id='.$userid.' group by games.category_id');

	   //========Get Current Subscription===============
	   $authid = $this->Session->read('Auth.User.id');
	   if($authid)
	   {
	   $subscribebefore=$this->Subscription->find("first",array("contain"=>false,"conditions"=>array("Subscription.subscriber_id"=>$authid,"Subscription.subscriber_to_id"=>$userid)));
	       if($subscribebefore!=NULL)
			{
			$this->set('follow',1);
			}else{
			$this->set('follow',0);
			}
	   }else{
	   		$this->set('follow',1);
	   }
	   //=======/Get Current Subscription===============

		$this->set('category',$category);
		$this->set('games', $cond);
		$this->set('user', $user);
		
		$this->set('title_for_layout', 'Clone Games');
		$this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
		$this->set('author_for_layout', 'Clone');
	}

	
	//This clone of search function fill be used for dashboard layout.
	public function search() {
	$this->layout='Business/business';
	if($this->request->is("GET") && isset($this->request->params['pass'][0]))
	{
	$param = $this->request->params['pass'][0];
	}
	
	//search icin veri girilmemisse ana sayfaya yonlendir.
	if(!isset($param) || $param=="" )
	{
	$this->redirect(array("controller"=>"businesses","action"=>"mysite"));
	}
	else
	{
	        $limit=16;
			$cond= array('AND'=>array('OR'=>array('Game.name LIKE'=>'%'.$param.'%','Game.description LIKE'=>'%'.$param.'%'),'Game.active'=>'1'));
			$this->paginate=array('Game'=>array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username')),'conditions' => $cond,'limit' => $limit));
			$data=$this->paginate('Game');
	    	$this->set('search',$data);
			
	$this->set('mygames', $cond);
	$this->set('title_for_layout', 'Clone - Game Search Engine');
	$this->set('description_for_layout', 'Clone - Game Search Engine powered by Google. Clone Search is specially designed for searching games');
	}
//		$this->leftpanel();
		$key=$param;
		$this->set('myParam',$key);
	    $userid = $this->Session->read('Auth.User.id');
	    
		
		$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
	    $userName = $user['User']['username'];
		$limit=120;
		$this->set('limit', $limit);
	    
	    $this->set('username', $userName);
		$this->set('user_id', $userid);
		//$this->set_suggested_channels();
		
	}
	
}
