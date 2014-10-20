<?php
//Srinivas Tamada
// Verion 1.0
function Expand_URL($url){
        $returns = "";
if(!empty($url)){
if(eregi("youtu",$url) or eregi("youtube",$url)){
        if(eregi("v=",$url))
    $splits = explode("=",$url);
    else
    $splits = explode("be/",$url);

        if(!empty($splits[1])){
			if(preg_match("/feature/i", $splits[1])){
			$splits[1] = str_replace("&feature","",$splits[1]);	
			}
                $returns = '<iframe width="510" height="300" src="http://www.youtube.com/embed/'.$splits[1].'" frameborder="0" allowfullscreen></iframe>';
        }
} else if(eregi("vimeo",$url)){
        $splits = explode("com/",$url);
        $returns = '<iframe src="http://player.vimeo.com/video/'.$splits[1].'?title=0&amp;byline=0&amp;portrait=0" width="510" height="300" frameborder="0"></iframe>';

}else if(eregi("dailymotion",$url)){
        $splits = explode("com/",$url);
        if(!empty($splits[1])){
            $splits = explode("_",$splits[1]);
        }
        $returns = '<iframe src="http://www.dailymotion.com/embed/'.$splits[0].'" width="430" height="250" frameborder="0"></iframe>';
}


}
return $returns;
}
?>
