<?php
$profilepublic=$this->Html->url(array("controller" => "games","action" =>"profile",$game['User']['id'] ));
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<!-- Add Unit -->
<div class="well" style="padding:5px;">
<div align="center" style="max-height:110px; overflow:hidden;">

<?php echo $game['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->

<!-- Game Unit -->
<h6><?php echo $game['Game']['name'] ?> : <?php echo $game['Game']['description'] ?> </h6>
<div class="well well-large">

<div style="margin:0 auto; text-align: center; background-color:#fff; font-family:Verdana, Geneva, sans-serif; color:#000; font-size:14px;">

<!--<embed id="startGame" src="http://games.mochiads.com/c/g/fruit-ninja-kapow/fruit_indep.swf" menu="false" quality="high" width="900" height="600" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"> -->

<?php echo $game['Game']['embed'] ?>

</div>


</div>
<!-- /Game Unit -->
<?php  echo $this->element('NewPanel/ratebar',array('profilepublic'=>$profilepublic)); ?>

<div class="well well-small">
 
    <a class="btn btn-danger">
     <i class="icofont-heart"></i> Favorite
    </a> <div class="pull-right">
    <a class="btn btn-info">
        <div class="helper-font-16">
        <i class="icofont-facebook"> share</i>
        </div>
    </a>
    <a class="btn btn-danger">
        <div class="helper-font-16">
        <i class="icofont-pinterest"> share</i>
        </div>
    </a>
    <a class="btn btn-info">
        <div class="helper-font-16">
        <i class="icofont-twitter"> share</i>
        </div>
    </a>
    <a class="btn btn-danger">
        <div class="helper-font-16">
        <i class="icofont-google-plus"> share</i>
        </div>
    </a>
</div>
</div>

<!-- Add Unit -->
<div class="well" style="padding:5px;">
<div align="center" style="max-height:110px; overflow:hidden;">

<?php echo $game['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->

            <!--Comment box-->
            <div class="navbar">
              <div class="navbar-inner">
                </br>
                <form class="navbar-form ">
                    <textarea class="span12" rows="4"  placeholder="What do you think about this game?"></textarea>
                 </br>
                  <button type="submit" class="btn btn-info pull-left">Comment</button>
                </form></br>
              </div>
            </div>

<!-- Comment Unit -->

<div class="row-fluid">
                                <!-- tab resume update -->
                                <div class="span12">
                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a data-box="close" data-hide="rotateOutDownLeft">×</a>
                                            </div>
                                            <ul class="nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#recent-orders">Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
             
                                                <div class="tab-pane fade in active" id="recent-orders">

                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACtUlEQVR4Xu2Y20tqURDGPzMqrBCEBJXqJRPJFAUJvID4n3vJIm9QIAqJPgjii0KY2tXON6B4OKfAbbUfnHmRvXXNWvPN5YfL0u/3p1hjs6gAWgHaAjoD1ngGQoegUkApoBRQCigF1lgBxaBiUDGoGFQMrjEE9M+QYlAxqBhUDCoGFYNrrMDKGGw0Guh2u5hOp3C5XPD5fLBYLHNJ/1AGtVoNNpsN4XD4r+8+0/0nfH6210oC1Ot1dDodbG5uiv/X11ccHx/D6/XKM0XJZDLyfmtrC4lEAhsbG1/W20/4/GpDwwK8vb0hm81KRpPJJF5eXtBut7G/vw+PxyN73t/fyzvazs4O4vE4Hh8fcXt7C6vVikgkguFwCAa9vb2N8/Nz5PP5pX0uVtyy3WxYgOfnZzns+/u7BD2ZTKQFTk9P5Qzj8RiXl5c4OjrCw8MDRqORCMXDlstlDAYDOBwOWcfvWDVcb9TnsoHPfm9YAPZ2pVIRP2wBljmNQZydnaFYLEp2U6kUbm5u8PT0NBdgUTyusdvtiEajWMXnrwvADBcKBSndWCwmWby+vpZeDwaDKJVK2N3dxeHhIZrNplTKycmJPNNarZa8p11cXEgVrerTiAiGK4AZ5wxgb1OA2TMF8Pv9qFar/5yHAzCdToPzI5fLzavm4OAAoVBo7sOITyPBc41hATjhWQHMmtvtlk/2tdPpRCAQAMucxqDZDhSImWZwd3d36PV62Nvbk8phdXAAcq1Rn78uADfkALu6upKM0tgO7GUGuWhsDQpACnAgUpAZPSgEuc85MqPJsj5NocBigBx2NGb0u+wnfP7vbIZb4LsCNduPCqA3QnojpDdCeiNk9iQ2c3+lgFJAKaAUUAqYOYXN3lspoBRQCigFlAJmT2Iz91cKKAWUAkoBpYCZU9jsvZUC606BDwz4jZ+RGtXxAAAAAElFTkSuQmCC">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Lorem ipsum </a><small class="helper-font-small">by john doe on 22 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Approve</a>
                                                                <a href="#" class="btn btn-mini">Invoice</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACtUlEQVR4Xu2Y20tqURDGPzMqrBCEBJXqJRPJFAUJvID4n3vJIm9QIAqJPgjii0KY2tXON6B4OKfAbbUfnHmRvXXNWvPN5YfL0u/3p1hjs6gAWgHaAjoD1ngGQoegUkApoBRQCigF1lgBxaBiUDGoGFQMrjEE9M+QYlAxqBhUDCoGFYNrrMDKGGw0Guh2u5hOp3C5XPD5fLBYLHNJ/1AGtVoNNpsN4XD4r+8+0/0nfH6210oC1Ot1dDodbG5uiv/X11ccHx/D6/XKM0XJZDLyfmtrC4lEAhsbG1/W20/4/GpDwwK8vb0hm81KRpPJJF5eXtBut7G/vw+PxyN73t/fyzvazs4O4vE4Hh8fcXt7C6vVikgkguFwCAa9vb2N8/Nz5PP5pX0uVtyy3WxYgOfnZzns+/u7BD2ZTKQFTk9P5Qzj8RiXl5c4OjrCw8MDRqORCMXDlstlDAYDOBwOWcfvWDVcb9TnsoHPfm9YAPZ2pVIRP2wBljmNQZydnaFYLEp2U6kUbm5u8PT0NBdgUTyusdvtiEajWMXnrwvADBcKBSndWCwmWby+vpZeDwaDKJVK2N3dxeHhIZrNplTKycmJPNNarZa8p11cXEgVrerTiAiGK4AZ5wxgb1OA2TMF8Pv9qFar/5yHAzCdToPzI5fLzavm4OAAoVBo7sOITyPBc41hATjhWQHMmtvtlk/2tdPpRCAQAMucxqDZDhSImWZwd3d36PV62Nvbk8phdXAAcq1Rn78uADfkALu6upKM0tgO7GUGuWhsDQpACnAgUpAZPSgEuc85MqPJsj5NocBigBx2NGb0u+wnfP7vbIZb4LsCNduPCqA3QnojpDdCeiNk9iQ2c3+lgFJAKaAUUAqYOYXN3lspoBRQCigFlAJmT2Iz91cKKAWUAkoBpYCZU9jsvZUC606BDwz4jZ+RGtXxAAAAAElFTkSuQmCC">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Lorem ipsum </a><small class="helper-font-small">by jane smith on 18 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Approve</a>
                                                                <a href="#" class="btn btn-mini">Invoice</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACtUlEQVR4Xu2Y20tqURDGPzMqrBCEBJXqJRPJFAUJvID4n3vJIm9QIAqJPgjii0KY2tXON6B4OKfAbbUfnHmRvXXNWvPN5YfL0u/3p1hjs6gAWgHaAjoD1ngGQoegUkApoBRQCigF1lgBxaBiUDGoGFQMrjEE9M+QYlAxqBhUDCoGFYNrrMDKGGw0Guh2u5hOp3C5XPD5fLBYLHNJ/1AGtVoNNpsN4XD4r+8+0/0nfH6210oC1Ot1dDodbG5uiv/X11ccHx/D6/XKM0XJZDLyfmtrC4lEAhsbG1/W20/4/GpDwwK8vb0hm81KRpPJJF5eXtBut7G/vw+PxyN73t/fyzvazs4O4vE4Hh8fcXt7C6vVikgkguFwCAa9vb2N8/Nz5PP5pX0uVtyy3WxYgOfnZzns+/u7BD2ZTKQFTk9P5Qzj8RiXl5c4OjrCw8MDRqORCMXDlstlDAYDOBwOWcfvWDVcb9TnsoHPfm9YAPZ2pVIRP2wBljmNQZydnaFYLEp2U6kUbm5u8PT0NBdgUTyusdvtiEajWMXnrwvADBcKBSndWCwmWby+vpZeDwaDKJVK2N3dxeHhIZrNplTKycmJPNNarZa8p11cXEgVrerTiAiGK4AZ5wxgb1OA2TMF8Pv9qFar/5yHAzCdToPzI5fLzavm4OAAoVBo7sOITyPBc41hATjhWQHMmtvtlk/2tdPpRCAQAMucxqDZDhSImWZwd3d36PV62Nvbk8phdXAAcq1Rn78uADfkALu6upKM0tgO7GUGuWhsDQpACnAgUpAZPSgEuc85MqPJsj5NocBigBx2NGb0u+wnfP7vbIZb4LsCNduPCqA3QnojpDdCeiNk9iQ2c3+lgFJAKaAUUAqYOYXN3lspoBRQCigFlAJmT2Iz91cKKAWUAkoBpYCZU9jsvZUC606BDwz4jZ+RGtXxAAAAAElFTkSuQmCC">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Lorem ipsum </a><small class="helper-font-small">by john smith on 18 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Approve</a>
                                                                <a href="#" class="btn btn-mini">Invoice</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="btn btn-small btn-link pull-right">View all →</a>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div><!--/box-body-->
                                    </div><!--/box-tab-->
                                </div><!-- tab resume update -->
                            </div>

<!-- /Comment Unit -->


                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->



