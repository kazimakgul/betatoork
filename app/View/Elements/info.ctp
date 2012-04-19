<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>

	
	<title>Message</title>
	
	
	<style>
    #note {
        position: fixed;
        z-index: 6001;
        top: 100px;
        left: 0;
        right: 0;
        background: #fde073;
        text-align: center;
        line-height: 2.3;
        overflow: hidden; 
        -webkit-box-shadow: 0 0 5px black;
        -moz-box-shadow:    0 0 5px black;
        box-shadow:         0 0 5px black;
    }
    .cssanimations.csstransforms #note {
        -webkit-transform: translateY(-50px);
        -webkit-animation: slideDown 2.5s 1.0s 1 ease forwards;
        -moz-transform:    translateY(-50px);
        -moz-animation:    slideDown 2.5s 1.0s 1 ease forwards;
    }

    #close {
      position: absolute;
      right: 10px;
      top: 9px;
      text-indent: -9999px;
      background: url(../img/close.png);
      height: 16px;
      width: 16px;
      cursor: pointer;
    }
    .cssanimations.csstransforms #close {
      display: none;
    }
    
    @-webkit-keyframes slideDown {
        0%, 100% { -webkit-transform: translateY(-50px); }
        10%, 90% { -webkit-transform: translateY(0px); }
    }
    @-moz-keyframes slideDown {
        0%, 100% { -moz-transform: translateY(-50px); }
        10%, 90% { -moz-transform: translateY(0px); }
    }
	</style>
	
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
  </script>
		
</body>

</html>