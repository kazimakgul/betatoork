<?php 
$addgame=$this->Html->url(array("controller" => "games","action" =>"add2"));
$toprated=$this->Html->url(array("controller" => "games","action" =>"toprated2"));
$index=$this->Html->url(array("controller" => "games","action" =>"index"));
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                         
                        <!-- content-body -->
                        <div class="content-body" style="background-color:#e5e5e5; padding-top:15px;">


                  <?php if(count($search) >= 1){ ?>
<ul class="thumbnails" id="thumbnails_area">
<?php  echo $this->element('NewPanel/gamebox/search_game_box'); ?>
</ul>

<div style="margin-bottom:50px;">
<a id="loadmoregame" class="offset3 span6 btn btn-block" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More</a>
</div>	
                  <?php }else{ ?>
				  

<?php
if($this->Session->check('Auth.User')){
?>

                  <div class="alert alert-info channel"><p><strong>The game you are searching is not added yet, you can add this game after you become a member or Search our custom Toork search engine powered by Google to find your loved games...</strong></p></br>


                    <a href="<?php echo $addgame ?>" class="btn btn-danger"><i class="elusive-plus-sign"></i> Add Game</a>
                    <a href="<?php echo $toprated; ?>" class="btn btn-info"><i class="elusive-compass"></i> Explore Games</a>


                </div>

<?php
}else{
?>

                  <div class="alert alert-info">
                    <p>
                        <strong><i class="elusive-search"></i> The game you are searching is not added yet, you can add this game after you become a member or Search our custom Toork search engine powered by Google to find your loved games...
                        </strong>
                    </p>
                </div>

            <div class="alert alert-info">
                <div class="box-header corner-top">
                <div class="header-control">
                <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
                </div>
                
            </div>
              <h4>Join Toork For Free</h4>
              <p>If you join Toork, you will be able to create your own game channel and let people play games you share on your channel. See the benefits below.</p>
                <ul>
                    <li>Create your own game channel</li>
                    <li>Your special dashboard that knows what you want</li>
                    <li>Collect the games you love</li>
                    <li>Add new games</li>
                    <li>Follow other channels</li>
                    <li>All you need for online games</li>
                </ul>
              <p>
                <a href="<?php echo $index ?>" class="btn btn-danger">
                  <i class="elusive-user"></i> Join Toork
                </a> or 
                <a href="<?php echo $toprated; ?>" class="btn btn-info"><i class="elusive-compass"></i> Explore Games</a>
              </p>
            </div>


<?php
}
?>

                <?php }?>

<?php echo $this->element('googleSearch'); ?>

<!--Hidden Pagination -->
	<div class="paging" style="display:none;">
     <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
     echo $this->Paginator->numbers();
     echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
    </div>
<!--Hidden Pagination -->


                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->