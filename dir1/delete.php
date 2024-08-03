<?php 

$serverName='localhost';
$username='root';
$password='';
$dbName='php_api';

try{
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $option= [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName",$username,$password,$option);
    
    $id = $_GET['id'];
    
    
    $query = "DELETE FROM `users` WHERE id= ?";
    $stmt= $pdo->prepare($query);
    $stmt->execute([$id]);
    $users= $stmt->fetchAll();
    $result = 'رکورد مورد نظر با موفقیت حذف شد';
    echo $result;
}
catch(Exception $e){
    echo 'connection faild '.$e->getMessage();
}