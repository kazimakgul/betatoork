           <?php $dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard")); ?>
            <!-- modal recover -->
            <div id="modal-tutorial2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal-recoverLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="modal-recoverLabel">Clone 3 Games<small> to build your channel!</small></h3>
                </div>
                <div style="background-color:#ADD8E6;" class="modal-body">
                        <p class="alert alert-warning">
                            <i class="elusive-info-sign"></i> A clone of the game will be created in your games section and you will be able to edit the game as you wish.
                        </p>
                <ul class="thumbnails">
                    <?php  echo $this->element('NewPanel/gamebox/tutorial_game_box'); ?>
                </ul>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" href="#modal-tutorial" data-toggle="modal" aria-hidden="true">Back</button>
                    <a href="<?php echo $dashboard?>"><input  type="submit" class="btn btn-success" value="Finish" >
                    </a>
                </div>
            </div><!-- /modal recover-->