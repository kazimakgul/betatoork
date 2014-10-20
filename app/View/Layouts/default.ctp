<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="http://toork.com/favicon.ico" type="image/x-icon" />


<?php 
echo $this->Html->meta('keywords','online games, browser games, flash games, share games, social network for gamers, game channels, social for game bloggers,share your games, share gamelist, games list');
echo $this->Html->meta('description','Toork is a social network for online gamers. With Toork, you will be able to create your own game channel by collecting any game around the web and share it with your friends. Create your game lists, customize your channel and earn money by using toork.');
?>

<meta property="og:title" content="Toork - Create Your Own Game Channel"/>
<meta property="og:type" content="Game"/>
<meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>"/>
<meta property="og:image" content="https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-ash4/428808_254949491292199_1660409950_n.jpg"/>
<meta property="og:site_name" content="Toork"/>
<meta property="fb:admins" content="711440119"/>
<meta property="og:description" content="Toork is a social network for online gamers. With Toork, you will be able to create your own game channel by collecting any game around the web and share it with your friends. Create your game lists, customize your channel and earn money by using toork."/>


<?php echo $this->Html->css(array('header','userpanel','footer','jquery.fancybox-1.3.4','light_box_register','ui-lightness/jquery-ui-1.8.17.custom','termandconditions.css')); ?>


<?php echo $this->Html->script(array('jquery.min','register','jquery-ui-1.8.17.custom.min','jquery.cookie','jquery.fancybox-1.3.4.pack','jquery.lightbox_me','knockout-2.0.0','underscore','jquery.placeholder.min','jail','t_slider')); ?>


<script type="text/javascript">
$(function () {
    $('#remember').click(function () {
        if ($(this).hasClass('remember')) {
            $('#remembervalue').val(1);
            $('#remember').removeClass('remember').addClass('remembertick');
        } else {
            $('#remembervalue').val(0);
            $('#remember').removeClass('remembertick').addClass('remember');
        }
    });
    //$('.share').click(function () { var posshare = $(this).position(); console.log('genislik: ' + $(this).width() + ' -- top: ' + posshare.top + ' -- left: ' + posshare.left); });
    $('.share').click(function () {
        var posshare = $(this).position();
    });
    $('.bemember').click(function () {
        $('#register').load('/account/register/start/');
        $('body').css({
            'overflow': 'hidden'
        });
    });
});

<?php $suburl2=$this->Html->url(array("controller" => "subscriptions","action" =>"add_subscription")); ?>

function changesubscribe(userid)
{

$.get("<?php echo $suburl2; ?>/"+userid,function(data) {alert(data);location.reload();});


}


</script>

<?php $searchurl=$this->Html->url(array("controller"=>"games","action"=>"search")); ?>

<script type="text/javascript">

$(function () {

    $('.search_button').click(function () {

        window.location = "<?php echo $searchurl; ?>/" + $('.search_text').val()+"/"+"search?&q="+$('.search_text').val();

    });

    $('.search_text').keypress(function (e) {
        if (e.which == 13) {
            window.location = "<?php echo $searchurl; ?>/"+ $('.search_text').val()+"/"+"search?&q="+$('.search_text').val();
        }
    });


});

</script>




<?php  echo $this->element('knockout'); ?>





</head>
<body class="home">


<?php  echo $this->element('header'); ?>

<?php  echo $this->element('feedback'); ?>
<?php echo $content_for_layout?>

<?php  echo $this->element('footer'); ?>
<?php 
echo $this->Session->flash('flash', array('element' => 'info'));
echo $this->Session->flash('auth', array('element' => 'info'));
?>
<?php  echo $this->element('register'); ?>
<?php  echo $this->element('analytics'); ?>
<?php echo $this->Facebook->init(); ?>

</body>
</html>