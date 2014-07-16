<?php
$add_ads	= $this->Html->url(array('controller'=>'businesses','action'=>'add_ads'));
$ch_settings= $this->Html->url(array('controller'=>'businesses','action'=>'channel_settings'));
?>
<body id="account">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>
		<div id="content">
				<?php  echo $this->element('business/dashboard/sidebar_setting',array('active'=>'ads_management'));?>
				<div id="panel" class="channel_profile">
					<!-- bulk actions -->
					<div class="btn-group bulk-actions" style="padding-bottom: 15px;">
					  	<button type="button" class="btn btn-default dropdown-toggle disabled" data-toggle="dropdown">
					    	Bulk actions <span class="caret"></span>
					  	</button>
					  	<ul class="dropdown-menu" role="menu">
					    	<li><a href="#" id="redirect">Edit</a></li>
					    	<li><a href="#" data-toggle="modal" data-target="#confirm-modal">Delete</a></li>
					  	</ul>
					  	<input type="hidden" id="attr" value="edit_ads" />
					</div>
              			<a id="AddAdsCode" href="<?php echo $add_ads; ?>" class="btn btn-success pull-right">Add Ads</a>
					
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
						$adcodeId = $adcode["Adcode"]["id"];
						if (in_array($adcodeId, $addata[0]['Adsetting']))
							{
								$adsStatus.= ($adcodeId==$addata[0]['Adsetting']['home_banner_top']?'<span class="label label-success" style="display:inline-block">Home -> Top</span>':'');
								$adsStatus.= ($adcodeId==$addata[0]['Adsetting']['home_banner_middle']?'<span class="label label-success" style="display:inline-block">Home -> Middle</span>':'');
								$adsStatus.= ($adcodeId==$addata[0]['Adsetting']['home_banner_bottom']?'<span class="label label-success" style="display:inline-block">Home -> Bottom</span>':'');
								$adsStatus.= ($adcodeId==$addata[0]['Adsetting']['game_banner_top']?'<span class="label label-success" style="display:inline-block">Game -> Top</span>':'');
								$adsStatus.= ($adcodeId==$addata[0]['Adsetting']['game_banner_bottom']?'<span class="label label-success" style="display:inline-block">Game -> Bottom</span>':'');
							}else{
								$adsStatus = '<span class="label label-default">Not Used</span>';
							}	
					echo '<tr>
	                            <td>
	                            	<input name="select-ads" value="'.$adcode["Adcode"]["id"].'" type="checkbox" />
	                            </td>
	                            <td>
	                            	'.$adcode["Adcode"]["name"].'
	                            </td>
	                            <td><textarea cols="50" disabled readonly style="max-width:350px; max-height:100px;border: none;">'.$adcode["Adcode"]["code"].'</textarea></td>
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
		<?php  echo $this->element('business/dashboard/modals/confirm');?>
</body>