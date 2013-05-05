<?php echo $this->Html->script(array('js2/jquery'));  ?>

<?php foreach ($posts as $game) : ?>
    <div class="post" id="posts-container"> 
        //HTML markup for posts
		<?php echo $post['Game']['name']; ?>
    </div>
<?php endforeach; ?>
<div class="paging" id="yeahpage">
    <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
     echo $this->Paginator->numbers();
     echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
</div>

<script type="text/javascript"> 
$(".paging").hide();  //hide the paging for users with javascript enabled


$("#posts-container").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content
var url = $("a#next").attr("href");
$(".paging").remove();
$("div.batch").load(url, function(response, status, xhr) {
            if (status == "error") {
              var msg = "Sorry but there was an error: ";
              alert(msg + xhr.status + " " + xhr.statusText);
            }
            else {
                $(this).attr("class","loaded"); //change the class name so it will not be confused with the next batch
                $(".paging").hide(); //hide the new paging links
                $(this).fadeIn();
 
            }
        });      

</script>