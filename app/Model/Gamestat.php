<?php
App::uses('AppModel', 'Model');
/**
 * Wallentry Model
 *
 * @property User $User
 * @property Game $Game
 */
class Gamestat extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
var $name="Gamestat";


public function add_playcount($game_id)
    {
	    $gamestatrow=$this->find('first',array('conditions'=>array('Gamestat.game_id'=>$game_id),'contain'=>false,'fields'=>array('Gamestat.id','Gamestat.playcount')));
		if($gamestatrow!=NULL)
		{
		$this->id=$gamestatrow['Gamestat']['id'];
		$playcount=$gamestatrow['Gamestat']['playcount']+1;
	    }else{
		$this->id=NULL;
		$playcount=ClassRegistry::init('Playcount')->find('count',array('conditions'=>array('Playcount.game_id'=>$game_id)));
		}
		    $filtered_data=
			array('Gamestat' =>array(
			'playcount' => $playcount,
			'game_id' => $game_id));
			$this->save($filtered_data);
		
    }
	
	
	public function sync_fav($game_id)
    {
	
	$gamestatrow=$this->find('first',array('conditions'=>array('Gamestat.game_id'=>$game_id),'contain'=>false,'fields'=>array('Gamestat.id')));
		if($gamestatrow!=NULL)
		{
		$this->id=$gamestatrow['Gamestat']['id'];
	    }else{
		$this->id=NULL;
		}
		$favcount=ClassRegistry::init('Favorite')->find('count',array('conditions'=>array('Favorite.game_id'=>$game_id)));
		    $filtered_data=
			array('Gamestat' =>array(
			'favcount' => $favcount,
			'game_id' => $game_id));
			if($this->save($filtered_data))
			{$this->potential($game_id);}
	}
	
	public function sync_channel_clone($game_id)
    {
	    $gamestatrow=$this->find('first',array('conditions'=>array('Gamestat.game_id'=>$game_id),'contain'=>false,'fields'=>array('Gamestat.id')));
		if($gamestatrow!=NULL)
		{
		$this->id=$gamestatrow['Gamestat']['id'];
	    }else{
		$this->id=NULL;
		}
		$channelclone=ClassRegistry::init('Cloneship')->find('count',array('conditions'=>array('Cloneship.game_id'=>$game_id)));
		    $filtered_data=
			array('Gamestat' =>array(
			'channelclone' => $channelclone,
			'game_id' => $game_id));
			if($this->save($filtered_data))
			{$this->potential($game_id);}
	}
	
	public function sync_total_clone($game_id)
    {
	    $gamestatrow=$this->find('first',array('conditions'=>array('Gamestat.game_id'=>$game_id),'contain'=>false,'fields'=>array('Gamestat.id')));
		if($gamestatrow!=NULL)
		{
		$this->id=$gamestatrow['Gamestat']['id'];
	    }else{
		$this->id=NULL;
		}
		$totalclone=ClassRegistry::init('Cloneship')->find('count',array('conditions'=>array('Cloneship.root_id'=>$game_id)));
		    $filtered_data=
			array('Gamestat' =>array(
			'totalclone' => $totalclone,
			'game_id' => $game_id));
			if($this->save($filtered_data))
			{$this->potential($game_id);}
			
	}
	
	public function potential($game_id)
    {
	$gamestatrow=$this->find('first',array('conditions'=>array('Gamestat.game_id'=>$game_id),'contain'=>false));
	if($gamestatrow!=NULL)
	{
	$this->id=$gamestatrow['Gamestat']['id'];
	//Get materials of formula
	$playcount=$gamestatrow['Gamestat']['playcount'];
	$favcount=$gamestatrow['Gamestat']['favcount'];
	$channelclone=$gamestatrow['Gamestat']['channelclone'];
	$g=Configure::read('g_multiples');
	$formula=($playcount*$g['playcount'])+($favcount*$g['favcount'])+($channelclone*$g['channelclone']);
	}else{
	$this->id=NULL;
	$formula=0;
	}
        $filtered_data=
		array('Gamestat' =>array(
		'potential' => $formula,
		'game_id' => $game_id));
		$this->save($filtered_data);	 
	}


public $belongsTo = array(
		'Game' => array(
			'className' => 'Game',
			'foreignKey' => 'game_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);




}
