<?php
session_start();
require_once 'config.php';

if(isset($_POST['username']) && isset($_POST['pass'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['username']);
$pass = validate($_POST['pass']);

if(empty($uname)) {
    header ("Location: admin.html");
    echo "<script>alert('Username is Requires')</script>";
    exit();
}else if(empty($pass)) {
    header ("Location: admin.html");
    echo "<script>alert('Password is Requires')</script>";
    exit();
}

$sql = "SELECT * FROM admin WHERE username='$uname' AND password='$pass'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    if($row['username'] === $uname && $row['password'] == $pass){
        echo "Logged In!!";
        $_SESSION['username'] = $row['username'];
        $_SESSION['pass'] = $row['password'];
        header("Location: adminlogin.html");
        exit();
    }
    else {
        header ("Location: admin.html");
        echo "<script>alert('Incorrect username or password')</script>";
        exit();
    }
}
else {
    header("Location: admin.html");
    exit();
}
?>