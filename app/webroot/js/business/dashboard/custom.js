$(document).ready(function() {

			// Datepicker
	        $('.datepicker').datepicker({
	        	autoclose: true,
	        	orientation: 'left bottom',
	        });

	/*
	 *	Update Form Post Method
	 * 	@param #attr.val(), link => Update controller
	 *	@return data.error=> error.id or data.success=> success.id
	 */
	$('#updateButton').click(function () {
		var link = updateData; //Businesses updatedata function run.
		var attr = $('#attr').val(); //Form control value

		if(attr == "profile_update")
		{
			$.post(link, {
						attr	: $('#attr').val(),
						time	: $('#user_time_zone').val(),
						strt	: $('#street').val(),
						cont	: $('#country').val(),
						zip		: $('#zip').val(),
						pass	: $('#pass').val()
					},
					function (data) {
						if (data.error) {alert(data.error); } // error.id ye göre mesaj yazdırcak..
					}, 'json');
		}
		else if(attr == "channel_update"){
			//Liste bekleniyor.
			
		}else
		{
			
		}
	});
});

