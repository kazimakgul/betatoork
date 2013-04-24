            <!-- modal recover -->
            <div id="modal-tutorial" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal-recoverLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="modal-recoverLabel">Follow 5 Channels<small> to get started!</small></h3>
                </div>
                <div style="background-color:#ADD8E6;" class="modal-body">
                <ul style="list-style:none">
                    <?php  echo $this->element('NewPanel/tutorial_channel_box'); ?>
                </ul>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Skip</button>
                    <input type="submit" form="form-recover" class="btn btn-success" value="Next" >
                </div>
            </div><!-- /modal recover-->