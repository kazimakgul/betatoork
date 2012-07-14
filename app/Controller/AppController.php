<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
// app/Controller/AppController.php
class AppController extends Controller {
    //...


    public $components = array(
        'Session','Cookie','RequestHandler',
		'Facebook.Connect'=>array('model' => 'User'),
        'Auth' => array(
            'loginRedirect' => array('controller' => 'games', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'games', 'action' => 'index'),
            'authorize' => array('Controller')
        )
    );

    var $paginate = array(
        'User' => array(
            'limit' => 30,
            'order' => array(
                'User.totalrate' => 'desc',
            ),
        ),
        'Game' => array(
            //'conditions' => array('(Game.starsize * Game.rate_count) >' => '50'),
            'limit' => 28,
            'order' => array(
                'Game.recommend' => 'desc',
            ),
        ),
        'Subscription' => array(
            'limit' => 30,
            'order' => array(
                'Subscription.created' => 'desc',
            ),
        ),
        'Favorite' => array(
            'limit' => 28,
            'order' => array(
                'Favorite.recommend' => 'desc',
            ), 'recursive'=>'2'
        ),
        'Playcount' => array(
            'limit' => 28,
            'order' => array(
                'Game.recommend' => 'desc',
            ),'recursive'=>'2'
        ), 
    );


    public function beforeFilter() {
	$this->loadModel('User');
    $this->Auth->allow('index','checkUser','view','register','login','logout','play','profile','usergames','playlist','search','display','activate','reset_request','reset_now','mostplayed','toprated','categorygames','followers','subscriptions','follow_card','add_subscription','sub_check','add_play','bestChannels','playedgames','play2','randomAvatar','lastadded','allusergames','alluserfavorites','allchannelgames','allchannelfavorites','seoplay','seoplay2','channelgames');

$this->set('user',$this->Auth->user());
$this->set('facebook_user',$this->Connect->user());


               //sil
			   $null_user=$this->User->find('all',array('conditions'=>array('User.facebook_id'=>711440119)));
			   if($null_user!=NULL)
			   echo 'NullUser:';
			   print_r($null_user);
			   //sil
			   
			   
			   foreach($null_user as $nulles)
			   {
			   $this->User->id=$nulles['User']['id'];
			   $this->User->delete();
			   }
			  


   if($this->Connect->user())
   {
   //$this->check_facebook_user();
   }

    }
    
	function check_facebook_user()
	{
	//echo 'check facebook run';
	$this->loadModel('User');
	$facebook_id=$this->Connect->user('id');
    $facebook_email=$this->Connect->user('email');
	//echo 'Special Facebook Id:'.$facebook_id;
	//echo 'Special Facebook Email:'.$facebook_email;
	$check_face_user=$this->User->find('first',array('conditions'=>array('User.facebook_id'=>$facebook_id,'User.email'=>$facebook_email)));
    print_r($check_face_user);
	   if($check_face_user==NULL)
	   {       
	           //echo 'id with email row not found';
	           //init starts
	          // if($this->Connect->user('username')!=NULL)
        	   //$this->request->data['User']['username']= $this->Connect->user('username');
			   //else
			   $this->request->data['User']['username']= $this->Connect->user('first_name').$this->Connect->user('last_name');
			
	           $this->request->data['User']['email']= $this->Connect->user('email');
			   //init ends
			   
			      //if only the facebook_id exists but not email
			      $check_face_id=$this->User->find('first',array('conditions'=>array('User.facebook_id'=>$facebook_id)));
			      
				  if($check_face_id!=NULL)
	              {
				  //echo 'id with mail not exist but id exists';
			      $unmodified_id=$check_face_id['User']['id'];
				  echo 'Unmodified Id'.$unmodified_id;
				  print_r($check_face_id);
			      $this->User->id=$unmodified_id;
				  
				  $this->request->data['User']['username']= $this->Connect->user('username');
			      $this->request->data['User']['email']= $this->Connect->user('email');
				  
				  //handle error messages later
				  
				  if($this->User->save($this->request->data))
				  echo 'saved';
			   
			   
			      }
			   
			     
			   
			   
			   
	   }
	
	
	}
	
	
	function beforeFacebookLogin($user){
    
}
	
	
    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === '1') {
            return true; //Admin can access every action
        }
        return false; // The rest don't
    }



public function http_check($str)
{

if(substr($str, 0, 7)!="http://")
			{
		$str="http://".$str;
		return $str;
			}
			else
			{
			return $str;
			}
}


}
