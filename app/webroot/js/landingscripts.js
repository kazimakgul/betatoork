$(function(){
	
	//==========Login Register Functions=============
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
 
 
 
 //Register button for gatekeeper
 
 //New Validation System For Registration
 jQuery.validator.addMethod(
        "uniqueUserName", 
        function(value, element) {
            $.post(authcheck, {attr: 'check_username', dt: value }, function (data) {
		
			response = ( data.rtdata == 1 ) ? true : false;
			
		}, 'json');
            return response;
        },
        "Username is already taken"
    );
 
 jQuery.validator.addMethod(
        "uniqueEmail", 
        function(value, element) {
            $.post(authcheck, {attr: 'check_email', dt: value }, function (data) {
		
			response = ( data.rtdata == 1 ) ? true : false;
			
		}, 'json');
            return response;
        },
        "Email is already registered"
    );
 
 
 $("#toorkRegister").validate({
        rules: {
			 username: {
                required: true,
				minlength: 6,
				uniqueUserName:true
            },
            email: {
                required: true,
				email: true,
				uniqueEmail:true
            },
            password: {
                required: true,
				minlength: 6
            }
        },
        messages: {
			username: {
                required: "Please enter username.",
				minlength:"At least 6 characters."
            },
            email: {
                required: "Please enter email.",
				email: "Your email address must be in the format of name@domain.com"
            },
            password: {
                required: "Please enter password.",
				minlength: "At least 6 characters."
            }
        }
    });

// $('.validateRegister').click(function() {
// alert($("#toorkRegister").valid());
//});
 
 
	$('#t_landing_registerbtn').click(function () {
	    
		//checkusername();
		if($("#toorkRegister").valid())
		{
			checkUser2();
			}else{
				
				$.pnotify({
               text: 'There are some missing parts on registration form.',
               type: 'error'
               });
				
				
				}
		
    });
 
 function checkUser2(){
		$.post(remotecheck2, {attr: 'fast_register', un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val() }, function (data) {
			if (data.rtdata == 'true') {
				
				$('#grabloader').show();
				
				setInterval(function(){autoLogin($('#reg_username').val(),$('#reg_password').val());},2000);
				
				
			}
			else if(data.rtdata == 'false'){
        
				
				$.pnotify({
               text: 'Recaptcha Code is incorrect. Please try again.',
               type: 'error'
               });
				
				
			}
			else
			{
				//alert(data.rtdata)
				$.pnotify({
               text: data.rtdata,
               type: 'error'
               });
				
			}
		}, 'json');	
	}
 
 
 function autoLogin(username,password){
        $.post(remotecheck, { un: username, ps: password, attr: 'txt_logusername' }, function (data) {
			if(data.rtdata.msgid=='0'){
				
				$.pnotify({
			   title:'Invalid Username or Password',
               text: data.rtdata.msg,
               type: 'error'
               });
				
			}
			else if(data.rtdata.msgid=='1'){
				
				window.location = data.rtdata.msg+'/welcome';
			}
			else{
				
				$.pnotify({
			   title:'Invalid Username or Password',
               text: data.rtdata.msg,
               type: 'error'
               });
							
			}
        }, 'json');	
	}
 
 
//==========/Login Register Functions=============



});