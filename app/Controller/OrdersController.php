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
	
	//$orderdata=$this->Order->find('all');
	//print_r($orderdata);
	   if($_GET['task']=='wakeup')
       {
	   $this->wakeup_project();
	   }
	   /*
	   $date1=new DateTime(date('Y-m-d H:i:s'));//birinci büyük olmali!
	   $date2=new DateTime("2014-03-01 18:09:21");
	   $interval = $date1->diff($date2);
echo "difference " . $interval->i . " minutes, "; 
print_r($interval);
echo date('Y-m-d H:i:s').'<br>';
$randommin=rand(1,10);
echo date('Y-m-d H:i:s', strtotime('+'.$randommin.' minutes'));
$getme=date('Y-m-d H:i:s');
*/
$order_in_order=$this->Order->find('first',array('contain'=>false,'fields'=>array('Order.id','Order.user_id','Order.clonebot_id','Order.action_id'),'conditions'=>array('Order.done'=>0,'Order.date <'=>date('Y-m-d H:i:s', strtotime('+5 minutes'))),'order' => array('Order.date ASC')));

//print_r($order_in_order);
//echo '<br>now:'.date('Y-m-d H:i:s');
//$nowdate=$this->time_control("2014-03-02 15:41:20");
//echo '<br>fuuu:'.$nowdate->format('Y-m-d H:i:s');

$this->Add_Activity();


//$this->Order->query('UPDATE botcredits SET last_order="'.$nowdate->format('Y-m-d H:i:s').'" WHERE user_id=1601');

	}
	
	public function callActBot($target_user=NULL,$action_id=NULL) {
	
	   if($action_id==2)
	   {
	   $freebot=$this->Order->query('select * from clonebots where user_id NOT IN (select clonebot_id from orders where user_id='.$target_user.' AND action_id='.$action_id.' AND done=1) ORDER BY RAND() LIMIT 1');
	     if($freebot!=NULL)
	     {
		 echo $freebot[0]['clonebots']['user_id'];
	     return $freebot[0]['clonebots']['user_id'];
	     }
	   }
	
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
	public function Add_Credit($activity_id=NULL) {
	
	     if($this->Auth->user('id'))
	     {//openning of auth_id control
	     $user_id=$this->Session->read('Auth.User.id');
	     }else{
		 //if user is not logged in
		 break;
		 }
	
/* Activity Type_id codes
GameAdd1 Follow2 Clone3 Rate4 Mention5 PostComment6 Favorite7 GameHashtag8 GameAdd9 SharePost10 PlayGame11
*/

	     switch ($activity_id) {
			case 1 :
                // GameAdd Activity
			    $credit=16;
                break ;
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
			    $credit=3;
                break ;
            case 5 :
                // Mention Activity
			    $credit=11;
                break ;
            case 6 :
                // PostComment Activity
			    $credit=3;
                break ;
            case 7 :
                // Favorite Activity
			    $credit=5;
                break ;
            case 8 :
                // GameHashtag Activity
			    $credit=11;
                break ;
            case 10 :
                // SendPost Activity
			    $credit=15;
                break ;
            case 12 :
                // CommentGame Activity
			    $credit=3;
                break ;
            case 15 :
                // SharePost Activity
			    $credit=11;
                break ;
			default:
			    // All Other Activities
                $credit=2;	
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
	
	public function time_control($last_order=NULL)
	{
	 //Zaman araligi kontrolü begins
	  $nowdate=new DateTime(date('Y-m-d H:i:s'));
	  
	  if($last_order!=NULL)
	  {  $nowdate=new DateTime(date('Y-m-d H:i:s'));
	     $last_order_date=new DateTime($last_order);//Adamin son aktivity alma saati.
	     $interval = $nowdate->diff($last_order_date);
	     if($interval->y!=0 || $interval->m!=0 || $interval->d!=0 || $interval->h!=0)
		 {
	     $goahaed=1;
	     }
		 else
		 {
	     $goahaed=0;
		 }
	     if($goahaed==0 && $interval->h>=5)
	     {
	     $goahaed=1;
	     }else if($goahaed==0 && $interval->h<5){
	     //There is no minimum 5min difference between last order time.So we need to forward next order time.
	     $goahaed=0;
	     $randommin=rand(1,10);
	     $nowdate=new DateTime(date('Y-m-d H:i:s', strtotime('+'.$randommin.' minutes')));
	     }
	  }//Null Control Ends
	  //Zaman araligi kontrolü ends.
	  //echo 'go:'.$goahaed;
	  return $nowdate;
	}
	
	
	//>>>>>>>>>Add_debt_Activity function begins<<<<<<<
	//Description:If there are users have more than 10 credit in system,this function will give order or this users.
    public function Add_Debt_Activity()
    {
	$this->layout='ajax';
	echo 'Add_Debt_Activity2';
	  $users=$this->Order->query('SELECT user_id,last_order FROM botcredits WHERE credit>10 LIMIT 2');
      if($users!=NULL)
	  {//Users isnot null
	      foreach($users as $user)
	      {
		  
	         $nowdate=$this->time_control($user['botcredits']['last_order']);
		  
	         //Add order for all users.
	         //Submit the datas into Orders table
             $this->request->data['Order']['user_id'] = $user['botcredits']['user_id'];	
		     $this->request->data['Order']['clonebot_id'] = 0;	
	         $this->request->data['Order']['action_id'] =2;	
	         $this->request->data['Order']['date'] =$nowdate->format('Y-m-d H:i:s');	
	         $this->Order->create();	
	         if ($this->Order->save($this->request->data)) {
	         //We will decrease credit here from total credit of user.
			 $credit=5;
			 $this->Order->query('UPDATE botcredits SET credit=credit-'.$credit.' WHERE user_id='.$user['botcredits']['user_id'].'');
			 $this->Order->query('UPDATE botcredits SET last_order="'.$nowdate->format('Y-m-d H:i:s').'" WHERE user_id='.$user['botcredits']['user_id'].'');
			 echo 'done adding order';
	         }
	       }
		}//Users isnot null   
	
	}
	
	
	//>>>>>>>>>Add_debt_Activity function ends<<<<<<<
	
	
	
	//>>>>>>>>>Add_Activity function begins<<<<<<<
	//Description:this function will be started for each activity.Will check the total credit of user.If it is available to get new bot order.We will add an order for that user.
	//This function will contain possiblity ratios of each activity.
	public function Add_Activity() {
	
	  if($this->Auth->user('id'))
	  {//openning of auth_id control
	  $user_id=$this->Session->read('Auth.User.id');
	     
		 
		 //$bot_id=$this->callBot($user_id);
		 $bot_id=0;
	
	       //Check total credit of user.
	       $totalcredit=$this->Order->query('SELECT credit,last_order FROM botcredits WHERE user_id='.$user_id.'');
		   if($totalcredit!=NULL && $totalcredit[0]['botcredits']['credit']>10)
		   {//If user have more than 10 credit
	
	     //Hangi activity tipi seçilecek?
		 $activity_perc=rand(0,100);
	     switch ($activity_perc) {
              case $activity_perc >= 0 && $activity_perc <= 100 :
                  // Follow Activity
			      $credit=5;
				  $activity_id=2;
                  break ;
              case $activity_perc >= 101 && $activity_perc <= 500 :
                  // Clone Activity
			      $credit=5;
				  $activity_id=3;
                  break ;
              case $activity_perc >= 5000 && $activity_perc <= 6000 :
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
	
	 $nowdate=$this->time_control($totalcredit[0]['botcredits']['last_order']);
	  
	 if($totalcredit!=NULL && $totalcredit>=$credit)
	 { 
	     //Submit the datas into Orders table
         $this->request->data['Order']['user_id'] = $user_id;	
		 $this->request->data['Order']['clonebot_id'] = $bot_id;	
	        $this->request->data['Order']['action_id'] =$activity_id;	
	     $this->request->data['Order']['date'] =$nowdate->format('Y-m-d H:i:s');	
	     $this->Order->create();	
	     if ($this->Order->save($this->request->data)) {
	     //We will decrease credit here from total credit of user.
		 $this->Order->query('UPDATE botcredits SET credit=credit-'.$credit.' WHERE user_id='.$user_id.'');
		 $this->Order->query('UPDATE botcredits SET last_order="'.$nowdate->format('Y-m-d H:i:s').'" WHERE user_id='.$user_id.'');
	     } 
	  }
  
             }//Close of credit limit control
				 
  }//close of auth_id control
	
}
	//>>>>>>>>>Add_Activity function finished<<<<<<<
	
	//>>>>>>>>>ExecuteActivity function begins<<<<<<<
	public function Execute_Activity() {
	$this->layout='ajax';
	echo 'ready';
	
	$order_in_order=$this->Order->find('first',array('contain'=>false,'fields'=>array('Order.id','Order.user_id','Order.clonebot_id','Order.action_id'),'conditions'=>array('Order.done'=>0,'Order.date <'=>date('Y-m-d H:i:s', strtotime('+5 minutes'))),'order' => array('Order.date ASC')));
	
	
	$user_id=$order_in_order['Order']['user_id'];
	$action_id=$order_in_order['Order']['action_id'];
	$clonebot_id=$order_in_order['Order']['clonebot_id'];
	
  if($order_in_order!=NULL)
  {//If there is an activity in order.	
	
	    if($action_id==2)
        {//Follow activity starts
		     $clonebot_id=$this->callActBot($user_id,$action_id);
		     $subscriber_id=$clonebot_id;
		     $subscriber_to_id=$user_id;
		     $subscribebefore=$this->Subscription->find("first",array("conditions"=>array("Subscription.subscriber_id"=>$subscriber_id,"Subscription.subscriber_to_id"=>$subscriber_to_id)));
		     //if bot didn't subscribe this user before,it is free.
		     if($clonebot_id!=NULL && empty($subscribebefore))
		     {
		     //Subscription Process starts
		      $this->Subscription->create();
			  $this->request->data["Subscription"]["subscriber_id"]=$subscriber_id;
			  $this->request->data["Subscription"]["subscriber_to_id"]=$subscriber_to_id;
			  if ($this->Subscription->save($this->request->data)) {
			      $this->Order->query('UPDATE orders SET done=1,clonebot_id='.$clonebot_id.' WHERE id='.$order_in_order['Order']['id']);
		 		  $this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax_bot',$clonebot_id,$subscriber_to_id,$subscriber_id,5,1));	echo 'done';
			    }
		     //Subscription Process ends
		   
		     }else{
		     //bot subscribe this user before,change the bot!!!
		     //DO SOMETHING
		     }
			 $this->Order->query('UPDATE orders SET done=1 WHERE id='.$order_in_order['Order']['id']);
			 $this->requestAction( array('controller' => 'userstats', 'action' => 'incscribe',$subscriber_to_id));
	    }else if($action_id==3){//Follow activity ends.
		     //Clone activity starts
		
		
		
		     //Clone activity ends
		}
	
	}else{
	//There is no any activity in order
	echo 'no activity';
	}
    $this->Add_Debt_Activity();	
}
	//>>>>>>>>>ExecuteActivity function ends<<<<<<<
	
	function wakeup_project()
	{
	//Kulllanici banner eklemis mi?
	
	$users=$this->User->find('all',array('conditions'=>array('User.banner !='=>NULL),'fields'=>array('User.id')));
	foreach($users as $user)
	{
	     //Add order for all users.
	     //Submit the datas into Orders table
         $this->request->data['Order']['user_id'] = $user['User']['id'];	
		 $this->request->data['Order']['clonebot_id'] = 0;	
	     $this->request->data['Order']['action_id'] =2;	
	     $this->request->data['Order']['date'] =date('Y-m-d');	
	     $this->Order->create();	
	     if ($this->Order->save($this->request->data)) {
	     //We will decrease credit here from total credit of user.
		 echo 'wake up process done'.'<br>';
	     }
	}
	
	
	
	}
	
	

}