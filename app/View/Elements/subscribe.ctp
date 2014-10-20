<?php if($this->Session->check('Auth.User')){?>
<a id="subscribe" class="chain" href="#"></a> 
<?php }else {?>
<a id="subscribe" class="chain" href="#" onclick="Register();"></a> 
<?php }?>
<script>

<?php $suburl=$this->Html->url(array("controller" => "subscriptions","action" =>"sub_check",$user_id)); ?>
$.get("<?php echo $suburl ?>",function(data) {sub_status(data);});

function sub_status(a)
{
	if(a==1)
	{
		$('#subscribe').removeClass('chain').addClass('chained');
	}
	else
	{
		//alert("üyedegil");
	}
}

$('#subscribe').click(function () {
	if(<?php echo $this->Session->check('Auth.User')?> == 1){
		if ($(this).hasClass('chain')) {
			<?php $suburl2=$this->Html->url(array("controller" => "subscriptions","action" =>"add_subscription",$user_id)); ?>
			 $.get("<?php echo $suburl2?>",function(data) {}); 
			$(this).removeClass('chain').addClass('chained');
		}
		else {
			<?php $suburl3=$this->Html->url(array("controller" => "subscriptions","action" =>"add_subscription",$user_id)); ?>
			$.get("<?php echo $suburl3 ?>",function(data) {});
			$(this).removeClass('chained').addClass('chain');
		}
	}
});
</script>