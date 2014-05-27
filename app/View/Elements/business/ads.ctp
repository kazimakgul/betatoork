
<?php
if(isset($controls) || isset($code) && $code != '' && $code != NULL)
{
?>
<!-- Add Unit -->
<div class="col-xs-11">
<div align="center" class="col-sm-offset-1 well well-sm">
<?if(isset($controls) && $controls==$user['User']['id']){?>
<a data-toggle="modal" data-target="#adsChange"  href="#" title="Change Ads Code"  class="btn btn-sm btn-default" style="margin:-15px 0px 0px -50px; position:absolute;">
	<span class="fa fa-pencil"></span></a>
<?php
	}
 echo $code; ?> 

</div>
</div>
<!-- /Add Unit -->
<?}?>