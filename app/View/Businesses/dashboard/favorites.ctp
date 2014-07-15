<?php
$search_action = $this->Html->url(array("controller" => "businesses", "action" => "favorites_search"));
$game_add = $this->Html->url(array("controller" => "businesses", "action" => "game_add"));
$favorites = $this->Html->url(array("controller" => "businesses", "action" => "favorites"));
$params = $this->Paginator->params();
$allgames = $params['count'];
?>
<body id="users">
    <div id="wrapper">
        <?php echo $this->element('business/dashboard/sidebar',array('active'=>'favorites','bar'=>'Games')); ?>
        <div id="content">
            <div class="menubar fixed">
                <div class="sidebar-toggler visible-xs">
                    <i class="ion-navicon"></i>
                </div>
                <div class="page-title">
                <a href="<?php echo $favorites;?>">
                  Favorites
				</a>
                </div>
                <form class="search hidden-xs" action="<?php echo $search_action ?>">
                    <i class="fa fa-search"></i>
                    <input type="text" name="q" placeholder="Search games..." />
                    <input type="submit" />
                </form>
                <a href="<?php echo $game_add;?>" class="new-user btn btn-success pull-right">
                    <span>Add Game</span>
                </a>
            </div>
            <div class="content-wrapper">
                <div class="row page-controls">
                    <div class="col-md-12 filters">
                        <!--
                        <label>Filter Games:</label>
                        <a href="#" class="active">All Games (<?php echo $allgames ?>)</a>
                        <a href="#">Published (32)</a>
                        <a href="#">Suspended (6)</a>
                        <a href="#">Draft (1)</a>
                        -->
                        <div class="show-options">
                            <div class="dropdown">
                                <a class="button" data-toggle="dropdown" href="#">
                                    <span>
                                        Sort by
                                        <i class="fa fa-unsorted"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><?php echo $this->Paginator->sort('Game.name', 'Name', array('direction' => 'asc')) ?></li>
                                    <li><?php echo $this->Paginator->sort('Gamestat.channelclone', 'Clones', array('direction' => 'desc')) ?></li>
                                    <li><?php echo $this->Paginator->sort('Gamestat.favcount', 'Favorites', array('direction' => 'desc')) ?></li>
                                    <li><?php echo $this->Paginator->sort('Gamestat.playcount', 'Plays', array('direction' => 'desc')) ?></li>
                                    <li><?php echo $this->Paginator->sort('Game.rate_count', 'Rates', array('direction' => 'desc')) ?></li>
                                </ul>
                            </div>
                            <a href="#" data-grid=".users-list" class="grid-view active"><i class="fa fa-th-list"></i></a>
                            <a href="#" data-grid=".users-grid" class="grid-view"><i class="fa fa-th"></i></a>
                        </div>
                    </div>
                </div>

<div class="container-fluid">
    <div class="row">
		<?php
		foreach ($games as $game) {
		    $name = $game['Game']['name'];
		    $id = $game['Game']['id'];
		    $clones = empty($game['Game']['Gamestat']['channelclone']) ? 0 : $game['Game']['Gamestat']['channelclone'];
		    $favorites = empty($game['Game']['Gamestat']['favcount']) ? 0 : $game['Game']['Gamestat']['favcount'];
		    $plays = empty($game['Game']['Gamestat']['playcount']) ? 0 : $game['Game']['Gamestat']['playcount'];
		    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
			
		    if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
		        $playurl = $this->Html->url('http://' . $game['Game']['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
		    	 $userlink = $this->Html->url('http://'.$game['Game']['User']['seo_username'].'.'.$pure_domain); 
			} else {
		        $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
				$userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($game['Game']['User']['id'])));
		    }
    ?>
		        <div class="col-md-4" id="gamebox-<?php echo $id; ?>">
		            <div class="panel panel-default">
		                <!--<a href="#"><div style="padding:80px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/games/168/toork_Kamikaze_Pigs_toorksize.png)" class="panel-heading">
		                </div></a>-->
		                <a href="<?php echo $playurl ?>" target="_blank">
		                <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'box_img_resize', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");','width'=>'720','height'=>'110')); ?>
		            	</a>
		                <div class="panel-body" style="padding-top:0px;">
		                    <a href="<?php echo $playurl ?>"><h4 class="text-center" style="height: 20px;overflow: hidden;"><strong><?php echo $name ?></strong> </h4></a>
							<small>

                  <div class="text-center" style="margin-bottom:7px; color:orange;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $rates;?> Rates">
                    <?php 
                    $star = round($game['Game']['starsize'] / 20);
                    for($i=1; $i<=$star; $i++){
                    	echo '<i class="fa fa-star fa-2x"></i>';
                    }
					$freestar=5-$star;
                    if($freestar>0){
                    	for($i=1; $i<=$freestar; $i++)
						{
							echo '<i class="fa fa-star-o fa-2x"></i>';
						}
                    }
                    ?>
                </div>
			                <div class="text-center">
			                	<i class="fa fa-plus-square "> <?php echo $clones ?> Clones</i> | 
			                	<i class="fa fa-heart"> <?php echo $favorites ?> Favorites</i> | 
			                	<i class="fa fa-play"> <?php echo $plays ?> Plays</i></div>
		                	</small>
  <!----=========================================---->
		<!-- Favorite Button -->
		<div class="favourite">
			<div class="widget-button" data-toggle="tooltip" data-original-title="Add to favorites">
				<button type="button" class="btn btn-danger" id="fav-<?php echo $game['Game']['id'];?>" onclick="favorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);"><li class="fa fa-heart <?if(isset($ownuser[0]['favorites']['id'])){echo 'red';}?>"></li> Favorite <span class="label label-info" id="fav_count"><?=$game['Gamestat']['favcount'];?></span></button>
			</div>
		</div><!-- Favorite Button  End-->
						</div>
		                <div class="panel-footer">
		                <div class="row">
		                  <div class="col-md-4" style="margin-right:-30px;">
		                    <a href="<?php echo $userlink;?>">
		                		<?php echo $this->Upload->image($game['Game'], 'User.picture', array(), array('class' => 'img-responsive img-thumbnail img-circle circular2', 'onerror' => 'imgError(this,"avatar");')); //$this->Upload->image($user, 'User.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'img-responsive img-thumbnail img-circle', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");','width'=>'50','height'=>'50')); ?>
		                     </a>
		                	</div>
		                  <div class="col-md-8">
		                     <?php if ($game['Game']['User']['verify'] == 1) { ?>
		                    <h5><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span>
		                    <?php } ?>
		                    	<a href="<?php echo $userlink;?>"><strong> <?php echo $game['Game']['User']['username'];?></strong></a> 
		                    	<br> <small>@ <?php echo $game['Game']['User']['seo_username'];?></small></h5>
		                  </div>
		                </div>
		                </div>
		            </div>
		        </div>
		    
		    <?php
		}
		?>
                    <div class="text-center">
                        <?php echo $this->element('business/components/pagination') ?>
                    </div>
    </div>
</div>                

            </div>
        </div>
    </div>
</body>