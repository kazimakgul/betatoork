
    $("[data-toggle='tooltip']").tooltip();    
 
    $('.imagehover').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    );
    
    

//Code Block for Broken Images
function imgError(image,style){
    image.onerror = "";
	
	if(style=="toorksize")
		image.src = toorksize;
	else if(style=="avatar")
    	image.src = avatar;
    return true;

}

//Controller functions for modals of avatar begins
$('#avatarframe').load(function(){
  $(this).contents().find("#close_panel").on('click', function(event) { $('#pictureChange').modal('toggle'); });
});

$('#avatarframe').load(function(){
  $(this).contents().find("#set_photo").on('click', function(event) { 
   $('#pictureChange').modal('toggle');
   $('#user_avatar').attr('src','http://www.imageyourself.net/images/website/loading.gif');
   
   setTimeout(function(){
		var new_img = $('iframe[id=avatarframe]').contents().find('#new_image_link').val();
        $('#user_avatar').attr('src',new_img);			   
   },1000);

   });

//var name = $('iframe[id=avatarframe]').contents().find('#selected_image').val();
//alert(name);
});
//Controller functions for modals of avatar ends

//Controller functions for modals of cover begins
$('#coverframe').load(function(){
  $(this).contents().find("#close_panel").on('click', function(event) { $('#coverChange').modal('toggle'); });
});

$('#coverframe').load(function(){
  $(this).contents().find("#set_photo").on('click', function(event) { 
   $('#coverChange').modal('toggle');
   $('#user_cover').css('background-image','http://www.imageyourself.net/images/website/loading.gif');
   
   setTimeout(function(){
		var new_img = $('iframe[id=coverframe]').contents().find('#new_image_link').val();$('#user_avatar').attr('src',new_img);
        $('#user_cover').css('background-image',new_img);			   
   },1000);

   });

});


