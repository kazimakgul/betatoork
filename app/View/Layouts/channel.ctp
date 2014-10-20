<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="http://toork.com/favicon.ico" type="image/x-icon" />

<?php 
echo $this->Html->meta('keywords','online games, browser games, flash games, share games, social network for gamers, game channels, social for game bloggers,share your games, share gamelist, games list');
echo $this->Html->meta('description','Toork is a social network for online gamers. With Toork, you will be able to create your own game channel by collecting any game around the web and share it with your friends. Create your game lists, customize your channel and earn money by using toork.');
?>

<meta property="og:title" content="<?php echo $game['User']['username']; echo ' - Toork';  ?>"/>
<meta property="og:type" content="Game"/>
<meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>"/>
<meta property="og:image" content="https://fbcdn-sphotos-a.akamaihd.net/hphotos-ak-ash3/552572_178477148939434_926991804_n.jpg"/>
<meta property="og:site_name" content="Toork"/>
<meta property="fb:admins" content="711440119"/>
<meta property="og:description" content="Create your own game channel."/>

<?php echo $this->Html->css(array('header','userpanel','gamebox','footer','jquery.fancybox-1.3.4','light_box_register','ui-lightness/jquery-ui-1.8.17.custom','slider','mychannel','channelwall')); ?>
<?php echo $this->Html->script(array('jquery.min','jquery-ui-1.8.17.custom.min','jquery.cookie','jquery.fancybox-1.3.4.pack','jquery.lightbox_me','knockout-2.0.0','underscore','jquery.placeholder.min','jail','t_slider')); ?>

<script type="text/javascript">
$(function () {
  $('.slideitem ul').css({ 'top': 294 - ($('.slideitem ul li').length * 98) });

  $('#remember').click(function () {
    if ($(this).hasClass('remember')) {
      $('#remember').removeClass('remember').addClass('remembertick');
    }
    else {
      $('#remember').removeClass('remembertick').addClass('remember');
    }
  });

  $('#subscribe').click(function () {
    if ($(this).hasClass('subscribe')) {
      $(this).removeClass('subscribe').addClass('unsubscribe');
    }
    else {
      $(this).removeClass('unsubscribe').addClass('subscribe');
    }
  });
});
</script><!-- fb -->
</head>
<body class="home">
<?php  echo $this->element('header'); ?>

<?php echo $content_for_layout?>

<?php  echo $this->element('footer'); ?>

<?php echo $this->Facebook->init(); ?>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
