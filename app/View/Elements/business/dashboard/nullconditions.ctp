<?php $nulllink = $this->Html->url(array("controller" => "businesses", "action" => $link)); ?>
<div class="row_user" style="background: #FAFAFC;">
    <div class="no_data">
        <h3>No data!</h3>
        <p>Click <a href="<?php echo $nulllink; ?>" class="aRq"><?php echo $text; ?></a> button, please.</p>
    </div>
</div>
