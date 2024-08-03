<?php

$ch = curl_init();
$url = 'https://www.w3schools.com/';
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Max OS X)');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,true);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,true);
curl_setopt($ch,CURLOPT_TIMEOUT,10000);
$data = curl_exec($ch);
print_r($data);