<?php
$mygames=$this->Html->url(array("controller" => "games","action" =>"mygames"));
$profilepublic=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>''));
?>

                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
    <?php if($isActive==0){ ?>
    <div class="alert alert-error span12">
                                    <div class="box-header corner-top">
                                            <div class="header-control">
                                            <button data-box="close" data-hide="fadeOut" class="close">×</button>
                                            </div>
                                            
                                    </div>
        <p> <i class="elusive-mail-alt helper-font-24"></i> Your account is not active yet. Please check your email account to activate your email address to be able to publish your own games.</p>
    </div>
<?php }else{}?>


                    <div style="background-color:white;" class="shadow alert alert-block fadein">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p><h5 class="alert-heading well">Drag this button: <a class="btn btn-danger" href="javascript:location.href='http://54.225.196.20/apis/addgame_ajax/'+decodeURIComponent(location.href)"><i class="elusive-plus-sign"></i> Clone Game</a> up to your Bookmarks Bar. </br>You can add any game from any website via this button.</h5></p>

                        <p><h6 class="alert-heading">Do you know what <a class="btn btn-success btn-mini"><i class="elusive-plus-sign"></i> Clone</a> is? </br>Its the easy way of adding a game to your channel.</h6></p>
                        
                        <p><i class="elusive-info-sign"></i> If you clone a game, a clone of the game will be created in your games section and you will be able to edit the game as you wish.</p>
                        <p><i class="elusive-info-sign"></i> While you are playing a game you will see the <a class="btn btn-success btn-mini"><i class="elusive-plus-sign"></i> Clone</a> clone button at the bottom of the page on the rating bar.</p>
                        
                    </div>


                <div class="error-page" style="margin:-60px 0px 0px 0px;">
                    <h1 class="error-code color-blue" style="margin:0px 0px -30px 0px;">Add Game</h1>
                    <p class="error-description">The game you add will appear in <a href="<?php echo $mygames;?>">"My Games"</a> and your <a href="<?php echo $profilepublic;?>">"Public Channel"</a></p>
                   <form>
                        <div class="control-group">
                            <div class="input-append input-icon-prepend">
                                <div class="add-on">
                                    <a title="search" style="" class="icon"><i class="icofont-plus"></i></a>
                                    <input id="urlarea" class="input-xxlarge animated grd-white" required pattern="(http|https)://.+" onfocus type="text" placeholder="where is the game? Type the link of the website!">
                                </div>
                                <input id="grabgame" onClick="_gaq.push(['_trackEvent', 'Games', 'Add']);" type="button" class="btn btn-danger" value="Grab the game!">
                            </div>
							<div id="grabloader" style="display:none;">
							<p><small><?php echo $this->Html->image("/img/loading.gif");?> </small></p>
							<p><small>Your game is processing... </small></p>
							</div>
                            <p><small>Simply copy/paste the url from the browser where you play the game.  <strong>Ex: http://phoboslab.org/ztype/</strong></small></p>
                        </div>
                    </form>
      
                    <div style="background-color:white;" class="shadow alert alert-block alert-info fadein">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p><h4 class="alert-heading">The Benefits of Adding a Game</h4></p>
                        
                        <p><i class="elusive-ok-sign"></i> Play the game at your own game channel anymore.</p>
                        <p><i class="elusive-ok-sign"></i> Don't have to go to any other website to play games anymore.</p>
                        <p><i class="elusive-ok-sign"></i> Invite your friends to play the game at your channel.</p> 
                        <p><i class="elusive-ok-sign"></i> Collect the games you love form all around the web.</p>
                        <p><i class="elusive-ok-sign"></i> Your game will be available via Clone or any other search engines.</p>
                        <p><i class="elusive-ok-sign"></i> One Source for your online game activity.</p>
                        <p><i class="elusive-ok-sign"></i> It is totally yours!</p>
                        
                    </div>

                </div>

                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->