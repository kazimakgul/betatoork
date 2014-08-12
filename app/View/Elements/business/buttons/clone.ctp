<!-- Clone Button -->
<div class="clone">
    <div class="widget-button" data-toggle="modal" data-target="#myModalclone" href="#" data-original-title="Clone This Game" >
        <button type="button" class="btn btn-default"><i class="fa fa-cog <?if(isset($ownclone[0]['cloneships']['id'])){echo 'green';}?>"></i> Clone <span class="label label-info" id="clone_count"><?= $game['Gamestat']['channelclone']; ?></span></button>
    </div>
</div>
<!-- Clone Button End -->
