<?php 
if($activated==1)
{
?>

<script type="text/javascript">
$.pnotify({
            text: 'Your account has been activated.',
            type: 'success'
          });

</script>
Your account has been activated.
<?php
}else{
?>

<script type="text/javascript">
$.pnotify({
            text: 'Activation code is not valid!',
            type: 'error'
          });

</script>
Activation code is not valid!
<?php } ?>