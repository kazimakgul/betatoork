<?php
App::uses('AppController', 'Controller');
/**
 * Wallentries Controller
 *
 * @property Wallentry $Wallentry
 */
class ApisController extends AppController {
    
	public $name = 'Apis';
    var $uses = array('Game','User','Favorite','Subscription','Playcount','Rate','Userstat','Category');
    public $helpers = array('Html', 'Form','Upload','Recaptcha.Recaptcha','Facebook.Facebook');
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
		echo 'this is toork api V 1.0';
	}
	
	public function add_virtual_game()
   {
   $this->layout='ajax';
   Configure::write('debug', 0);
   $fileName=rand(100,100000);
    $this->request->data['Game']['name']="SOntihOnHouse".$fileName;
	  $this->request->data['Game']['description']="this is a description";
      $this->request->data['Game']['user_id'] = $this->Auth->user('id');
	  $this->request->data['Game']['link'] = "http://www.mil".$fileName."liyet.com";	
	  $this->request->data['Game']['picture'] ="nbrrr.png";	
	  print_r($this->Game->data['picture']);	
		//seourl begins
		$this->request->data['Game']['seo_url']=strtolower(str_replace(' ','-',$this->request->data['Game']['name']));
		//seourl ends
			$this->Game->create();
			$this->Game->validate = array();
			
			if ($this->Game->save($this->request->data)) {
				$this->Session->setFlash(__('You have successfully added a game to your channel.'));
			
			}
   
   
   }
	
	function secureSuperGlobalPOST($value)
    {
	    //$string = preg_replace('/[^\w\d_ -]/si', '', $value);<br />
        //Nokta ve virgülü de engelleyen kod iptal edildi.
        $string = htmlspecialchars(stripslashes($value));
        $string = str_ireplace("script", "blocked", $string);
        $string = mysql_escape_string($string);
		$string = htmlentities($string);
        return $string;
    }
	
	
	public function get_meta($url=NULL)
   {
   //Get Meta tags
   $tags = get_meta_tags($url);
   //print_r($tags);
   
   //Get title
   preg_match("/<title>(.+)<\/title>/siU", file_get_contents($url), $matches);
   $title = $matches[1];
   $basic_info=array('title'=>$title,'description'=>$tags['description']);
   return $basic_info;
   
   }
	
	public function addgame_ajax($url='http://www.toork.com')
   {
   $this->layout='ajax';
   App::uses('Folder', 'Utility');
   App::uses('File', 'Utility');
   Configure::write('debug', 0);
	  
	  $graburl=$this->request->data['graburl'];
	  if($graburl!=NULL)
	  $url=$graburl;
	  
	  if($userid = $this->Session->read('Auth.User.id'))
      {
	 $basic_info=$this->get_meta($url);
	 //echo $basic_info['title'].'<br>';
	 //echo $basic_info['description'];
	 
	 if(empty($basic_info['title']))
	 $basic_info['title']='Write A Title';
	 if(empty($basic_info['description']))
	 $basic_info['description']='Write A Desc';
	  //----------------------------
	  
	  //=============Get ScreenShot==================		
	  $fileName=rand(100,100000);	
     
      $command = "xvfb-run --server-args='-screen 0, 1024x768x24' /usr/bin/wkhtmltopdf ".$url." /home/ubuntu/test/".$fileName.".pdf";
      exec($command, $output, $ret);
	  //print_r($output);print_r($ret);
	  $command2 = "convert /home/ubuntu/test/".$fileName.".pdf -append /home/ubuntu/test/".$fileName."_toorksize.png";
      exec($command2, $output2, $ret2);
	  $command3 = "convert /home/ubuntu/test/".$fileName."_toorksize.png -quiet  -crop 200x110+30+30  +repage  /home/ubuntu/test/".$fileName."_toorksize.png";
      exec($command3, $output3, $ret3);
	
			
			//=============/Get ScreenShot=================		
			
	  
	  $this->request->data['Game']['name']=$this->secureSuperGlobalPOST($basic_info['title']);
	  $this->request->data['Game']['description']=$this->secureSuperGlobalPOST($basic_info['description']);
      $this->request->data['Game']['user_id'] = $this->Auth->user('id');
	  $this->request->data['Game']['link'] = $url;	
	  $this->request->data['Game']['picture'] = $fileName.".png";		
		//seourl begins
		$this->request->data['Game']['seo_url']=strtolower(str_replace(' ','-',$basic_info['title']));
		//seourl ends
			
			$this->Game->create();
			$this->Game->validate = array();
			
			if ($this->Game->save($this->request->data)) {
			    $this->requestAction( array('controller' => 'userstats', 'action' => 'getgamecount',$userid));
				$this->Session->setFlash(__('You have successfully added a game to your channel.'));
			
			$id=$this->Game->getLastInsertId();
			$this->requestAction( array('controller' => 'wallentries', 'action' => 'action_ajax',$id,$userid));
			
			//================Throw to S3==================
			 $this->Amazon->S3->create_object(
            Configure::read('S3.name'),
            'upload/games/'.$id.'/'.$fileName.'_toorksize.png',
             array(
			'fileUpload' => "/home/ubuntu/test/".$fileName."_toorksize.png",
            'acl' => AmazonS3::ACL_PUBLIC
            )
            );
			//============/Throw to S3==========================
			
			//============Folder Formatting begins============
			$dir = new Folder("/home/ubuntu/test");
		    $files = $dir->find('.*');
		    foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
            $file->delete();
            $file->close(); 
            }
			//============/Folder Formatting ends============	
				

				//$this->redirect(array('action' => 'mygames'));
				$editurl=Router::url(array('controller'=>'games', 'action'=>'edit',$id));
				echo $editurl;
			} else {
				$validationErrors = $this->Game->invalidFields();
				$value = key($validationErrors);
    			$this->Session->setFlash($validationErrors[$value][0]);echo $validationErrors[$value][0];
			}
	  
	  //----------------------------
	  
      }
   /*
   if ($ret) {
      die;
             }
   */
   
   }
	

}