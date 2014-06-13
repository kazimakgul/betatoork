<body id="form-product">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>
		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					New game form 
					
					<small class="hidden-xs">
						<strong>Showcase of form elements</strong>
					</small>
				</div>
			</div>

			<div class="content-wrapper">
				<form id="new-product" class="form-horizontal" method="post" action="#" role="form">
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Display picture</label>
					    <div class="col-sm-10 col-md-8">
					    	<div class="well">
					    		<div class="pic">

                           <?php 
                           if($user['User']['bg_image']!=NULL && $user['User']['bg_image']!=''){
                            $bg_message="Background selected.";
                            $bg_exist=1;
                           	?>
                                   <img id='user_background' src="<?php echo Configure::read('S3.url').'/upload/users/'.$user['User']['id'].'/'.$user['User']['bg_image']; ?>" class="img-responsive">
                           <?php 
                            }else{
                            $bg_message="No background chosen.";
                            $bg_exist=0;	
                           	?>
					    			<img id='user_background' src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" class="img-responsive">
					    	<?php }?>		


					    		</div>
			                    
			                    <div class="control-group" style="margin-bottom:5px;">
				                    <label for="post_featured_image" style='display: block;'>
				                    	Choose a picture:
				                    </label>
				                    <a data-toggle="modal" data-target="#backgroundChange"  href="#" class="btn btn-xs btn-default"><span class="fa fa-picture-o"></span> Choose File</a><span id='bg_message' style='margin-left:6px;'><?php echo $bg_message; ?></span>
				                </div>
				                <?php if($bg_exist==1){ ?>
		                        <a href="#" class="remove_bg_img">Remove Background Image</a>
		                        <?php }else{ ?>
                                <a style="display:none;" href="#" class="remove_bg_img">Remove Background Image</a>
		                        <?php } ?>
				            </div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Name</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="product[name]" />
					    </div>
				  	</div>
				  	<div class="form-group">
				  		<label class="col-sm-2 col-md-2 control-label">Description</label>
				  		<div class="col-sm-10 col-md-8">
				  		<textarea id="desc" class="form-control" id="desc" rows="4" name="customer[notes]" style="margin-bottom: 10px; height:100px;"></textarea>
				  		</div>
				  	</div>
				  	<div class="address">
				  		<div class="form-group">
						    <label class="col-sm-2 col-md-2 control-label">Link</label>
						    <div class="col-sm-5 col-md-4">
						      	<input type="text" class="form-control" placeholder="http://socialesman.com" name="product[address]" />
						    </div>
						    <div class="col-sm-5 col-md-5 right">
						      	<a data-toggle="modal" data-target="#gameAdd" href="#" class="btn btn-success" title="">Upload Game File</a>
						    </div>
						</div>
				  	</div>
				  	<div class="address">
				  		<div class="form-group">
						    <label class="col-sm-2 col-md-2 control-label">Width * Height</label>
						    <div class="col-sm-5 col-md-4">
						      	<input type="text" class="form-control" placeholder="Width" name="product[address]" />
						    </div>
						    <div class="col-sm-5 col-md-4 right">
						      	<input type="text" class="form-control" placeholder="Height" name="product[address]" />
						    </div>
						</div>
				  	</div>
				  	<div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Select Category</label>
					    <div class="col-sm-10 col-md-8">
					    	<select class="form-control" data-smart-select>
					    		<option>Upgrade</option>
					    		<option>War</option>
					    		<option>Zombie</option>
					    		<option>Wacom</option>
					    		<option>Flying</option>
					    		<option>Race</option>
					    		<option>Fight</option>
					    	</select>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Game tags</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="hidden" id="tags" style="width:100%" value="War, Race, Fight" name="product[tags]" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
					      	<div class="checkbox">
					        	<label>
					          		<input type="checkbox" name="product[send_marketing]" /> Full Screen
				        		</label>
					      	</div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
					      	<div class="checkbox">
					        	<label>
					          		<input type="checkbox" name="product[send_marketing]" /> Mobile Ready
				        		</label>
					      	</div>
					    </div>
				  	</div>
				  	<div class="form-group">
				  		<input type="hidden" name="" id="" value="" />
					</div>
				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
				      		<button type="submit" class="btn btn-success">Upload Game</button>
			    		</div>
				  	</div>
				</form>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$(function () {

			// Form validation
			$('#new-product').validate({
				rules: {
					"product[first_name]": {
						required: true
					},
					"product[email]": {
						required: true,
						email: true
					},
					"product[address]": {
						required: true
					},
					"product[notes]": {
						required: true
					}
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});


			// Bootstrap wysiwyg
			$("#summernote").summernote({
				height: 240,
				toolbar: [
				    ['style', ['style']],
				    ['style', ['bold', 'italic', 'underline', 'clear']],
				    ['fontsize', ['fontsize']],
				    ['para', ['ul', 'ol', 'paragraph']],
				    ['height', ['height']],
				    ['insert', ['picture', 'link', 'video']],
				    ['view', ['fullscreen', 'codeview']],
				    ['table', ['table']],
				]
			});

			// jQuery rating
			$('#raty').raty({
				path: 'images/raty',
				score: 4
			});

			// Datepicker
	        $('.datepicker').datepicker({
	        	autoclose: true,
	        	orientation: 'left bottom',
	        });

	        // Minicolors colorpicker
	        $('input.minicolors').minicolors({
	        	position: 'top left',
	        	defaultValue: '#9b86d1',
	        	theme: 'bootstrap'
	        });

	        // masked input example using phone input
			$(".mask-phone").mask("(999) 999-9999");
			$(".mask-cc").mask("9999 9999 9999 9999");
		});
	</script>

</body>