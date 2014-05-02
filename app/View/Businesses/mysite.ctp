
<div class="container">

<?php  echo $this->element('business/ads'); ?>

<div class="col-md-12">

<div class="btn-group" style="margin-bottom:10px;">
<?php
	$limit = 14;
	echo $this->element('business/category', array('limit'=>$limit));
?>
  </div>

</div>

  <?php  echo $this->element('business/login',array('user_id'=>$user['User']['id'])); ?>
  <?php  echo $this->element('business/channelbanner'); ?>


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
			$fix = 'fix';
            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit, 'fix' =>$fix)); 
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
        <div class="panel-heading"><a href="#" class="black"><span class="fa fa-fire"></span> Hot Games!</a>
        </div>
          <div class="panel-body">

      
          <?php  
            $div = "<div class='col-xs-6' style='padding:0px 15px 0px 5px;'>";
            $limit = 6;
            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit)); 
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
         	<div class="panel-heading"><a href="#" class="black"><span class="fa fa-flash"></span> New Games!</a></div>
         	<div class="panel-body">

          <?php  
            $div = "<div class='col-xs-12' style='padding:0px;'>";
            $limit = 3;
            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit)); 
          ?>

          </div>
        </div>


	   </div>
      </div>

  </div><!--/right-->


<?php  echo $this->element('business/ads'); ?>


<!--/footer-->
  <div class="col-sm-12">

     <div class="row">
      <div class="col-xs-12">
        
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Recommended Games</h3>
      </div>
      <div class="panel-body">

          <?php  
            $div = "<div class='col-xs-3' style='padding:5px;'>";
            $limit = 8;
            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit)); 
          ?>



      </div>
    </div>


     </div>
      </div>


  </div><!--/footer-->

<?php  echo $this->element('business/ads'); ?>


</div><!-- /.container -->

<?php  echo $this->element('business/footer'); ?>
