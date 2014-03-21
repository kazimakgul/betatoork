<?php

App::uses('Component', 'Controller');

class CommonComponent extends Component {
public $components = array('Auth','Session');


  //ne ise yariyor ögren?
  function startup(&$controller) {
    $this->controller = $controller; // Stores reference Controller in the component
	$this->Subscription=ClassRegistry::init('Subscription');
	$this->Activity=ClassRegistry::init('Activity');
  }


   function secureSuperGlobalPOST($value)
    {
	    $string = preg_replace('/[^\w\d_ -]/si', '', $value);
        $string = htmlspecialchars(stripslashes($string));
        $string = str_replace("script", "blocked", $string);
        $string = mysql_escape_string($string);
		$string = htmlentities($string);
		$string = str_replace("_", "", $string);
        return $string;
    }
	
	
	//Yeni Sistem-GamesControlerina bagli sayfalar için last activityleri getirir.Component yapilabilir.
public function get_last_activities()
{
   
    if(1==2)
	{ //openning of auth_id control
    $auth_id=$this->Session->read('Auth.User.id');
    $subscribed_ids=$this->Subscription->find('list',array('contain'=>false,'fields'=>array('Subscription.subscriber_to_id'),'conditions'=>array('Subscription.subscriber_id'=>$auth_id)));
	$activityData=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.screenname','PerformerUser.seo_username')),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username','ChannelUser.seo_username'))),'fields'=>array('Activity.id','Activity.performer_id','Activity.game_id','Activity.channel_id','Activity.msg_id','Activity.seen','Activity.notify','Activity.email','Activity.type','Activity.replied','Activity.created','PerformerUser.id','PerformerUser.username','PerformerUser.seo_username','ChannelUser.id','ChannelUser.username','ChannelUser.seo_username','Game.id','Game.name','Game.seo_url','Game.embed'),'conditions'=>array('Activity.performer_id'=>$subscribed_ids),'limit'=>15,'order'=>'Activity.created DESC'));
$this->controller->set('lastactivities',$activityData);
    }else{//closing of auth_id control
   //if user is no logged in,get all activity data
	$activityData=$this->Activity->find('all',array('contain'=>array('PerformerUser'=>array('fields'=>array('PerformerUser.id','PerformerUser.username','PerformerUser.screenname','PerformerUser.seo_username')),'Game'=>array('fields'=>array('Game.id','Game.name','Game.seo_url','Game.embed')),'ChannelUser'=>array('fields'=>array('ChannelUser.id','ChannelUser.username','ChannelUser.seo_username'))),'fields'=>array('Activity.id','Activity.performer_id','Activity.game_id','Activity.channel_id','Activity.msg_id','Activity.seen','Activity.notify','Activity.email','Activity.type','Activity.replied','Activity.created','PerformerUser.id','PerformerUser.username','PerformerUser.seo_username','ChannelUser.id','ChannelUser.username','ChannelUser.seo_username','Game.id','Game.name','Game.seo_url','Game.embed'),'limit'=>15,'order'=>'Activity.created DESC'));
$this->controller->set('lastactivities',$activityData);
    }
  }
   

}