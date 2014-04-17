
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

//Controller functions for modals
$('#avatarframe').load(function(){
  $(this).contents().find("#close_panel").on('click', function(event) { $('#pictureChange').modal('toggle'); });
});

$('#avatarframe').load(function(){
  $(this).contents().find("#set_photo").on('click', function(event) { 
   $('#pictureChange').modal('toggle');
   $('#user_avatar').attr('src','http://www.imageyourself.net/images/website/loading.gif');

   });

alert($(this).contents().find("#selected_image").val());
var name = $('iframe[id=avatarframe]').contents().find('#selected_image').val();
alert(name);

});