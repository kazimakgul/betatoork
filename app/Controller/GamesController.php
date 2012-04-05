<?php
App::uses('AppController', 'Controller');
/**
 * Games Controller
 *
 * @property Game $Game
 */
class GamesController extends AppController {

	public $name = 'Games';
	var $uses = array('Game');
    public $helpers = array('Html', 'Form','Upload');
	




 	public function isAuthorized($user) {
	    if (parent::isAuthorized($user)) {
	        return true;
	    }

	    if (($this->action === 'add') || ($this->action === 'mygames')) {
	       // All registered users can add posts
	        return true;
	    }
	    if (in_array($this->action, array('edit', 'delete'))) {
	        $gameId = $this->request->params['pass'][0];
	        return $this->Game->isOwnedBy($gameId, $user['id']);
	    }

	    return false;
	}

	
	public function index() {
		$this->layout='base';
		$this->Game->recursive = 0;
		$cond= array('Game.active'=>'1');
    	$this->set('games', $this->paginate('Game',$cond));
    	$this->set('users', $this->paginate('User'));
    	$this->set('categories', $this->paginate('Category'));
		$this->set('title_for_layout', 'Toork - is a gamelist share platform - create your playlist of games and share your list');
	}

	public function mygames() {
    $userid = $this->Session->read('Auth.User.id');
    //$allMyGames = $this->Game->find('all', array('conditions' => array('Game.user_id' => $userid)));
    //$this->set('mygames', $allMyGames,$this->paginate());
    $cond= array('Game.user_id'=>$userid);
    $this->set('mygames', $this->paginate('Game',$cond));
   
}

	public function sharedby() {
    $gameid = $this->request->params['pass'][0];
    $game = $this->Game->find('first', array('conditions' => array('Game.id' => $gameid)));
    $user = $game['User']['username'];
    $this->set('sharedby', $user);
}

	public function usergames() {
	$this->layout='index';
    $userid = $this->request->params['pass'][0];
    $user = $this->Game->find('first', array('conditions' => array('Game.User_id' => $userid)));
    $cond= array('Game.user_id'=>$userid,'Game.active'=>'1');
    $this->set('mygames', $this->paginate('Game',$cond));
    $userName = $user['User']['username'];
    $this->set('username', $userName);
}

public function search($param) {
	$this->layout='index';
	$key=$param;
	$this->set('myParam',$key);
    $userid = $this->Session->read('Auth.User.id');
    $cond= array('AND'=>array('OR'=>array('Game.name LIKE'=>'%'.$param.'%','Game.description LIKE'=>'%'.$param.'%','User.username LIKE'=>'%'.$param.'%'),'Game.active'=>'1'));
    $this->set('mygames', $this->paginate('Game',$cond));
}

	public function random() {
        $random = $this->Game->find('first',array(
                'conditions' => array(
                        'Game.active'=>1,
                ),
                'order' => 'rand()',
        ));
        $this->set('randomgame' , $random['Game']['id']);
}


	public function view($id = null) {
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		$this->set('game', $this->Game->read(null, $id));
		
	}


public function fav_check($game_id)
{
$user_id=$this->Auth->user('id');
$favbefore=$this->Game->Favorite->find("first",array("conditions"=>array("Favorite.user_id"=>$user_id,"Favorite.game_id"=>$game_id),"fields"=>array("Favorite.user_id","Favorite.game_id","Favorite.id")));
if(empty($favbefore))
			{
			$this->set("heartwidth",0);
			
			}
			else
			{
			$this->set("heartwidth",100);
			}

}


	public function play($id = null) {
		$this->sharedby();
		$this->random();
		$this->layout='game_index';
		$this->Game->id = $id;
		$this->fav_check($id);
		$user_id=$this->Auth->user('id');
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		$this->set('game', $this->Game->read(null, $id));
		$game = $this->Game->find('first', array('conditions' => array('Game.id' => $id)));
		$this->set('title_for_layout', 'Toork - '.$game['Game']['name'].' - '.$game['Game']['description']);

		//start size calculation for play page
		$current=$this->Game->Rate->find("first",array("conditions"=>array("Rate.user_id"=>$user_id,"Rate.game_id"=>$id)));
		$starsize=(100*$current["Rate"]["current"])/5;
		$this->set("starsize",$starsize);

	}


	public function add() {
		if ($this->request->is('post')) {

			$this->request->data['Game']['user_id'] = $this->Auth->user('id');
			
			$this->Game->create();
			
			$this->request->data['Game']['link']=$this->http_check($this->request->data['Game']['link']);
			
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash(__('The game has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game could not be saved. Please, try again.'));
			}
			
			
		}
		$users = $this->Game->User->find('list');
		$categories = $this->Game->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Game->id = $id;
    	$game = $this->Game->find('first', array('conditions' => array('Game.id' => $id)));
    	$this->set("game",$game);
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Game']['link']=$this->http_check($this->request->data['Game']['link']);
			
			$myval=$this->request->data["Game"]["edit_picture"]["name"];
			
			if($myval!="")
			{
			
			$this->request->data["Game"]["picture"]=$this->request->data["Game"]["edit_picture"];
			
			}
			
			
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash(__('The game has been updated'));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Game->read(null, $id);
		}
		$users = $this->Game->User->find('list');
		$categories = $this->Game->Category->find('list');
		$this->set(compact('users', 'categories'));
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
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->Game->delete()) {
			$this->Session->setFlash(__('Game deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Game was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Game->recursive = 0;
		$this->set('games', $this->paginate());
	}

	public function gameedit() {
	
	if($this->request->isPost())
	{	
	//iç

	$this->Game->id =$this->request->data["Game"]["id"];
	$id=$this->request->data["Game"]["id"];
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Game->save($this->request->data)) {
			   
			    if($this->request->data["Game"]["affect"]==1)
			    {
				$value=$this->request->data["Game"]["active"];
				$this->affected($id,$value);
				
			    }
				else
				{
				$this->Session->setFlash(__('The user has been updated'));
				}
			   
				
				$this->redirect(array('action' => 'gameedit'));
			} else {
				$this->Session->setFlash(__('The game could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}

	//dis
	}
	
	
		$this->Game->recursive = 0;
		$this->set('games', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		$this->set('game', $this->Game->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Game->create();
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash(__('The game has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game could not be saved. Please, try again.'));
			}
		}
		$users = $this->Game->User->find('list');
		$categories = $this->Game->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash(__('The game has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Game->read(null, $id);
		}
		$users = $this->Game->User->find('list');
		$categories = $this->Game->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Game->id = $id;
		if (!$this->Game->exists()) {
			throw new NotFoundException(__('Invalid game'));
		}
		if ($this->Game->delete()) {
			$this->Session->setFlash(__('Game deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Game was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
