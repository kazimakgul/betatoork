<div id="photos" style=" width:100%; height:350px;" class="scroll">
<?php //echo $gallery; ?>

<div id=gal-wrapper" style=" padding:10px; width:100%">


<?php  foreach($photos as $link){ ?>

<div id="thumbwrap"  onclick="select_me(this)" style="max-height: 150px;">
<img class="Ed-Gj-re-Ui" src="<?php echo Configure::read('S3.url').'/'.$link;?>" style="max-height: 150px;">
</div>

<?php  } ?>


<!--End of wrapper-->
</div>

<!--End of gallery div-->
</div>

<script>
 function select_me(elm){
   //$(elm).children(".picker-badges").remove();
   $('.picker-badges').remove();
   $(elm).append('<i class="glyphicon glyphicon-ok picker-badges"></i>');
   $('#set_photo').removeClass('disabled');
   imagepatch=$(elm).children(".Ed-Gj-re-Ui").attr('src');
   $('#imagepatch').val(imagepatch);
}
</script>
