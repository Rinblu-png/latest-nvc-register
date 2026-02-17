<?php


include('../../db.php');
include('../../alert.php');

$id = $_POST['oid'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];


$npassword = $_POST['npassword'];
$rpassword = $_POST['rpassword'];


if (empty($npassword) and empty($rpassword)) {

    $sql =  "UPDATE admin SET name='$name', lastname='$lastname', username='$username', 
email='$email', phone ='$phone', address='$address' WHERE id = $id";

} else if ($npassword == $rpassword) {

    $rpassword = md5($rpassword);
     $sql =  "UPDATE admin SET name='$name', lastname='$lastname', username='$username', 
     email='$email', phone ='$phone', address='$address',password = '$rpassword' WHERE id = $id";
     

} else {
    failed('../../admin.php','รหัสผ่านไม่ตรงกัน');
    die();
}


$query = mysqli_query($conn,$sql);
if($query) {
    success('../../admin.php','อัพเดทข้อมูลเรียบร้อย');
}else {
    failed('../../admin.php','เกิดข้อผิดพลาด');
}