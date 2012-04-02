<div class="wrapper" >
<div class="content">
<?php
echo $this->element('logedinButtons');
?>

	<div class="games view">
	<h2><?php echo h($game['Game']['name']); ?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($game['Game']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($game['Game']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Link'); ?></dt>
			<dd>
				<?php echo h($game['Game']['link']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Description'); ?></dt>
			<dd>
				<?php echo h($game['Game']['description']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Active'); ?></dt>
			<dd>
				<?php echo h($game['Game']['active']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Picture'); ?></dt>
			<dd>
				<?php echo h($game['Game']['picture']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($game['User']['id'], array('controller' => 'users', 'action' => 'view', $game['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Category'); ?></dt>
			<dd>
				<?php echo $this->Html->link($game['Category']['id'], array('controller' => 'categories', 'action' => 'view', $game['Category']['id'])); ?>
				&nbsp;
			</dd>
		</dl>
	</div>

</div>
</div>
