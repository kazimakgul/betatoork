$(document).ready(function() {

    // Datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn:true,
        startView:2,
        todayHighlight:true
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
    /**
     *	Update Form Post Method
     * 	@param #attr.val(), link => Update controller
     *	@return data.error=> error.id or data.success=> success.id
     */
 $('#updateButton').click(function() {
        var link = updateData; //Businesses updatedata function run.
        var attr = $('#attr').val(); //Form control value
		var btn = $(this);
		btn.button('loading');

        if (attr == "profile_update")
        {
  			//validate("#account"); Function yapılcak ve gerekli dataların doğrulukları kontrol edilcek
            $.post(link, {
                attr	: attr,
                gender	: $('#gender').val(),
                time	: $('#user_time_zone').val(),
                cont	: $('#country').val()
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
        else if (attr == "channel_update") {
			$.post(link, {
                attr	: attr,
                title	: $('#title').val(),
                desc	: $('#desc').val(),
                bgColor: $('#bgcolor').val(),
                //bgImg	: $('#post_featured_image').val(),
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
		else{
			
        }
    });




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


	        $('#datatable-example').dataTable({
                "sPaginationType": "full_numbers",
                "iDisplayLength": 20,
    			"aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
            });

            // Bulk actions checkboxes

			var $toggle_all = $("input:checkbox.toggle-all");
			var $checkboxes = $("[name='select-product']");
			var $bulk_actions_btn = $(".bulk-actions .dropdown-toggle");

			$toggle_all.change(function () {
				var checked = $toggle_all.is(":checked");
				if (checked) {
					$checkboxes.prop("checked", "checked");
					toggleBulkActions(true);
				} else {
					$checkboxes.prop("checked", "");
					toggleBulkActions(false);
				}
			});

			$checkboxes.change(function () {
				var anyChecked = $("[name='select-product']:checked");
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

