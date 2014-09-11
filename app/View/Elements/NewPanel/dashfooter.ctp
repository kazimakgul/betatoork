 <?php 
$terms=$this->Html->url(array( "controller" => "pages","action" =>"terms"));
$privacy=$this->Html->url(array( "controller" => "pages","action" =>"privacy"));
$help=$this->Html->url(array( "controller" => "pages","action" =>"help"));
$about=$this->Html->url(array( "controller" => "pages","action" =>"about"));
$developer=$this->Html->url(array( "controller" => "pages","action" =>"developers"));
$advertise=$this->Html->url(array( "controller" => "pages","action" =>"advertise"));
$faq=$this->Html->url(array( "controller" => "pages","action" =>"faq"));
?>



<div style="opacity:0.6; margin:20px 0px 20px 0px; text-align: center ;">

    <ul class ="inline">
        <li style="display: inline;">
    <a target="_blank" href="<?php echo $about; ?>" class="btn btn-link"><small>About</small></a>
        </li>
        <li style="display: inline;">
    <a target="_blank" href="<?php echo $terms; ?>" class="btn btn-link"><small>Terms</small></a>
        </li>
        <li style="display: inline;">
    <a target="_blank" href="<?php echo $privacy; ?>" class="btn btn-link"><small>Privacy</small></a>
        </li>
        <li style="display: inline;">
    <a target="_blank" href="<?php echo $help; ?>" class="btn btn-link"><small>Support</small></a>
        </li>
        <li style="display: inline;">
    <a target="_blank" href="<?php echo $developer; ?>" class="btn btn-link"><small>Developers</small></a>
        </li>
        <li style="display: inline;">
    <a target="_blank" href="<?php echo $advertise; ?>" class="btn btn-link"><small>Advertise</small></a>
        </li>
        <li style="display: inline;">
    <a target="_blank" href="<?php echo $faq; ?>" class="btn btn-link"><small>FAQs</small></a>
        </li>
    </ul>

<p><small><strong>Clone</strong> © Copyright 2014. All Rights Reserved</small></p>
<a target="_blank" href="http://toork.com"><img alt="Toork Social Network Engine" width="100" src="https://s3.amazonaws.com/betatoorkpics/socials/toorklogo.png" /></a>

</div>