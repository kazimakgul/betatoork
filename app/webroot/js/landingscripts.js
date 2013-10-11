$(function(){
	
	$('#t_gatekeeper_login_btn').click(function () {
		
		tlogin2();
	});
	
	function tlogin2(){
        $.post(remotecheck, { un: $('#txt_signusername').val(), ps: $('#txt_signpass').val(), attr: 'txt_logusername' }, function (data) {
			if(data.rtdata.msgid=='0'){
				
				$('#errormsg_Passwd').html(data.rtdata.msg);
				$('#errormsg_Passwd').show();
				
			}
			else if(data.rtdata.msgid=='1'){
				
				window.location = data.rtdata.msg;
			}
			else{
				
				$('#errormsg_Passwd').html(data.rtdata.msg);
				$('#errormsg_Passwd').show();
							
			}
        }, 'json');	
	}
	
	
	
	//Validation for login panel
	jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
var form = $( "#toorkLogin" );
form.validate({
  rules: {
    email: {
      required: true
    }
  },
  messages: {
    email: {
      required: "Please enter your username or email."
    }
  }
});
$('.validateLogin').click(function() {
  form.valid();
});

 $('#txt_signusername').keypress(function () { $('#errormsg_Passwd').hide(); });
 $('#txt_signpass').keypress(function () { $('#errormsg_Passwd').hide(); });	
 
 $('#txt_signusername').keypress(function (e) { if(e.which == 13) {
        $('#t_gatekeeper_login_btn').click();
    } });
 $('#txt_signpass').keypress(function (e) { if(e.which == 13) {
        $('#t_gatekeeper_login_btn').click();
    } });	




});