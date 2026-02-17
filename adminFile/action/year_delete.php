<?php

include('../../db.php');
include('../../alert.php');

$yearID = $_POST['yearID'];

$sql = "DELETE FROM year WHERE id = $yearID";
$query = mysqli_query($conn, $sql);

if ($query) {
    success('../../admin.php?menu=year_manage', 'ลบปีการศึกษาเรียบร้อย');
} else {
    failed('../../admin.php?menu=year_manage', 'เกิดข้อผิดพลาด');
}



?>