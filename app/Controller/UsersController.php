<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {


public $components = array('AutoLogin','Email','Amazonsdk.Amazon','Recaptcha.Recaptcha');
public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha','Facebook.Facebook');


	public function beforeFilter() {
		parent::beforeFilter();
  	  	$this->Auth->authenticate = array('Custom');

           
		   
		   

     // cookie autologin 
      if(!$this->Auth->user('id')) 
       { 
              $cookie = $this->Cookie->read('User'); 
              
               if($cookie) 
               { 
                   $this->request->data['User']['username']=$cookie['username'];
			       $this->request->data['User']['password']=$cookie['password'];
                   $this->Auth->login(); 
               } 

       } 
		   
		   //auto login
		
  }


    public function isAuthorized($user) {
	    if (parent::isAuthorized($user)) {
	    	
	        return true;
	    }
//her kayitli userin user add fonksiyonunu kullanmasi gibi birsey vardi.Iptal ettim.
//	    if (($this->action === 'add')){
	       // All registered users can add posts
	//        return true;
	   // }
	   
	   
	   
	    if (in_array($this->action, array('edit','password','settings'))) {
	        $userId = $this->request->params['pass'][0];
	        return $this->User->isOwnedBy($userId, $user['id']);
	    }

	    return false;
	}


function activate($user_id = null, $in_hash = null) {
	$this->User->id = $user_id;
	if ($this->User->exists() && ($in_hash == $this->User->getActivationHash()))
	{
		// Update the active flag in the database
		$this->User->saveField('active', 1);
 
		// Let the user know they can now log in!
		$this->Session->setFlash('Your account has been activated, please log in using your cridentials');
		$this->redirect('/');
	}
 
	// Activation failed, render '/views/user/activate.ctp' which should tell the user.
}


public function reset_request()
{
	$this->layout='base';

    if($this->request->is('post'))
    {

        $email=$this->request->data["User"]["email"];
		if(isset($email) && $email!="")
		{
		$user = $this->User->find('first',array('conditions' => array('User.email'=>$email)));

		if ($user === false) {
			$this->Session->setFlash('This email is not registered to toork yet.');
			return false;
		}

		$this->__sendResetEmail($user["User"]["id"]);
		}else{
		$this->Session->setFlash('Please Enter A Valid Email!');
		}
        
        	
		
		
		

    }

}

public function reset_now($user_id = null, $in_hash = null){

		$this->layout = 'base';
		$userid=$user_id;
      	$this->User->id = $user_id;

      if ($this->User->exists() && ($in_hash == $this->User->getActivationHash()))
	  {
	//password reset begin
	
	
	if ($this->request->is('post') || $this->request->is('put')) {
		
	if($this->request->data["User"]["new_password"]!="")
	{
	    
		$this->request->data["User"]["password"]=$this->request->data["User"]["new_password"];
	     $this->request->data["User"]["confirm_password"]=$this->request->data["User"]["new_password"];

	}
		
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Your password has been reset, Please login with your new password');
				$this->redirect('/');
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
			
			
			
			
		} else {
		
			//request is not post
		}
	
	
	
	//password reset ends
	  }//user exist and hash
	  	$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    	$userName = $user['User']['username'];
	    $this->set('user',$user);
		$this->set('userid', $userid);
        $this->set('username', $userName);


}

public function __sendActivationEmail($user_id) {

		$user = $this->User->find('first',array('conditions' => array('User.id'=>$user_id)));
		
		// Set data for the "view" of the Email
		$this->set('activate_url', 'http://toork.com/users/activate/' . $user['User']['id'] . '/' . $this->User->getActivationHash());
		$this->set('username', $user["User"]["username"]);
 
 		$this->Email->from  = 'Toork <no-reply@toork.com>';
		$this->Email->to = $user['User']['email'];
		//$this->Email->subject = 'Toork - Please confirm your email address';
		$this->Email->subject = 'Welcome to Toork';
		$this->Email->template = 'simple_mail';
		$this->Email->sendAs = 'html';   // you probably want to use both :)	
		return $this->Email->send();
	}



public function __sendResetEmail($user_id) {

        $this->User->id=$user_id;
		$user = $this->User->find('first',array('conditions' => array('User.id'=>$user_id)));
		
		if ($user === false) {
			$this->Session->setFlash('This mail is not registered.');
			debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
			return false;
		}
 
		// Set data for the "view" of the Email
		$this->set('reset_url', 'http://toork.com/users/reset_now/' . $user['User']['id'] . '/' . $this->User->getActivationHash());
		$this->set('username', $user["User"]["username"]);
        $this->Email->from  = 'Toork <no-reply@toork.com>';
		$this->Email->to = $user["User"]["email"];
		$this->Email->subject = 'Toork - Password Reset';
		$this->Email->template = 'forgot_password';
		
		$this->Email->sendAs = 'html';   // you probably want to use both :)	
		
		
		
		if($this->Email->send())
	  	{
		$this->Session->setFlash('A reset link has been sent, please check your email to reset your password');
		}else{
		$this->Session->setFlash("Reset email has not been sent.");
		}
		
		
	}


    public function login() {
    	$this->layout = 'base';
		
		

    	if($this->request->is('post')){
    		if(empty($this->data['User']['username'])){
    			$this->User->validationErrors['username'] = "Please enter your username";
    		}
    		if(empty($this->data['User']['password'])){
    			$this->User->validationErrors['password'] = "Please enter your password";
    		}
		    else if ($this->Auth->login()) {
			
	
				$results = $this->User->find('first',array('conditions'=>array('OR'=>array('User.email'=>$this->data['User']['username'],'User.username'=>$this->data['User']['username'])),array('fields'=>array('User.active'))));
	  	        if ($results['User']['active'] == 0) {
	  	        $this->Session->setFlash('Your account has not been activated yet! Please check your email to activate your account');
	  	        $this->Auth->logout();
	  	        $this->redirect('/');
	  	
                } else {
				
				     if($this->data['User']['remember']==1)
					 {
					 
					  $cookie = array();
                      $cookie['username'] = $this->request->data['User']['username'];
                      $cookie['password'] = $this->request->data['User']['password'];
                      $this->Cookie->write('User', $cookie, true, '+2 weeks');
					 
					 }
 	 			$this->redirect($this->Auth->loginRedirect);
                //$this->redirect($this->Auth->redirect(array('controller' => 'games', 'action' => 'channel')));
	  	
                }
				
			
		        
		    } else {
		        $this->Session->setFlash('Please enter a valid username and password');
		        $this->redirect('/');
		    }
		}
	}

	public function logout() {
	    $this->Cookie->delete('User');
		$this->Session->destroy();
	    $this->redirect($this->Auth->logout());
	}

	public function profile() {
		if($this->Session->check('Auth.User')){
			return true;
		}else{
			$this->logout();
		}
		
	}

	public function randomAvatar() {
 		$pic_number = rand(1,77);
 		return $pic_number;
        //$this->set('randomAvatar' , $random['Game']['id']);
}
    //List of Bestchannel Names 
	public function bestChannels(){
	
		$this->loadModel('Game');
		$limit=20;
		$users = $this->User->find('all',array('limit' => $limit, 'order' => array('Userstat.potential' => 'desc')));
    	return $users;
	}


/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}




function secureSuperGlobalPOST($value)
    {
	    $string = preg_replace('/[^\w\d_ -]/si', '', $value);
        $string = htmlspecialchars(stripslashes($string));
        $string = str_ireplace("script", "blocked", $string);
        $string = mysql_escape_string($string);
		$string = htmlentities($string);
        return $string;
    }



/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		
		$this->request->data['User']['username']=$this->secureSuperGlobalPOST($this->request->data['User']['username']);
		
		
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function register() {
		if ($this->request->is('post')) {
		
		$this->request->data['User']['username']=$this->secureSuperGlobalPOST($this->request->data['User']['username']);
		$this->request->data['User']['username']=str_replace(' ','',$this->request->data['User']['username']);
		
		     //seousername begins
		     $this->request->data['User']['seo_username']=str_replace('.','',strtolower($this->request->data['User']['username']));
		     //seousername ends
		
			$this->User->create();
			if ($this->User->save($this->request->data)) {

			/*	Bu blok direk calisiyor
				
				$this->Email->from  = 'root@toork.com';
				$this->Email->to   = 'denemeli@faros.com.tr';
				$this->Email->subject = 'deniyorum';
				$this->Email->send('Hello message body!');
				*/
				$this->__sendActivationEmail($this->User->getLastInsertID());
				$this->Session->setFlash('You are successfully registered. Please check your email to verify your account');
				$this->redirect(array('controller' => 'games', 'action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				$validationErrors = $this->User->invalidFields();
				$value = key($validationErrors);
    			$this->Session->setFlash($validationErrors[$value][0]);
				$this->redirect(array('controller' => 'games', 'action' => 'index'));
			}
		}
	}


/**
 * edit method
 *
 * @param string $id
 * @return void
 */
 	public function settings(){
 		if($this->Session->read('Auth.User.role')=='1'){
 			$this->redirect(array('action' => 'useredit',$this->Session->read('Auth.User.id')));
		}else{
			$this->redirect(array('action' => 'edit',$this->Session->read('Auth.User.id')));		
		}
 	}

	public function edit($id = null) {
	
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
		$this->layout = 'base';
		$this->loadModel('Subscription');
		$userid=$id;
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
		$this->request->data['User']['username']=$this->secureSuperGlobalPOST($this->request->data['User']['username']);
		$this->request->data['User']['username']=str_replace(' ','',$this->request->data['User']['username']);
		$myval=$this->request->data["User"]["edit_picture"]["name"];
		
		if($myval!="")
			{
			
			//remove objects from S3
			$prefix = 'upload/users/'.$id;
           
  
             $opt = array(
             'prefix' => $prefix,
             );
			 $bucket=Configure::read('S3.name');
			 $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
			 foreach($objs as $obj)
			 {
			 $response=$this->Amazon->S3->delete_object(Configure::read('S3.name'), $obj);
			 //print_r($response);
			 }
			//remove objects from S3
			
			
			
			//Folder Formatting begins
			$dir = new Folder(WWW_ROOT ."/upload/users/".$id);
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $file->delete();
            $file->close(); 
            }
			//Folder Formatting ends
			
			$this->request->data["User"]["picture"]=$this->request->data["User"]["edit_picture"];
			
			}
		
		     //seousername begins
		     $this->request->data['User']['seo_username']=str_replace('.','',strtolower($this->request->data['User']['username']));
		     //seousername ends
		
		
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('You successfully updated your channel'));
				
				
				//Upload to aws begins
			$dir = new Folder(WWW_ROOT ."/upload/users/".$id);
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $info=$file->info();
			$basename=$info["basename"];
			$dirname=$info["dirname"];
			//echo $file;
			 $this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/users/'.$id."/".$basename,
             array(
            'fileUpload' => WWW_ROOT ."/upload/users/".$id."/".$basename,
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			
            }
			//Upload to aws ends
				
				
				$this->redirect(array('action' => 'edit',$this->Session->read('Auth.User.id')));
			} else {
				$validationErrors = $this->User->invalidFields();
				$value = key($validationErrors);
    			$this->Session->setFlash($validationErrors[$value][0]);
				$this->redirect(array('controller' => 'users', 'action' => 'edit',$userid));
			}	
		} else {
		
			$this->request->data = $this->User->read(null, $id);
			$this->request->data["User"]["password"]="";
		}
		$countries = $this->User->Country->find('list');
		$this->set(compact('countries'));
		
		
		$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    	$userName = $user['User']['username'];
	    $this->set('user',$user);
		$this->set('userid', $userid);
        $this->set('username', $userName);
    	$subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
		$subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$this->set('subscribe', $subscribe);
		$this->set('subscribeto', $subscribeto);
		
		
		
		
	}

public function adminedit($id = null) {
	
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
		$this->layout = 'base';
		$this->loadModel('Subscription');
		$userid=$id;
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
		$this->request->data['User']['username']=$this->secureSuperGlobalPOST($this->request->data['User']['username']);
		$this->request->data['User']['username']=str_replace(' ','',$this->request->data['User']['username']);
		$myval=$this->request->data["User"]["edit_picture"]["name"];
		
		if($myval!="")
			{
			
			//remove objects from S3
			$prefix = 'upload/users/'.$id;
           
  
             $opt = array(
             'prefix' => $prefix,
             );
			 $bucket=Configure::read('S3.name');
			 $objs = $this->Amazon->S3->get_object_list($bucket, $opt);
			 foreach($objs as $obj)
			 {
			 $response=$this->Amazon->S3->delete_object(Configure::read('S3.name'), $obj);
			 //print_r($response);
			 }
			//remove objects from S3
			
			
			
			//Folder Formatting begins
			$dir = new Folder(WWW_ROOT ."/upload/users/".$id);
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $file->delete();
            $file->close(); 
            }
			//Folder Formatting ends
			
			$this->request->data["User"]["picture"]=$this->request->data["User"]["edit_picture"];
			
			}
		
		     //seousername begins
		     //$this->request->data['User']['seo_username']=str_replace('.','',strtolower($this->request->data['User']['username']));
		     //seousername ends
		
		
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('You successfully updated your channel'));
				
				
				//Upload to aws begins
			$dir = new Folder(WWW_ROOT ."/upload/users/".$id);
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $info=$file->info();
			$basename=$info["basename"];
			$dirname=$info["dirname"];
			//echo $file;
			 $this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/users/'.$id."/".$basename,
             array(
            'fileUpload' => WWW_ROOT ."/upload/users/".$id."/".$basename,
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			
            }
			//Upload to aws ends
				
				
				$this->redirect(array('action' => 'useredit',$this->Session->read('Auth.User.id')));
			} else {
				$validationErrors = $this->User->invalidFields();
				$value = key($validationErrors);
    			$this->Session->setFlash($validationErrors[$value][0]);
				$this->redirect(array('action' => 'useredit',$this->Session->read('Auth.User.id')));
			}	
		} else {
		
			$this->request->data = $this->User->read(null, $id);
			$this->request->data["User"]["password"]="";
		}
		$countries = $this->User->Country->find('list');
		$this->set(compact('countries'));
		
		
		$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    	$userName = $user['User']['username'];
	    $this->set('user',$user);
		$this->set('userid', $userid);
        $this->set('username', $userName);
    	$subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
		$subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$this->set('subscribe', $subscribe);
		$this->set('subscribeto', $subscribeto);
		
		
		
		
	}




		public function password($id = null) {
		$this->layout = 'base';
		$this->loadModel('Subscription');
		$userid=$id;
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
	if($this->request->data["User"]["new_password"]!="")
	{
	    if(Security::hash(Configure::read('Security.salt').$this->request->data['User']['old_password'])==$this->User->field('password'))
	    {
		$this->request->data["User"]["password"]=$this->request->data["User"]["new_password"];
	     $this->request->data["User"]["confirm_password"]=$this->request->data["User"]["new_password"];
	    }
		else
		{
		$this->Session->setFlash("Old password is wrong");
		$this->redirect('/users/password/'.$id);
		}
	
	
	}
		
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been updated'));
				//$this->redirect(array('action' => 'password',$this->Session->read('Auth.User.id')));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				$validationErrors = $this->User->invalidFields();
				$value = key($validationErrors);
    			$this->Session->setFlash($validationErrors[$value][0]);
				$this->redirect(array('controller' => 'users', 'action' => 'password',$id));
			}
			
			
			
			
		} else {
		
			$this->request->data = $this->User->read(null, $id);
			$this->request->data["User"]["password"]="";
		}

		$user = $this->User->find('first', array('conditions' => array('User.id' => $userid)));
    	$userName = $user['User']['username'];
	    $this->set('user',$user);
		$this->set('userid', $userid);
        $this->set('username', $userName);
    	$subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
		$subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$this->set('subscribe', $subscribe);
		$this->set('subscribeto', $subscribeto);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'profile'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'profile'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
 public function affected($id,$value)
 {
 $this->User->Game->updateAll(array('active'=>$value),array('user_id'=>$id));
 $this->Session->setFlash(__('The user has been updated all games of this user has been affected'));
 }
 
 
	public function useredit() {
	$this->layout='adminTry';
	if($this->request->isPost())
	{	
	//i�

	$this->User->id =$this->request->data["User"]["id"];
	$id=$this->request->data["User"]["id"];
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
			   
			    if($this->request->data["User"]["affect"]==1)
			    {
				$value=$this->request->data["User"]["active"];
				$this->affected($id,$value);
				
			    }
				else
				{
				$this->Session->setFlash(__('The user has been updated'));
				}
			   
				
				$this->redirect(array('action' => 'useredit'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}

	//dis
	}
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function checkUser(){
		 $this->loadModel('Userstat');
		 Configure::write ( 'debug', 0 );
		 
		 $dt=$this->request->data['dt'];
		 $attr=$this->request->data['attr'];
		 
		 if($attr == "txt_signusername"){
			if($this->User->find('first', array('conditions'=> array('User.username'=>$dt))))
			{
				$this->set('rtdata', 'This Username is alredy been taken. Please try another one.');
			}
		 }
		 else if($attr == "txt_signemail") {
		 	if($this->User->find('first', array('conditions'=> array('User.email'=>$dt))))
			{
				$this->set('rtdata', 'This email is already registered. Please try another one.');
			}
		 }
		 else if($attr == "recaptcha_response_field"){
			$privatekey = "6LebitISAAAAAEY3ntRWxcpvMtPyNxRkvpFrRO8h";
			$userip= $_SERVER["REMOTE_ADDR"];
			$challenge=$this->request->data['c'];

			$ch = curl_init("http://www.google.com/recaptcha/api/verify");

			curl_setopt ($ch, CURLOPT_POST, 1);
			curl_setopt ($ch, CURLOPT_POSTFIELDS, "privatekey=$privatekey&remoteip=$userip&challenge=$challenge&response=$dt");
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1) ;
			
			$output = curl_exec($ch);
			curl_close($ch);
			
			$resp = explode("\n", $output);
			$this->set('rtdata', $resp[0]);
			if($resp[0] == "true"){			
				$this->User->create();
				$this->request->data['User']['username'] = $this->secureSuperGlobalPOST(str_replace(' ','',$this->request->data['un']));
				$this->request->data['User']['email'] = $this->request->data['um'];
				$this->request->data['User']['password'] = $this->request->data['up'];
				$this->request->data['User']['seo_username'] = strtolower($this->request->data['un']);
				$this->request->data['User']['confirm_password'] = $this->request->data['up'];
				$this->request->data['User']['active'] = 1;
				if ($this->User->save($this->request->data)) {
					$this->__sendActivationEmail($this->User->getLastInsertID());
					
				} else {
					$this->set('rtdata', 'Can not register. Please try again.');
				}
			}
		 }
		 else if($attr == "txt_logusername"){
			$this->request->data['User']['username'] = $this->request->data['un'];
			$this->request->data['User']['password'] = $this->request->data['ps'];
			if ($this->Auth->login() == true) {
				$results = $this->User->find('first',array('conditions'=>array('OR'=>array('User.email'=>$this->request->data['User']['username'],'User.username'=>$this->request->data['User']['username'])),array('fields'=>array('User.active'))));
	  	        if ($results['User']['active'] == 0) {
					$this->Auth->logout();
					$msg = array("msgid" => '0', "msg" => 'Your account has not been activated yet! Please check your email to activate your account');
					$this->set('rtdata', $msg);
				}
				
				else
				{
					$msg = array("msgid" => '1', "msg" => $this->webroot.$this->Auth->loginRedirect['controller'].'/'.$this->Auth->loginRedirect['action']);
					$this->set('rtdata', $msg);
				}
			}
			else
			{
				$msg = array("msgid" => '2', "msg" => 'Wrong Username or Password. Please enter a valid username and password');
				$this->set('rtdata', $msg);
			}
		 }
		 else if($attr == "t_regbox_logemail"){	 
			if(isset($dt) && $dt!= ''){
				$user = $this->User->find('first',array('conditions' => array('User.email'=>$dt)));
				if($user === false){
					$this->set('rtdata', 'This email is not registered to toork yet.');
				}
				else{
					$this->__sendResetEmail($user["User"]["id"]);
				}
			}
			else{
				$this->set('rtdata', 'Please Enter A Valid Email!');
			}
		 }
		 else{}
		 
		 $this->set('_serialize', array('rtdata'));
		 
	}	
}
