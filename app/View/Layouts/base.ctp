<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">


<meta property="og:title" content="Toork"/>
<meta property="og:type" content="game"/>
<meta property="og:url" content="http://beta.toork.com/"/>
<meta property="og:image" content=""/>
<meta property="og:site_name" content="IMDb"/>
<meta property="fb:admins" content="USER_ID"/>
<meta property="og:description"
      content="Create your own game channel."/>


<?php echo $this->Html->css(array('header','userpanel','gamebox','footer','jquery.fancybox-1.3.4','light_box_register','ui-lightness/jquery-ui-1.8.17.custom','slider','tgnrl','mychannel')); ?>


<?php echo $this->Html->script(array('jquery.min','jquery-ui-1.8.17.custom.min','jquery.cookie','jquery.fancybox-1.3.4.pack','jquery.lightbox_me','knockout-2.0.0','underscore','jquery.placeholder.min','jail','t_slider')); ?>


<script type="text/javascript">
$(function () {
  $('#remember').click(function () {
    if($(this).hasClass('remember')) {
      $('#remember').removeClass('remember').addClass('remembertick');
    }
    else {
      $('#remember').removeClass('remembertick').addClass('remember');
    }
  });
  //$('.share').click(function () { var posshare = $(this).position(); console.log('genislik: ' + $(this).width() + ' -- top: ' + posshare.top + ' -- left: ' + posshare.left); });
  $('.share').click(function () {
    var posshare = $(this).position();
  });
	$('.bemember').click(function () {
	  $('#register').load('/account/register/start/');
	  $('body').css({ 'overflow' : 'hidden'});
	});
});
</script>

<?php $searchurl=$this->Html->url(array("controller"=>"games","action"=>"search")); ?>

<script type="text/javascript">

$(function () {

$('.search_button').click(function() {

window.location='<?php echo $searchurl; ?>/'+$('.search_text').val();

});

$('.search_text').keypress(function(e) {
        if(e.which == 13) {
            window.location='<?php echo $searchurl; ?>/'+$('.search_text').val();
        }
    });


});
</script>




<?php  echo $this->element('knockout'); ?>
<!-- fb -->
<?php  echo $this->element('test'); ?>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "945fc838-b0de-48a9-be2d-8e71a7e4835a"}); </script>


</head>
<body class="home">


<?php  echo $this->element('header'); ?>

<?php echo $content_for_layout?>

<?php  echo $this->element('footer'); ?>
<?php 
echo $this->Session->flash('flash', array('element' => 'info'));
echo $this->Session->flash('auth', array('element' => 'info'));
?>
<?php  echo $this->element('register'); ?>


</body>
</html>