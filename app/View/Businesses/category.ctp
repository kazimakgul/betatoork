	<div class="container">
	<?	$controls=NULL;
	if($this->Session->read('Auth.User.id')==$user['User']['id']){$controls=$user['User']['id'];}
	$homeBannerTop=$addata[0]['homeBannerTop']['code'];
	$homeBannerMiddle=$addata[0]['homeBannerMiddle']['code'];
	$homeBannerBottom=$addata[0]['homeBannerBottom']['code'];
	echo $this->element('business/ads',array('controls'=>$controls,'code'=>$homeBannerBottom,'adtype'=>'homeBannerBottom'));
	

	?>
		<div class="col-md-12">
			<div class="btn-group" style="margin-bottom:10px;">
			<?php $limit = 14;
			echo $this->element('business/category', array('limit'=>$limit,'userid'=>$user['User']['id']));
			?>
		 	</div>
		
		</div>
	 	<?php  echo $this->element('business/login',array('user_id'=>$user['User']['id'])); ?>
	 	<?php  echo $this->element('business/channelbanner',array('controls'=>$controls)); ?>
		<? if(isset($games[0]['Category']))
		{?>
		<!--/footer-->
		<div class="col-sm-12">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<ul class="nav pull-right" style='margin-top:-8px;'>
								<li class="dropdown">
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Filter/Sort <span class="caret"></span></button>
									<ul class="dropdown-menu">
					 					<li><?php echo $this->Paginator->sort('id','New Games',array('direction'=>'desc')); ?></li>
					 					<li><?php echo $this->Paginator->sort('recommend','Recommended',array('direction'=>'desc')); ?></li>
					 					<li><?php echo $this->Paginator->sort('starsize','Top Rate',array('direction'=>'desc')); ?></li>
					 					<li><?php echo $this->Paginator->sort('playcount','Most Play',array('direction'=>'desc')); ?></li>
					 					<li><?php echo $this->Paginator->sort('name','Name',array('direction'=>'asc')); ?></li>
					                   	<li><?php echo $this->Paginator->sort('created','Date'); ?></li>
									</ul>
								</li>
							</ul>
							<h3 class="panel-title"><?=$games[0]['Category']['name'];?> Category Games</h3>
						</div>
						<div class="panel-body">
		          <?php	$div = "<div class='col-xs-3' style='padding:5px;'>";
		          $limit = 24;
		          echo $this->element('business/games/box',array('div'=>$div,'gamedata'=>$games));
		          
		          ?>

						</div>
						<div class="panel-footer">
							<center><?php
							echo $this->element('business/components/pagination');
							?></center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/footer-->
		<?}
		echo $this->element('business/ads',array('controls'=>$controls,'code'=>$homeBannerBottom,'adtype'=>'homeBannerBottom'));
		?>
		 <?php  echo $this->element('business/components/popup',array('user_id'=>$user['User']['id'])); ?>

	</div><!-- /.container -->
	<?php  echo $this->element('business/footer'); ?>
