<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dashboard - Toork Channel Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="stilearning">

        <!-- google font -->
        <link href="http://fonts.googleapis.com/css?family=Aclonica:regular" rel="stylesheet" type="text/css" />

        <!-- styles -->

<?php echo $this->Html->css(array('css2/bootstrap','css2/bootstrap-responsive','css2/stilearn','css2/stilearn-responsive','css2/stilearn-helper','css2/stilearn-icon','css2/font-awesome','css2/animate','css2/uniform.default','css2/select2','css2/fullcalendar','css2/bootstrap-wysihtml5','css2/jquery.pnotify.default','channelwall','css2/datepicker','css2/colorpicker','css2/responsive-tables')); ?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>

<?php 
$logout=$this->Html->url(array("controller" => "users","action" =>"logout")); 
$addGame=$this->Html->url(array("controller" => "games","action" =>"add"));
$dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
$index=$this->Html->url(array("controller" => "games","action" =>"index")); 
$mygames=$this->Html->url(array("controller" => "games","action" =>"mygames"));
$favorites=$this->Html->url(array("controller" => "games","action" =>"favorites"));
$chains=$this->Html->url(array("controller" => "games","action" =>"chains"));
$wall=$this->Html->url(array("controller" => "wallentries","action" =>"wall2"));
$settings=$this->Html->url(array("controller" => "users","action" =>"settings"));
?>


<?php  echo $this->element('NewPanel/header',array('logout'=>$logout,'addGame'=>$addGame,'dashboard'=>$dashboard)); ?>


        <!-- section content -->
        <section class="section">
            <div class="row-fluid">
                <!-- span side-left -->

<?php  echo $this->element('NewPanel/leftpanel',array('mygames' => $mygames,'dashboard'=>$dashboard,'favorites'=>$favorites,'chains'=>$chains,'wall'=>$wall,'settings'=>$settings)); ?>

                
<?php echo $content_for_layout?>
          

<?php  echo $this->element('NewPanel/rightpanel'); ?>


            </div>
        </section>

        <!-- section footer -->
        <footer>
            <a rel="to-top" href="#top"><i class="icofont-circle-arrow-up"></i></a>
        </footer>

        <!-- javascript
        ================================================== -->
        <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
         <!-- this plugin required jquery ui-->

        <!-- required stilearn template js, for full feature-->


<?php echo $this->Html->script(array('js2/jquery','js2/jquery-ui.min','js2/bootstrap','js2/uniform/jquery.uniform','js2/peity/jquery.peity','js2/select2/select2','js2/knob/jquery.knob','js2/flot/jquery.flot','js2/flot/jquery.flot.resize','js2/flot/jquery.flot.categories','js2/wysihtml5/wysihtml5-0.3.0','js2/wysihtml5/bootstrap-wysihtml5','js2/calendar/fullcalendar','js2/holder','js2/stilearn-base','js2/pnotify/jquery.pnotify','js2/pnotify/jquery.pnotify.demo','js2/datepicker/bootstrap-datepicker','js2/colorpicker/bootstrap-colorpicker','js2/validate/jquery.validate','js2/validate/jquery.metadata','js2/wizard/jquery.ui.widget','js2/wizard/jquery.wizard','js2/responsive-tables/responsive-tables')); ?>


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
    </body>
</html>
