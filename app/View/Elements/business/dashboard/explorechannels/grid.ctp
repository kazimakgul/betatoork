<div class="row users-grid">
    <?php
    foreach ($following as $value) {
        echo $this->element('business/dashboard/channelbox', array('user' => $value['User'], 'userstat' => $value['Userstat'], 'status' => $value['followstatus']));
    }
    ?>
    <div class="text-center">
        <?php echo $this->element('business/components/pagination') ?>
    </div>
</div>