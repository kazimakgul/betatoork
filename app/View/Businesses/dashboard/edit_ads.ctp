<?php $ads_management	= $this->Html->url(array('controller'=>'businesses','action'=>'ads_management'));  ?>
<body id="form-product">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>
		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					<a href="<?php echo $ads_management;?>">
					← Return to Ads Settings
					</a>
					
					<small class="hidden-xs">
						<strong></strong>
					</small>
				</div>
			</div>
<form id="edit_ads" role="form" novalidate="novalidate">
			<div class="content-wrapper form-horizontal">
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Title</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" id="title" name="product[first_name]" value="<?php echo $Ads['Adcode']['name'];?>" />
					    </div>
				  	</div>
					<div class="form-group">
				  		<label class="col-sm-2 col-md-2 control-label">Ads Code</label>
					    <div class="col-sm-10 col-md-8">
				  		<textarea id="desc" class="form-control" id="desc" rows="4" name="customer[notes]" style="margin-bottom: 10px; height:100px;"><?php echo $Ads['Adcode']['code'];?></textarea>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Category</label>
					    <div class="col-sm-10 col-md-8">
						<?php
					    foreach ($ad_area as $value) {
							$id = $value['Ad_area']['id'];
							$name = $value['Ad_area']['name'];
							$description = $value['Ad_area']['description'];
							$check = '';
							foreach ($Ads_set as $ad_check) {
								if($ad_check['Ad_setting']['ad_area_id'] == $id)
								{
									$check = 'checked';
								}
							}
						echo '<input type="checkbox" name="category" value="'.$id.'" '.$check .' > '.$name.'<span class="help" data-toggle="tooltip" title="'.$description.'"> <i class="fa fa-question-circle"></i> </span><br>';
						}?>
					    </div>
				  	</div>
				  		<input type="hidden" id="ad_id" value="<?php echo $Ads['Adcode']['id'];?>" />
						<input type="hidden" id="attr" name="attr" value="edit_ads" />
				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
				      		<button id="updateButton" class="btn btn-success">Save Ads</button>
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