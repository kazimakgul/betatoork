<?php
 
// save this snippet as url_to_png.php
// usage: php url_to_png.php http://example.com

$url="http://www.toork.com";

$command = "xvfb-run --server-args='-screen 0, 1024x768x24' wkhtmltopdf http://www.toork.com /var/www/betatoork/app/webroot/upload/file2aa3.pdf";
exec($command, $output, $ret);
print_r($ret);
print_r($output);
if ($ret) {
    echo "error fetching screen dump\n";
    die;
}

$command = "convert /var/www/betatoork/app/webroot/upload/file2aa3.pdf -append /var/www/betatoork/app/webroot/upload/file2aa3.png";
exec($command, $output, $ret);
print_r($ret);
print_r($output);


?>