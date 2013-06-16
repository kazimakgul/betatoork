<?php
 
// save this snippet as url_to_png.php
// usage: php url_to_png.php http://example.com

$url="http://www.toork.com";

$command = "xvfb-run --server-args='-screen 0, 1024x768x24' wkhtmltopdf $url file2aa.pdf";
exec($command, $output, $ret);
print_r($ret);
if ($ret) {
    echo "error fetching screen dump\n";
    die;
}

?>