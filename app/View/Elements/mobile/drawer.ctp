<?php

if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
$search = $this->Html->url(array("controller" => "games", "action" => "search"));
$home = $this->Html->url('/');
$toprated = $this->Html->url(array("controller" => "games", "action" => "top-rated"));
$mostplayed=$this->Html->url(array("controller" => "games", "action" => "most-played"));
$newgames=$this->Html->url(array("controller" => "games", "action" => "newest"));  
$appstore=$this->Html->url(array("controller" => "games", "action" => "appstore"));  
}else{
 $search = $this->Html->url(array("controller" => "mobiles", "action" => "search2", $user_id));
 $home = $this->Html->url(array("controller" => "mobiles", "action" => "index", $user_id));
 $toprated = $this->Html->url(array("controller" => "mobiles", "action" => "index", $user_id)) . '/sort:starsize/direction:desc';
 $mostplayed = $this->Html->url(array("controller" => "mobiles", "action" => "index", $user_id)) . '/sort:Gamestat.playcount/direction:desc';
 $newgames = $this->Html->url(array("controller" => "mobiles", "action" => "index", $user_id)) . '/sort:id/direction:desc'; 
 $appstore=$this->Html->url(array("controller" => "mobiles", "action" => "store_games", $user_id)); 
}    
$image = $this->requestAction(array('controller' => 'users', 'action' => 'randomPicture', 62));

?>
<div class="snap-drawers">
    <div class="snap-drawer snap-drawer-left deny-scrool-x">
        <div>
            <?php if (is_null($cover)) { ?>
                <div class="cover" style="background-image: url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg)">
                <?php } else { ?>
                    <div class="cover" style="background-image: url(<?php echo Configure::read('S3.url') . "/upload/users/" . $user_id . "/" . $cover; ?>)">
                    <?php } ?>
                    <div class="cover_dark"></div>
                    <?php
                    if (is_null($picture)) {
                        $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                        echo '<a href="' . $home . '">' . $this->Html->image("/img/avatars/$avatarImage.jpg", array('id' => 'user_avatar', 'class' => 'img-circle', 'onerror' => 'imgError(this,"avatar");', 'alt' => 'profile', 'width' => '50', 'height' => '50')) . '</a>';
                    } else {
                        echo '<a href="' . $home . '">' . $this->Upload->image($user, 'User.picture', array(), array('id' => 'user_avatar', 'class' => 'img-circle', 'onerror' => 'imgError(this,"avatar");', 'alt' => 'profile', 'width' => '50', 'height' => '50')) . '</a>';
                    }
                    ?>
                    <a class="tit1" href="<?php echo $home ?>"><?php echo $screenname ?></a>
                    <a class="tit2" href="<?php echo $home ?>">@<?php echo $username ?></a>
                </div>
                <form action="<?php echo $search ?>" name="searchform" id="searchform">
                    <div class="row search_area">
                        <div class="col-xs-12" >
                            <div class="right-inner-addon form_input">
                                <i class="fa fa-search black"></i>
                                <input type="search" class="form-control" placeholder="Search" name="srch-term" name="srch-term" />
                                <input type="submit" class="hidden_submit" value="" />
                            </div>
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
                    <li><a href="<?php echo $appstore; ?>"><i class="fa fa-gift"></i> Mobile Apps</a></li>
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
</div>