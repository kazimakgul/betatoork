<div class="btn-group pull-right">
    <?php if ($active == 1) { ?>
        <button type="button" class="btn btn-success btn-sm switch_publish1" id="<?php echo $id; ?>">Published</button>
        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
        </button>
    <?php } else { ?>
        <button type="button" class="btn btn-danger btn-sm switch_publish1" id="<?php echo $id; ?>">UnPublished</button>
        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
        </button>
    <?php } ?>
    <ul class="dropdown-menu" role="menu">
        <li><a href="<?php echo $game_edit . '/' . $id; ?>" ><i class="fa fa-edit"></i> Edit</a></li>
        <li><a href="#" data-toggle="modal" data-target="#confirm-modal" onclick="game_id_create(<?php echo $id; ?>);" ><i class="fa fa-trash-o"></i> Delete</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="fa fa-info"></i> Details</a></li>
    </ul>
</div>