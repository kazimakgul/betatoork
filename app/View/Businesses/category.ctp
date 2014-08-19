	<div class="container">
	<?php	
	
	if($this->Session->read('Auth.User.id')==$user['User']['id']){
		$controls=$user['User']['id'];
	}else{
		$controls=NULL;
	}
	
	echo $this->element('business/ad', array('controls' => $controls, 'user_id' => $user['User']['id'], 'location' =>1 ));
	
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
		<?php if(isset($games[0]['Category'])){?>
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
					 				    <li><?php echo $this->Paginator->sort('id', 'Newest', array('direction' => 'desc')); ?></li>	
                                        <li><?php echo $this->Paginator->sort('name', 'Name', array('direction' => 'asc')); ?></li>
                                        <li><?php echo $this->Paginator->sort('starsize', 'Top Rated', array('direction' => 'desc')); ?></li>
                                        <li><?php echo $this->Paginator->sort('Gamestat.playcount', 'Most Played', array('direction' => 'desc')); ?></li>
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
                        <?php
                        $params = $this->Paginator->params();
                        $pageCount = $params['pageCount'];
                        if ($pageCount > 1) {
                        ?>
                        <div class="panel-footer">
							<center><?php
							echo $this->element('business/components/pagination',array("controller"=>FALSE));
							?></center>
						</div>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!--/footer-->
		<?php }
		echo $this->element('business/ad', array('controls' => $controls, 'user_id' => $user['User']['id'], 'location' =>3 ));
		?>
		 <?php  echo $this->element('business/components/popup',array('user_id'=>$user['User']['id'])); ?>

	</div><!-- /.container -->
	<?php  echo $this->element('business/footer'); ?>
