                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body">

<!-- Add Unit -->
<div class="well">
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
<div class="well">
<div align="center" style="max-height:110px; overflow:hidden;">

<?php echo $game['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->


<!-- Comment Unit -->
<div class="well well-large">
<h1>Comment Unit</h1>
</div>
<!-- /Comment Unit -->


                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->