
<div class="container">

<?php  echo $this->element('business/ads'); ?>

<div class="col-md-12">

<div class="btn-group" style="margin-bottom:10px;">
  <button type="button" class="btn btn-default btn-sm">Action</button>
  <button type="button" class="btn btn-default btn-sm">Adventure</button>
  <button type="button" class="btn btn-default btn-sm">MMO</button>
  <button type="button" class="btn btn-default btn-sm">Kids</button>
  <button type="button" class="btn btn-default btn-sm">Girls</button>
  <button type="button" class="btn btn-default btn-sm">Words</button>
  <button type="button" class="btn btn-default btn-sm">Socials</button>
  <button type="button" class="btn btn-default btn-sm">MMO</button>
  <button type="button" class="btn btn-default btn-sm">Kids</button>
  <button type="button" class="btn btn-default btn-sm">Girls</button>
  <button type="button" class="btn btn-default btn-sm">Words</button>
  <button type="button" class="btn btn-default btn-sm">Socials</button>
  <button type="button" class="btn btn-default btn-sm">Girls</button>
  <button type="button" class="btn btn-default btn-sm">Words</button>

  <div class="btn-group">
    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
      More...
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="#">Racing</a></li>
      <li><a href="#">Shooting</a></li>
      <li><a href="#">Racing</a></li>
      <li><a href="#">Shooting</a></li>
      <li><a href="#">Racing</a></li>
      <li><a href="#">Shooting</a></li>
    </ul>
  </div>
  </div>

</div>

  <?php  echo $this->element('business/login'); ?>
  <?php  echo $this->element('business/channelbanner'); ?>


  <!--left-->
  <div class="col-xs-3">

     <div class="row">
      <div class="col-xs-12">

    	<div class="panel panel-danger">
         	<div class="panel-heading"><a href="#" class="black"><span class="glyphicon glyphicon-star"></span> Featured Games</a>
          <a href="#" class="black pull-right" data-toggle="tooltip" data-placement="top" title="Add/Change Games" ><span class="fa fa-edit fa-2x"></span></a>
          </div>
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


  </div><!--/left-->

  <!--center-->
  <div class="col-xs-6">

    <div class="row">

      <div class="col-xs-12">
      <div class="panel panel-info">
        <div class="panel-heading"><a href="#" class="black"><span class="fa fa-fire"></span> Hot Games!</a>
          <a href="#" class="pull-right" data-toggle="tooltip" data-placement="top" title="Add/Change Games" ><span class="fa fa-edit fa-2x"></span></a>
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
        <h3 class="panel-title">All Games</h3>
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