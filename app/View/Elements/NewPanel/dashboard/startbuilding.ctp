        <div class="alert alert-error span5">
                <div class="box-header corner-top">
                        <div class="header-control">
                        <button data-box="close" data-hide="fadeOut" class="close">×</button>
                        </div>
                        
                </div>
                    <h3>Start Building!</h3>
                    <p>To start building your channel complete these steps.</p>
                        <p>
                        <a rel="tooltip" data-placement="top" data-original-title="Start Building" href="#modal-tutorial" data-toggle="modal" class="btn btn-info" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-play-circle"></i> Start
                        </a>
                         <a rel="tooltip" data-placement="top" data-original-title="Add a Game" href="<?php echo $addGame; ?>" class="btn btn-danger" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-plus"></i> Add Game
                        </a>
                         <a rel="tooltip" data-placement="top" data-original-title="Customize Your Channel" href="<?php echo $settings; ?>" class="btn btn-warning" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-edit"></i> Customize
                        </a>
                        <a rel="tooltip" data-placement="bottom" data-original-title="Follow Best Channels"  href="<?php echo $bestchannels; ?>" class="btn btn-success" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-plus-sign"></i> Discover Channels
                        </a>
                        <a rel="tooltip" data-placement="bottom" data-original-title="Take The Tour"  class="btn btn-info" onclick="javascript:introJs().start();" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-compass"></i> Tour
                        </a>
                        </p>
                        <p><i class="elusive-circle-arrow-down"></i> <small>We recommend you games upon your interests here.</small></p>
        </div>
        <?php  echo $this->element('NewPanel/tutorial'); ?>
        <?php  echo $this->element('NewPanel/tutorial2'); ?>