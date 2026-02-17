<?php

include('../../db.php');
include('../../alert.php');


if($_POST['vcID'] == 'เลือกระดับชั้น') {
    failed('../../admin.php?menu=saka_manage', 'กรุณาเลือกระดับชั้น');
}else {
    $vcID = $_POST['vcID'];
    $addSaka = $_POST['addSaka'];
    $sql  = "INSERT INTO saka (name,vcID) VALUES('$addSaka',$vcID)";
    $query = mysqli_query($conn,$sql);

    if ($query) {
        success('../../admin.php?menu=saka_manage', 'เพิ่มสาขาวิชาเรียบร้อย');
    } else {
        failed('../../admin.php?menu=saka_manage', 'เกิดข้อผิดพลาด');
    }

}


?>