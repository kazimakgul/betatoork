

<script>
window.onload = ad_get_code("<?php echo $location;?>","<?php echo $user_id;?>");
function col_ads(location,user_id){
var formData = {location:location,user_id:user_id};
$.ajax({
  type: "POST",
   url: col_ads_link,
   data: formData,
   success: function(data){
   	alert(data);
   $('.ad_code').html(data);
   }
 });
}
function set_id_create(id) {
        set_link_id = id;
    }
function ad_get_code(location,user_id){
	            $.post(col_ads_link, {
                location: location,
                user_id: user_id
            },
            function(data) {
                if (data.success) {
                	$('#ad_code'+location).show();
                    $('#ad_code'+location).html(data.success.Adcode.code);
                    $('#ad_name'+location).html(data.success.Adcode.name);
                    $('#edit'+location).show();
                } else {
                	$('#ad_code'+location).show();
                }
            }, 'json');
}
</script>
<!-- Add Unit -->
<div class="col-xs-11">
<div align="center" class="col-sm-offset-1 well well-sm">


<?php
   echo $code['code']; 
 ?>
 <div style='width:100%;' > 
 	<div id="ad_code<?php echo $location;?>" style="display:none;">
 		
 		You did no set any advertisement code.Your users won't see this panel.
<a data-toggle="modal" onclick="set_id_create(<?php echo $location;?>);" data-target="#adsChange"  href="#" title="Change Ads Code"  class="btn btn-sm btn-default adsChangeBtn">
	<span class="fa fa-pencil"></span>Add Code</a>
 		
 	</div>
<?php if($controls != NULL) 
echo '<span class="label label-primary" id="edit'.$location.'" style="display:none;"><i id="ad_name'.$location.'"></i>
<a data-toggle="modal" onclick="set_id_create('.$location.');" data-target="#adsChange" data-original-title="Edit"  href="#" title="Change Ads Code"  class="fa fa-pencil white adsChangeBtn" style="margin-left:15px; font-size:12px;">Edit</a>
</span>'; ?>
</div>
</div>
</div>
<!-- /Add Unit -->
<!--<?php 
//}else if(isset($channel_owner)){?>
<!-- Dummy Ad Unit
<div class="col-xs-11">
<div align="center" class="col-sm-offset-1 well well-sm">
	
</div>
</div>
<!-- /Dummy Ad Unit -->
<?php // }?>