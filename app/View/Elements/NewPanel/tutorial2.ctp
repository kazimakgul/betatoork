            <!-- modal recover -->
            <div id="modal-tutorial2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal-recoverLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="modal-recoverLabel">Chain 3 Games<small> to build your channel!</small></h3>
                </div>
                <div style="background-color:#ADD8E6;" class="modal-body">
                        <p class="alert alert-warning">
                            <i class="elusive-info-sign"></i> A clone of the games will be created in your games section and you will be able to edit the game as you wish.
                        </p>
                <ul style="list-style:none">
                    <?php  echo $this->element('NewPanel/tutorial_game_box'); ?>
                </ul>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" href="#modal-tutorial" data-toggle="modal" aria-hidden="true">Back</button>
                    <input type="submit" data-dismiss="modal" class="btn btn-success" value="Finish" >
                </div>
            </div><!-- /modal recover-->