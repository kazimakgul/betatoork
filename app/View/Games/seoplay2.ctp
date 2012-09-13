

<div class="content clearfix">
  <div class="channel_left_panel">
      <?php  echo $this->element('logged_user_panel'); ?>
      <?php  echo $this->element('subscribe'); ?>
      <?php  echo $this->element('social'); ?>
      <?php  echo $this->element('best_channels_left_menu'); ?>
      <?php  echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="right_panel">

        <div class="greyback">
            <div class="whiteback">
                <div align="center"><?php echo $game['User']['adcode'] ?></div>
                <div class="gamedesc">
                    <p><?php echo $game['Game']['name'] ?></p>
                    <div class="sep"></div>
                    <span><?php echo $game['Game']['description'] ?></span>
                </div>
                <div class="game" align="center"><?php echo $game['Game']['embed'] ?></div>
                <div class="gameinfo clearfix">

  
                      <div class="butonset">

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fae5d796f1a9f13"></script>
<!-- AddThis Button END -->


                        
<!--                         <a href="#" class="favorite" data-bind="visible: user.logged_in(), click: viewModel.game.favorite, css: { favorited: viewModel.game.like() }"></a>
                        <a href="#" class="fullscreen"></a>
                        <a href="#" class="flag" data-bind="css: { flaged: viewModel.game.malicious() }, click: viewModel.game.toggleMalicious"></a> -->
                      </div>
                   
                </div>
                <div align="center"><?php echo $game['User']['adcode'] ?></div>
                <div class="fbcomment" align="center"></br>
                    <?php echo $this->Facebook->comments(array('width'=>750)); ?>
                </div>
            </div>
        </div>
    

	
	
  </div>
</div>