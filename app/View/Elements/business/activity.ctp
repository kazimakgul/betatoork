<?php
$x = 0;
foreach ($data as $value) {
    $class = 'moment';
    if ($x === 0) {
        $class.= ' first';
    }
    if ($x === count($data) - 1) {
        $class.= ' last';
    }
    ?>
    <div class="<?php echo $class ?>">
        <div class="row event clearfix">
            <div class="col-sm-1">
                <div class="icon">
                    <i class="fa fa-comment"></i>
                </div>
            </div>
            <div class="col-sm-11 message">
                <img src="http://wolfadmin.herokuapp.com/assets/avatars/16-d920ead0154f6f2b29f34c811d563245.jpg" class="avatar">
                    <div class="content">
                        <strong>John Smith</strong> commented on your thread <a href="#">What's up guys</a>.
                    </div>
            </div>
        </div>
    </div>
    <?php
    $x++;
}
?>