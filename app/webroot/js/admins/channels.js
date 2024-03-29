$(document).ready(function() {

    /**
     * Validation
     */
    $('form#channels_edit').validate({
        rules: {
            screenname: {
                required: true,
                minlength: 4,
                maxlength: 20
            },
            username: {
                required: true,
                minlength: 6,
                maxlength: 20
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
                minlength: 6,
                maxlength: 20
            },
            passwordagain: {
                equalTo: "#password"
            },
            priority: {
                required: true,
                number: true
            },
        }
    });

    /**
     * Submit
     */
    $('button#channels_edit').click(function(e) {
        e.preventDefault();
        if ($('form#channels_edit').valid()) {
            console.log('Valid');
            var form = {
                id: $('#id').val(),
                screenname: $('#screenname').val(),
                description: $('#description').val(),
                bg_color: $('#bg_color').val(),
                analitics: $('#analitics').val(),
                username: $('#username').val(),
                email: $('#email').val(),
                birth_date: $('#birth_date').val(),
                gender: $('#gender').val(),
                country: $('#country').val(),
                groups: $('#group').val(),
                role: $('#role').val(),
                fb_link: $('#fb_link').val(),
                twitter_link: $('#twitter_link').val(),
                gplus_link: $('#gplus_link').val(),
                website: $('#website').val(),
                password: $('#password').val(),
                password_again: $('#password_again').val(),
                active: $('#active').prop('checked') ? '1' : '0',
                verify: $('#verify').prop('checked') ? '1' : '0',
                priority: $('#priority').val()
            };
            console.log(form);
            $.post(channels_edit_post, form, function(data) {
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
                        })
                        break;
                }
            }, 'json');
        } else {
            console.log('Not Valid');
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

    
    /**
     * Delete Method
     *
     * @param null
     * @return json
     */
    $('a.channels_delete').click(function(a) {
        a.preventDefault;
        var url = $(this).attr('value');
        $('button#channels_delete_confirm').click(function(b) {
            b.preventDefault;
            $.post(url, null, function(data) {
                $('div#confirm-modal').modal('hide');
                switch (data.result) {
                    case true:
                        Messenger().post({
                            type: 'success',
                            message: data.message
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        break;
                    case false:
                        Messenger().post({
                            type: 'error',
                            message: data.message
                        });
                        break;
                }
            }, 'json');
        });
    });

});