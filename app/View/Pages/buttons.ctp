       <?php if($this->Session->check('Auth.User')){
              $buttonlink= 'http://clone.gs/'.$this->Session->read('Auth.User.seo_username');
       }else{
              $buttonlink= 'http://clone.gs'; 
       }

$image1= $this->Html->image('socials/follow.png', array('alt' => 'country flag','style'=>'float:left; margin: 3px 10px 0 3px; text-align:center;', 'width'=>'130'));
$image2= $this->Html->image('socials/clone.png', array('alt' => 'country flag','style'=>'float:left; margin: 3px 10px 0 3px; text-align:center;', 'width'=>'85'));
$image3= $this->Html->image('socials/clonelogo.png', array('alt' => 'country flag','style'=>'float:left; margin: 3px 10px 0 3px; text-align:center;', 'width'=>'24'));
        ?>


                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">                      
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
                          
                          <div class="well">
                            <h3>Buttons for your website</h3>
                            <h5>Add buttons to your website to help your visitors share games from your site and connect with you on Clone.</h5></br>

<div class="menu shadow-black" style="background-color:silver;">
  <div class="accordion">
    <div class="accordion-group">
      <div class="accordion-heading country" style="margin:10px;">
        <?php echo $image1; ?>
        <a class="accordion-toggle" data-toggle="collapse" href="#country1"><i class="elusive-align-left"></i> Show Code
        <blockquote class="pull-right"><small>This button is a link to your channel directly</small></blockquote></a>

      </div>
      <div id="country1" class="accordion-body collapse">
        <div class="accordion-inner">
          <h5>Copy this button code into the HTML of your site.</h5>
          <p class="well color-red">&lt;a href="<?php echo $buttonlink;?>"&gt; <br>
            &lt;img width="130" src="http://clone.gs/img/socials/follow.png"/&gt;<br>
            &lt;/a&gt;</p>
        </div>
      </div>
      <div class="accordion-heading country" style="margin:10px;">
              <?php echo $image2; ?>
        <a class="accordion-toggle" data-toggle="collapse" href="#country2"><i class="elusive-align-left"></i> Show Code
        <blockquote class="pull-right"><small>This button is a link to your channel directly</small></blockquote></a>

      </div>
      <div id="country2" class="accordion-body collapse">
        <div class="accordion-inner">
          <h5>Copy this button code into the HTML of your site.</h5>
          <p class="well color-red">&lt;a href="<?php echo $buttonlink;?>"&gt; <br>
            &lt;img width="85" src="http://clone.gs/img/socials/clone.png"/&gt;<br>
            &lt;/a&gt;</p>
        </div>
      </div>
      <div class="accordion-heading country" style="margin:10px;">
              <?php echo $image3; ?>
        <a class="accordion-toggle" data-toggle="collapse" href="#country3"><i class="elusive-align-left"></i> Show Code
        <blockquote class="pull-right"><small>This button is a link to your channel directly</small></blockquote></a>
      </div>
      <div id="country3" class="accordion-body collapse">
        <div class="accordion-inner">
          <h5>Copy this button code into the HTML of your site.</h5>
          <p class="well color-red">&lt;a href="<?php echo $buttonlink;?>"&gt; <br>
            &lt;img width="24" src="http://clone.gs/img/socials/clonelogo.png"/&gt;<br>
            &lt;/a&gt;</p>
        </div>
      </div>


    </div>
  </div>
</div>
<div class="alert alert-info">
  <h5>You can change the size of the buttons using the width <span class="color-red">(width)</span> atribute in the button code</h5>
</div>

                      <p>
Clone is a social network about games, gamers, game bloggers, game developers and game sites. Clone is the right place to promote your games. Add one of our pre-build Clone social buttons to let your visitors reach your channel. Share good stuff , make them follow you and grow your community. Have fun.
                      </p>
                      


                        </div>

                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>                        
                    </div><!-- /content -->
                </div><!-- /span content -->