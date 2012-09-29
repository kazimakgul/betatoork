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
	/*
	$user_id=$this->Auth->user('id');
	$game_id=$this->request["pass"][0];
	$rating=$this->request["pass"][1];
	$gameinfo=$this->Game->find('first',array('conditions'=>array('Game.id'=>$game_id),'contain'=>false,'fields'=>array('Game.user_id')));
	$owner=$gameinfo['Game']['user_id'];
	$ratebefore=$this->Rate->find("first",array("conditions"=>array("Rate.user_id"=>$user_id,"Rate.game_id"=>$game_id),"fields"=>array("Rate.user_id","Rate.game_id","Rate.current","Rate.id")));
	     if(empty($ratebefore))
		 {
			//Only summation begins
			$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$owner),'contain'=>false,'fields'=>array('Userstat.id','Userstat.totalrate')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		$this->request->data['Userstat']['totalrate']=$userstatrow['Userstat']['totalrate']+$rating;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$owner;
		$this->request->data['Userstat']['totalrate']=$rating;
        }
	    $this->Userstat->save($this->request->data);
			
			//Only summation ends
			
		 }else{
		 //Rated Before Process Begins
		$previousrate=$ratebefore['Rate']['current'];
		echo 'previous rate'.$previousrate;
		echo 'current rate'.$rating;
		if($previousrate>=$rating)
		$diffrate=bcsub($previousrate,$rating);
		if($previousrate<$rating)
		$diffrate=bcsub($rating,$previousrate);
		echo 'difference rate'.$diffrate;
		if($previousrate>=$rating)
		$plus=1;
		 else
		$plus=0;
		echo '<br>'.$plus;
		$user_id=$this->Auth->user('id');
	    $userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$owner),'contain'=>false,'fields'=>array('Userstat.id','Userstat.totalrate')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		  if($plus!=1)
		  {
		$this->request->data['Userstat']['totalrate']=$userstatrow['Userstat']['totalrate']+$diffrate;
		  }else{
		  if($userstatrow['Userstat']['totalrate']>=$diffrate)
		  $this->request->data['Userstat']['totalrate']=$userstatrow['Userstat']['totalrate']-$diffrate;
		  }
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$owner;
		$this->request->data['Userstat']['totalrate']=0;
        }
	    $this->Userstat->save($this->request->data);
		 
		 //Rated Before Process Ends
		 }
		 
	*/
	
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
	/*
	$user_id=$this->Auth->user('id');
	$game_id=$this->request["pass"][0];
	$favbefore=$this->Favorite->find("first",array("conditions"=>array("Favorite.user_id"=>$user_id,"Favorite.game_id"=>$game_id),"fields"=>array("Favorite.user_id","Favorite.game_id","Favorite.id")));
	        if(empty($favbefore))
			{
			//This is begin of increase method
			$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id','Userstat.favoritecount')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		$this->request->data['Userstat']['favoritecount']=$userstatrow['Userstat']['favoritecount']+1;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['favoritecount']=1;
        }
	    $this->Userstat->save($this->request->data);
			//This is end of increase method
			
			}else{
			//This is begin of decrease method
		$user_id=$this->Auth->user('id');
	    $userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id','Userstat.favoritecount')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		if($userstatrow['Userstat']['favoritecount']>=1)
		$this->request->data['Userstat']['favoritecount']=$userstatrow['Userstat']['favoritecount']-1;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['favoritecount']=0;
        }
	    $this->Userstat->save($this->request->data);
			
			//This is end of decrease method
			}
	
	*/
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
	/*
	    $user_id=$this->Auth->user('id');
	    $userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id','Userstat.playcount')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		$this->request->data['Userstat']['playcount']=$userstatrow['Userstat']['playcount']+1;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['playcount']=1;
        }
	    $this->Userstat->save($this->request->data);
	*/
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
	    //for subscribe to
	    /*
		$user_id=$this->Auth->user('id');
	    $userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$subscribe_to),'contain'=>false,'fields'=>array('Userstat.id','Userstat.subscribeto')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		$this->request->data['Userstat']['subscribeto']=$userstatrow['Userstat']['subscribeto']+1;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$subscribe_to;
		$this->request->data['Userstat']['subscribeto']=1;
        }
	    $this->Userstat->save($this->request->data);
	//for subscribe
	$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id','Userstat.subscribe')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['subscribe']=$userstatrow['Userstat']['subscribe']+1;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['subscribe']=1;echo 'new';
        }
	    $this->Userstat->save($this->request->data,array('fieldList'=>array('id','user_id','totalrate','subscribe')));
		*/
		//recoded begins
		$user_id=$this->Auth->user('id');
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$subscribe=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_id'=>$user_id)));
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$user_id)));
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['subscribe']=$subscribe;
		$this->request->data['Userstat']['subscribeto']=$subscribeto;
		$this->Userstat->save($this->request->data);
		//recoded ends	
	}
	
	public function decscribe($subscribe_to) {
	//for subscribe to
	/*
	    $user_id=$this->Auth->user('id');
	    $userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$subscribe_to),'contain'=>false,'fields'=>array('Userstat.id','Userstat.subscribeto')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		if($userstatrow['Userstat']['subscribeto']>=1)
		$this->request->data['Userstat']['subscribeto']=$userstatrow['Userstat']['subscribeto']-1;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$subscribe_to;
		$this->request->data['Userstat']['subscribeto']=0;
        }
	    $this->Userstat->save($this->request->data);
	//for subscribe
	$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id','Userstat.subscribe')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
		if($userstatrow['Userstat']['subscribe']>=1)
		$this->request->data['Userstat']['subscribe']=$userstatrow['Userstat']['subscribe']-1;
		$this->request->data['Userstat']['user_id']=$user_id;
	    }else{
		$this->Userstat->id=NULL;
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['subscribe']=0;
        }
	    $this->Userstat->save($this->request->data,array('fieldList'=>array('id','user_id','totalrate','subscribe')));
		*/
		//recoded begins
		$user_id=$this->Auth->user('id');
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$subscribe=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_id'=>$user_id)));
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$user_id)));
		$this->request->data['Userstat']['user_id']=$user_id;
		$this->request->data['Userstat']['subscribe']=$subscribe;
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
