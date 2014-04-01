
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