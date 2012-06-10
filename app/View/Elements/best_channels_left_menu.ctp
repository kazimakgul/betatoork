<?php 
$users = $this->requestAction( array('controller' => 'users', 'action' => 'bestChannels'));
?>

<div class="best">
  <div class="sep"></div>
  <ul>
  <!--usual foreach starts-->
  
  	<?php 
	  	$switch = 'odd';
	  	foreach ($users as $user): 
			if($switch == 'odd'){
				$switch = 'even';
			} else{
				$switch = 'odd';
			} 
	?>
	<?php
	  $channelurl=$this->Html->url(array("controller" => $user['User']['seo_username'],"action" =>""));
	?>
		<li class="<?php echo $switch ?>"><a href="<?php echo $channelurl ?>"><?php echo h($user['User']['username']); ?></a></li>

	<?php endforeach; ?>

  <!--usual foreach ends-->
  </ul>
</div>
