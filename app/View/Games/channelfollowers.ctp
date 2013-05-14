<?php foreach ($followers as $follower): ?>
<?php 
$followid = $follower['Subscription']['subscriber_id'];
$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
$channelurl=$this->Html->url(array("controller" => $card[7],"action" =>"")); 
$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$followid));
$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$followid));
$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$followid));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
?>



<?php 
if($card[6]['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($card[6]['User']['seo_username']),"action" =>'')); 
}
else
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$followid));

?>	


<div class="row-fluid span4" style="margin:0px 7px 0px 7px;">
    <div class="navbar"><div class="navbar-inner"  style="padding:5px 15px 5px 5px;">
    <a class="span3" href="<?php echo $profileurl ?>" style="margin:0px 20px 0px 0px;">
            <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("class"=>"img-polaroid img-rounded","alt" => "toork avatar image",'width'=>'60')); 
                } else {
                  echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('width'=>'60',"class"=>"img-polaroid img-rounded",'onerror'=>'imgError(this,"avatar");'));  }
            ?>
    </a>
    
    <div class="span7" style="margin:-10px 10px 0px -25px;">
        

<ul style="padding-left:0px; list-style:none" class="nav-list">
  <li ><h5><a class="btn" href="<?php echo $profileurl ?>"><?php echo $card[0] ?></a></h5></li>
  <li><?php echo $card[4] ?> Followers</a></li>
  <li><?php echo $card[1] ?> Games</a></li>
</ul>

    </div>

</div>
</div>

</div>


			
 <?php endforeach; ?>
 
 <!--Hidden Pagination -->
	<div class="paging" style="display:none;">
    <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
     echo $this->Paginator->numbers();
     echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
    </div>
  <!--Hidden Pagination -->