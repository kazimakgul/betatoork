<?php
$add_ads	= $this->Html->url(array('controller'=>'businesses','action'=>'add_ads'));
?>
<body id="search">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');
		
		?>
		<div id="content">
			<div class="menubar">

				<div class="page-title">
					<a href="#" onclick="history.go(-1);return false;">
					← Return to dashboard
					</a>
				</div>
                <a id="AddAdsCode" href="<?php echo $add_ads; ?>" class="btn btn-success pull-right">Add Ads</a>
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
					    	<li><a href="#">Edit</a></li>
					    	<li><a href="#">Delete</a></li>
					  	</ul>
					</div>

					<table id="datatable-ads">
	                    <thead>
	                        <tr>
	                            <th tabindex="0" rowspan="1" colspan="1">
	                            	<input class="toggle-all" type="checkbox" />
	                            </th>
	                            <th tabindex="0" rowspan="1" colspan="1">Name
	                            </th>
	                            <th tabindex="0" rowspan="1" colspan="1">Code
	                            </th>
	                            <th tabindex="0" rowspan="1" colspan="1">Status
	                            </th>
	                        </tr>
	                    </thead>
	                    <tbody>
							<?php
					foreach ($adcodes as $adcode) {
						$adsStatus = NULL;
						if (in_array($adcode["Adcode"]["id"], $addata[0]['Adsetting']))
							{
								$adsStatus.= ($adcode['Adcode']['id']==$addata[0]['Adsetting']['home_banner_top']?'<span class="label label-success" style="display:inline-block">Home -> Top</span>':'');
								$adsStatus.= ($adcode['Adcode']['id']==$addata[0]['Adsetting']['home_banner_middle']?'<span class="label label-success" style="display:inline-block">Home -> Middle</span>':'');
								$adsStatus.= ($adcode['Adcode']['id']==$addata[0]['Adsetting']['home_banner_bottom']?'<span class="label label-success" style="display:inline-block">Home -> Bottom</span>':'');
								$adsStatus.= ($adcode['Adcode']['id']==$addata[0]['Adsetting']['game_banner_top']?'<span class="label label-success" style="display:inline-block">Game -> Top</span>':'');
								$adsStatus.= ($adcode['Adcode']['id']==$addata[0]['Adsetting']['game_banner_bottom']?'<span class="label label-success" style="display:inline-block">Game -> Middle</span>':'');
							}else{
								$adsStatus = '<span class="label label-default">Not Used</span>';
							}	
					echo '<tr>
	                            <td>
	                            	<input name="select-ads" type="checkbox" />
	                            </td>
	                            <td>
	                            	'.$adcode["Adcode"]["name"].'
	                            </td>
	                            <td><textarea cols="50" disabled readonly style="max-width:400px; max-height:100px;border: none;">'.$adcode["Adcode"]["code"].'</textarea></td>
	                            <td>
	                            '.$adsStatus.'
	                            </td>
	                        </tr>';
									
								}
							
							
							
							?>
	                   	</tbody>
	                </table>
				</div>

			</div>
		</div>
	</div>

</body>