<?php 
$channelurl=$this->Html->url(array("controller" => $seo_username,"action" =>"")); 
// User Avatar
   if($gravatar)
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $face=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
   }
   else
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $face=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
   }
// End Avatar
?>

<div class="media">
                                                        <a class="pull-left" href="#">
                                                            <!--<img class="media-object" data-src="js/holder.js/64x64">-->
															<?php echo $face; ?>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="<?php echo $channelurl ?>"><?php echo $username?> </a><small class="helper-font-small"><?php echo $mtime; ?></small></h4>
                                                            <p><?php echo $message; ?></p>
															
														<?php
 if($uploads)
{
echo "<div style='margin-top:10px'>";
$s = explode(",", $uploads);
foreach($s as $a)
{
$newdata=$Wall->Get_Upload_Image_Id($a);
  if($newdata)
  {
  $uploadimageurl=Configure::read('S3.url').'/wall/'.$newdata['image_path'];
  echo "<a href='".$uploadimageurl."' rel='facebox'>".$this->Html->image(Configure::read('S3.url')."/wall/".$newdata['image_path'],array('rel'=>'facebox','class'=>'imgpreview'))."</a>";
  }
}
echo "</div>";
 }
 ?>	
                       
															
                                                            <div class="btn-group pull-right">
															    <?php if(isset($uid)) {?>
                                                                <a href="#" class="btn btn-mini commentopen" id="<?php echo $msg_id;?>">Comment</a>
																<?php }?>	
                                                                <a href="#" class="btn btn-mini">Invoice</a>
                                                                <a href="#" class="btn btn-mini btn-danger stdelete" id="<?php echo $msg_id;?>">Delete</a>
																
                                                            </div>
                                                        </div>
                                                    </div>