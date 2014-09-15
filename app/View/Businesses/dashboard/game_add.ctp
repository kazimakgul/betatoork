<body id="form-product">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar'); ?>
    <div id="content">
        <div class="menubar">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="#" onclick="history.go(-1);
                        return false;">
                    ← Go back
                </a>

                <small class="hidden-xs">
                    <strong>Add game to your channel</strong>
                </small>
            </div>
        </div>

        <div class="content-wrapper">
            <form id="game_add" class="form-horizontal" method="post" action="#" role="form">
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label">Picture
                        <span class="help" data-toggle="tooltip" title="Display game picture">
                            <i class="fa fa-question-circle"></i>
                        </span>
                    </label>
                    <div class="col-sm-10 col-md-8">
                        <div class="well">
                            <div class="pic">


                                <?php
                                $bg_message = "No image chosen.";
                                $bg_exist = 0;
                                ?>
                                <img id='game_image' data-src='empty' src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" class="img-responsive">



                            </div>

                            <div class="control-group" style="margin-bottom:5px;">
                                <label for="post_featured_image" style='display: block;'>
                                    Choose a picture:
                                </label>
                                <a data-toggle="modal" data-target="#gameChange"  href="#" class="btn btn-xs btn-default"><span class="fa fa-picture-o"></span> Choose File</a><span id='bg_message' style='margin-left:6px;'><?php echo $bg_message; ?></span>
                            </div>
                            <?php if ($bg_exist == 1) { ?>
                                <a href="#" class="remove_bg_img">Remove Background Image</a>
                            <?php } else { ?>
                                <a style="display:none;" href="#" class="remove_bg_img">Remove Background Image</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label">Name
                        <span class="help" data-toggle="tooltip" title="Game name">
                            <i class="fa fa-question-circle"></i>
                        </span>
                    </label>
                    <div class="col-sm-10 col-md-8">
                        <input type="text" class="form-control" id="name" name="name" maxlength="45" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label">Description
                        <span class="help" data-toggle="tooltip" title="Game description">
                            <i class="fa fa-question-circle"></i>
                        </span>
                    </label>
                    <div class="col-sm-10 col-md-8">
                        <textarea id="desc" class="form-control" id="desc" rows="4" maxlength="500" name="notes" style="margin-bottom: 10px; height:100px;"></textarea>
                    </div>
                </div>
                <div class="address">
                    <div class="form-group">
                        <label class="col-sm-2 col-md-2 control-label">Game link
                            <span class="help" data-toggle="tooltip" title="Game upload link">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </label>
                        <div class="col-sm-5 col-md-4">
                            <input type="text" class="form-control" maxlength="200" id="game_link" placeholder="http://socialesman.com" name="address" />
                        </div>
                        <div class="col-sm-5 col-md-5 right">
                            <a data-toggle="modal" data-target="#gameAdd" href="#" class="btn btn-success" title="">Upload Game File</a>
                            <input id="game_file" type="hidden" value="empty"> 
                        </div>
                    </div>
                </div>
                <div class="address">
                    <div class="form-group">
                        <label class="col-sm-2 col-md-2 control-label">Width * Height
                            <span class="help" data-toggle="tooltip" title="Game frame size">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </label>
                        <div class="col-sm-5 col-md-4">
                            <input type="text" class="form-control" placeholder="Width" maxlength="10" id="width" name="width" />
                        </div>
                        <div class="col-sm-5 col-md-4 right">
                            <input type="text" class="form-control" placeholder="Height" maxlength="10" id="height" name="height" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Select Category</label>
                    <div class="col-sm-10 col-md-8">
                        <?php echo $this->Form->input('category_id', array('label' => '', 'class' => 'form-control col-sm-10', 'default' => '18', array('id' => 'category'))); ?>


                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Game tags</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="hidden" id="tags" style="width:100%" value="War, Race, Fight" name="tags" />
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="fullscreen" name="send_marketing" /> Full Screen
                                <span class="help" data-toggle="tooltip" title="Game shows in full screen.">
                                    <i class="fa fa-question-circle"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="mobile" name="send_marketing" /> Mobile Ready
                                <span class="help" data-toggle="tooltip" title="Suitable for mobile.">
                                    <i class="fa fa-question-circle"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="installable" class="installable" name="send_marketing" /> Installable
                                <span class="help" data-toggle="tooltip" title="Users install this game on app stores.">
                                    <i class="fa fa-question-circle"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="app_details" style='<?php
                if ($game['Game']['install']) {
                    echo 'display:block';
                } else {
                    echo 'display:none';
                }
                ?>'>
                    <div class="address">
                        <div class="form-group">
                            <label class="col-sm-2 col-md-2 control-label">Google Play link
                                <span class="help" data-toggle="tooltip" title="Link for your app on google play store.">
                                    <i class="fa fa-question-circle"></i>
                                </span>
                            </label>
                            <div class="col-sm-5 col-md-4">
                                <input type="text" class="form-control" id="gplay_link" placeholder="" name="gplay_link" value="<?php echo $android; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="address">
                        <div class="form-group">
                            <label class="col-sm-2 col-md-2 control-label">App Store link
                                <span class="help" data-toggle="tooltip" title="Link for your app on ios app store.">
                                    <i class="fa fa-question-circle"></i>
                                </span>
                            </label>
                            <div class="col-sm-5 col-md-4">
                                <input type="text" class="form-control" id="appstore_link" placeholder="" name="appstore_link" value="<?php echo $ios; ?>" />
                            </div>
                        </div>
                    </div>
                </div> 


<!--
                <div class="form-group">
                    <input type="hidden" name="attr" id="attr" value="game_add" />
                    <input type="hidden" name="new_data" id="new_data" value="1" />
                </div>
                <div class="form-group form-actions">
                    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                        <button id="NewButton" class="btn btn-success">Upload Game</button>
                    </div>
                </div>
-->
<div class="form-group form-actions">
                    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                        <button id="NewButton1" class="NewButtonGame btn btn-success">Save And Publish</button>
                        <button id="NewButton2" class="NewButtonGame btn btn-warning">Save As Draft</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Game Image Change Modal begins -->
<div class="modal fade" id="gameChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
    <div class="modal-dialog" style="width:800px;">
        <div>
            <?php
            $url = $this->Html->url(array('controller' => 'uploads', 'action' => 'images', 'new_game', $user['User']['id']));
            ?>
            <iframe id='gameframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
        </div>
    </div>
</div>
<!-- Game Image Change Modal ends -->      

<!-- Game Add Modal begins -->
<div class="modal fade" id="gameAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
    <div class="modal-dialog" style="width:800px;">
        <div>
            <?php
            $url = $this->Html->url(array('controller' => 'uploads', 'action' => 'games', 'game_upload', $user['User']['id']));
            ?>
            <iframe id='gameaddframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
        </div>
    </div>
</div>
<!-- Game Add Modal ends -->   

</body>