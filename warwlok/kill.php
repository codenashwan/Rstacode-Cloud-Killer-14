<?php
$handle = curl_init();

curl_setopt($handle, CURLOPT_URL, $_POST['host']);
curl_setopt($handle, CURLOPT_POST, false);
curl_setopt($handle, CURLOPT_BINARYTRANSFER, false);
curl_setopt($handle, CURLOPT_HEADER, true);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);

$response = curl_exec($handle);
$hlength  = curl_getinfo($handle, CURLINFO_HEADER_SIZE);
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
$body     = substr($response, $hlength);

echo $httpCode;

?>