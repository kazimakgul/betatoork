<body id="form-product">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>
		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>
				<div class="page-title">
					Edit game form 
					
					<small class="hidden-xs">
						<strong>Edit - <?php echo $game['Game']['name']; ?></strong>
					</small>
				</div>
			</div>

			<div class="content-wrapper">
				<form id="game_add" class="form-horizontal" method="post" action="#" role="form">
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Picture
					    	<span class="help" data-toggle="tooltip" title="Display game picture">
					    		<i class="fa fa-question-circle"></i>
					    	</span>
					    </label>
					    <div class="col-sm-10 col-md-8">
					    	<div class="well">
					    		<div class="pic">

                           
                           <?php 
                           if($game['Game']['picture']!=NULL && $game['Game']['picture']!=''){
                            $bg_message="Image selected.";
                            $bg_exist=1;
                           	?>
                                   <?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('alt'=>$game['Game']['name'],'id'=>'game_image','data-src'=>'current','style'=>'width:215px;height:118px;','onerror'=>'imgError(this,"toorksize");')); ?>
                           <?php 
                            }else{
                            $bg_message="No image chosen.";
                            $bg_exist=0;	
                           	?>
					    			<img id='game_image' data-src='empty' src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" class="img-responsive">
					    	<?php }?>	
					    		


					    		</div>
			                    
			                    <div class="control-group" style="margin-bottom:5px;">
				                    <label for="post_featured_image" style='display: block;'>
				                    	Choose a picture:
				                    </label>
				                    <a data-toggle="modal" data-target="#gameChange"  href="#" class="btn btn-xs btn-default"><span class="fa fa-picture-o"></span> Choose File</a><span id='bg_message' style='margin-left:6px;'><?php echo $bg_message; ?></span>
				                </div>
				            </div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Name
					    	<span class="help" data-toggle="tooltip" title="Game name">
					    		<i class="fa fa-question-circle"></i>
					    	</span>
					    </label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" id="name" name="name" value="<?php echo $game['Game']['name']; ?>" />
					    </div>
				  	</div>
				  	<div class="form-group">
				  		<label class="col-sm-2 col-md-2 control-label">Description
					    	<span class="help" data-toggle="tooltip" title="Game description">
					    		<i class="fa fa-question-circle"></i>
					    	</span>
				  		</label>
				  		<div class="col-sm-10 col-md-8">
				  		<textarea id="desc" class="form-control" id="desc" rows="4" name="notes" style="margin-bottom: 10px; height:100px;"><?php echo $game['Game']['description']; ?></textarea>
				  		</div>
				  	</div>
				  	<div class="address">
				  		<div class="form-group">
						    <label class="col-sm-2 col-md-2 control-label">Game link
					    	<span class="help" data-toggle="tooltip" title="Game upload link">
					    		<i class="fa fa-question-circle"></i>
					    	</span>
						    </label>
						    <div class="col-sm-5 col-md-4">
						      	<input type="text" class="form-control" id="game_link" placeholder="http://socialesman.com" name="address" value="<?php echo $game['Game']['link']; ?>" />
						    </div>
						    <div class="col-sm-5 col-md-5 right">
						      	<a data-toggle="modal" data-target="#gameAdd" href="#" class="btn btn-success" title="">Upload Game File</a>
						      	<input id="game_file" type="hidden" value="empty"> 
						    </div>
						</div>
				  	</div>
				  	<div class="address">
				  		<div class="form-group">
						    <label class="col-sm-2 col-md-2 control-label">Width * Height
					    	<span class="help" data-toggle="tooltip" title="Game frame size">
					    		<i class="fa fa-question-circle"></i>
					    	</span>
						    </label>
						    <div class="col-sm-5 col-md-4">
						      	<input type="text" class="form-control" placeholder="Width" id="width" name="width" value="<?php echo $game['Game']['width']; ?>" />
						    </div>
						    <div class="col-sm-5 col-md-4 right">
						      	<input type="text" class="form-control" placeholder="Height" id="height" name="height" value="<?php echo $game['Game']['height']; ?>" />
						    </div>
						</div>
				  	</div>
				  	<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Select Category</label>
						<div class="col-sm-10 col-md-8">
<?php echo $this->Form->input('category_id',array('label'=>'','class'=>'form-control col-sm-10','default'=>$game['Game']['category_id'],array('id'=>'category') )); ?>

					    	
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Game tags</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="hidden" id="tags" style="width:100%" value="War, Race, Fight" name="tags" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
					      	<div class="checkbox">
					        	<label>
					          		<input type="checkbox" id="fullscreen" name="send_marketing" <?php if($game['Game']['fullscreen']){echo 'checked';} ?> /> Full Screen
					    	<span class="help" data-toggle="tooltip" title="game size full screen">
					    		<i class="fa fa-question-circle"></i>
					    	</span>
				        		</label>
					      	</div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
					      	<div class="checkbox">
					        	<label>
					          		<input type="checkbox" id="mobile" name="send_marketing" <?php if($game['Game']['mobileready']){echo 'checked';} ?> /> Mobile Ready
					    	<span class="help" data-toggle="tooltip" title="Suitable for mobile">
					    		<i class="fa fa-question-circle"></i>
					    	</span>
				        		</label>
					      	</div>
					    </div>
				  	</div>
				  	<div class="form-group">
				  		<input type="hidden" name="attr" id="attr" value="game_add" />
				  		<input type="hidden" name="new_data" id="new_data" value="0" />
				  		<input type="hidden" name="game_id" id="game_id" value="<?php echo $game['Game']['id']; ?>" />
					</div>
				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
				      		<button id="NewButton" class="btn btn-success">Save Changes</button>
			    		</div>
				  	</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Game Image Change Modal begins -->
    <div class="modal fade" id="gameChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                <?php 
        $url=$this->Html->url(array('controller'=>'uploads','action'=>'images','new_game',$user['User']['id']));
        ?>
                <iframe id='gameframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
            </div>
        </div>
    </div>
  <!-- Game Image Change Modal ends -->      

  <!-- Game Add Modal begins -->
    <div class="modal fade" id="gameAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                <?php 
        $url=$this->Html->url(array('controller'=>'uploads','action'=>'games','game_upload',$user['User']['id']));
        ?>
                <iframe id='gameaddframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
            </div>
        </div>
    </div>
  <!-- Game Add Modal ends -->   

</body>