<?php
if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
    $gochannel = $this->Html->url('http://' . $user['User']['seo_username'] . '.' . $pure_domain);
} else {
    $gochannel = $this->Html->url(array('controller' => 'businesses', 'action' => 'mysite', $user['User']['id']));
}
    $dashboard = $this->Html->url(array("controller" => "businesses", "action" => "dashboard"));
?>
<div class="step">
    <div class="success">
        <i style="display:none;" class="ion-checkmark-circled load_icon"></i>
        <!--PreLoader-->
        <div id="grabloader">
        <p><small><?php echo $this->Html->image("/img/loading.gif");?> </small></p>
        </div>
         <!--/PreLoader-->
        <h3 class='load_message'>
            Your channel has been created successfully!
        </h3>
        <a style="margin-top: 10px;display:none;" href="<?php echo $dashboard; ?>" class="btn btn-success gotochannel">
            <span>Go to my dashboard</span>
        </a>
    </div>
</div>