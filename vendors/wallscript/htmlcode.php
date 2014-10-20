<?php
function htmlcode($text){
//$stvarno = array ("<", ">");
//$zamjenjeno = array ("&lt;","&gt;");
$stvarno = array ("<script>", "</script>");
$zamjenjeno = array ("prohibited","prohibited");
$final = str_replace($stvarno, $zamjenjeno, $text);
return $final;
}
function clear($text){
$final = stripslashes(stripslashes( $text));
return $final;
}
?>