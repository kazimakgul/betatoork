<?php 
	$more = '';
foreach ($category as $as => $cat): 
		$catName = h($cat['categories']['name']);
		$catId = $cat['categories']['id'];
		$caturl=$this->Html->url(array("controller" => "businesses","action" =>"category",$userid,$catId));
		
		if ($limit > $as)
		{
		echo '<a href="'.$caturl.'" type="button" class="btn btn-default btn-sm">'.$catName.'</a>';
		}
		else
		{
			$more.='<li><a href="'.$caturl.'">'.$catName.'</a></li>';
		}
endforeach; 

if(count($category) >= $limit )
{
	echo '<div class="btn-group">
    <a type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
      More...
      <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    '.$more.'
    </ul>
    </div>';
}
?>
 