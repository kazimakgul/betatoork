
<?php 
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



