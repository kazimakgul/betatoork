<?php $toprated=$this->Html->url(array("controller" => "games","action" =>"toprated2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<div class="raw-fluid span12">
<div class="well well-small span6">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4>Get more favorite games</h4>
  <p>When ever you find a game you like just hit favorite to add it on your favorite list down here. You have to go to the page where you play the game to see the favorite button.</p>
  <p>
    <a href="<?php echo $toprated; ?>" class="btn btn-danger">
      <i class="elusive-compass"></i> Find Games
    </a>
  </p>
</div>

<div class="alert alert-info span6">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4 style="margin:0px 0px 10px 0px;"><i class="elusive-info-sign"></i> Tips and Tricks</h4>
  <p><i class="elusive-ok-sign"></i> Favorites are easy to find games.</p>
  <p><i class="elusive-ok-sign"></i> Collect the games you love.</p>
  <p><i class="elusive-ok-sign"></i> Easy to remove favorite games.</p>
  <p><i class="elusive-ok-sign"></i> Follow the game owner if you like the game.</p>

</div>
</div>


<ul class="thumbnails">
<?php  echo $this->element('NewPanel/gamebox/myfavorite_box'); ?>
</ul>

    <!--Hidden Pagination -->
    <div class="pagination pagination-centered">
        <ul>
            <li><?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  '.$this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));?></li>
        </ul>
    </div>
    <!--Hidden Pagination -->


                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->