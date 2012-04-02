
<style type="text/css">
    .ahover:hover {text-decoration:underline; color:darkgrey;}
</style>	
<a >Sort by: <a>
<a><?php echo $this->Paginator->sort('recommend', 'Recommended', array('direction'=>'desc','class'=>'ahover'));?></a> |
<a><?php echo $this->Paginator->sort('starsize', 'StarSize', array('direction'=>'desc','class'=>'ahover'));?></a> |
<a><?php echo $this->Paginator->sort('rate_count', 'Rating', array('direction'=>'desc','class'=>'ahover'));?></a>
<br> <br>