
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
function add_playcount(game_id, user_id) {

    link = addplaycount;

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

function set_id_create(id) {
    set_link_id = id;
}

//This set selected Ad Code for selected ads area
function set_ad_code(adcode_id) {
    target_ad_area = set_link_id; //Set sorunu burada id deki değeri almak gerekiyor..
    $.post(set_channel_ads, {
        code_id: adcode_id,
        set_id: target_ad_area
    },
    function(data) {
        if (data) {
            location.reload();
        } else {
        }
    }, 'json');
}
//This removes all Ad Code for selected ads area
function remove_ad_area() {
    target_ad_area = set_link_id;

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


/**
 * Explore Games Clone Button Action
 * @param string game_name
 * @param boolean user_auth
 * @param integer game_id
 * @param integer clone_status
 * @author Emircan Ok
 */
function chaingame3(game_name, user_auth, game_id) {
    var btn = $('a.clone-' + game_id);
    btn
        .removeClass('btn-success')
        .addClass('btn-warning')
        .html('<i class="fa fa-cog spin"></i> Cloning');
    if (user_auth == 1) {
        $.get(chaingame + '/' + game_id, function(data) {
            if (data == 1) {
                btn
                    .button('reset')
                    .html('<i class="fa fa-cog"></i> Cloned')
                    .removeClass('btn-warning')
                    .addClass('btn-default');
            } else {
                btn
                    .button('reset');
            }
        });
    } else {
        $('#myModal')
            .modal('hide');
        $('#login')
            .modal('show');
    }
}

/**
 * Explore Games Hover Game Clone Button Action
 * @author Emircan Ok
 */
$('div.clone a').hover(
    function() {
        if ($(this).html() == '<i class="fa fa-cog"></i> Cloned') {
            $(this)
                .removeClass('btn-default')
                .addClass('btn-success')
                .html('<i class="fa fa-cog"></i> Re Clone');
        }
    },
    function() {
        if ($(this).html() == '<i class="fa fa-cog"></i> Re Clone') {
            $(this)
                .removeClass('btn-success')
                .addClass('btn-default')
                .html('<i class="fa fa-cog"></i> Cloned');
        }
    }
);

function favorite(game_name, user_auth, id) {
    if (user_auth == 1) {
        switch_favorite(id);
    } else {
        $('#login').modal('show');
    }
}

function unFavorite(game_name, user_auth, id) {
    if (user_auth == 1) {
        switch_favorite(id);
    } else {
        $('#login').modal('show');
    }
}

$('#fav_button').click(function() {
    if (user_auth != 1) {
        $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to favorite games.',
            type: 'error'
        });
    }
});

function switch_favorite(game_id) {
    var button = $('a.fav-' + game_id);
    button
        .removeClass('btn-default')
        .removeClass('btn-danger')
        .addClass('btn-warning')
        .html('<i class="fa fa-heart heart"></i> Progress...');
    $.get(favswitcher + '/' + game_id, function(data) {
        if (data == 0) {
            button
                .removeClass('btn-warning')
                .addClass('btn-danger')
                .html('<i class="fa fa-heart"></i> Favorite');
        } else {
            button
                .removeClass('btn-warning')
                .addClass('btn-default')
                .html('<i class="fa fa-heart"></i> UnFavorite');

        }
    });
}

/*-----------------------------------------------------------------------------------*/
/* Open popup on post share links
 /*-----------------------------------------------------------------------------------*/
function shl_social_share(data) {
    window.open( data, "Share", "height=500,width=760,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" );
}
$('body').on('click','.shl-share', function(e){
    e.preventDefault();
    var data = $(this).attr('data-url');
    shl_social_share(data);
});