
<!bu issetli uid yi 0'a esitleyen bolum gereksiz aslinda.->
    <?php

    if(!isset($uid)){
      $uid=0;
    }

    if(isset($gamepost)){
          $time=$gamepost['created'];
          $mtime=date("c", $time);
          $msg_id=$gamepost['id'];
          $msg_uid=$gamepost['user_id'];
          $type = $gamepost['type'];
          $gameid = $gamepost['game_id']; 
          $message = $gamepost['message'];
          $postPage=$this->Html->url(array("controller" => "wallentries","action" =>"posts",$msg_id));
        }else{
          $mtime='long time ago';
          $msg_id=$game['Game']['id'];
          $msg_uid=$game['Game']['user_id'];
          $type = 1;
          $gameid = $game['Game']['id'];
          $message = 'This game is published long time ago.';
          $postPage=$this->Html->url(array("controller" => "wallentries","action" =>"posts",$msg_id));
        }
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
                                                        <h4 class="media-heading"><a href="<?php echo $channelurl ?>"><?php echo $game['User']['username']; ?> </a><small class="pull-right helper-font-small"><a href='<?php echo $postPage; ?>' class="timeago" title='<?php echo $mtime; ?>'><?php echo $mtime;?></a></small></h4>
                                                            <p style="margin-left:60px;"><?php echo $message; ?></p>
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
       <div class="well shadow feedcontent clearfix span11" style="margin:20px; margin-bottom:30px; padding:5px;">
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
<div style="background-color:#f5f5f5; padding:30px 20px 30px 20px; margin:-20px; padding-top:0px; margin-bottom:-45px; ">               

      </br>
          <?php if(isset($uid)) {?>
              <div>
              <a href="#" class="btn btn-mini commentopen" id="<?php echo $msg_id;?>"><i class="elusive-comment"></i> Comment</a>
			         <input type="hidden" id="msg_uid<?php echo $msg_id;?>" value="<?php echo $msg_uid;?>"/>
              <a href="#" class="btn btn-mini" id="<?php echo $msg_id;?>"><i class="elusive-thumbs-up"></i> Like</a>
              <a href="#" class="btn btn-mini" id="<?php echo $msg_id;?>"><i class="elusive-share-alt"></i> Share</a>              
        <?php }?></div>

          <div style="margin-top:10px;" id="commentload<?php echo $msg_id;?>">
      <?php
        $x=1;
        echo $this->element('NewPanel/load_comments_boot',array('msg_id'=>$msg_id,'x'=>$x,'msg_uid'=>$msg_uid)); 
      ?>
      </div>      

      <div class="row-fluid commentupdate clearfix" style='margin-top: 10px; display:block' id='commentbox<?php echo $msg_id;?>'>

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
</div>

        <!-- Comment area ends-->                   
                            
</div>
