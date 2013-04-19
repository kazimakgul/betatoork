<?php
$mygames=$this->Html->url(array("controller" => "games","action" =>"mygames"));
$profilepublic=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>'go'));
?>

                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

                <div class="error-page" style="margin:-60px 0px 0px 0px;">
                    <h1 class="error-code color-blue" style="margin:0px 0px -30px 0px;">Add Game</h1>
                    <p class="error-description">The game you add will appear in <a href="<?php echo $mygames;?>">"My Games"</a> and your <a href="<?php echo $profilepublic;?>">"Public Channel"</a></p>
                    <form>
                        <div class="control-group">
                            <div class="input-append input-icon-prepend">
                                <div class="add-on">
                                    <a title="search" style="" class="icon"><i class="icofont-plus"></i></a>
                                    <input class="input-xxlarge animated grd-white" onfocus type="text" placeholder="where is the game? Type the link of the website!">
                                </div>
                                <input type="submit" class="btn btn-danger" value="Grab the game!">
                            </div>
                            <p><small>Simply copy/paste the url from the browser where you play the game.  <strong>Ex: http://phoboslab.org/ztype/</strong></small></p>
                        </div>
                    </form>
      
                    <div class="alert alert-block alert-info fadein">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p><h4 class="alert-heading">The Benefits of Adding a Game</h4></p>
                        
                        <p><i class="elusive-ok-sign"></i> Play the game at your own game channel anymore.</p>
                        <p><i class="elusive-ok-sign"></i> Don't have to go to any other website to play games anymore.</p>
                        <p><i class="elusive-ok-sign"></i> Invite your friends to play the game at your channel.</p> 
                        <p><i class="elusive-ok-sign"></i> Collect the games you love form all around the web.</p>
                        <p><i class="elusive-ok-sign"></i> Your game will be available via Toork or any other search engines.</p>
                        <p><i class="elusive-ok-sign"></i> One Source for your online game activity.</p>
                        <p><i class="elusive-ok-sign"></i> It is totally yours!</p>
                        
                    </div>

                </div>


                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <ul class="nav nav-pills">
                                                <!--tab action-->
                                                <li class="dropdown pull-right">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icofont-cogs"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#collapse" data-toggle="tab">@collapse</a></li>
                                                        <li><a href="#close" data-toggle="tab">@close</a></li>
                                                        <li><a href="#other" data-toggle="tab">@other action</a></li>
                                                    </ul>
                                                </li><!--/tab action-->
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#boxtabpill-1">Add Game</a></li>
                                                <li><a data-toggle="tab" href="#boxtabpill-2">My Games</a></li>
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="boxtabpill-1">

                                        <div class="span12">
                                            <!--box-->
                                            <div class="box corner-all">
                                                <!--box header-->
                                                <div class="box-header grd-white color-silver-dark corner-top">
                                                    <div class="header-control">
                                                        <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                        <a data-box="close">×</a>
                                                    </div>
                                                    <span>Game Details</span>
                                                </div><!--/box header-->
                                                <!--box body-->
                                                <div class="box-body">
                                                    <!--element-->
<?php echo $this->Form->create('Game', array('label'=>false ,'id'=>'addgameform','class'=>'form-horizontal' ,'type' => 'file'));?>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Name</label>
                                                            <div class="controls">
<?php echo $this->Form->input('name',array('label'=>false ,'maxlength'=>28,'required','type'=>'text','class'=>'grd-white','id'=>'inputAuto','placeholder' => 'Metal Slug Brutal 3')); ?>     
                                                            </div>
                                                        </div>

<?php if ($this->Session->read('Auth.User.role') == 0){?>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Link</label>
                                                            <div class="controls">
<?php echo $this->Form->input('link',array('label'=>false ,'div'=>false,'required pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'url','class'=>'grd-white', 'maxlength'=>200)); ?>
                                                            </div>
                                                        </div>
<?php  } else{?>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Link</label>
                                                            <div class="controls">
<?php echo $this->Form->input('link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'url','class'=>'grd-white', 'maxlength'=>200)); ?>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Embed</label>
                                                            <div class="controls">
<?php echo $this->Form->input('embed',array('label'=>false ,'div'=>false, 'pattern'=>'(<iframe|<embed|<object).+.(</iframe>|</embed>|</object>)' ,'placeholder' => 'Paste your game code here please','maxlength'=>1000, 'title'=>'Only <embed> , <iframe> and <object> tags are available and the game code must be starting from one of the tags and ending with the same tag. Ex: <embed> some code </embed>')); ?> 
                                                            </div>
                                                        </div>
<?php } ?>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Description</label>
                                                            <div class="controls">
<?php  echo $this->Form->input('description',array('label'=>false,'div'=>false,'maxlength'=>400,'required','placeholder' => 'Describe the game you share please','type' => 'textarea')); ?>  
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Category</label>
                                                            <div class="controls">
 <?php echo $this->Form->input('category_id',array('label'=>'Select Category:' )); ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputUpload">Game Picture</label>
                                                            <div class="controls">
                                                                <div >
                                                                    <input data-form="uniform" id="inputUpload" required type="file" name="data[Game][picture]" accept="image/gif,image/jpg,image/png,image/jpeg" size="150">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputUpload">Are You Hero?</label>
                                                            <div class="controls">
                                                                <div>
<?php
      echo $this->Recaptcha->show(array(
        'theme' => 'white',
        'lang' => 'en',));
      echo $this->Recaptcha->error();
?>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                           
                                                      

                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                            <button type="button" class="btn">Cancel</button>
                                                        </div>
                                                    </form>
                                                    <!--/element-->
                                                </div><!--/box body-->
                                            </div><!--/box-->
                                        </div>

                                                </div>
                                                <div class="tab-pane fade" id="boxtabpill-2">
                                                   <form class="form-horizontal" id="form-validate" novalidate="novalidate">
                                                        <fieldset>
<div class="well">
    <h1>Your Games Will come here</h1>
</div>
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div>
                                    </div>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->