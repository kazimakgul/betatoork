 <?php 
$terms=$this->Html->url(array( "controller" => "pages","action" =>"terms"));
$privacy=$this->Html->url(array( "controller" => "pages","action" =>"privacy"));
$help=$this->Html->url(array( "controller" => "pages","action" =>"help"));
$about=$this->Html->url(array( "controller" => "pages","action" =>"about"));
$developer=$this->Html->url(array( "controller" => "pages","action" =>"developers"));
$advertise=$this->Html->url(array( "controller" => "pages","action" =>"advertise"));
$faq=$this->Html->url(array( "controller" => "pages","action" =>"faq"));
?>

<div class="well well-small" style="opacity:0.6; margin:0px 0px 0px 0px; text-align: center ;">

<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ftoork.com&amp;width=450&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:21px;" allowTransparency="true"></iframe>
    
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://toork.com" data-via="thetoork" data-hashtags="toork">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  
<!-- Place this tag where you want the widget to render. -->
<div class="g-follow" data-annotation="bubble" data-height="20" data-href="//plus.google.com/113772168414173948855" data-rel="publisher"></div>

<!-- Place this tag after the last widget tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>


    <ul class ="inline">
        <li style="display: inline;">
    <a href="<?php echo $about; ?>" class="btn btn-link"><small>About</small></a>
        </li>
        <li style="display: inline;">
    <a href="<?php echo $terms; ?>" class="btn btn-link"><small>Terms</small></a>
        </li>
        <li style="display: inline;">
    <a href="<?php echo $privacy; ?>" class="btn btn-link"><small>Privacy</small></a>
        </li>
        <li style="display: inline;">
    <a href="<?php echo $help; ?>" class="btn btn-link"><small>Support</small></a>
        </li>
        <li style="display: inline;">
    <a href="<?php echo $developer; ?>" class="btn btn-link"><small>Developers</small></a>
        </li>
        <li style="display: inline;">
    <a href="<?php echo $advertise; ?>" class="btn btn-link"><small>Advertise</small></a>
        </li>
        <li style="display: inline;">
    <a href="<?php echo $faq; ?>" class="btn btn-link"><small>FAQs</small></a>
        </li>
    </ul>

<p><small><strong>Toork</strong> © Copyright 2013. All Rights Reserved</small></p>

</div>