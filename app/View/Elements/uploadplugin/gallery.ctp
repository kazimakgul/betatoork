<div id="gallery" style=" width:100%; height:350px;" class="scroll">
<?php //echo $gallery; ?>

<div id=gal-wrapper" style=" padding:10px; width:100%">


<?php  foreach($gallery as $link){ ?>

<div id="thumbwrap"  onclick="select_me(this)" style="width: 140px; height: 78px;">
<img class="Ed-Gj-re-Ui" src="<?php echo Configure::read('S3.url').'/'.$link;?>" title="Grass.jpg" style="width: 140px; height: 78px;">
</div>

<?php  } ?>

<div id="thumbwrap"  onclick="select_me(this)" style="width: 140px; height: 78px;">
<img class="Ed-Gj-re-Ui" src="https://lh4.googleusercontent.com/-zDwkUkb_0oM/UTpAVEKFsLI/AAAAAAAAAZ0/ZKemOcec6xE/w140-h78-p/Grass.jpg" title="Grass.jpg" style="width: 140px; height: 78px;">
</div>

<div id="thumbwrap" onclick="select_me(this)" style="width: 140px; height: 78px;">
<img class="Ed-Gj-re-Ui" src="https://lh3.googleusercontent.com/-jKQhqKwJEUA/UTpAUzxFn2I/AAAAAAAAAag/RwXhKJ-Aoos/w140-h78-p/Daisies.jpg" title="Grass.jpg" style="width: 140px; height: 78px;">
</div>

<!--End of wrapper-->
</div>

<!--End of gallery div-->
</div>

