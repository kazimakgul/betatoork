<!DOCTYPE HTML>
<html>
<head>

<!-- ### Define Charset ### -->
<meta charset="utf-8">

<!-- ### Responsive MetaTag ### -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- ### Page Title ### -->
<title> Toork | Create your own game channel  </title>

<!-- ### Description and Keyword ### -->
<meta name="keywords" content=""/>
<meta name="description" content=""/>

<!-- ### Stylesheet and Bootstrap ### -->


<?php echo $this->Html->css(array('css2/bootstrap','css2/bootstrap-responsive','css2/stilearn','css2/stilearn-responsive','css2/stilearn-helper','css2/stilearn-icon','css2/font-awesome','css2/animate','css2/uniform.default','css2/select2','css2/jquery.pnotify.default','css2/elusive-webfont')); ?>
<?php echo $this->Html->css(array('land/styles.css')); ?>

<!-- ### Favicon ### -->


<!-- ### Google Fonts ### -->
<link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,700,600,200" rel="stylesheet" type="text/css"/>

<!-- ### Javascript Files ### -->

<?php echo $this->Html->script(array('land/jquery.min.js','land/jquery-ui.min.js','land/lightbox.js','land/custom.js','land/custom2.js','land/slides.js')); ?>

<?php echo $this->Html->script(array('js2/bootstrap','js2/uniform/jquery.uniform','js2/peity/jquery.peity','js2/select2/select2','js2/knob/jquery.knob','js2/flot/jquery.flot','js2/flot/jquery.flot.resize','js2/holder','js2/pnotify/jquery.pnotify','js2/pnotify/jquery.pnotify.demo','js2/validate/jquery.validate','js2/wizard/jquery.wizard')); ?>


<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
<body>

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
 echo $this->element('NewPanel/footer2',array());
?>
</div>

</body>
</html>