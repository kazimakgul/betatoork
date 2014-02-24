
<div class="span11">
<div class="content">
<div class="content-body" style="padding-top:15px;">


<?php 
echo $this->element('NewPanel/admin/adminNavbar');
?>


	<?php
	foreach ($users as $user): ?>

<div class="media well shadow" style="background-color:white;">
                                                      <a class="pull-left" href="/betatoorkson/hoaltan">
                                                       
  <?php 
  if($user['User']['picture']==null) { ?>
    <img src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_manchannelavatar_default.png" class="img-polaroid" width="30" onerror="imgError(this,&quot;avatar&quot;);" alt="">   
  <?php  } else {
      echo $this->Upload->image($user,'User.picture',array(),array('class'=>'img-polaroid','align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'30','onerror'=>'imgError(this,"avatar");')); }
  ?>
                                                       </a>


<h4 class="media-heading"><a href="/betatoorkson/hoaltan"><?php echo h($user['User']['username']); ?> </a><small class="pull-right helper-font-small"><?php echo h($user['User']['created']); ?></small></h4><p class="pull-right">
<a href="#" class="btn btn-mini detailopen" id="<?php echo h($user['User']['id']); ?>"><i class="elusive-edit"></i> Edit</a>
<a href="#" class="btn btn-mini commentopen" id="<?php echo $random2 = rand(); ?>"><i class="elusive-user"></i> Role</a>
</p>
                                                            

<p style="margin-left:50px;"><span class="bold btn-link"><a href="/betatoorkson/hoaltan"><i class="elusive-star"></i> <?php echo h($user['User']['username']); ?></a></span></p>
                                                                                                                        
<hr size="1">
                                                        
<div id="hidePost" style="margin-bottom:-45px;">                            																

<!-- Comment area begins -->	
<div style="background-color:#f5f5f5; padding:0px 20px 30px 20px; margin:-20px;">				
			  	
																		
			<div class="row-fluid commentupdate clearfix" style="margin-top: 10px; display:none" id="detailbox<?php echo h($user['User']['id']); ?>">
				<div class="span11"> </div>
			</div>
			<div class="row-fluid commentupdate clearfix" style="margin-top: 10px; display:none" id="commentbox<?php echo $random2; ?>">
				<div class="span11">
					<?php echo h($user['User']['role']); ?>
			   </div>
			</div>


</div>			

														
             </div>
          </div>
												
			<?php endforeach; ?>									
			
    <div class="pagination pagination-centered">
        <ul>
            <li><?php echo $this->Paginator->prev(__('Prev', true), array(), null, array('class'=>'disabled'));?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  '.$this->Paginator->next(__('Next', true), array('id'=>'next'), null, array('class' => 'disabled'));?></li>
        </ul>
        <div style="opacity:0.5;">
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} Members out of {:count} total')));?>
        </div>
    </div>


	</div>
    </div>
</div>