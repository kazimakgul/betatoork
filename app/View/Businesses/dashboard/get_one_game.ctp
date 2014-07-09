<?php
                           
                                $name = $game['Game']['name'];
                                $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
                                $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
                                $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
                                $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
                                if (Configure::read('Domain.type') == 'subdomain') {
                                    $playurl = $this->Html->url(array("controller" => 'play', "action" => h($game['Game']['seo_url'])));
                                } else {
                                    $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
                                }
                                ?>
                                <div class="game col-sm-4 panel">
                                    <a data-dismiss="alert" id="clone-<?php echo $game['Game']['id']; ?>" onclick="chaingame3('<?php echo $name; ?>', user_auth,<?php echo $game['Game']['id']; ?>);" class="btn btn-success startUpClone get_new_game"><i class="fa fa-cog "></i> Clone</a>
                                    <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");', 'width' => '200px', 'height' => '110px')); ?>
                                    <div class="name">
                                        <a href="<?php echo $playurl ?>" style="color:#000000">
                                            <?php echo $name ?>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            
                            ?>