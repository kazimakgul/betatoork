<div id="header">

<?php 

	if($this->Session->check('Auth.User')){
		echo $this->element('navIn');
	}else{
		echo $this->element('outbuttons');
	}

?>

<div  class="site-logo">

<?php echo $this->Html->link(
	$this->Html->image("logo.png", array('class'=>'logo', 'height'=>'35', "alt" => "toork logo")),
	"/", array('escape' => false));?>


</div>


<?php
$searchurl=$this->Html->url(array("controller" => "games","action" =>"search"));
?>

<script>
//This function is the part of search engine
function checkKey(){
if(event.keyCode==13){
var searchvalue = document.getElementsByName('param');
window.location="<?php echo $searchurl;?>/"+searchvalue[0].value;
}}
</script>

<div class='centerme'>
<div method="get" action="" id="search" >
  <input name="param" type="text" size="40" placeholder="Search a Game" onKeyDown="checkKey();" />
</div>
</div>
</div>