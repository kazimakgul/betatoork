<?php
App::uses('AppController', 'Controller');
/**
 * Favorites Controller
 *
 * @property Favorite $Favorite
 */
class FavoritesController extends AppController {


public $helpers = array('Html', 'Form','Upload');


 public function beforeFilter() {
 		parent::beforeFilter();
        $this->Auth->allow('add','edit');
    }
/**
 * index method
 *
 * @return void
 */
 
	public function index() {
		$this->Favorite->recursive = 0;
		$this->set('favorites', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Favorite->id = $id;
		if (!$this->Favorite->exists()) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		$this->set('favorite', $this->Favorite->read(null, $id));
	}

	public function playlist($userid) {
		$this->layout='index';
		$this->userPlaylist();
	    //$userid = $this->Session->read('Auth.User.id');
	  	//$allFavorites = $this->Favorite->find('all', array('conditions' => array('Favorite.user_id' => $userid, 'game.active'=>'1')));
	  	$cond= array('Game.active'=>'1','Favorite.user_id'=>$userid);
    	$this->set('favorites',$this->paginate('Favorite',$cond));
    	
	  //  $cond= array("Favorite.user_id"=>$userid);
	   // $this->set('favorites', $this->paginate('favorite',$cond));
}

	public function userPlaylist() {
    $userid = $this->request->params['pass'][0];
    $user = $this->Favorite->find('first', array('conditions' => array('Favorite.User_id' => $userid)));
    $userName = $user['User']['username'];
    $this->set('userPlaylist', $userName);
}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	
	$this->layout = "ajax";
	$this->loadModel('Gamestat');
	
	$user_id=$this->Auth->user('id');
	$game_id=$this->request["pass"][0];
				
				$favbefore=$this->Favorite->find("first",array("conditions"=>array("Favorite.user_id"=>$user_id,"Favorite.game_id"=>$game_id),"fields"=>array("Favorite.user_id","Favorite.game_id","Favorite.id")));
	
	
	if(empty($favbefore))
			{
	$this->Favorite->create();
				$this->request->data["Favorite"]["user_id"]=$user_id;
				$this->request->data["Favorite"]["game_id"]=$game_id;
	
	if($this->Favorite->save($this->request->data))
				{
				    $this->requestAction( array('controller' => 'userstats', 'action' => 'togglefav'));
					$this->Gamestat->sync_fav($game_id);
					$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$game_id,$user_id,6,1));	
					$this->set("favMessage",1);

				}else{
					$this->set("favMessage","The favorite could not be saved. Please, try again.");
					if(!isset($user_id)){$this->set("favMessage","Please login first.");}
				}
			
			}else{
			
			if($this->Favorite->Delete($favbefore["Favorite"]["id"]))
			   {
			     $this->requestAction( array('controller' => 'userstats', 'action' => 'togglefav'));
				 $this->Gamestat->sync_fav($game_id);
				 //$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$game_id,$user_id,6,0)); Unfavorite postu atilmayacak.
			     $this->set("favMessage",0);
			   }
			   else
			   {
			   
			   $this->set("favMessage","You cannot remove this favorite.Please contact with admin.");
			   
			   }                                  
			}
		}
	
	

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Favorite->id = $id;
		if (!$this->Favorite->exists()) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Favorite->save($this->request->data)) {
				$this->Session->setFlash(__('The favorite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Favorite->read(null, $id);
		}
		$users = $this->Favorite->User->find('list');
		$games = $this->Favorite->Game->find('list');
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
		$this->Favorite->id = $id;
		if (!$this->Favorite->exists()) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		if ($this->Favorite->delete()) {
			$this->Session->setFlash(__('Favorite deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Favorite was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Favorite->recursive = 0;
		$this->set('favorites', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Favorite->id = $id;
		if (!$this->Favorite->exists()) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		$this->set('favorite', $this->Favorite->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Favorite->create();
			if ($this->Favorite->save($this->request->data)) {
				$this->Session->setFlash(__('The favorite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.'));
			}
		}
		$users = $this->Favorite->User->find('list');
		$games = $this->Favorite->Game->find('list');
		$this->set(compact('users', 'games'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Favorite->id = $id;
		if (!$this->Favorite->exists()) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Favorite->save($this->request->data)) {
				$this->Session->setFlash(__('The favorite has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Favorite->read(null, $id);
		}
		$users = $this->Favorite->User->find('list');
		$games = $this->Favorite->Game->find('list');
		$this->set(compact('users', 'games'));
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
		$this->Favorite->id = $id;
		if (!$this->Favorite->exists()) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		if ($this->Favorite->delete()) {
			$this->Session->setFlash(__('Favorite deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Favorite was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
