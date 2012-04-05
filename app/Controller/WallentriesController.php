<?php
App::uses('AppController', 'Controller');
/**
 * Wallentries Controller
 *
 * @property Wallentry $Wallentry
 */
class WallentriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Wallentry->recursive = 0;
		$this->set('wallentries', $this->paginate());
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
