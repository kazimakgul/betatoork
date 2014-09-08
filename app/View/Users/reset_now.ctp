<?php
$index=$this->Html->url(array("controller" => "games","action" =>"index")); 
?>

<body id="signup" class="clear">


    <a href="<?php echo $index; ?>" class="logo">
        <img width="70px" height="70px" src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/clonelogo.png">
    </a>



    <div class="content">

    <h2>Change Password</h2>

<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'new-customer','class'=>'form-horizontal' ,'type' => 'file'));?>



        <div class="form-group">
            <label class="col-xs-12 col-sm-12 col-md-12 control-label">New Password</label>
            <div class="col-sm-12 col-md-12">
                <div class="has-feedback">

<?php echo $this->Form->input('new_password',array('label'=>false,'div'=>false ,'type'=>'password','class'=>'form-control','required pattern'=>'[^\f\n\r\t\v\u00A0\u2028\u2029]{6,20}','placeholder' => 'Must be at least 6 characters long','id'=>'required')); ?>
                    <i class="ion-information-circled form-control-feedback" data-toggle="tooltip" title="" data-original-title="type your new password">
                    </i>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-12 col-md-12 control-label">Confirm Password</label>
            <div class="col-sm-12 col-md-12">
                <div class="has-feedback">
<?php echo $this->Form->input('confirm_new_password',array('label'=>false,'div'=>false ,'type'=>'password','class'=>'form-control ','required pattern'=>'[^\f\n\r\t\v\u00A0\u2028\u2029]{6,20}','placeholder' => 'Must be same as above','id'=>'required')); ?>
                    <i class="ion-information-circled form-control-feedback" data-toggle="tooltip" title="" data-original-title="type new password again">
                    </i>
                </div>
            </div>
        </div>

        <div class="form-group form-actions">
            <div class="col-sm-10">
                <a href="#" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success">Save Password</button>
            </div>
        </div>
    </form>


    </div>

<?php  echo $this->element('NewPanel/dashfooter'); ?>  

</body>

