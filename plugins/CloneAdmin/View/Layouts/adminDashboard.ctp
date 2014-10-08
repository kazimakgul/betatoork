<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->Html->charset("utf-8"); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Clone</title>
        <link rel="shortcut icon" href="http://clone.gs/favicon.ico" type="image/x-icon" />
        <meta name="description" content= "" />


        <meta property="og:title" content= "Clone" />
        <meta property="og:type" content="Game"/>
        <meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>"/>
        <meta property="og:image" content="https://s3.amazonaws.com/betatoorkpics/socials/plainhead500.png"/>
        <meta property="og:site_name" content="Clone"/>
        <meta property="fb:admins" content="711440119"/>
        <meta property="og:description" content= "" />


<!-- For third-generation iPad with high-resolution Retina display: -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="mobilePics/144.png">
<!-- For iPhone with high-resolution Retina display: -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="mobilePics/114.png">
<!-- For first- and second-generation iPad: -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="mobilePics/72.png">
<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
<link rel="apple-touch-icon-precomposed" href="mobilePics/57.png">

        <!-- google font -->
        <link href="http://fonts.googleapis.com/css?family=Aclonica:regular" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:700' rel='stylesheet' type='text/css'>

        <!-- font Awsome 3.2.1-->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

        <!-- styles -->

<?php echo $this->Html->css(array('introjs/chardinjs','css2/bootstrap','css2/bootstrap-responsive','css2/stilearn','css2/stilearn-responsive','css2/stilearn-helper','css2/stilearn-icon','css2/font-awesome','css2/animate','css2/uniform.default','css2/select2','css2/jquery.pnotify.default','channelwall','css2/responsive-tables','css2/elusive-webfont','jasny-bootstrap/css/jasny-bootstrap','nprogress/nprogress','rating2')); ?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
<!-- avascript variables for login and register-->
<script type="text/javascript">
remotecheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkUser')); ?>';
grabcheck='<?php echo $this->Html->url(array('controller'=>'apis','action'=>'addgame_ajax')); ?>';
subswitcher='<?php echo $this->Html->url(array('controller'=>'subscriptions','action'=>'add_subscription')); ?>';
favswitcher='<?php echo $this->Html->url(array('controller'=>'favorites','action'=>'add')); ?>';
rateurl='<?php echo $this->Html->url(array('controller'=>'rates','action'=>'add')); ?>';
chaingame='<?php echo $this->Html->url(array('controller'=>'games','action'=>'clonegame')); ?>';
deletegame='<?php echo $this->Html->url(array('controller'=>'games','action'=>'gamedelete')); ?>';
pushactivity='<?php echo $this->Html->url(array('controller'=>'activities','action'=>'pushactivity')); ?>';
setpermission='<?php echo $this->Html->url(array('controller'=>'users','action'=>'setpermissions')); ?>';
freshactivity='<?php echo $this->Html->url(array('controller'=>'activities','action'=>'getfreshactivity')); ?>';
notifycount='<?php echo $this->Html->url(array('controller'=>'activities','action'=>'getnotificationcount')); ?>';
notifytoggle='<?php echo $this->Html->url(array('controller'=>'activities','action'=>'togglelast10')); ?>';
notifyrefresh='<?php echo $this->Html->url(array('controller'=>'activities','action'=>'getfreshnotification')); ?>';
oldnotify='<?php echo $this->Html->url(array('controller'=>'activities','action'=>'getoldnotifications')); ?>';
crawler='<?php echo $this->Html->url(array('controller'=>'apis','action'=>'metacrawler')); ?>';
order_execute='<?php echo $this->Html->url(array('controller'=>'orders','action'=>'execute_activity')); ?>';
edit_user_form='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'edit_user_form')); ?>';
edit_user_submit='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'edit_user_submit')); ?>';
add_mass_session='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'add_session')); ?>';
remove_mass_session='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'delete_session')); ?>';
do_pwd_changes='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'do_pwd_changes')); ?>';
remove_selections='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'remove_selections')); ?>';
do_adcode_changes='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'do_adcode_changes')); ?>';
admin_game_submit='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'admin_game_submit')); ?>';

<?php if($this->params['action']=='mass_pwd_change'){?>
bring_search_users='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'get_search_users',2)); ?>';
<?php }else{?>
bring_search_users='<?php echo $this->Html->url(array('controller'=>'admins','action'=>'get_search_users',1)); ?>';
<?php }?>

//Code Block for Broken Images
function imgError(image,style){
    image.onerror = "";
    
    if(style=="toorksize")
    image.src = "<?php echo Configure::read('broken.toorksize'); ?>";
    else if(style=="thumb")
    image.src = "<?php echo Configure::read('broken.thumb'); ?>";
    else if(style=="slider")
    image.src = "<?php echo Configure::read('broken.slider'); ?>";
    else if(style=="avatar")
    image.src = "<?php echo Configure::read('broken.avatar'); ?>";
    return true;
}



</script>

<!-- Browser Loading Bar JS-->
<?php echo $this->Html->script(array('nprogress/jquery-2.0','nprogress/nprogress')); ?>

<?php  echo $this->element('analytics'); ?>
    </head>

    <body>
  <script>
    $('body').show();
    $('.version').text(NProgress.version);
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
  </script>
<!-- Browser Loading Bar JS-->

<?php

if($this->Session->check('Auth.User')){
    $index=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
}else{
    $index=$this->Html->url(array("controller" => "games","action" =>"index")); 
}

$logout=$this->Html->url(array("controller" => "users","action" =>"logout")); 
$addGame=$this->Html->url(array("controller" => "games","action" =>"add3"));
$dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
$mygames=$this->Html->url(array("controller" => "games","action" =>"mygames"));
$favorites=$this->Html->url(array("controller" => "games","action" =>"favorites"));
$chains=$this->Html->url(array("controller" => "games","action" =>"chains"));
$wall=$this->Html->url(array("controller" => "wallentries","action" =>"wall3"));
$bestchannels=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));
$featuredchannels=$this->Html->url(array("controller" => "games","action" =>"featuredchannels"));
$explore=$this->Html->url(array("controller" => "games","action" =>"explore"));
$toprated=$this->Html->url(array("controller" => "games","action" =>"toprated2"));
$login=$this->Html->url(array("controller" => "users","action" =>"login3"));
$register=$this->Html->url(array("controller" => "users","action" =>"register2"));
$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
$password=$this->Html->url(array("controller" => "users","action" =>"password2",$this->Session->read('Auth.User.id')));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$newgames=$this->Html->url(array( "controller" => "games","action" =>"toprated2"));$newgames.='/sort:id/direction:desc';
$tools=$this->Html->url(array("controller" => "pages","action" =>"buttons"));

$useredit=$this->Html->url(array("controller" => "admins","action" =>"useredit"));
?>


<?php

if($this->Session->check('Auth.User')){

echo $this->element('NewPanel/header',array('logout'=>$logout,'addGame'=>$addGame,'dashboard'=>$dashboard,'settings'=>$settings,'index'=>$index,'avatarImage'=>$avatarImage,'wall'=>$wall,'bestchannels'=>$bestchannels,'toprated'=>$toprated,'newgames'=>$newgames));


}else{
    echo $this->element('NewPanel/unauthHeader',array('index'=>$index,'login'=>$login,'register'=>$register,'bestchannels'=>$bestchannels,'featuredchannels'=>$featuredchannels,'toprated'=>$toprated));
}

?>

        <!-- section content -->
        <section class="section">
            <div class="row-fluid">
                <!-- span side-left -->


<?php

if($this->Session->check('Auth.User')){

echo $this->element('NewPanel/adminLeftPanel',array('mygames' => $mygames,'dashboard'=>$dashboard,'favorites'=>$favorites,'chains'=>$chains,'wall'=>$wall,'settings'=>$settings,'bestchannels'=>$bestchannels,'explore'=>$explore,'toprated'=>$toprated,'newgames'=>$newgames,'password'=>$password,'tools'=>$tools, 'useredit'=>$useredit)); 

}else{
    echo $this->element('NewPanel/unauthLeft',array('index'=>$index,'featuredchannels'=>$featuredchannels,'bestchannels'=>$bestchannels,'toprated'=>$toprated,'explore'=>$explore));
}

?>

  <script>
NProgress.set(0.2);
  </script>

<?php echo $content_for_layout?>

  <script>
NProgress.set(0.6);
  </script>

<?php 
echo $this->Session->flash('flash', array('element' => 'info'));
echo $this->Session->flash('auth', array('element' => 'info'));
?>          


  <script>
NProgress.set(0.8);
  </script>

            </div>
        </section>

        <!-- section footer -->
        <footer>
            <a rel="to-top" href="#top"><i class="icofont-circle-arrow-up"></i></a>
        </footer>

        <!-- javascript
        ================================================== -->


        <!-- required stilearn template js, for full feature-->

<!-- Tutorial Modal -->
   <?php if(isset($welcome))
   echo $this->Html->script(array('js2/bootstrap')); 
   echo '<script>$("#modal-tutorial").modal("show");</script>';
   ?>
<!-- Tutorial Modal -->   

<?php echo $this->Html->script(array('js2/jquery','js2/jquery-ui.min','js2/bootstrap','js2/uniform/jquery.uniform','js2/peity/jquery.peity','js2/select2/select2','js2/knob/jquery.knob','js2/flot/jquery.flot','js2/flot/jquery.flot.resize','js2/flot/jquery.flot.categories','js2/holder','js2/stilearn-base','js2/pnotify/jquery.pnotify','js2/pnotify/jquery.pnotify.demo','js2/validate/jquery.validate','js2/validate/jquery.metadata','js2/wizard/jquery.ui.widget','js2/wizard/jquery.wizard','js2/responsive-tables/responsive-tables','wall/jquery.wallform','wall/jquery.webcam','wall/jquery.color','wall/jquery.livequery','wall/jquery.timeago','wall/jquery.tipsy','wall/facebox','wall/wall2','register','js2/jquery.fitvids','jasny-bootstrap/js/jasny-bootstrap','introjs/chardinjs','jquery.validate')); ?>



<!-- Js variable for wallscript begins-->
<script>
<?php if(!isset($type))$type=NULL; ?>
wallvar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'message_ajax2')); ?>';
game_comment_var='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'game_comment_ajax')); ?>';
my_feed_var='<?php if(isset($uid)){ echo $this->Html->url(array('controller'=>'wallentries','action'=>'moreupdates_ajax_my',$uid,$type)); }?>';
profile_news_var='<?php if(isset($profile_uid)){ echo $this->Html->url(array('controller'=>'wallentries','action'=>'moreupdates_profile_ajax',$profile_uid)); }?>';
profile_news_var_home='<?php if(isset($profile_uid)){ echo $this->Html->url(array('controller'=>'wallentries','action'=>'moreupdates_profile_ajax_home',$profile_uid)); }?>';
<?php if (isset($profile_uid)) { ?>
explore_more_morevar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'explore_more_feed',$profile_uid)); ?>';
<?php } ?>
game_comments_var='<?php if(isset($uid)){ echo $this->Html->url(array('controller'=>'wallentries','action'=>'game_comments_ajax',$uid,$type)); }?>';
feedlike='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'likeswitch')); ?>';
sharepost='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'sharepost')); ?>';

morevar='<?php if(isset($profile_uid)){ echo $this->Html->url(array('controller'=>'wallentries','action'=>'moreupdates_ajax2',$profile_uid,$type)); }
else 
{
    if(isset($type))
    {
    echo $this->Html->url(array('controller'=>'wallentries','action'=>'moreupdates_filter_ajax',$type));
    }
    else
    {
    echo $this->Html->url(array('controller'=>'wallentries','action'=>'moreupdates_ajax2'));
    }
} ?>';

morehashvar='<?php if(isset($hashtag)){ echo $this->Html->url(array('controller'=>'wallentries','action'=>'moreupdates_ajax3',$hashtag,$type)); } ?>';

commentvar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'comment_ajax2')); ?>';
delmessagevar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'delete_message_ajax')); ?>';
delcommentvar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'delete_comment_ajax')); ?>';
seeallvar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'view_ajax2')); ?>';

search_query=$('.search-query').val();
search_url='<?php echo $this->Html->url(array("controller"=>"games","action"=>"search2"));?>';
$('#gameshare').popover();
$('#comment').popover();
$('#ratebarshare').popover();
$('#ratebarchain').popover();
$('#imageinfo').popover();
</script>
<!-- Js variable for wallscript ends-->

  <script>
 NProgress.done();
  </script>


        
         <!-- this plugin required jquery ui-->
        
        <!-- burasi youtube videolari her boyutta duzgun calissin diye eklendi-->
      <script>
        // Basic FitVids Test
        $(".media").fitVids();
        // Custom selector and No-Double-Wrapping Prevention Test
        $(".media").fitVids({ customSelector: "iframe[src^='http://dailymotion.com']"});
      </script>


    </body>
</html>
