 window.fbAsyncInit = function() {
  FB.init({
    appId      : '406720676044342',
    status     : true, // check login status
    cookie     : false, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  
  FB.Event.subscribe('auth.authResponseChange', function(response) {
        // Here we specify what we do with the response anytime this event occurs. 
        if (response.status === 'connected') {
            // The response object is returned with a status field that lets the app know the current
            // login status of the person. In this case, we're handling the situation where they 
            // have logged in to the app.
            //alert('logged in');
			getUserInfo(response.authResponse.accessToken);
        } else if (response.status === 'not_authorized') {
            // In this case, the person is logged into Facebook, but not into the app, so we call
            // FB.login() to prompt them to do so. 
            // In real-life usage, you wouldn't want to immediately prompt someone to login 
            // like this, for two reasons:
            // (1) JavaScript created popup windows are blocked by most browsers unless they 
            // result from direct interaction from people using the app (such as a mouse click)
            // (2) it is a bad experience to be continually prompted to login upon page load.
            //FB.login();
            //console.log('you are login but not authorized');
            //console.log(response);
            location.reload();
        } else {
            // In this case, the person is not logged into Facebook, so we call the login() 
            // function to prompt them to do so. Note that at this stage there is no indication
            // of whether they are logged into the app. If they aren't then they'll see the Login
            // dialog right after they log in to Facebook. 
            // The same caveats as above apply to the FB.login() call here.
            //FB.login();
            //console.log('you are logout');
            //console.log(response);
            location.reload();
        }
    });
  
  
  };//End of facebook area all functions will be inside
  
  
  function getUserInfo(access_token) {
	    FB.api('/me', function(response) {
		  $("#reg_screenname").val(response.name); 
		  $("#reg_email").val(response.email); 	
		  $("#facebook_id").val(response.id);
		  $("#access_token").val(access_token);
    });
		
		FB.api('/me/picture?type=normal', function(response) {

		  var str=response.data.url;
	  	  document.getElementById("faceavatar").src=str;
	  	  	    
    });
		
    }//end of get user info
  
  function facebooklogin() {
	  //do some loading act like preloader
	//alert('facebook login');  
	
	try {
		 FB.login(function(response) {
            //console.log('first response ')
            //console.log(response);            
            if (response.authResponse) {
                // connected
                //Appendloading gif kaldır
                //$(".appendloading_mask").remove();
                //$(".appendloading_lightbox").remove();
                //loadingBarLightbox();
                registerFbUser(response.authResponse.accessToken,response.authResponse.userID);
            } else {
				//User don't allow the app!!!
                //$("#id_facebookregisterloading").remove();
                //$("#loginloading").remove();
                //$("#signupfailfbloginloading").remove();
                //fbloginfailedlightbox("Either you have canceled or an error has occured on your Facebook login control. Please try again.");
            }
        }, {
            scope: 'email,user_birthday,user_education_history,user_location'
        });
   } catch (err) {
        //fbloginfailedlightbox("An error has occured. Please try again.");
        //$(".registration_form_validation_text").text('*An error has occured. Please try registering again.');
        //$("#id_facebookregisterloading").remove();
        //$("#loginloading").remove();
        //$("#signupfailfbloginloading").remove();
    }   
    return false;
	
  }//end of facebook login function
  
  
  function registerFbUser(accessToken,fb_id) {
   
	 $.post(facecheck, { at: accessToken,ui:fb_id}, function (data) {
			if(data.rtdata.status=='user exists'){
				//alert(data.rtdata.msg);
				window.location=data.rtdata.location;
				//$('#errormsg_Passwd').html(data.rtdata.msg);
				//$('#errormsg_Passwd').show();
				
			}
			else if(data.rtdata.status=='user no exists'){
				window.location=data.rtdata.location;
				//$('#grabloader').css("display", "block");
				//window.location = data.rtdata.msg;
			}
			
        }, 'json');
	
}//end of fb register

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }