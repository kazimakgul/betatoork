<div class="best">
  <div class="sep"></div>
  <ul>
  <!--usual foreach starts-->
  
  	<?php 
	  	$switch = 'odd';
	  	foreach ($games as $game): 
			if($switch == 'odd'){
				$switch = 'even';
			} else{
				$switch = 'odd';
			} 
	?>
	<?php
	  $channelurl=$this->Html->url(array("controller" => "games","action" =>"usergames",$game['User']['id']));
	?>
		<li class="<?php echo $switch ?>"><a href="<?php echo $channelurl ?>"><?php echo h($game['User']['username']); ?></a></li>

	<?php endforeach; ?>

  <!--usual foreach ends-->
  </ul>
</div>
