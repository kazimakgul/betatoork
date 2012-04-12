<a id="subscribe" class="subscribe" href="javascript:void();"></a>
<script>


$.get("http://127.0.0.1/betatoork/subscriptions/sub_check/<?php echo $user_id; ?>",function(data) {sub_status(data);});

function sub_status(a)
{
if(a==1)
{
$('#subscribe').removeClass('subscribe').addClass('unsubscribe');
}
else
{
//alert("üyedegil");
}

}



$('#subscribe').click(function () {

                if ($(this).hasClass('subscribe')) {

 $.get("http://127.0.0.1/betatoork/Subscriptions/add_subscription/<?php echo $user_id; ?>",function(data) {alert(data);});

                    $(this).removeClass('subscribe').addClass('unsubscribe');

                }

                else {
				
				 $.get("http://127.0.0.1/betatoork/Subscriptions/add_subscription/<?php echo $user_id; ?>",function(data) {alert(data);});

                    $(this).removeClass('unsubscribe').addClass('subscribe');

                }

            });


</script>