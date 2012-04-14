

<?php foreach ($followers as $follower): ?>
<?php 
$followid = $follower['Subscription']['subscriber_to_id'];
$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
$channelurl=$this->Html->url(array("controller" => "games","action" =>"usergames",$followid));
$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$followid));
$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$followid));
$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$followid));
?>
        <div id="card1" class="subcard">
            <div class="subup clearfix">
                <a class="channelname" href="<?php echo $channelurl ?>"><?php echo $card[0] ?></a>
                <a class="viewchannel" href="<?php echo $channelurl ?>"></a>

                <?php 
                    if($this->Session->read('Auth.User.id') == $userid){ ?>
                       <a class="block" href="javascript:void();"></a>

                <?php    }
                ?>
                


            </div>
            <div class="submid clearfix">
                <div class="cardsep"></div>
                <div class="channelavatar">
                    <img alt="" src="/betatoork/img/avatar1.jpg" />
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