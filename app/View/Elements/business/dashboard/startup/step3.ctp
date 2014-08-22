<div class="step">
    <div class="row">
        <div id="progressbar_follow" class="col-sm-12">
            <span>
                Start following minimum 5 channels.
            </span>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($following as $value) {
            echo $this->element('business/dashboard/channelbox', array(
                'user' => $value['User'],
                'userstat' => $value['Userstat'],
                'status' => FALSE,
                'page' => 'startup'
            ));
        }
        ?>
    </div>
    <div class="form-group form-actions" style="float: left;width: 100%;">
        <a id="back" class="button" href="#" data-step="2">
            <span><i class="fa fa-angle-double-left"></i> Back</span>
        </a>
        <button id="next" type="submit" class="button" data-step="4">
            <span>Next <i class="fa fa-angle-double-right"></i></span>
        </button>
    </div>
</div>