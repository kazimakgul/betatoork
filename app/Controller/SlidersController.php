<?php
App::uses('AppController', 'Controller');
/**
 * Sliders Controller
 *
 * @property Slider $Slider
 */
class SlidersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Slider->recursive = 0;
		$this->set('sliders', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Slider->id = $id;
		if (!$this->Slider->exists()) {
			throw new NotFoundException(__('Invalid slider'));
		}
		$this->set('slider', $this->Slider->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Slider->create();
			if ($this->Slider->save($this->request->data)) {
				$this->Session->setFlash(__('The slider has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slider could not be saved. Please, try again.'));
			}
		}
		$users = $this->Slider->User->find('list');
		$games = $this->Slider->Game->find('list');
		$this->set(compact('users', 'games'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Slider->id = $id;
		if (!$this->Slider->exists()) {
			throw new NotFoundException(__('Invalid slider'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Slider->save($this->request->data)) {
				$this->Session->setFlash(__('The slider has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slider could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Slider->read(null, $id);
		}
		$users = $this->Slider->User->find('list');
		$games = $this->Slider->Game->find('list');
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
		$this->Slider->id = $id;
		if (!$this->Slider->exists()) {
			throw new NotFoundException(__('Invalid slider'));
		}
		if ($this->Slider->delete()) {
			$this->Session->setFlash(__('Slider deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Slider was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
