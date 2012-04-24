
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->




<?php echo $this->Html->css(array('header','userpanel','gamebox','footer','jquery.fancybox-1.3.4','light_box_register','ui-lightness/jquery-ui-1.8.17.custom','slider','tgnrl','myStyle','rating','game')); ?>


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



function rate_a_game(rating){
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
	$.post("<?php echo $favurl;?>",function(data) {alert(data);});
	
    if(heartflag==0)
	{
	current_heart=heartwidth;
	heartflag=1;
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








<?php  echo $this->element('knockout'); ?>
<!-- fb -->
<?php  echo $this->element('test'); ?>




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


</body>
</html>