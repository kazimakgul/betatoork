// Srinivas Tamada http://9lessons.info
// wall.js

$(document).ready(function() 
{
	$('.showdesc').data('enter','0');
	$('.showdesc').mouseenter(function(){
		if($('.showdesc').data('enter') == '0')
		{
			$('.channelfeeddescback').animate({ top: '-=' + ($('.channelfeeddesc').height() + 5) +'px' },function(){$('.showdesc').css('backgroundPosition', '0 16px');});
			$('.showdesc').data('enter','1');
		}
		else
		{
			$('.channelfeeddescback').animate({ top: '+=' + ($('.channelfeeddesc').height() + 5) + 'px' },function(){$('.showdesc').css('backgroundPosition', '0 0');});	
			$('.showdesc').data('enter','0');
		}
	});	

	var webcamtotal=2;
	$('#wallstatus').data('form','default');
	$("a.timeago").livequery(function () { $(this).timeago(); });
	$("div.stcommenttime").livequery(function () { $(this).timeago(); });
	// URL Tool Tips	    
	$(".stdelete").livequery(function () { $(this).tipsy({gravity: 's'}); });
	$(".stcommentdelete").livequery(function () { $(this).tipsy({gravity: 's'}); });
	$("#camera").livequery(function () { $(this).tipsy({gravity: 'n'}); });
	$("#webcam_button").livequery(function () { $(this).tipsy({gravity: 'n'}); });
	$("#addgame_button").livequery(function () { $(this).tipsy({gravity: 'n'}); });
	$("#addgame_btn").livequery(function () { $(this).tipsy({gravity: 'n'}); });
	$("#update").focus();
	$('a[rel*=facebox]').livequery(
		function () { 
			$(this).facebox({
				loadingImage : 'https://lh4.googleusercontent.com/-0T3KAcZex9M/UBj88s_1P4I/AAAAAAAAGXU/PAjxaw9lGOs/s32/loading.gif',
				closeImage   : 'https://lh5.googleusercontent.com/-nO7rZLm1MMw/UBj88iQyB5I/AAAAAAAAGXY/klP350hHDX0/s8/closelabel.png'
			}); 
		}
	);
 
	// Min 2 Max 6 Recommended 
	// Update Status
	$(".update_button").click(function() 
	{
		//Wall postun yazildigi textbox'in i軻rigi.	
		var updateval = $("#update").val();

		//Uploaded file段n id degerini barindirir.  
		var uploadvalues=$("#uploadvalues").val();

		//Class段 preview olan bir item段n olup olmadigini kontrol edecek.
		var X=$('.preview').attr('id');
		//Class段 webcam_preview olan bir item段n olup olmadigini kontrol edecek.
		var Y=$('.webcam_preview').attr('id');
		
		if(X)//Class'i 'preview' olan bir item var mi?
		{
			var Z= X+','+uploadvalues;
		} 
		else if(Y) //Class'i 'webcam_preview' olan bir item var mi?
		{
			var Z= uploadvalues;
		}
		else
		{
			var Z=0;//Post Media Barindirmiyor?
		}
		
		var dataString = 'update='+ updateval+'&uploads='+Z;
		var form = 	$('#wallstatus').data('form');
		if(form == 'addgameform')
		{
			var postdata = $('#gameaddform').serialize()+'&status='+ updateval;
			$.ajax({
				type: "POST",
				url: '/betatoork/wallentries/gamefeed_ajax',
				data: postdata,
				cache: false,
				success: function(html)
				{
					$('#addgame_container').slideUp('fast',function(){
						$('#gamename').val('');
						$('#gamelink').val('');
						$('#gameembedcode').val('');
						$('#gamedesc').val('');
						$('#gameimg').val('');
					});
					$("#webcam_container").slideUp('fast');
					$("#flash").fadeOut('slow');
					$("#content").prepend(html);
					$("#update").val('');	
					$("#update").focus();
					$('#preview').html('');
					$('#webcam_preview').html('');
					$('#uploadvalues').val('');
					$('#photoimg').val('');
					console.log(postdata);
				}
			});			
			
		}
		if(form != 'addgameform')
		{
			if($.trim(updateval).length==0)
			{
				alert("Please Enter Some Text");
			}
			else
			{
				$("#flash").show();
				$("#flash").fadeIn(400).html('Loading Update...');
				
				$.ajax({
					type: "POST",
					url: wallvar,
					data: dataString,
					cache: false,
					success: function(html)
					{
						$('#addgame_container').slideUp('fast');
						$("#webcam_container").slideUp('fast');
						$("#flash").fadeOut('slow');
						$("#content").prepend(html);
						$("#update").val('');	
						$("#update").focus();
						$('#preview').html('');
						$('#webcam_preview').html('');
						$('#uploadvalues').val('');
						$('#photoimg').val('');
					}
				});
				$("#preview").html();
				$('#imageupload').slideUp('fast');
			}
		}
		return false;
	});
	
	
	
	// Update Data is New Update Button Function
	$(".update_data").click(function() 
	{
		//Wall postun yazildigi textbox'in i軻rigi.	
		var updateval = $("#update").val();

		//Uploaded file段n id degerini barindirir.Bu elligi simdilik bozdum.D�zeltilecek.  
		var uploadvalues=0;

		//Class段 preview olan bir item段n olup olmadigini kontrol edecek.
		var X=$('.preview').attr('id');
		//Class段 webcam_preview olan bir item段n olup olmadigini kontrol edecek.
		var Y=$('.webcam_preview').attr('id');
		
		if(X)//Class'i 'preview' olan bir item var mi?
		{
			var Z= X+','+uploadvalues;
		} 
		else if(Y) //Class'i 'webcam_preview' olan bir item var mi?
		{
			var Z= uploadvalues;
		}
		else
		{
			var Z=0;//Post Media Barindirmiyor?
		}
		
		var dataString = 'update='+ updateval+'&uploads='+Z;
		var form = 	$('#wallstatus').data('form');
		if(form == 'addgameform')
		{
			var postdata = $('#gameaddform').serialize()+'&status='+ updateval;
			$.ajax({
				type: "POST",
				url: '/betatoork/wallentries/gamefeed_ajax',
				data: postdata,
				cache: false,
				success: function(html)
				{
					$('#addgame_container').slideUp('fast',function(){
						$('#gamename').val('');
						$('#gamelink').val('');
						$('#gameembedcode').val('');
						$('#gamedesc').val('');
						$('#gameimg').val('');
					});
					$("#webcam_container").slideUp('fast');
					$("#flash").fadeOut('slow');
					$("#content").prepend(html);
					$("#update").val('');	
					$("#update").focus();
					$('#preview').html('');
					$('#webcam_preview').html('');
					$('#uploadvalues').val('');
					$('#photoimg').val('');
					console.log(postdata);
				}
			});			
			
		}
		if(form != 'addgameform')
		{
			if($.trim(updateval).length==0)
			{
				alert("Please Enter Some Text");
			}
			else
			{
				$("#flash").show();
				$("#flash").fadeIn(400).html('Loading Update...');
				
				$.ajax({
					type: "POST",
					url: wallvar,
					data: dataString,
					cache: false,
					success: function(html)
					{   
						$('#addgame_container').slideUp('fast');
						$("#webcam_container").slideUp('fast');
						$("#flash").fadeOut(html);
						$("#content").prepend(html);
						$("#my_more_content").prepend(html.replace("stbody", "stbody2").replace("commentopen", "commentopen2").replace("commentbox", "commentbox2").replace("ctextarea", "ctextarea2").replace("comment_button", "comment_button2").replace("commentload", "commentload2"));
						$("#update").val('');	
						$("#update").focus();
						$('#preview').html('');
						$('#webcam_preview').html('');
						$('#uploadvalues').val('');
						$('#photoimg').val('');
					}
				});
				$("#preview").html();
				$('#imageupload').slideUp('fast');
			}
		}
		return false;
	});
	
//Commment Submit

$('.comment_button').live("click",function() 
{

var ID = $(this).attr("id");

var comment= $("#ctextarea"+ID).val();
var dataString = 'comment='+ comment + '&msg_id=' + ID;

if($.trim(comment).length==0)
{
alert("Please Enter Comment Text");
}
else
{
$.ajax({
type: "POST",
url: commentvar,
data: dataString,
cache: false,
success: function(html){
$("#commentload"+ID).append(html);
$("#commentload2"+ID).append(html.replace('stcommentdelete','stcommentdelete2').replace('stcommentbody','stcommentbody2'));
$("#ctextarea"+ID).val('');
$("#ctextarea"+ID).focus();
 }
 });
}
return false;
});

//Commment Submit 2

$('.comment_button2').live("click",function() 
{
var ID = $(this).attr("id");
var comment= $("#ctextarea2"+ID).val();
var dataString = 'comment='+ comment + '&msg_id=' + ID;

//alert(dataString);

if($.trim(comment).length==0)
{
alert("Please Enter Comment Text");
}
else
{
$.ajax({
type: "POST",
url: commentvar,
data: dataString,
cache: false,
success: function(html){
$("#commentload"+ID).append(html);
$("#commentload2"+ID).append(html.replace('stcommentdelete','stcommentdelete2').replace('stcommentbody','stcommentbody2'));
$("#ctextarea2"+ID).val('');
$("#ctextarea2"+ID).focus();
 }
 });
}
return false;
});

// commentopen 
$('.commentopen').live("click",function() 
{
var ID = $(this).attr("id");
$("#commentbox"+ID).slideToggle('fast');
$("#ctextarea"+ID).focus();
return false;
});	

// commentopen2 
$('.commentopen2').live("click",function() 
{
var ID = $(this).attr("id");
$("#commentbox2"+ID).slideToggle('fast');
$("#ctextarea2"+ID).focus();
return false;
});	

// Add button
$('.addbutton').live('click',function() 
{
var vid = $(this).attr("id");
var sid=vid.split("add"); 
var ID=sid[1];
var dataString = 'fid='+ ID ;

$.ajax({
type: "POST",
url: "friendadd_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){$("#friendstatus").html('<img src="icons/ajaxloader.gif"  />'); },
success: function(html)
{	
if(html)
{
$("#friendstatus").html('');
$("#add"+ID).hide();
$("#remove"+ID).show();
}
}
});
return false;
});

// Remove Friend
$('.removebutton').live('click',function() 
{

var vid = $(this).attr("id");
var sid=vid.split("remove"); 
var ID=sid[1];
var dataString = 'fid='+ ID ;

$.ajax({
type: "POST",
url: "friendremove_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){$("#friendstatus").html('<img src="icons/ajaxloader.gif"  />'); },
success: function(html)
{	
if(html)
{
$("#friendstatus").html('');
$("#remove"+ID).hide();
$("#add"+ID).show();
}
}
});
return false;
});


//WebCam 6 clicks
$(".camclick").live("click",function() 
{
var X=$("#webcam_count").val();
if(X)
var i=X;
else
var i=1;
var j=parseInt(i)+1; 
$("#webcam_count").val(j);

if(j>webcamtotal)
{
$(this).hide();
$("#webcam_count").val(1);
}

});

// delete comment
$('.stcommentdelete').live("click",function() 
{
var ID = $(this).attr("id");
var dataString = 'com_id='+ ID;

if(confirm("Sure you want to delete this update? There is NO undo!ccc"))
{

$.ajax({
type: "POST",
url: delcommentvar,
data: dataString,
cache: false,
beforeSend: function(){$("#stcommentbody"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
success: function(html){
// $("#stcommentbody"+ID).slideUp('slow');
$("#stcommentbody"+ID).fadeOut(300,function(){$("#stcommentbody"+ID).remove();});
$("#stcommentbody2"+ID).fadeOut(300,function(){$("#stcommentbody2"+ID).remove();});
 }
 });

}
return false;
});

// delete comment2
$('.stcommentdelete2').live("click",function() 
{
var ID = $(this).attr("id");
var dataString = 'com_id='+ ID;

if(confirm("Sure you want to delete this update? There is NO undo!ccc"))
{

$.ajax({
type: "POST",
url: delcommentvar,
data: dataString,
cache: false,
beforeSend: function(){$("#stcommentbody2"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
success: function(html){
// $("#stcommentbody"+ID).slideUp('slow');
$("#stcommentbody"+ID).fadeOut(300,function(){$("#stcommentbody"+ID).remove();});
$("#stcommentbody2"+ID).fadeOut(300,function(){$("#stcommentbody2"+ID).remove();});
 }
 });

}
return false;
});

//Add Game
$('#addgame_button').live("click",function() 
{
	$('#wallstatus').data('form','addgameform');
	$('#addgame_container').slideToggle('fast', function(){
		if($("#addgame_container").is(":hidden"))
		{
			$('#wallstatus').data('form','default');
		}
	});
	$('#webcam_container').slideUp('fast');
	$('#imageupload').slideUp('fast');
	return false;
});

// add image
$('#camera').live("click",function() 
{
	$('#wallstatus').data('form','imageform');
	$('#addgame_container').slideUp('fast');
	$('#webcam_container').slideUp('fast');
	$('#imageupload').slideToggle('fast');
	return false;
});

// add image2
$('#camera2').live("click",function() 
{
	$('#wallstatus').data('form','imageform');
	$('#addgame_container').slideUp('fast');
	$('#webcam_container').slideUp('fast');
	$('#imageupload').slideToggle('fast');
	return false;
});

//Web Camera image
$('#webcam_button').live("click",function() 
{
	$('#wallstatus').data('form','webcamform');
	$('#addgame_container').slideUp('fast');
	$(".camclick").show();
	$('#imageupload').slideUp('fast');
	$('#webcam_container').slideToggle('fast');
	return false;
});

// Uploading Image

$('#photoimg').live('change', function()			
{ 
var values=$("#uploadvalues").val();
$("#previeww").html('<img src="icons/loader.gif"/>');
$("#imageform").ajaxForm({target: '#preview'  }).submit();

var X=$('.preview').attr('id');
var Z= X+','+values;
if(Z!='undefined,')
$("#uploadvalues").val(Z);

});


// delete update
$('.stdelete').live("click",function() 
{
var ID = $(this).attr("id");
var dataString = 'msg_id='+ ID;
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

$.ajax({
type: "POST",
url: delmessagevar,
data: dataString,
cache: false,
beforeSend: function(){ $("#stbody"+ID).css({'backgroundColor':'#fb6c6c'},300);$("#stbody2"+ID).css({'backgroundColor':'#fb6c6c'},300);},
success: function(html){
 //$("#stbody"+ID).slideUp();
 $("#stbody"+ID).fadeOut(300,function(){$("#stbody"+ID).remove();});
 $("#stbody2"+ID).fadeOut(300,function(){$("#stbody"+ID).remove();});
 }
 });
}
return false;
});
// View all comments
$(".view_comments").live("click",function()  
{
var ID = $(this).attr("id");

$.ajax({
type: "POST",
url: seeallvar,
data: "msg_id="+ ID, 
cache: false,
success: function(html){
$("#commentload"+ID).html(html);
}
});
return false;
});

// View all comments
$(".view_comments2").live("click",function()  
{
var ID = $(this).attr("id");

$.ajax({
type: "POST",
url: seeallvar,
data: "msg_id="+ ID, 
cache: false,
success: function(html){
$("#commentload2"+ID).html(html);
}
});
return false;
});

// Load More

$('.more').live("click",function() 
{

var ID = $(this).attr("id");
if(ID)
{
$.ajax({
type: "POST",
url: morevar,
data: "lastid="+ ID, 
cache: false,
beforeSend: function(){ $("#more"+ID).html('<img src="http://appvidyo.com/images/ajax-preloader.gif" />'); },
success: function(html){
$("#content2").append(html);
$("#more"+ID).remove();
}
});
}
else
{
$("#more").html('The End');// no results
}

return false;
});

// Load More2 dedicated for my feeds

$('.my_more').live("click",function() 
{

var ID = $(this).attr("id");
if(ID)
{
$.ajax({
type: "POST",
url: my_feed_var,
data: "lastid="+ ID, 
cache: false,
beforeSend: function(){ $("#my_more"+ID).html('<img src="http://appvidyo.com/images/ajax-preloader.gif" />'); },
success: function(html){
$("#my_content").append(html);
$("#my_more"+ID).remove();
}
});
}
else
{
$("#my_more").html('The End');// no results
}

return false;
});

$("#searchinput").keyup(function() 
{
var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;

if(searchbox.length>0)
{

$.ajax({
type: "POST",
url: "search_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
$("#display").html(html).show();
}
});
}return false; 
});

$("#display").mouseup(function() 
{
return false
});

$(document).mouseup(function()
{
$('#display').hide();
$('#searchinput').val("");
});

// Web Cam-----------------------
var pos = 0, ctx = null, saveCB, image = [];
var canvas = document.createElement("canvas");
canvas.setAttribute('width', 320);
canvas.setAttribute('height', 240);
if (canvas.toDataURL) 
{
ctx = canvas.getContext("2d");
image = ctx.getImageData(0, 0, 320, 240);
saveCB = function(data) 
{
var col = data.split(";");
var img = image;
for(var i = 0; i < 320; i++) {
var tmp = parseInt(col[i]);
img.data[pos + 0] = (tmp >> 16) & 0xff;
img.data[pos + 1] = (tmp >> 8) & 0xff;
img.data[pos + 2] = tmp & 0xff;
img.data[pos + 3] = 0xff;
pos+= 4;
}
if (pos >= 4 * 320 * 240)
 {
ctx.putImageData(img, 0, 0);
$.post("webcam_image_ajax.php", {type: "data", image: canvas.toDataURL("image/png")},
function(data)
 {
 
 if($.trim(data) != "false")
{
var dataString = 'webcam='+ 1;
$.ajax({
type: "POST",
url: "webcam_imageload_ajax.php",
data: dataString,
cache: false,
success: function(html){
var values=$("#uploadvalues").val();
$("#webcam_preview").prepend(html);
var X=$('.webcam_preview').attr('id');
var Z= X+','+values;
if(Z!='undefined,')
$("#uploadvalues").val(Z);
 }
 });
 }
 else
{
  $("#webcam").html('<div id="camera_error"><b>Camera Not Found</b><br/>Please turn your camera on or make sure that it <br/>is not in use by another application</div>');
$("#webcam_status").html("<span style='color:#cc0000'>Camera not found please reload this page.</span>");
$("#webcam_takesnap").hide();
	return false;
}
 });
pos = 0;
 }
  else {
saveCB = function(data) {
image.push(data);
pos+= 4 * 320;
 if (pos >= 4 * 320 * 240)
 {
$.post("webcam_image_ajax.php", {type: "pixel", image: image.join('|')},
function(data)
 {
 
var dataString = 'webcam='+ 1;
$.ajax({
type: "POST",
url: "webcam_imageload_ajax.php",
data: dataString,
cache: false,
success: function(html){
var values=$("#uploadvalues").val();
$("#webcam_preview").prepend(html);
var X=$('.webcam_preview').attr('id');
var Z= X+','+values;
if(Z!='undefined,')
$("#uploadvalues").val(Z);
 }
 });
 
 });
 pos = 0;
 }
 };
 }
 };
 } 


$("#webcam").webcam({
width: 320,
height: 240,
mode: "callback",
 swffile: "js/jscam_canvas_only.swf",
onSave: saveCB,
onCapture: function () 
{
webcam.save();
 },
debug: function (type, string) {
 $("#webcam_status").html(type + ": " + string);
}

});
//-------------------
});
 /**
Taking snap
**/
function takeSnap(){
//console.log(webcam.getCameraList());
webcam.capture();
 }
