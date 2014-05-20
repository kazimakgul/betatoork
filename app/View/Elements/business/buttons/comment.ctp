<?php
$postPage=$this->Html->url(array("controller" => "wallentries","action" =>"posts",$game["Game"]["id"]));
?>

		<!-- Comment Button -->
		<div class="CommentBtn">
			<div class="widget-button" data-toggle="tooltip" data-original-title="Comment">
				<button type="button" class="btn btn-default" id="gamecomment" data-html="true" data-toggle="popover" 
				data-placement="top" data-title="Comment" data-content='
                <form class="navbar-form">
				    <textarea placeholder="What do you think about this game?" name="comment" cols="32" class="pull-right span12" rows="3" id="cstextarea<?php echo $game["Game"]["id"];?>">#<?php echo $game["Game"]["seo_url"];?></textarea>
<input type="hidden" id="game_id" value="<?php echo $game["Game"]["id"];?>">
<a class="btn btn-link" href="<?php echo $postPage; ?>">See Comments</a>
<button type="submit"  value=""  id="<?php echo  $game["Game"]["id"];?>" class="pull-right comment_button_msg_id btn btn-small btn-info">Comment</button>
                </form></br>
                  '>
				<li class="fa fa-comment"></li> Comment</button>

			</div>
		</div><!-- Comment Button  End-->
		