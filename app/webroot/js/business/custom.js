
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
	image.src = "https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png";
	else if(style=="thumb")
    image.src = "<?php echo Configure::read('broken.thumb'); ?>";
	else if(style=="slider")
    image.src = "<?php echo Configure::read('broken.slider'); ?>";
	else if(style=="avatar")
    image.src = "<?php echo Configure::read('broken.avatar'); ?>";
    return true;




}