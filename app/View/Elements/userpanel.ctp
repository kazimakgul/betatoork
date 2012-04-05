<?php if($this->Session->check('Auth.User')){?>

<?php  echo $this->element('logged_user_panel'); ?>

<?php } else {?>

<?php  echo $this->element('unlogged_user_panel'); ?>

<?php }?>