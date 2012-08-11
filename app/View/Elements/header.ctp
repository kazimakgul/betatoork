<?php $suburl2=$this->Html->url(array("controller" => "subscriptions","action" =>"add_subscription")); ?>
<script type="text/javascript">
function changechain(userid,obj)
{
	if (obj.hasClass('subcardchain')) {
		obj.removeClass('subcardchain').addClass('subcardchained');
		$.get("<?php echo $suburl2; ?>/"+userid,function(data) {});
	}else {
		obj.removeClass('subcardchained').addClass('subcardchain');
		$.get("<?php echo $suburl2; ?>/"+userid,function(data) {});
	}
}
</script>
<div class="header">
	<div class="hd_container">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
  	    <td>
          <div class="logo" align="center">
          <?php echo $this->Html->link( $this->Html->image("t_lg.png", array("alt" => "toork logo")),"/", array('escape' => false));?>
		   <?php $actionlink=$this->Html->url(array( "controller" => "games","action" =>"search"));?>
          </div>
        </td>
  	    <td width="420" style="padding-left:10px;">
  	      <div class="search clearfix">
      			
      				<input id="txt_search" class="search_text" type="text" placeholder="search a game ..." name="search_keyword" />
      				<input class="search_button" type="button" value=""   />
      			
      		</div>
  	    </td>
  	    <td width="441" style="padding-left:18px;">
  	      <div class="menu">
      			<div class="menu_container">
      				<div class="pointer">
      					<div class="menu_up"></div>
      				</div>
              <?php $mostplayed=$this->Html->url(array("controller" => "games","action" =>"mostplayed")); ?>
              <?php $toprated=$this->Html->url(array("controller" => "games","action" =>"toprated")); ?>
              <?php $channel=$this->Html->url(array("controller" => "games","action" =>"channel")); ?>
              <?php $wall=$this->Html->url(array("controller" => "Wallentries","action" =>"wall")); ?>
      				<a href="<?php echo $mostplayed ?>"></a>
      				<a href="<?php echo $toprated ?>"></a>
      				<?php if($this->Session->check('Auth.User')){?>
              <a href="<?php echo $wall ?>"></a>
               <?php }else{?>
                   <a class="unauth" href="#"></a>
               <?php } ?>

              <?php if($this->Session->check('Auth.User')){?>
                  <a href="<?php echo $channel ?>"></a>
               <?php }else{?>
                   <a class="unauth" href="#"></a>
               <?php } ?>

      			</div>
      		</div>
  	    </td>
  	    <!--if user authenticated -->

              <?php  if($this->Session->check('Auth.User')){ ?>
                  <td width="59" style="padding-left:15px;">
                  <?php $logouturl=$this->Html->url(array("controller" => "users","action" =>"logout")); ?>
                    <a class="login_btn" href="<?php echo $logouturl?>" onclick="logoutFB();"></a>
                  </td>
               <?php } else {?>
                  <td width="59" style="padding-left:15px;">
                    <a class="logout_btn" href="#"></a>
                  </td>

               <?php } ?>
  	  
  	    <!--end if-->
  	  </tr>
	  </table>
	</div>
</div>

<script>
remotecheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkUser')); ?>';
</script>
