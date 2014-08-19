<?php
if(Configure::read('Domain.type')=='subdomain')
{
$index = $this->Html->url('/');
}else{
$index = $this->Html->url(array("controller" => "businesses", "action" => "mysite",$userid));
}
?>
<a href="<?php echo $index; ?>" type="button" class="btn btn-default btn-sm">Home</a>
<?php
	$more = '';
foreach ($category as $as => $cat):
		$catName = h($cat['categories']['name']);
		$catId = $cat['categories']['id'];

        if(Configure::read('Domain.type')=='subdomain')
	    {
        $caturl=$this->Html->url(array("controller" => "category","action" =>strtolower($catName)));
	    }else{
	    $caturl=$this->Html->url(array("controller" => "businesses","action" =>"category",$userid,$catId));
	    }

		
		
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
 