$(document).ready(function() {
    $('div.thumbnail a').click(function() {
        $(this)
                .closest('div.thumbnail')
                .find('div.darkloader, div.loader')
                .show();
    });
});