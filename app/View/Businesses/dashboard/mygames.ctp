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
if (isset($query)) {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search')) . '?q=' . $query;
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search', 'filter' => 'mobiles')) . '?q=' . $query;
    $featured = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search', 'filter' => 'featured')) . '?q=' . $query;
} else {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames', 'filter' => 'mobiles'));
	$featured = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames', 'filter' => 'featured'));
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
					<a href="<?php echo $featured; ?>" <?php echo $activefilter === 2 ? 'class="active"' : ''; ?>>Featured</a>                    <div class="show-options">
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

<br>
<<<<<<< HEAD
<div class="container-fluid">
    <div class="row  users-grid">
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
								<?php if ($game['Game']['featured'] == 1) { ?>
		                		<button type="button" class="btn btn-warning btn-sm featured_toggle" id='<?php echo $game['Game']['id']; ?>'><i class="fa fa-bullseye"></i> Unset Featured</button>
								<?php } else { ?>
		                		<button type="button" class="btn btn-default btn-sm featured_toggle" id='<?php echo $game['Game']['id']; ?>'><i class="fa fa-bullseye"></i> Set Featured</button>
								<?php } ?>
						  <a href="<?php echo $game_edit . '/' . $id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
						  <a data-toggle="modal" data-target="#confirm-modal" onclick="game_id_create(<?php echo $id; ?>);" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
						</span>
		                </div>
		            </div>
		        </div>
		    
		    <?php
		}
		?>
=======
    <div class="row users-grid">
            <?php echo $this->element('business/dashboard/mygames/grid') ?>
>>>>>>> FETCH_HEAD
                    <div class="text-center">
                        <?php echo $this->element('business/components/pagination') ?>
                    </div>
    </div>
            <div class="row users-list">
            <?php echo $this->element('business/dashboard/mygames/list') ?>
                <div class="text-center">
            <?php echo $this->element('business/components/pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="attr" value="edit_game" />

<script>
	function game_id_create(id){
		games_delete_id = id;
	}
</script>
	<!-- Confirm Modal -->
	<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog">
	  	<div class="modal-dialog">
		    <div class="modal-content">
		    	<form method="post" action="#" role="form">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        	<h4 class="modal-title" id="myModalLabel">
			        		Are you sure you want to delete this?
			        	</h4>
			      	</div>
			      	<div class="modal-body">
						Do you want to delete your games? All your info will be erased.
			      	</div>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				        <a onclick="delete_game(user_auth, games_delete_id);" class="btn btn-danger">Yes, delete it</a>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>
	<style>
		    #search #content #sidebar .menu {
      list-style-type: none;
      padding: 0;
      margin: 0; }
      @media (max-width: 767px) {
        #search #content #sidebar .menu {
          margin-top: 15px;
          padding-bottom: 10px; } }
      #search #content #sidebar .menu li a {
        display: block;
        padding: 13px 30px;
        font-size: 15px;
        color: #555;
        text-decoration: none;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear; }
        #search #content #sidebar .menu li a.active, #account #content #sidebar .menu li a:hover {
          color: #6787DA; }
        #search #content #sidebar .menu li a i {
          min-width: 30px; }
          #search #content #sidebar .menu li a i.ion-ios7-person-outline {
            font-size: 30px;
            position: relative;
            top: 4px; }
          #search #content #sidebar .menu li a i.ion-ios7-email-outline {
            font-size: 24px;
            position: relative;
            top: 4px; }
          #search #content #sidebar .menu li a i.ion-ios7-help-outline {
            font-size: 24px;
            position: relative;
            top: 4px; }
          #search #content #sidebar .menu li a i.ion-card {
            font-size: 21px;
            position: relative;
            top: 3px; }
            
			#search #content #sidebar {
			left: 0;
			top: 0;
			bottom: 0;
			position: absolute;
			width: 100%;
			background: #fcfcfc;
			border-right: 1px solid #E8ECF1;
			}
	</style>
	</body>
