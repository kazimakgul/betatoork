<div class="step active animated fadeInRightStep">
    <!--
     <div class="form-group">
         <label>Custom Domain: </label>
         <span class="help" data-toggle="tooltip" title="Map your own domain to your channel.">
             <i class="fa fa-question-circle"></i>
         </span>
         <a href="<?php echo $gochannel; ?>" target="_blank" class="btn btn-default"> http://<?php echo $user['User']['seo_username']; ?>.clone.gs </a>
         <a class="btn btn-default" data-toggle="tooltip" title="You need to upgrade"><i class="fa fa-globe"></i> Map Domain </a>
     </div>
    -->
    <!--Channel Cover Avatar Begins -->
    <div id='background_area' style="background-size:contain; background-position:center; background-image: url('<?php echo Configure::read('S3.url') . '/upload/users/' . $user['User']['id'] . '/' . $user['User']['bg_image']; ?>'); background-color:<?php echo $user['User']['bg_color']; ?>; height: 203px" class="well col-md-12">
        <?php if ($user['User']['banner'] == null) { ?>
            <div id="user_cover" style="background-size:contain; background-position:center; background-image:url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);height: 115px;">
            <?php } else { ?>
                <div id="user_cover" style="background-size:contain; background-position:center; background-image:url(<?php echo Configure::read('S3.url') . "/upload/users/" . $user['User']['id'] . "/" . $user['User']['banner']; ?>);height: 115px;">
                    <?php
                }
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                if ($user['User']['picture'] == null) {
                    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('style' => 'margin-top:50px; width:120px; height:120px;', 'id' => 'channel_avatar', 'class' => 'pic circular1 img-thumbnail', "alt" => "clone user image"));
                } else {
                    echo $this->Upload->image($user, 'User.picture', array(), array('style' => 'margin-top:50px; width:120px; height:120px;', 'id' => 'channel_avatar', 'class' => 'pic circular1 img-thumbnail', 'onerror' => 'imgError(this,"avatar");'));
                }
                ?>
                <a data-toggle="modal" data-target="#coverChange" href="#" class="btn btn-xs btn-default pull-left" style="margin: 10px 0px 0px -110px; position:absolute;"><span class="fa fa-picture-o"></span> Change Cover</a>
                <div class="name">
                    <div class="showme">
                        <a data-toggle="modal" data-target="#pictureChange"  href="#" class="btn btn-xs btn-default pull-left" style="margin:-40px 0px 10px 25px; position:absolute;"><span class="fa fa-picture-o"></span> Change</a>
                    </div>
                </div>
            </div>
            <br><br><br><br>
        </div>
        <!--Channel Cover Avatar Ends -->
        <div class="form-group" style="text-align:left !important;">
            <label>Screen Name
                <span class="help" data-toggle="tooltip" title="Users will see your screen name on your channel.">
                    <i class="fa fa-question-circle"></i>
                </span>
            </label>
            <input type="text" class="form-control" name='screenname' id="title" value="<?php echo $user['User']['screenname']; ?>" />
        </div>
        <div class="form-group">
            <label>Description</label>
            <div><textarea id="desc" class="form-control" id="desc" rows="4" name="description" style="margin-bottom: 10px; height:100px;"><?php echo $user['User']['description']; ?></textarea></div>
        </div>
        <div class="form-group">
            <label>Background Color</label>
            <div>
                <input type="text" class="form-control minicolors" name='bgclr' id="bgcolor" value="<?php echo $user['User']['bg_color']; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" id="attr" name="attr" value="channel_update_start" />
        </div>
        <div class="form-group form-actions" style="float: left;width: 100%;">
            <button type="submit"  id="updateButton" class="btn button" data-step="2">
                <span>Next Step <i class="fa fa-angle-double-right"></i></span>
            </button>
        </div>
    </div>