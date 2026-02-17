<?php

include('../../db.php');
include('../../alert.php');

$studentID = $_POST['studentID'];

$sql = "DELETE FROM student WHERE id = $studentID";
$query = mysqli_query($conn, $sql);

if ($query) {
    success('../../admin.php', 'ลบรายชื่อนักศึกษาเรียบร้อย');
} else {
    failed('../../admin.php', 'เกิดข้อผิดพลาด');
}



?>