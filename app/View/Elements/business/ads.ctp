
<!-- Add Unit -->
<div class="col-xs-11">
<div align="center" class="col-sm-offset-1 well well-sm">

<?if($controls==$user['User']['id']){?>
<a href="#" data-toggle="tooltip" data-placement="bottom" title="Change Ads Code"  class="btn btn-sm btn-default" style="margin:-15px 0px 0px -50px; position:absolute;">
	<span class="fa fa-pencil"></span></a>
<?php
}
 echo $user['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->