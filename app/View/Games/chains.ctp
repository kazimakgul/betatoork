<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="background-color:#e5e5e5; padding-top:15px;">

<div class="raw-fluid span12">
<div style="background-color:white;" class="shadow well well-small span6">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h5>Follow Channels</h5>
  <p>Following a channel means that you like the channel and you want to be more connected to the channel and games they have. You don't have to go to any other game site to see anything new anymore.</p>
  <p>
    <a href="<?php echo $bestchannel; ?>" class="btn btn-danger">
      <i class="elusive-plus-sign"></i> Follow Channels
    </a>
  </p>
</div>

<div style="background-color:white;" class="shadow alert alert-info span6">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h5><i class="elusive-info-sign"></i> Tips and Tricks</h5>
  <p><i class="elusive-ok-sign"></i> Follow the channels you are interested about</p>
  <p><i class="elusive-ok-sign"></i> Your dashboard will be full of your interests.</p>
  <p><i class="elusive-ok-sign"></i> Channels will let you know first about the news they have.</p>
  <p><i class="elusive-ok-sign"></i> One game source to rule them all!</p>

</div>
</div>

<ul class="thumbnails">
<?php  echo $this->element('NewPanel/mychains_box'); ?>
</ul>


    <!--Hidden Pagination -->
    <div class="pagination pagination-centered">
        <ul>
            <li><?php echo $this->Paginator->prev(__('Prev', true), array(), null, array('class'=>'disabled'));?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  '.$this->Paginator->next(__('Next', true), array('id'=>'next'), null, array('class' => 'disabled'));?></li>
        </ul>
        <div style="opacity:0.5;">
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} channels out of {:count} total')));?>
        </div>
    </div>
    <!--Hidden Pagination -->


                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->