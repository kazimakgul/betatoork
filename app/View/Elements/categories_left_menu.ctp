<div class="categories">
  <div class="sep"></div>
  <ul>
  <!--usual foreach starts-->

  	<?php 
	  	$switch = 'odd';
	  	foreach ($category as $cat): 
			if($switch == 'odd'){
				$switch = 'even';
			} else{
				$switch = 'odd';
			} 
	?>

		<li class="<?php echo $switch ?>">
		<?php 
		$catName = h($cat['Category']['name']);
		$catId = $cat['Category']['id'];
		echo $this->Html->link($catName, array('controller'=>'games','action'=>'categorygames',$catId)); 

		?>


		</li>

	<?php endforeach; ?>


  <!--usual foreach ends-->
  </ul>
</div>