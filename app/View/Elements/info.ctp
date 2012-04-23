<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

<?php echo $this->Html->css('info'); ?>
	
</head>

<body>

	<div id="page-wrap">
		
    <div id="note">
        <?php echo $message ?> <a id="close">[close]</a>
    </div>
    
 
	</div>
		
  <script>
   close = document.getElementById("close");
   close.addEventListener('click', function() {
     note = document.getElementById("note");
     note.style.display = 'none';
   }, false);
   
   setTimeout("closenote()",4000);
   function closenote()
   {
   note.style.display = 'none'
   }
   
  </script>
		
</body>

</html>