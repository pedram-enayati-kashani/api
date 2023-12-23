<?php 

$serverName='localhost';
$username='root';
$password='';
$dbName='php_api';

try{
    $option= [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName",$username,$password,$option);
    
    $query = "SELECT * FROM `users`";
    $stmt= $pdo->prepare($query);
    $stmt->execute();
    $users= $stmt->fetchAll();
    $data= json_encode($users);
    echo $data;
}
catch(Exception $e){
    echo 'connection faild '.$e->getMessage();
}