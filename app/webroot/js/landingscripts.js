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
				
				$('#grabloader').css("display", "block");
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
            
			 $.ajax({
        type: "POST",
        url: authcheck,
        data: {attr: 'check_username', dt: value },
        dataType: "json",
		async: false,
        success: function(data){
			
			if(data.rtdata==1)
			{
				 
				 $( "#reg_username" ).data( "valid", true );
				
			}else{
				$( "#reg_username" ).data( "valid", false );
			
			}
			
			},
        failure: function(errMsg) {
            //alert(errMsg);
        }
  });			
			
            return $( "#reg_username" ).data("valid");
        },
        "Username is already taken"
    );
 
 jQuery.validator.addMethod(
        "uniqueEmail", 
        function(value, element) {
          
			$.ajax({
        type: "POST",
        url: authcheck,
        data: {attr: 'check_email', dt: value },
        dataType: "json",
		async: false,
        success: function(data){
			
			if(data.rtdata==1)
			{
				 
				 $( "#reg_email" ).data( "valid", true );
				
			}else{
				$( "#reg_email" ).data( "valid", false );
			
			}
			
			},
        failure: function(errMsg) {
            //alert(errMsg);
        }
  });
						
            return $( "#reg_email" ).data( "valid");
        },
        "Email is already registered"
    );
 
 jQuery.validator.addMethod("nospace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");
 
 
 $("#toorkRegister").validate({
        rules: {
			 username: {
                required: true,
				minlength: 6,
				uniqueUserName:true,
				nospace:true
            },
            email: {
                required: true,
				email: true,
				uniqueEmail:true
            },
            password: {
                required: true,
				minlength: 6,
				nospace:true
            }
        },
        messages: {
			username: {
                required: "Please enter username.",
				minlength:"At least 6 characters.",
				nospace:"You cannot use space in your username."
            },
            email: {
                required: "Please enter email.",
				email: "Your email address must be in the format of name@domain.com"
            },
            password: {
                required: "Please enter password.",
				minlength: "At least 6 characters.",
				nospace:"You cannot use space in your password."
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
				//Acts for no validation.
				}
		
    });
 
 function checkUser2(){
		$.post(remotecheck2, {attr: 'fast_register', un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val() }, function (data) {
			if (data.rtdata == 'true') {
				
				$('#grabloader').show();
				
				setInterval(function(){autoLogin($('#reg_username').val(),$('#reg_password').val());},2000);
				
				
			}
			else if(data.rtdata == 'false'){
        
				//Recaptcha Code is incorrect. Please try again.
	
			}
			else
			{
				//alert(data.rtdata)
				
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



//*********Forget Password Function********
$('#resetcredential').keypress(function (e) { if(e.which == 13) {
        $('#forget_pass').click();
    } });

$('#forget_pass').click(function () {
	    
		$.post(remotecheck, { dt: $('#resetcredential').val(), attr: 't_regbox_logemail' }, function (data) {
            if (data.rtdata != null) {
				
				$.pnotify({
            text: data.rtdata,
            type: 'error'
          });
				
            }
            else { 
				$.pnotify({
            title: 'Reset mail has been sent.',
            text: 'Please check your mail box.',
            type: 'success'
          });
			}
        }, 'json');	
		
    });

 
//*********/Forget Password Function********

//*********Social Function********
$('#facebookreg').click(function () {
		
		alert('Login With Facebook(landingscripts)');
		facebooklogin();
	});
//*********//Social Function********


});