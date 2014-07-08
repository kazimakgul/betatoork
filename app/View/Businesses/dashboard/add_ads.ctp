<body id="form-product">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>
		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					New Ads 
					
					<small class="hidden-xs">
						<strong></strong>
					</small>
				</div>
			</div>

			<div class="content-wrapper form-horizontal">
<form id="add_ads" role="form" novalidate="novalidate">
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Title</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" id="title" name="product[first_name]" />
					    </div>
				  	</div>
					<div class="form-group">
				  		<label class="col-sm-2 col-md-2 control-label">Code Detail</label>
					    <div class="col-sm-10 col-md-8">
				  		<textarea id="desc" class="form-control" id="desc" rows="4" name="customer[notes]" style="margin-bottom: 10px; height:100px;"></textarea>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 col-md-2 control-label">Category</label>
					    <div class="col-sm-10 col-md-8">
					    	<select class="form-control" id="category" data-smart-select>
					    		<option value="0">Select Category</option>
					    		<option value="home_banner_top">Home -> Top</option>
					    		<option value="home_banner_middle">Home -> Middle</option>
					    		<option value="home_banner_bottom">Home -> Bottom</option>
					    		<option value="game_banner_top">Game -> Top</option>
					    		<option value="game_banner_bottom">Game -> Bottom</option>
					    		<option value="0">Mobil -> Top</option>
					    		<option value="0">Mobil -> Bottom</option>
					    	</select>
					    </div>
				  	</div>
						<input type="hidden" id="attr" name="attr" value="new_ads" />
				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
				      		<button id="NewButton" class="btn btn-success">Save Ads</button>
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