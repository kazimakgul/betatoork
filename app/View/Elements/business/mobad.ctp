
<?php 
$iframe_url = $this->Html->url(array("controller" => 'businesses', "action" => 'serve_ads_frame',$user_id,$location));  
?>
<!-- Add Unit -->


 
    <div id="ad_code<?php echo $location;?>" >
<?php echo '<iframe src="'.$iframe_url.'" style="border: 0px;" width="305px" height="64px" scrolling="no"></iframe>'; ?>
    </div>





