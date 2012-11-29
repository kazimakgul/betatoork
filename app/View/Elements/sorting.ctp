<style type="text/css">
    .ahover:hover {text-decoration:underline; color:darkgrey;}
</style>  
<a >Sort by: <a>
<a><?php echo $this->Paginator->sort('Userstat.potential', 'Recommended', array('direction'=>'desc','class'=>'ahover'));?></a> | 
<a><?php echo $this->Paginator->sort('created', 'New Channels', array('direction'=>'desc','class'=>'ahover'));?></a> | 
<a><?php echo $this->Paginator->sort('Userstat.subscribeto', 'Chained', array('direction'=>'desc','class'=>'ahover'));?></a>
