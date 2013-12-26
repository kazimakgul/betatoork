<?php 
$channelurl=$this->Html->url(array("controller" => $seo_username,"action" =>"")); 
// User Avatar
   if($gravatar)
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $cface=$this->Upload->image($userdata,'User.picture',array(),array('width'=>'25','onerror'=>'imgError(this,"avatar");'));
   }
   else
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $cface=$this->Upload->image($userdata,'User.picture',array(),array('width'=>'25','onerror'=>'imgError(this,"avatar");'));
   }
// End Avatar
?>


<div style=" border-top-style:solid; border-right-style:none; border-left-style:none; border-bottom-style:none;  border-radius:0px; -moz-border-radius:0px; -webkit-border-radius:0px; margin:5px -20px 5px -20px; padding:5px 20px 0px 20px;" class="well" id="stcommentbody<?php echo $com_id; ?>">
<a class="stcommentdelete close" style="margin-right:5px;" href="#" id="<?php echo $com_id; ?>">  &times;</a>

   <div style="margin:5px 10px 0px 0px;" class="commentleft">
      <div >
         <?php echo $cface;?>
      </div>
   </div>

      <span class="commentusername"><a href="<?php echo $channelurl ?>"><?php echo $username; ?></a></span>
      <div style="margin-right:15px;" class="helper-font-9 stcommenttime pull-right" title="<?php echo $mtime; ?>"></div>
      <p ><small><?php echo $comment ?></small> - <small class="btn-link likecomment" id="<?php echo $com_id; ?>"><span class="buttontext">Like</span></small> <small>- <i class="elusive-thumbs-up"></i> <span class="clikecount" id="<?php echo $com_id;?>">0</span></small></p>


</div>