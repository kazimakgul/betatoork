<br><br><br>
<?php if($game['Game']['active']=='1'){?>

		<iframe src="<?php echo h($game['Game']['link']); ?>" style="width:100%; height:100%;"></iframe>

<?php }else{

		echo '<h1> This Game Is Not Published Yet</h1>';
		
		}
	?>
<br><br><br>
