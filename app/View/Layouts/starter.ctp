<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Toork Starter</title>
	<meta name="HandheldFriendly" content="true" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php echo $this->Html->script(array('js2/jquery','js2/jquery-ui.min','js2/bootstrap')); ?>

<?php echo $this->Html->css(array('css2/bootstrap','css2/bootstrap-responsive','css2/elusive-webfont')); ?>

	<script type="text/javascript" src="../psteps/includes/google-code-prettify/prettify.js"></script>
	<script type="text/javascript" src="../psteps/jquery.psteps.js"></script>

	<style type="text/css">
		/* Not psteps specific, just make this page a little more presentable. */
		#switcher-container {
			position: fixed;
			top: 60px;
			right: 5px;
		}
		#switcher-bootstrap .dropdown-menu {
			z-index: 10000;
		}
		@media (max-width: 980px) {
			#switcher-container {
				position: absolute;
				top: 55px;
			}
		}
		.pf-group {
			background: transparent none no-repeat 0 0 !important;
			padding: 4px;
			margin: 5px auto;
		}
		.ui-widget {
			font-size: 75% !important;
		}
		.pf-group input.ui-button {
			padding: 2px !important;
			font-size: .92em !important;
			margin-bottom: 3px;
		}
		.btn-toolbar {
			line-height: 28px;
		}
		.btn-toolbar h4 {
			margin: 1em 0 .3em;
		}
		.btn-toolbar .btn-group {
			vertical-align: middle;
		}

		/* ##psteps_simple# */
		/* ##psteps_add_validation# */
		/* ##psteps_strict# */
		/* ##psteps_conditional_validation# */
		/* ##psteps_simple_horiz_layout# */
		/* ##psteps_horiz_layout# */
		/* ##psteps_circle_steps_simple# */
		/* ##psteps_circle_steps# */
		.step-title {
			min-height: 20px;
			float:left;
			border-radius: 0;
		}
		.next-button, .submit-button, .back-button {
			float:right;
			margin:3px;
		}
		@media (max-width:600px) {
			.step-content {
				margin-top: 10px;
			}
		}
		/* #psteps_simple## */
		/* #psteps_add_validation## */
		/* #psteps_strict## */
		/* #psteps_conditional_validation## */
		/* #psteps_simple_horiz_layout## */
		/* #psteps_horiz_layout## */
		/* #psteps_circle_steps_simple## */
		/* #psteps_circle_steps## */

		/* ##psteps_simple# */
		/* Vertical Styles */
		#psteps_simple .step-title {
			padding-left: 0;
			padding-right: 0;
			width: 99.5% !important;
			min-height: 28px;
			display: block;
		}
		#psteps_simple .step-title .step-order {
			float: left;
			margin-left: 12%;
		}
		#psteps_simple .step-title .step-name {
			float: left;
			margin-left: 2%;
		}
		#psteps_simple .step-title [class^="icon-"] {
			float: right;
			margin-right: 7%;
			margin-top: 2%;
		}
		/* #psteps_simple## */
		/* ##psteps_add_validation# */
		/* Vertical Styles */
		#psteps_add_validation .step-title {
			padding-left: 0;
			padding-right: 0;
			width: 99.5% !important;
			min-height: 28px;
			display: block;
		}
		#psteps_add_validation .step-title .step-order {
			float: left;
			margin-left: 12%;
		}
		#psteps_add_validation .step-title .step-name {
			float: left;
			margin-left: 2%;
		}
		#psteps_add_validation .step-title [class^="icon-"] {
			float: right;
			margin-right: 7%;
			margin-top: 2%;
		}
		#psteps_add_validation .step-title .step-name {
			margin-left: 12%;
		}
		/* #psteps_add_validation## */
		/* ##psteps_strict# */
		/* Vertical Styles */
		#psteps_strict .step-title {
			padding-left: 0;
			padding-right: 0;
			width: 99.5% !important;
			min-height: 28px;
			display: block;
		}
		#psteps_strict .step-title .step-order {
			float: left;
			margin-left: 12%;
		}
		#psteps_strict .step-title .step-name {
			float: left;
			margin-left: 2%;
		}
		#psteps_strict .step-title [class^="icon-"] {
			float: right;
			margin-right: 7%;
			margin-top: 2%;
		}
		#psteps_strict .step-title .step-name {
			margin-left: 12%;
		}
		/* #psteps_strict## */
		/* ##psteps_conditional_validation# */
		/* Vertical Styles */
		#psteps_conditional_validation .step-title {
			padding-left: 0;
			padding-right: 0;
			width: 99.5% !important;
			min-height: 28px;
			display: block;
		}
		#psteps_conditional_validation .step-title .step-order {
			float: left;
			margin-left: 12%;
		}
		#psteps_conditional_validation .step-title .step-name {
			float: left;
			margin-left: 2%;
		}
		#psteps_conditional_validation .step-title [class^="icon-"] {
			float: right;
			margin-right: 7%;
			margin-top: 2%;
		}
		/* #psteps_conditional_validation## */

		/* ##psteps_circle_steps_simple# */
		/* ##psteps_circle_steps# */
		.psteps_circle_titles .circle-step {
			width: 10px;
			height: 10px;
			padding: 5px;
			line-height: 10px;
			font-size: 10px;
			border-radius: 500px 500px 500px 500px;
			min-height:10px;
			float:left;
		}
		.psteps_circle_titles .step-line {
			border-bottom: 1px solid #ddd;
			display: inline-block;
			width: 20%;
			float:left;
			margin-top:10px;
		}
		.psteps_circle_contents {
			background: #F9F9F9;
			border: 1px dashed #CCCCCC;
			margin: 15px 0 0;
			padding: 20px;
		}
		/* #psteps_circle_steps## */
		.before-heading {
			margin-top: -32px;
			width: 99%;
			margin-left: -24px;
		}
		/* #psteps_circle_steps_simple## */

		.colored-box {
			display:inline-block;
			cursor:pointer;
			width:50px;
			height:50px;
			opacity: .5;
		}

		.btn-group {
			margin: 10px;
		}
	</style>
	<script type="text/javascript">
		$(function(){
			_alert = window.alert;
			window.alert = function(message) {
				$.pnotify({
					title: "Alert",
					text: message
				});
			};


			// This handles all those source buttons.
			$(".source.steps-html[data-source-selector]").each(function(){
				// Copy HTML sources into an attribute.
				var button = $(this);
				button.attr('data-source', $('<div></div>').html($(button.attr('data-source-selector')).clone()).html());
			});
			$(".source.steps-css[data-source-selector]").each(function(){
				// Copy CSS sources into an attribute.
				var button = $(this), source = "",
					selector = button.attr('data-source-selector');
				$('style[type="text/css"]').each(function(){
					var text = $(this).text(),
						matches = text.match(new RegExp("\\/\\* #"+selector+" \\*\\/([\\s\\S]*?)\\/\\* "+selector+"# \\*\\/", 'g'));
					if (matches)
						source += matches.join("\n");
				});
				button.attr('data-source', source.replace(new RegExp("(\\/\\* #?#\\w+##? \\*\\/|\\n|\\t)", 'g'), ''));
			});
			$(".source").each(function(){
				var button = $(this);
				button.click(function(){
					var button = $(this);
					button.blur();
					var type, text, dialog = $("<div title=\"Source\" class=\"source-dialog\"></div>");
					if (button.hasClass('steps-html')) {
						text = style_html(button.attr('data-source'));
						dialog.addClass('steps-html');
						type = "html";
					}
					if (button.hasClass('steps-css')) {
						text = css_beautify(button.attr('data-source'));
						dialog.addClass('steps-css');
						type = "css";
					}
					if (button.hasClass('steps-jquery')) {
						text = js_beautify(button.attr('data-source'));
						dialog.addClass('steps-jquery');
						type = "js";
					}

					$("<pre class=\"prettyprint linenums lang-"+type+"\" />").text(text).appendTo(dialog);
					if (text.match(/^\w*\([^\)]*\);$/)) {
						var f_name = text.replace(/\(.*/g, "");
						text = window[f_name].toString();
						$("<pre class=\"prettyprint lang-"+type+"\" />").text(text).appendTo(dialog);
					}
					dialog.dialog({width: "auto", dialogClass: "sourcecode"});
					// Make sure the dialog isn't more than 800x600.
					// Can't just add max-height cause that means it can't be resized beyond.
					if (dialog.width() > 800)
						dialog.dialog("option", "width", 800).dialog("option", "position", "center");
					if (dialog.height() > 600)
						dialog.dialog("option", "height", 600).dialog("option", "position", "center");
					prettyPrint();
				});
			});
			prettyPrint(); // Format source in help.





			// This is how to change the default settings for the entire page.
			//$.psteps.defaults.xxxx = "xxxx";



$(function(){
    $('#psteps_simple').psteps();
});


			$('#psteps_add_validation').psteps({
				traverse_titles: 'visited',
				shrink_step_names: false,
				step_order: false,
				validation_rule: function(){
					var cur_step = $(this);
					var correct_box = cur_step.find('.correct-box');
					return (correct_box.hasClass('success-box'));
				},
				before_next: "Please choose the correct box before moving on to the next step.",
				before_submit: "Please complete all steps before submitting."
			}).find('.colored-box').click(function(){
				var box = $(this);
				box.siblings().css('opacity', '.5').end().css('opacity', '1');
				if (box.hasClass('correct-box')) {
					box.addClass('success-box');
				} else
					box.siblings('.correct-box').removeClass('success-box');
				box.trigger('validate.psteps');
			});

			$('#psteps_strict').psteps({
				traverse_titles: 'never',
				back: false,
				step_order: false,
				validate_error_msg: 'Correct answers before moving to next step.',
				validation_rule: function(){
					var cur_step = $(this);
					var title_active = $('.step-title.step-active');
					var correct_box = cur_step.find('.correct-box');
					var clicked_box = cur_step.find('.clicked-box');
					if (correct_box.hasClass('success-box')) {
						title_active.removeClass('step-error');
						return true;
					} else if (clicked_box.length > 0 || title_active.hasClass('step-error')) {
						if (cur_step.hasClass('step-active'))
							alert('Incorrect box clicked. Choose the right one!');
						return 'error';
					} else
						return false;
				},
				before_next: "Please choose the correct box before moving on to the next step.",
				before_submit: "Please complete all steps before submitting."
			}).find('.colored-box').click(function(){
				var box = $(this);
				box.addClass('clicked-box').siblings().css('opacity', '.5').removeClass('clicked-box').end().css('opacity', '1');
				if (box.hasClass('correct-box'))
					box.addClass('success-box');
				else
					box.siblings('.correct-box').removeClass('success-box');
				box.trigger('validate.psteps');
			});

			$('#psteps_conditional_validation').psteps({
				traverse_titles: 'always',
				validate_use_error_msg: false,
				shrink_step_names: false,
				steps_show: function(){
					var cur_step = $(this),
						loaded_tooltips = cur_step.siblings('.step-loaded').find('.step-tooltip');
					loaded_tooltips.tooltip('hide');
				},
				steps_onload: function(){
					var cur_step = $(this),
						step_tooltip = cur_step.find('.step-tooltip');
					if (step_tooltip.length && cur_step.hasClass('step-active')) {
						step_tooltip.tooltip({placement: 'right'});
						setTimeout(function(){
							step_tooltip.tooltip('show');
						}, 3000);
					}
				},
				validation_rule: function(){
					var cur_step = $(this);

					if (cur_step.hasClass('pstep1')) {
						// Validation Rule for Step 1
						var first_name = cur_step.find('[name=first_name]');
						if (first_name.val().toLowerCase() == 'bob')
							return true;
						else if (first_name.val() != '') {
							if (cur_step.hasClass('step-active'))
								alert('Please enter \'Bob\' as the first name.');
							return 'error';
						} else
							return false;
					} else if (cur_step.hasClass('pstep2')) {
						// Validation Rule for Step 2
						var middle_name = cur_step.find('[name=middle_name]');
						if (middle_name.val().toLowerCase() == 'herman')
							return true;
						else if (middle_name.val() != '') {
							if (cur_step.hasClass('step-active'))
								alert('Please enter \'Herman\' as the middle name.');
							return 'warning';
						} else
							return false;
					} else if (cur_step.hasClass('pstep3')) {
						// Validation Rule for Step 3
						var last_name = cur_step.find('[name=last_name]');
						if (last_name.val().toLowerCase() == 'sherman')
							return true;
						else if (last_name.val() != '') {
							if (cur_step.hasClass('step-active'))
								alert('Please enter \'Sherman\' as the last name.');
							return 'warning';
						} else
							return false;
					}
				},
				before_next: "Please complete the all fields before advancing to the next section.",
				before_submit: "Please complete all sections before submitting."
			}).find('input').change(function(){
				$(this).trigger('validate.psteps');
			});

			$('#psteps_simple_horiz_layout').psteps({
				steps_width_percentage: true,
				alter_width_at_viewport: '2500',
				steps_height_equalize: true
			});


			$('#psteps_horiz_layout').psteps({
				traverse_titles: 'always',
				steps_width_percentage: true,
				alter_width_at_viewport: '2500',
				steps_height_equalize: true,
				content_height_equalize: true,
				validate_use_error_msg: false,
				content_headings: true,
				step_order: false,
				steps_show: function(){
					var cur_step = $(this),
						loaded_tooltips = cur_step.siblings('.step-loaded').find('.step-tooltip');
					loaded_tooltips.tooltip('hide');
				},
				steps_onload: function(){
					var cur_step = $(this),
						step_tooltip = cur_step.find('.step-tooltip');
					step_tooltip.tooltip({placement: 'right'});
					if (cur_step.hasClass('pstep1')) {
						setTimeout(function(){
							step_tooltip.tooltip('show');
						}, 3000);
					} else {
						setTimeout(function(){
							step_tooltip.tooltip('show');
						}, 1000);
					}

					if (cur_step.hasClass('pstep2')) {
						cur_step.find('[name=birthdate]').datepicker({
							maxDate: 0,
							changeMonth: true,
							changeYear: true,
							yearRange: '-120',
							defaultDate: '-25y',
							dateFormat: 'yy-mm-dd'
						});
					}

					if (cur_step.hasClass('pstep4')) {
						var radio_public = cur_step.find('[name=public]'),
							radio_private = cur_step.find('[name=private]');
						radio_public.click(function(){
							if (radio_private.prop('checked') && radio_private.attr('checked')) {
								radio_private.removeProp('checked').removeAttr('checked');
							}
						});
						radio_private.click(function(){
							if (radio_public.prop('checked') && radio_public.attr('checked')) {
								radio_public.removeProp('checked').removeAttr('checked');
							}
						});
					}
				},
				validation_rule: function(){
					var cur_step = $(this);
					var toggle_completed = function(input, show){
						if (!show)
							input.closest('label').find('.pf-required').show().end().find('.pf-completed').hide();
						else
							input.closest('label').find('.pf-required').hide().end().find('.pf-completed').show();
					};
					var validate_step = function(errors, warnings, false_results){
						if (errors > 0)
							return 'error';
						else if (false_results > 0)
							return false;
						else if (warnings > 0)
							return 'warning';
						else
							return true;
					};
					if (cur_step.hasClass('pstep1')) {
						var active = cur_step.hasClass('step-active');
						// Validation Rule for Step 1
						var count_false = 0,
							count_warning = 0,
							count_error = 0;
						// Username
						var input = cur_step.find('.step-validate:[name=username]'),
							input_val = input.val();
						if (input_val == '') {
							count_false++;
							toggle_completed(input, false);
						} else if (input_val.length < 6 || input_val.length > 12) {
							if (active && input.hasClass('cur-validate'))
								alert('Please type a username that is 6-12 characters.');
							toggle_completed(input, false);
							count_error++;
						} else
							toggle_completed(input, true);

						// Password
						var input = cur_step.find('.step-validate:[name=password]'),
							input_val = input.val();
						if (input_val == '') {
							count_false++;
							toggle_completed(input, false);
						} else if (input_val.length < 7) {
							if (active && input.hasClass('cur-validate'))
								alert('Please type a password that is longer than 6 characters.');
							toggle_completed(input, false);
							count_error++;
						} else
							toggle_completed(input, true);

						// Email
						var input = cur_step.find('.step-validate:[name=retype_email]'),
							input_compare = cur_step.find('.step-validate:[name=email]'),
							input_val = input.val(),
							input_compare_val = input_compare.val();
						if (input_val == '') {
							count_false++;
							toggle_completed(input, false);
						} else if (input_val != input_compare_val) {
							if (active && (input.hasClass('cur-validate') || input_compare.hasClass('cur-validate') ))
								alert('Please re-type your email so that both email fields match.');
							toggle_completed(input, false);
							count_error++;
						} else
							toggle_completed(input, true);

						cur_step.find('.step-validate').removeClass('cur-validate');

						return validate_step(count_error, count_warning, count_false);

					} else if (cur_step.hasClass('pstep2')) {
						// Validation Rule for Step 2
						var active = cur_step.hasClass('step-active'),
							count_false = 0,
							count_warning = 0,
							count_error = 0;
						// Birth Date
						var input = cur_step.find('.step-validate:[name=birthdate]'),
							input_val = input.val();
						if (input_val == '') {
							count_false += 1;
							toggle_completed(input, false);
						} else if (input_val.length < 6 || input_val.length > 12) {
							if (active && input.hasClass('cur-validate'))
								alert('Please type a username that is 6-12 characters.');
							toggle_completed(input, false);
							count_error += 1;
						} else
							toggle_completed(input, true);

						return validate_step(count_error, count_warning, count_false);

					} else if (cur_step.hasClass('pstep3')) {
						// Validation Rule for Step 3
						var active = cur_step.hasClass('step-active'),
							count_false = 0,
							count_warning = 0,
							count_error = 0;
						// Terms of Service
						var check_box = cur_step.find('.step-validate:[name=terms]');
						if (check_box.is(':checked'))
							toggle_completed(check_box, true);
						else if (check_box.hasClass('cur-validate')) {
							count_error++;
							toggle_completed(check_box, false);
						} else {
							count_false++;
							toggle_completed(check_box, false);
						}

						return validate_step(count_error, count_warning, count_false);

					} else if (cur_step.hasClass('pstep4')) {
						// Validation Rule for Step 3
						var radio_public = cur_step.find('.step-validate:[name=public]'),
							radio_private = cur_step.find('.step-validate:[name=private]');
						return (radio_public.hasClass('cur-validate') || radio_private.hasClass('cur-validate'));
					}
				},
				before_next: "Please complete all the fields before advancing to the next section.",
				before_submit: "Please complete all sections before submitting."
			}).find('.step-validate').on('focusout', function(){
				var elem = $(this);
				elem.addClass('cur-validate')
				if (elem.attr('name') == "birthdate") {
					setTimeout(function(){
						elem.trigger('validate.psteps');
					}, 500);
				} else
					elem.trigger('validate.psteps');
			}).end().find('pf-completed').hide();






			/*
			* ###### CIRCLE DESIGN ######
			* 
			* The following is what you need to do to make the pretty numbered
			* circle style steps!!
			*/
			// To keep step lines in psteps_circle_steps looking good!
			var configure_circle_lines = function(circle_container){
				$(window).resize(function(){
					setTimeout(function(){
						var step_lines = circle_container.find('.step-line'),
							num_circles = circle_container.find('.step-title').length,
							container_width = circle_container.width(),
							circle_widths = (circle_container.find('.step-title').outerWidth()) * num_circles,
							line_width = Math.floor((container_width - circle_widths) / (num_circles - 1));
						step_lines.width((line_width < 1) ? 0 : (line_width-1));
					}, 200);
				}).resize();
			}

			$('#psteps_circle_steps_simple').psteps({
				traverse_titles: 'visited',
				steps_width_percentage: false,
				content_headings: true,
				step_names: false,
				check_marks: false,
				content_headings_after: '.before-heading'
			});


			configure_circle_lines($('.psteps_circle_titles', '#psteps_circle_steps_simple'));
			/*
			* And that's it. :)
			*/


			$('#psteps_circle_steps').psteps({
				traverse_titles: 'never',
				steps_width_percentage: false,
				alter_width_at_viewport: '600',
				content_height_equalize: true,
				content_headings: true,
				back: false,
				step_names: false,
				check_marks: false,
				validate_errors: false,
				validate_next_step: true,
				ignore_errors_on_next: true,
				ignore_errors_on_submit: true,
				steps_show: function(){
					var cur_step = $(this);
					if (!cur_step.hasClass('pstep1'))
						cur_step.find('input.step-validate').focus();
				},
				validation_rule: function(){
					var cur_step = $(this);
					var validate_answers = function(cur_step, question, answer) {
						var active = cur_step.hasClass('step-active');
						var input = cur_step.find('.step-validate:[name=circle_'+question+']');
						var input_val = input.val();
						var answer = answer;
						if (input_val == '') {
							return false
						} else if (input_val != answer) {
							input.hide();
							input.nextAll('.step-answer:first').remove();
							input.after('<div class="step-answer">You answered: <strong>'+input_val+'</strong> <i class="icon-asterisk pf-required"></i><br/><br/>The correct answer is <strong>'+answer+'</strong>.</div>');
							return 'error';
						} else {
							input.hide();
							input.nextAll('.step-answer:first').remove();
							input.after('<div class="step-answer">You answered: <strong>'+input_val+'</strong> <i class="icon-asterisk pf-completed"></i><br/><br/>The correct answer is <strong>'+answer+'</strong>.</div>');
							return true;
						}
					}

					if (cur_step.hasClass('pstep1'))
						return validate_answers(cur_step, '1','5');

					if (cur_step.hasClass('pstep2'))
						return validate_answers(cur_step, '2','5');

					if (cur_step.hasClass('pstep3'))
						return validate_answers(cur_step, '3','56');

					if (cur_step.hasClass('pstep4'))
						return validate_answers(cur_step, '4','12');

					if (cur_step.hasClass('pstep5'))
						return validate_answers(cur_step, '5','25');

					if (cur_step.hasClass('pstep6'))
						return validate_answers(cur_step, '6','-10');

					if (cur_step.hasClass('pstep7'))
						return validate_answers(cur_step, '7','15');

					if (cur_step.hasClass('pstep8'))
						return validate_answers(cur_step, '8','30');

					if (cur_step.hasClass('pstep9'))
						return validate_answers(cur_step, '9','4');

					if (cur_step.hasClass('pstep10'))
						return validate_answers(cur_step, '10','35');

					if (cur_step.hasClass('pstep11'))
						return validate_answers(cur_step, '11','51');

				},
				before_next: "Please provide an answer to the math problem.",
				before_submit: "Please complete all sections before submitting.",
				load_after_steps: function(){
					var psteps = $(this),
						after_steps = psteps.find('.after-steps'),
						step_contents = psteps.find('.step-content'),
						step_titles = psteps.find('.step-title');

					step_contents.hide();

					var num_steps = step_titles.length,
						num_steps_right = psteps.find('.step-title.btn-success').length;

					after_steps.find('.num-questions').html(num_steps);
					after_steps.find('.results-answered').html(num_steps_right);

					var percentage = Math.round( (num_steps_right / num_steps) * 100);
					if (percentage >= 80 && percentage < 90)
						percentage = "an "+percentage;
					else
						percentage = "a "+percentage;

					after_steps.find('.results-percentage').html(percentage);

					after_steps.show();
					step_titles.addClass('disabled');

					var submit_button = psteps.find('.submit-button');
					submit_button.hide();

					var back_button = psteps.find('.back-button');
					back_button.hide();

					var review_button = $('<button class="btn btn-info" style="display: block; cursor: pointer; float:right; margin: 3px;">Review</button>');
					back_button.after(review_button);
					review_button.click(function(){
						psteps.trigger('traverse_visited.psteps');
						if (psteps.find('.step-title.step-error').length > 0)
							psteps.trigger('go_to_first_error.psteps');
						else
							psteps.find('.step-title:first').trigger('go_to_step.psteps');
						$(this).remove();
					});
				}
			}).find('.submit-button').click(function(){
				$(this).trigger('load_after_steps.psteps');
			});

			configure_circle_lines($('.psteps_circle_titles', '#psteps_circle_steps'));

			// Navbar scrollspy.
			$('#navbar').scrollspy();
		});
	</script>

</head>
<body id="page" data-spy="scroll">


<?php echo $content_for_layout?>


		<div id="footer">
	      <div class="container">
	        <p class="muted credit">Toork © copyright 2013. all rights reserved</p>
	      </div>
	    </div>


</body>
</html>