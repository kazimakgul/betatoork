	
<div class="span11">
<div class="content">
<div class="content-body" style="padding-top:15px;">

<?php 
echo $this->element('NewPanel/admin/adminNavbar');
?>


<!--Tab Begins Here -->
<ul class="nav nav-tabs" style="margin-bottom:0px;">
      <li class="active"><a href="#mass_pwd" data-toggle="tab"><i class="elusive-user"></i> Mass Password Change</a></li>
      <li><a href="#mass_adcode" data-toggle="tab"><i class="elusive-thumbs-up color-blue"></i> Mass Ad-Code Change</a></li>
    </ul>
	
	<div class="tab-content">
    <div id="mass_pwd" class="tab-pane fade in active">
        <!--Mass Password Form Elements begins-->
		
		<!--mass_password_area begins here -->
<div class="mass_pwd_area">
                                 <div class="control-group  input-prepend">
                                 <label class="control-label" for="required">New Password</label>
                                 <div class="controls">
                                 <span class="add-on"><i class="icofont-lock"></i></span>
<input name="data[User][new_password]" class="grd-white" required="" pattern="[^\f\n\r\t\v\u00A0\u2028\u2029]{6,20}" placeholder="Must be at least 6 characters long" id="mass_pwd_text" type="password">
                                  </div>
                                  </div>
								  
								  <div class="control-group  input-prepend">
                                  <label class="control-label" for="required">Confirm New Password</label>
                                  <div class="controls">
                                  <span class="add-on"><i class="icofont-lock"></i></span>
<input name="data[User][confirm_new_password]" class="grd-white" required="" pattern="[^\f\n\r\t\v\u00A0\u2028\u2029]{6,20}" placeholder="Must be same as above" id="mass_pwd_confirm" type="password">                  </div>
                                  </div>
								  
								  <button type="button" id="do_pwd_changes" class="btn btn-primary">Save password changes</button>
								  
								  
								  
</div>
<!--mass_password_area ends here -->
		
		<!--Mass Password Form Elements ends-->
    </div>
    <div id="mass_adcode" class="tab-pane fade">
          <!--Mass Ad-Code Form Elements begins-->
		 
		 <!--mass_adcode_area begins here -->
<div class="mass_adcode_area">

<div class="control-group">
                                                            <label class="control-label" for="inputEditorSimple">Ads Code</label>
                                                            <div class="controls">

<textarea name="data[User][adcode]" placeholder="This is your advertisement code place. You can just paste your google adsense code or any other advertisement company code here." class="span8" rows="6" length="1000" cols="30" id="useradcode"></textarea>
                                                            </div>
															
															<button type="button" id="do_adcode_changes" class="btn btn-primary">Save adcode changes</button>
															
                                                        </div>


</div>
<!--mass_adcode_area ends here -->
		 
		  <!--Mass Ad-Code Form Elements ends-->
    </div>
</div>
<!--Tab Ends Here -->


<?php 
echo $this->element('NewPanel/admin/adminMassPwd');
?>			
			
  <div id="modalaffected" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Affected Users</h2>
	</div>	
	<div class="modal-body" id="affectedusers">
		<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
	</div>
</div>
   
   
   <div class="pagination pagination-centered">
        <ul>
            <li><?php echo $this->Paginator->prev(__('Prev', true), array(), null, array('class'=>'disabled'));?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  '.$this->Paginator->next(__('Next', true), array('id'=>'next'), null, array('class' => 'disabled'));?></li>
        </ul>
        <div style="opacity:0.5;">
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} Members out of {:count} total')));?>
        </div>
    </div>
   


	</div>
    </div>
</div>

