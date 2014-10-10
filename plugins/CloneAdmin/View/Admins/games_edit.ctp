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
                <strong>Edit - <?php echo $data['Game']['name']; ?></strong>
            </small>
        </div>
    </div>
    <div class="content-wrapper">
        <form id="games_edit" class="form-horizontal" method="post" role="form">
            <input type="hidden" id="id" value="<?php echo $data['Game']['id'] ?>"> 
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label">
                    Picture
                    <span class="help" data-toggle="tooltip" title="Display game picture">
                        <i class="fa fa-question-circle"></i>
                    </span>
                </label>
                <div class="col-sm-10 col-md-8">
                    <div class="well">
                        <div class="pic">
                            <?php
                            if ($data['Game']['picture'] != NULL && $data['Game']['picture'] != '') {
                                $bg_message = "Image selected.";
                                $bg_exist = 1;
                                echo $this->Upload->image($data, 'Game.picture', array('style' => 'toorksize'), array('alt' => $data['Game']['name'], 'id' => 'game_image', 'data-src' => 'current', 'style' => 'width:215px;height:118px;', 'onerror' => 'imgError(this,"toorksize");'));
                            } else {
                                $bg_message = "No image chosen.";
                                $bg_exist = 0;
                                ?>
                                <img id='game_image' data-src='empty' src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" class="img-responsive" />
                                <?php
                            }
                            ?>
                        </div>
                        <div class="control-group" style="margin-bottom:5px;">
                            <label for="post_featured_image" style='display: block;'>
                                Choose a picture:
                            </label>
                            <a data-toggle="modal" data-target="#gameChange"  href="#" class="btn btn-xs btn-default"><span class="fa fa-picture-o"></span> Choose File</a><span id='bg_message' style='margin-left:6px;'><?php echo $bg_message; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label">
                    Name
                    <span class="help" data-toggle="tooltip" title="Game name">
                        <i class="fa fa-question-circle"></i>
                    </span>
                </label>
                <div class="col-sm-10 col-md-8">
                    <input type="text" class="form-control" id="name" name="name" maxlength="45" value="<?php echo $data['Game']['name']; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label">
                    Description
                    <span class="help" data-toggle="tooltip" title="Game description">
                        <i class="fa fa-question-circle"></i>
                    </span>
                </label>
                <div class="col-sm-10 col-md-8">
                    <textarea id="description" class="form-control" rows="4" maxlength="500" name="description" style="margin-bottom: 10px; height:100px;"><?php echo $data['Game']['description']; ?></textarea>
                </div>
            </div>
            <div class="address">
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label">
                        Game link
                        <span class="help" data-toggle="tooltip" title="Game upload link">
                            <i class="fa fa-question-circle"></i>
                        </span>
                    </label>
                    <div class="col-sm-5 col-md-4">
                        <input type="text" class="form-control" id="link" maxlength="200" placeholder="Ex:http://socialesman.com" name="link" value="<?php echo $data['Game']['link']; ?>" <?php
                        if ($data['Game']['install']) {
                            echo 'disabled="disabled"';
                        }
                        ?> />
                    </div>
                    <div class="col-sm-5 col-md-5 right">
                        <a data-toggle="modal" data-target="#gameAdd" href="#" class="btn btn-success" title="">Upload Game File</a>
                        <input id="game_file" type="hidden" value="empty"> 
                    </div>
                </div>
            </div>
            <div class="address">
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label">
                        Width * Height
                        <span class="help" data-toggle="tooltip" title="Game frame size">
                            <i class="fa fa-question-circle"></i>
                        </span>
                    </label>
                    <div class="col-sm-5 col-md-4">
                        <input type="text" class="form-control" placeholder="Width" maxlength="10" id="width" name="width" value="<?php echo $data['Game']['width']; ?>" />
                    </div>
                    <div class="col-sm-5 col-md-4 right">
                        <input type="text" class="form-control" placeholder="Height" maxlength="10" id="height" name="height" value="<?php echo $data['Game']['height']; ?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">
                    Category
                </label>
                <div class="col-sm-10 col-md-8">
                    <select id="category_id" category="category" class="form-control col-sm-10" name="category_id">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category['Category']['id']; ?>" <?php if ($category['Category']['id'] == $data['Game']['category_id']) echo 'selected'; ?>><?php echo $category['Category']['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">
                    Game tags
                </label>
                <div class="col-sm-10 col-md-8">
                    <input type="hidden" id="tags" style="width:100%" value="War, Race, Fight" name="tags" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label">
                    Priority
                    <span class="help" data-toggle="tooltip" title="Game priority">
                        <i class="fa fa-question-circle"></i>
                    </span>
                </label>
                <div class="col-sm-10 col-md-8">
                    <?php
                    if (is_null($data['Game']['priority'])) {
                        $data['Game']['priority'] = 0;
                    }
                    ?>
                    <input type="text" class="form-control" id="priority" name="priority" maxlength="45" value="<?php echo $data['Game']['priority']; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">
                    Owner
                </label>
                <div class="col-sm-10 col-md-8">
                    <input type="text" class="form-control" id="user_id" name="user_id" maxlength="45" value="<?php echo $data['Game']['user_id']; ?>" />
                </div>
            </div>
            <!--
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="active" name="active" <?php
                            if ($data['Game']['active']) {
                                echo 'checked';
                            }
                            ?> />
                            Active
                            <span class="help" data-toggle="tooltip" title="Game status">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="fullscreen" name="fullscreen" <?php
                            if ($data['Game']['fullscreen']) {
                                echo 'checked';
                            }
                            ?> />
                            Full Screen
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
                            <input type="checkbox" id="mobileready" name="mobileready" <?php
                            if ($data['Game']['mobileready']) {
                                echo 'checked';
                            }
                            ?> />
                            Mobile Ready
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
                            <input type="checkbox" id="installable" class="installable" name="install" <?php
                            if ($data['Game']['install']) {
                                echo 'checked';
                            }
                            ?> />
                            Installable
                            <span class="help" data-toggle="tooltip" title="Users install this game on app stores.">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="app_details" style='<?php
            if ($data['Game']['install']) {
                echo 'display:block';
            } else {
                echo 'display:none';
            }
            ?>'>
                <div class="address">
                    <div class="form-group">
                        <label class="col-sm-2 col-md-2 control-label">
                            Google Play link
                            <span class="help" data-toggle="tooltip" title="Link for your app on google play store.">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </label>
                        <div class="col-sm-5 col-md-4">
                            <input type="text" class="form-control" id="gplay_link" placeholder="" name="gplay_link" value="<?php if (isset($and)) echo $and; ?>" />
                        </div>
                    </div>
                </div>
                <div class="address">
                    <div class="form-group">
                        <label class="col-sm-2 col-md-2 control-label">
                            App Store link
                            <span class="help" data-toggle="tooltip" title="Link for your app on ios app store.">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </label>
                        <div class="col-sm-5 col-md-4">
                            <input type="text" class="form-control" id="appstore_link" placeholder="" name="appstore_link" value="<?php if (isset($ios)) echo $ios; ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                    <a data-toggle="modal" data-target="#confirm-modal" onclick="return false;" style="text-decoration:none;" href="#" ><i style="color: grey;" class="fa fa-trash-o"></i> <span style='color:red;'>Delete this game!</span></a>
                </div>
            </div>
            -->
            <div class="form-group form-actions">
                <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                    <button id="button_1" class="btn btn-success games_edit">Save And Publish</button>
                    <button id="button_2" class="btn btn-warning games_edit">Save As Draft</button>
                    <a data-toggle="modal" data-target="#confirm-modal" onclick="return false;" id="NewButton" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Game Image Change Modal begins -->
<div class="modal fade" id="gameChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
    <div class="modal-dialog" style="width:800px;">
        <div>
            <iframe id='gameframe' src="<?php echo $this->Html->url(array('plugin'=>false,'controller' => 'uploads', 'action' => 'images', 'new_game', $user['User']['id'])); ?>" style='width:800px; height:450px; overflow-y: hidden;' scrolling="no"></iframe>
        </div>
    </div>
</div>
<!-- Game Image Change Modal ends -->  