<?php
$params = $this->Paginator->params();
$count = $params['count'];
?>
<div class="container">

        <?php
    $controls = NULL;

    if ($this->Session->read('Auth.User.id') == $user['User']['id']) {
        $controls = $user['User']['id'];
    }
    echo $this->element('business/ad', array('controls' => $controls, 'user_id' => $user['User']['id'], 'location' =>1 ));
    ?>
    <div class="col-md-12">
        <div class="btn-group" style="margin-bottom:10px;">
            <?php
            $limit = 14;
            echo $this->element('business/category', array('limit' => $limit, 'userid' => $userid));
            ?>
        </div>
    </div>
    <?php echo $this->element('business/login', array('user_id' => $controls)); ?>
    <?php echo $this->element('business/channelbanner', array('controls' => $controls)); ?>
    <!--/footer-->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php if ($count > 0) { ?>
                            <ul class="nav pull-right" style='margin-top:-8px;'>
                                <li class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Filter/Sort
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><?php echo $this->Paginator->sort('id', 'New Games', array('direction' => 'desc')); ?></li>
                                        <li><?php echo $this->Paginator->sort('recommend', 'Recommended', array('direction' => 'desc')); ?></li>
                                        <li><?php echo $this->Paginator->sort('starsize', 'Top Rate', array('direction' => 'desc')); ?></li>
                                        <li><?php echo $this->Paginator->sort('playcount', 'Most Play', array('direction' => 'desc')); ?></li>
                                        <li><?php echo $this->Paginator->sort('name', 'Name', array('direction' => 'asc')); ?></li>
                                        <li><?php echo $this->Paginator->sort('created', 'Date'); ?></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } ?>
                        <h3 class="panel-title">Search Game : <?= $searchVal; ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        if ($count > 0) {
                            $div = "<div class='col-xs-3' style='padding:0px 15px 0px 5px;'>";
                            echo $this->element('business/games/box', array('div' => $div, 'gamedata' => $query));
                            echo $this->element('business/components/pagination');
                        } else {
                            echo 'Games Not Found';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/footer-->
    <?php echo $this->element('business/ad', array('controls' => $controls, 'user_id' => $user['User']['id'], 'location' =>3 )); ?>
</div>
<!-- /.container -->
<?php echo $this->element('business/components/popup', array('user_id' => $user['User']['id'])); ?>

<?php echo $this->element('business/footer'); ?>