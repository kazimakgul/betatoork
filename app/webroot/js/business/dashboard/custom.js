$(document).ready(function() {

 
 
    /**
     *	Update Form Post Method
     * 	@param #attr.val(), link => Update controller
     *	@return data.error=> error.id or data.success=> success.id
     */
 $('#updateButton').click(function(e) {
 		e.preventDefault();
        var link = updateData; //Businesses updatedata function run.
        var attr = $('#attr').val(); //Form control value
		var btn = $(this);
		btn.button('loading');
        if (attr == "profile_update" && $('#settings_profile').valid())
        {
            $.post(link, {
                attr	: attr,
                gender	: $('#gender').val(),
                time	: $('#user_time_zone').val(),
                cont	: $('#country').val()
            },
            function(data) {
                if (data.error) {
                    alert(data.error);
                }else{
                	Messenger().post(data.success);
                	btn.button('reset');
                }
            }, 'json');
        }
        else if (attr == "notification_update") {
        	var permarray = [];
			$("input:checkbox[name=permission]:not(:checked)").each(function()
				{
					permarray.push(this.value);
				});
				$.post(link, {
						attr	: attr,
						permdata:permarray
					},
		            function(data) {
		                if (data.error) {
		                    alert(data.error); // error.id ye göre mesaj yazdırcak..
		                }else{
		                	Messenger().post(data.success);
		                	btn.button('reset');
		                }
		            }, 'json');
        }
        else if (attr == "channel_update" && $('#channel_profile').valid()) {
			$.post(link, {
                attr	: attr,
                title	: $('#title').val(),
                desc	: $('#desc').val(),
                bgColor: $('#bgcolor').val(),
                analitics: $('#analitics').val()
 					},
		            function(data) {
		                if (data.error) {
		                    alert(data.error); // error.id ye göre mesaj yazdırcak..
		                }else{
		                	Messenger().post(data.success);
		                	btn.button('reset');
		                }
		            }, 'json');
        }
        else if (attr == "edit_ads" && $('#edit_ads').valid()) {
        	var anyChecked = $("input:checkbox[name=category]:checked");
		  	var category = new Array();
		  	var countC = anyChecked.length;
		  	for(i = 0; i <= countC-1; i++)
		  	{
		  		category[i] = anyChecked[i].value;
			}  		
        	var cat_arr = JSON.stringify(category);
			$.post(link, {
                attr	: attr,
                title	: $('#title').val(),
                desc	: $('#desc').val(),
                ad_id	: $('#ad_id').val(),
                category: cat_arr
 					},
		            function(data) {
		                if (data.error) {
		                    alert(data.error); // error.id ye göre mesaj yazdırcak..
		                }else{
		                	Messenger().post(data.success);
		                	btn.button('reset');
		                	setTimeout(function(){location.href=ads_management}, 2000 );
		                }
		            }, 'json');
        }
		else{
			btn.button('reset');
        }
    });


 
    /**
     *	New Form Post Method
     * 	@param #attr.val(), link => New controller
     *	@return data.error=> error.id or data.success=> success.id
     */
 $('#NewButton').click(function(e) {
 	e.preventDefault();
        var link = newData; //Businesses updatedata function run.
        var attr = $('#attr').val(); //Form control value
		var btn = $(this);
		btn.button('loading');
		if (attr == "new_ads" && $('#add_ads').valid())
        {
            $.post(link, {
                attr	: attr,
                title	: $('#title').val(),
                desc	: $('#desc').val(),
                category: $('#category').val()
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                }else{
                	Messenger().post(data.success);
                	btn.button('reset');
                	setTimeout(function(){location.href=ads_management}, 2000 );
                }
            }, 'json');
        }
 		else if (attr == "game_add") // && $('#game_add').valid() eklenicek
        {
            $.post(link, {
                attr		: attr,
                name		: $('#name').val(),
                desc		: $('#desc').val(),
                link		: $('#link').val(),
                width		: $('#width').val(),
                height		: $('#height').val(),
                category	: $('#category').val(),
                tags		: $('#tags').val(),
                fullscreen	: $('#fullscreen').val(),
                picture		: $('#user_background').src(),
                mobile		: $('#mobile').val()
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                }else{
                	Messenger().post(data.success);
                	btn.button('reset');
                	setTimeout(function(){location.href=ads_management}, 2000 );
                }
            }, 'json');
        }else{
        	btn.button('reset');
        }
		
	});


$('#deletedata').click(function(e) {
		e.preventDefault();
		var link = deletedata;		
        var attr = $('#attr').val(); //Form control value
		var btn = $(this);
		btn.button('loading');
		
		if(attr == "edit_ads"){
		  count = $("[name='select-ads']:checked").length;
		  if(count>1)
		  {
		  	for(i = 0; i <= count-1; i++)
		  	{
		  		id = $("[name='select-ads']:checked")[i].value;
				  	$.post(link, {
		                attr	: attr,
		                id		: id
		            },
		            function(data) {
		                if (data.error) {
		                    alert(data.error); // error.id ye göre mesaj yazdırcak..
		                }else{
		                	Messenger().post(data.success);
		                	$('#confirm-modal').modal('hide');
		                	setTimeout(function(){location.href=ads_management}, 2000 );
		                }
		            }, 'json');
		  	}
		  	
		  }else{
		  	id	= $("[name='select-ads']:checked")[0].value;
		  	$.post(link, {
		                attr	: attr,
		                id		: id
		            },
		            function(data) {
		                if (data.error) {
		                    alert(data.error); // error.id ye göre mesaj yazdırcak..
		                }else{
		                	Messenger().post(data.success);
		                	$('#confirm-modal').modal('hide');
		                	setTimeout(function(){location.href=ads_management}, 2000 );
		                }
		            }, 'json');
		  }
		}else{
			
		}

});

$('.remove_bg_img').click(function() {

     //------
       $.ajax({
        type: "POST",
        url: remove_background,
        dataType: "json",
    async: false,
        success: function(data){
      
      Messenger().post(data.rtdata.title);
      $('#user_background').attr('src','https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png');
      $('#background_area').css('background-image','');
      $('#bg_message').html('No background chosen.');
      $('.remove_bg_img').hide(); 

      },
        failure: function(errMsg) {
            alert(errMsg);
        }
  });
     //------ 

});
	

$( "#bgcolor" ).blur(function() {
  $('#background_area').css('background-color',$( "#bgcolor" ).val());
});


$('#redirect').click(function() {
        var attr = $('#attr').val(); //Form control value
		var btn = $(this);
		btn.button('loading');
		
		if(attr == "edit_ads"){
		  id = $("[name='select-ads']:checked").val();
          window.location.href=edit_ads+'/'+id;			
		}else{
			
		}

});

   //Controller functions for modals of avatar begins
$('#avatarframe').load(function(){
  $(this).contents().find("#close_panel").on('click', function(event) { $('#pictureChange').modal('toggle'); });
});

$('#avatarframe').load(function(){
  $(this).contents().find("#set_photo").on('click', function(event) { 
   $('#pictureChange').modal('toggle');
   $('#channel_avatar').attr('src','http://www.imageyourself.net/images/website/loading.gif');
   
   setTimeout(function(){
        var new_img = $('iframe[id=avatarframe]').contents().find('#new_image_link').val();
        $('#channel_avatar').attr('src',new_img);              
   },1000);

   });

//var name = $('iframe[id=avatarframe]').contents().find('#selected_image').val();
//alert(name);
});
//Controller functions for modals of avatar ends

//Controller functions for modals of cover begins
$('#coverframe').load(function(){
  $(this).contents().find("#close_panel").on('click', function(event) { $('#coverChange').modal('toggle'); });
});

$('#coverframe').load(function(){
  $(this).contents().find("#set_photo").on('click', function(event) { 
   $('#coverChange').modal('toggle');
   $('#user_cover').css('background-image','url(http://3.bp.blogspot.com/-13dC5LhMbMM/T6NpcCU7obI/AAAAAAAAAVE/kt0XhVIV_zU/s200/loading.gif)');  
   setTimeout(function(){
        var new_img = $('iframe[id=coverframe]').contents().find('#new_image_link').val();
        $('#user_cover').css('background-image','url('+new_img+')');           
   },1000);

   });

});
//Controller functions for modals of covers ends

//Controller functions for modals of background begins
$('#backgroundframe').load(function(){
  $(this).contents().find("#close_panel").on('click', function(event) { $('#backgroundChange').modal('toggle'); });
});

$('#backgroundframe').load(function(){
  $(this).contents().find("#set_photo").on('click', function(event) { 
   $('#backgroundChange').modal('toggle'); 
   
   var new_img = $('iframe[id=backgroundframe]').contents().find('#new_image_link').val();
   $('#user_background').attr('src',new_img); 
   $('#background_area').css('background-image','url('+new_img+')');
   $('.remove_bg_img').show();          
   });

});
//Controller functions for modals of background ends



    /**
     * 
     *  MY GAMES
     *
     */


    // User list checkboxes
    var $allUsers = $(".select-users input:checkbox");
    var $checkboxes = $("[name='select-user']");
    $allUsers.change(function() {
        var checked = $allUsers.is(":checked");
        if (checked) {
            $checkboxes.prop("checked", "checked");
            toggleBulkActions(checked, $checkboxes.length);
        } else {
            $checkboxes.prop("checked", "");
            toggleBulkActions(checked, 0);
        }
    });
    $checkboxes.change(function() {
        var anyChecked = $(".user [name='select-user']:checked");
        toggleBulkActions(anyChecked.length, anyChecked.length);
    });
    function toggleBulkActions(shouldShow, checkedCount) {
        if (shouldShow) {
            $(".users-list .header").hide();
            $(".users-list .header.select-users").addClass("active").find(".total-checked").html("(" + checkedCount + " total games)");

        } else {
            $(".users-list .header").show();
            $(".users-list .header.select-users").removeClass("active");
        }
    }
    // Grid switcher
    $btns = $(".grid-view");
    $views = $(".users-view");
    $btns.click(function(e) {
        e.preventDefault();
        $btns.removeClass("active");
        $(this).addClass("active");

        $views.removeClass("active");

        $(".users-grid").hide();
        $(".users-list").hide();

        $($(this).data("grid")).show();
    });

});



       $(function() {
 	/**
     *	Filter dropdown options Method, Ads management page
     * 	@param 
     *	@return Filter
     */					
			var $filters = $(".filters .filter input:checkbox");
			
			$filters.change(function () {
				var $option = $(this).closest(".filter").find(".filter-option");

				if ($(this).is(":checked")) {
					$option.slideDown(150, function () {
						$option.find("input:text:eq(0)").focus();
					});
				} else {
					$option.slideUp(150);
				}
			});

			// Filter dropdown options for Created date, show/hide datepicker or input text
			var $dropdown_switcher = $(".field-switch");
			$dropdown_switcher.change(function () {
				var field_class = $(this).find("option:selected").data("field");
				var $filter_option = $(this).closest(".filter-option");
				$filter_option.find(".field").hide();
				$filter_option.find(".field." + field_class).show();

				if (field_class === "calendar") {
					$filter_option.find(".datepicker").datepicker("show");
				} else {
					$filter_option.find(".field." + field_class + " input:text").focus();
				}
			});


	        $('#datatable-ads').dataTable({
                "sPaginationType": "full_numbers",
                "iDisplayLength": 5,
    			"aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
            });

            // Bulk actions checkboxes

			var $toggle_all = $("input:checkbox.toggle-all");
			var $checkboxes = $("[name='select-ads']");
			var $bulk_actions_btn = $(".bulk-actions .dropdown-toggle");

			$toggle_all.change(function () {
				var checked = $toggle_all.is(":checked");
				if (checked) {
					$checkboxes.prop("checked", "checked");
					$('#redirect').css("display","none");
					toggleBulkActions(true);
				} else {
					$checkboxes.prop("checked", "");
					toggleBulkActions(false);
				}
			});

			$checkboxes.change(function () {
				var anyChecked = $("[name='select-ads']:checked");
				if(anyChecked.length>1){
				$('#redirect').css("display","none");
				}else{
					$('#redirect').css("display","block");
				}
				toggleBulkActions(anyChecked.length);
			});

			function toggleBulkActions(show) {
				if (show) {
					$bulk_actions_btn.removeClass("disabled");
				} else {
					$bulk_actions_btn.addClass("disabled");	
				}
			}

			//Filtered END

 	/**
     *	Tabs Method, Profile page
     * 	@param 
     *	@return tabs
     */	
        	// tabs
        	var $tabs = $(".tabs a");
        	var $tab_contents = $(".tab-content .tab");

        	$tabs.click(function (e) {
        		e.preventDefault();
        		var index = $tabs.index(this);

        		$tabs.removeClass("active");
        		$tabs.eq(index).addClass("active");

        		$tab_contents.removeClass("active");
        		$tab_contents.eq(index).addClass("active");
        	});


        	// orders datatable 
            $('#datatable-profile').dataTable({
                "sPaginationType": "full_numbers",
                "iDisplayLength": 20,
    			"aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
            });
            
            
            
            
            
 			// form validation
			$('#settings_profile').validate({
				rules: {
					"datepicker": {
						required: true
					}
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});
			
            
 			// form validation
			$('#channel_profile').validate({
				rules: {
					"screenname": {
						required: true
					},
					"description": {
						required: true
					},
					"bgclr": {
						required: true
					}
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});			


            
 			// form validation
			$('#add_ads').validate({
				rules: {
					"product[first_name]": {
						required: true
					},
					"customer[notes]": {
						required: true
					}
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});	
			
 			// form validation
			$('#edit_ads').validate({
				rules: {
					"product[first_name]": {
						required: true
					},
					"customer[notes]": {
						required: true
					}
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});	
			
						
	
    // Datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn:true,
        startView:2,
        todayHighlight:true
    });


			// Product tags with select2
			$("#tags").select2({
				placeholder: 'Select tags or add new ones',
				tags:["Zombie", "Flying", "Upgrade", "Wacom"],
				tokenSeparators: [",", " "]
			});
	        // Minicolors colorpicker
	        $('input.minicolors').minicolors({
	        	position: 'top left',
	        	defaultValue: '#9b86d1',
	        	theme: 'bootstrap'
	        });
			
			$("[data-switch]").bootstrapSwitch({
				"size": "small"
			});
	Messenger.options = {
		extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
	    theme: 'flat'
	}			
 		       
            
        });
 