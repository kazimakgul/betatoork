
<?php 
$iframe_url = $this->Html->url(array("controller" => 'businesses', "action" => 'serve_ads_frame',$user_id,$location));  
?>
<!-- Add Unit -->


 <div style='width:100%;' > 
    <div id="ad_code<?php echo $location;?>" >
<?php echo '<iframe src="'.$iframe_url.'" style="border: 0px;" width="728px" height="90px" scrolling="no"></iframe>'; ?>
    </div>
</div>




