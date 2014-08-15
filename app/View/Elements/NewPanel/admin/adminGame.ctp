<?php
foreach ($games as $game) {
    $gameedit = $this->Html->url(array("controller" => "admins", "action" => "game_edit", $game['Game']['id']));
    $game_link = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
    ?>
    <div class="media well shadow" style="background-color:white;">
        <a class="pull-left" href="<?php echo $game_link; ?>">
            <?php
            if ($game['Game']['picture'] == null) {
                ?>
                <img src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" class="panel-image-preview" alt="" onerror="imgError(this,&quot;toorksize&quot;);" width="200" height="110"> 
                <?php
            } else {
                echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('class' => 'panel-image-preview', 'alt' => $game['Game']['name'], 'onerror' => 'imgError(this,"toorksize");', 'width' => 200, 'height' => 110));
            }
            ?>
        </a>
        <h4 class="media-heading">
            <a href="<?php echo $game_link; ?>"><?php echo h($game['Game']['name']); ?></a>
            <small class="pull-right helper-font-small">
                Created: <?php echo h($game['Game']['created']); ?>
            </small>
        </h4>
        <p class="pull-right">
            <a href="#" class="btn btn-mini detailopen" id="<?php echo h($user['User']['id']); ?>"><i class="elusive-edit"></i> Quick Edit</a>
            <a href="<?php echo $gameedit; ?>" class="btn btn-mini"><i class="elusive-edit"></i> Edit</a>
        </p>
        <!--
        <hr size="1">
        <div id="hidePost" style="margin-bottom:-45px;">	
            <div style="background-color:#f5f5f5; padding:0px 20px 30px 20px; margin:-20px;">				
                <div class="row-fluid commentupdate clearfix" style="margin-top: 10px; display:none" id="detailbox<?php echo h($user['User']['id']); ?>">
                    <div class="span11"> </div>
                </div>
                <div class="row-fluid commentupdate clearfix" style="margin-top: 10px; display:none" id="commentbox<?php echo $random2; ?>">
                    <div class="span11">
                        <?php echo h($user['User']['role']); ?>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
<?php } ?>		