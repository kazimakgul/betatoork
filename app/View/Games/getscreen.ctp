<?php
 
// save this snippet as url_to_png.php
// usage: php url_to_png.php http://example.com

$argv[1]="http://www.toork.com";

if(!isset($argv[1])){
    die("specify site: e.g. http://toork.com\n");
}
 
$md5 = md5($argv[1]);
//$command = "wkhtmltopdf $argv[1] $md5.pdf";
$command = "xvfb-run --server-args="-screen 0, 1024x768x24" wkhtmltopdf $argv[1] file2.pdf";
exec($command, $output, $ret);
if ($ret) {
    echo "error fetching screen dump\n";
    die;
}
 
$command = "convert $md5.pdf -append $md5.png";
exec($command, $output, $ret);
if ($ret){
    echo "Error converting\n";
    die;
}
 
echo "Conversion compleated: $argv[1] converted to $md5.png\n"; 

?>