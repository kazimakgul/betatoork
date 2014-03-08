<?php
	foreach ($users as $user): ?>

<?php 
$adminedit=$this->Html->url(array("controller" => "admins","action" =>"adminedit",$user['User']['id']));
$profilepublic=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>''));
?>

<div class="media well shadow-blue" style="background-color:white;">
                                                      <a class="pull-left" href="<?php echo $profilepublic; ?>">
                                                       
  <?php 
  if($user['User']['picture']==null) { ?>
    <img src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_manchannelavatar_default.png" class="img-polaroid" width="30" onerror="imgError(this,&quot;avatar&quot;);" alt="">   
  <?php  } else {
      echo $this->Upload->image($user,'User.picture',array(),array('class'=>'img-polaroid','align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'30','onerror'=>'imgError(this,"avatar");')); }
  ?>
                                                       </a>


<h4 class="media-heading">
	<a href="<?php echo $profilepublic; ?>"><?php echo h($user['User']['username']); ?></a>
	<small class="pull-right helper-font-small">
		Created: <?php echo h($user['User']['created']); ?>
	</small>
	<small class="pull-right helper-font-small">
		Last Login: <?php echo h($user['User']['last_login']); ?>
	</small>
</h4>


<p class="pull-right">
<a href="#" class="btn btn-mini detailopen" id="<?php echo h($user['User']['id']); ?>"><i class="elusive-edit"></i> Quick Edit</a>
<a href="<?php echo $adminedit; ?>" class="btn btn-mini"><i class="elusive-edit"></i> Edit</a>
<a href="#" class="btn btn-mini commentopen" id="<?php echo $random2 = rand(); ?>"><i class="elusive-user"></i> Role</a>
</p>
                                                            

<p style="margin-left:50px;">

  	<?php 
  		if($user['User']['role']==1) { 
  			$result= "<p class='label label-important'>Admin</p>";
  		}else if($user['User']['role']==2) {
  			$result= "<p class='label label-info'>Manager</p>";
  		}else{
  			$result= "<p class='label'>User</p>";
  		}
  		echo $result; 
  	?>
  	
</p>
                                                                                                                        
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