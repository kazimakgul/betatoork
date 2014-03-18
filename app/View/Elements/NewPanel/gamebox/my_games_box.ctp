<?php if($mygames==NULL){ echo "<div class='elusive-plus-sign color-blue media well shadow span5' style='background-color:white;'> You haven't added any games yet.</div>";} ?>


<?php foreach ($mygames as $game): ?>
<?php





if(isset($game['Gamestat'][0]['playcount'])){$playcount=$game['Gamestat'][0]['playcount'];}else{$playcount=0;}
if(isset($game['Gamestat'][0]['favcount'])){$favcount=$game['Gamestat'][0]['favcount'];}else{$favcount=0;}
if(isset($game['Gamestat'][0]['channelclone'])){$channelclone=$game['Gamestat'][0]['channelclone'];}else{$channelclone=0;}
if(isset($game['Gamestat'][0]['potential'])){$potential=$game['Gamestat'][0]['potential'];}else{$potential=0;}
if(isset($game['Game']['rate_count'])){$ratecount=$game['Game']['rate_count'];}else{$ratecount=0;}



//echo 'Playcount'.$playcount.'<br>';
//echo 'Favcount'.$favcount.'<br>';
//echo 'Channelclone'.$channelclone.'<br>';
//echo 'potential'.$potential.'<br>';

if($game['Game']['seo_url']!=NULL)
{
      if($game['Game']['embed']!=NULL)
      $playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'playgame'));
    else
    $playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'playframe'));
}
else{
    $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($game['Game']['id'])));
}

?>	
<?php $editurl=$this->Html->url(array( "controller" => "games","action" =>"edit2",h($game['Game']['id']))); ?>
<?php $deleteurl=$this->Html->url(array( "controller" => "games","action" =>"delete",h($game['Game']['id']))); ?>



                                                    <tr class="gradeA odd" id="my_thumb_<?php echo $game['Game']['id']; ?>">
                                                        <td class=" sorting_1">

                                          <div class="span12">
                                          <a class="thumbnail" href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('alt'=>$game['Game']['name'],'width'=>'720','height'=>'110','onerror'=>'imgError(this,"toorksize");')); ?></a>
                                          <p><?php echo  $this->element('NewPanel/rating_stars_16',array('game'=>$game)); ?></p>
                                          </div>

                                                        </td>
                                                        <td class="span8"><?php echo $game['Game']['name']; ?>
                                                            <p><?php echo $game['Game']['description']; ?></p>
                                                            <p>
                                                             <span class="label label-warning"><?php echo $playcount; ?> Plays</span>
                                                              <span class="label label-info"><?php echo $channelclone; ?> Clones</span>
                                                              <span class="label label-success"><?php echo $favcount;?> Favorites</span>
                                                              <span class="label label-important"><?php echo $ratecount; ?> Rates</span>

                                                            </p>
                                                        </td>
                                                        <td class=" ">Created : <?php echo $game['Game']['created']; ?></td>
                                                        <td class=" "></td>
                                                        <td class=" ">
                                                             <div class="btn-group">
                                                              <button class="btn">Modify</button>
                                                              <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                              <ul class="dropdown-menu">
                                                                <li><a href="<?php echo $editurl ?>">Edit</a></li>
                                                                <li><a href="#myModal<?php echo $game['Game']['id']; ?>" data-toggle="modal">Delete</a></li>

                <div id="myModal<?php echo $game['Game']['id'];?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Delete <?php echo $game['Game']['name']; ?> ?</h3>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this game? There is no undo.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No</button>
                            <button onclick="gamedelete('<?php echo $game['Game']['name']; ?>',user_auth,<?php echo $game['Game']['id']; ?>);" class="btn btn-danger">Yes! Delete</button>
 
                        </div>
                </div>


                                                                <li class="divider"></li>
                                                                <li><a href="#">UnPublish</a></li>
                                                              </ul>
                                                            </div>

                                                        </td>
                                                        
                                                    </tr>


 <?php endforeach; ?>
