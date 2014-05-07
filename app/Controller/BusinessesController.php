<?php

/**
 * Games Controller
 *
 * @property Game $Game
 */
class BusinessesController extends AppController {

	public $name = 'Businesses';
	var $uses = array('Businesses','Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Gamestat','Category','Activity','Cloneship');
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

		$this->layout='Business/business';

		$user = $this->User->find('first', array('conditions' => array('User.id' => $userid),'fields'=>array('*')));
		
		$limit=12;
		$this->paginate=array('Game'=>array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.recommend' => 'desc')));
		$cond=$this->paginate('Game');
		$category = $this->Category->find('all');

		$this->set('category',$category);
		$this->set('games', $cond);
		$this->set('user', $user);

		$this->set('title_for_layout', 'Clone Games');
		$this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
		$this->set('author_for_layout', 'Clone');
	}
	
	public function play($id=NULL) {
	
	//Getting Random Game Data
		$this->layout='Business/business';
		$game	=	$this->Game->find('first', array('conditions' => array('Game.id' => $id),'fields'=>array('User.username,User.seo_username,Game.name,Game.user_id,Game.link,Game.starsize,Game.embed,Game.description,Game.id,Game.active,Game.picture,Game.seo_url,Game.clone,Game.owner_id'),'contain'=>array('User'=>array('fields'=>array('User.username,User.seo_username,User.adcode,User.picture')))));//Recoded
		$user	=	$this->User->find('first', array('conditions' => array('User.id'=>$game['Game']['user_id']),'fields'=>array('*')));
		$fav	=	$this->Gamestat->find('first',array('conditions' => array('Gamestat.game_id'=>$id),'fields'=>array('Gamestat.favcount, Gamestat.playcount, Gamestat.totalclone, Gamestat.potential')));		
		if($game['Game']['clone']==1)
		{
		$original=$this->User->find('first',array('conditions' => array('User.id'=>$game['Game']['owner_id']),'fields'=>array('User.adcode'),'contain'=>false));
		$game['User']['adcode']=$original['User']['adcode'];
		}

	
		$limit=12;
		$this->paginate=array('Game'=>array('conditions' => array('Game.active'=>'1','Game.id'=>$game['Game']['id']),'limit' => $limit,'order' => array('Game.recommend' => 'desc')));
		$cond=$this->paginate('Game');
		
		$this->set('games', $cond);
		$this->set('user', $user);
		$this->set('game',$game);
		$this->set('fav',$fav);
		$this->set('title_for_layout', 'Clone Games');
		$this->set('description_for_layout', 'Discover collect and share games. Clone games and create your own game channel.');
		$this->set('author_for_layout', 'Clone');
		if($game['Game']['embed']==NULL)
		{
			$this->render('/Businesses/playframe');
		}  
	}	
	
	
}
