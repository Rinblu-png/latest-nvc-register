<?php

session_start();
include('db.php');
include('alert.php');

$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

$sql = "SELECT * FROM admin WHERE username ='$username' AND password ='$password'";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) == 1) {
    $admin = mysqli_fetch_array($query);
    $_SESSION['admin'] = $admin;

    $usertypeID = $admin['usertypeID'];
    if ($usertypeID == 1) {

        loginSuccess('admin.php');
    } else if ($usertypeID == 2) {
        loginSuccess('user.php');
    }
} else {
    loginFailed('login.php');
}
