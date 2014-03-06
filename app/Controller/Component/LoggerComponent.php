<?php

App::uses('Component', 'Controller');

class LoggerComponent extends Component {

var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Category','Order');

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


}