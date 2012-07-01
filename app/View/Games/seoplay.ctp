<?php $channel=$this->Html->url(array( "controller" => "games","action" =>"usergames",$game['Game']['user_id'] )); ?>
<br><br><br>
<?php if($game['Game']['active']=='1'){?>

		<iframe src="<?php echo h($game['Game']['link']); ?>" style="width:100%; height:100%;"></iframe>

<?php }else{?>

		<div class="alert alert-info channel"><h1> This Game Is Not Published Yet</h1> Subscribe to <a href="<?php echo $channel?>"><?php echo h($game['User']['username']); ?></a>'s channel to be notified when new games published.</div>
		
	<?php	}
	?>
	                
<br><br>
