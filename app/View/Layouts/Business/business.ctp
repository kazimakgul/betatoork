<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title_for_layout?></title>
        <meta name="description" content= "<?php echo $description_for_layout?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet"><?php echo $this->Html->css(array('business/custom','css2/jquery.pnotify.default')); ?>
 		<script>
        toorksize			='<?php echo Configure::read('broken.toorksize'); ?>';
        avatar				='<?php echo Configure::read('broken.avatar'); ?>';
        s3patch				='<?php echo Configure::read('S3.url'); ?>';
        favswitcher			='<?php echo $this->Html->url(array('controller'=>'favorites','action'=>'add')); ?>';
        chaingame			='<?php echo $this->Html->url(array('controller'=>'games','action'=>'clonegame')); ?>';
        remotecheck			='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkUser')); ?>';
		remotecheck2		='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkUser2')); ?>';
		authcheck			='<?php echo $this->Html->url(array('controller'=>'users','action'=>'usernameAvailable')); ?>';
		facecheck			='<?php echo $this->Html->url(array('controller'=>'users','action'=>'FaceUser')); ?>';
        addplaycount		='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'add_playcount')); ?>';
        set_channel_ads		='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'edit_set_ads')); ?>'; 
        remove_ads_field	='<?php echo $this->Html->url(array('controller'=>'users','action'=>'remove_ads_field')); ?>';
        col_ads_link		='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'col_ads')); ?>';
       	remove_ads_field	='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'remove_ads_field')); ?>';     
		<?php if(isset($auth_user)){?> user_auth='1'; <?php }else{?> user_auth='0'; <?php }?>

        <?php if(Configure::read('Domain.cname')){ ?>
              cname=1;
        <?php }else{ ?>
              cname=0;
        <?php } ?>

        </script>


    <?php 
    if($channel_style['User']['bg_color']!=NULL)
    $bg_color=$channel_style['User']['bg_color'];
    else
    $bg_color='#E9EAED'; 

    if($channel_style['User']['bg_image']!=NULL)
    $bg_image=Configure::read('S3.url').'/upload/users/'.$active_channel_id.'/'.$channel_style['User']['bg_image'];
    else
    $bg_image='';      

    $customcss='<style type="text/css"> body {
    background-color: '.$bg_color.';
    background-image: url("'.$bg_image.'");
        } </style>'; ?>

    <!--We Add User Selected Addtitional Css Here(begins) -->
    <?php echo $customcss;  ?>
  <!--We Add User Selected Addtitional Css Here(ends) -->
<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    </head>
    <body id='user_background'>
        <?php  echo $this->element('business/header');
        echo $this->element('business/login');
 		?>
        <?php echo $content_for_layout?>
       
        <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<div id="fb-root"></div>
        <?php echo $this->Html->script(array('assets/prettify','business/custom','business/business','fbconnect','landingscripts')); ?>


<?php 
//***************************************
//this area writes times of sql processes-will be removed
//http://blog.tersmitten.nl/how-to-debug-sql-from-a-controller-in-cakephp.html
echo $this->element('sql_dump');
?>
  

<?php if($user['User']['analitics']=='0' || $user['User']['analitics']==NULL) {
   $user['User']['analitics']=0;
  }
?>

<!--++++++++++++++++++++++++++++++++++++++++++++-->
<!--===============Backskin Ads=================-->
<!--++++++++++++++++++++++++++++++++++++++++++++-->
<?php 
if(!Configure::read('Backskin.block'))
{
$ads_code = $this->requestAction(array('controller' => 'businesses', 'action' => 'get_ads_code',$user['User']['id'],9));
if($ads_code!=NULL)
echo $ads_code['Adcode']['code'];
}
?>

<!--++++++++++++++++++++++++++++++++++++++++++++-->
<!--============//Backskin Ads==================-->
<!--++++++++++++++++++++++++++++++++++++++++++++-->


<!--++++++++++++++++++++++++++++++++++++++++++++-->
<!--===============Popunder Ads=================-->
<!--++++++++++++++++++++++++++++++++++++++++++++-->
<?php 
$ads_code = $this->requestAction(array('controller' => 'businesses', 'action' => 'get_ads_code',$user['User']['id'],10));
if($ads_code!=NULL)
echo $ads_code['Adcode']['code'];
?>

<!--++++++++++++++++++++++++++++++++++++++++++++-->
<!--============//Popunder Ads==================-->
<!--++++++++++++++++++++++++++++++++++++++++++++-->


<!--++++++++++++++++++++++++++++++++++++++++++++-->
<!--=============Call analitics=================-->
<!--++++++++++++++++++++++++++++++++++++++++++++-->
<?php  echo $this->element('business/analitics');?>

<!--+++++++++++++/++++++++++++++++++++++++++++++-->

 
    </body>
</html>
