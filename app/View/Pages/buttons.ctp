       <?php if($this->Session->check('Auth.User')){
              $buttonlink=$this->Html->url(array( "controller" => $this->Session->read('Auth.User.seo_username'),"action" =>'')); 
       }else{
              $buttonlink=$this->Html->url(array( "controller" => 'games',"action" =>'index')); 
       }

$image1= $this->Html->image('socials/followontoork3.png', array('alt' => 'country flag','style'=>'float:left; margin: 3px 10px 0 3px; text-align:center;', 'width'=>'203'));
$image2= $this->Html->image('socials/Toork.png', array('alt' => 'country flag','style'=>'float:left; margin: 3px 10px 0 3px; text-align:center;', 'width'=>'137'));
$image3= $this->Html->image('socials/clone.png', array('alt' => 'country flag','style'=>'float:left; margin: 3px 10px 0 3px; text-align:center;', 'width'=>'203'));
$image4= $this->Html->image('socials/clone2.png', array('alt' => 'country flag','style'=>'float:left; margin: 3px 10px 0 3px; text-align:center;', 'width'=>'137'));
$image5= $this->Html->image('socials/button2.png', array('alt' => 'country flag','style'=>'float:left; margin: 3px 10px 0 3px; text-align:center;', 'width'=>'36'));
        ?>


                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">                      
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
                          
                          <div class="well">
                            <h2>Buttons for your site</h2>
                            <h4>Add buttons to your website to help your visitors share games from your site and connect with you on Toork.</h4></br>

<div class="menu shadow-black" style="background-color:white;">
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
            &lt;img width="203" height="37" src="http://toork.com/img/socials/followontoork3.png"/&gt;<br>
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
            &lt;img width="137" height="37" src="http://toork.com/img/socials/Toork.png"/&gt;<br>
            &lt;/a&gt;</p>
        </div>
      </div>
      <div class="accordion-heading country" style="margin:10px;">
              <?php echo $image3; ?>
        <a class="accordion-toggle" data-toggle="collapse" href="#country3"><i class="elusive-align-left"></i> Show Code</a>
      </div>
      <div id="country3" class="accordion-body collapse">
        <div class="accordion-inner">
          <h5>Copy this button code into the HTML of your site.</h5>
          <p class="well color-red">&lt;a href="<?php echo $buttonlink;?>"&gt; <br>
            &lt;img width="203" height="37" src="http://toork.com/img/socials/clone.png"/&gt;<br>
            &lt;/a&gt;</p>
        </div>
      </div>
      <div class="accordion-heading country" style="margin:10px;">
              <?php echo $image4; ?>
        <a class="accordion-toggle" data-toggle="collapse" href="#country4"><i class="elusive-align-left"></i> Show Code</a>
      </div>
      <div id="country4" class="accordion-body collapse">
        <div class="accordion-inner">
          <h5>Copy this button code into the HTML of your site.</h5>
          <p class="well color-red">&lt;a href="<?php echo $buttonlink;?>"&gt; <br>
            &lt;img width="137" height="37" src="http://toork.com/img/socials/clone2.png"/&gt;<br>
            &lt;/a&gt;</p>
        </div>
      </div>
      <div class="accordion-heading country" style="margin:10px;">
              <?php echo $image5; ?>
        <a class="accordion-toggle" data-toggle="collapse" href="#country5"><i class="elusive-align-left"></i> Show Code
        <blockquote class="pull-right"><small>This button is a link to your channel directly</small></blockquote></a>
      </div>
      <div id="country5" class="accordion-body collapse">
        <div class="accordion-inner">
          <h5>Copy this button code into the HTML of your site.</h5>
          <p class="well color-red">&lt;a href="<?php echo $buttonlink;?>"&gt; <br>
            &lt;img width="36" height="33" src="http://toork.com/img/socials/button2.png"/&gt;<br>
            &lt;/a&gt;</p>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="alert alert-info">
  <h5>You can change the size of the buttons using the width <span class="color-red">(width="203")</span> atribute in the button code</h5>
</div>

                      <p>
Toork is a social network about games, gamers, game bloggers, game developers and game sites. Toork is the right place to promote your games. Add one of our pre-build toork social buttons to let your visitors reach your channel. Share good stuff , make them follow you and grow your community. Have fun.
                      </p>
                      


                        </div>

                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>                        
                    </div><!-- /content -->
                </div><!-- /span content -->