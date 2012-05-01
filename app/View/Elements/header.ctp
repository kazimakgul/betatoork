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
      			<form action="<?php echo $actionlink; ?>/" method="get">
      				<input id="txt_search" class="search_text" type="text" placeholder="search a game ..." name="search_keyword" />
      				<input class="search_button" type="button" value=""   />
      			</form>
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
      				<a href="<?php echo $mostplayed ?>"></a>
      				<a href="<?php echo $toprated ?>"></a>
      				<?php if($this->Session->check('Auth.User')){?>
                  <a href="#"></a>
               <?php }else{?>
                   <a class="unauth" href="#" data-bind="click: function() { $('#register').lightbox_me(); }"></a>
               <?php } ?>

              <?php if($this->Session->check('Auth.User')){?>
                  <a href="<?php echo $channel ?>"></a>
               <?php }else{?>
                   <a class="unauth" href="#" data-bind="click: function() { $('#register').lightbox_me(); }"></a>
               <?php } ?>

      			</div>
      		</div>
  	    </td>
  	    <!--if user authenticated -->

              <?php  if($this->Session->check('Auth.User')){ ?>
                  <td width="59" style="padding-left:15px;">
                  <?php $logouturl=$this->Html->url(array("controller" => "users","action" =>"logout")); ?>
                    <a class="logout_btn" href="<?php echo $logouturl?>"></a>
                  </td>
               <?php } ?>
  	  
  	    <!--end if-->
  	  </tr>
	  </table>
	</div>
</div>
