<?php
App::uses('AppController', 'Controller');
/**
 * Playcounts Controller
 *
 * @property Playcount $Playcount
 */
class PlaycountsController extends AppController {


    var $paginate = array(
        'Playcount' => array(
            'limit' => 2,
            'order' => array(
                'Playcount.count' => 'desc',
            ),
        ),     
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Playcount->recursive = 0;
		$this->set('playcounts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Playcount->id = $id;
		if (!$this->Playcount->exists()) {
			throw new NotFoundException(__('Invalid playcount'));
		}
		$this->set('playcount', $this->Playcount->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Playcount->create();
			if ($this->Playcount->save($this->request->data)) {
				$this->Session->setFlash(__('The playcount has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The playcount could not be saved. Please, try again.'));
			}
		}
		$users = $this->Playcount->User->find('list');
		$games = $this->Playcount->Game->find('list');
		$this->set(compact('users', 'games'));
	}
	
	
	public function add_play()
	{
	
	
	$this->layout = "ajax";
	$user_id=$this->Auth->user('id');
	$game_id=$this->request["pass"][0];
	
	if($user_id=="")
	{$user_id=-1; }
	
	$playbefore=$this->Playcount->find("first",array("conditions"=>array("Playcount.user_id"=>$user_id,"Playcount.game_id"=>$game_id),"fields"=>array("Playcount.user_id","Playcount.game_id","Playcount.id","count")));
	
	if(empty($playbefore))
	{
	
	
	
	$this->Playcount->create();
	$this->request->data["Playcount"]["user_id"]=$user_id;
	$this->request->data["Playcount"]["game_id"]=$game_id;
	$this->request->data["Playcount"]["count"]=1;
	     
		 if($this->Playcount->save($this->request->data))
	     {
		 $this->requestAction( array('controller' => 'userstats', 'action' => 'incgameplay'));
		 $this->set("playMessage","Your play has been saved.");
		 }
		 else
		 {
		 $this->set("playMessage","The play could not be saved.");
		 }
	
	
	}
	//play before ends
	else
	{
	$this->Playcount->id =$playbefore["Playcount"]["id"];
	$this->request->data["Playcount"]["user_id"]=$user_id;
	$this->request->data["Playcount"]["game_id"]=$game_id;
	$this->request->data["Playcount"]["count"]=$playbefore["Playcount"]["count"]+1;
	              if($this->Cookie->read($game_id)!=$game_id)
				  {
	          if($this->Playcount->save($this->request->data))
	           {
		      $this->set("playMessage","Your play has been updated.");
		      }
		      else
		      {
		      $this->set("playMessage","The play could not be updated.");
		      }
			       }
			  
	
	}
	
			$this->Cookie->write($game_id,$game_id,false,60);	
	
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Playcount->id = $id;
		if (!$this->Playcount->exists()) {
			throw new NotFoundException(__('Invalid playcount'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Playcount->save($this->request->data)) {
				$this->Session->setFlash(__('The playcount has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The playcount could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Playcount->read(null, $id);
		}
		$users = $this->Playcount->User->find('list');
		$games = $this->Playcount->Game->find('list');
		$this->set(compact('users', 'games'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Playcount->id = $id;
		if (!$this->Playcount->exists()) {
			throw new NotFoundException(__('Invalid playcount'));
		}
		if ($this->Playcount->delete()) {
			$this->Session->setFlash(__('Playcount deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Playcount was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
