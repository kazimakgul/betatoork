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
class FbsController extends AppController {
    //...


    

/*
   public function beforeRender() {
   if($this->params['controller']=='games' && $this->params['action']=='index')
   $this->set('facebook_user',$this->Connect->user('id'));
   }
*/

public function beforeFilter() {

		parent::beforeFilter();
		
		$this->loadModel('User');
        $this->set('user',$this->Auth->user());
		
  
    }
    
	
	
	
	function beforeFacebookLogin($user){
    
}
	
	
    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === '1') {
            return true; //Admin can access every action
        }
        return false; // The rest don't
    }

public function addrandom($username)
{
$random=rand(100,999);
return $username.$random;
}


public function checkUsername($username)
{
$this->loadModel('User');
       $flag=0;
	   
	  do
	  { 
	      $userExists=$this->User->find('first',array('conditions'=>array('User.username'=>$username)));
          if($userExists!=NULL)
          {
	      $username=$this->addrandom($username);
	      }else{
		  $flag=1;
		  }
		  
	  }	while($flag==0);  
   return $username;
}

public function connect()
{
  
  if($this->Auth->user('facebook_id')==NULL){
  $this->redirect($this->referer());
  }
  
   $this->layout='base';

	$this->loadModel('User');
	$facebook_id=$this->Connect->user('id');
    $facebook_email=$this->Connect->user('email');
	$generated_name=$this->checkUsername($this->Connect->user('username'));
	//echo 'Special Facebook Id:'.$facebook_id;
	//echo 'Special Facebook Email:'.$facebook_email;
	
    if($facebook_id!=NULL)//check fb_id exist begins 
    {	
	     print_r($this->Connect->user());
		 break;
    }

    $this->redirect($this->Auth->loginRedirect);
}


}
