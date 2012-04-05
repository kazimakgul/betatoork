<div class="categories">
  <div class="sep"></div>
  <ul>
  <!--usual foreach starts-->

  	<?php 
	  	$switch = 'odd';
	  	foreach ($categories as $category): 
			if($switch == 'odd'){
				$switch = 'even';
			} else{
				$switch = 'odd';
			} 
	?>

		<li class="<?php echo $switch ?>"><a href="#"><?php echo h($category['Category']['name']); ?></a></li>

	<?php endforeach; ?>


  <!--usual foreach ends-->
  </ul>
</div>