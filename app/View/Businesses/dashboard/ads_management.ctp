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
	                            <th tabindex="0" rowspan="1" class="hidden-xs hidden-sm" colspan="1">Code
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
						foreach ($adsettings as $value) {
							if ($adcodeId == $value['Ad_setting']['ad_code_id'])
							{
								$adsStatus.= '<span class="label label-success" style="display:inline-block">'.$value["Ad_area"]["name"].'</span>';
							}
						}
				
					echo '<tr>
	                            <td>
	                            	<input name="select-ads" value="'.$adcode["Adcode"]["id"].'" type="checkbox" />
	                            </td>
	                            <td>
	                            	'.$adcode["Adcode"]["name"].'
	                            </td>
	                            <td class="hidden-xs hidden-sm"><textarea cols="50" disabled readonly style="max-width:350px; max-height:100px;border: none;">'.$adcode["Adcode"]["code"].'</textarea></td>
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
<!-- Confirm Modal -->
	<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog">
	  	<div class="modal-dialog">
		    <div class="modal-content">
		    	<form method="post" action="#" role="form">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        	<h4 class="modal-title" id="myModalLabel">
			        		Are you sure you want to delete this?
			        	</h4>
			      	</div>
			      	<div class="modal-body">
						Do you want to delete your Ad? All your info will be erased.
			      	</div>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				        <button id="deletedata" class="btn btn-danger">Yes, delete it</button>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>
	<style>
		    #search #content #sidebar .menu {
      list-style-type: none;
      padding: 0;
      margin: 0; }
      @media (max-width: 767px) {
        #search #content #sidebar .menu {
          margin-top: 15px;
          padding-bottom: 10px; } }
      #search #content #sidebar .menu li a {
        display: block;
        padding: 13px 30px;
        font-size: 15px;
        color: #555;
        text-decoration: none;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear; }
        #search #content #sidebar .menu li a.active, #account #content #sidebar .menu li a:hover {
          color: #6787DA; }
        #search #content #sidebar .menu li a i {
          min-width: 30px; }
          #search #content #sidebar .menu li a i.ion-ios7-person-outline {
            font-size: 30px;
            position: relative;
            top: 4px; }
          #search #content #sidebar .menu li a i.ion-ios7-email-outline {
            font-size: 24px;
            position: relative;
            top: 4px; }
          #search #content #sidebar .menu li a i.ion-ios7-help-outline {
            font-size: 24px;
            position: relative;
            top: 4px; }
          #search #content #sidebar .menu li a i.ion-card {
            font-size: 21px;
            position: relative;
            top: 3px; }
            
			#search #content #sidebar {
			left: 0;
			top: 0;
			bottom: 0;
			position: absolute;
			width: 100%;
			background: #fcfcfc;
			border-right: 1px solid #E8ECF1;
			}
	</style>
</body>
