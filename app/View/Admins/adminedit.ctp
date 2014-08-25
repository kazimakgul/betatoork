<?php 
$useredit=$this->Html->url(array("controller" => "admins","action" =>"useredit"));
?>
    

                <div class="span11">
                    <!-- content -->
                    <div class="content">
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<?php 
echo $this->element('NewPanel/admin/adminNavbar');
?>

        <div class="box corner-all">
            <!--box header-->
            <div class="box-header grd-white color-silver-dark corner-top">
                <div class="header-control">
                    <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                    <a data-box="close">×</a>
                </div>
                <span>Edit User</span>
            </div><!--/box header-->
            <!--box body-->
            <div class="box-body">
            

<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'addgameform','class'=>'contact_form' ,'type' => 'file'));?>

        <div class="sep"></div>
  

            <label for="name">Username:</label>
<?php echo $this->Form->input('username',array('label'=>false ,'required','placeholder' => 'Ex: GameMonster')); ?>

            <label for="name">SEO Username:</label>
<?php echo $this->Form->input('seo_username',array('label'=>false ,'required','placeholder' => 'Ex: GameMonster')); ?>



            <label for="message">Channel Description:</label>

<?php  echo $this->Form->input('description',array('label'=>false,'div'=>false,'maxlength'=>500,'placeholder' => 'Describe your channel please.    Ex: Play free online games at Socialesman! Were the best online games website. Find the best uptodate games in socialesman channel.','type' => 'textarea','cols'=>'40','rows'=>'5' )); ?>


            <label for="website">Email:</label>

<?php echo $this->Form->input('email',array('label'=>false ,'div'=>false, 'required', 'length' => 100)); ?>

           <label for="website">Priority:</label>

<?php echo $this->Form->input('priority',array('label'=>false ,'div'=>false, 'length' => 100)); ?>


            <label for="website">Your Website Link:</label>

<?php echo $this->Form->input('website',array('label'=>false ,'div'=>false,'placeholder' => 'http://www.socialesman.com','type' => 'url', 'maxlength'=>100)); ?>


            <label for="website">Facebook Fan Page:</label>

<?php echo $this->Form->input('fb_link',array('label'=>false ,'div'=>false,'placeholder' => 'http://facebook.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>



            <label for="website">Twitter Page:</label>

<?php echo $this->Form->input('twitter_link',array('label'=>false ,'div'=>false,'placeholder' => 'http://twitter.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>


            <label for="website">Google+ Page:</label>

<?php echo $this->Form->input('gplus_link',array('label'=>false ,'div'=>false,'placeholder' => 'http://plus.google.com/117184471094869274585','type' => 'url', 'maxlength'=>100)); ?>





<?php if ($this->Session->read('Auth.User.role') == 0){
      }else{
?>

        <label for="website">Google Adsense:</label>

<?php echo $this->Form->input('adcode',array('label'=>false ,'div'=>false,'placeholder'=>'The size must be 728x90' ,'type'=>'textarea','length' => 1000)); ?>


            <label for="website">Google Verify:</label>

<?php echo $this->Form->input('verify',array('label'=>false ,'div'=>false,'pattern'=>'(<meta).+.(/>)' ,'placeholder'=>'<meta name="google-site-verification" content="kjashfagASFAas"/>' ,'length' => 255)); ?>


        <?php }?>


 <?php echo $this->Form->input('birth_date', array('type' => 'date', 
'label' => 'Birthday:', 'empty' => false, 'minYear' => date('Y')-60, 
'maxYear' => date('Y')-10)); ?> 




 <?php $item_list = array('f'=>'Female','m'=>'Male'); 
 echo $this->Form->input('gender', array(  
                                'type'=>'select',  
                                'options'=>array($item_list),  
          'label'=>'Gender:',  
          'empty'=>'Choose Gender...',)  
             ); 


 ?>


 <?php echo $this->Form->input('country_id',array('label'=>'Country:' )); ?>

        <label for="picture">Avatar:</label>

         <input placeholder="not yet" type="file" name="data[User][edit_picture]" accept="image/gif,image/jpg,image/png,image/jpeg"  size="100">



                                  <div class="form-actions">
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                      <a href="<?php echo $useredit; ?>" type="button" class="btn">Cancel</a>
                                  </div>


</form>



            </div>
        </div><!--/box-->




            </div>
        </div><!--/box-->
    </div>

