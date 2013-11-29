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
		echo 'this is Clone api V 1.0';
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
	
	function checkDuplicateSeoUrl($seo_url='toork')
{
  $authid = $this->Session->read('Auth.User.id');
  do {
  
     $data=$this->Game->find('first',array('contain'=>false,'conditions'=>array('Game.seo_url'=>$seo_url,'Game.user_id'=>$authid),'fields'=>array('seo_url')));
     if($data==NULL)
	 {
	 return $seo_url;
	 }else{
	 $seo_url=$this->seoUrlFormer($seo_url);
	 }
    
  } while(1==1);

}

function seoUrlFormer($material='toork')
{
//Add incremental number at the end of the seo_url
preg_match('/^([^\d]+)([\d]*?)$/', $material, $match);
$material = $match[1];
$number = $match[2] + 1;
return $material.$number;
}

	
	public function activityMessage()
   {
   $lastactivity=$this->params['pass'];
   
   //Activity Content Generation Function
   //Generate Play Url
   /*
             if($lastactivity['Game']['seo_url']!=NULL)
             {
             if($lastactivity['Game']['embed']!=NULL)
             $playurl=$this->Html->url(array( "controller" => h($lastactivity['ChannelUser']['seo_username']),"action" =>h($lastactivity['Game']['seo_url']),'playgame'));
	         else
	         $playurl=$this->Html->url(array( "controller" => h($lastactivity['ChannelUser']['seo_username']),"action" =>h($lastactivity['Game']['seo_url']),'playframe'));
             }
             else{
             $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($lastactivity['Game']['id'])));
             }
*/
                $playurl="empty";
				$game_name=$lastactivity['Game']['name'];
				$channel_name=$lastactivity['ChannelUser']['username'];
				$type=$lastactivity['Activity']['type'];
				$msg_id=$lastactivity['Activity']['msg_id'];
				$postPage= Router::url(array('controller'=>'wallentries', 'action'=>'posts', $msg_id), false);
				
				    if($type==1)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Comment on '.$game_name;
				    }
					if($type==2)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-blue elusive-group"></i></a> Following '.$channel_name.' now.';
				    }
					if($type==3)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-red elusive-tint"></i></a> Cloned '.$game_name;
				    }
					if($type==4)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-gold elusive-star"></i></a> Rate on '.$game_name.'';
				    }
					if($type==5)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-purple elusive-user"></i></a> Talking about '.$channel_name;
				    }
					if($type==6)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Comment on '.$channel_name.' post.';
				    }
					if($type==7)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-orange elusive-heart"></i></a> Favorited '.$game_name;
				    }
					if($type==8)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-purple bold">#</i></a> Talking about '.$game_name.'';
				    }
					if($type==9)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Comment on '.$game_name.'';
				    }
					if($type==10)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Comment on '.$game_name.'';
				    }
					if($type==11)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Comment on '.$game_name.'';
				    }
					if($type==12)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Commented on '.$game_name.'';
				    }
				  return $text;
   
   }
   
   
   public function notificationMessage()
   {
   $lastactivity=$this->params['pass'];
   
   //Activity Content Generation Function
   //Generate Play Url
   /*
             if($lastactivity['Game']['seo_url']!=NULL)
             {
             if($lastactivity['Game']['embed']!=NULL)
             $playurl=$this->Html->url(array( "controller" => h($lastactivity['ChannelUser']['seo_username']),"action" =>h($lastactivity['Game']['seo_url']),'playgame'));
	         else
	         $playurl=$this->Html->url(array( "controller" => h($lastactivity['ChannelUser']['seo_username']),"action" =>h($lastactivity['Game']['seo_url']),'playframe'));
             }
             else{
             $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($lastactivity['Game']['id'])));
             }
*/
                $playurl="empty";
				$game_name=$lastactivity['Game']['name'];
				$channel_name=$lastactivity['ChannelUser']['username'];
				$type=$lastactivity['Activity']['type'];
				$msg_id=$lastactivity['Activity']['msg_id'];
				$postPage= Router::url(array('controller'=>'wallentries', 'action'=>'posts', $msg_id), false);

				    if($type==1)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="muted elusive-comment"></i></a></a> Comment on '.$game_name.'';
				    }
					if($type==2)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-blue elusive-group"></i></a> Following you now.';
				    }
					if($type==3)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-red elusive-tint"></i></a> Cloned your game: '.$game_name;
				    }
					if($type==4)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-gold elusive-star"></i></a> Rate on your game: '.$game_name;
				    }
					if($type==5)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-purple elusive-user"></i></a> Talking about you';
				    }
					if($type==6)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Commented on your post.';
				    }
					if($type==7)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-orange elusive-heart"></i></a> Favorited your game: '.$game_name;
				    }
					if($type==8)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-purple bold">#</i></a> Talking about your game:'.$game_name.'';
				    }
					if($type==9)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Comment on '.$game_name.'';
				    }
					if($type==10)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Comment on '.$game_name.'';
				    }
					if($type==11)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Comment on '.$game_name.'';
				    }
					if($type==12)
				    {
					$text='<a class="btn-link" href="'.$postPage.'"> <i class="color-green elusive-comment"></i></a> Commented on your game:'.$game_name.'';
				    }
				  return $text;
   
   }
	
	
	public function metacrawler()
	{
		 Configure::write ( 'debug', 0 );
		 
		 $linknow=$this->request->data['crawlurl'];
	
		//echo 'ready...<br>';
//Document for dom element using http://stackoverflow.com/questions/3711357/get-title-and-meta-tags-of-external-site		
		$myURL = 'http://www.facebook.com';
if (preg_match('/<title>(.+)<\/title>/',file_get_contents($myURL),$matches) && isset($matches[1] ))
{
   $title = $matches[1];
   //echo $title; 
}
else
   $title = "Not Found";
   
   $dom = new DOMDocument;
//$dom->loadHTML("<html><head><title id='pageTitle'>Facebook</title></head><body>Test<br></body></html>");
/*** get the HTML ***/
$content=file_get_contents($linknow);
@$dom->loadHTML($content);
/*** remove silly white space ***/
$dom->preserveWhiteSpace = false;

//------------Echo titles-----------
$titles = $dom->getElementsByTagName('title');
foreach ($titles as $title) {
    $nrmtitle=$title->nodeValue;
}
//----------//Echo titles-----------
//$images = $dom->getElementsByTagName('img');

$metas = $dom->getElementsByTagName('meta');
$dom_flag=1;
for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
    if($meta->getAttribute('name') == 'description')
        $description = $meta->getAttribute('content');
    if($meta->getAttribute('name') == 'keywords')
        $keywords = $meta->getAttribute('content');
	if($meta->getAttribute('property') == 'og:title') 
        $meta_og_title = $meta->getAttribute('content');
	if($meta->getAttribute('property') == 'og:description') 
        $meta_og_description = $meta->getAttribute('content');		
	if($meta->getAttribute('property') == 'og:image' && $dom_flag==1) { 
        $meta_og_image = $meta->getAttribute('content');
		$dom_flag=0;//One image is enough...
    }
}

$links = $dom->getElementsByTagName('link');
for ($i = 0; $i < $links->length; $i++)
{
    $link = $links->item($i);
    if($link->getAttribute('rel') == 'image_src')
        $image_src = $link->getAttribute('href');
    if($link->getAttribute('rel') == 'videothumbnail')
        $videothumbnail = $link->getAttribute('href');
}

$imagevalid=1;

//For Title
if(isset($meta_og_title))
$current_title=$meta_og_title;
else if(isset($nrmtitle))
$current_title=$nrmtitle;
else
$current_title="There is no any title data.Please write a title.";

//For Description
if(isset($meta_og_description))
$current_description=$meta_og_description;
else if(isset($description))
$current_description=$description;
else
$current_description="There is no any description data.Please write a description.";

//For Og:Image
if(isset($meta_og_image))
$current_image=$meta_og_image;
else if(isset($image_src))
$current_image=$image_src;
else if(isset($videothumbnail))
$current_image=$videothumbnail;
else
{
$current_image="https://s3.amazonaws.com/betatoorkpics/socials/clone-user-icon2.png";
$imagevalid=0;
}

//For Keyword
if(isset($keywords))
$current_keywords=$keywords;
else
$current_keywords="There is no any keyword data.Please write a keyword.";


//echo '<br>'.'Title:'.$current_title.'<br>';
//echo 'Description:'.$current_description.'<br>';
//echo 'Image:'.$current_image.'<br>';
//echo 'Keywords:'.$current_keywords.'<br>';

//if image valid equal 0,want users to upload an image.
$msg = array("title" => $current_title,'description' => $current_description, 'imagevalid' => $imagevalid,'image'=>$current_image);
$this->set('rtdata', $msg);
$this->set('_serialize', array('rtdata'));


//foreach($dom->getElementsByTagName('meta') as $meta) {
  //  if($meta->getAttribute('property') == 'og:image') { 
        //Assign the value from content attribute to $meta_og_image
    //    $meta_og_image = $meta->getAttribute('content');
        //stop all iterations in this loop
      //  break;
    //}
//}
//if(!isset($meta_og_image))
//{
//$meta_og_image="yok";
//}


		
	
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
	  
	  //Check the http before url
	  $url=$this->http_check($url);
	  
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
			
	  
	  $this->request->data['Game']['name']=substr($this->secureSuperGlobalPOST($basic_info['title']),0,25);
	  $this->request->data['Game']['description']=$this->secureSuperGlobalPOST($basic_info['description']);
      $this->request->data['Game']['user_id'] = $this->Auth->user('id');
	  $this->request->data['Game']['link'] = $url;	
	  $this->request->data['Game']['picture'] = $fileName.".png";
	 		
		//seourl begins
		$this->request->data['Game']['seo_url']=$this->checkDuplicateSeoUrl(str_replace('_','',Inflector::slug(strtolower($this->request->data['Game']['name']))));
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
				$editurl=Router::url(array('controller'=>'games', 'action'=>'edit2',$id));
				$this->redirect(array('controller'=>'games', 'action'=>'edit2',$id));
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