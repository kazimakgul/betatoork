$(document).ready(function() {
    $('div.m_thumbnail a').click(function() {
        $(this)
            .closest('div.thumbnail')
            .find('div.darkloader, div.loader')
            .show();
    });
});

/**
 * This function increases playcount of game
 * @param integer game_id
 * @param integer user_id
 */
function add_playcount(game_id, user_id) {
    link = addplaycount;
    $.post(link, {
        game_id: game_id,
        user_id: user_id
    }, function(data) {
        if (data.rtdata.error) {
            //alert(data.rtdata.error); // error.id ye gÃ¶re mesaj yazdÄ±rcak..
        } else {
            //alert(data.rtdata.message);
        }
    }, 'json');
}