<?php

include('../../db.php');
include('../../alert.php');

$processID = $_GET['processID'];
$roundID = $_GET['roundID'];


if ($processID == "1") {

    $sql = "UPDATE round SET status = 'open' WHERE id = $roundID ";
    $msg = "เปิดรับสมัครเรียบร้อย";

} else if ($processID == "2") {

    $sql = "UPDATE round SET status = 'close' WHERE id = $roundID ";
    $msg = "ปิดรับสมัครเรียบร้อย";
}

$query = mysqli_query($conn, $sql);

if ($query) {
    success('../../admin.php?menu=year_manage', $msg);
} else {
    failed('../../admin.php?menu=year_manage', 'เกิดข้อผิดพลาด');
}
