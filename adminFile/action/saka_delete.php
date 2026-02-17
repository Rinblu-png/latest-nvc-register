<?php
include('../../db.php');
include('../../alert.php');

$sakaID = $_POST['sakaID'];
$sql = "DELETE FROM saka WHERE id = $sakaID";
$query = mysqli_query($conn, $sql);

if ($query) {
    success('../../admin.php?menu=saka_manage', 'ลบสาขาวิชาเรียบร้อย');
} else {
    failed('../../admin.php?menu=saka_manage', 'เกิดข้อผิดพลาด');
}

?>