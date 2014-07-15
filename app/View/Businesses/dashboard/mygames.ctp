<?php
switch ($activefilter) {
    case 0:
        $search_action = $this->Html->url(array("controller" => "businesses", "action" => "mygames_search"));
        break;
    case 1:
        $search_action = $this->Html->url(array("controller" => "businesses", "action" => "mygames_search", "filter" => "mobiles"));
        break;
}
$mygames = $this->Html->url(array("controller" => "businesses", "action" => "mygames"));
$game_add = $this->Html->url(array("controller" => "businesses", "action" => "game_add"));
$game_edit = $this->Html->url(array("controller" => "businesses", "action" => "game_edit"));
if (isset($query)) {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search')) . '?q=' . $query;
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search', 'filter' => 'mobiles')) . '?q=' . $query;
} else {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames', 'filter' => 'mobiles'));
}
?>
<body id="users">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'mygames', 'bar' => 'Games')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="<?php echo $mygames; ?>">
                    My Games
                </a>
            </div>
            <form class="search hidden-xs" action="<?php echo $search_action; ?>">
                <i class="fa fa-search"></i>
                <input type="text" name="q" placeholder="Search games..." />
                <input type="submit" />
            </form>
            <a href="<?php echo $game_add; ?>" class="new-user btn btn-success pull-right">
                <span>Add Game</span>
            </a>
        </div>
        <div class="content-wrapper">
            <div class="row page-controls">
                <div class="col-md-12 filters">
                    <label>Filter Games:</label>
                    <a href="<?php echo $all; ?>" <?php echo $activefilter === 0 ? 'class="active"' : ''; ?>>All Games</a>
                    <a href="<?php echo $mobile; ?>" <?php echo $activefilter === 1 ? 'class="active"' : ''; ?>>Mobile Games</a>
                    <span style='color: gray;font-weight: bold;'>
                        <i style='color:#F7D358;font-size: 20px;vertical-align: middle;' class="fa fa-star" data-toggle="tooltip" data-original-title="Set as Featured"></i>
                        Featured
                    </span>
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
                        <a href="#" data-grid=".users-list" class="grid-view"><i class="fa fa-th-list"></i></a>
                        <a href="#" data-grid=".users-grid" class="grid-view active"><i class="fa fa-th"></i></a>
                    </div>
                </div>
            </div>


<div class="container-fluid">
    <div class="row">
		<?php
		foreach ($games as $game) {
		    $name = $game['Game']['name'];
		    $id = $game['Game']['id'];
		    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
		    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
		    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
		    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
			
		    if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
		        $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
		    } else {
		        $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
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
		                </div>
		                <div class="panel-footer">
						<span>
								<?php if ($game['Game']['priority'] > 0) { ?>
		                		<button type="button" class="btn btn-warning btn-sm featured_toggle" id='<?php echo $game['Game']['id']; ?>'><i class="fa fa-bullseye"></i> Unset Featured</button>
								<?php } else { ?>
		                		<button type="button" class="btn btn-default btn-sm featured_toggle" id='<?php echo $game['Game']['id']; ?>'><i class="fa fa-bullseye"></i>Set Featured</button>
								<?php } ?>
						  <a href="<?php echo $game_edit . '/' . $id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
						  <a href="javascript:;" onclick="delete_game(user_auth, <?php echo $id; ?>);" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
						</span>
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


            <!--<div class="row users-list">
                <div class="col-md-12">
                    <div class="row headers">
                        <div class="col-sm-2 header select-users">
                            <input type="checkbox" />
                            <div class="dropdown bulk-actions">
                                <a data-toggle="dropdown" href="#">
                                    Bulk actions
                                    <span class="total-checked"></span>
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><a href="#" data-toggle="modal" data-target="#confirm-modal" >Delete game(s)</a></li>
                                    <li><a href="#">Edit game</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 header hidden-xs">
                            <label><?php echo $this->Paginator->sort('Game.name', 'Name', array('direction' => 'asc')) ?></label>
                        </div>
                        <div class="col-sm-1 header hidden-xs text-right">
                            <label><?php echo $this->Paginator->sort('Gamestat.channelclone', 'Clones', array('direction' => 'desc')) ?></label>
                        </div>
                        <div class="col-sm-1 header hidden-xs text-right">
                            <label><?php echo $this->Paginator->sort('Gamestat.favcount', 'Favorites', array('direction' => 'desc')) ?></label>
                        </div>
                        <div class="col-sm-1 header hidden-xs text-right">
                            <label><?php echo $this->Paginator->sort('Gamestat.playcount', 'Plays', array('direction' => 'desc')) ?></label>
                        </div>
                        <div class="col-sm-1 header hidden-xs text-right">
                            <label><?php echo $this->Paginator->sort('Game.rate_count', 'Rates', array('direction' => 'desc')) ?></label>
                        </div>
                    </div>
                    <?php // echo $this->element('business/dashboard/mygames/list', array('game_edit_link' => $game_edit)) ?>
                    <div class="text-center">
                        <?php echo $this->element('business/components/pagination') ?>
                    </div>
                </div>
            </div>-->
            <!--<div class="row users-grid">
                <?php echo $this->element('business/dashboard/mygames/grid') ?>
                <div class="text-center">
                    <?php echo $this->element('business/components/pagination') ?>
                </div>
            </div>-->
             <!-- <div class="col-md-4">
            <div class="panel panel-default">
                <a href="#"><div style="padding:80px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/games/6792/super_mario_bros_3_by_ggrock70-d36fqni_toorksize.png)" class="panel-heading">
                </div></a>
                <div class="panel-body" style="padding-top:0px;">
                    <a href="#"><h4 class="text-center"><strong>Super Mario Bros 3</strong> </h4></a>
                        <small>

                  <div class="text-center" style="margin-bottom:7px; color:orange;" data-toggle="tooltip" data-placement="top" title="" data-original-title="413 Rates">
                    <i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i>
                </div>
                <div class="text-center"><i class="fa fa-plus-square "> 258 Clones</i> | <i class="fa fa-heart"> 46 Favorites</i> | <i class="fa fa-play"> 2K Plays</i></div>

                    <div style="margin-top:10px;" class="text-center">
                    <a class="btn btn-info"><strong><i class="fa fa-plus-square"></i> Clone </strong></a>
                    </div>

                        </small>
                </div>
                <div class="panel-footer">

                <div class="row">
                  <div class="col-md-4" style="margin-right:-30px;">
                    <a href="#">
                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive img-thumbnail img-circle" style="width:50px; height:50px;">
                     </a>

                </div>

                  <div class="col-md-8">

                    <h5><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span><a href="#"><strong> Socialesman</strong></a> <br> <small>@socialesman</small></h5>

                  </div>
                </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <a href="#"><div style="padding:80px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/games/6954/67444675_toorksize.png)" class="panel-heading">
                </div></a>
                <div class="panel-body" style="padding-top:0px;">
                    <a href="#"><h4 class="text-center"><strong>Robots Social Wars</strong> </h4></a>
                        <small>

                  <div class="text-center" style="margin-bottom:7px; color:orange;" data-toggle="tooltip" data-placement="top" title="" data-original-title="413 Rates">
                    <i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i>
                </div>
                <div class="text-center"><i class="fa fa-plus-square "> 258 Clones</i> | <i class="fa fa-heart"> 46 Favorites</i> | <i class="fa fa-play"> 2K Plays</i></div>

                    <div style="margin-top:10px;" class="text-center">
                    <a class="btn btn-danger"><strong><i class="fa fa-heart"></i> Favorite </strong></a>
                    </div>

                        </small>
                </div>
                <div class="panel-footer">

                <div class="row">
                  <div class="col-md-4" style="margin-right:-30px;">
                    <a href="#">
                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive img-thumbnail img-circle" style="width:50px; height:50px;">
                     </a>

                </div>

                  <div class="col-md-8">

                    <h5><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span><a href="#"><strong> Socialesman</strong></a> <br> <small>@socialesman</small></h5>

                  </div>
                </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <a href="#"><div style="padding:80px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/games/6954/67444675_toorksize.png)" class="panel-heading">
                </div></a>
                <div class="panel-body" style="padding-top:0px;">
                    <a href="#"><h4 class="text-center"><strong>Robots Social Wars</strong> </h4></a>
                        <small>

                  <div class="text-center" style="margin-bottom:7px; color:orange;" data-toggle="tooltip" data-placement="top" title="" data-original-title="413 Rates">
                    <i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i>
                </div>
                <div class="text-center"><i class="fa fa-plus-square "> 258 Clones</i> | <i class="fa fa-heart"> 46 Favorites</i> | <i class="fa fa-play"> 2K Plays</i></div>

                    <div style="margin-top:10px;" class="text-center">
                    <a class="btn btn-success"><strong><i class="fa fa-android"></i> Android </strong></a>
                    </div>

                        </small>
                </div>
                <div class="panel-footer">

                <div class="row">
                  <div class="col-md-4" style="margin-right:-30px;">
                    <a href="#">
                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive img-thumbnail img-circle" style="width:50px; height:50px;">
                     </a>

                </div>

                  <div class="col-md-8">

                    <h5><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span><a href="#"><strong> Socialesman</strong></a> <br> <small>@socialesman</small></h5>

                  </div>
                </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <a href="#"><div style="padding:80px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/games/6954/67444675_toorksize.png)" class="panel-heading">
                </div></a>
                <div class="panel-body" style="padding-top:0px;">
                    <a href="#"><h4 class="text-center"><strong>Robots Social Wars</strong> </h4></a>
                        <small>

                  <div class="text-center" style="margin-bottom:7px; color:orange;" data-toggle="tooltip" data-placement="top" title="" data-original-title="413 Rates">
                    <i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i>
                </div>
                <div class="text-center"><i class="fa fa-plus-square "> 258 Clones</i> | <i class="fa fa-heart"> 46 Favorites</i> | <i class="fa fa-play"> 2K Plays</i></div>

                    <div style="margin-top:10px;" class="text-center">
                    <a class="btn btn-default"><strong><i class="fa fa-apple"></i> iPhone </strong></a>
                    </div>

                        </small>
                </div>
                <div class="panel-footer">

                <div class="row">
                  <div class="col-md-4" style="margin-right:-30px;">
                    <a href="#">
                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive img-thumbnail img-circle" style="width:50px; height:50px;">
                     </a>

                </div>

                  <div class="col-md-8">

                    <h5><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span><a href="#"><strong> Socialesman</strong></a> <br> <small>@socialesman</small></h5>

                  </div>
                </div>
                </div>
            </div>
        </div>-->

        </div>
    </div>
</div>
<input type="hidden" id="attr" value="edit_game" />
<?php echo $this->element('business/dashboard/modals/confirm'); ?>
</body>