<?php

/**
 * Elements
 * #search bar-type, #conditions
 * #author @ogi
 */

$style=isset($style) ? $style : NULL;
$query=isset($query) ? $query : NULL;

?>
<!-- Search Bar -->
<form class="search hidden-xs" action="<?php echo $url; ?>" style="<?php echo $style; ?>">
                <i class="fa fa-search"></i>
                <input type="text" name="q" placeholder="<?php echo $title; ?>" value="<?php echo $query; ?>" />
                <input type="submit" />
</form>
<!-- Search Bar -->
