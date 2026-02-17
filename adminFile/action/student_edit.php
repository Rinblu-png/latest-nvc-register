<?php

include('../../db.php');
include('../../alert.php');


if ($_POST['edit']) {

    $id = $_POST['oid'];

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $ethnicity = $_POST['ethnicity'];
    $nationality = $_POST['nationality'];
    $religion = $_POST['religion'];
    $idcard = $_POST['idcard'];
    $housenumber = $_POST['housenumber'];
    $moo = $_POST['moo'];
    $subdistrict = $_POST['subdistrict'];
    $road = $_POST['road'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $postcode  = $_POST['postcode'];
    $phone = $_POST['phone'];
    $studying = $_POST['studying'];
    $schoolname = $_POST['schoolname'];
    $schooladdress = $_POST['schooladdress'];
    $yoursaka = $_POST['yoursaka'];
    $workings = $_POST['workings'];
    $talent = $_POST['talent'];
    $gpa = $_POST['gpa'];
    $vcID = $_POST['vcID'];
    $sakaname = $_POST['sakaname'];
  //  $yearID = $_POST['yearID'];

    $sql = "UPDATE student SET name='$name', lastname='$lastname',age='$age', birthday='$birthday',ethnicity='$ethnicity',nationality='$nationality',
    idcard='$idcard',housenumber='$housenumber',moo='$moo',subdistrict='$subdistrict',road='$road',district='$district',province='$province',
    postcode='$postcode',phone='$phone', studying='$studying',schoolname='$schoolname',schooladdress='$schooladdress',yoursaka='$yoursaka',
    workings='$workings',talent='$talent',gpa='$gpa',vcID=$vcID,sakaname='$sakaname' WHERE id = $id";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        success('../../admin.php', 'แก้ไขข้อมูลเรียบร้อย');
    } else {
        failed('../../admin.php', 'เกิดข้อผิดพลาด');
    }

} 