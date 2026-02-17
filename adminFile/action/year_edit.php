<?php
session_start();

include('../../db.php');
include('../../alert.php');

$year = $_POST['year'];
$yearID = $_POST['yearID'];

$yearStatus = $_POST['status'];


if ($yearStatus == "0") {

    $sql = "UPDATE year SET name = '$year' WHERE id = $yearID";
    
} else {

    if ($yearStatus == "1") {

        $sql = "UPDATE year SET name = '$year', status= 'open' WHERE id = $yearID";
    } else if ($yearStatus == "2") {
        $sql = "UPDATE year SET name = '$year', status= 'close' WHERE id = $yearID";
    }
}


$query = mysqli_query($conn, $sql);

if ($query) {
    success('../../admin.php?menu=year_manage', 'แก้ไขปีการศึกษาเรียบร้อย');
} else {
    failed('../../admin.php?menu=year_manage', 'เกิดข้อผิดพลาด');
}
