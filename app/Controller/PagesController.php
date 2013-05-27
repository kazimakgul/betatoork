<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {



/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 */
		public $helpers = array('Html', 'Form','Upload','Session','Recaptcha.Recaptcha','Facebook.Facebook');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */

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

//this gets channel suggestions
	public function get_suggestions($restrict)
	{
	$top50=$this->User->query('SELECT user_id from userstats ORDER BY potential desc LIMIT '.$restrict);
		$list50=array();
		$i=0;
		foreach($top50 as $oneof50)
		{
		$list50[$i]=$oneof50['userstats']['user_id'];
		$i++;
		}
		return $list50;
	}

public function set_suggested_channels()
{
//Set first situation of flags
		$restrict=50;
		$status='normal';
		$counter=0;
		$limit=20;
		$authid = $this->Session->read('Auth.User.id');
		//Repeat it to get data
		$listofmine=$this->Subscription->find('list',array('conditions'=>array('Subscription.subscriber_id'=>$authid),'fields'=>array('Subscription.subscriber_to_id')));
		do{
		$suggestdata=$this->User->find('all',array('limit' => $limit,'order'=>'rand()','conditions'=>array('User.id'=>$this->get_suggestions($restrict),'NOT' => array('User.id' => $listofmine))));
          if($suggestdata==NULL)
		  {
          $status='empty';
		  $restrict+=10;
		  $counter++;
		  }else{
		  $status='normal';
		  }
		  if($counter==3)
		  break;
		}while($status=='empty');
		$category = $this->Category->find('all');
		$this->set('category',$category);
	   	$this->set('channels',$suggestdata);

}

	public function display() {
		$path = func_get_args();
		$this->layout='dashboard';
		$this->leftpanel();
		$this->logedin_user_panel();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set_suggested_channels();
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->set('description_for_layout', 'Toork is a social network for online gamers. With Toork, you will be able to create your own game channel.');
		$this->render(implode('/', $path));
	}
}
