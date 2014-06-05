$(document).ready(function() {

    // Datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn:true,
        startView:2,
        todayHighlight:true
    });
			
			$("[data-switch]").bootstrapSwitch({
				"size": "small"
			});
	Messenger.options = {
		extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
	    theme: 'flat'
	}			
    /*
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
                attr	: $('#attr').val(),
                desc	: $('#desc').val(),
                gender	: $('#gender').val(),
                screen	: $('#screen').val(),
                time	: $('#user_time_zone').val(),
                strt	: $('#street').val(),
                cont	: $('#country').val(),
                pass	: $('#pass').val()
            },
            function(data) {
                if (data.error) {
                    alert(data.error); // error.id ye göre mesaj yazdırcak..
                }else{
                	Messenger().post("Data Updated!");
                	btn.button('reset');
                }
            }, 'json');
        }
        else if (attr == "channel_update") {
            //Liste bekleniyor.

        } else
        {

        }
    });

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

