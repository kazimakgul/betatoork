<div class="span11">
    <div class="content">
        <div class="content-body" style="padding-top:15px;">
            <?php echo $this->element('NewPanel/admin/adminNavbar'); ?>
            <div class="search-content"></div>
            <?php echo $this->element('NewPanel/admin/admingame_edit'); ?>
        </div>
    </div>
</div>
<script>
    <?php if (isset($id) && !empty($id)) { ?>
        var $id = <?php echo $id; ?>;
    <?php } else { ?>
        var $id = 0;
    <?php } ?>
</script>