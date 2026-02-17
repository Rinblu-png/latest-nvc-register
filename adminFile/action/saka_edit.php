<?php
session_start();

include('../../db.php');
include('../../alert.php');

$sakaID = $_POST['sakaID'];
$sakaName = $_POST['sakaname'];

$sql = "UPDATE saka SET name = '$sakaName' WHERE id = $sakaID";
$query = mysqli_query($conn,$sql);

if($query) {
    success('../../admin.php?menu=saka_manage','แก้ไขสาขาวิชาเรียบร้อย');

}else {
    failed('../../admin.php?menu=saka_manage','เกิดข้อผิดพลาด');

}
