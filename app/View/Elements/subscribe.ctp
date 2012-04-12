<a id="subscribe" class="subscribe" href="javascript:void();"></a>
<script>

$('#subscribe').click(function () {

                if ($(this).hasClass('subscribe')) {

 $.post("http://127.0.0.1/betatoork/Subscriptions/add_subscription/2",function(data) {alert(data);});

                    $(this).removeClass('subscribe').addClass('unsubscribe');

                }

                else {
				
				 $.post("http://127.0.0.1/betatoork/Subscriptions/add_subscription/2",function(data) {alert(data);});

                    $(this).removeClass('unsubscribe').addClass('subscribe');

                }

            });


</script>