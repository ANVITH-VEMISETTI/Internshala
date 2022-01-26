<?php
session_start();
require_once 'config.php';

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phonenumber'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['username']);
$pass = validate($_POST['password']);
$email = validate($_POST['email']);
$phone = validate($_POST['phonenumber']);

if(empty($uname)) {
    echo "<script>alert('username is Required')</script>";
    header ("Location: admin.html");
    exit();
}else if(empty($pass)) {
    echo "<script>alert('password is Required')</script>";
    header ("Location: admin.html");
    exit();
}else if(empty($email)){
    echo "<script>alert('email is Required')</script>";
    header ("Location: admin.html");
    exit();
}else if(empty($phone)) {
    echo "<script>alert('phone number is Required')</script>";
    header ("Location: admin.html");
    exit();
}

$sql = "INSERT INTO `admin`(`username`, `password`, `email`, `phone_number`) VALUES ('".$uname."','".$pass."','".$email."','".$phone."')";
$result = mysqli_query($link, $sql);
if($result){
    echo "<script>alert('Doctor Created Successfully')</script>";
    header ("Location: adminlogin.html");
    exit();
}
else {
    echo "Error in Adding Doctor";
}
?>