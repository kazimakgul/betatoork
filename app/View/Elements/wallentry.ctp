          <?php foreach ($entries as $entry): ?>
          <?php 
          $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($entry['Game']['id'])));
          $channelurl=$this->Html->url(array("controller" => $entry['User']['seo_username'],"action" =>"")); 
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
                            
                            <span class='st_sharethis_hcount' displayText='ShareThis'></span>
                            <span class='st_facebook_hcount' displayText='Facebook'></span>
                            <span class='st_twitter_hcount' displayText='Tweet'></span>
                            <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                            <span class='st_email_hcount' displayText='Email'></span>

                            </div>
                            <div class="date"><p style="font:Verdana, Geneva, sans-serif; color:#0d7ac2; font-size:11px;  font-weight: bold; margin-top:-48px; margin-left:600px;"><?php echo $entry['Game']['created'] ?></p></div>
                      </div>
              <div class="sep"></div>
                       </li>

           <?php endforeach; ?>