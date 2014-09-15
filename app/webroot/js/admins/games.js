$(document).ready(function() {

    /**
     * Validation
     */
    $('form#games_edit').validate({
        rules: {
            name: {
                required: true
            },
            description: {
                required: true
            },
            user_id: {
                required: true,
                number: true
            },
            priority: {
                required: true,
                number: true
            },
            category_id: {
                required: true
            },
            width: {
                number: true
            },
            height: {
                number: true
            },
            link: {
                url: true
            }
        }
    });

    /**
     * Submit
     */
    $('button.games_edit').click(function(e) {
        e.preventDefault();
        if ($('form#games_edit').valid()) {
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
            switch ($(this).attr('id')) {
                case 'button_1':
                    form.active = '1';
                    break;
                case 'button_2':
                    form.active = '0';
                    break;
            }
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
     * Delete
     */
    $('a.games_delete').click(function(a) {
        a.preventDefault;
        var url = $(this).attr('value');
        $('button#games_delete_confirm').click(function(b) {
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