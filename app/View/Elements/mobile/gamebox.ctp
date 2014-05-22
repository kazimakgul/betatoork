<?php $play=$this->Html->url(array("controller" => "mobiles","action" =>"play",2)); ?>

<div class="col-sm-4">
      <div class="thumbnail">
        <img style="margin:0px; padding:0px;" data-src="holder.js/300x200" alt="300x200" src="http://www.edweek.org/media/2013/01/22/18games_birds600.jpg" style="width: 300px; height: 200px;">
        <div class="caption">
          <h3>Angry Birds Starwars</h3>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a href="<?php echo $play;?>" class="btn btn-primary" role="button">Play</a> </p>
        </div>
      </div>
</div>