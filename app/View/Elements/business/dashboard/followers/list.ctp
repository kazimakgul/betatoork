<?php foreach ($followers as $value) { ?>
    <div class="row user">
        <div class="col-sm-2 avatar">
            <input type="checkbox" name="select-user" />
            <img src="images/avatars/1.jpg" />
        </div>
        <div class="col-sm-4">
            <a href="user-profile.html" class="name"><?= $value['User']['username'] ?></a>
        </div>
        <div class="col-sm-1 col-sm-offset-1">
            <div class="email">john.smith@gmail.com</div>
        </div>
        <div class="col-sm-1 col-sm-offset-1">
            <div class="total-spent">
                $3,150.00
            </div>
        </div>
        <div class="col-sm-1 col-sm-offset-1">
            <div class="created-at">
                Feb 22, 2014
            </div>
        </div>
    </div>
<?php } ?>