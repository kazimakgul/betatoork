<?php
App::uses('AppController', 'Controller');


class UserstatsController extends AppController {

var $uses = array('Userstat','Game','User','Favorite','Subscription','Playcount','Rate');
public $helpers = array('Html', 'Form');


    public function beforeFilter() {
	parent::beforeFilter();
		}


	public function index() {	
	}
	
	public function getgamecount($owner) {
	$uploadcount=$this->Game->find('all',array('conditions'=>array('Game.user_id'=>$owner)));
	end($uploadcount);         // move the internal pointer to the end of the array
    $key = key($uploadcount); 
    $key++;
	$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$owner),'contain'=>false,'fields'=>array('Userstat.id','Userstat.uploadcount')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		$this->request->data['Userstat']['uploadcount']=$key;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$owner;
		$this->request->data['Userstat']['uploadcount']=$key;
        }
	    if($this->Userstat->save($this->request->data)){$this->potential($owner);}
		
	}
	
	public function totalrate($game_id=NULL) {
	    $this->layout='ajax';
	
	    $this->Game->id=$game_id;
	
	    //recoded begins
		$user_id=$this->Game->field('user_id');
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
		if($this->Userstat->save($this->request->data)){$this->potential($user_id);}
		//recoded ends
	   
	}
	
	
	public function ownrates($user_id=NULL) {
	    $this->layout='ajax';
		
		$totalrate=$this->Rate->query('SELECT SUM(current) FROM rates where rates.user_id='.$user_id.' AND rates.game_id IN (SELECT id FROM games where games.user_id='.$user_id.')');
		if($totalrate[0][0]['SUM(current)']==NULL)
		$totalrate[0][0]['SUM(current)']=0;
		return $totalrate[0][0]['SUM(current)'];
	
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
		if($this->Userstat->save($this->request->data)){$this->potential($user_id);}
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
		$playcount=$this->Playcount->find('count',array('conditions'=>array('Playcount.user_id'=>$user_id)));
		$this->request->data['Userstat']['user_id']=$user_id;
	    $this->request->data['Userstat']['playcount']=$playcount;
		$this->Userstat->save($this->request->data);
		echo $playcount;
		//recoded ends
		$this->potential($user_id);
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
		if($this->Userstat->save($this->request->data)){$this->potential($user_id);}
		//recoded ends	
		//recoded begins for subscribeto of channel
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$subscribe_to),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$this->request->data=NULL;
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$subscribe_to)));
		$this->request->data['Userstat']['user_id']=$subscribe_to;
		$this->request->data['Userstat']['subscribeto']=$subscribeto;
		if($this->Userstat->save($this->request->data)){$this->potential($subscribe_to);}
		//recoded ends	
	}
	
	
	public function getFactor($unit)
	{
	
	if($unit<=20)
	return 15;
	elseif(50>$unit && $unit>20)
	return 5;
	elseif($unit>=50)
	return 2;
	
	}
	
	public function potential($user_id=NULL)
	{
	$statdata=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false));
	$playcount=$statdata['Userstat']['playcount'];
	$subscription=$statdata['Userstat']['subscribe'];
	$subscribeto=$statdata['Userstat']['subscribeto'];
	$favoritecount=$statdata['Userstat']['favoritecount'];
	$uploadcount=$statdata['Userstat']['uploadcount'];
	$totalrate=$statdata['Userstat']['totalrate'];
	$ownrate=$this->ownrates($user_id);
	
	if($totalrate>$ownrate)
	$plainrates=$totalrate-$ownrate;
	else
	$plainrates=0;
	
	$m=Configure::read('multiples');
	$formula=($playcount*$m['playcount'])+($subscription*$m['subscribe'])+($favoritecount*$m['favorite'])+($subscribeto*$m['subscribeto'])+($uploadcount*$this->getFactor(     $uploadcount))+($plainrates*$m['plainrates']);
	
	    $userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['potential']=$formula;
		$this->Userstat->save($this->request->data);
		
	}
	
	
	public function syncallusers() {
	    //if varswitch equal to 0 function will be stopped.
		$varswitch=0;
		if($varswitch==0)
		$this->redirect('/');
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
	    //if varswitch equal to 0 function will be stopped.
	    $varswitch=0;
		if($varswitch==0)
		$this->redirect('/');
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$uploadcount=$this->Game->find('count',array('conditions'=>array('Game.user_id'=>$user_id)));
		$totalrate=$this->Rate->query('SELECT SUM(current) FROM rates where rates.game_id IN (SELECT id FROM games where games.user_id='.$user_id.')');
		$favoritecount=$this->Favorite->find('count',array('conditions'=>array('Favorite.user_id'=>$user_id)));
		$subscription=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_id'=>$user_id)));
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$user_id)));
		$playcount=$this->Playcount->find('count',array('conditions'=>array('Playcount.user_id'=>$user_id)));
		
		if($totalrate[0][0]['SUM(current)']==NULL)
		$totalrate[0][0]['SUM(current)']=0;
		
		$ownrate=$this->ownrates($user_id);
		if($totalrate[0][0]['SUM(current)']>$ownrate)
	    $plainrates=$totalrate[0][0]['SUM(current)']-$ownrate;
	    else
	    $plainrates=0;
		
		$m=Configure::read('multiples');
		$formula=($playcount*$m['playcount'])+($subscription*$m['subscribe'])+($favoritecount*$m['favorite'])+($subscribeto*$m['subscribeto'])+($uploadcount*$this->getFactor($uploadcount))+($plainrates*$m['plainrates']);
		
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['uploadcount']=$uploadcount;
		$this->request->data['Userstat']['totalrate']=$totalrate[0][0]['SUM(current)'];
		$this->request->data['Userstat']['favoritecount']=$favoritecount;
		$this->request->data['Userstat']['subscribe']=$subscription;
		$this->request->data['Userstat']['subscribeto']=$subscribeto;
		$this->request->data['Userstat']['playcount']=$playcount;
		$this->request->data['Userstat']['potential']=$formula;
		$this->Userstat->save($this->request->data);
	
	}
	
	
	public function sync_recommended($pass=NULL) {
	    if($pass!='fdsfsdf23123123@ff')
		break;
	    $user_id=Configure::read('recommended.id');
	    //if varswitch equal to 0 function will be stopped.
	    $varswitch=1;
		if($varswitch==0)
		$this->redirect('/');
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$uploadcount=$this->Game->find('count',array('conditions'=>array('Game.user_id'=>$user_id)));
		$totalrate=$this->Rate->query('SELECT SUM(current) FROM rates where rates.game_id IN (SELECT id FROM games where games.user_id='.$user_id.')');
		$favoritecount=$this->Favorite->find('count',array('conditions'=>array('Favorite.user_id'=>$user_id)));
		$subscription=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_id'=>$user_id)));
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$user_id)));
		$playcount=$this->Playcount->find('count',array('conditions'=>array('Playcount.user_id'=>$user_id)));
		
		if($totalrate[0][0]['SUM(current)']==NULL)
		$totalrate[0][0]['SUM(current)']=0;
		
		$ownrate=$this->ownrates($user_id);
		if($totalrate[0][0]['SUM(current)']>$ownrate)
	    $plainrates=$totalrate[0][0]['SUM(current)']-$ownrate;
	    else
	    $plainrates=0;
		
		$m=Configure::read('multiples');
		$formula=($playcount*$m['playcount'])+($subscription*$m['subscribe'])+($favoritecount*$m['favorite'])+($subscribeto*$m['subscribeto'])+($uploadcount*$this->getFactor($uploadcount))+($plainrates*$m['plainrates']);
		
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['uploadcount']=$uploadcount;
		$this->request->data['Userstat']['totalrate']=$totalrate[0][0]['SUM(current)'];
		$this->request->data['Userstat']['favoritecount']=$favoritecount;
		$this->request->data['Userstat']['subscribe']=$subscription;
		$this->request->data['Userstat']['subscribeto']=$subscribeto;
		$this->request->data['Userstat']['playcount']=$playcount;
		$this->request->data['Userstat']['potential']=$formula;
		$this->Userstat->save($this->request->data);
	
	}


}
