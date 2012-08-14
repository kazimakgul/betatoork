<?php $channelurl=$this->Html->url(array("controller" => $game['User']['seo_username'],"action" =>""));  ?>
<br><br><br>
<?php if($game['Game']['active']=='1'){?>

		<iframe src="<?php echo h($game['Game']['link']); ?>" style="width:100%; height:100%;"> LOADING ... </iframe>

<?php }else{?>

		<div class="alert alert-info channel"><h1> This Game Is Not Published Yet</h1> Chain to <a href="<?php echo $channel?>"><?php echo h($game['User']['username']); ?></a>'s channel to be notified when new games published.</div>
		
	<?php	}
	?>
	                
<br><br>
