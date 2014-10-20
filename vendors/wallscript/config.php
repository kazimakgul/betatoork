<?php


$db = new DATABASE_CONFIG(); 
 define('DB_SERVER', $db->default['host']);
define('DB_USERNAME', $db->default['login']);
define('DB_PASSWORD', $db->default['password']);
define('DB_DATABASE', $db->default['database']);
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
mysql_query ("set character_set_results='utf8'");   
$path = "wall/";
$perpage=10; // Updates perpage
$gravatar=1; // 0 false 1 true gravatar image
$rowsPerPage=10; //friends list
?>
