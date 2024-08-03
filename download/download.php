<?php

$url = 'http://localhost/api/download/readme.txt';
$destination = "saved.txt";
$timeout = 30;
$fh = fopen($destination,'w+') or exit('error opening file');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_FILE,$fh);
curl_setopt($ch,CURLOPT_TIMEOUT,$timeout);
curl_exec($ch);
if(curl_error($ch)){
    echo curl_error($ch);
}
else{
    $status = curl_getinfo($ch);
    echo $status['http_code'] == 200 ? 'ok' : 'Error - '.$status['http_code'];
}

curl_close($ch);
fclose($fh);