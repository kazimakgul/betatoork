<div class="wrapper" >
<div class="content">
<br><br><br>

<h1>Welcome to <?php echo $username; ?> s Game Channel</h1>
<?php foreach ($mygames as $game): ?>




<div class='boxy'>

				<?php echo $this->Html->link($this->Html->div('view view-first board',$this->Upload->image($game,'Game.picture').'<div class="mask"><h2>'.h($game['Game']['name']).'</h2><p>by '.h($game['User']['username']).'</p><a href="'.$this->Html->url(array( "controller" => "games", "action" => "play",h($game['Game']['id']) )).'" class="info">Play Game</a></div>'), array('controller'=>'games', 'action' => 'play',h($game['Game']['id'])), array('escape' => false));?>
				
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

<!- end wrapper and content-!>
<br><br><br>
</div>
</div>