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
            active: {
                required: true
            },
            user_id: {
                required: true
            },
            priority: {
                required: true
            },
            category_id: {
                required: true
            }
        }
    });
    
    /**
     * Submit
     */
    $('button.games_edit').click(function(e) {
        e.preventDefault();
        var data = {
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
                data.active = '1';
                break;
            case 'button_2':
                data.active = '0';
                break;
        }
        console.log(data);
        $.post(games_edit_post, data, function(result) {
            console.log(result);
        });
    });
    
});