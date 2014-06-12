
<?php
if(isset($code['code']) && $code['code'] != '' && $code['code'] != NULL)
{
?>
<!-- Add Unit -->
<div class="col-xs-11">
<div align="center" class="col-sm-offset-1 well well-sm">


<?php
   echo $code['code']; 
 ?>
 <div style='width:100%;'> 
<?php if(isset($channel_owner) && $channel_owner) echo '<span class="label label-primary">'.$code["name"].'<a data-toggle="modal" id="'.$adtype.'" data-target="#adsChange" data-original-title="Edit"  href="#" title="Change Ads Code"  class="fa fa-pencil-square fa-4 label-danger" style="margin-left:15px; font-size:15px;"></a></span>' ?>
</div>
</div>
</div>
<!-- /Add Unit -->
<?php }else if(isset($channel_owner) && $channel_owner){?>
<!-- Dummy Ad Unit -->
<div class="col-xs-11">
<div align="center" class="col-sm-offset-1 well well-sm">
<a data-toggle="modal" id='<?php echo $adtype; ?>' data-target="#adsChange"  href="#" title="Change Ads Code"  class="btn btn-sm btn-default adsChangeBtn" style="margin:-15px 0px 0px -50px; position:absolute;">
	<span class="fa fa-pencil"></span></a>	
You did no set any advertisement code.Your users won't see this panel.
</div>
</div>
<!-- /Dummy Ad Unit -->
<?php }?>