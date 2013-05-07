<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
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
  <h5>Follow Channels</h5>
  <p>Following a channel means that you like the channel and you want to be more connected to the channel and games they have. You don't have to go to any other game site to see anything new anymore.</p>
  <p>
    <a href="<?php echo $bestchannel; ?>" class="btn btn-danger">
      <i class="elusive-plus-sign"></i> Follow Channels
    </a>
  </p>
</div>

<div class="alert alert-info span6">
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
	<div class="paging" style="width:100%; text-align:center;">
     <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')).'  '; 
     echo $this->Paginator->numbers();
     echo '  '.$this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
    </div>
    <!--Hidden Pagination -->


                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->