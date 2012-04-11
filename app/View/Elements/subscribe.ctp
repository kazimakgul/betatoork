<a id="subscribe" class="subscribe" href="javascript:void();"></a>
<script>

$('#subscribe').click(function () {

                if ($(this).hasClass('subscribe')) {

                    $(this).removeClass('subscribe').addClass('unsubscribe');

                }

                else {

                    $(this).removeClass('unsubscribe').addClass('subscribe');

                }

            });


</script>