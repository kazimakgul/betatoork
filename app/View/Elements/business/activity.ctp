<?php
$x = 0;
$activityseen = array();
foreach ($notifications as $lastactivity):
	$class = 'moment';
    if ($x === 0) {
        $class.= ' first';
    }
    if ($x === count($notifications) - 1) {
        $class.= ' last';
    }
    $x++;
//print_r($lastactivity);
if($lastactivity['Activity']['seen']==0){
	$activityseen[] = $lastactivity['Activity']['id'];
}

$performername=$lastactivity['PerformerUser']['username'];
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$followid = $lastactivity['PerformerUser']['id'];
$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
$activity_message = $this->requestAction( array('controller' => 'apis', 'action' => 'notificationMessage'),array('pass' => $lastactivity));
$type = $lastactivity['Activity']['type'];
$profileurl=$this->Html->url(array("controller" => "businesses","action" =>"mysite",$followid));
   //$a => violet, yellow, dark, purple, 
   switch( $type )
   {
      case 1:
		 $a = "";
         $b = "comment";
         break;
      case 2:
		 $a = "yellow";
         $b = "check";
         break;
      case 3:
		 $a = "purple";
         $b = "files-o";
         break;
      case 4:
		 $a = "purple";
         $b = "quote-left";
         break;
      case 5:
		 $a = "violet";
         $b = "upload";
         break;
      case 6:
		 $a = "";
         $b = "comment";
         break;
      case 7:
		 $a = "";
         $b = "quote-left";
         break;
      case 8:
		 $a = "yellow";
         $b = "upload";
         break;
      case 9:
		 $a = "";
         $b = "files-o";
         break;
      case 10:
		 $a = "purple";
         $b = "upload";
         break;
      case 11:
		 $a = "";
         $b = "check";
         break;
      default:
		 $a = "";
         $b = "comment";
   }

?>
  
          <div class="<?php echo $class ?>">
                <div class="row event clearfix <?php echo $lastactivity['Activity']['seen']==0?'seen':'';?>">
                    <div class="col-sm-1">
                        <div class="icon <?php echo $a; ?>">
                            <i class="fa fa-<?php echo $b; ?>"></i>
                        </div>
                    </div>
                    <div class="col-sm-11 message">
<?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'50','height'=>'50','class'=>'avatar')); 
                } else {
                echo $this->Upload->image($card[6],'User.picture',array(),array('width'=>'50','height'=>'50','onerror'=>'imgError(this,"avatar");','class'=>'avatar'));  }
              ?>
                            <div class="content">
                                <a style="margin-left:9px;" href="<?php echo $profileurl ?>"><strong><?php echo $performername; ?></strong> <?php echo $activity_message;?>
                            </div>
                            <div class="size">
							<?php echo $lastactivity['Activity']['created'];?>
							</div>
                    </div>
                </div>
            </div>
<?php endforeach;
 
/**
 * @param $activity seen = 0 olan veriler, array(), body > onload function
 * @return Success
 * @author Volkan Celiloğlu 
 */
if(count($activityseen)>0)
{
?>	
<script>
	function notificationseen(){
		setTimeout(function () {
		seen();
    }, 2000);
	}
	function seen()
	{
		$.post(notifyload,{jsondata:'<?php echo json_encode($activityseen); ?>'});
	}
</script>
<?php
}else{
	function notificationseen(){
		//Okunmamış notification yoksa!
	}
}
 ?>

