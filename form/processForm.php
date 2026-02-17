<?php


include('../db.php');
include('../alert.php');

if (isset($_POST['submit'])) {

    $roundID = $_POST['roundID'];
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
    $sakaID = $_POST['sakaID'];
    $yearID = $_POST['yearID'];


    // sakaID -> sakaName แปลงสาขาไอดี เป็น ชื่อสาขา
    $sql = "SELECT * FROM saka WHERE id = $sakaID";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $sakaname = $row['name'];

    $path = "../upload_img/$idcard/";
    if (!is_dir($path)) {
        mkdir($path, 0777, true);

        $total = count($_FILES['img']['name']);
        for ($i = 0; $i < $total; $i++) {
            $imgName =  $_FILES['img']['name'][$i];
            $tmp = $_FILES['img']['tmp_name'][$i];
            $ext  = pathinfo($imgName, PATHINFO_EXTENSION);
            $random = rand(10000, 1000000000);
            $rename = $random . '.' . $ext;
            $imageName[] = $rename;
            move_uploaded_file($tmp, "../upload_img/$idcard/" . $rename);
        }
    }

    // sql insert 
    $sqlInert = "INSERT INTO student (name,lastname,age,birthday,ethnicity,nationality,religion,idcard,phone,
    housenumber,moo,subdistrict,road,district,province,postcode,
    studying,schoolname,schooladdress,yoursaka,workings,talent,gpa,photo_img,qc_img,idcard_img,house_img,vcID,sakaname,yearID,roundID,status) 
VALUES ('$name','$lastname','$age','$birthday','$ethnicity','$nationality','$religion','$idcard','$phone',
'$housenumber','$moo','$subdistrict','$road','$district','$province','$postcode','$studying','$schoolname','$schooladdress','$yoursaka','$workings','$talent','$gpa','$imageName[0]','$imageName[1]','$imageName[2]','$imageName[3]','$vcID','$sakaname','$yearID',$roundID,'new')";

    $query = mysqli_query($conn, $sqlInert);
    if ($query) {
        success('../index.php', 'ส่งใบสมัครเรียบร้อย');
    } else {
        failed('../index.php', 'เกิดข้อผิดพลาด');
    }


}