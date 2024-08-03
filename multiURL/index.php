<?php


$urls = [
    'https://toplearn.com/',
    'https://hassankhosrojerdi.ir/',
    'https://barnamenevisan.info/'
];

$mh = curl_multi_init();

$channels = [];

foreach ($urls as $key => $url) {
    $channels[$key] = curl_init();
    curl_setopt_array($channels[$key], [CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true]);
    curl_multi_add_handle($mh, $channels[$key]);
}

$active = null;

do {
    $status = curl_multi_exec($mh, $active);
} while ($active && $status == CURLM_OK);


foreach ($channels as $channel) {
    echo curl_multi_getcontent($channel);
    curl_multi_remove_handle($mh, $channel);
    curl_close($channel);
}

curl_multi_close($mh);