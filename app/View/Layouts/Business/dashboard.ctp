<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
        <title><?php echo $title_for_layout?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="http://code.ionicframework.com/ionicons/1.4.1/css/ionicons.min.css" rel="stylesheet">
	<!-- stylesheets by clone-->
		<?php echo $this->Html->css(array(
		'business/dashboard/compiled/theme',
		'business/dashboard/vendor/animate',
		'business/dashboard/vendor/offline.chrome',
		'business/dashboard/custom',
		'business/dashboard/vendor/brankic',
		'business/dashboard/vendor/datepicker',
		'business/dashboard/vendor/morris',
		'business/dashboard/vendor/select2',
		'business/dashboard/vendor/select2-bootstrap',
		'business/dashboard/vendor/jquery.minicolors',
		'business/dashboard/vendor/summernote',
		'business/dashboard/vendor/jquery.dataTables',
		'business/dashboard/vendor/messenger/messenger',
		'business/dashboard/star-rating',
		'business/dashboard/vendor/messenger/messenger-theme-flat')); ?>
	<!-- javascript -->
 		<script>
 			notifyload 		= '<?php echo $this->Html->url(array('controller'=>'activities','action'=>'togglelast10')); ?>';
	        updateData		=	'<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'updateData')); ?>'; 
	        newData			=	'<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'newData')); ?>';
	        ads_management	='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'ads_management')); ?>';
	        edit_ads		='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'edit_ads')); ?>';
	        mygames			='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'mygames')); ?>';
	        set_channel_ads	='<?php echo $this->Html->url(array('controller'=>'users','action'=>'set_channel_ads')); ?>'; 
	        remove_ads_field='<?php echo $this->Html->url(array('controller'=>'users','action'=>'remove_ads_field')); ?>';
	        deletedata		= '<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'deleteData')); ?>';
	        remove_background = '<?php echo $this->Html->url(array('controller'=>'users','action'=>'remove_background')); ?>';   
			subswitcher='<?php echo $this->Html->url(array('controller'=>'subscriptions','action'=>'add_subscription')); ?>';
	        favswitcher	='<?php echo $this->Html->url(array('controller'=>'favorites','action'=>'add')); ?>';
	        chaingame	='<?php echo $this->Html->url(array('controller'=>'games','action'=>'clonegame')); ?>';
	        remove_game	='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'deleteData')); ?>';
	        delete_one_game	='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'deleteonegame')); ?>';
	        mysite			='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'mysite')); ?>';
	        feat_toggle_link ='<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'featured_toggle')); ?>';
	        rateurl = '<?php echo $this->Html->url(array('controller' => 'rates', 'action' => 'add')); ?>';
	        add_mapping = '<?php echo $this->Html->url(array('controller' => 'businesses', 'action' => 'add_mapping')); ?>';
	        remove_mapping = '<?php echo $this->Html->url(array('controller' => 'businesses', 'action' => 'remove_mapping')); ?>';
	        switch_publish = '<?php echo $this->Html->url(array('controller' => 'businesses', 'action' => 'switch_publish')); ?>';
			<?php if($this->Session->check('Auth.User')){
			echo 'user_auth=1;';
			echo 'userid='.$this->Session->read('Auth.User.id');
			}else{
			echo 'user_auth=0;';
			}
			?>	 		
	 		var toorksize	= 'https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png';
	        var avatar		= 'https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_manchannelavatar_default.png';
	        function imgError(image, style) {
	                image.onerror = "";
	                if (style == "toorksize") {
	                    image.src = toorksize;
	                } else if (style == "avatar") {
	                    image.src = avatar;
	                }
	                return true;
	            }
        </script>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
        <?php echo $content_for_layout?>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<?php echo $this->Html->script(array(
		'business/dashboard/bootstrap/bootstrap.min',
		'business/dashboard/vendor/bootstrap-switch.min',
		'business/dashboard/vendor/jquery.cookie',
		'business/dashboard/vendor/moment.min',
		'business/dashboard/theme',
		'business/dashboard/vendor/offline.min',
		'business/dashboard/vendor/select2.min',
		'business/dashboard/vendor/jquery.dataTables.min',
		'business/dashboard/vendor/jquery.validate.min',
		'business/dashboard/vendor/bootstrap-datepicker',
		'business/dashboard/vendor/summernote.min',
		'business/dashboard/vendor/jquery.minicolors.min',
		'business/dashboard/vendor/jquery.maskedinput',
		'business/dashboard/vendor/jquery.raty',
		'business/dashboard/vendor/raphael-min',
		'business/dashboard/vendor/morris.min',
		'business/dashboard/vendor/jquery.flot/jquery.flot',
		'business/dashboard/vendor/jquery.flot/jquery.flot.time',
		'business/dashboard/vendor/jquery.flot/jquery.flot.tooltip',
		'business/dashboard/vendor/messenger/messenger.min',
		'business/dashboard/vendor/messenger/messenger-theme-flat',
		'business/dashboard/star-rating',
		'business/dashboard/custom.js'));
		?>

	<!--[if lt IE 9]>
      Dummy App Status page için gerekli. Custom.js dosyasına taşınacak
    <![endif]-->

	<script type="text/javascript">
		$(function () {
			// Update the status color every 2 seconds, for demo only
			// You can remove this!
			var $status = $(".status .color"),
				colors = ["green", "yellow", "red"],
				currentStatus = 0;

			function updateStatus() {
				currentStatus++;
				if (currentStatus >= 3) {
					currentStatus = 0;
				}
				color = colors[currentStatus];
				$status.removeClass().addClass("color").addClass(color);
			}

			setInterval(function () {
				updateStatus();
			}, 2000);
		});
	</script>


	<!--[if lt IE 9]>
      Dummy Pricing page için gerekli. Custom.js dosyasına taşınacak
    <![endif]-->

	<script type="text/javascript">
		$(function () {
			var $plans = $(".plans .plan");
			$plans.click(function () {
				$plans.removeClass("selected");
				$(this).addClass("selected");
			});

			var $step_triggers = $("[data-step]");
			var $step_panels = $(".step-panel");
			var $tabs = $(".steps .step");

			$step_triggers.click(function (e) {
				e.preventDefault();
				var go_to_step = $(this).data("step");
				
				$step_panels.removeClass("active");
				$step_panels.eq(go_to_step).addClass("active");

				$tabs.removeClass("active");
				$tabs.eq(go_to_step).addClass("active");

				if (go_to_step === 1) {
					$("#billing-form input:text:eq(0)").focus();
				}
			});
		});
	</script>

	<!--[if lt IE 9]>
      Dummy startup wizard page için gerekli. Custom.js dosyasına taşınacak
    <![endif]-->

	<script type="text/javascript">
		$(function () {
			var $steps = $(".form-wizard .step"),
				$buttons = $steps.find("[data-step]"),
				$tabs = $(".header .steps .step"),
				active_step = 0;

			$buttons.click(function (e) {
				e.preventDefault();

				var step_index = $(this).data("step") - 1;
				var in_fade_class = (step_index > active_step) ? "fadeInRightStep" : "fadeInLeftStep";
				var out_fade_class = (in_fade_class === "fadeInRightStep") ? "fadeOutLeftStep" : "fadeOutRightStep";

				var $out_step = $steps.eq(active_step);
				$out_step.on(utils.animation_ends(), function () {
					$out_step.removeClass("fadeInRightStep fadeInLeftStep fadeOutRightStep fadeOutLeftStep");
				}).addClass(out_fade_class);

				active_step = step_index;

				$tabs.removeClass("active").filter(":lt(" + (active_step + 1) + ")").addClass("active");

				$steps.removeClass("active");
				$steps.eq(step_index).addClass("active animated " + in_fade_class);
			});

		});
	</script>

<!--Skin switcher commented out
	<div class="skin-switcher">
		<div class="toggler">
			<i class="fa fa-magic"></i>
		</div>
		<ul class="menu">
			<li>
				<a class="active" data-skin="sidebar-default" href="#">
					<span class="color default"></span> Default
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-clear" href="#">
					<span class="color clear"></span> Clear
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-black" href="#">
					<span class="color black"></span> Black
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-dark" href="#">
					<span class="color dark"></span> Dark
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-flat" href="#">
					<span class="color flat"></span> Flat
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-flat-dark" href="#">
					<span class="color flat-dark"></span> Flat dark
					<i class="fa fa-check"></i>
				</a>
			</li>
		</ul>
	</div>


<?php 
//***************************************
//this area writes times of sql processes-will be removed
//http://blog.tersmitten.nl/how-to-debug-sql-from-a-controller-in-cakephp.html
//echo $this->element('sql_dump');
?>
-->

<?php echo $this->element('sql_dump'); ?> 
<!--++++++++++++++++++++++++++++++++++++++++++++-->
<!--======Analitic code for channel owner=======-->
<!--++++++++++++++++++++++++++++++++++++++++++++-->
<script type="text/javascript">    var _gaq = _gaq || [];   _gaq.push( ['_setAccount', '<?php echo Configure::read('Clone.analitics_id'); ?>'], ['_trackPageview']);      (function() {     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);   })();  </script>
<!--++++++++++++++++++++++++++++++++++++++++++++-->
<!--=======//Analitic code for channel owner======-->
<!--++++++++++++++++++++++++++++++++++++++++++++-->

</html>