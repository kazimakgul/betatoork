
<?php 
$ads_code = $this->requestAction(array('controller' => 'businesses', 'action' => 'get_ads_code',$user_id,$location));
//echo $ads_code['Adcode']['code'];
?>

<script>
window.onload = hide_gamebox();

<?php if($pregame==1 && !empty($ads_code)){ ?>
function hide_gamebox(){
                    
                    
                    $('.game_box_pre').css("display", "block");
                    $('.game_box').css("display", "none");
                    setTimeout(function() {skip_ad();}, 10000);
                    Saniye();
                    
}
<?php } ?>

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


<?php if($controls != NULL && !isset($_GET['mode'])) {?>
<!-- Add Unit -->
<div class="col-xs-11" id="add<?php echo $location;?>">
<div align="center" class="col-sm-offset-1 well well-sm">


 <div style='width:100%;' > 
    <div id="ad_code<?php echo $location;?>">
        
        <?php if(!empty($ads_code)){
         $iframe_url = $this->Html->url(array("controller" => 'businesses', "action" => 'serve_ads_frame',$user_id,$location));    
         echo '<iframe src="'.$iframe_url.'" style="border: 0px;" width="728px" height="90px" scrolling="no"></iframe>';
         echo '<br><span class="label label-primary" id="edit'.$location.'" ><i id="ad_name'.$location.'">'.$ads_code['Adcode']['name'].'</i>
<a data-toggle="modal" onclick="set_id_create('.$location.');" data-target="#adsChange" data-original-title="Edit"  href="#" title="Change Ads Code"  class="fa fa-pencil white adsChangeBtn" style="margin-left:15px; font-size:12px;">Edit</a>
</span>';
         }else{ ?>
         You did no set any advertisement code.Your users won't see this panel.
         <a data-toggle="modal"  onclick="set_id_create(<?php echo $location;?>);" data-target="#adsChange"  href="#" title="Change Ads Code"  class="btn btn-sm btn-default adsChangeBtn">
         <span class="fa fa-pencil"></span>Add Code</a>
        <?php } ?>
        
    </div>

</div>

</div>
</div>
<?php }else{
?>


<?php 
if(!empty($ads_code)){
$iframe_url = $this->Html->url(array("controller" => 'businesses', "action" => 'serve_ads_frame',$user_id,$location));  
?>
<!-- Add Unit -->
<div class="col-xs-11" id="add<?php echo $location;?>">
<div align="center" class="col-sm-offset-1 well well-sm">

 <div style='width:100%;' > 
    <div id="ad_code<?php echo $location;?>" >
<?php echo '<iframe src="'.$iframe_url.'" style="border: 0px;" width="728px" height="90px" scrolling="no"></iframe>'; ?>
    </div>
</div>
</div>
</div>
<?php } ?>


<?php   
}
?>