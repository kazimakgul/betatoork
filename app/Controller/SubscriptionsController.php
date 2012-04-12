<?php
App::uses('AppController', 'Controller');
/**
 * Subscriptions Controller
 *
 * @property Subscription $Subscription
 */
class SubscriptionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Subscription->recursive = 0;
		$this->set('subscriptions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Subscription->id = $id;
		if (!$this->Subscription->exists()) {
			throw new NotFoundException(__('Invalid subscription'));
		}
		$this->set('subscription', $this->Subscription->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subscription->create();
			if ($this->Subscription->save($this->request->data)) {
				$this->Session->setFlash(__('The subscription has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subscription could not be saved. Please, try again.'));
			}
		}
		$subscribers = $this->Subscription->Subscriber->find('list');
		$subscriberTos = $this->Subscription->SubscriberTo->find('list');
		$this->set(compact('subscribers', 'subscriberTos'));
	}
	
	
	public function add_subscription() {
	$this->layout = "ajax";
if ($this->request->is('get')) {
		
		 $subscriber_id=$this->Auth->user('id');
		  $subscriber_to_id=$this->request["pass"][0];
		
		
		$subscribebefore=$this->Subscription->find("first",array("conditions"=>array("Subscription.subscriber_id"=>$subscriber_id,"Subscription.subscriber_to_id"=>$subscriber_to_id)));
		
		if(empty($subscribebefore))
		
		{
		
			$this->Subscription->create();
			
			$this->request->data["Subscription"]["subscriber_id"]=$subscriber_id;
				$this->request->data["Subscription"]["subscriber_to_id"]=$subscriber_to_id;
				
				
			if ($this->Subscription->save($this->request->data)) {
				$this->set('SubMessage','Subscription saved.');
				
			} else {
			$this->set('SubMessage','The subscription could not be saved. Please, try again.');
				
			}
			
			
			}
			else
			{
			$this->Subscription->id = $subscribebefore["Subscription"]["id"];
			if ($this->Subscription->delete()) {
			$this->set('SubMessage','Subscription deleted');
			
			
		}
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
		$this->Subscription->id = $id;
		if (!$this->Subscription->exists()) {
			throw new NotFoundException(__('Invalid subscription'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subscription->save($this->request->data)) {
				$this->Session->setFlash(__('The subscription has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subscription could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Subscription->read(null, $id);
		}
		$subscribers = $this->Subscription->Subscriber->find('list');
		$subscriberTos = $this->Subscription->SubscriberTo->find('list');
		$this->set(compact('subscribers', 'subscriberTos'));
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
		$this->Subscription->id = $id;
		if (!$this->Subscription->exists()) {
			throw new NotFoundException(__('Invalid subscription'));
		}
		if ($this->Subscription->delete()) {
			$this->Session->setFlash(__('Subscription deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subscription was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
