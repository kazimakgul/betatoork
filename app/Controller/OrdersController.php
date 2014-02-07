<?php
App::uses('AppController', 'Controller');
/**
 * Wallentries Controller
 *
 * @property Wallentry $Wallentry
 */
class OrdersController extends AppController {
    
	public $name = 'Orders';
    var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Category','Order');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha');
    public $components = array('Amazonsdk.Amazon','Recaptcha.Recaptcha');
/**
 * index method
 *
 * @return void
 */


	public function isAuthorized() {
	 if($this->action=='addgame_ajax') {
	 	return true;
	 }
	 //Redirect to error notification page
	 $this->Session->setFlash('Sorry, you don\'t have permission to access that page.');
	 $this->redirect('/');
	 return false;
}




	public function index() {
	$this->layout='ajax';
	
	$orderdata=$this->Order->find('all');
	//print_r($orderdata);
	$this->Add_Credit(3,1);
	}
	
	//>>>>>>>>>callBot function started<<<<<<<<<<
	//This function find the most appropriate bot for this job.
	public function callBot($target_user=NULL) {
	
	do{
	$randomnum=rand(1,100);
	$clonebot_data=$this->Order->query('SELECT * FROM clonebots ORDER BY RAND() LIMIT '.$randomnum.'');
	
	
	
	//Gets Datas Added In Last 7 days
	$conditions =  array( 'Order.clonebot_id'=>$clonebot_data[0]['clonebots']['user_id'],'Order.user_id'=>$target_user,"Order.date >" => date('Y-m-d',strtotime("-3 days"))); 
	$fields =  array('Order.clonebot_id'); 
	$order_date_data=$this->Order->find('all',array('conditions'=>$conditions,'fields'=>$fields));
	  if($order_date_data==NULL)
	  {
	  $free=1;
	  $free_bot=$clonebot_data[0]['clonebots']['user_id'];
	  }
	  else
	  {
	  $free=0;
	  }
	}while($free!=1);

	echo $free_bot;
	
	}
	//>>>>>>>>>callBot function finished<<<<<<<<<<
	
	//>>>>>>>>>Add_Credit function started<<<<<<<
	//Kullaniciya her activitysi için kredi vericez.Her kredi verme isleminde eger bakiyesi yeterli ise bir görev siparisi eklicez.Ve krediyi total bakiyeden düsücez.
	public function Add_Credit($activity_id=NULL,$user_id=NULL) {
	
	     switch ($activity_id) {
            case 2 :
                // Follow Activity
			    $credit=3;
                break ;
            case 3 :
                // Clone Activity
			    $credit=5;
                break ;
            case 4 :
                // Rate Activity
			    $credit=1;
                break ;
         }
		
		 //Is there any data on credit table before
		 $creditbefore=$this->Order->query('SELECT * FROM botcredits WHERE user_id='.$user_id.'');
		 if($creditbefore!=NULL)
         {
		 //If user already has credit data before.
		 $this->Order->query('UPDATE botcredits SET credit=credit+'.$credit.' WHERE user_id='.$user_id.'');
		 }else{
		  //If user has no credit data before.
		 $this->Order->Query('INSERT INTO botcredits (user_id,credit) VALUES ('.$user_id.','.$credit.')');
		 }
		 
		 
	
	}
	//>>>>>>>>>Add_Credit function finished<<<<<<<
	
	
	

}