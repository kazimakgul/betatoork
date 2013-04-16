<div class="navbar navbar-fixed-bottom">
  <div class="header-control">
      <div class="navbar-inner" style="-webkit-border-radius: 0; -moz-border-radius: 0; border-radius: 0;">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
            <div class="row-fluid">

              <div class="span3">
<a class="btn" style="margin:5px;" href="<?php echo $profilepublic; ?> ">  
  <?php 
  if($game['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'12',"alt" => "toork avatar image",'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($game,'User.picture',array(),array('align'=>'middle','title'=>'myUsername','width'=>'12','onerror'=>'imgError(this,"avatar");')); }
  ?> <?php echo $game['User']['username'] ?> <i class="color-red icofont-bolt"></i>
</a>

              </div>

<!-- Google SEO icin -> arama motorunda oyunlarin yildizlarini aldigi oy sayisini gostermesi icin gerekli.

Ornek=1:
<div itemscope itemtype="http://schema.org/Product">
  <img itemprop="image" src="dell-30in-lcd.jpg" />
  <span itemprop="name">Dell UltraSharp 30" LCD Monitor</span>

  <div itemprop="aggregateRating"
    itemscope itemtype="http://schema.org/AggregateRating">
    <span itemprop="ratingValue">37</span>
    out of <span itemprop="bestRating">100</span>
    based on <span itemprop="ratingCount">24</span> user ratings
  </div>

 <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <span itemprop="price">$0</span>
  </div>

  Product description:
  <span itemprop="description">0.7 cubic feet countertop microwave.
  Has six preset cooking categories and convenience features like
  Add-A-Minute and Child Lock.</span>

</div>

Ornek=2:
<div xmlns:v="http://rdf.data-vocabulary.org" typeof="v:Review-aggregate">

   <span rel="v:rating">
    <span class="rating" property="v:average">4.3</span>
        <span id="rating-count"> <span property="v:votes">418</span> ratings </span>
   </span>

</div>
-->

              <div class="span4 helper-font-32">
                 <div class="pull-right" style="margin-top:5px;">
                      <i class="elusive-star"></i>
                      <i class="elusive-star"></i>
                      <i class="elusive-star"></i>
                      <i class="elusive-star"></i>
                      <i class="elusive-star-empty"></i>
                    </div>
              </div>
              <div class="span4 helper-font-32">
                <ul>
                  <li rel="tooltip" data-placement="top" data-original-title="Next Game" class="btn pull-right color-blue" style="margin:5px;">
                      <i class="elusive-fire"></i> Next <i class="elusive-circle-arrow-right"></i>
                  </li>
                  <li rel="tooltip" data-placement="top" data-original-title="Add to Favorites" class="btn pull-right color-red" style="margin:5px;">
                      <i class="elusive-heart"></i>
                      <i class="elusive-heart-empty"></i>
                  </li>
                 <li rel="tooltip" id="comment" data-toggle="popover" data-placement="top" data-html="true" title="Comment" data-placement="top" data-original-title="Comment" class="btn pull-right color-green" style="margin:5px;"data-content='

                <form class="navbar-form ">
                    <textarea class="span12" rows="4" placeholder="What do you think about this game?">#<?php echo $game["Game"]["seo_url"];?> </textarea>
                 </br>
                  <button type="submit" class="btn btn-info pull-right update_data">Comment</button>
                </form></br>
                  '>
                      <i class="elusive-comment"></i>
                  </li>
                 <li rel="tooltip" id="ratebarshare" data-toggle="popover" data-placement="top" data-html="true" title="Share" data-placement="top" data-original-title="Share" class="btn pull-right color-blue" style="margin:5px;"data-content='

                        <a class="btn btn-info">
                            <div class="helper-font-16">
                            <i class="icofont-facebook"> share</i>
                            </div>
                        </a>
                        <a class="btn btn-danger">
                            <div class="helper-font-16">
                            <i class="icofont-pinterest"> share</i>
                            </div>
                        </a>
                        <a class="btn btn-info">
                            <div class="helper-font-16">
                            <i class="icofont-twitter"> share</i>
                            </div>
                        </a>
                        <a class="btn btn-danger">
                            <div class="helper-font-16">
                            <i class="icofont-google-plus"> share</i>
                            </div>
                        </a>

                  '>
                      <i class="elusive-share"></i>
                  </li>

                </ul>
              </div>
            </div>

<?php
if($this->Session->check('Auth.User')){
?>

        <button style="margin:-30px 0px 0px 0px;" onclick="$.pnotify({
            title: 'Rate Bar Removed',
            text: 'If you want to have your rate bar back, Just refresh your browser.',
            type: 'info'
          });"  rel="tooltip" data-placement="top" data-original-title="Remove This Bar" data-box="close" data-hide="fadeOut" class="close"><i class="elusive-remove-circle"></i></button> 

<?php
}else{
?>

        <button style="margin:-30px 0px 0px 0px;" onclick="$.pnotify({
            title: 'Sign Up For Free',
            text: 'If you want to remove this rate bar, You have to be a member of Toork. Dont worry its for free',
            type: 'error'
          });"  rel="tooltip" data-placement="top" data-original-title="Remove This Bar" class="close"><i class="elusive-remove-circle"></i></button> 

<?php
}
?>

          </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
      </div><!-- /navbar-inner -->
    </div>
  </div>