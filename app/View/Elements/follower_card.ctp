

<?php foreach ($followers as $follower): ?>
<?php $card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card',$follower['Subscription']['subscriber_id'])); ?>
        <div id="card1" class="subcard">
            <div class="subup clearfix">
                <a class="channelname" href="javascript:void();"><?php echo $card[0] ?></a>
                <a class="viewchannel" href="javascript:void();"></a>
                <a class="block" href="javascript:void();"></a>
            </div>
            <div class="submid clearfix">
                <div class="cardsep"></div>
                <div class="channelavatar">
                    <img alt="" src="image/channelavatar/channel_avatar.jpg" />
                </div>
                <ul>
                    <li class="clearfix"><a class="" href="javascript:void();"><?php echo $card[1] ?> Added Games</a></li>
                    <li class="clearfix"><a class="" href="javascript:void();"><?php echo $card[2] ?> Favorite Games</a></li>
                    <li class="clearfix"><a class="" href="javascript:void();">- Played Games</a></li>
                    <li class="clearfix"><a class="" href="javascript:void();"><?php echo $card[4] ?> Followers</a></li>
                    <li class="clearfix"><a class="" href="javascript:void();"><?php echo $card[3] ?> Subscriptions</a></li>
                </ul>

            </div>
            <div class="subdown"></div>
        </div>
					
 <?php endforeach; ?>