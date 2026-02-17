<?php
include('../../db.php');
include('../../alert.php');

$userID = $_POST['userID'];
$sql = "DELETE FROM admin WHERE id = $userID";
$query = mysqli_query($conn, $sql);

if ($query) {
    success('../../admin.php?menu=saka_manage', 'ลบสมาชิกเรียบร้อย');
} else {
    failed('../../admin.php?menu=saka_manage', 'เกิดข้อผิดพลาด');
}

?>