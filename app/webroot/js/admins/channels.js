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
                min: 6
            },
            passwordagain: {
                equalTo: "#password"
            }
        }
    });
    
    /**
     * Channel Edit
     */
    $('button.edit').click(function(e) {
        e.preventDefault();
        var button_id = $(this).attr('id');
        switch (button_id) {
            case 'button_1':
                break;
            case 'button_2':
                break;
        }
    });
    
});