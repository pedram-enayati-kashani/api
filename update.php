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
    
    $id=$_GET['id'];   
    
    $query = "UPDATE users SET `first_name`=? , `last_name`=? , `age`=? WHERE id=?";
    $stmt= $pdo->prepare($query);
    $stmt->execute([$data->first_name , $data->last_name , $data->age , $id]);
    $users= $stmt->fetchAll();
    $result = 'داده مورد نظر با موفقیت بروزرسانی شد';
    echo $result;
}
catch(Exception $e){
    echo 'connection faild '.$e->getMessage();
}