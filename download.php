<?php
// ==============================download=================================
$file = file_get_contents("ckeditor_4.10.0_full.zip");
$size = filesize("ckeditor_4.10.0_full.zip");
// $size = strlen($file);
header('Content-Description: File Transfer');
header('Content-Type: image/jpg');
header('Content-Disposition: attachment; filename="ckeditor_4.10.0_full.zip"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . $size);
// readfile("ckeditor_4.10.0_full.zip");
echo ($file);
// ==============================full curl================================
function curl_download($Url){ 
    // is cURL installed yet?
    if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }
    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, $Url);
    // curl_setopt($ch, CURLOPT_PROXY, $proxy);
    // curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, "http://www.rajanews.ir");
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    // Download the given URL, and return output
    $output = curl_exec($ch);
    // Close the cURL resource, and free system resources
    curl_close($ch);
    return $output;
}
// print curl_download('http://www.rajanews.ir/');
echo curl_download('https://www.twitter.com');