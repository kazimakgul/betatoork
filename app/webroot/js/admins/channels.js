$(document).ready(function() {

    /**
     * Validation
     */
    $('form#channels_edit').validate({
        rules: {
            screenname: {
                required: true
            },
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            fb_link: {
                url: true
            },
            twitter_link: {
                url: true
            },
            gplus_link: {
                url: true
            },
            website: {
                url: true
            },
            password: {
                minlength: 6
            },
            passwordagain: {
                equalTo: "#password"
            }
        }
    });

    /**
     * Submit
     */
    $('button#channels_edit').click(function(e) {
        e.preventDefault();
        if ($('form#channels_edit').valid()) {
            var form = {
                id: $('#id').val(),
                name: $('#name').val(),
                description: $('#description').val(),
                link: $('#link').val(),
                width: $('#width').val(),
                height: $('#height').val(),
                category_id: $('#category_id').val(),
                tags: $('#tags').val(),
                priority: $('#priority').val(),
                user_id: $('#user_id').val(),
                image_name: $('#game_image').attr('data-src'),
                game_file: $('#game_file').val(),
                android: $('#gplay_link').val(),
                ios: $('#appstore_link').val(),
                fullscreen: $('#fullscreen').prop('checked') ? '1' : '0',
                mobileready: $('#mobileready').prop('checked') ? '1' : '0',
                installable: $('#installable').prop('checked') ? '1' : '0'
            };
            $.post(games_edit_post, form, function(data) {
                switch (data.result) {
                    case true:
                        Messenger().post({
                            type: 'success',
                            message: data.message
                        });
                        break;
                    case false:
                        Messenger().post({
                            type: 'error',
                            message: data.message
                        });
                        break;
                }
            }, 'json');
        }
    });

    /**
     * Map Domain
     */
    $('button#add_mapping').click(function(e) {
        e.preventDefault();
        link = add_mapping;
        domain = $('input#mapping_domain').val();
        if (domain == '') {
            Messenger().post({
                message: 'You have to enter a domain!',
                type: 'error',
                showCloseButton: true
            });
        } else {
            alert(link);
            $.post(link, {
                domain: domain
            }, function(data) {
                if (data.rtdata.error) {
                    alert(data.rtdata.error);
                } else {
                    if (data.rtdata.result == 1) {
                        Messenger().post(data.rtdata.title);
                        $('#remove_domain').show();
                        $('#map_domain').hide();
                        $('.domain_label').html(domain);
                        $('.domain_label').attr('href', 'http://' + domain);
                    } else {
                        var msg = Messenger().post({
                            message: data.rtdata.title,
                            type: 'error',
                            showCloseButton: true
                        });
                    }

                }
            }, 'json');
        }
    });

});