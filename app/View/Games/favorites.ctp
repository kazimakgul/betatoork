<?php $toprated=$this->Html->url(array("controller" => "games","action" =>"toprated2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<div class="raw-fluid span12">
<div class="well well-small span5">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4>Get more favorite games</h4>
  <p>When ever you find a game you like just hit favorite to add it on your favorite list down here.</p>
  <p>
    <a href="<?php echo $toprated; ?>" class="btn btn-danger">
      <i class="elusive-compass"></i> Find Games
    </a>
  </p>
</div>

<div class="alert alert-info span7">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4><i class="elusive-info-sign"></i> Tips and Tricks</h4>
  <p>Favorites are easy to find games.</p>
  <p>Collect the games you love.</p>
  <p>Easy to remove favorite games.</p>
  <p>Follow the game owner if you like the game.</p>

</div>
</div>


<ul class="thumbnails">

<?php  echo $this->element('NewPanel/myfavorite_box'); ?>

</ul>



                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->