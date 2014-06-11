<?php foreach ($followers as $value) { ?>
    <div class="row user">
        <div class="col-sm-2 avatar">
            <input type="checkbox" name="select-user" />
            <img src="images/avatars/1.jpg" />
        </div>
        <div class="col-sm-3">
            <a href="user-profile.html" class="name"><?php echo $value['User']['username'] ?></a>
        </div>
        <div class="col-sm-3">
            <div class="followercount"><?php echo $value['User']['Userstat']['subscribeto'] ?></div>
        </div>
        <div class="col-sm-2">
            <div class="followingcount">
                <?php echo $value['User']['Userstat']['subscribeto'] ?>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="gamescount">
                <?php echo $value['User']['Userstat']['uploadcount'] ?>
            </div>
        </div>
    </div>
<?php } ?>