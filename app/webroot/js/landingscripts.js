$(function(){
	
	$('#t_gatekeeper_login_btn').click(function () {
		
		tlogin2();
	});
	
	function tlogin2(){
        $.post(remotecheck, { un: $('#txt_signusername').val(), ps: $('#txt_signpass').val(), attr: 'txt_logusername' }, function (data) {
			if(data.rtdata.msgid=='0'){
				
				$.pnotify({
			   title:'Invalid Username or Password',
               text: data.rtdata.msg,
               type: 'error'
               });
				
			}
			else if(data.rtdata.msgid=='1'){
				
				window.location = data.rtdata.msg;
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
	
	
	
	

});