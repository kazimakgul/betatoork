<div class="row users-grid">
    <?php
    if (!empty($followers)) {
        foreach ($followers as $value) {
            echo $this->element('business/dashboard/channelbox', array('user' => $value['User'], 'userstat' => $value['Userstat'], 'status' => $value['followstatus']));
        }
    } else {
        echo $this->element('business/dashboard/nullconditions', array('link' => 'explorechannels', 'text' => 'Explore Channels'));
    }
    ?>
    <div class="text-center">
        <?php echo $this->element('business/components/pagination') ?>
    </div>
</div>