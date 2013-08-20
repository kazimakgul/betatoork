<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo $title_for_layout?></title>
        <link rel="shortcut icon" href="http://toork.com/favicon.ico" type="image/x-icon" />
        <meta name="description" content= "<?php echo $description_for_layout?>" />


        <meta property="og:title" content= "<?php echo $title_for_layout?>" />
        <meta property="og:type" content="Game"/>
        <meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>"/>
        <meta property="og:image" content="https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-ash4/428808_254949491292199_1660409950_n.jpg"/>
        <meta property="og:site_name" content="Toork"/>
        <meta property="fb:admins" content="711440119"/>
        <meta property="og:description" content= "<?php echo $description_for_layout?>" />


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

        <!-- styles -->

<?php echo $this->Html->css(array('introjs/introjs','css2/bootstrap','css2/bootstrap-responsive','css2/stilearn','css2/stilearn-responsive','css2/stilearn-helper','css2/stilearn-icon','css2/font-awesome','css2/animate','css2/uniform.default','css2/select2','css2/fullcalendar','css2/bootstrap-wysihtml5','css2/jquery.pnotify.default','channelwall','css2/datepicker','css2/colorpicker','css2/responsive-tables','css2/elusive-webfont','jasny-bootstrap/css/jasny-bootstrap','rating2')); ?>
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
$password=$this->Html->url(array("controller" => "users","action" =>"password2",$this->Session->read('Auth.User.id')));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$newgames=$this->Html->url(array( "controller" => "games","action" =>"toprated2"));$newgames.='/sort:id/direction:desc';

?>


<?php

if($this->Session->check('Auth.User')){

echo $this->element('NewPanel/header',array('logout'=>$logout,'addGame'=>$addGame,'dashboard'=>$dashboard,'settings'=>$settings,'index'=>$index,'avatarImage'=>$avatarImage,'wall'=>$wall,'bestchannels'=>$bestchannels,'toprated'=>$toprated,'newgames'=>$newgames));


}else{
    echo $this->element('NewPanel/unauthHeader',array('index'=>$index,'login'=>$login,'bestchannels'=>$bestchannels,'toprated'=>$toprated));
}

?>

        <!-- section content -->
        <section class="section">
            <div class="row-fluid">
                <!-- span side-left -->


<?php

if($this->Session->check('Auth.User')){

echo $this->element('NewPanel/leftpanel',array('mygames' => $mygames,'dashboard'=>$dashboard,'favorites'=>$favorites,'chains'=>$chains,'wall'=>$wall,'settings'=>$settings,'bestchannels'=>$bestchannels,'toprated'=>$toprated,'newgames'=>$newgames,'password'=>$password)); 

}else{
    echo $this->element('NewPanel/unauthLeft',array('index'=>$index,'bestchannels'=>$bestchannels,'toprated'=>$toprated));
}

?>

<?php
 echo $this->element('NewPanel/loginModal',array('index'=>$index));
?>
                
<?php echo $content_for_layout?>
<?php 
echo $this->Session->flash('flash', array('element' => 'info'));
echo $this->Session->flash('auth', array('element' => 'info'));
?>          

<?php  echo $this->element('NewPanel/rightpanel',array('bestchannels'=>$bestchannels,'wall'=>$wall)); ?>


            </div>
        </section>

        <!-- section footer -->
        <footer>
            <a rel="to-top" href="#top"><i class="icofont-circle-arrow-up"></i></a>
        </footer>

        <!-- javascript
        ================================================== -->


        <!-- required stilearn template js, for full feature-->



<?php echo $this->Html->script(array('introjs/intro','js2/jquery','js2/jquery-ui.min','js2/bootstrap','js2/uniform/jquery.uniform','js2/peity/jquery.peity','js2/select2/select2','js2/knob/jquery.knob','js2/flot/jquery.flot','js2/flot/jquery.flot.resize','js2/flot/jquery.flot.categories','js2/wysihtml5/wysihtml5-0.3.0','js2/wysihtml5/bootstrap-wysihtml5','js2/calendar/fullcalendar','js2/holder','js2/stilearn-base','js2/pnotify/jquery.pnotify','js2/pnotify/jquery.pnotify.demo','js2/datepicker/bootstrap-datepicker','js2/colorpicker/bootstrap-colorpicker','js2/validate/jquery.validate','js2/validate/jquery.metadata','js2/wizard/jquery.ui.widget','js2/wizard/jquery.wizard','js2/responsive-tables/responsive-tables','wall/jquery.wallform','wall/jquery.webcam','wall/jquery.color','wall/jquery.livequery','wall/jquery.timeago','wall/jquery.tipsy','wall/facebox','wall/wall2','register','jasny-bootstrap/js/jasny-bootstrap')); ?>




<!-- Js variable for wallscript begins-->
<script>
<?php if(!isset($type))$type=NULL; ?>
wallvar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'message_ajax2')); ?>';
game_comment_var='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'game_comment_ajax')); ?>';
my_feed_var='<?php if(isset($uid)){ echo $this->Html->url(array('controller'=>'wallentries','action'=>'moreupdates_ajax_my',$uid,$type)); }?>';
profile_news_var='<?php if(isset($profile_uid)){ echo $this->Html->url(array('controller'=>'wallentries','action'=>'moreupdates_profile_ajax',$profile_uid)); }?>';
game_comments_var='<?php if(isset($uid)){ echo $this->Html->url(array('controller'=>'wallentries','action'=>'game_comments_ajax',$uid,$type)); }?>';

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


commentvar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'comment_ajax2')); ?>';
delmessagevar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'delete_message_ajax')); ?>';
delcommentvar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'delete_comment_ajax')); ?>';
seeallvar='<?php echo $this->Html->url(array('controller'=>'wallentries','action'=>'view_ajax2')); ?>';
quick='<?php echo $this->Html->url(array('controller'=>'subscriptions','action'=>'quick_subscription')); ?>';

search_query=$('.search-query').val();
search_url='<?php echo $this->Html->url(array("controller"=>"games","action"=>"search2"));?>';
$('#gameshare').popover();
$('#comment').popover();
$('#ratebarshare').popover();
$('#ratebarchain').popover();
$('#imageinfo').popover();
</script>
<!-- Js variable for wallscript ends-->

        <script type="text/javascript">
            $(document).ready(function() {
                // try your js
             
                // auto complete
                $('#inputAuto').typeahead({
                    source : ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]
                });
                
                // select2
                $('#inputTags').select2({tags:["red", "green", "blue"]});
                $('[data-form=select2]').select2();
                $('[data-form=select2-group]').select2();
                
                // this select2 on side right
                $('#tagsSelect').select2({
                    tags:["red", "green", "blue"],
                    tokenSeparators: [",", " "]
                });
                
                
                // datepicker
                $('[data-form=datepicker]').datepicker();

                // coloricker
                $('[data-form=colorpicker]').colorpicker();
                
                
                // uniform
                $('[data-form=uniform]').uniform()

                // wysihtml5
                $('[data-form=wysihtml5]').wysihtml5();
                
                
                // validate form
                $('#form-validate').validate();
                
                // wizard
                $('#form-wizard').wizard({
                    stepsWrapper: "#wrapped",
                    submit: ".submit",
                    beforeSelect: function( event, state ) {
                        var inputs = $(this).wizard('state').step.find(':input');
                        return !inputs.length || !!inputs.valid();
                    }
                }).submit(function( event ) {
                    event.preventDefault();
                    alert('Form submitted!');
                }).wizard('form').validate({
                    errorPlacement: function(error, element) { 
                        if ( element.is(':radio') || element.is(':checkbox') ) {
                                $('#error-gender').html(error);
                        } else { 
                                error.insertAfter( element );
                        }
                    }
                });
                
                // normalize event tab-stat, we hack something here couse the flot re-draw event is any some bugs for this case
                $('#tab-stat > a[data-toggle="tab"]').on('shown', function(){
                    if(sessionStorage.mode == 4){ // this hack only for mode side-only
                        $('body,html').animate({
                            scrollTop: 0
                        }, 'slow');
                    }
                });
                
                // peity chart
                $("span[data-chart=peity-bar]").peity("bar");
                
                // Input tags with select2
                $('input[name=reseiver]').select2({
                    tags:[]
                });
                
                // uniform
                $('[data-form=uniform]').uniform();
                
                // wysihtml5
                $('[data-form=wysihtml5]').wysihtml5()
                toolbar = $('[data-form=wysihtml5]').prev();
                btn = toolbar.find('.btn');
                
                $.each(btn, function(k, v){
                    $(v).addClass('btn-mini')
                });
                
                // Server stat circular by knob
                $("input[data-chart=knob]").knob();
                
                // system stat flot
                d1 = [ ['jan', 231], ['feb', 243], ['mar', 323], ['apr', 352], ['maj', 354], ['jun', 467], ['jul', 429] ];
                d2 = [ ['jan', 87], ['feb', 67], ['mar', 96], ['apr', 105], ['maj', 98], ['jun', 53], ['jul', 87] ];
                d3 = [ ['jan', 34], ['feb', 27], ['mar', 46], ['apr', 65], ['maj', 47], ['jun', 79], ['jul', 95] ];
                
                var visitor = $("#visitor-stat"),
                order = $("#order-stat"),
                user = $("#user-stat"),
                
                data_visitor = [{
                        data: d1,
                        color: '#00A600'
                    }],
                data_order = [{
                        data: d2,
                        color: '#2E8DEF'
                    }],
                data_user = [{
                        data: d3,
                        color: '#DC572E'
                    }],
                 
                
                options_lines = {
                    series: {
                        lines: {
                            show: true,
                            fill: true
                        },
                        points: {
                            show: true
                        },
                        hoverable: true
                    },
                    grid: {
                        backgroundColor: '#FFFFFF',
                        borderWidth: 1,
                        borderColor: '#CDCDCD',
                        hoverable: true
                    },
                    legend: {
                        show: false
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    },
                    yaxis: {
                        autoscaleMargin: 2
                    }
        
                };
                
                // render stat flot
                $.plot(visitor, data_visitor, options_lines);
                $.plot(order, data_order, options_lines);
                $.plot(user, data_user, options_lines);
                
                // tootips chart
                function showTooltip(x, y, contents) {
                    $('<div id="tooltip" class="bg-black corner-all color-white">' + contents + '</div>').css( {
                        position: 'absolute',
                        display: 'none',
                        top: y + 5,
                        left: x + 5,
                        border: '0px',
                        padding: '2px 10px 2px 10px',
                        opacity: 0.9,
                        'font-size' : '11px'
                    }).appendTo("body").fadeIn(200);
                }

                var previousPoint = null;
                $('#visitor-stat, #order-stat, #user-stat').bind("plothover", function (event, pos, item) {
                    
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                            y = item.datapoint[1].toFixed(2);
                            label = item.series.xaxis.ticks[item.datapoint[0]].label;
                            
                            showTooltip(item.pageX, item.pageY,
                            label + " = " + y);
                        }
                    }
                    else {
                        $("#tooltip").remove();
                        previousPoint = null;            
                    }
                    
                });
                // end tootips chart
                
            });
      
        </script>
   
   <?php if(isset($welcome))
   echo '<script>$("#modal-tutorial").modal("show");</script>';
   ?>
        
         <!-- this plugin required jquery ui-->
        
    </body>
</html>
