<?php
session_start();

include('../../db.php');
include('../../alert.php');
$year = $_POST['year'];
$sql = "INSERT INTO year (name) VALUES('$year')";
$query = mysqli_query($conn,$sql);

if($query) {
    success('../../admin.php?menu=year_manage','เพิ่มปีการศึกษาเรียบร้อย');

}else {
    failed('../../admin.php?menu=year_manage','เกิดข้อผิดพลาด');

}
