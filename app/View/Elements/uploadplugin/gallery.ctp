<div id="gallery" style=" width:100%; height:350px;" class="scroll">
<?php //echo $gallery; ?>

<div id=gal-wrapper" style=" padding:10px; width:100%">


<?php  foreach($gallery as $link){ ?>

<div id="thumbwrap"  onclick="select_me(this)" style="max-height: 150px;">
<img class="Ed-Gj-re-Ui" src="<?php echo Configure::read('S3.url').'/'.$link;?>" style="max-height: 150px;">
</div>

<?php  } ?>


<!--End of wrapper-->
</div>

<!--End of gallery div-->
</div>

