<?php
$x = 0;
foreach ($notifications as $lastactivity):
	$class = 'moment';
    if ($x === 0) {
        $class.= ' first';
    }
    if ($x === count($notifications) - 1) {
        $class.= ' last';
    }
    $x++;
$performername=$lastactivity['PerformerUser']['username'];
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$followid = $lastactivity['PerformerUser']['id'];
$activity_message = $this->requestAction( array('controller' => 'apis', 'action' => 'notificationMessage'),array('pass' => $lastactivity));
?>
  
          <div class="<?php echo $class ?>">
                <div class="row event clearfix">
                    <div class="col-sm-1">
                        <div class="icon">
                            <i class="fa fa-comment"></i>
                        </div>
                    </div>
                    <div class="col-sm-11 message">
<?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'50','height'=>'50','class'=>'avatar')); 
                } else {
                echo $this->Upload->image($card[6],'User.picture',array('class'=>'avatar'),array('width'=>'50','height'=>'50','onerror'=>'imgError(this,"avatar");'));  }
              ?>
<!--                        <img src="http://wolfadmin.herokuapp.com/assets/avatars/16-d920ead0154f6f2b29f34c811d563245.jpg" class="avatar">
-->                            <div class="content">
                                <a style="margin-left:9px;" href="<?php echo $profileurl ?>"><strong><?php echo $performername; ?></strong> <?php echo $activity_message;?>
                            </div>
                    </div>
                </div>
            </div>
<?php endforeach; ?>