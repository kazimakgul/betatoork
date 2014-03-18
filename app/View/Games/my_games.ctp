<!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">                      
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
<div class="raw-fluid span12">
<div style="background-color:white;" class=" shadow well well-small span5">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4>Add a game to your account</h4>
  <p>Adding a game to your account is as simple as doing copy/paste. Just find a web page where you play a game. That's all.</p>
  <p>
     <a rel="tooltip" data-placement="bottom" data-original-title="Add a Game" href="<?php echo $addgame; ?>" class="btn btn-danger" style="margin:0px 3px 5px 0px;">
        <i class="elusive-plus"></i> Add Game
    </a>
     <a style="margin:0px 3px 5px 0px;" rel="tooltip" id="ratebarchain" data-toggle="popover" data-placement="bottom" data-html="true" title="How to Clone?" data-original-title="How to Clone?" class="btn btn-success" data-content='
                       <p class="alert alert-info" STYLE="font-size:10pt;">
                            <i class="elusive-info-sign"></i> While you are playing a game you will see the <a class="btn btn-success btn-mini"><i class="elusive-plus-sign"></i> Clone</a> clone button at the bottom of the page on the rating bar.
                      </p>

                        <p>
 <i class="elusive-info-sign"></i> If you clone a game, a clone of the game will be created in your games section and you will be able to edit the game as you wish.
                        </p>

                       <a href="<?php echo $dashboard; ?>" class="btn btn-danger btn-small btn-block">
                            <div class="helper-font-16">
                            <i class="elusive-circle-arrow-right"> Play a Game</i>
                            </div>
                        </a>
                        <p STYLE="font-size:10pt;">
                          Its the easy way of adding a game to your channel.</p>
                  '>
        <i class="elusive-plus-sign"></i> Clone
    </a>
  </p>

</div>

<div style="background-color:white;" class="shadow alert alert-info span7">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
    <p class="pull-right">All your games total score</p>
  <h4 style="margin:0px 0px 10px 0px;"><i class="elusive-info-sign"></i> Total Insights </h4>
<div class="row-fluid">
    <div class="alert alert-success span4">
       <h3> <i class="elusive-play-alt"></i> 1242</h3>
       <h5>Game Plays</h5>
    </div>
    <div class="alert alert-info span4">
       <h3> <i class="elusive-plus-sign"></i> 239</h3>
       <h5>Clones</h5>
    </div>
    <div class="alert alert-important span4">
       <h3> <i class="elusive-heart"></i> 103</h3>
       <h5>Favorites</h5>
    </div>

</div>

</div>
</div>


<div class="row-fluid">
                                <div class="span12">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white corner-top">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a data-box="close" data-hide="bounceOutRight">×</a>
                                            </div>
                                            <span>Game Details and Dashboard</span>
                                        </div>
                                        <div class="box-body">
                                            <div id="datatablestools_wrapper" class="dataTables_wrapper form-inline" role="grid">

                                              <div class="row-fluid">
                                                <div class="span6">
                                                  <div class="btn-group">
                                                    <button class="btn btn-small dropdown-toggle" data-toggle="dropdown">Options <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#">UnPublish</a></li>
                                                      <li class="divider"></li>
                                                      <li><a href="#">Delete</a></li>
                                                    </ul>
                                                  </div>
                                              </div>
                                              <div class="span6"><div class="pull-right dataTables_filter" id="datatablestools_filter"><label>Search: <input type="text" aria-controls="datatablestools"></label></div></div></div><table id="datatablestools" class="table table-hover responsive dataTable" aria-describedby="datatablestools_info">
                                                <thead>
                                                    <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatablestools" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">Your Game Details</th></tr>
                                                </thead>
                                                
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">


                                              <?php  echo $this->element('NewPanel/gamebox/my_games_box'); ?>


                                            </tbody></table>

 <?php if($mygames!=NULL){ ?>   
  <!--Hidden Pagination -->
    <div class="pagination pagination-centered">
        <ul>
            <li><?php echo $this->Paginator->prev(__('Prev', true), array(), null, array('class'=>'disabled'));?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  '.$this->Paginator->next(__('Next', true), array('id'=>'next'), null, array('class' => 'disabled'));?></li>
        </ul>
        <div style="opacity:0.5;">
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} games out of {:count} total')));?>
        </div>
    </div>
    <!--Hidden Pagination -->
<?php } ?>

                                          </div>
                                            
                                        </div><!-- /box-body -->
                                    </div><!-- /box -->
                                </div><!-- /span -->
                            </div>



                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>                        
                    </div><!-- /content -->
                </div><!-- /span content -->