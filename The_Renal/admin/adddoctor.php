<?php
session_start();
require_once 'config.php';

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['branch']) && isset($_POST['phonenumber'])) {
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
$branch = validate($_POST['branch']);
$phone = validate($_POST['phonenumber']);

if(empty($uname)) {
    header ("Location: doctor.php");
    echo "<script>alert('username is Required')</script>";
    exit();
}else if(empty($pass)) {
    header ("Location: doctor.php");
    echo "<script>alert('password is Required')</script>";
    exit();
}else if(empty($email)){
    header ("Location: doctor.php");
    echo "<script>alert('email is Required')</script>";
    exit();
}else if(empty($branch)){
    header ("Location: doctor.php");
    echo "<script>alert('branch is Required')</script>";
    exit();
}else if(empty($phone)) {
    header ("Location: doctor.php");
    echo "<script>alert('phone number is Required')</script>";
    exit();
}

$sql = "INSERT INTO `doctor`(`username`, `password`, `email`, `branch`, `phone_number`) VALUES ('".$uname."','".$pass."','".$email."','".$branch."','".$phone."')";
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