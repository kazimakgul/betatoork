<?php 
$ads_code = $this->requestAction(array('controller' => 'businesses', 'action' => 'get_ads_code',$user_id,$location));
?>


<?php 
$iframe_url = $this->Html->url(array("controller" => 'businesses', "action" => 'serve_ads_frame',$user_id,$location));  
?>
<!-- Add Unit -->

<?php if(!empty($ads_code)){ ?>
 <div style='width:100%;text-align:center;' > 
    <div id="ad_code<?php echo $location;?>" >
<?php echo '<iframe src="'.$iframe_url.'" style="border: 0px;" width="320px" height="50px" scrolling="no"></iframe>'; ?>
    </div>
</div>
<?php } ?>



