<div class="header">
	<div class="hd_container">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
  	    <td><div class="logo" align="center"><a href="/"><?php echo $this->Html->image('t_lg.png')?></a></div></td>
  	    <td width="420" style="padding-left:10px;">
  	      <div class="search clearfix">
      			<form action="/game/search/" method="get">
      				<input id="txt_search" class="search_text" type="text" value="Keywords..." name="search_keyword" />
      				<input class="search_button" type="image" value="" name="search" src="/betatoork/img/t_search_btn.png" />
      			</form>
      		</div>
  	    </td>
  	    <td width="441" style="padding-left:18px;">
  	      <div class="menu">
      			<div class="menu_container">
      				<div class="pointer">
      					<div class="menu_up"></div>
      				</div>
      				<a href="/game/most_played/"></a>
      				<a href="/game/top_rated/"></a>
      				<a href="#" onclick="return false;"></a>
      				<!--if user loged in-->
      				<a href="userchannellink"></a>
      				<!--else-->
      				<a class="unauth" href="#" data-bind="click: function() { $('#register').lightbox_me(); }"></a>
      				<!--end if-->
      			</div>
      		</div>
  	    </td>
  	    <!--if user authenticated -->
  	    <td width="59" style="padding-left:15px;">
      		<a class="logout_btn" href="user/logout"></a>
  	    </td>
  	    <!--end if-->
  	  </tr>
	  </table>
	</div>
</div>
