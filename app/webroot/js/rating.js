function rate_a_game(rating){
	$.post("/newtoork/rates/add/<?php echo h($game['Game']['id']); ?>/"+rating,function(data) {alert(data);});
	
	
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
	$.post("/newtoork/favorites/add/<?php echo h($game['Game']['id']); ?>",function(data) {alert(data);});
	
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