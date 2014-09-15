<div class="btn-group pull-right">
    <?php if ($active == 1) { ?>
        <a type="button"  href="<?php echo $game_edit . '/' . $id; ?>" class="btn btn-success btn-sm">
            <i class="fa fa-edit"></i>
            Edit
        </a>
        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-caret-down"></i>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="#" class="switch_publish1" id="<?php echo $id; ?>">
                    <i class="fa fa-cog"></i>
                    UnPublish
                </a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#confirm-modal" onclick="game_id_create(<?php echo $id; ?>);" >
                    <i class="fa fa-trash-o"></i>
                    Delete
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <i class="fa fa-info"></i>
                    Details
                </a>
            </li>
        </ul>
    <?php } else { ?>
        <a type="button" href="<?php echo $game_edit . '/' . $id; ?>" class="btn btn-danger btn-sm" id="<?php echo $id; ?>">
            <i class="fa fa-edit"></i>
            Edit
        </a>
        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-caret-down"></i>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="#" class="switch_publish1" id="<?php echo $id; ?>">
                    <i class="fa fa-cog"></i>
                    Publish
                </a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#confirm-modal" onclick="game_id_create(<?php echo $id; ?>);" >
                    <i class="fa fa-trash-o"></i>
                    Delete
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <i class="fa fa-info"></i>
                    Details
                </a>
            </li>
        </ul>
    <?php } ?>
</div>