

<div class="wrapper" >
<div class="content">
<br><br><br>
<?php echo $this->element('sorting');?>

<?php foreach ($games as $game): ?>

<div class='boxy'>
	       			
<?php $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id']))); ?>		                
						
						<a href='<?php echo $playurl; ?>'>
		                <div class="view view-first board" >
		                    <?php echo $this->Upload->image($game,'Game.picture'); ?>
		                    <div class="mask">
		                        <h2><?php echo h($game['Game']['name']); ?></h2>
		                         <p>by <?php echo h($game['User']['username']); ?></p>
		                        <a href="<?php echo $playurl; ?>" class="info">Play Game</a>
		                    </div>
		                </div>
	                </a>
						
				
	                	<div class='centerstars'>
						<div class="nostars">
							<div class="rating" style="width:<?php echo h($game['Game']['starsize']); ?>%"></div>
							<div class="star">
							<div class="star">
							<div class="star">
							<div class="star">
							<div class="star">
							</div></div></div></div></div>
							<div class="ratecount" style="width:120px;text-align:center;"><a>(<?php echo h($game['Game']['rate_count']); ?>)</a></div>
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

<?php
echo $this->element('footnote');
?>

<!- end wrapper and content-!>
<br><br><br>
</div>
</div>