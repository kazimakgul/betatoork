          <?php foreach ($entries as $entry): ?>
          <?php 
          $channelurl=$this->Html->url(array("controller" => $entry['User']['seo_username'],"action" =>"")); 
          ?> 
<?php 
if($entry['Game']['seo_url']!=NULL)
$playurl=$this->Html->url(array( "controller" => h($entry['User']['seo_username']),"action" =>h($entry['Game']['seo_url']),'play'));
else
$playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($entry['Game']['id'])));
 ?> 

                    <li>
                          <div class="wallframe"><a href="<?php echo $playurl ?>" >
<?php echo $this->Upload->image($entry,'Game.picture',array('style' => 'toorksize'),array('width'=>'100','alt'=>$entry['Game']['name'])); ?></a>
                          
                          </div>
                            <div class="walllinks">
                            <div class="channelname"><a href="<?php echo $channelurl ?>"><?php echo $entry['User']['username']?></a></div>
                            <div class="wallinfo"><p> added <?php echo $entry['Game']['name'];?>  to its channel </p></div>
                            <div class="letsbtn"><a href="<?php echo $playurl?>">Lets Play</a></div>
                            <div class="socials" style = "margin-left:50px; margin-top:10px">
                            
                            
                            
							<a href='http://rest.sharethis.com/share/sharer.php?destination=facebook&url=http://ec2-107-22-53-193.compute-1.amazonaws.com/gameringa&pub_key=a3cce920-3a6b-47a8-a890-d27d55cbc9e8&access_key=512db7bf2cce2acb63fad31b31067e27' class="st_facebook_hcount" displaytext="Facebook" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton"><span><span class="stMainServices st-facebook-counter" style="background-image: url(http://w.sharethis.com/images/facebook_counter.png); ">&nbsp;<img src="http://w.sharethis.com/images/check-big.png" style="position: absolute; top: -7px; right: -7px; width: 19px; height: 19px; max-width: 19px; max-height: 19px; display: none; "></span><span class="stArrow"><span class="stButton_gradient stHBubble" style="display: inline-block; "><span class="stBubble_hcount">3</span></span></span></span></span></a>
							
							
                            <span class='st_twitter_hcount' displayText='Tweet'></span>
                            <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                            <span class='st_email_hcount' displayText='Email'></span>

                            </div>
                            <div class="date"><p style="font:Verdana, Geneva, sans-serif; color:#0d7ac2; font-size:11px;  font-weight: bold; margin-top:-48px; margin-left:600px;"><?php echo $entry['Game']['created'] ?></p></div>
                      </div>
              <div class="sep"></div>
                       </li>

           <?php endforeach; ?>