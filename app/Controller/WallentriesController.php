<?php
App::uses('AppController', 'Controller');
/**
 * Wallentries Controller
 *
 * @property Wallentry $Wallentry
 */
class WallentriesController extends AppController {

    public $helpers = array('Html', 'Form','Upload');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Wallentry->recursive = 0;
		$this->set('wallentries', $this->paginate());
	}

	public function leftpanel(){
		$this->loadModel('Category');
		$this->loadModel('Game');
		$this->Game->recursive = 0;
		$cat=$this->Game->Category->find('all');
		$this->set('category', $cat);
		$cond3= array('Game.active'=>'1');
    	$this->set('games', $this->paginate('Game',$cond3));

	}

	public function logedin_user_panel() {
		$this->loadModel('User');
		$this->loadModel('Subscription');
		$this->loadModel('Playcount');
		$this->loadModel('Game');
		$this->layout='base';
	    $userid = $this->Session->read('Auth.User.id');
	    $username = $this->Session->read('Auth.User.username');
	    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
	    $favoritenumber = $this->Game->Favorite->find('count', array('conditions' => array('Favorite.User_id' => $userid)));
	    $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
	    $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$playcount = $this->Playcount->find('count', array('conditions' => array('Playcount.user_id' => $userid)));
		$user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	    $this->set('user',$user);

	    $this->set('userid', $userid);
	   	$this->set('username', $username);
	    $this->set('gamenumber', $gamenumber);
	    $this->set('favoritenumber', $favoritenumber);
	   	$this->set('subscribe', $subscribe);
	    $this->set('subscribeto', $subscribeto);
	    $this->set('playcount', $playcount);

	}

	public function wall() {
		$this->loadModel('User');
		$this->loadModel('Game');
		$this->loadModel('Subscription');
		$this->layout='channel';
		$this->leftpanel();
		$this->logedin_user_panel();
		$userid = $this->Session->read('Auth.User.id');
		
	    $subscriber_ids = $this->Subscription->find('all',array('conditions'=>array('subscriber_id'=>$userid)));
		
		$i=0;
		foreach ($subscriber_ids as $allids)
		{
		
		$ids[$i]=$allids['Subscription']['subscriber_to_id'];
		$i++;
		}
		
	    //$subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
	    $games = $this->Game->find('all', array('conditions' => array('Game.user_id' => $ids)));	
		$this->Wallentry->recursive = 0;

        $this->set('entries',$games);
        
		//$this->set('entries', $this->paginate('Wallentry',array('Wallentry.user_id' => $userid)));
	}


	public function channel() {
		$this->loadModel('User');
		$this->layout='channel';
		$this->leftpanel();
		$this->logedin_user_panel();
		$userid = $this->Session->read('Auth.User.id');
		$limit=12;
		$cond= $this->Game->find('all', array('conditions' => array('Game.active'=>'1','Game.user_id'=>$userid),'limit' => $limit,'order' => array('Game.starsize' => 'desc'
    )));
    	$cond2= $this->Game->Favorite->find('all', array('conditions' => array('Game.active'=>'1','Favorite.user_id'=>$userid),'limit' => $limit,'order' => array('Game.starsize' => 'desc'
    )));
	    $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
	    $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
	    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
	    if($gamenumber >= 3){
	    	    $this->set('slider', $cond);
	    }else{
	    		$this->set('slider', $this->Game->find('all', array('conditions' => array('Game.active'=>'1'),'limit' => $limit,'order' => array('Game.starsize' => 'desc'))));
	    }
	    $user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	    $this->set('user',$user);

	    $this->set('subscribe', $subscribe);
	    $this->set('subscribeto', $subscribeto);
    	$this->set('userid', $userid);
    	$this->set('mygames', $cond);
    	$this->set('favorites', $cond2);
    	$this->set('limit', $limit);
		$this->set('title_for_layout', 'Toork - Create your own game channel');
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Wallentry->id = $id;
		if (!$this->Wallentry->exists()) {
			throw new NotFoundException(__('Invalid wallentry'));
		}
		$this->set('wallentry', $this->Wallentry->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Wallentry->create();
			if ($this->Wallentry->save($this->request->data)) {
				$this->Session->setFlash(__('The wallentry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wallentry could not be saved. Please, try again.'));
			}
		}
		$users = $this->Wallentry->User->find('list');
		$games = $this->Wallentry->Game->find('list');
		$this->set(compact('users', 'games'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Wallentry->id = $id;
		if (!$this->Wallentry->exists()) {
			throw new NotFoundException(__('Invalid wallentry'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Wallentry->save($this->request->data)) {
				$this->Session->setFlash(__('The wallentry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wallentry could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Wallentry->read(null, $id);
		}
		$users = $this->Wallentry->User->find('list');
		$games = $this->Wallentry->Game->find('list');
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
		$this->Wallentry->id = $id;
		if (!$this->Wallentry->exists()) {
			throw new NotFoundException(__('Invalid wallentry'));
		}
		if ($this->Wallentry->delete()) {
			$this->Session->setFlash(__('Wallentry deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Wallentry was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
