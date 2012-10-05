<?php
App::uses('AppController', 'Controller');


class UserstatsController extends AppController {

var $uses = array('Userstat','Game','User','Favorite','Subscription','Playcount','Rate');
public $helpers = array('Html', 'Form');


    public function beforeFilter() {
	parent::beforeFilter();
		}


	public function index() {
	echo 'hoooo';
	

		$a=$this->Userstat->find('first');
		print_r($a);
		
	}
	
	public function getgamecount() {
	$user_id=$this->Auth->user('id');
	$uploadcount=$this->Game->find('all',array('conditions'=>array('Game.user_id'=>$user_id)));
	end($uploadcount);         // move the internal pointer to the end of the array
    $key = key($uploadcount); 
    $key++;
	$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$owner),'contain'=>false,'fields'=>array('Userstat.id','Userstat.totalrate')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		$this->request->data['Userstat']['totalrate']=$key;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$owner;
		$this->request->data['Userstat']['totalrate']=$key;
        }
	    $this->Userstat->save($this->request->data);
	}
	
	public function totalrate() {
	$this->layout='ajax';
	
	
	//recoded begins
		$user_id=$this->Auth->user('id');
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$totalrate=$this->Rate->query('SELECT SUM(current) FROM rates where rates.game_id IN (SELECT id FROM games where games.user_id='.$user_id.')');
		if($totalrate[0][0]['SUM(current)']==NULL)
		$totalrate[0][0]['SUM(current)']=0;
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['totalrate']=$totalrate[0][0]['SUM(current)'];
		$this->Userstat->save($this->request->data);
		//recoded ends
		echo $totalrate[0][0]['SUM(current)'];
	
	}
	
	
	public function togglefav() {
	
	//recoded begins
		$user_id=$this->Auth->user('id');
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$favoritenumber=$this->Favorite->find('count',array('conditions'=>array('Favorite.user_id'=>$user_id)));
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['favoritecount']=$favoritenumber;
		$this->Userstat->save($this->request->data);
		//recoded ends	
	}
	
	
	public function incgameplay() {
	
	//recoded begins
	    $user_id=$this->Auth->user('id');
	    $userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$playcount=$this->Playcount->find('count',array('conditions'=>array('Playcount.user_id'=>$user_id,'Game.active'=>1)));
		$this->request->data['Userstat']['user_id']=$user_id;
	    $this->request->data['Userstat']['playcount']=$playcount;
		$this->Userstat->save($this->request->data);
		echo $playcount;
		//recoded ends
	}
	
	public function incscribe($subscribe_to) {
	    
		//recoded begins for subscribes of user_id
		$user_id=$this->Auth->user('id');
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$subscribe=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_id'=>$user_id)));
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['subscribe']=$subscribe;
		$this->Userstat->save($this->request->data);
		//recoded ends	
		//recoded begins for subscribeto of channel
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$subscribe_to),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$subscribe_to)));
		$this->request->data['Userstat']['user_id']=$subscribe_to;
		$this->request->data['Userstat']['subscribeto']=$subscribeto;
		$this->Userstat->save($this->request->data);
		//recoded ends	
		
	}
	
	public function decscribe($subscribe_to) {
	
		//recoded begins for subscribes of user_id
		$user_id=$this->Auth->user('id');
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$subscribe=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_id'=>$user_id)));
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['subscribe']=$subscribe;
		$this->Userstat->save($this->request->data);
		//recoded ends	
		//recoded begins for subscribeto of channel
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$subscribe_to),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$subscribe_to)));
		$this->request->data['Userstat']['user_id']=$subscribe_to;
		$this->request->data['Userstat']['subscribeto']=$subscribeto;
		$this->Userstat->save($this->request->data);
		//recoded ends	
	}
	
	public function syncallusers() {
	    set_time_limit(0); 
		$allusers=$this->User->find('all',array('fields'=>array('User.id')));
	    foreach($allusers as $users)
	    {
		$this->sync($users['User']['id']);
	    }
	    set_time_limit(30); 
	}
	
	public function new_user($user_id) {
	    
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow==NULL)
		{
		
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['uploadcount']=0;
		$this->request->data['Userstat']['totalrate']=0;
		$this->request->data['Userstat']['favoritecount']=0;
		$this->request->data['Userstat']['subscribe']=0;
		$this->request->data['Userstat']['subscribeto']=0;
		$this->request->data['Userstat']['playcount']=0;
		$this->Userstat->save($this->request->data);
		
	    }
	
	}
	
	public function sync($user_id) {
	    
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$uploadcount=$this->Game->find('count',array('conditions'=>array('Game.user_id'=>$user_id)));
		$totalrate=$this->Rate->query('SELECT SUM(current) FROM rates where rates.game_id IN (SELECT id FROM games where games.user_id='.$user_id.')');
		$favoritenumber=$this->Favorite->find('count',array('conditions'=>array('Favorite.user_id'=>$user_id)));
		$subscribe=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_id'=>$user_id)));
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$user_id)));
		$playcount=$this->Playcount->find('count',array('conditions'=>array('Playcount.user_id'=>$user_id,'Game.active'=>1)));
		
		if($totalrate[0][0]['SUM(current)']==NULL)
		$totalrate[0][0]['SUM(current)']=0;
		
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['uploadcount']=$uploadcount;
		$this->request->data['Userstat']['totalrate']=$totalrate[0][0]['SUM(current)'];
		$this->request->data['Userstat']['favoritecount']=$favoritenumber;
		$this->request->data['Userstat']['subscribe']=$subscribe;
		$this->request->data['Userstat']['subscribeto']=$subscribeto;
		$this->request->data['Userstat']['playcount']=$playcount;
		$this->Userstat->save($this->request->data);
	
	}


}
