<?php

include('../../db.php');
include('../../alert.php');

if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertypeID = $_POST['usertypeID'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $password = md5($password);

    $sql = "INSERT INTO admin (username,password,name,lastname,email,phone,address,usertypeID) 
VALUES ('$username','$password','$name','$lastname','$email','$phone','$address',$usertypeID)";;


    $query = mysqli_query($conn, $sql);

    if ($query) {
        success('../../admin.php?menu=admin_manage', 'เพิ่มสมาชิกเรียบร้อย');
    } else {
        failed('../../admin.php?menu=admin_manage', 'เกิดข้อผิดพลาด');
    }


} else if (isset($_POST['edit'])) {

    $id = $_POST['oid'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $usertypeID = $_POST['usertypeID'];


    $npassword = $_POST['npassword'];
    $rpassword = $_POST['rpassword'];


    if (empty($npassword) and empty($rpassword)) {

        $sql =  "UPDATE admin SET name='$name', lastname='$lastname', username='$username', 
email='$email', phone ='$phone', address='$address',usertypeID = $usertypeID  WHERE id = $id";

    } else if ($npassword == $rpassword) {

        $rpassword = md5($rpassword);
        $sql =  "UPDATE admin SET name='$name', lastname='$lastname', username='$username', 
     email='$email', phone ='$phone', address='$address',password = '$rpassword',usertypeID = $usertypeID WHERE id = $id";
    } else {
        failed('../../admin.php?menu=admin_manage', 'รหัสผ่านไม่ตรงกัน');
        die();
    }


    $query = mysqli_query($conn, $sql);
    if ($query) {
        success('../../admin.php?menu=admin_manage', 'อัพเดทข้อมูลเรียบร้อย');
    } else {
        failed('../../admin.php?menu=admin_manage', 'เกิดข้อผิดพลาด');
    }
}
