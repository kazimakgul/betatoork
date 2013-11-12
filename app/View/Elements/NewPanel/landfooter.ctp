 <?php 
$terms=$this->Html->url(array( "controller" => "pages","action" =>"terms"));
$privacy=$this->Html->url(array( "controller" => "pages","action" =>"privacy"));
$help=$this->Html->url(array( "controller" => "pages","action" =>"help"));
$about=$this->Html->url(array( "controller" => "pages","action" =>"about"));
$developer=$this->Html->url(array( "controller" => "pages","action" =>"developers"));
$advertise=$this->Html->url(array( "controller" => "pages","action" =>"advertise"));
$faq=$this->Html->url(array( "controller" => "pages","action" =>"faq"));
?>

  <div class='deep-footer'>
    <div class='container'>
      <div class='row'>
        <div class='span6'>
          <div class='copyright'>Copyright &copy; 2013 Clone. All rights reserved.</div>
        </div>
        <div class='span6'>
          
            <ul class='footer-links'>
                <li >
            <a href="<?php echo $about; ?>" ><small>About</small></a>
                </li>
                <li >
            <a href="<?php echo $terms; ?>" ><small>Terms</small></a>
                </li>
                <li >
            <a href="<?php echo $privacy; ?>" ><small>Privacy</small></a>
                </li>
                <li >
            <a href="<?php echo $help; ?>" ><small>Support</small></a>
                </li>
                <li >
            <a href="<?php echo $developer; ?>" ><small>Developers</small></a>
                </li>
                <li >
            <a href="<?php echo $advertise; ?>" ><small>Advertise</small></a>
                </li>
                <li >
            <a href="<?php echo $faq; ?>" ><small>FAQs</small></a>
                </li>
            </ul>
 
        </div>
      </div>
    </div>
  </div>