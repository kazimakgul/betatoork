<?php


class Userstat extends AppModel {

	public $displayField = 'id';
	var $name = 'Userstat';  

	public function add_playcount($user_id)
    {
	    $userstatrow=$this->find('first',array('conditions'=>array('Userstat.user_id'=>$user_id),'contain'=>false,'fields'=>array('Userstat.id','Userstat.playcount')));
		if($userstatrow!=NULL)
		{
		$this->id=$userstatrow['Userstat']['id'];
		$playcount=$userstatrow['Userstat']['playcount']+1;
	    }
		    $filtered_data=
			array('Userstat' =>array(
			'playcount' => $playcount,
			'game_id' => $user_id));
			$this->save($filtered_data);
	    return 1;	
    }
}
