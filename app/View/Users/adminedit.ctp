<?php $this->Html->css('channelinfo', null, array('inline' => false));?>

<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('channel_user_panel'); ?>
    
  </div>
  <div class="right_panel">

  <!-- Add Game UI is here-->  

<div class="editchannel"></div>
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'addgameform','class'=>'contact_form' ,'type' => 'file'));?>

        <div class="sep"></div>
<span class="required_notification">* Denotes Required Field</span>
    <ul>
  
        <li>
            <label for="name">Username:</label>
<?php echo $this->Form->input('username',array('label'=>false ,'required','placeholder' => 'Ex: GameMonster')); ?>
         </li>
        <li>
            <label for="name">SEO Username:</label>
<?php echo $this->Form->input('seo_username',array('label'=>false ,'placeholder' => 'Ex: GameMonster')); ?>
         </li>

        <li>
            <label for="name">Facebook_id:</label>
<?php echo $this->Form->input('facebook_id',array('label'=>false ,'required','readonly','placeholder' => 'Ex: khs6jagssa6')); ?>
         </li>

        <li>
            <label for="message">Channel Description:</label>

<?php  echo $this->Form->input('description',array('label'=>false,'div'=>false,'maxlength'=>500,'placeholder' => 'Describe your channel please.    Ex: Play free online games at Socialesman! Were the best online games website. Find the best uptodate games in socialesman channel.','type' => 'textarea','cols'=>'40','rows'=>'5' )); ?>

            <span class="form_hint">recommendation : "your description better be between 50-500 chars please"</span>
        </li>

        <li>
            <label for="website">Email:</label>

<?php echo $this->Form->input('email',array('label'=>false ,'div'=>false, 'required', 'length' => 100)); ?>

            <span class="form_hint">You are not allowed to change your email.</span>
        </li>

          <li>
            <label for="website">Your Website Link:</label>

<?php echo $this->Form->input('website',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com','type' => 'url', 'maxlength'=>100)); ?>

            <span class="form_hint">Proper format "http://yourwebsite.com"</span>
        </li>

          <li>
            <label for="website">Facebook Fan Page:</label>

<?php echo $this->Form->input('fb_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://facebook.com/.+' ,'placeholder' => 'http://facebook.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>

            <span class="form_hint">Proper format "http://facebook.com/yourprofile"</span>
        </li>

          <li>
            <label for="website">Twitter Page:</label>

<?php echo $this->Form->input('twitter_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://twitter.com/.+' ,'placeholder' => 'http://twitter.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>

            <span class="form_hint">Proper format "http://twitter.com/yourprofile"</span>
        </li>

          <li>
            <label for="website">Google+ Page:</label>

<?php echo $this->Form->input('gplus_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://plus.google.com/.+' ,'placeholder' => 'http://plus.google.com/117184471094869274585','type' => 'url', 'maxlength'=>100)); ?>

            <span class="form_hint">Proper format "http://plus.google.com/yourprofileID"</span>
        </li>


<?php if ($this->Session->read('Auth.User.role') == 0){
      }else{
?>
        <li>
        <label for="website">Google Adsense:</label>

<?php echo $this->Form->input('adcode',array('label'=>false ,'div'=>false,'placeholder'=>'The size must be 728x90' ,'type'=>'textarea','length' => 1000)); ?>

            <span class="form_hint">just copy your adcode here. The ad banner size must be 728x90. If you already have a code here, do not change it.</span>
        </li>

        <li>
            <label for="website">Google Verify:</label>

<?php echo $this->Form->input('verify',array('label'=>false ,'div'=>false,'pattern'=>'(<meta).+.(/>)' ,'placeholder'=>'<meta name="google-site-verification" content="kjashfagASFAas"/>' ,'length' => 255)); ?>

            <span class="form_hint"> Paste your meta tag which is given from your google webmaster tool</span>
        </li>

        <?php }?>

        <li>

 <?php echo $this->Form->input('birth_date', array('type' => 'date', 
'label' => 'Birthday:', 'empty' => false, 'minYear' => date('Y')-60, 
'maxYear' => date('Y')-10)); ?> 


        </li>

        <li>

 <?php $item_list = array('f'=>'Female','m'=>'Male'); 
 echo $this->Form->input('gender', array(  
                                'type'=>'select',  
                                'options'=>array($item_list),  
          'label'=>'Gender:',  
          'empty'=>'Choose Gender...',)  
             ); 


 ?>
        </li>

        <li>

 <?php echo $this->Form->input('country_id',array('label'=>'Country:' )); ?>
        </li>


         <li>
        <label for="picture">Avatar:</label>

         <input placeholder="not yet" type="file" name="data[User][edit_picture]" accept="image/gif,image/jpg,image/png,image/jpeg"  size="100">
        <a> 90x120 pixel high quality</a>
        </li>


        <li>
            <button class="submit" type="submit">Update Channel</button>
        </li>
    </ul>

</form>




<!-- Add Game UI is up till here -->     

               

                   

                 

               


    </div>
</div>