<?php
App::uses('AppController', 'Controller');
/**
 * Wallentries Controller
 *
 * @property Wallentry $Wallentry
 */
class AdminsController extends AppController {
    
	public $name = 'Admins';
    var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Category','Clonebot','Order');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha');
    public $components = array('Amazonsdk.Amazon','Recaptcha.Recaptcha');



	public function index() {
	$this->layout='ajax';
		echo 'ready';
		if($_GET['task']=='deleteorders')
        {
		$this->deleteallorders();
		}
	}
	
public function bots() {
	$this->layout='adminDashboard';
	
	$this->set('users', $this->paginate('Clonebot'));
	$authid = $this->Session->read('Auth.User.id');
	$user = $this->User->find('first', array('conditions' => array('User.id' => $authid)));
    $userName = $user['User']['username'];
	$this->set('user',$user);
	$this->set('username',$userName);
	
	}	
	
	public function deleteallorders()
	{
	$this->Order->query('DELETE FROM `orders` WHERE 1');
	echo 'deleted orders';
	}
	
	
	public function users($role=NULL) {
	$this->layout='adminDashboard';


        if($role!=NULL)
        $this->paginate = array('conditions'=>array('User.role'=>$role));

		$this->User->recursive = 0;
		$this->set('users', $this->paginate('User'));
		$authid = $this->Session->read('Auth.User.id');
		$user = $this->User->find('first', array('conditions' => array('User.id' => $authid)));
    	$userName = $user['User']['username'];
	    $this->set('user',$user);
		$this->set('username',$userName);

	
		
	}
	
	public function affected($id,$value)
    {
    $this->User->Game->updateAll(array('active'=>$value),array('user_id'=>$id));
    $this->Session->setFlash(__('The user has been updated all games of this user has been affected'));
    }
	
	//<<<<<<<<<<Orders function begins>>>>>>>>>
	public function orders() {
	$this->layout='adminDashboard';
	$orderdata=$this->Order->find('all');
	$this->set('orders',$orderdata);
	}
	
	//<<<<<<<<<<Orders function ends>>>>>>>>>
	
	
	//<<<<<<<<<<useredit function begins>>>>>>>>>
	public function useredit() {
	$this->layout='adminDashboard';
	if($this->request->isPost())
	{	
	//iç

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
		$this->set('users', $this->paginate('User'));
		$authid = $this->Session->read('Auth.User.id');
		$user = $this->User->find('first', array('conditions' => array('User.id' => $authid)));
    	$userName = $user['User']['username'];
	    $this->set('user',$user);
		$this->set('username',$userName);
	}
	//<<<<<<<<<<useredit function ends>>>>>>>>>
	
	//<<<<<<<<<<adminedit function begins>>>>>>>>>>>>
	public function adminedit($id = null) {
	
	App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
	
		$this->layout = 'adminDashboard';
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
	    $this->set('users', $this->paginate());
		$this->set('userid', $userid);
        $this->set('username', $userName);
    	$subscribe = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_id' => $userid)));
		$subscribeto = $this->Subscription->find('count', array('conditions' => array('Subscription.subscriber_to_id' => $userid)));
		$this->set('subscribe', $subscribe);
		$this->set('subscribeto', $subscribeto);
	}
	//<<<<<<<<<<adminedit function ends>>>>>>>>>>>>
	
	//<<<<<<<<<<adminview function ends>>>>>>>>>>>>
	public function view($id = null) {
	    $this->layout = 'adminDashboard';
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
    //<<<<<<<<<<adminview function ends>>>>>>>>>>>>
	
	
	
	//<<<<<<<<<<Remote functions starts>>>>>>>>>>>>
	//<<<<<<<<<<edit user form function starts>>>>>>>>>>>>
	public function edit_user_form($id = null) {
	$this->layout = 'ajax';
	
	$user=$this->User->find('all', array(
    'joins' => array(
        array(
            'table' => 'botcredits',
            'alias' => 'Botcred',
            'type' => 'LEFT',
            'conditions' => array(
                'Botcred.user_id = User.id'
            )
        )
    ),
    'conditions' => array(
        'User.id' => $id
    ),
    'fields' => array('Botcred.credit', 'User.id', 'User.screenname', 'User.username', 'User.email', 'User.role')
));
	
	//Is this user bot?
	$bot_info=$this->User->query('SELECT user_id from clonebots WHERE user_id='.$id.'');
	if($bot_info!=NULL)
	$bot=1;
	else
	$bot=0;
	
	
	if($bot==1)
	$this->set('bot',1);
	else
	$this->set('bot',0);
	
	$this->set('user',$user);
	
	
	}
	//<<<<<<<<<<edit user form function ends>>>>>>>>>>>>
	
	//<<<<<<<<<<edit user submit function starts>>>>>>>>>>>>
	public function edit_user_submit() {
	$this->layout = 'ajax';
	echo 'submit ready';
	
	$id=$_POST['id'];
	$screenname=$_POST['screenname'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$role=$_POST['role'];
	$credit=$_POST['credit'];
	$bot=$_POST['bot'];
	
	$this->User->id = $id;
	
	echo 'id:'.$id.'<br>';
	echo 'screenname:'.$screenname.'<br>';
	echo 'username:'.$username.'<br>';
	echo 'email:'.$email.'<br>';
	echo 'role:'.$role.'<br>';
	echo 'credit:'.$credit.'<br>';
	echo 'bot:'.$bot.'<br>';
	
	//Screenname cannot be null
	if($screenname==NULL)
	$screenname=$username;
	
	      $filtered_data=
		  array('User' =>array(
		  'screenname' => $screenname,
		  'username' => $username,
		  'email' => $email,
		  'role' => $role));
		  if ($this->User->save($filtered_data)) {echo 'saved userdata';}
		  
		  //Is there any data on credit table before
		 $creditbefore=$this->User->query('SELECT * FROM botcredits WHERE user_id='.$id.'');
		 if($creditbefore!=NULL)
         {
		 //If user already has credit data before.
		 $this->User->query('UPDATE botcredits SET credit='.$credit.' WHERE user_id='.$id.'');
		 }else{
		  //If user has no credit data before.
		 $this->User->Query('INSERT INTO botcredits (user_id,credit) VALUES ('.$id.','.$credit.')');
		 }
		  
		//Check bot status from clonebots table
		$clonebot_data=$this->User->query('SELECT * FROM clonebots WHERE user_id='.$id.'');
		if($bot==1)
		{    
		    if($clonebot_data!=NULL)
			{
			//is already bot,we are okey,go ahaed!
			}else{
			//Add this user as bot!
			$this->User->Query('INSERT INTO clonebots (user_id) VALUES ('.$id.')');
			}
		     
		}else{
		     
			 if($clonebot_data!=NULL)
			{
			//we have to remove it here!
			$this->User->Query('DELETE FROM clonebots WHERE user_id='.$id.'');
			}else{
			//We'r okey here,go ahaed!
			}
			 
		}//bot variable control ends here.	
			
	
	
	}
	//<<<<<<<<<<edit user submit function ends>>>>>>>>>>>>
	
	//<<<<<<<<<<get search users function begins>>>>>>>>>>>>
	public function get_search_users($keywords=NULL) {
	$this->layout = 'ajax';
	
	$users=$this->User->find('all',array('contain'=>false,'conditions'=>array('User.username LIKE'=>'%'.$keywords.'%'),'fields'=>array('User.username','User.id','User.screenname','User.created','User.picture','User.seo_username','User.role')));
	$this->set('users',$users);
	
	
	}
	//<<<<<<<<<<get search users function ends>>>>>>>>>>>>
	
	//<<<<<<<<<<Remote functions ends>>>>>>>>>>>>
}