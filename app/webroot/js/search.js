
    $('.icofont-search').click(function () {
         alert('boodarek');
        window.location = "<?php echo $searchurl; ?>/" + $('.search-query').val()+"/"+"search?&q="+$('.search-query').val();

    });

    $('.search-query').keypress(function (e) {
        if (e.which == 13) {
            window.location = "<?php echo $searchurl; ?>/"+ $('.search-query').val()+"/"+"search?&q="+$('.search-query').val();
        }
    });


