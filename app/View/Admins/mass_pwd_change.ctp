	
<div class="span11">
<div class="content">
<div class="content-body" style="padding-top:15px;">

<?php 
echo $this->element('NewPanel/admin/adminNavbar');
?>
<div class="search-content"></div>

<div class="mass_pwd_area">
                                 <div class="control-group  input-prepend">
                                 <label class="control-label" for="required">New Password</label>
                                 <div class="controls">
                                 <span class="add-on"><i class="icofont-lock"></i></span>
<input name="data[User][new_password]" class="grd-white" required="" pattern="[^\f\n\r\t\v\u00A0\u2028\u2029]{6,20}" placeholder="Must be at least 6 characters long" id="mass_pwd" type="password">
                                  </div>
                                  </div>
								  
								  <div class="control-group  input-prepend">
                                  <label class="control-label" for="required">Confirm New Password</label>
                                  <div class="controls">
                                  <span class="add-on"><i class="icofont-lock"></i></span>
<input name="data[User][confirm_new_password]" class="grd-white" required="" pattern="[^\f\n\r\t\v\u00A0\u2028\u2029]{6,20}" placeholder="Must be same as above" id="mass_pwd_confirm" type="password">                  </div>
                                  </div>
								  
								  <button type="button" id="do_pwd_changes" class="btn btn-primary">Save changes</button>
								  
								  
								  
</div>

<div class="mass_adcode_area">

</div>

<?php 
echo $this->element('NewPanel/admin/adminMassPwd');
?>			
			
   
   
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

