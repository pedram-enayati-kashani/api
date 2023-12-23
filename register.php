<?php 

require_once 'db_connection.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$fullName = $data->fullName;
$username = $data->username;
$password = $data->password;
$email = $data->email;
$mobile = $data->mobile;
$error;

if(empty($fullName))
$error = 'fullName must not be empty';
elseif(empty($username))
$error = 'username must not be empty';
elseif(empty($password))
$error = 'password must not be empty';
elseif(empty($email))
$error = 'email must not be empty';
elseif(empty($mobile))
$error = 'mobile must not be empty';
else{
    $query = 'SELECT * FROM users WHERE mobile =?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$mobile]);
    $user = $stmt->fetch();
    var_dump($mobile);
    if($user == false){
        $insertQuery= "INSERT INTO users (`fullName`,`username`,`password`,`email`,`mobile`) VALUE (?,?,?,?,?)";
        $stmt= $pdo->prepare($insertQuery);
        $password = password_hash($password,PASSWORD_DEFAULT);
        $result = $stmt->execute([$fullName,$username,$password,$email,$mobile]);
        if($result){
            $response['status']=true;
            $response['message']= 'کاربر با  موفقیت ساخته شد';
        }
        else{
            $response['status']=false;
            $response['message']= 'در حین ثبت نام مشکلی پیش آمد';
        }
    }
    else{
        $response['status']=false;
        $response['message']= 'کاربر تکراری میباشد';
    }
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
}
if(isset($error))
echo json_encode($error);