

<?php foreach ($users as $follower): ?>
<?php 
$followid = $follower['User']['id'];
$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
$channelurl=$this->Html->url(array("controller" => $card[7],"action" =>"")); 
$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$followid));
$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$followid));
$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$followid));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
?>
        <div id="card1" class="subcard">
            <div class="subup clearfix">
                <a class="channelname" href="<?php echo $channelurl ?>"><?php echo $card[0] ?></a>
                <a class="viewchannel" href="<?php echo $channelurl ?>"></a>

            </div>
            <div class="submid clearfix">
                <div class="cardsep"></div>
                <div class="channelavatar">
              <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $followid))); 
                } else {
                  echo $this->Upload->image($card[6],'User.picture'); }
              ?>
                </div>
                <ul>
                    <li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $card[1] ?> Added Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $card[2] ?> Favorite Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $playcounturl ?>"><?php echo $card[5] ?> Played Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $folurl ?>"><?php echo $card[4] ?> Followers</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $suburl ?>"><?php echo $card[3] ?> Subscriptions</a></li>
                </ul>

            </div>
            <div class="subdown"></div>
        </div>
					
 <?php endforeach; ?>