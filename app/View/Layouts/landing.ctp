<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $title_for_layout?></title>
  <meta name="viewport" content="width=device-width">

        <link rel="shortcut icon" href="http://clone.gs/favicon.ico" type="image/x-icon" />
        <meta name="description" content= "<?php echo $description_for_layout?>" />


        <meta property="og:title" content= "<?php echo $title_for_layout?>" />
        <meta property="og:type" content="Game"/>
        <meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>"/>
        <meta property="og:image" content="https://s3.amazonaws.com/betatoorkpics/socials/plainhead500.png"/>
        <meta property="og:site_name" content="Clone"/>
        <meta property="fb:admins" content="711440119"/>
        <meta property="og:description" content= "<?php echo $description_for_layout?>" />

        <?php 
        echo $this->Html->meta('keywords','clone, clone games, create game channel, share games, social network for gamers, game channels, social network for game bloggers, share your games');
        ?>


        <!-- For third-generation iPad with high-resolution Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="mobilePics/144.png">
        <!-- For iPhone with high-resolution Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="mobilePics/114.png">
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="mobilePics/72.png">
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="mobilePics/57.png">

    <!-- avascript variables for login and register-->
    <script type="text/javascript">
    remotecheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkuser')); ?>';
	remotecheck2='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkuser2')); ?>';
	authcheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'usernameavailable')); ?>';
	facecheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'faceuser')); ?>';
	</script>
    <?php echo $this->Html->css(array('assets/css/toork_lander')); ?>

  <link href="http://fonts.googleapis.com/css?family=Abel:400|Oswald:300,400,700" media="all" rel="stylesheet" type="text/css" />

    <?php  echo $this->element('analytics'); ?>  
    <!-- goodgame studio verify -->
    <!-- 96b6ff13778d8ac5d9dfa7bbdd230819 -->
</head>
    <body>
	<div id="fb-root"></div>
<?php echo $this->Html->script('fbconnect'); ?>
    <?php
        $register=$this->Html->url(array( "controller" => "users","action" =>"register2"));
        $login=$this->Html->url(array( "controller" => "users","action" =>"login3"));
        $index=$this->Html->url(array( "controller" => "games","action" =>"index"));
    ?>

    <?php  echo $this->element('NewPanel/landing/header',array('register'=>$register,'login'=>$login,'index'=>$index)); ?>
    
    <?php echo $content_for_layout; ?>

    <?php echo $this->element('NewPanel/landfooter',array()); ?>

    <?php 
    echo $this->Session->flash('flash', array('element' => 'info'));
    echo $this->Session->flash('auth', array('element' => 'info'));
    ?>  

    <?php echo $this->Html->script(array('assets/jquery-1.10.1.min','landingscripts','assets/bootstrap','assets/prettify','assets/lightbox','assets/main','js2/pnotify/jquery.pnotify','js2/pnotify/jquery.pnotify.demo','jquery.validate')); ?>

    </body>
</html>
