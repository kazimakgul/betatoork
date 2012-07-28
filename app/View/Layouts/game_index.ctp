<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<?php 
echo $html->meta('keywords','enter any meta keyword here');
echo $html->meta('description','enter any meta description here');
?>


<meta property="og:title" content="Toork"/>
<meta property="og:type" content="Game"/>
<meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>"/>
<meta property="og:image" content="https://s3.amazonaws.com/betatoorkpics<?php echo $this->Upload->url($game,'Game.picture'); ?>"/>
<meta property="og:site_name" content="Toork"/>
<meta property="fb:admins" content="711440119"/>
<meta property="og:description" content="<?php echo $game['Game']['description']; ?>"/>


<?php echo $this->Html->css(array('header','footer','userpanel','gamebox','footer','jquery.fancybox-1.3.4','light_box_register','ui-lightness/jquery-ui-1.8.17.custom','slider','tgnrl','mychannel','myStyle','rating','game')); ?>


<?php echo $this->Html->script(array('jquery.min','jquery-ui-1.8.17.custom.min','jquery.cookie','jquery.fancybox-1.3.4.pack','jquery.lightbox_me','knockout-2.0.0','underscore','jquery.placeholder.min','jail','t_slider')); ?>


<?php
$rateurl=$this->Html->url(array( "controller" => "rates","action" =>"add",h($game['Game']['id'])));
$favurl=$this->Html->url(array( "controller" => "favorites","action" =>"add",h($game['Game']['id'])));
$playurl=$this->Html->url(array( "controller" => "playcounts","action" =>"add_play",h($game['Game']['id'])));
?>

<script>

window.setTimeout('countonetime()',10000);
function countonetime()
{
$.get("<?php echo $playurl ?>");
}

<?php if($this->Session->check('Auth.User')){
echo 'useronline=1;';
}else{
echo 'useronline=0;';
}
?>


function rate_a_game(rating){


 if(useronline==1)
 {

    $.post("<?php echo $rateurl; ?>/"+rating,function(data) {alert(data);});
  
  
    if (rating==1)
    {
    $('.rating').css({width: '20%'});
    }
    else if (rating==2)
    {
    $('.rating').css({width: '40%'});
    }
    else if (rating==3)
    {
    $('.rating').css({width: '60%'});
    }
    else if (rating==4)
    {
    $('.rating').css({width: '80%'});
    }
    else if (rating==5)
    {
    $('.rating').css({width: '100%'});
    }
  
   }else{
  
    $('#register').lightbox_me();
  
   }  
  
}

var heartflag=0;


  if (heartwidth==100)
  {
  $('.adding').css({width: '0%'});
  }
  else if (heartwidth==0)
  {
  $('.adding').css({width: '100%'});
  }


function add_to_fav(heartwidth){

     if(useronline==1)
     {

        $.post("<?php echo $favurl;?>",function(data) {alert(data);});
  
         if(heartflag==0)
         {
         current_heart=heartwidth;
         heartflag=1;
         }
      
	  }else{
	  
	  $('#register').lightbox_me();
	  
	  }
  
}

function switcher(){
  
  if(current_heart==100)
  {
  current_heart=0;
  $('.adding').css({width: '0%'});
  }
  else if(current_heart==0)
  {
  current_heart=100;
  $('.adding').css({width: '100%'});
  }
  
  
  
}
  
</script>



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
<!-- fb -->
<?php  echo $this->element('test'); ?>


<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "2985e6d2-18ec-411c-bdd2-3f2ec2a0c832"}); </script>


</head>
<body class="home">


<?php  echo $this->element('header'); ?>

<?php echo $content_for_layout?>

<?php  echo $this->element('game_footer'); ?>

<?php 
echo $this->Session->flash('flash', array('element' => 'info'));
echo $this->Session->flash('auth', array('element' => 'info'));
?>
<?php  echo $this->element('register'); ?>
<?php  echo $this->element('analytics'); ?>

<!-- facebook comment icin gerekli -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=298516580200969";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- end fb comment icin gerekli -->

</body>
</html>





