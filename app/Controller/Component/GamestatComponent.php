<?php

App::uses('Component', 'Controller');

class GamestatComponent extends Component {

public $components = array('Auth');


  //ne ise yariyor ögren?
  function startup(&$controller) {
    $this->controller = $controller; // Stores reference Controller in the component
	$this->Gamestat = ClassRegistry::init('Gamestat');
  }


   public function add_playcount($game_id)
    {
	    $gamestatrow=$this->Gamestat->find('first',array('conditions'=>array('Gamestat.game_id'=>$game_id),'contain'=>false,'fields'=>array('Gamestat.id','Gamestat.playcount')));
		if($gamestatrow!=NULL)
		{
		$this->Gamestat->id=$gamestatrow['Gamestat']['id'];
		$playcount=$gamestatrow['Gamestat']['playcount']+1;
	    }else{
		$this->Gamestat->id=NULL;
		$playcount=1;
		}
		    $filtered_data=
			array('Gamestat' =>array(
			'playcount' => $playcount,
			'game_id' => $game_id));
			$this->Gamestat->save($filtered_data);
		
    }
   

}