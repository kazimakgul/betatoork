/* bunch of related content view code, etc, etc, then.... */ 
<?php echo $this->Html->script(array('js2/jquery'));  ?>
    <script type="text/javascript"> 
          
		  $(document).ready(function() { 
            loadPiece("<?php echo $this->Html->url(array('controller'=>'games','action'=>'gamelist'));?>","#imageList"); 
             });
		  
		  
		   function loadPiece(href,divName) {     
    $(divName).load(href, {}, function(){ 
        var divPaginationLinks = divName+" #pagination a"; 
        $(divPaginationLinks).click(function() {      
            var thisHref = $(this).attr("href"); 
            loadPiece(thisHref,divName); 
            return false; 
        }); 
    }); 
} 


    </script> 
<div id="imageList"> 

</div> 