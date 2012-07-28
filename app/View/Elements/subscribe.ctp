<?php if($this->Session->check('Auth.User')){?>
<a id="subscribe" class="subscribe" href="javascript:void();"></a> 
<?php }else {?>
<a id="subscribeout" class="subscribe" onclick="$('#up_btn_register').click();"></a> 
 <?php }?>
<script>

<?php $suburl=$this->Html->url(array("controller" => "subscriptions","action" =>"sub_check",$user_id)); ?>
$.get("<?php echo $suburl ?>",function(data) {sub_status(data);});

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
<?php $suburl2=$this->Html->url(array("controller" => "subscriptions","action" =>"add_subscription",$user_id)); ?>
 $.get("<?php echo $suburl2?>",function(data) {alert(data);});

                    $(this).removeClass('subscribe').addClass('unsubscribe');

                }

                else {
<?php $suburl3=$this->Html->url(array("controller" => "subscriptions","action" =>"add_subscription",$user_id)); ?>
				 $.get("<?php echo $suburl3 ?>",function(data) {alert(data);});

                    $(this).removeClass('unsubscribe').addClass('subscribe');

                }

            });


</script>