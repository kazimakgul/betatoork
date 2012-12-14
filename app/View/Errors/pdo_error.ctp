<!-- <div class="err404" align="center">404</div > -->
<div class="errormsg" align="center">
	<strong>There is an unrecognize error. Please try again later</strong>
</div>
<?php
if (Configure::read('debug') > 0 ):
	echo $this->element('exception_stack_trace');
endif;
?>

