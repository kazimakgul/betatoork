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

<div class="media" id="stbody<?php echo $msg_id;?>">
                                                        <a class="pull-left" href="#">
                                                            <!--<img class="media-object" data-src="js/holder.js/64x64">-->
															<?php echo $face; ?>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="<?php echo $channelurl ?>"><?php echo $username?> </a><small class="helper-font-small"><a href='#' class="timeago" title='<?php echo $mtime; ?>'></a></small></h4>
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
                       
			<div id="stexpandbox">
			<div id="stexpand<?php echo $msg_id;?>">
			<?php
			if(textlink($orimessage))
			{
			$link =textlink($orimessage);
			echo Expand_URL($link);
			}?>	
			</div>
			</div>	
					   
															
                                                            <div class="btn-group pull-right">
															    <?php if(isset($uid)) {?>
                                                                <a href="#" class="btn btn-mini commentopen" id="<?php echo $msg_id;?>">Comment</a>
																<?php }?>
                                                                <a href="#" class="btn btn-mini btn-danger stdelete" id="<?php echo $msg_id;?>">Delete</a>
																
                                                            </div>
                                                        </div>
														
														<!-- Comment area begins -->				
					<div class="commentcontainer feedcomments" id="commentload<?php echo $msg_id;?>">
			<?php
				$x=1;
				echo $this->element('NewPanel/load_comments_boot',array('msg_id'=>$msg_id,'x'=>$x,'msg_uid'=>$msg_uid)); 
			?>
			</div>
			<div class="commentupdate feedcommentarea clearfix" style='display:none' id='commentbox<?php echo $msg_id;?>'>
				<div class="commentleft">
					<div class="commentavatarback">
						<?php echo $session_face;?>
					</div>
				</div>
				<div class="commentright">
					<textarea placeholder="Write a comment..." name="comment" class="commentarea" maxlength="200" cols="53" rows="2" id="ctextarea<?php echo $msg_id;?>"></textarea>
					<!--<textarea class="commentarea" cols="53" rows="2"></textarea>-->
					<div type="submit"  value=""  id="<?php echo $msg_id;?>" class="comment_button commentbtn">Comment</div>
					<!--<a class="commentbtn" href="#"></a>-->
				</div>
			</div>
				<!-- Comment area ends-->
														
                                                    </div>
													
													
														