<?php
App::uses('AppController', 'Controller');
/**
 * Playcounts Controller
 *
 * @property Playcount $Playcount
 */
class PlaycountsController extends AppController {


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
