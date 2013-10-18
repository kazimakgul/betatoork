<?php
App::uses('AppController', 'Controller');
/**
 * Rates Controller
 *
 * @property Rate $Rate
 */
class RatesController extends AppController {


/**
 * index method
 *
 * @return void
 */
 public function beforeFilter() {
        $this->Auth->allow('add','edit');
    }
	
	
	
	public function isAuthorized($user) {
	    if (parent::isAuthorized($user)) {
	        return true;
	    }

	    if ($this->action === 'edit') {
	       // All registered users can add posts
	        return true;
	    }
	    if (in_array($this->action, array('edit', 'delete'))) {
	        $postId = $this->request->params['pass'][0];
	        return $this->Rate->isOwnedBy($postId, $user['id']);
	    }

	    return false;
	}
	
 
 
	public function index() {
		$this->Rate->recursive = 0;
		$this->set('rates', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Rate->id = $id;
		if (!$this->Rate->exists()) {
			throw new NotFoundException(__('Invalid rate'));
		}
		$this->set('rate', $this->Rate->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		$this->layout = "ajax";
		
		if ($this->request->is('post')) {
			
				$user_id=$this->Auth->user('id');
				$game_id=$this->request["pass"][0];
				$rating=$this->request["pass"][1];
				$ratebefore=$this->Rate->find("first",array("conditions"=>array("Rate.user_id"=>$user_id,"Rate.game_id"=>$game_id),"fields"=>array("Rate.user_id","Rate.game_id","Rate.id")));
				
			if(empty($ratebefore))
			{
			
				$this->Rate->create();
				$this->request->data["Rate"]["user_id"]=$user_id;
				$this->request->data["Rate"]["game_id"]=$game_id;
				$this->request->data["Rate"]["current"]=$rating;
				if($this->Rate->save($this->request->data))
				{
				    $this->starsize($game_id,1);
					$this->requestAction( array('controller' => 'userstats', 'action' => 'totalrate',$game_id));
					$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$game_id,$user_id,8,1));
					$this->set("rateMessage","Your rating has been saved.");

				}else{
					$this->set("rateMessage","The rate could not be saved.");
					if(!isset($user_id)){$this->set("rateMessage","Please login first.");}
				}
			
			}else{
			$this->set("rateMessage","You rated this game before!");
			$this->redirect(array('action' => 'edit',$ratebefore["Rate"]["id"],$rating));
			}
		}
	}

public function starsize($game_id,$flag)
{

$count=$this->Rate->find('count',array('conditions'=>array('game_id'=>$game_id)));
$sum=$this->Rate->find('first',array('conditions'=>array('game_id'=>$game_id),'fields'=>array('sumrate')));
$sum_value=$sum["Rate"]["sumrate"];

if($count==0 || $count==""){$count=1;}
if($sum_value==0 || $sum_value==""){$sum_value=1;}
$current=$sum_value/$count;
$starsize=(100*$current)/5;

$this->Rate->Game->id =$game_id;
if (!$this->Rate->Game->exists()) {
			throw new NotFoundException(__('Invalid Game Id on starsize func.'));
		}
		
		if($game_id!="")
		{
		$this->request->data["Game"]["starsize"]=$starsize;
		if($flag==1)
		{
		$this->request->data["Game"]["rate_count"]=$this->Rate->Game->field("rate_count")+1;
		}
		if ($this->Rate->Game->save($this->request->data)) {
			
				$this->set("mess","The game has been updated.");
				
			} else {
				$this->set("mess","The game could not be updated. Please, try again.");
			}
		
		}
		
}
 
 
 
 
	public function edit() {
	$this->layout = "ajax";
	$rate_id=$this->request["pass"][0];
	$rating=$this->request["pass"][1];
	$this->set("myid",$rate_id);
	$this->set("rating",$rating);
	$this->request->data["Rate"]["current"]=$rating;
		$this->Rate->id = $rate_id;
		$game_id=$this->Rate->field('game_id');
		if (!$this->Rate->exists()) {
			throw new NotFoundException(__('Invalid rate'));
		}
		if ($rate_id!=NULL && $rating!=NULL) {
			if ($this->Rate->save($this->request->data)) {
			    $this->starsize($this->Rate->field('game_id'),0);
				$this->requestAction( array('controller' => 'userstats', 'action' => 'totalrate',$game_id));
				$this->set("mess","Your rating has been updated.");
				
			} else {
				$this->set("mess","The rate could not be updated. Please, try again.");
			}
		} else {
			$this->request->data = $this->Rate->read(null, $rate_id);
		}
		
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
		$this->Rate->id = $id;
		if (!$this->Rate->exists()) {
			throw new NotFoundException(__('Invalid rate'));
		}
		if ($this->Rate->delete()) {
			$this->Session->setFlash(__('Rate deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Rate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Rate->recursive = 0;
		$this->set('rates', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Rate->id = $id;
		if (!$this->Rate->exists()) {
			throw new NotFoundException(__('Invalid rate'));
		}
		$this->set('rate', $this->Rate->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Rate->create();
			if ($this->Rate->save($this->request->data)) {
				$this->Session->setFlash(__('The rate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rate could not be saved. Please, try again.'));
			}
		}
		$games = $this->Rate->Game->find('list');
		$users = $this->Rate->User->find('list');
		$this->set(compact('games', 'users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Rate->id = $id;
		if (!$this->Rate->exists()) {
			throw new NotFoundException(__('Invalid rate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Rate->save($this->request->data)) {
				$this->Session->setFlash(__('The rate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rate could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Rate->read(null, $id);
		}
		$games = $this->Rate->Game->find('list');
		$users = $this->Rate->User->find('list');
		$this->set(compact('games', 'users'));
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
		$this->Rate->id = $id;
		if (!$this->Rate->exists()) {
			throw new NotFoundException(__('Invalid rate'));
		}
		if ($this->Rate->delete()) {
			$this->Session->setFlash(__('Rate deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Rate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
