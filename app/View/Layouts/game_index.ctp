
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->

<?php echo $scripts_for_layout?>

<?php 
echo $this->Html->css(array('myStyle','gamebox','rating','game','demo','style2','buttons','cake.generic'));
echo $this->Html->script('jquery.min');
?>

<?php
$rateurl=$this->Html->url(array( "controller" => "rates","action" =>"add",h($game['Game']['id'])));
$favurl=$this->Html->url(array( "controller" => "favorites","action" =>"add",h($game['Game']['id'])));
?>


<script>
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

<?php
echo $this->element('analytics');
?>

</head>
<body>

<?php echo $this->element('header');?>

<?php echo $content_for_layout?>

<?php echo $this->element('game_footer');?>
</body>
</html>