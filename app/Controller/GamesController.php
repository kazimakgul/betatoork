<?php

/**
 * Games Controller
 *
 * @property Game $Game
 */
class GamesController extends AppController {

	public $name = 'Games';
	var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Category','Activity');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha','Facebook.Facebook','Time');
    public $components = array('Amazonsdk.Amazon','Recaptcha.Recaptcha');
    


 	public function isAuthorized($user) {
	    if (parent::isAuthorized($user)) {
	        return true;
	    }

	    if (($this->action === 'add') || ($this->action === 'add2') || ($this->action === 'dashboard') || 
	    	($this->action === 'mygames') || ($this->action === 'favorites') || ($this->action === 'start') || 
	    	($this->action === 'settings') || ($this->action === 'chains') || ($this->action === 'channel')) {
	       // All registered users can add posts
	        return true;
	    }
	    if (in_array($this->action, array('edit','edit2','delete'))) {
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

	if($this->Session->check('Auth.User')){
		$this->redirect(array("controller"=>"games","action"=>"dashboard"));
	}

		$this->layout='landing';
		$this->Game->recursive = 0;

		$limit=4;
    	$this->set('top_rated_games', $this->Game->find('all', array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username')),'conditions' => array('Game.active'=>'1','Game.id'=>$this->get_game_suggestions('Game.recommend')),'limit' => $limit,'order' => 'rand()')));
		$users=$this->User->find('all',array('contain' =>array('Userstat'),'limit'=>$limit,'order'=> array(
                'Userstat.potential' => 'desc')));
		$this->set('users', $users);

		$this->set('title_for_layout', 'Toork - Create Your Own Game Channel');
		$this->set('description_for_layout', 'Toork is a social network for online gamers. With Toork, you will be able to create your own game channel.');
		$this->set('author_for_layout', 'Toork');
	}
	
	public function index2() {

		$this->layout='landing';
		$this->Game->recursive = 0;

		$limit=8;
    	$this->set('top_rated_games', $this->Game->find('all', array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username')),'conditions' => array('Game.active'=>'1','Game.id'=>$this->get_game_suggestions('Game.recommend')),'limit' => $limit,'order' => 'rand()')));
		
		$this->set('most_played_games', $this->Game->find('all', array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username')),'conditions' => array('Game.active'=>'1','Game.id'=>$this->get_game_suggestions('Game.playcount')),'limit' => $limit,'order' => 'rand()')));


$cond = $this->Favorite->find('all',array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => '40'),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'Category','User'=>array('fields'=>array('User.username','User.seo_username'))))));
$cond2 = $this->Favorite->find('all',array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => '5'),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'User'=>array('fields'=>array('User.username','User.seo_username'))))));
$cond3 = $this->Favorite->find('all',array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => '4'),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize'),'User'=>array('fields'=>array('User.username','User.seo_username'))))));


		$this->set('slider', $cond);
		$this->set('featured', $cond2);
		$this->set('newgames', $cond3);

		$this->set('title_for_layout', 'Toork - Create Your Own Game Channel');
		$this->set('description_for_layout', 'Toork is a social network for online gamers. With Toork, you will be able to create your own game channel.');
	}

	
	public function mostplayed() {

   		$this->paginate = array(
	   		'Game' => array('limit'=>28,'order' => array('playcount' => 'desc')));

		$this->layout='base';
		$this->leftpanel();
		$this->logedin_user_panel();


		
		$this->set('most_played_games', $this->paginate('Game',array('Game.active'=>'1')));

		$this->set('title_for_layout', 'Toork - Most Played Games');
		$this->set('description_for_layout', 'Toork - find the most played online games and channels and play trend topic games');
	}
	
	
	public function lastadded() {
   		$this->paginate = array(
	   		'Game' => array('limit'=>28,'order' => array('created' => 'desc')));

		$this->layout='base';
		$this->leftpanel();
		$this->logedin_user_panel();
		
		$this->set('most_played_games', $this->paginate('Game',array('Game.active'=>'1')));

		$this->set('title_for_layout', 'Toork - New Games');
		$this->set('description_for_layout', 'Toork - Find the latest and popular online games so fresh and new games. Enjoy');
	}


	public function leftpanel(){
		$this->Game->recursive = 0;
		if($this->Session->read('LeftPanel.data')==NULL)
		$this->Session->write('LeftPanel.data',$this->Game->Category->find('all'));
		
		$this->set('category',$this->Session->read('LeftPanel.data'));
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



		$limit=8;
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
		$this->set('description_for_layout', 'Toork is a social network for online gamers. With Toork, you will be able to create your own game channel.');
	
	}

public function get_last_activities()
{
    if($this->Auth->user('id'))
	{ //openning of auth_id control
    $auth_id=$this->Session->read('Auth.User.id');
    $subscribed_ids=$this->Subscription->find('list',array('contain'=>false,'fields'=>array('Subscription.subscriber_to_id'),'conditions'=>array('Subscription.subscriber_id'=>$auth_id)));
	$activityData=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.seo_username')),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username','ChannelUser.seo_username'))),'conditions'=>array('Activity.performer_id'=>$subscribed_ids),'order'=>'Activity.created DESC'));
$this->set('lastactivities',$activityData);
    }else{//closing of auth_id control
   //if user is no logged in,get all activity data
	$activityData=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.seo_username')),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username','ChannelUser.seo_username'))),'order'=>'Activity.created DESC'));
$this->set('lastactivities',$activityData);
    }

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

       $this->get_last_activities();
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

    public function lucky_number()
	{
	
	 if ($this->Session->check('Dashboard.randomKey')) { 
      $key = $this->Session->read('Dashboard.randomKey'); 
    } 
    else { 
      $key = mt_rand(); 
      $this->Session->write('Dashboard.randomKey', $key); 
    } 
	return $key;
	}
   

	public function dashboard() {
		
		$this->layout='dashboard';
		
		$linkParam=isset($this->request->params['pass'][0]);
		if($linkParam=="welcome")
		$this->set('welcome',1);
		
		if($this->Session->read('FirstLogin')!=NULL)
		{
		$this->requestAction( array('controller'=>'users', 'action'=>'activationmailsender',$this->Session->read('FirstLogin')));
		$this->Session->write('FirstLogin',NULL);
		$this->Session->delete('FirstLogin');
		}
		
		$userid = $this->Session->read('Auth.User.id');$this->requestAction( array('controller'=>'userstats', 'action'=>'new_user',$userid));
	   	$user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	   	$userName = $user['User']['username'];
	   	$isActive = $user['User']['active'];

		$limit=16;
		$this->paginate=array('Game'=>array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username,User.id')),'conditions' => array('Game.active'=>'1','Game.id'=>$this->get_game_suggestions('Game.recommend')),'limit' => $limit));
		$this->paginate=array('order'=>sprintf('rand(%f)',$this->lucky_number()));
		$data=$this->paginate('Game');
    	$this->set('top_rated_games',$data);
		
		if ($this->RequestHandler->isAjax()) {  
		    $this->layout="ajax";
            $this->render('/Elements/NewPanel/gamebox/dashboard_game_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }
		
	    $this->set_suggested_channels();
	    $this->set('user',$user);
	    $this->set('username',$userName);
	    $this->set('isActive',$isActive);
		$this->set('title_for_layout', 'Dashboard - Toork Channel Manager');
		$this->set('description_for_layout', 'Your Dashboard knows what you want and helps you do everything easier.');
	    
	}
	

    public function favorites() {
	$this->layout='dashboard';
	$userid = $this->Session->read('Auth.User.id');
	$userName = $this->Session->read('Auth.User.username');
	$this->headerlogin();
   
   
    $limit=16;
	$this->paginate=array('Favorite'=>array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => $userid),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize,Game.embed'),'User'=>array('fields'=>array('User.username','User.seo_username,User.id'))))));
	$cond2=$this->paginate('Favorite');

	
    $this->set('favorites',$cond2);

	$this->set('title_for_layout',$userName.'- All Favorite Games');
	$this->set('description_for_layout', 'Find all the games that are favorited by '.$userName);
	$this->set_suggested_channels();	

   }


    public function chains() {

		$this->layout='dashboard';
		$this->headerlogin();
		
		$userid = $this->Session->read('Auth.User.id');
		$userName = $this->Session->read('Auth.User.username');

		$this->set('title_for_layout', $userName.' - Chains');
		$this->set('description_for_layout', $userName.' - All the chains of '.$userName);

        $this->set_suggested_channels();
		//$this->set('followers', $this->paginate('Subscription',array('Subscription.subscriber_id' => $userid)));
		
		$limit=18;
		$this->paginate=array('Subscription'=>array('contain'=>array('User'),'conditions' => array('Subscription.subscriber_id'=>$userid),'limit' => $limit,'order' => array('created' => 'desc')));
		$this->set('followers', $this->paginate('Subscription'));

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
		$this->set('description_for_layout', 'Toork is a social network for online gamers. With Toork, you will be able to create your own game channel.');
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
		$this->set('description_for_layout', 'Toork is a social network for online gamers. With Toork, you will be able to create your own game channel.');
	}
	
	
	public function toprated() {
		$this->layout='base';
		$this->leftpanel();
		$this->logedin_user_panel();

		$this->set('top_rated_games', $this->paginate('Game',array('Game.active'=>'1')));

		$this->set('title_for_layout', 'Toork - Top Rated Games');
		$this->set('description_for_layout', 'Find the best and toprated online games and play and rate popular games online');	
	}

	public function toprated2() {
		$this->layout='dashboard';
		$this->headerlogin();

		$limit=16;
		$this->paginate=array('Game'=>array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username,User.id')),'conditions' => array('Game.active'=>'1'),'limit' => $limit));
		$data=$this->paginate('Game');
    	$this->set('top_rated_games',$data);
		
		if ($this->RequestHandler->isAjax()) {  
		    $this->layout="ajax";
            $this->render('/Elements/NewPanel/gamebox/toprated_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }
		
		
		
		$this->set('title_for_layout', 'Toork - Top Rated Games');
		$this->set('description_for_layout', 'Find the best and toprated online games and play and rate popular games online');	


    	$this->set_suggested_channels();
	}

	public function playedgames() {
	$this->layout='base';

	$this->leftpanel();
    $userid = $this->request->params['pass'][0];
	$this->usergame_user_panel($userid);
    $user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    $userName = $user['User']['username'];
    $this->set('top_rated_games', $this->paginate('Playcount',array('Playcount.user_id'=>$userid,'Game.active'=>1)));

    $this->set('username', $userName);
	$this->set('userid', $userid);
	$this->set('title_for_layout',  $userName.' - Played Games - Toork');
	$this->set('description_for_layout', 'Find all the games that'.$userName.' played recently');

	}

	public function categorygames() {
		$this->layout='base';
		$this->leftpanel();
		$this->logedin_user_panel();
		$catid = $this->request->params['pass'][0];
		$category = $this->Category->find('first', array('conditions' => array('Category.id' => $catid)));
		$catName = $category['Category']['name'];
		$this->set('top_rated_games', $this->paginate('Game',array('Game.active'=>'1','Game.category_id'=>$catid)));

		$this->set('title_for_layout',  $catName.' - Top Rated '.$catName.' Games - Toork');
		if($catName == 'Action'){
			$this->set('description_for_layout', 'An action game requires players to use quick reflexes, accuracy, and timing to overcome obstacles.');
		}elseif($catName == 'Adventure'){
			$this->set('description_for_layout', 'Adventure games put little pressure on the player in the form of action-based challenges or time constraints, adventure games have had the unique ability to appeal to people who do not normally play video games');
		}elseif($catName == 'Race'){
			$this->set('description_for_layout', 'Racing games typically place the player in the drivers seat of a high-performance vehicle and require the player to race against other drivers or sometimes just time.');
		}elseif($catName == 'Shooting'){
			$this->set('description_for_layout', 'First-person shooter video games, commonly known as FPSs, emphasize shooting and combat from the perspective of the character controlled by the player.');
		}elseif($catName == 'Board'){
			$this->set('description_for_layout', 'Many popular board games have computer versions. AI opponents can help improve ones skill at traditional games. Chess, Checkers, Othello and Backgammon have world class computer programs.');
		}elseif($catName == 'Multiplayer'){
			$this->set('description_for_layout', 'Party games are video games developed specifically for multiplayer games between many players. Normally, party games have a variety of mini-games that range between collecting more of a certain item than other players or having the fastest time at something.');
		}elseif($catName == 'Puzzle'){
			$this->set('description_for_layout', 'Puzzle games require the player to solve logic puzzles or navigate complex locations such as mazes. They are well suited to casual play, and tile-matching puzzle games are among the most popular casual games.');
		}elseif($catName == 'Card'){
			$this->set('description_for_layout', 'All popular card games have computer versions. AI opponents can help improve ones skill at traditional games. ');
		}elseif($catName == '3D'){
			$this->set('description_for_layout', 'Play real time 3d games which are choosen by experienced players');
		}elseif($catName == 'Kids'){
			$this->set('description_for_layout', 'Kids games are safe for kids under 13. Enjoy these kids games');
		}elseif($catName == 'Girls'){
			$this->set('description_for_layout', 'Games especially designed for girls');
		}elseif($catName == 'Word'){
			$this->set('description_for_layout', 'Play most popular word games');
		}elseif($catName == 'Role-Playing'){
			$this->set('description_for_layout', 'Role-playing video games draw their gameplay from traditional role-playing games. Most cast the player in the role of one or more adventurers who specialize in specific skill sets while progressing through a predetermined storyline.');
		}elseif($catName == 'Fighting'){
			$this->set('description_for_layout', 'Fighting games emphasize one-on-one combat between two characters, one of which may be computer controlled. These games are usually played by linking together long chains of button presses on the controller to use physical attacks to fight.');
		}elseif($catName == 'MMORPG'){
			$this->set('description_for_layout', 'Massively multiplayer online role-playing games, or MMORPGs, emerged in the mid to late 1990s as a commercial, graphical variant of text-based MUDs, which had existed since 1978.');
		}elseif($catName == 'Sports'){
			$this->set('description_for_layout', 'Sports games emulate the playing of traditional physical sports. Some emphasize actually playing the sport, while others emphasize the strategy behind the sport.');
		}elseif($catName == 'Social'){
			$this->set('description_for_layout', 'Social simulation games base their gameplay on the social interaction between multiple artificial lives.');
		}else{
			$this->set('description_for_layout',  $catName.' - Best games in this category');
		}
	}

public function categorygames2() {
		$this->layout='dashboard';
		$this->leftpanel();
		$this->headerlogin();
		$this->set_suggested_channels();
		$catid = $this->request->params['pass'][0];
		$category = $this->Category->find('first', array('conditions' => array('Category.id' => $catid)));
		$catName = $category['Category']['name'];
		
		$limit=16;
		$this->paginate=array('Game'=>array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username')),'conditions' => array('Game.active'=>'1','Game.category_id'=>$catid),'limit' => $limit));
		$data=$this->paginate('Game');
    	$this->set('top_rated_games',$data);
		
		if ($this->RequestHandler->isAjax()) {  
		    $this->layout="ajax";
            $this->render('/Elements/NewPanel/gamebox/dashboard_game_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }
		
		
		$this->set('catName', $catName);

		$this->set('title_for_layout',  $catName.' - Top Rated '.$catName.' Games - Toork');
		if($catName == 'Action'){
			$this->set('description_for_layout', 'An action game requires players to use quick reflexes, accuracy, and timing to overcome obstacles.');
		}elseif($catName == 'Adventure'){
			$this->set('description_for_layout', 'Adventure games put little pressure on the player in the form of action-based challenges or time constraints, adventure games have had the unique ability to appeal to people who do not normally play video games');
		}elseif($catName == 'Race'){
			$this->set('description_for_layout', 'Racing games typically place the player in the drivers seat of a high-performance vehicle and require the player to race against other drivers or sometimes just time.');
		}elseif($catName == 'Shooting'){
			$this->set('description_for_layout', 'First-person shooter video games, commonly known as FPSs, emphasize shooting and combat from the perspective of the character controlled by the player.');
		}elseif($catName == 'Board'){
			$this->set('description_for_layout', 'Many popular board games have computer versions. AI opponents can help improve ones skill at traditional games. Chess, Checkers, Othello and Backgammon have world class computer programs.');
		}elseif($catName == 'Multiplayer'){
			$this->set('description_for_layout', 'Party games are video games developed specifically for multiplayer games between many players. Normally, party games have a variety of mini-games that range between collecting more of a certain item than other players or having the fastest time at something.');
		}elseif($catName == 'Puzzle'){
			$this->set('description_for_layout', 'Puzzle games require the player to solve logic puzzles or navigate complex locations such as mazes. They are well suited to casual play, and tile-matching puzzle games are among the most popular casual games.');
		}elseif($catName == 'Card'){
			$this->set('description_for_layout', 'All popular card games have computer versions. AI opponents can help improve ones skill at traditional games. ');
		}elseif($catName == '3D'){
			$this->set('description_for_layout', 'Play real time 3d games which are choosen by experienced players');
		}elseif($catName == 'Kids'){
			$this->set('description_for_layout', 'Kids games are safe for kids under 13. Enjoy these kids games');
		}elseif($catName == 'Girls'){
			$this->set('description_for_layout', 'Games especially designed for girls');
		}elseif($catName == 'Word'){
			$this->set('description_for_layout', 'Play most popular word games');
		}elseif($catName == 'Role-Playing'){
			$this->set('description_for_layout', 'Role-playing video games draw their gameplay from traditional role-playing games. Most cast the player in the role of one or more adventurers who specialize in specific skill sets while progressing through a predetermined storyline.');
		}elseif($catName == 'Fighting'){
			$this->set('description_for_layout', 'Fighting games emphasize one-on-one combat between two characters, one of which may be computer controlled. These games are usually played by linking together long chains of button presses on the controller to use physical attacks to fight.');
		}elseif($catName == 'MMORPG'){
			$this->set('description_for_layout', 'Massively multiplayer online role-playing games, or MMORPGs, emerged in the mid to late 1990s as a commercial, graphical variant of text-based MUDs, which had existed since 1978.');
		}elseif($catName == 'Sports'){
			$this->set('description_for_layout', 'Sports games emulate the playing of traditional physical sports. Some emphasize actually playing the sport, while others emphasize the strategy behind the sport.');
		}elseif($catName == 'Social'){
			$this->set('description_for_layout', 'Social simulation games base their gameplay on the social interaction between multiple artificial lives.');
		}else{
			$this->set('description_for_layout',  $catName.' - Best games in this category');
		}
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
	
	
	

	public function play2_user_panel($userid) {

		$channelstat = $this->User->find('first',array('conditions' => array('User.id' => $userid)));
	    
	    $this->set('userid', $userid);
	    $this->set('gamenumber', $channelstat['Userstat']['uploadcount']);
	    $this->set('favoritenumber', $channelstat['Userstat']['favoritecount']);
	    $this->set('subscribe', $channelstat['Userstat']['subscribe']);
	    $this->set('subscribeto', $channelstat['Userstat']['subscribeto']);
	    $this->set('playcount', $channelstat['Userstat']['playcount']);

	}


public function mygames() {

		$this->layout='dashboard';
		$userid = $this->Session->read('Auth.User.id');
		$this->headerlogin();
		
		$limit=16;
		
		$this->paginate=array('Game'=>array('conditions' => array('Game.user_id'=>$userid),'fields' => array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize,Game.embed,Game.clone,User.seo_username'),'limit' => $limit,'order' => array('Game.created' => 'desc')));
		$cond=$this->paginate('Game');
        $this->set('mygames', $cond);

		$this->set('title_for_layout', 'Toork - Create your own game channel');
		$this->set('description_for_layout', 'Toork is a social network for online gamers. With Toork, you will be able to create your own game channel.');
	    $this->set_suggested_channels();
   
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
	$limit=8;
	$limit2=6;
	$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    )));
	
	$this->set('title_for_layout', $userName.' - Welcome to '.$userName."'s game channel published by Toork");
	$this->set('description_for_layout', 'Toork is a social network for online gamers. With Toork, you will be able to create your own game channel.');
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

	public function recommend() {
		$this->loadModel('User');
		$this->loadModel('Subscription');
		$this->layout='dashboard';
       
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
		$restrict=10;
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

	}

public function channelfavorites() {
$this->layout="ajax";
$userid = $this->request->params['pass'][0];
	
	$limit=12;
	$this->paginate=array('Favorite'=>array('conditions'=>array('Favorite.active'=>1,'Favorite.user_id' => $userid),'limit' =>$limit,'order' => array('Favorite.recommend' => 'desc'),'contain'=>array('Game'=>array('fields'=>array('Game.name,Game.seo_url,Game.id,Game.picture,Game.starsize,Game.embed'),'User'=>array('fields'=>array('User.username','User.seo_username'))))));
	$cond2=$this->paginate('Favorite');
	$this->set('favorites', $cond2);
}

public function channelfollowers() {
$this->layout="ajax";
$userid = $this->request->params['pass'][0];
	
	$limit=18;
	$this->paginate=array('Subscription'=>array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username')),'conditions' => array('Subscription.subscriber_to_id' => $userid),'limit' => $limit));
	$data=$this->paginate('Subscription');
	$this->set('followers',$data);
	
}

public function loadprofilefeeds() {
$this->layout="ajax";
$userid = $this->request->params['pass'][0];

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

$this->set('profile_uid',$userid);
}


public function profile() {

	$this->layout='dashboard';
    $userid = $this->request->params['pass'][0];
    $authid = $this->Session->read('Auth.User.id');

	if(!is_numeric($userid)){
	$userconvert = $this->User->find('first', array('contain'=>false,'conditions' => array('User.seo_username' => $userid)));
	$userid=$userconvert['User']['id'];
	}
	
    $user = $this->User->find('first', array('conditions' => array('User.id' => $authid),'fields'=>array('*')));
    $publicUser = $this->User->find('first', array('conditions' => array('User.id' => $userid),'fields'=>array('*')));
    
	if($publicUser==NULL){
		$this->redirect('/');
	}
    $userName = $user['User']['username'];
    $publicName = $publicUser['User']['username'];
    $publicDesc = $publicUser['User']['description'];
	
	$limit=12;
	$this->paginate=array('Game'=>array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    )));
	$cond=$this->paginate('Game');
	$this->set('mygames', $cond);
	if ($this->RequestHandler->isAjax()) {  
		    $this->layout="ajax";
            $this->render('/Elements/NewPanel/profile/channel_game_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
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
	$this->set('profile_uid',$userid);
	$this->set('top_rated_games', $this->Game->find('all', array('conditions' => array('Game.active'=>'1'),'limit' => $limit,'order' => array('Game.recommend' => 'desc'))));
    $this->set('username', $userName);
    $this->set('publicname', $publicName);
	$this->set('userid', $userid);
	$this->set('user', $user);
	$this->set('publicuser', $publicUser);

	$this->set_suggested_channels();	
	$this->set('title_for_layout', $publicName.' Game Channel - Toork');
	$this->set('description_for_layout', 'Play games on '.$publicName.' : '.$publicDesc);

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

	$this->set('title_for_layout',$userName.' - All Channel Games');
	$this->set('description_for_layout', 'Find all the games that are published by '.$userName);
	
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
    $this->set('favorites',$this->paginate('Favorite',array('Favorite.user_id'=>$userid)));
    $this->set('username', $userName);
	$this->set('user_id', $userid);

	$this->set('title_for_layout',$userName.'- All Favorite Games');
	$this->set('description_for_layout', 'Find all the games that are favorited by '.$userName);	

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
		$this->set('description_for_layout', $userName.' - All the followers of '.$userName);
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
		$this->set('title_for_layout', $userName.' - Chains');
		$this->set('description_for_layout', $userName.' - All the chains of '.$userName);
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
		$this->set('description_for_layout', 'Toork has all the best channels for games and gamers');
		$this->set('user_id', $userid);
		$this->set('users', $this->paginate('User',array('User.active' => '1')));

	}

		public function bestchannels2() {
		//More Buttonu ile gpaginate edilecek...

		$this->layout='dashboard';
		$this->headerlogin();
		$authid = $this->Session->read('Auth.User.id');
		//Get the list of subscriptions of auth user.
		   if($authid!=NULL)
		   {
		   $listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		   $listofuser=$this->Subscription->find('list');
		   $mutuals=array_intersect($listofmine,$listofuser);
		   $this->set('mutuals',$mutuals);
		   }else{
		   $listofmine="null";
		   $this->set('mutuals',NULL);
		   }

		$this->set('title_for_layout', 'Toork - Best Online Game Channels ');
		$this->set('description_for_layout', 'Toork has all the best channels for games and gamers');
		$this->set('user_id', $authid);
		
		$limit=15;
		$this->paginate=array('User'=>array('conditions'=>array('NOT' => array('User.id' => $listofmine)),'contain' =>array('Userstat'),'limit'=>$limit,'order'=> array(
                'Userstat.potential' => 'desc')));
		$users=$this->paginate('User');
        $this->set('users',$users);
		
		if ($this->RequestHandler->isAjax()) {  
		    $this->layout="ajax";
            $this->render('/Elements/NewPanel/bestchannel_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }
		
		
	    $this->set_suggested_channels();

	}

		public function start() {
		//More Buttonu ile gpaginate edilecek...

		$this->layout='starter';
		$this->headerlogin();
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
		$this->set('description_for_layout', 'Toork has all the best channels for games and gamers');
		$this->set('user_id', $userid);
		$users=$this->User->find('all',array('conditions'=>array('NOT' => array('User.id' => $listofmine)),'contain' =>array('Userstat'),'limit'=>10,'order'=> array(
                'Userstat.potential' => 'desc')));
		$this->set('users',$users);
	    $this->set_suggested_channels();



	}

	
	public function get_3_games($channel_id=NULL)
	{
	//This function gets 3 random games for determined channel id.
	$count=3;
	$games=$this->Game->find('all',array('conditions'=>array('Game.user_id'=>$channel_id),'contain' =>array('User'),'order' => 'RAND()','limit' => $count));
	return $games;
	}


		public function follow_card($userid) {

        $channelstat = $this->User->find('first',array('contain'=>'Userstat','conditions' => array('User.id' => $userid)));

	    $gamenumber = $channelstat['Userstat']['uploadcount'];
	    $favoritenumber = $channelstat['Userstat']['favoritecount'];
	    $subscribe = $channelstat['Userstat']['subscribe'];
	    $subscribeto = $channelstat['Userstat']['subscribeto'];
	    $playcount = $channelstat['Userstat']['playcount'];
    	$userName = $channelstat['User']['username'];
    	$userUrl = $channelstat['User']['seo_username'];
    	return array($userName,$gamenumber, $favoritenumber, $subscribe, $subscribeto, $playcount,$channelstat,$userUrl);
		
	
		
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

$this->set('title_for_layout', 'Toork - Game Search Engine');
$this->set('description_for_layout', 'Toork - Game Search Engine powered by Google. Toork Search is specially designed for searching games');
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

//This clone of search function fill be used for dashboard layout.
public function search2() {
$this->layout='dashboard';
$this->headerLogin();
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



//$this->set('search', $this->paginate('Game',$cond));

        $limit=16;
		$cond= array('AND'=>array('OR'=>array('Game.name LIKE'=>'%'.$param.'%','Game.description LIKE'=>'%'.$param.'%','User.username LIKE'=>'%'.$param.'%'),'Game.active'=>'1'));
		$this->paginate=array('Game'=>array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username')),'conditions' => $cond,'limit' => $limit));
		$data=$this->paginate('Game');
    	$this->set('search',$data);
		
		if ($this->RequestHandler->isAjax()) {  
		    $this->layout="ajax";
            $this->render('/Elements/NewPanel/gamebox/search_game_box_ajax');   // Render a special view for ajax pagination
            return;  // return the ajax paginated content without a layout
        }


$this->set('mygames', $cond);

$this->set('title_for_layout', 'Toork - Game Search Engine');
$this->set('description_for_layout', 'Toork - Game Search Engine powered by Google. Toork Search is specially designed for searching games');
}


	$this->leftpanel();
	//$this->logedin_user_panel();

	$key=$param;
	$this->set('myParam',$key);
    $userid = $this->Session->read('Auth.User.id');
    
	
	$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    $userName = $user['User']['username'];
	$limit=120;
	$this->set('limit', $limit);
    
    $this->set('username', $userName);
	$this->set('user_id', $userid);
	$this->set_suggested_channels();
	
}

	public function random() {
        $random = $this->Game->find('first',array(
                'conditions' => array(
                        'Game.active'=>1,
                ),
                'order' => 'rand()',
				'contain'=>array('User'=>array('fields'=>array('User.seo_username'))),
				'fields'=>array('Game.id,Game.seo_url')
        ));//Recoded
		$this->Session->write('Random.flag',1);
		$this->Session->write('Random.game',$random['Game']['seo_url']);
		$this->Session->write('Random.user',$random['User']['seo_username']);
}

public function random2() {
        $random2 = $this->Game->find('first',array(
                'conditions' => array(
                        'Game.active'=>1,
                ),
                'order' => 'rand()',
				'contain'=>array('User'=>array('fields'=>array('User.seo_username'))),
				'fields'=>array('Game.id,Game.seo_url','Game.embed','Game.name')
        ));//Recoded
		$this->Session->write('Random2.flag',1);
		$this->Session->write('Random2.game',$random2);
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

public function favorite_check($game_id)
{
$this->layout="ajax";
$user_id=$this->Auth->user('id');
$favbefore=$this->Game->Favorite->find("first",array("contain"=>false,"conditions"=>array("Favorite.user_id"=>$user_id,"Favorite.game_id"=>$game_id),"fields"=>array("Favorite.user_id","Favorite.game_id","Favorite.id")));
if(empty($favbefore))
			{
			echo 0;
			
			}
			else
			{
			echo 1;
			}

}


	public function play($id = null) {
		
		if($this->Session->read('Random.flag')!=1)
		{
    	$this->random();
		$this->set('randomgame',$this->Session->read('Random.game'));
		$this->set('randomuser',$this->Session->read('Random.user'));
		}else{
		$this->set('randomgame',$this->Session->read('Random.game'));
		$this->set('randomuser',$this->Session->read('Random.user'));
		}
		
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

    $this->render();
	if($this->Session->read('Random.flag')==1)
    $this->random();

	}


	public function play2($id = null) {
	
		$this->leftpanel();
		
		if($this->Session->read('Random.flag')!=1)
		{
    	$this->random();
		$this->set('randomgame',$this->Session->read('Random.game'));
		$this->set('randomuser',$this->Session->read('Random.user'));
		}else{
		$this->set('randomgame',$this->Session->read('Random.game'));
		$this->set('randomuser',$this->Session->read('Random.user'));
		}
		
    	$this->fav_check($id);
		$this->layout='game_index2';
		$this->play2_user_panel($id);
		$game = $this->Game->find('first', array('conditions' => array('Game.id' => $id),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username')))));//Recoded
		$user = $this->User->find('first', array('conditions' => array('User.id' => $game['Game']['user_id'])));
		$user_id = $user['User']['id'];
		$auth_id=$this->Auth->user('id');
		$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$user_id),'limit' => 4,'order' => array('Game.recommend' => 'desc')));

		$this->set('user', $user);
		$this->set('username', $user['User']['username']);
		$this->set('user_id', $user_id);
		$this->set('mygames', $cond);
		
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

    $this->render();
	if($this->Session->read('Random.flag')==1)
    $this->random();
   
	}



public function seoplay($channel=NULL,$seo_url=NULL) {

		if($this->Session->read('Random.flag')!=1)
		{
    	$this->random();
		$this->set('randomgame',$this->Session->read('Random.game'));
		$this->set('randomuser',$this->Session->read('Random.user'));
		}else{
		$this->set('randomgame',$this->Session->read('Random.game'));
		$this->set('randomuser',$this->Session->read('Random.user'));
		}
		
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
		$this->set('title_for_layout', $game['Game']['name'].' - '.$game['User']['seo_username'].' - Toork');

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
		
    $this->render();
	if($this->Session->read('Random.flag')==1)
    $this->random();

	}


	public function seoplay2($channel=NULL,$seo_url=NULL) {
		
		$this->layout='game_index2';
		
		$this->leftpanel();
		
		if($this->Session->read('Random.flag')!=1)
		{
    	$this->random();
		$this->set('randomgame',$this->Session->read('Random.game'));
		$this->set('randomuser',$this->Session->read('Random.user'));
		}else{
		$this->set('randomgame',$this->Session->read('Random.game'));
		$this->set('randomuser',$this->Session->read('Random.user'));
		}
		
		$channel_id=$this->User->find('first',array('conditions'=>array('User.seo_username'=>$channel),'fields'=>array('User.id'),'contain'=>false));

		$game = $this->Game->find('first', array('conditions' => array('Game.seo_url'=>$seo_url,'Game.user_id'=>$channel_id['User']['id']),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username,User.adcode,User.fb_link,User.twitter_link,User.gplus_link,User.website,User.picture'),'conditions'=>array('User.seo_username'=>$channel)))));

		if($game!=NULL)
		$id=$game['Game']['id'];
		$this->fav_check($id);
		

	
		if ($game==NULL) {
			throw new NotFoundException(__('Invalid game'));
		}
		
		$user_id = $game['User']['id'];
		$auth_id = $this->Auth->user('id');
		$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$user_id),'limit' => 4,'order' => array('Game.recommend' => 'desc')));
		$this->play2_user_panel($user_id);
		$this->set('sharedby',$game['User']['username']);//Recoded
        $this->set('username', $game['User']['username']);
		$this->set('user_id', $user_id);
		$this->set('mygames', $cond);
		$this->set('game', $game);
		$this->set('user', $game);
		$this->set('title_for_layout', $game['Game']['name'].' - '.$game['User']['seo_username'].' - Toork');
        
		//start size calculation for play page-Recoded
		$current=$this->Game->Rate->find("first",array("conditions"=>array("Rate.user_id"=>$auth_id,"Rate.game_id"=>$id),'contain'=>false,'fields'=>'Rate.current'));
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


    $this->render();
	if($this->Session->read('Random.flag')==1)
    $this->random();
   }

	public function playgame($channel=NULL,$seo_url=NULL) {
	
	//Getting Random Game Data
	if($this->Session->read('Random2.flag')!=1)
		{
    	$this->random2();
		$this->set('randomgame',$this->Session->read('Random2.game'));
		}else{
		$this->set('randomgame',$this->Session->read('Random2.game'));
		}
	
		$this->layout='dashboard';
		$this->headerLogin();
		
		$gameid = $this->request->params['pass'][0];
		if(is_numeric($gameid)){
			$game = $this->Game->find('first', array('conditions' => array('Game.id' => $gameid),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username,User.adcode,User.picture')))));//Recoded

		}else{
			$channel_id=$this->User->find('first',array('conditions'=>array('User.seo_username'=>$channel),'fields'=>array('User.id'),'contain'=>false));
			$game = $this->Game->find('first', array('conditions' => array('Game.seo_url'=>$seo_url,'Game.user_id'=>$channel_id['User']['id']),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username,User.adcode,User.fb_link,User.twitter_link,User.gplus_link,User.website,User.picture'),'conditions'=>array('User.seo_username'=>$channel)))));
			$gameid=$game['Game']['id'];
		}
		
		//==========Get Post Information About Game===========
		     $singlepost=$this->Game->query('SELECT * FROM messages WHERE type=1 AND game_id='.$gameid.'');
		     if($singlepost!=NULL)
		     {
			 $msg_id=$singlepost[0]['messages']['msg_id'];
			 $message=$singlepost[0]['messages']['message'];
			 $user_id=$singlepost[0]['messages']['uid_fk'];
			 $created=$singlepost[0]['messages']['created'];
			 $type=$singlepost[0]['messages']['type'];
			 $game_id=$singlepost[0]['messages']['game_id'];
			 $gamePost=array('id'=>$msg_id,'message'=>$message,'user_id'=>$user_id,'created'=>$created,'type'=>$type,'game_id'=>$game_id);
			 $this->set('gamepost',$gamePost);
		     }
		//=========//Get Post Information About Game===========
		
		
		//Oyun clonesa bu oyunun sahibinin adsense bilgilerini getir.
		if($game['Game']['clone']==1)
		{
		$original=$this->User->find('first',array('conditions' => array('User.id'=>$game['Game']['owner_id']),'fields'=>array('User.adcode'),'contain'=>false));
		$game['User']['adcode']=$original['User']['adcode'];
		}

		$this->set('game', $game);
		$this->set('title_for_layout', $game['Game']['name'].' - '.$game['User']['seo_username'].' - Toork');
		$this->set('description_for_layout', 'Play '.$game['Game']['name'].' for free: '.$game['Game']['description']);
	    $this->set_suggested_channels();
		
		
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
		
	//Set random game after rendering
    $this->render();
	if($this->Session->read('Random2.flag')==1)
    $this->random2();
   
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

	public function playgameframe($channel=NULL,$seo_url=NULL) {
	
	    //Getting Random Game Data
	    if($this->Session->read('Random2.flag')!=1)
		{
    	$this->random2();
		$this->set('randomgame',$this->Session->read('Random2.game'));
		}else{
		$this->set('randomgame',$this->Session->read('Random2.game'));
		}
	
	
		$this->layout='playgameframe';
		$this->headerLogin();
		
		$gameid = $this->request->params['pass'][0];
		if(is_numeric($gameid)){
			$game = $this->Game->find('first', array('conditions' => array('Game.id' => $gameid),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username,User.adcode,User.picture')))));//Recoded

		}else{
			$channel_id=$this->User->find('first',array('conditions'=>array('User.seo_username'=>$channel),'fields'=>array('User.id'),'contain'=>false));
			$game = $this->Game->find('first', array('conditions' => array('Game.seo_url'=>$seo_url,'Game.user_id'=>$channel_id['User']['id']),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username,User.adcode,User.fb_link,User.twitter_link,User.gplus_link,User.website,User.picture'),'conditions'=>array('User.seo_username'=>$channel)))));
		}

		$this->set('game', $game);
		$this->set('title_for_layout', $game['Game']['name'].' - '.$game['User']['seo_username'].' - Toork');
		$this->set('description_for_layout', 'Play '.$game['Game']['name'].' for free: '.$game['Game']['description']);
	    $this->set_suggested_channels();
		
	//Set random game after rendering
    $this->render();
	if($this->Session->read('Random2.flag')==1)
    $this->random2();	
   
	}

	public function headerlogin() {
		$userid = $this->Session->read('Auth.User.id');
	   	$user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	   	$userName = $user['User']['username'];

	    $this->set('user',$user);
	    $this->set('username',$userName);
	}

    //this gets game suggestions
	public function get_game_suggestions($order)
	{
	$top50=$this->Game->find('all', array('contain'=>array('User'=>array('fields'=>'User.seo_username,User.username')),'conditions' => array('Game.active'=>'1'),'limit' => 100,'order' => array($order => 'desc'
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


function seoUrlFormer($material='toork')
{
//Add incremental number at the end of the seo_url
preg_match('/^([^\d]+)([\d]*?)$/', $material, $match);
$material = $match[1];
$number = $match[2] + 1;
return $material.$number;
}

function checkDuplicateSeoUrl($seo_url='toork')
{

  do {
  
     $data=$this->Game->find('all',array('contain'=>false,'conditions'=>array('Game.seo_url'=>$seo_url),'fields'=>array('seo_url')));
     if($data==NULL)
	 {
	 return $seo_url;
	 }else{
	 $seo_url=$this->seoUrlFormer($seo_url);
	 }
    
  } while(1==1);

}


function secureSuperGlobalPOST($value)
    {
	    //$string = preg_replace('/[^\w\d_ -]/si', '', $value);<br />
        //Nokta ve virgülü de engelleyen kod iptal edildi.
        $string = htmlspecialchars(stripslashes($value));
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
    
	public function cloneS3Folder($old_id=NULL,$new_id=NULL)
	{
	
	
			//get objects from S3
			 $prefix = 'upload/games/'.$old_id.'/';
             $opt = array(
             'prefix' => $prefix,
             );
			 $bucket=Configure::read('S3.name');
			 $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
			 foreach($objs as $obj)
			 {
			 
			 $string = $obj;
             $prefix = "/".$old_id."/";
             $index = strpos($string, $prefix) + strlen($prefix);
             $result = substr($string, $index);
             //echo $result; 
			 
			     //=========================
	            //Aws S3 image copy process
	            //=========================
	            $response=$this->Amazon->S3->copy_object(
                array( // Source
               'bucket'   => Configure::read('S3.name'),
               'filename' => $obj
                ),
                array( // Destination
               'bucket'   => Configure::read('S3.name'),
               'filename' => 'upload/games/'.$new_id."/".$result
                ),
				array('acl' => AmazonS3::ACL_PUBLIC)
                );
				//print_r($response);
			 }
	  
	
	
	}
	
	//Chain functions clones game items on games table.
    public function clonegame($game_id=NULL) {
	   $this->layout="ajax";
	   $userId = $this->Session->read('Auth.User.id');
	   $targetGame=$this->Game->find('first',array('conditions'=>array('Game.id'=>$game_id),'fields'=>array('Game.id,Game.name,Game.link,Game.description,Game.active,Game.user_id,Game.category_id,Game.picture,Game.embed,Game.seo_url,Game.clone,Game.owner_id'),'contain'=>false));
	   if($targetGame!=NULL)
	   {
	        $this->request->data['Game']['name']=$targetGame['Game']['name'];
	        $this->request->data['Game']['link']=$targetGame['Game']['link'];
	        $this->request->data['Game']['description']=$targetGame['Game']['description'];
	        $this->request->data['Game']['active']=1;
	        $this->request->data['Game']['user_id']=$userId;
	        $this->request->data['Game']['category_id']=$targetGame['Game']['category_id'];
	        $this->request->data['Game']['picture']=$targetGame['Game']['picture'];
	        $this->request->data['Game']['starsize']=0;
	        $this->request->data['Game']['rate_count']=0;
	        $this->request->data['Game']['embed']=$targetGame['Game']['embed'];
	        $this->request->data['Game']['seo_url']=$this->checkDuplicateSeoUrl(str_replace('_','',Inflector::slug(strtolower(str_replace(' ','-',$this->request->data['Game']['name'])))));
	        $this->request->data['Game']['clone']=1;
			if($targetGame['Game']['owner_id']!=NULL && $targetGame['Game']['clone']==1)
			$this->request->data['Game']['owner_id']=$targetGame['Game']['owner_id'];
			else
			$this->request->data['Game']['owner_id']=$targetGame['Game']['user_id'];
			
			$this->Game->create();
			$this->Game->validate = array();//This line disabled validation rules for game add action.
			Configure::write('debug', 0);
	        if ($this->Game->save($this->request->data)) {
			    $this->requestAction( array('controller' => 'userstats', 'action' => 'getgamecount',$userId));
			    $id=$this->Game->getLastInsertId();
			    $this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$id,$userId));
				echo 1;//this means games has been clonned properly.
			    }else{
				echo 0;//this means there are some problems.
				}
	
	       $this->cloneS3Folder($game_id,$id);
	   }
	 
	}

  private static function make_absolute($url, $base) 
{
    // Return base if no url
    if( ! $url) return $base;

    // Return if already absolute URL
    if(parse_url($url, PHP_URL_SCHEME) != '') return $url;
    
    // Urls only containing query or anchor
    if($url[0] == '#' || $url[0] == '?') return $base.$url;
    
    // Parse base URL and convert to local variables: $scheme, $host, $path
    extract(parse_url($base));

    // If no path, use /
    if( ! isset($path)) $path = '/';
 
    // Remove non-directory element from path
    $path = preg_replace('#/[^/]*$#', '', $path);
 
    // Destroy path if relative url points to root
    if($url[0] == '/') $path = '';
    
    // Dirty absolute URL
    $abs = "$host$path/$url";
 
    // Replace '//' or '/./' or '/foo/../' with '/'
    $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
    for($n = 1; $n > 0; $abs = preg_replace($re, '/', $abs, -1, $n)) {}
    
    // Absolute URL is ready!
    return $scheme.'://'.$abs;
}


   public function get_image_link($url=NULL)
   {
   $this->layout='ajax';
 
	$request = curl_init();

curl_setopt_array($request, array
(
    CURLOPT_URL => $url,
    
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HEADER => FALSE,
    
    CURLOPT_SSL_VERIFYPEER => TRUE,
    CURLOPT_CAINFO => 'cacert.pem',

    CURLOPT_FOLLOWLOCATION => TRUE,
    CURLOPT_MAXREDIRS => 10,
));



$response = curl_exec($request);
curl_close($request);
//print_r($response);
	
$base="http://127.0.0.1/betatoorkson/";	
	
$document = new DOMDocument();

//print_r($response);
if($response)
{
    libxml_use_internal_errors(true);
	$document->loadHTML($response);
    libxml_clear_errors();
}
//echo $document->saveXML();

$images = array();

foreach($document->getElementsByTagName('img') as $img)
{
    // Extract what we want
    $image = array
    (
        'src' => $this->make_absolute($img->getAttribute('src'),$base)
    );
    
    // Skip images without src
    if( ! $image['src'])
        continue;

    // Add to collection. Use src as key to prevent duplicates.
    $images[$image['src']] = $image;
}
$images = array_values($images);

foreach($images as $image)
{
echo '<a href="'.$image['src'].'"><img width="130px" src="'.$image['src'].'"></a>';

}


   
   }

   
   public function add_virtual_game()
   {
   $this->layout='ajax';
   $fileName=rand(100,100000);
    $this->request->data['Game']['name']="SOntihOnHouse".$fileName;
	  $this->request->data['Game']['description']="this is a description";
      $this->request->data['Game']['user_id'] = $this->Auth->user('id');
	  $this->request->data['Game']['link'] = "http://www.mil".$fileName."liyet.com";	
	  $this->request->data['Game']['picture'] ="nbrrr.png";		
		//seourl begins
		$this->request->data['Game']['seo_url']=strtolower(str_replace(' ','-',$this->request->data['Game']['name']));
		//seourl ends
			$this->Game->create();
			$this->Game->validate = array();
			
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash(__('You have successfully added a game to your channel.'));
			
			}
   
   
   }
   
   
   public function addgame_ajax($url='http://www.imdb.com')
   {
   $this->layout='ajax';
   App::uses('Folder', 'Utility');
   App::uses('File', 'Utility');
   
	  
	  if($userid = $this->Session->read('Auth.User.id'))
      {
	 $basic_info=$this->get_meta($url);
	 echo $basic_info['title'].'<br>';
	 echo $basic_info['description'];
	 
	 if(empty($basic_info['title']))
	 $basic_info['title']='Write A Title';
	 if(empty($basic_info['description']))
	 $basic_info['description']='Write A Desc';
	  //----------------------------
	  
	  //=============Get ScreenShot==================		
	  $fileName=rand(100,100000);	
     
      $command = "xvfb-run --server-args='-screen 0, 1024x768x24' /usr/bin/wkhtmltopdf ".$url." /home/ubuntu/test/".$fileName.".pdf";
      exec($command, $output, $ret);
	  print_r($output);print_r($ret);
	  $command2 = "convert /home/ubuntu/test/".$fileName.".pdf -append /home/ubuntu/test/".$fileName."_toorksize.png";
      exec($command2, $output2, $ret2);
	  $command3 = "convert /home/ubuntu/test/".$fileName."_toorksize.png -quiet  -crop 640x350+30+30  +repage  /home/ubuntu/test/".$fileName."_toorksize.png";
      exec($command3, $output3, $ret3);
	
			
			//=============/Get ScreenShot=================		
			
	  
	  $this->request->data['Game']['name']=$this->secureSuperGlobalPOST($basic_info['title']);
	  $this->request->data['Game']['description']=$this->secureSuperGlobalPOST($basic_info['description']);
      $this->request->data['Game']['user_id'] = $this->Auth->user('id');
	  $this->request->data['Game']['link'] = $url;	
	  $this->request->data['Game']['picture'] = $fileName.".png";		
		//seourl begins
		$this->request->data['Game']['seo_url']=strtolower(str_replace(' ','-',$basic_info['title']));
		//seourl ends
			
			$this->Game->create();
			$this->Game->validate = array();
			
			if ($this->Game->save($this->request->data)) {
			    $this->requestAction( array('controller' => 'userstats', 'action' => 'getgamecount',$userid));
				$this->Session->setFlash(__('You have successfully added a game to your channel.'));
			
			$id=$this->Game->getLastInsertId();
			$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$id,$userid));
			
			//================Throw to S3==================
			 $this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/games/'.$id.'/'.$fileName.'_toorksize.png',
             array(
			'fileUpload' => "/home/ubuntu/test/".$fileName."_toorksize.png",
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			//============/Throw to S3==========================
			
			//============Folder Formatting begins============
			$dir = new Folder("/home/ubuntu/test");
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $file->delete();
            $file->close(); 
            }
			//============/Folder Formatting ends============	
				

				$this->redirect(array('action' => 'mygames'));
			} else {
				$validationErrors = $this->Game->invalidFields();
				$value = key($validationErrors);
    			$this->Session->setFlash($validationErrors[$value][0]);echo $validationErrors[$value][0];
			}
	  
	  //----------------------------
	  
      }
   /*
   if ($ret) {
      die;
             }
   */
   
   }
   

   public function getscreen($url,$name) {
   $this->layout='ajax';
  
  if(!isset($url) || !isset($name))
  break;
  
 
      $command = "xvfb-run --server-args='-screen 0, 1024x768x24' /usr/bin/wkhtmltopdf ".$url." /home/ubuntu/test/".$name.".pdf";
      exec($command, $output, $ret);
	  print_r($output);print_r($ret);
	  $command2 = "convert /home/ubuntu/test/".$name.".pdf -append /home/ubuntu/test/".$name.".png";
      exec($command2, $output2, $ret2);
	  $command3 = "convert /home/ubuntu/test/".$name.".png -quiet  -crop 400x220+30+30  +repage  /home/ubuntu/test/".$name.".png";
      exec($command3, $output3, $ret3);
      if ($ret) {
      die;
                }
   
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
			    $this->requestAction( array('controller' => 'userstats', 'action' => 'getgamecount',$userid));
				$this->Session->setFlash(__('You have successfully added a game to your channel.'));
			
			$id=$this->Game->getLastInsertId();
			$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$id,$userid));	
				
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

	$this->set('title_for_layout','Add New Game');
	$this->set('description_for_layout', 'You are able to add a new game');		
		
	}

   public function get_meta($url=NULL)
   {
   //Get Meta tags
   $tags = get_meta_tags($url);
   //print_r($tags);
   
   //Get title
   preg_match("/<title>(.+)<\/title>/siU", file_get_contents($url), $matches);
   $title = $matches[1];
   $basic_info=array('title'=>$title,'description'=>$tags['description']);
   return $basic_info;
   
   }


	public function add2() {
	
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
		$this->layout='dashboard';
		$this->headerlogin();
		$userid = $this->Session->read('Auth.User.id');

    	$limit=12;
		$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    )));
		$user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
		$isActive = $user['User']['active'];
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
			    $this->requestAction( array('controller' => 'userstats', 'action' => 'getgamecount',$userid));
				$this->Session->setFlash(__('You have successfully added a game to your channel.'));
			
			$id=$this->Game->getLastInsertId();
			$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$id,$userid));	
				
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
				
				
				
				
				$this->redirect(array('action' => 'mygames'));
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
		$this->set(compact('users2', 'categories'));
		$this->set('user', $user);
		$this->set('isActive', $isActive);
	$this->set('title_for_layout','Add New Game');
	$this->set('description_for_layout', 'You are able to add a new game');
	$this->set_suggested_channels();		
		
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
			
			/*
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
			*/
			
			
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

	$this->set('title_for_layout','Edit Your Game');
	$this->set('description_for_layout', 'You are able to edit your game');			
	}


public function edit2($id = null) {
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
		$this->layout='dashboard';
		$this->headerlogin();
		$userid = $this->Session->read('Auth.User.id');
    	$limit=12;
		$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc'
    )));


		$this->Game->id = $id;
		$clone=$this->Game->field('clone');
		$this->set('clone',$clone);
		
    	$game = $this->Game->find('first', array('conditions' => array('Game.id' => $id)));
    	$this->set("game",$game);
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
		   $this->request->data['Game']['name']=substr($this->secureSuperGlobalPOST($this->request->data['Game']['name']),0,25);
		   $this->request->data['Game']['description']=$this->secureSuperGlobalPOST($this->request->data['Game']['description']);
		   
			//$this->request->data['Game']['link']=$this->http_check($this->request->data['Game']['link']);
			
			$myval=$this->request->data["Game"]["edit_picture"]["name"];
			
			if($myval!="")
			{
			/*
			//Folder Formatting begins
			$dir = new Folder(WWW_ROOT ."/upload/games/".$id);
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $file->delete();
            $file->close(); 
            }
			//Folder Formatting ends
			*/
			
			$this->request->data["Game"]["picture"]=$this->request->data["Game"]["edit_picture"];
			
			
			//Replace Name of Picture Begins
			$ext = ".".$this->getExtension($this->request->data["Game"]["picture"]["name"]);
		    $this->request->data["Game"]["picture"]["name"]="toork_".$this->request->data['Game']['name'].$ext;
			//Replace Name of Picture Ends
			}
			
			
			//seourl begins
		     $this->request->data['Game']['seo_url']=$this->checkDuplicateSeoUrl(str_replace('_','',Inflector::slug(strtolower(str_replace(' ','-',$this->request->data['Game']['name'])))));
		    //seourl ends
			
			
			
			//*********************
			//Secure data filtering
			//*********************
			$filtered_data=
			array('Game' =>array(
			'name' => $this->request->data['Game']['name'],
			'description' => $this->request->data['Game']['description'],
			'category_id' => $this->request->data['Game']['category_id'],
			'seo_url' => $this->request->data['Game']['seo_url']));
			//if game is not clone,submits link & embed datas otherwise not!
			if(!$clone)
			{
			$filtered_data['Game']['link']=$this->request->data['Game']['link'];
			$filtered_data['Game']['embed']=$this->request->data['Game']['embed'];
			}
			//if new image exists,submit,otherwise not!
			if($myval!="")
			{
			$filtered_data['Game']['picture']=$this->request->data["Game"]["picture"];
			}
			
			if ($this->Game->save($filtered_data)) {
				$this->Session->setFlash('You have successfully updated your game.');
				
				
				
				//Upload to aws begins
			$dir = new Folder(WWW_ROOT ."/upload/games/".$id);
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $info=$file->info();
			$basename=$info["basename"];
			if(strpos($basename,"toorksize")!=false)
			{
	        echo $basename;
			$ret3=$this->crop_game_image($basename,$id);
			}
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
				
				//if ($ret3) {
                //die;
                //}
				
				$this->redirect(array('action' => 'mygames'));
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
		$this->set(compact('users2', 'categories'));

	$this->set('title_for_layout','Edit Your Game');
	$this->set('description_for_layout', 'You are able to edit your game');
	$this->set_suggested_channels();
	}



public function crop_game_image($game_name,$id)
{

$command3 = "mkdir /home/ubuntu/test/".$id." && convert /var/www/betatoork/app/webroot/upload/games/".$id."/".$game_name." -quiet  -crop 200x110+30+30  +repage  /home/ubuntu/test/".$id."/".$game_name."";
exec($command3, $output3, $ret3);
//print_r($output3);print_r($ret3);
   
   return $ret3;
			
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
		$userid=$this->Game->field('user_id');
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->Game->delete()) {
			$this->Session->setFlash(__('You have deleted your game successfully, That game will no longer be visible'));
			$this->requestAction( array('controller' => 'userstats', 'action' => 'getgamecount',$userid));
			$this->redirect(array('action' => 'mygames'));
		}
		$this->Session->setFlash(__('Your game was not deleted'));
		$this->redirect(array('action' => 'mygames'));
	}
	
	
 public function deleteS3Image($id=NULL)
 {
 
 //remove objects from S3
			 $prefix = 'upload/games/'.$id.'/';
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
 }	
	
 /**************************************
 * delete method with toork remote api
 **************************************/
	public function gamedelete($id = null) {
	    $this->layout='ajax';
		if (!$this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->Game->id = $id;
		$userid=$this->Game->field('user_id');
		if (!$this->Game->exists()) {
			//throw new NotFoundException(__('Invalid game'));
			echo 0;break;
		}
		if ($this->Game->delete()) {
		    echo 1;
			$this->requestAction( array('controller' => 'userstats', 'action' => 'getgamecount',$userid));
			$this->deleteS3Image($id);
		}else{
		    echo 0;
		}
	
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
