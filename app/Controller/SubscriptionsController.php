<?php
App::uses('AppController', 'Controller');
/**
 * Subscriptions Controller
 *
 * @property Subscription $Subscription
 */
class SubscriptionsController extends AppController {

    public $helpers = array('Html', 'Form','Upload');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Subscription->recursive = 0;
		$this->set('subscriptions', $this->paginate());
	}


	public function leftpanel(){
		$this->loadModel('Game');
		$this->Game->recursive = 0;
		$cat=$this->Game->Category->find('all');
		$this->set('category', $cat);
	}

    public function followstatus($target_id=NULL)
	{
	   if($this->Auth->user('id'))
	   { //openning of auth_id control
	   $auth_id=$this->Session->read('Auth.User.id');
	   $targetchannelid=$target_id;
	   $status=$this->Subscription->find('first',array('contains'=>false,'conditions'=>array('Subscription.subscriber_id'=>$auth_id,'Subscription.subscriber_to_id'=>$targetchannelid)));
	     if($status!=NULL)
	     {
		  return 1;
		 }else{
		 return 0;
		 }
	   }
	
	}


	public function usergame_user_panel() {
		$this->loadModel('User');
		$this->loadModel('Game');
		$this->loadModel('Playcount');
		$this->layout='base';
		$userid = $this->request->params['pass'][0];
	    $gamenumber = $this->Game->find('count', array('conditions' => array('Game.User_id' => $userid)));
	    $favoritenumber = $this->Game->Favorite->find('count', array('conditions' => array('Favorite.User_id' => $userid)));
	    $subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
	    $subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$playcount = $this->Playcount->find('count', array('conditions' => array('Playcount.user_id' => $userid)));
		$user = $this->User->find('first', array('conditions'=> array('User.id'=>$userid)));
	    $this->set('user',$user);

	    $this->set('userid', $userid);
	    $this->set('gamenumber', $gamenumber);
	    $this->set('favoritenumber', $favoritenumber);
	    $this->set('subscribe', $subscribe);
	    $this->set('subscribeto', $subscribeto);
	    $this->set('playcount', $playcount);

	}

	public function followers() {
		$this->loadModel('Game');
		$this->loadModel('User');
		$this->layout='base';
		$this->leftpanel();
		$this->usergame_user_panel();
		$userid = $this->request->params['pass'][0];
		$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    	$userName = $user['User']['username'];
    	$this->set('user_id', $userid);
		$this->set('title_for_layout', 'Toork - Followers');
		$this->set('username', $userName);

		$this->set('followers', $this->paginate('Subscription',array('Subscription.subscriber_to_id' => $userid)));

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
	
	public function sub_check()
	{
	
	$this->layout = "ajax";
	
	
	if ($this->request->is('get')) {
		
		 $subscriber_id=$this->Auth->user('id');
		  $subscriber_to_id=$this->request["pass"][0];
		
		
		$subscribebefore=$this->Subscription->find("first",array("conditions"=>array("Subscription.subscriber_id"=>$subscriber_id,"Subscription.subscriber_to_id"=>$subscriber_to_id)));
		
		if(empty($subscribebefore))
		
		{
		
		$this->set('SubMessage',0);
		
		
			
			}
			else
			{
			
		$this->set('SubMessage',1);
		
		}
	
	
	
	}}
	
	
	public function quick_subscription()
	{
	$this->loadModel('User');
	$this->layout = "ajax";
	$recommended=Configure::read('recommended.id');
	
	
if($auth=$this->Auth->user('id'))
{ 
	
    $check_it=$this->Subscription->find('first',array('contain'=>false,'fields'=>array('Subscription.subscriber_id'),'conditions'=>array('subscriber_id'=>$auth,'subscriber_to_id'=>$recommended)));
	
	if($check_it==NULL)
	{
		
		
		$this->Subscription->create();
		$this->request->data['Subscription']['subscriber_id']=$auth;
		$this->request->data['Subscription']['subscriber_to_id']=$recommended;
		  if($this->Subscription->save($this->request->data))
		  {
		  //echo 'written';
		  }
	}	
	
}	
	
	//Update Userstat for recommended channel	
	$this->requestAction( array('controller' => 'userstats', 'action' => 'sync_recommended','fdsfsdf23123123@ff'));
	}
	
	public function mass_subscription()
	{
	$this->layout = "ajax";
	  //if varswitch equal to 0 function will be stopped.
	  $varswitch=0;
	  if($varswitch==0)
	  $this->redirect('/');
	
	$recommended=Configure::read('recommended.id');
	//Detect user ids' which has not chained to recommended.
	$checked=$this->Subscription->find('all',array('contain'=>false,'fields'=>array('Subscription.subscriber_id'),'conditions'=>array('subscriber_to_id'=>$recommended)));
	  
        $i=0;
		$checkedids=array();	  
	    if($checked!=NULL)
	    {
	         foreach($checked as $checkeditems)
		     {  
		      $checkedids[$i]=$checkeditems['Subscription']['subscriber_id'];
			  $i++;
		     }
	    }
		
		print_r($checkedids);
		$targetids=$this->User->find('all',array('contain'=>false,'fields'=>array('User.id'),'conditions'=>array('NOT' => array('User.id' => $checkedids))));
		
		foreach($targetids as $targets)
		{
		echo $targets['User']['id'];
		$this->Subscription->create();
		$this->request->data['Subscription']['subscriber_id']=$targets['User']['id'];
		$this->request->data['Subscription']['subscriber_to_id']=$recommended;
		  if($this->Subscription->save($this->request->data))
		  {
		  echo 'written';
		  }
		
		}
	//Update Userstat for recommended channel	
	$this->requestAction( array('controller' => 'userstats', 'action' => 'sync_recommended','fdsfsdf23123123@ff'));
	
	
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
				$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$subscriber_to_id,$subscriber_id,5,1));	
			} else {
			$this->set('SubMessage','The subscription could not be saved. Please, try again.');
				
			}
			
			
			}
			else
			{
			$this->Subscription->id = $subscribebefore["Subscription"]["id"];
			if ($this->Subscription->delete()) {
			$this->set('SubMessage','Subscription deleted');
			//$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$subscriber_to_id,$subscriber_id,5,0));	Unfollow postu atilmayacak.
			
		}
			}
			
			
		}
		$this->requestAction( array('controller' => 'userstats', 'action' => 'incscribe',$subscriber_to_id));
		
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
