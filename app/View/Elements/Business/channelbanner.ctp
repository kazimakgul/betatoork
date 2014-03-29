<?php 
    $image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62)); 
    $followNo = $user['Userstat']['subscribeto']; 
    $gameNo = $user['Userstat']['uploadcount'];
?>    
    <div class="col-md-12">

                <?php if($user['User']['banner']==null) { ?>
                <div style="background-image:url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg)">
                <?php } else { ?>
                <div style="background-image:url(<?php echo Configure::read('S3.url')."/upload/users/".$user['User']['id']."/".$user['User']['banner'];?>)">
                <?php } ?>

                    <?php 
                    $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                      if($user['User']['picture']==null) { 
                        echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'pic img-circle img-thumbnail',"alt" => "clone user image")); 
                        } else {
                          echo $this->Upload->image($user,'User.picture',array(),array('class'=>'pic img-circle img-thumbnail','onerror'=>'imgError(this,"avatar");'));  }
                    ?>

                    <div class="name">
                      <a class="btn btn-primary"><i class="fa fa-plus-circle"></i> Follow - <?php echo $followNo;?></a>
                      <a class="btn btn-danger"><i class="fa fa-gamepad"></i> Games - <?php echo $gameNo;?></a>
                    </div>

                

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