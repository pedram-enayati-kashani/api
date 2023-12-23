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

    $first_Name = $data->first_name;
    $last_name= $data->last_name;
    $age = $data->age;
    
    
    $query = "INSERT INTO `users` (`first_name` , `last_name` , `age`) VALUES (?,?,?)";
    $stmt= $pdo->prepare($query);
    $stmt->execute([$first_Name , $last_name , $age]);
    $users= $stmt->fetchAll();
    $result = 'رکورد مورد نظر با موفقیت ساخته شد';
    echo $result;
}
catch(Exception $e){
    echo 'connection faild '.$e->getMessage();
}