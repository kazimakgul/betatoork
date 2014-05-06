<div id="gallery" style=" width:100%; height:350px;" class="scroll">
<?php //echo $gallery; ?>

<div id=gal-wrapper" style=" padding:10px; width:100%">

<!--There is no gallery item-->
<?php if($gallery==0){ ?>
<div style='width:100%;text-align: center;padding-top: 120px;'>
<span class="btn btn-success" style="background-color: #C2C6C6;border-color: #C2C6C6;">
        <i class="glyphicon glyphicon-remove" style="font-size:20px;">Gallery cannot be used for games.</i>
    </span>
 </div>   
<?php  } ?>

<?php  foreach($gallery as $link){ ?>

<div id="thumbwrap"  onclick="select_me(this)" style="max-height: 150px;">
<img class="Ed-Gj-re-Ui" src="<?php echo Configure::read('S3.url').'/'.$link;?>" style="max-height: 150px;">
</div>

<?php  } ?>


<!--End of wrapper-->
</div>

<!--End of gallery div-->
</div>

