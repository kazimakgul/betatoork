
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
<?php if(isset($channel_owner) && $channel_owner) echo '<span class="label label-primary">'.$code["name"].'<a data-toggle="modal" id="'.$adtype.'" data-target="#adsChange" data-original-title="Edit"  href="#" title="Change Ads Code"  class="fa fa-pencil white adsChangeBtn" style="margin-left:15px; font-size:12px;">Edit</a></span>' ?>
</div>
</div>
</div>
<!-- /Add Unit -->
<?php }else if(isset($channel_owner)){?>
<!-- Dummy Ad Unit -->
<div class="col-xs-11">
<div align="center" class="col-sm-offset-1 well well-sm">
You did no set any advertisement code.Your users won't see this panel.
<a data-toggle="modal" id='<?php echo $adtype; ?>' data-target="#adsChange"  href="#" title="Change Ads Code"  class="btn btn-sm btn-default adsChangeBtn">
	<span class="fa fa-pencil"></span>Add Code</a>	
</div>
</div>
<!-- /Dummy Ad Unit -->
<?php }?>