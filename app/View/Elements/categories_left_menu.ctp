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

		<li class="<?php echo $switch ?>">
		<?php 
		$catName = h($category['Category']['name']);
		$catId = $category['Category']['id'];
		echo $this->Html->link($catName, array('controller'=>'games','action'=>'categorygames',$catId)); 

		?>


		</li>

	<?php endforeach; ?>


  <!--usual foreach ends-->
  </ul>
</div>