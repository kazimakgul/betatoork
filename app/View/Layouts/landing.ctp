<!DOCTYPE HTML>
<html>
<head>

<!-- ### Define Charset ### -->
<meta charset="utf-8">

<!-- ### Responsive MetaTag ### -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- ### Page Title ### -->
        <title><?php echo $title_for_layout?></title>
        <link rel="shortcut icon" href="http://toork.com/favicon.ico" type="image/x-icon" />
        <meta name="author" content="<?php echo $author_for_layout?>">
        <meta name="description" content= "<?php echo $description_for_layout?>" />

        <meta property="og:title" content= "<?php echo $title_for_layout?>" />
        <meta property="og:type" content="Game"/>
        <meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>"/>
        <meta property="og:image" content="https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-ash4/428808_254949491292199_1660409950_n.jpg"/>
        <meta property="og:site_name" content="Toork"/>
        <meta property="fb:admins" content="711440119"/>
        <meta property="og:description" content= "<?php echo $description_for_layout?>" />

<?php 
echo $this->Html->meta('keywords','create game channel,share games, social network for gamers, game channels, social for game bloggers,share your games');
?>

<!-- For third-generation iPad with high-resolution Retina display: -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="mobilePics/144.png">
<!-- For iPhone with high-resolution Retina display: -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="mobilePics/114.png">
<!-- For first- and second-generation iPad: -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="mobilePics/72.png">
<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
<link rel="apple-touch-icon-precomposed" href="mobilePics/57.png">


<!-- ### Stylesheet and Bootstrap ### -->


<?php echo $this->Html->css(array('css2/bootstrap','css2/bootstrap-responsive','css2/stilearn','css2/stilearn-responsive','css2/stilearn-helper','css2/stilearn-icon','css2/font-awesome','css2/animate','css2/uniform.default','css2/select2','css2/jquery.pnotify.default','css2/elusive-webfont','rating2')); ?>
<?php echo $this->Html->css(array('land/styles.css')); ?>

<!-- ### Favicon ### -->


<!-- ### Google Fonts ### -->
<link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,700,600,200" rel="stylesheet" type="text/css"/>

<!-- ### Javascript Files ### -->

<?php echo $this->Html->script(array('land/jquery.min.js','land/custom2.js','land/custom.js','land/slides.js')); ?>

<!--////*************************************************************************************/////-->
<!--////7Generation search url.All generation function can be collected in one class later.../////-->
<!--////*************************************************************************************/////-->
<script type="text/javascript">
search_url='<?php echo $this->Html->url(array("controller"=>"games","action"=>"search2"));?>';
remotecheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkUser')); ?>';
remotecheck2='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkUser2')); ?>';


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





<?php echo $this->Html->script(array('js2/jquery-ui.min','js2/bootstrap','js2/uniform/jquery.uniform','js2/peity/jquery.peity','js2/select2/select2','js2/knob/jquery.knob','js2/flot/jquery.flot','js2/flot/jquery.flot.resize','js2/holder','js2/pnotify/jquery.pnotify','js2/pnotify/jquery.pnotify.demo','js2/validate/jquery.validate','js2/wizard/jquery.wizard','register','wall/wall2')); ?>


<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


</head>
<body>
<?php  echo $this->element('analytics'); ?>

<?php

if($this->Session->check('Auth.User')){
    $index=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
}else{
    $index=$this->Html->url(array("controller" => "games","action" =>"index")); 
}

$logout=$this->Html->url(array("controller" => "users","action" =>"logout")); 
$addGame=$this->Html->url(array("controller" => "games","action" =>"add2"));
$dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
$mygames=$this->Html->url(array("controller" => "games","action" =>"mygames"));
$favorites=$this->Html->url(array("controller" => "games","action" =>"favorites"));
$chains=$this->Html->url(array("controller" => "games","action" =>"chains"));
$wall=$this->Html->url(array("controller" => "wallentries","action" =>"wall3"));
$bestchannels=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));
$toprated=$this->Html->url(array("controller" => "games","action" =>"toprated2"));
$login=$this->Html->url(array("controller" => "users","action" =>"login2"));
$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
$profilepublic=$this->Html->url(array("controller" => "games","action" =>"profile",$this->Session->read('Auth.User.id')));
$password=$this->Html->url(array("controller" => "users","action" =>"password2",$this->Session->read('Auth.User.id')));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
?>


<?php

if($this->Session->check('Auth.User')){

echo $this->element('NewPanel/header',array('logout'=>$logout,'addGame'=>$addGame,'dashboard'=>$dashboard,'publicprofile'=>$profilepublic,'settings'=>$settings,'index'=>$index,'avatarImage'=>$avatarImage,'wall'=>$wall,'bestchannels'=>$bestchannels,'toprated'=>$toprated));


}else{
    echo $this->element('NewPanel/unauthHeader',array('index'=>$index,'login'=>$login,'bestchannels'=>$bestchannels,'toprated'=>$toprated));
}

?>

<div class="wrap-switcher">
 <!-- ### START - Header Section ### -->
<!-- ### END - Header Section ### -->

<?php echo $content_for_layout?>

<?php 
echo $this->Session->flash('flash', array('element' => 'info'));
echo $this->Session->flash('auth', array('element' => 'info'));
?>

<?php
 echo $this->element('NewPanel/footer2',array());
?>
</div>

</body>
</html>