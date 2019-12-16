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
