<?php $home = $this->Html->url(array("controller" => "mobiles", "action" => "index", 2)); ?>
<div class="snap-drawers">
    <div class="snap-drawer snap-drawer-left">
        <div>
            <div class="cover">
                <div class="cover_dark"></div>
                <img class="img-circle" src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" alt="profile" width="50" height="50">
                <span class="tit1"><?= $screenname ?></span>
                <span class="tit2"><?= $username ?></span>
            </div>
            <div class="demo-social">
                <span class="label label-warning">17 Followers</span>
                <span class="label label-info">21 Following</span>
                <span class="label label-danger">34 Favorites</span>
                <span class="label label-success">211 Games</span>
            </div>
            <h4>Menu</h4>
            <ul>
                <li><a href="<?php echo $home; ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-star"></i> Top Rated</a></li>
                <li><a href="#"><i class="fa fa-play"></i> Most Played</a></li>
                <li><a href="#"><i class="fa fa-flash"></i> New Games</a></li>
                <li><a href="#"><i class="fa fa-gift"></i> Mobile Apps</a></li>
                <li><a href="#"><i class="fa fa-desktop"></i> Desktop Version</a></li>
            </ul>
            <div>
                <p><?= $username ?></p>
                <p><?= $description ?></p>
            </div>
        </div>
    </div>
</div>