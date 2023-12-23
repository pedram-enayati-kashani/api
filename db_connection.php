<?php

$serverName = 'localhost';
$userName='root';
$password='';
$dbName='php_api';

try{
    $option= [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password,$option);
    return $pdo;
}
catch(Exception $e){
    echo 'connection faild '.$e->getMessage();
    return false;
}