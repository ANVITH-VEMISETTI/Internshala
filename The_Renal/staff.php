<?php
session_start();
require_once 'config.php';

if(isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['branch'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['username']);
$pass = validate($_POST['pass']);
$branch = validate($_POST['branch']);

if(empty($uname)) {
    header ("Location: stafflogin.php");
    echo "<script>alert('Username is Requires')</script>";
    exit();
}else if(empty($pass)) {
    header ("Location: stafflogin.php");
    echo "<script>alert('Password is Requires')</script>";
    exit();
}else if(empty($branch)) {
    header ("Location : stafflogin.php");
    echo "<script>alert('branch is required')</script>";
}

$sql = "SELECT * FROM staff WHERE username='$uname' AND password='$pass' AND branch='$branch'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    if($row['username'] === $uname && $row['password'] == $pass && $row['branch'] == $branch){
        echo "<script>alert('Logged In!!')</script>";
        $_SESSION['username'] = $row['username'];
        $_SESSION['pass'] = $row['password'];
        $_SESSION['branch'] = $row['branch'];
        header("Location: patientdetails.php");
        exit();
    }
    else {
        echo '<script>alert("Incorrect Username or Password")</script>';
        header ("Location: stafflogin.php");
        exit();
    }
}
else {
    echo '<script>alert("Incorrect Username or Password")</script>';
    header("Location: stafflogin.php");
    exit();
}
?>