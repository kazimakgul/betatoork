<div class="container">
<?
$controls=NULL;
if($this->Session->read('Auth.User.id')==$user['User']['id']){
	$controls=$user['User']['id'];
}

echo $this->element('business/ads',array('controls'=>$controls)); ?>

<div class="col-md-12">
	<div class="btn-group" style="margin-bottom:10px;">
	<?php
	$limit = 14;
	echo $this->element('business/category', array('limit'=>$limit,'userid'=>$user['User']['id']));
	?>
  </div>

</div>

  <?php  echo $this->element('business/login',array('user_id'=>$user['User']['id'])); ?>
  <?php  echo $this->element('business/channelbanner',array('controls'=>$controls)); ?>


<!--/footer-->
  <div class="col-sm-12">

     <div class="row">
      <div class="col-xs-12">
        
<div class="panel panel-primary">
      <div class="panel-heading">
         <ul class="nav pull-right" style='margin-top:-8px;'>
            <li class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				      Filter/Sort
				      <span class="caret"></span>
				    </button>
                <ul class="dropdown-menu">
 					<li><?php echo $this->Paginator->sort('name','Sort By Name',array('direction'=>'asc')); ?></li>
                   	<li><?php echo $this->Paginator->sort('created','Sort by Date'); ?></li>
					<li><?php echo $this->Paginator->sort('starsize','Sort By Rate',array('direction'=>'asc')); ?></li>
					<li><?php echo $this->Paginator->sort('rate_caount','Sort By Rate Count',array('direction'=>'asc')); ?></li>
                </ul>
            </li>
             <form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default">Submit</button>
		      </form>
        </ul>
       
         <h3 class="panel-title"><?=$games[0]['Category']['name'];?> Category Games</h3>
      </div>
      
      <div class="panel-body">
          <?php  
            $div = "<div class='col-xs-3' style='padding:5px;'>";
            $limit = 24;
            echo $this->element('business/games/box',array('div'=>$div)); 
          ?>
          	<div style="clear: both;">
		        <ul  class="pagination">
		            <li><?php echo $this->Paginator->prev(__('Prev', true), array(), null, array('class'=>'disabled'));?></li>
		            <li><?php echo $this->Paginator->numbers(); ?></li>
		            <li><?php echo '  '.$this->Paginator->next(__('Next', true), array('id'=>'next'), null, array('class' => 'disabled'));?></li>
		        </ul>
		    </div>
      </div>
    </div>


     </div>
      </div>


  </div><!--/footer-->

<?php  echo $this->element('business/ads',array('controls'=>$controls)); ?>


</div><!-- /.container -->

<?php  echo $this->element('business/footer'); ?>
