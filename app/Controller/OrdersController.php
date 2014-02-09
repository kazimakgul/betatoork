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
	$this->Add_Activity();
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

	return($free_bot);
	
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
	
	
	//>>>>>>>>>Add_Activity function begins<<<<<<<
	//Description:this function will be started for each activity.Will check the total credit of user.If it is available to get new bot order.We will add an order for that user.
	//This function will contain possiblity ratios of each activity.
	public function Add_Activity($user_id=1,$bot_id=12) {
	
	     //Check total credit of user.
	     $totalcredit=$this->Order->query('SELECT credit FROM botcredits WHERE user_id='.$user_id.'');
		 if($totalcredit==NULL || $totalcredit[0]['botcredits']['credit']<30)
		 {
		 //If user below credit limit,break it.
		 break;
		 }
	
	
	     //Hangi activity tipi seçilecek?
		 $activity_perc=rand(0,100);
	     switch ($activity_perc) {
              case $activity_perc >= 0 && $activity_perc <= 30 :
                  // Follow Activity
			      $credit=3;
				  $activity_id=2;
                  break ;
              case $activity_perc >= 30 && $activity_perc <= 50 :
                  // Clone Activity
			      $credit=5;
				  $activity_id=3;
                  break ;
              case $activity_perc >= 50 && $activity_perc <= 60 :
                  // Rate Activity
			      $credit=1;
				  $activity_id=4;
                  break ;
			  default:
			  // Rate Activity
			  $credit=1;
			  $activity_id=4;
         }
	
	//echo 'random activity seçici:<br>';
	//echo 'seçilen activity id:'. $activity_id.'<br>';
	//echo 'seçilen activitynin credisi:'. $credit.'<br>';
	//echo 'Yüzde:'. $activity_perc.'<br>';
	
	
	  
	  
	 if($totalcredit!=NULL && $totalcredit>=$credit)
	 { 
	     //Submit the datas into Orders table
         $this->request->data['Order']['user_id'] = $user_id;	
	        $this->request->data['Order']['action_id'] =$activity_id;	
	     $this->request->data['Order']['date'] =date('Y-m-d');	
	     $this->Order->create();	
	     if ($this->Order->save($this->request->data)) {
	     //We will decrease credit here from total credit of user.
		 $this->Order->query('UPDATE botcredits SET credit=credit-'.$credit.' WHERE user_id='.$user_id.'');
	     } 
	  }
	
}
	//>>>>>>>>>Add_Activity function finished<<<<<<<
	
	
	

}