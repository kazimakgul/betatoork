<?php
if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
    $gochannel = $this->Html->url('http://' . $user['User']['seo_username'] . '.' . $pure_domain);
} else {
    $gochannel = $this->Html->url(array('controller' => 'businesses', 'action' => 'mysite', $user['User']['id']));
}
?>
<div class="step">
    <div class="success">
        <i class="ion-checkmark-circled load_icon"></i>
        <h3 class='load_message'>
            Your channel has been created successfully!
        </h3>
        <a style="margin-top: 10px;" href="<?php echo $gochannel; ?>" class="btn btn-success">
            <span>Go to my channel</span>
        </a>
    </div>
</div>