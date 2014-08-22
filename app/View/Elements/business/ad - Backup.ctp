<script>



window.onload = ad_get_code("<?php echo $location;?>","<?php echo $user_id;?>");
function ad_get_code(location,user_id){
	            $.post(col_ads_link, {
                location: location,
                user_id: user_id
            },
            function(data) {
                if (data.success) {
			        if(location==6){
			        $('.game_box_pre').css("display", "block");
			        $('.game_box').css("display", "none");
			       	setTimeout(function() {skip_ad();}, 12000);
					window.onload=Saniye;
                	}
                	$('#ad_code'+location).show();
                	$('#edit'+location).show();
                    $('#ad_code'+location).html(data.success.Adcode.code);
                    $('#ad_name'+location).html(data.success.Adcode.name);
			       //=======Gamebox Pre Ads==========
                } else {
                	//$('.game_box_pre').css("display", "none");
                	$('#ad_code'+location).show();
                	<?php if($controls == NULL || isset($_GET['mode'])) {?>
                	$('#edit'+location).css('display','none');
					$('#add'+location).css('display','none');
					<?php }?>
                }
            }, 'json');
}


function skip_ad()
{
	$('.game_box_pre').css("display", "none");
	$('.game_box').css("display", "block");
}

//Countdown
var sure=10; 
var zamanIsle;
function Saniye() {
document.getElementById("dl").innerHTML = 'Game is loading. Please Wait <b>' + sure + '</b> seconds.';
sure=sure-1; 
zamanIsle=setTimeout("Saniye()", 1000);
Kontrol();
}
function Kontrol(){
if(sure <= -1){
document.getElementById("dl").innerHTML ='<b>Loading...</b>';
clearTimeout(zamanIsle);
   }
}
</script>

<?php 
$ads_code = $this->requestAction(array('controller' => 'businesses', 'action' => 'get_ads_code',$user_id,$location));
echo $ads_code['Adcode']['code'];
?>

<?php if($controls != NULL && !isset($_GET['mode'])) {?>
<!-- Add Unit -->
<div class="col-xs-11" id="add<?php echo $location;?>">
<div align="center" class="col-sm-offset-1 well well-sm">


<?php
   if(!empty($code['code'])){echo $code['code'];} 
 ?>
 <div style='width:100%;' > 
  	<div id="ad_code<?php echo $location;?>" style="display:none;">
 		
 		You did no set any advertisement code.Your users won't see this panel.
<a data-toggle="modal"  onclick="set_id_create(<?php echo $location;?>);" data-target="#adsChange"  href="#" title="Change Ads Code"  class="btn btn-sm btn-default adsChangeBtn">
	<span class="fa fa-pencil"></span>Add Code</a>
 		
 	</div>
<?php 
echo '<span class="label label-primary" id="edit'.$location.'" style="display:none;"><i id="ad_name'.$location.'"></i>
<a data-toggle="modal" onclick="set_id_create('.$location.');" data-target="#adsChange" data-original-title="Edit"  href="#" title="Change Ads Code"  class="fa fa-pencil white adsChangeBtn" style="margin-left:15px; font-size:12px;">Edit</a>
</span>'; ?></div>
</div>
</div>
<?php }else{
?>

<!-- Add Unit -->
<div class="col-xs-11" id="add<?php echo $location;?>">
<div align="center" class="col-sm-offset-1 well well-sm">
<?php
   echo $code['code']; 
 ?>
 <div style='width:100%;' > 
 	<div id="ad_code<?php echo $location;?>" style="display:none;"></div>
</div>
</div>
</div>
<?php	
}
?>