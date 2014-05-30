<?php
$home = $this->Html->url(array("controller" => "mobiles", "action" => "index", $user_id));
$search = $this->Html->url(array("controller" => "mobiles", "action" => "search2", $user_id));
$toprated = $this->Html->url(array("controller" => "mobiles", "action" => "toprated", $user_id));
$mostplayed = $this->Html->url(array("controller" => "mobiles", "action" => "mostplayed", $user_id));
$newgames = $this->Html->url(array("controller" => "mobiles", "action" => "newgames", $user_id));
?>
<div class="snap-drawers">
    <div class="snap-drawer snap-drawer-left">
        <div>
            <div class="cover">
                <div class="cover_dark"></div>
                <a href="<?php echo $home ?>"><img class="img-circle" src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" alt="profile" width="50" height="50"></a>
                <a class="tit1" href="<?php echo $home ?>"><?php echo $screenname ?></a>
                <a class="tit2" href="<?php echo $home ?>">@<?php echo $username ?></a>
            </div>
            <form action="<?php echo $search ?>">
                <div class="input-group searchbox">
                    <input type="text" value="" name="srch-term" id="query" placeholder="Search" class="form-control" action="<?php echo $search ?>">
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                </div>
            </form>
            <div class="demo-social">
                <span class="label label-warning"><?php echo $followers ?> Followers</span>
                <span class="label label-info"><?php echo $following ?> Following</span>
                <span class="label label-danger"><?php echo $favorites ?> Favorites</span>
                <span class="label label-success"><?php echo $gamescount ?> Games</span>
            </div>
            <ul class="menu_ok">
                <li><a href="<?php echo $home; ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo $toprated; ?>"><i class="fa fa-star"></i> Top Rated</a></li>
                <li><a href="<?php echo $mostplayed; ?>"><i class="fa fa-play"></i> Most Played</a></li>
                <li><a href="<?php echo $newgames; ?>"><i class="fa fa-flash"></i> New Games</a></li>
                <li><a href="javascript:;"><i class="fa fa-gift"></i> Mobile Apps</a></li>
                <li><a href="javascript:;"><i class="fa fa-desktop"></i> Desktop Version</a></li>
            </ul>
            <div>
                <p><?php echo $username ?></p>
                <p><?php echo $description ?></p>
            </div>
            <?php if (isset($facebook) || isset($twitter) || isset($googleplus)) { ?>
                <div class="social_icon_custom">
                    <?php if (isset($twitter)) { ?>
                        <a href="<?php echo $twitter ?>" target="_blank" class="btn btn-social-icon btn-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    <?php } ?>
                    <?php if (isset($facebook)) { ?>
                        <a href="<?php echo $facebook ?>" target="_blank" class="btn btn-social-icon btn-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    <?php } ?>
                    <?php if (isset($googleplus)) { ?>
                        <a href="<?php echo $googleplus ?>" target="_blank" class="btn btn-social-icon btn-google-plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>