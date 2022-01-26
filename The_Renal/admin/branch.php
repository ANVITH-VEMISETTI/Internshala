<?php
session_start();
require_once 'config.php';

if(isset($_POST['name']) && isset($_POST['amount'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$bname = validate($_POST['name']);
$amount = validate($_POST['amount']);

if(empty($bname)) {
    header ("Location: admin.html");
    echo "<alert>name is Required</alert>";
    exit();
}else if(empty($amount)) {
    header ("Location: admin.html");
    echo "<alert>amount is Required</alert>";
    exit();
}

$sql = "INSERT INTO `branch`(`name`, `amount`) VALUES ('".$bname."','".$amount."')";
$result = mysqli_query($link, $sql);
if($result){
    echo "<script>alert('Branch Added Successfully')</script>";
    header ("Location: adminlogin.html");
    exit();
}
else {
    echo "Error in Adding Branch";
}
?>