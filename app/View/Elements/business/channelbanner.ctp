<?php 
    $image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62)); 
    $followNo = $user['Userstat']['subscribeto']; 
    $gameNo = $user['Userstat']['uploadcount'];
?>    


    <div class="showhim col-md-12">

                <?php if($user['User']['banner']==null) { ?>
                <div style="background-image:url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg)">
                <?php } else { ?>
                <div style="background-image:url(<?php echo Configure::read('S3.url')."/upload/users/".$user['User']['id']."/".$user['User']['banner'];?>)">
                <?php } ?>

                    <?php 
                    $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                      if($user['User']['picture']==null) { 
                        echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'pic circular img-thumbnail',"alt" => "clone user image")); 
                        } else {
                          echo $this->Upload->image($user,'User.picture',array(),array('id'=>'user_avatar','class'=>'pic circular img-thumbnail','onerror'=>'imgError(this,"avatar");'));  }
                    ?>

                    <div class="name">
                        <div class="showme">
                            <a data-toggle="modal" data-target="#pictureChange"  href="#" class="btn btn-xs btn-default pull-left" style="margin:10px 0px 10px -125px; position:absolute;"><span class="fa fa-picture-o"></span> Change</a>
                        </div>
                      <a class="btn btn-primary"><i class="fa fa-plus-circle"></i> Follow - <?php echo $followNo;?></a>
                      <a class="btn btn-danger"><i class="fa fa-gamepad"></i> Games - <?php echo $gameNo;?></a>
                    </div>

<a href="#" class="btn btn-xs btn-default pull-left" style="margin:10px 0px 10px -150px; position:absolute;"><span class="fa fa-picture-o"></span> Change Cover</a>

<?php
$website=$user['User']['website'];
$facebook=$user['User']['fb_link'];
$twitter=$user['User']['twitter_link'];
$gplus=$user['User']['gplus_link'];
if($website==NULL){

}else{
                    echo " <a href='$website'' class='btn btn-xs btn-success pull-right' style='margin:10px;'><span class='fa fa-globe'></span> $website</a>";
}
if($facebook==NULL){

}else{
                    echo " <a href='$facebook' class='btn btn-xs btn-primary pull-right' style='margin:10px;'><span class='fa fa-facebook-square'></span> Facebook</a>";
}
if($gplus==NULL){
                    
}else{
                    echo " <a href='$gplus' class='btn btn-xs btn-danger pull-right' style='margin:10px;'><span class='fa fa-google-plus-square'></span> Google+</a>";
}
if($twitter==NULL){
                    
}else{
                    echo " <a href='$twitter' class='btn btn-xs btn-info pull-right' style='margin:10px;'><span class='fa fa-twitter-square'></span> Twitter</a>";
}
?>


            




                </div>
                
    <br><br><br><br>
    
    </div>