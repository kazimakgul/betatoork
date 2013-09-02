

          <?php 
          $time=$gamepost['created'];
          $mtime=date("c", $time);
          $msg_id=$gamepost['id'];
          $msg_uid=$gamepost['user_id'];
          $type = $gamepost['type'];
          $gameid = $gamepost['game_id']; 
          $channelurl=$this->Html->url(array("controller" => $game['User']['seo_username'],"action" =>""));

          // User Avatar
   if($gravatar)
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $session_face=$this->Upload->image($userdata,'User.picture',array(),array('width'=>'30','onerror'=>'imgError(this,"avatar");'));
    
    $userdata2 = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$msg_uid));
    $cface=$this->Upload->image($userdata2,'User.picture',array(),array("class"=>"img-polaroid",'width'=>'40','onerror'=>'imgError(this,"avatar");'));
   }
   else
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $session_face=$this->Upload->image($userdata,'User.picture',array(),array('width'=>'30','onerror'=>'imgError(this,"avatar");'));
       $userdata2 = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$msg_uid));
    $cface=$this->Upload->image($userdata2,'User.picture',array(),array("class"=>"img-polaroid",'width'=>'40','onerror'=>'imgError(this,"avatar");'));
   }
// End Avatar

          ?>

<div class="span7 media well shadow" style="background-color:white;" id="stbody<?php echo $msg_id;?>">
                                                        <a class="pull-left" href="#">
                                                            
                              <?php echo $cface; ?>
                                                        </a>
                                                        <h4 class="media-heading"><a href="<?php echo $channelurl ?>"><?php echo $game['User']['username']; ?> </a><small class="pull-right helper-font-small"><a href='#' class="timeago" title='<?php echo $mtime; ?>'></a></small></h4>
                                                            <p style="margin-left:60px;"><?php echo $gamepost['message']; ?></p>
                                                        <hr size="1">

                                                        <div class="media-body" style="text-align: center; margin:-7px;">

                                                            <div class="btn-group pull-right">
                                
                                                                
            <?php if($type==1){
            $gamedata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_gamedata',$gameid));
              if($gamedata['Game']['seo_url']!=NULL)
      if($gamedata['Game']['embed']!=NULL)
      $playurl=$this->Html->url(array( "controller" => h($gamedata['User']['seo_username']),"action" =>h($gamedata['Game']['seo_url']),'playgame'));
    else
    $playurl=$this->Html->url(array( "controller" => h($gamedata['User']['seo_username']),"action" =>h($gamedata['Game']['seo_url']),'playframe'));
                    else
    $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($gamedata['Game']['id'])));
             }
             ?>
           
        

                 </div>
         
         
         
         <?php if($type==1) { 
          $gameimage=$this->Upload->image($gamedata,'Game.picture',array('style' => 'toorksize'),array('class'=>'gamethumb','alt'=>$gamename,'width'=>'200','height'=>'110','onerror'=>'imgError(this,"toorksize");'));
          ?>
       <div class="well shadow feedcontent clearfix span11" style="margin:20px; padding:5px;">
                                        <div class="feedgameavatar" style="padding-right:5px;">
                                            <?php echo $gameimage; ?>
                                        </div>   
                                        <div>
                                            <a class="gb_gamename" href="<?php echo $playurl ?>"><span class="feedgamedesctitle"><?php echo $gamename; ?></span></a>
                                            <p class="helper-font-9"><?php echo $description; ?></p>
                                        </div>                                     
                                    </div>
            <?php } ?>
            
            
          
                                                        </div>
                            
        <!-- Comment area begins -->        
          <div style="margin-top:10px;" id="commentload<?php echo $msg_id;?>">
      <?php
        $x=1;
        echo $this->element('NewPanel/load_comments_boot',array('msg_id'=>$msg_id,'x'=>$x,'msg_uid'=>$msg_uid)); 
      ?>
      </div>
      </br>
          <?php if(isset($uid)) {?>
              <a href="#" class="btn btn-mini commentopen" id="<?php echo $msg_id;?>"><i class="elusive-comment"></i> Comment</a>
              <a href="#" class="btn btn-mini" id="<?php echo $msg_id;?>"><i class="elusive-thumbs-up"></i> Like</a>
              <a href="#" class="btn btn-mini" id="<?php echo $msg_id;?>"><i class="elusive-asl"></i> Agree</a>
              <a href="#" class="btn btn-mini" id="<?php echo $msg_id;?>"><i class="elusive-thumbs-down"></i> Disagree</a>
        <?php }?>
                <?php if(isset($uid) && $uid==$msg_uid) { ?>
                <a href="#" class="btn btn-mini pull-right stdelete" id="<?php echo $msg_id;?>"><i class="elusive-trash"></i> Delete</a>
        <?php } ?>
      
      <hr size="3">
      <div class="row-fluid commentupdate clearfix" style='display:block' id='commentbox<?php echo $msg_id;?>'>

          <div class="span1">
            <?php echo $session_face;?>
          </div>

        <div class="span11">
          <textarea placeholder="Write a comment..." name="comment" maxlength="200" class="pull-right span12" rows="1" id="ctextarea<?php echo $msg_id;?>"></textarea>
          <!--<textarea class="commentarea" cols="53" rows="2"></textarea>-->
          <div type="submit"  value=""  id="<?php echo $msg_id;?>" class="pull-right comment_button btn btn-small btn-info">Comment</div>
          <!--<a class="commentbtn" href="#"></a>-->
        </div>
      </div>
        <!-- Comment area ends-->                   
                            
</div>
