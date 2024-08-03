<?php 

$ch = curl_init();
$url = 'http://localhost/telegramRobot/post.php';
curl_setopt($ch,CURLOPT_URL,$url);

// curl_setopt($ch,CURLOPT_POST,true);
// or
curl_setopt($ch,CURLOPT_POST,1);
// 1 is mean request in post if set 2 is mean request in get

// curl_setopt($ch,CURLOPT_POSTFIELDS,"email=pedram.en1376@gmail.com&&password=1234");
// or
$data = ['email'=>'pedram.en1376@gmail.com','password'=>'123'];
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$result = curl_exec($ch);
curl_close($ch);