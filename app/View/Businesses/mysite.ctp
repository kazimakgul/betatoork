
<div class="container">
<?php

$subgameurl		=$this->Html->url(array("controller" => "businesses","action" =>"toprated",$user['User']['id']));
$channelsettings=$this->Html->url(array("controller" => "businesses","action" =>"settings"));

//Getting and declaring ads datas
$homeBannerTop=$addata[0]['homeBannerTop'];
$homeBannerMiddle=$addata[0]['homeBannerMiddle'];
$homeBannerBottom=$addata[0]['homeBannerBottom'];

if($this->Session->read('Auth.User.id')==$user['User']['id']){
	$controls=$user['User']['id'];
}else{
  $controls=NULL;
}

echo $this->element('business/ads',array('controls'=>$controls,'code'=>$homeBannerTop,'adtype'=>'homeBannerTop')); ?>

<div class="col-md-12">
<div class="btn-group" style="margin-bottom:10px;">
<?php
	$limit = 14;
	echo $this->element('business/category', array('limit'=>$limit,'userid'=>$user['User']['id']));
?>
  </div>
</div>
  <?php  echo $this->element('business/channelbanner',array('controls'=>$controls)); ?>


  <!--left-->
  <div class="col-xs-3">
     <div class="row">
      <div class="col-xs-12">
    	<div class="panel panel-danger">
         	<div class="panel-heading"><a href="#" class="black"><span class="glyphicon glyphicon-star"></span> Featured Games</a>
          </div>
         	<div class="panel-body">
          <?php  
            $div = "<div class='col-xs-12' style='padding:0px;'>";
            $limit = 3;
			$cat = '';
			$fix = 'fix';
            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit, 'fix' =>$fix, 'controls'=>$controls, 'cat'=>$cat, 'gamedata'=>$games)); 
          ?>
          </div>
        </div>
	   </div>
      </div>


  </div><!--/left-->

  <!--center-->
  <div class="col-xs-6">

    <div class="row">

      <div class="col-xs-12">
      <div class="panel panel-info">
        <div class="panel-heading"><a href="<?=$subgameurl;?>/sort:recommend/direction:desc" class="black"><span class="fa fa-fire"></span> Hot Games!</a>
        </div>
          <div class="panel-body">
          <?php  
            $div = "<div class='col-xs-6' style='padding:0px 15px 0px 5px;'>";
            $limit = 6;
			$cat = 'recommend';
            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit,'cat'=>$cat, 'gamedata'=>$hotgames)); 
          ?>
          </div>
        </div>
      </div>


    </div>




  </div><!--/center-->


  <!--right-->
  <div class="col-xs-3">

    <div class="row">
      <div class="col-xs-12">

    	<div class="panel panel-success">
         	<div class="panel-heading"><a href="<?=$subgameurl;?>/sort:id/direction:desc" class="black"><span class="fa fa-flash"></span> New Games!</a></div>
         	<div class="panel-body">

          <?php  
            $div = "<div class='col-xs-12' style='padding:0px;'>";
            $limit = 3;
			$cat = 'id';
            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit,'cat'=>$cat, 'gamedata'=>$newgames)); 
          ?>

          </div>
        </div>


	   </div>
      </div>

  </div><!--/right-->


<?php  echo $this->element('business/ads',array('controls'=>$controls,'code'=>$homeBannerMiddle,'adtype'=>'homeBannerMiddle')); ?>


<!--/footer-->
  <div class="col-sm-12">

     <div class="row">
      <div class="col-xs-12">
        
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><a href="<?=$subgameurl;?>/sort:recommend/direction:desc" class="black">Recommended Games</a></h3>
      </div>
      <div class="panel-body">

          <?php  
            $div = "<div class='col-xs-3' style='padding:5px;'>";
            $limit = 8;
            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit, 'gamedata'=>$games)); 
          ?>
      </div>
    </div>


     </div>
      </div>


  </div><!--/footer-->

<?php  echo $this->element('business/ads',array('controls'=>$controls,'code'=>$homeBannerBottom,'adtype'=>'homeBannerBottom')); ?>


<?if($controls==$user['User']['id']){?>
          <a data-toggle="modal" data-target="#backgroundChange"  href="#" class="btn btn-xs btn-default pull-left" style="left:0px;top:60px; position:absolute;"><span class="fa fa-picture-o"></span> Change Background</a>
<?}?>


</div><!-- /.container -->
 <?php  echo $this->element('business/components/popup',array('user_id'=>$user['User']['id'])); ?>
<?php  echo $this->element('business/footer'); ?>
