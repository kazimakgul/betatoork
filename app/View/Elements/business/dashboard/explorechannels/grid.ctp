<?php foreach ($following as $value) { ?>
    <div class="user col-sm-3 col-xs-6">
        <a href="#">
            <img src="images/avatars/1.jpg" />
        </a>
        <div class="name"><?= $value['User']['username'] ?></div>
        <div class="email">john.smith@gmail.com</div>
    </div>
<?php } ?>