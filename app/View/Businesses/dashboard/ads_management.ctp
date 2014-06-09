<body id="search">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');
		
		?>
		<div id="content">
		<pre>
			<?php 		print_r($adcodes);?>
			</pre>
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>
				<div class="page-title">
					Search results with filter
					<small class="hidden-xs hidden-sm">
						<strong>Click on the filter checkboxes!</strong>
					</small>
				</div>
				<div class="options pull-right">
					<a href="#"><i class="fa fa-print"></i> Print</a>
					<a href="#"><i class="fa fa-download"></i> Download CSV</a>
				</div>
			</div>

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

</body>