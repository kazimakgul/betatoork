<?php
$index=$this->Html->url(array("controller" => "games","action" =>"index"));
$currentlink=$this->Html->url(array("controller" => "games","action" =>"featuredchannels"));
?>

                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
 
                        <!-- content-breadcrumb -->
                        <div class="content-breadcrumb">
                            <!--breadcrumb-nav-->
                            <ul class="breadcrumb-nav pull-right">
                                <li class="divider"></li>
                                <li class="btn-group">
                                    <a href="#" class="btn btn-small btn-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="icofont-tasks"></i> Sort
                                        <i class="icofont-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $currentlink;?>/sort:Userstat.potential/direction:desc">Recommend</a></li>
                                        <li><a href="<?php echo $currentlink;?>/sort:id/direction:desc">New Channels</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $currentlink;?>/sort:Userstat.subscribeto/direction:desc">Followers</a></li>
                                    </ul>
                                </li>

                            </ul><!--/breadcrumb-nav-->
                            
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="#"><i class="elusive-user"></i> Featured Channels</a></li>
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        
                        <!-- content-body -->
                        <div class="content-body" style="background-color:#e5e5e5; padding-top:15px;">




<ul class="thumbnails" id="thumbnails_area">
<?php  echo $this->element('NewPanel/featuredchannel_box'); ?>
</ul>


<div style="margin-bottom:30px;">
    <a id="loadmoregame" class="offset3 span6 btn btn-block" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More</a>
	<!--Hidden Pagination -->
	<div class="paging" style="display:none;">
     <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
     echo $this->Paginator->numbers();
     echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
    </div>
    <!--Hidden Pagination -->
</div>   


                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->