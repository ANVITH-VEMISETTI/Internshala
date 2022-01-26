<?php
require_once 'config.php';

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = validate($_POST['name']);
$phone = validate($_POST['phonenumber']);
$dob = validate($_POST['dob']);
$age = validate($_POST['age']);

if(empty($name)) {
    echo "<script>alert('name is Requires')</script>";
    header ("Location: patient.php");
    exit();
}else if(empty($phone)) {
    echo "<script>alert('Phonenumber is Requires')</script>";
    header ("Location: patient.php");
    exit();
}else if(empty($dob)) {
    echo "<script>alert('date of birth is required')</script>";
    header ("Location: patient.php");
}

$sql = "INSERT INTO `patient`(`name`, `phone_number`, `DOB`, `Age`) VALUES ('$name','$phone','$dob','$age')";
$result = mysqli_query($link, $sql);

if($result){
    header ("Location: patientdetails.php");
    exit();
}
else {
    echo '<script>alert("Enter all the details")</script>';
    header ("Location: patient.php");
    exit();
}
?>