<?php

App::uses('Component', 'Controller');

class LoggerComponent extends Component {

var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Category','Order');
public $components = array('Auth');

  //ne ise yariyor ögren?
  function startup(&$controller) {
    $this->controller = $controller; // Stores reference Controller in the component
  }


   public function submitlog($performer_id=NULL,$distinct=NULL)
   {
   $this->Order = ClassRegistry::init('Order');
   
      if($distinct=="start")
      {
      $select=$this->Order->query('SELECT * FROM logs WHERE user_id='.$performer_id);
	  if($select==NULL)
	  {
	  $this->Order->Query('INSERT INTO logs (user_id) VALUES ('.$performer_id.')');
	  }
	}
	
	if($distinct=="action_ajax_bot")
	$this->Order->query('UPDATE logs SET action_ajax_bot=action_ajax_bot+1 WHERE user_id='.$performer_id);
	if($distinct=="pushactivity_bot")
	$this->Order->query('UPDATE logs SET pushactivity_bot=pushactivity_bot+1 WHERE user_id='.$performer_id);
	if($distinct=="pushactivity_botsave")
	$this->Order->query('UPDATE logs SET pushactivity_botsave=pushactivity_botsave+1 WHERE user_id='.$performer_id);
	if($distinct=="incscribe")
	$this->Order->query('UPDATE logs SET incscribe=incscribe+1 WHERE user_id='.$performer_id);
	if($distinct=="incscribefast")
	$this->Order->query('UPDATE logs SET incscribefast=incscribefast+1 WHERE user_id='.$performer_id);

   }
   
   //Get Updated Userdata
   public function incscribe($subscribe_to) {
	    $this->Userstat = ClassRegistry::init('Userstat');
		$this->Subscription = ClassRegistry::init('Subscription');
		//recoded begins for subscribes of user_id
		$user_id=$subscribe_to;
		$this->submitlog($user_id,"incscribe");
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$subscribe=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_id'=>$user_id)));
		    $userstat_data=
			array('Userstat' =>array(
			'user_id' => $user_id,
			'subscribe' => $subscribe));
			
		if($this->Userstat->save($userstat_data)){$this->potential($user_id);}
		//recoded ends	
		//recoded begins for subscribeto of channel
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$subscribe_to),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		//$this->Userstat->id=NULL;
		}
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$subscribe_to)));
		$userstat_data2=
			array('Userstat' =>array(
			'user_id' => $subscribe_to,
			'subscribeto' => $subscribeto));
		
		if($this->Userstat->save($userstat_data2)){$this->potential($subscribe_to);}
		//recoded ends	
	}
    //Get Updated Userstat Ends
	
	 //Get Updated Userdata
   public function incscribe2($subscribe_to) {
	    $this->Userstat = ClassRegistry::init('Userstat');
		$this->Subscription = ClassRegistry::init('Subscription');
		//recoded begins for subscribes of user_id
		$user_id=$subscribe_to;
		$this->submitlog($user_id,"incscribefast");
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		$this->Userstat->id=NULL;
		}
		$subscribe=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_id'=>$user_id)));
		    $userstat_data=
			array('Userstat' =>array(
			'user_id' => $user_id,
			'subscribe' => $subscribe));
			
		if($this->Userstat->save($userstat_data)){$this->potential($user_id);}
		//recoded ends	
		//recoded begins for subscribeto of channel
		$userstatrow=$this->Userstat->find('first',array('conditions'=>array('Userstat.user_id'=>$subscribe_to),'contain'=>false,'fields'=>array('Userstat.id')));
		if($userstatrow!=NULL)
		{
		$this->Userstat->id=$userstatrow['Userstat']['id'];
	    }else{
		//$this->Userstat->id=NULL;
		}
		$subscribeto=$this->Subscription->find('count',array('conditions'=>array('Subscription.subscriber_to_id'=>$subscribe_to)));
		$userstat_data2=
			array('Userstat' =>array(
			'user_id' => $subscribe_to,
			'subscribeto' => $subscribeto));
		
		if($this->Userstat->save($userstat_data2)){$this->potential($subscribe_to);}
		//recoded ends	
	}
    //Get Updated Userstat Ends
	
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
		
		$userstat_data=
			array('Userstat' =>array(
			'user_id' => $user_id,
			'potential' => $formula));
		
		$this->Userstat->save($userstat_data);
		
	}
	
	public function ownrates($user_id=NULL) {
	    $this->layout='ajax';
		$this->Rate = ClassRegistry::init('Rate');
		$totalrate=$this->Rate->query('SELECT SUM(current) FROM rates where rates.user_id='.$user_id.' AND rates.game_id IN (SELECT id FROM games where games.user_id='.$user_id.')');
		if($totalrate[0][0]['SUM(current)']==NULL)
		$totalrate[0][0]['SUM(current)']=0;
		return $totalrate[0][0]['SUM(current)'];
	
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
	

}