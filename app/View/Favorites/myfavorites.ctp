

<div class="wrapper" >
<div class="content">
<br><br><br>


<?php
echo $this->element('logedinButtons');
?>

<div style="margin-top:80px;">

<?php foreach ($favorites as $favorite): ?>

<div class='boxy'>
	       			<a href='http://localhost/newtoork/games/play/<?php echo h($favorite['Game']['id']); ?>'>
		                <div class="view view-first board" >
		                    <?php echo $this->Upload->image($favorite,'Game.picture'); ?>
		                    <div class="mask">
		                        <h2><?php echo h($favorite['Game']['name']); ?></h2>
		                         <p>by <?php echo h($favorite['User']['username']); ?></p>
		                        <a href="http://localhost/newtoork/games/play/<?php echo h($favorite['Game']['id']); ?>" class="info">Play Game</a>
		                    </div>
		                </div>
	                </a>
	                	<div class='centerstars'>
						<div class="nostars">
							<div class="rating" style="width:<?php echo h($favorite['Game']['starsize']); ?>%"></div>
							<div class="star">
							<div class="star">
							<div class="star">
							<div class="star">
							<div class="star">
							</div></div></div></div></div>
							<div class="ratecount" style="width:120px;text-align:center;"><a>(<?php echo h($favorite['Game']['rate_count']); ?>)</a></div>
						</div></div>
                </div>


<?php endforeach; ?>


	<div align='center' class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
</p>
	</div>

</div>

<!- end wrapper and content-!>
<br><br><br>
</div>
</div>