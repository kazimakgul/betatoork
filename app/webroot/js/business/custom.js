
$("[data-toggle='tooltip']").tooltip();

$('.imagehover').hover(
        function() {
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function() {
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
);

//Code Block for Broken Images
function imgError(image, style) {
    image.onerror = "";

    if (style == "toorksize")
        image.src = toorksize;
    else if (style == "avatar")
        image.src = avatar;
    return true;

}

//Get which type of ads window clicked
$('.adsChangeBtn').click(function() {
    $('#adsChange').attr('data-selected', this.id);
});


//This function increases playcount of game
function add_playcount(game_id,user_id) {

        link=addplaycount;
        
        //------
        $.post(link, {
            game_id: game_id,
            user_id: user_id
        },
        function(data) {
            if (data.rtdata.error) {
                //alert(data.rtdata.error); // error.id ye göre mesaj yazdırcak..
            } else {
                //alert(data.rtdata.message);
            }
        }, 'json');
        //------ 

}


//This set selected Ad Code for selected ads area
function set_ad_code(adcode_id) {
    target_ad_area = set_link_id; 
			$.post(set_channel_ads,
			{
                code_id: adcode_id,
                set_id: target_ad_area
            },
            function(data) {
		            $('#adsChange').modal('hide');
                    location.reload();
            });
}

//This removes all Ad Code for selected ads area
function remove_ad_area() {
    target_ad_area = $('#adsChange').attr('data-selected');

    //------
    $.ajax({
        type: "POST",
        url: remove_ads_field,
        data: {target_ad_area: target_ad_area},
        dataType: "json",
        async: false,
        success: function(data) {

            //alert(data.rtdata.title);
            location.reload();

        },
        failure: function(errMsg) {
            alert(errMsg);
        }
    });
    //------  

}

//Controller functions for modals of avatar begins
$('#avatarframe').load(function() {
    $(this).contents().find("#close_panel").on('click', function(event) {
        $('#pictureChange').modal('toggle');
    });
});

$('#avatarframe').load(function() {
    $(this).contents().find("#set_photo").on('click', function(event) {
        
        //$('#channel_avatar').attr('src', 'http://www.imageyourself.net/images/website/loading.gif');
        var new_img = $('iframe[id=avatarframe]').contents().find('#new_image_link').val();
        $('#user_avatar').attr('src', new_img);
        $('#pictureChange').modal('toggle');

    });

//var name = $('iframe[id=avatarframe]').contents().find('#selected_image').val();
//alert(name);
});
//Controller functions for modals of avatar ends

//Controller functions for modals of cover begins
$('#coverframe').load(function() {
    $(this).contents().find("#close_panel").on('click', function(event) {
        $('#coverChange').modal('toggle');
    });
});

$('#coverframe').load(function() {
    $(this).contents().find("#set_photo").on('click', function(event) {
        
        //$('#user_cover').css('background-image', 'url(http://3.bp.blogspot.com/-13dC5LhMbMM/T6NpcCU7obI/AAAAAAAAAVE/kt0XhVIV_zU/s200/loading.gif)');
        var new_img = $('iframe[id=coverframe]').contents().find('#new_image_link').val();
        $('#user_cover').css('background-image', 'url(' + new_img + ')');
        $('#coverChange').modal('toggle');

    });

});
//Controller functions for modals of covers ends

//Controller functions for modals of background begins
$('#backgroundframe').load(function() {
    $(this).contents().find("#close_panel").on('click', function(event) {
        $('#backgroundChange').modal('toggle');
    });
});

$('#backgroundframe').load(function() {
    $(this).contents().find("#set_photo").on('click', function(event) {
        
        //$('#user_background').css('background-image','http://netdna.webdesignerdepot.com/uploads/2013/04/Hursh1.gif');  
        var new_img = $('iframe[id=backgroundframe]').contents().find('#new_image_link').val();
        $('#user_background').css('background-image', 'url(' + new_img + ')');
        $('#backgroundChange').modal('toggle');
        
    });

});
//Controller functions for modals of background ends

$('div#profilepicarea').hover(
        function() {
            $('a#changeprofilepic').fadeIn(500);
        },
        function()
        {
            $('a#changeprofilepic').fadeOut(500);
        }
);