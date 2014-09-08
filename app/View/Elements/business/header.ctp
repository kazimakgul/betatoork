<?php
$logout = $this->Html->url(array("controller" => "businesses", "action" => "logout"));
if (isset($pure_domain)) {
    $dashboard = $this->Html->url('http://' . $pure_domain . '/dashboard');
    $mygames = $this->Html->url('http://' . $pure_domain . '/mygames');
    $settings = $this->Html->url('http://' . $pure_domain . '/settings/channel');
} else {
    $dashboard = $this->Html->url(array("controller" => "businesses", "action" => "dashboard"));
    $mygames = $this->Html->url(array("controller" => "businesses", "action" => "mygames"));
    $settings = $this->Html->url(array("controller" => "businesses", "action" => "channel_settings"));
}
$search = $this->Html->url(array("controller" => "businesses", "action" => "search2", $user['User']['id']));
$visitor_mode = '?mode=visitor';
if (Configure::read('Domain.type') == 'subdomain' && isset($pure_domain)) {
    $index = $this->Html->url('/');
} else {
    $index = $this->Html->url(array("controller" => "businesses", "action" => "mysite", $user['User']['id']));
}
if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
    $mysite = $this->Html->url('http://' . $this->Session->read('Auth.User.seo_username') . '.' . $pure_domain);
} else {
    $mysite = $this->Html->url(array("controller" => "businesses", "action" => "mysite", $this->Session->read('Auth.User.id')));
}
?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" rel="home" href="<?php echo $index ?>"><?php if($user['User']['screenname']  ==NULL) {echo $user['User']['username'] ;} else{echo $user['User']['screenname'] ; } ?>
            <?php if ($user['User']['verify'] == 1) { ?>
                <span class="help" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Verified Channel"> <i style='color:#428bca;' class="fa fa-check-circle"></i></span>
            <?php } ?>
        </a>       
    </div>
    <div class="collapse navbar-collapse">
        <!--
        <ul class="nav navbar-nav">
            <li><a href="#"><i class="fa fa-bullseye"></i> Whats New!</a></li>
        </ul>
        -->
        <?php if ($this->Session->check('Auth.User')) { ?>
            <!-- <div class="col-sm-3 col-md-3 navbar-right" style="margin-top:8px;"> -->
            <div style="margin: 8px; float: right">
                <div class="pull-right btn-group">
                    <a class="btn btn-default" href="<?php echo $mysite; ?>"> 
                        <i class="glyphicon glyphicon-user"></i> <?php echo $this->Session->read('Auth.User.username'); ?>
                    </a>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo $dashboard; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a href="<?php echo $mygames; ?>"><i class="fa fa-gamepad"></i> My Games</a></li>
                        <li><a href="<?php echo $settings; ?>"><i class="fa fa-gears"></i> Settings</a></li>
                        <li><a href="<?php echo $visitor_mode; ?>"><i class="fa fa-eye"></i> View As Visitor</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $logout; ?>"><i class="fa fa-sign-out"></i> Sign Out</a></li>
                    </ul>
                </div>
            </div>
        <?php } else { ?>
            <!-- <div class="col-sm-3 col-md-3 navbar-right" style="margin-top:8px;"> -->
            <div style="margin: 8px; float: right">
                <div class="pull-right btn-group">
                    <button data-toggle="modal" data-target="#login" class="btn btn-default" ><i class="glyphicon glyphicon-user"></i> Login</button>
                    <button data-toggle="modal" data-target="#register" class="btn btn-default" ><i class="glyphicon glyphicon-edit"></i> Register</button>
                </div>
            </div>
        <?php } ?>
        <!-- <div class="col-sm-5 col-md-5"> -->
        <div style="max-width: 750px ! important;">
            <form id="business_search" class="search_form" class="navbar-form" action="<?php echo $search; ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Games..." name="srch-term" id="srch-term" <?php echo!empty($searchVal) ? 'value="' . $searchVal . '"' : '' ?>>
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('form#business_search').submit(function(e) {
            e.preventDefault();
            var search = $('form#business_search input#srch-term').val();
            window.location = '<?php echo $this->webroot . 'games/search/' . $user['User']['id'] . '/'; ?>' + search;
        });
    });
</script>