<?php foreach ($following as $value) { ?>
    <div class="user col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="#">
            <img src="images/avatars/1.jpg" />
        </a>
        <div class="name"><?= $value['User']['username'] ?></div>
        <div class="email">john.smith@gmail.com</div>
    </div>
<?php } ?>