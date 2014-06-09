<body id="search">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>
		<div id="content">
			<div class="content-wrapper clearfix">
				<div class="filters">
					<h3 class="hidden-xs">Filters</h3>
					<form>
						<div class="filter">
							<label>
								<input type="checkbox" checked />
								Created date
							</label>
							<div class="filter-option" style="display:block;">
								<select class="field-switch">
									<option data-field="days">is in the last</option>
									<option data-field="calendar">is equal to</option>
									<option data-field="calendar">is before</option>
									<option data-field="calendar">is after</option>
								</select>
								<div class="field days">
									<input type="text" class="form-control small" value="9" />
									days
								</div>
								<div class="field calendar" style="display:none;">
									<i class="fa fa-calendar"></i>
									<input type="text" class="form-control datepicker" />
								</div>
							</div>
						</div>
						<div class="filter">
							<label>
								<input type="checkbox">
								City
							</label>
							<div class="filter-option">
								<select>
									<option>equals</option>
									<option>contains</option>
									<option>starts with</option>
									<option>ends with</option>
									<option>does not contain</option>
								</select>
								<div class="field">
									<input type="text" class="form-control" />
								</div>
							</div>
						</div>
						<div class="filter">
							<label>
								<input type="checkbox">
								Last seen
							</label>
							<div class="filter-option">
								<select class="field-switch">
									<option data-field="calendar">is equal to</option>
									<option data-field="calendar">is before</option>
									<option data-field="calendar">is after</option>
								</select>
								<div class="field calendar">
									<i class="fa fa-calendar"></i>
									<input type="text" class="form-control datepicker" />
								</div>
							</div>
						</div>
						<div class="filter">
							<label>
								<input type="checkbox">
								Payment status
							</label>
							<div class="filter-option">
								<select>
									<option>Available</option>
									<option>Abandoned</option>
									<option>Pending</option>
									<option>Fulfilled</option>
									<option>Suspicious</option>
								</select>
							</div>
						</div>
						<div class="filter">
							<label>
								<input type="checkbox" />
								Number of orders
							</label>
							<div class="filter-option">
								<select>
									<option>equal to</option>
									<option>not equal to</option>
									<option>less than</option>
									<option>greater than</option>
								</select>
								<div class="field">
									<input type="text" class="form-control" />
								</div>
							</div>
						</div>
						<div class="filter">
							<label>
								<input type="checkbox">
								Price
							</label>
							<div class="filter-option">
								<select>
									<option>equal to</option>
									<option>not equal to</option>
									<option>less than</option>
									<option>greater than</option>
								</select>
								<div class="field">
									<input type="text" class="form-control" />
								</div>
							</div>
						</div>
					</form>
				</div>

				<div class="results">

					<!-- bulk actions -->
					<div class="btn-group bulk-actions">
					  	<button type="button" class="btn btn-default dropdown-toggle disabled" data-toggle="dropdown">
					    	Bulk actions <span class="caret"></span>
					  	</button>
					  	<ul class="dropdown-menu" role="menu">
					    	<li><a href="#">Edit tags</a></li>
					    	<li><a href="#">Delete products</a></li>
						    <li><a href="#">Export to CSV</a></li>
					  	</ul>
					</div>

					<table id="datatable-example">
	                    <thead>
	                        <tr>
	                            <th tabindex="0" rowspan="1" colspan="1">
	                            	<input class="toggle-all" type="checkbox" />
	                            </th>
	                            <th tabindex="0" rowspan="1" colspan="1">Customer
	                            </th>
	                            <th tabindex="0" rowspan="1" colspan="1">Date
	                            </th>
	                            <th tabindex="0" rowspan="1" colspan="1">Status
	                            </th>
	                            <th tabindex="0" rowspan="1" colspan="1">Unit Price
	                            </th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td>
	                            	<input name="select-product" type="checkbox" />
	                            </td>
	                            <td>
	                            	<img class="img-responsive product-img" src="images/products/2.png" />
	                            </td>
	                            <td>Some product name</td>
	                            <td class=""><span class="label label-success">Available</span></td>
	                            <td class="center">$159.99</td>
	                        </tr>
	                        <tr>
	                            <td>
	                            	<input name="select-product" type="checkbox" />
	                            </td>
	                            <td><img class="img-responsive product-img" src="images/products/3.jpg" /></td>
	                            <td>Some product name</td>
	                            <td class=""><span class="label label-success">Available</span></td>
	                            <td class="center">$1,290.50</td> 
							</tr>
							<tr>
	                            <td>
	                            	<input name="select-product" type="checkbox" />
	                            </td>
	                            <td><img class="img-responsive product-img" src="images/products/4.png" /></td>
	                            <td>Some product name</td>
	                            <td class=""><span class="label label-info">Out of stock</span></td>
	                            <td class="center">$400.00</td>
	                        </tr>
	                        <tr>
	                            <td>
	                            	<input name="select-product" type="checkbox" />
	                            </td>
	                            <td><img class="img-responsive product-img" src="images/products/5.png" /></td>
	                            <td>Some product name</td>
	                            <td class=""><span class="label label-success">Available</span></td>
	                            <td class="center">$1,559.99</td>
	                        </tr>
	                        <tr>
	                            <td>
	                            	<input name="select-product" type="checkbox" />
	                            </td>
	                            <td><img class="img-responsive product-img" src="images/products/6.png" /></td>
	                            <td>Some product name</td>
	                            <td class=""><span class="label label-success">Available</span></td>
	                            <td class="center">$195.99</td>
	                        </tr>
	                        <tr>
	                            <td>
	                            	<input name="select-product" type="checkbox" />
	                            </td>
	                            <td><img class="img-responsive product-img" src="images/products/7.jpg" /></td>
	                            <td>Some product name</td>
	                            <td class=""><span class="label label-success">Available</span></td>
	                            <td class="center">$782.00</td>
	                        </tr>
	                        <tr>
	                            <td>
	                            	<input name="select-product" type="checkbox" />
	                            </td>
	                            <td><img class="img-responsive product-img" src="images/products/8.png" /></td>
	                            <td>Some product name</td>
	                            <td class=""><span class="label label-success">Available</span></td>
	                            <td class="center">$2,890.00</td>
	                        </tr>
	                   	</tbody>
	                </table>
				</div>

			</div>
		</div>
	</div>

	<div class="skin-switcher hide">
		<div class="toggler">
			<span class="brankic-brush"></span>
		</div>
		<ul class="menu">
			<li>
				<a class="active" data-skin="sidebar-default" href="#">
					<span class="color default"></span> Default
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-clear" href="#">
					<span class="color clear"></span> Clear
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-black" href="#">
					<span class="color black"></span> Black
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-dark" href="#">
					<span class="color dark"></span> Dark
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-flat" href="#">
					<span class="color flat"></span> Flat
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-flat-dark" href="#">
					<span class="color flat-dark"></span> Flat dark
					<i class="fa fa-check"></i>
				</a>
			</li>
		</ul>
	</div>

	<script type="text/javascript">
		$(function () {
			var $filters = $(".filters .filter input:checkbox");
			
			$filters.change(function () {
				var $option = $(this).closest(".filter").find(".filter-option");

				if ($(this).is(":checked")) {
					$option.slideDown(150, function () {
						$option.find("input:text:eq(0)").focus();
					});
				} else {
					$option.slideUp(150);
				}
			});

			// Filter dropdown options for Created date, show/hide datepicker or input text
			var $dropdown_switcher = $(".field-switch");
			$dropdown_switcher.change(function () {
				var field_class = $(this).find("option:selected").data("field");
				var $filter_option = $(this).closest(".filter-option");
				$filter_option.find(".field").hide();
				$filter_option.find(".field." + field_class).show();

				if (field_class === "calendar") {
					$filter_option.find(".datepicker").datepicker("show");
				} else {
					$filter_option.find(".field." + field_class + " input:text").focus();
				}
			});

			// Datepicker
	        $('.datepicker').datepicker({
	        	autoclose: true
	        	, orientation: 'right top'
	        	// , endDate: new Date()
	        });

	        $('#datatable-example').dataTable({
                "sPaginationType": "full_numbers",
                "iDisplayLength": 20,
    			"aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
            });

            // Bulk actions checkboxes

			var $toggle_all = $("input:checkbox.toggle-all");
			var $checkboxes = $("[name='select-product']");
			var $bulk_actions_btn = $(".bulk-actions .dropdown-toggle");

			$toggle_all.change(function () {
				var checked = $toggle_all.is(":checked");
				if (checked) {
					$checkboxes.prop("checked", "checked");
					toggleBulkActions(true);
				} else {
					$checkboxes.prop("checked", "");
					toggleBulkActions(false);
				}
			});

			$checkboxes.change(function () {
				var anyChecked = $("[name='select-product']:checked");
				toggleBulkActions(anyChecked.length);
			});

			function toggleBulkActions(show) {
				if (show) {
					$bulk_actions_btn.removeClass("disabled");
				} else {
					$bulk_actions_btn.addClass("disabled");	
				}
			}
		});
	</script>
</body>