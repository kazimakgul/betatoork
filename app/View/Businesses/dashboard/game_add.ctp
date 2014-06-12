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
					    			<img src="images/product.jpg" class="img-responsive" />
					    		</div>
			                    
			                    <div class="control-group">
				                    <label for="post_featured_image">
				                    	Choose a picture:
				                    </label>
				                    <input id="post_featured_image" name="post[featured_image]" type="file">
				                </div>
			                    <div class="control-group">
		                            <label for="post_images_attributes_0_alt">Alt:</label>
		                            <input class="form-control" name="post[images_attributes][0][alt]" size="30" style="width: 50%;" type="text" />
		                        </div>
		                        <a href="#" class="remove-image">Remove image</a>
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
						    <div class="col-sm-10 col-md-8">
						      	<input type="text" class="form-control" placeholder="http://socialesman.com" name="product[address]" />
						    </div>
						</div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">
					    	SKU
					    	<span class="help" data-toggle="tooltip" title="The Stock Keeping Unit">
					    		<i class="fa fa-question-circle"></i>
					    	</span>
					    </label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="product[email]" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Masked phone</label>
					    <div class="col-sm-10 col-md-8">
					    	<div class="has-feedback">
								<input type="text" class="form-control mask-phone" name="customer[phone]" />
						      	<i class="ion-information-circled form-control-feedback" data-toggle="tooltip" title="Tooltip helper example">
						      	</i>
							</div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Masked Credit Card</label>
					    <div class="col-sm-10 col-md-8">
					    	<div class="has-feedback">
					      		<input type="text" class="form-control mask-cc" name="customer[cc]" />
					      		<i class="ion-information-circled form-control-feedback" data-toggle="tooltip" title="Credit card masked input example">
						      	</i>
							</div>
					    </div>
				  	</div>
			  		<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Product rating</label>
					    <div class="col-sm-10 col-md-8">
					      	<div id="raty"></div>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Product Main Color</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control minicolors" />
					    </div>
					</div>
				  	<div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Select Category</label>
					    <div class="col-sm-10 col-md-8">
					    	<select class="form-control" data-smart-select>
					    		<option>Bicycles</option>
					    		<option>Clothes</option>
					    		<option>Gift Cards</option>
					    	</select>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Product tags</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="hidden" id="product-tags" style="width:100%" value="ball, toy, clothes" name="product[tags]" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Specific publish date</label>
					    <div class="col-sm-10 col-md-8">
					    	<div class="input-group">
							  	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							  	<input type="text" class="form-control datepicker" placeholder="03/05/2014" />
							</div>
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
				    		<a href="form.html" class="btn btn-default">Cancel</a>
				      		<button type="submit" class="btn btn-success">Save product</button>
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

			// Product tags with select2
			$("#product-tags").select2({
				placeholder: 'Select tags or add new ones',
				tags:["shirt", "gloves", "socks", "sweater"],
				tokenSeparators: [",", " "]
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