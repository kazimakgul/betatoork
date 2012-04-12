<a id="subscribe" class="subscribe" href="javascript:void();"></a>
<script>

$('#subscribe').click(function () {

                if ($(this).hasClass('subscribe')) {

 $.get("http://127.0.0.1/betatoork/Subscriptions/add_subscription/2",function(data) {alert(data);});

                    $(this).removeClass('subscribe').addClass('unsubscribe');

                }

                else {
				
				 $.get("http://127.0.0.1/betatoork/Subscriptions/add_subscription/2",function(data) {alert(data);});

                    $(this).removeClass('unsubscribe').addClass('subscribe');

                }

            });


</script>