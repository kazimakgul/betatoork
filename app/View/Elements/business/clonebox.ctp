<!--Clone Modal -->
<div id="myModalclone" class="modal1 fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Clone - <?php echo $game["Game"]["name"];?> ?</h3>
    </div>
    <div class="modal-body">
        <p class="alert alert-danger">A clone of this game will be created in your games section and you will be able to edit the game as you wish.</p>
          <div class="alert alert-info" STYLE="font-size:9pt;">
            <H4>Its the easy way of adding a game to your channel.</H4>
            <h5 style="margin:10px 0px 10px 0px;"><i class="fa fa-info-circle"></i> Tips and Tricks</h5>
            <p><i class="fa fa-check-circle"></i> You can edit the games after you clone them.</p>
            <p><i class="fa fa-check-circle"></i> Change the picture of the game if it doesnt fit your needs.</p>
            <p><i class="fa fa-check-circle"></i> You can also change the name and description of the game.</p>
            <p><i class="fa fa-check-circle"></i> Finally, share games with your social networks, to reach more people.</p>
          </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
        <input type="hidden" id="game_name" value="<?php echo $game["Game"]["name"];?>">
        <a id="chaingame" data-dismiss="modal" href="#" class="btn btn-success">Yes! Clone</a>
 
   </div>
</div>

<style>
.modal1 {
display:block;
overflow: hidden;
position: fixed;
top: 10%;
left: 50%;
z-index: 1050;
width: 560px;
margin-left: -280px;
background-color: #ffffff;
border: 1px solid #999;
border: 1px solid rgba(0, 0, 0, 0.3);
-webkit-border-radius: 6px;
-moz-border-radius: 6px;
border-radius: 6px;
outline: none;
-webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
}
.modal-footer {
padding: 14px 15px 15px;
margin-bottom: 0;
text-align: right;
background-color: #f5f5f5;
border-top: 1px solid #ddd;
-webkit-border-radius: 0 0 6px 6px;
-moz-border-radius: 0 0 6px 6px;
border-radius: 0 0 6px 6px;
-webkit-box-shadow: inset 0 1px 0 #ffffff;
-moz-box-shadow: inset 0 1px 0 #ffffff;
box-shadow: inset 0 1px 0 #ffffff;
}
</style>