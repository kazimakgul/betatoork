
//Activate ToolTip
$("[data-toggle=tooltip").tooltip();

//Code Block for Broken Images
function imgError(image,style){
    image.onerror = "";
	
	if(style=="toorksize")
	image.src = "<?php echo Configure::read('broken.toorksize'); ?>";
	else if(style=="thumb")
    image.src = "<?php echo Configure::read('broken.thumb'); ?>";
	else if(style=="slider")
    image.src = "<?php echo Configure::read('broken.slider'); ?>";
	else if(style=="avatar")
    image.src = "<?php echo Configure::read('broken.avatar'); ?>";
    return true;
}
