<?php

include('db.php');
include('fpdf/fpdf.php');

$userID = $_GET['id'];

$sql = "SELECT student.id,student.name,student.lastname,student.phone,student.age,student.birthday,student.ethnicity,student.sakaname,student.photo_img
,student.nationality,student.religion,student.studying,student.schoolname,student.schooladdress,student.yoursaka,student.workings,student.talent,student.gpa,
student.housenumber,student.moo,student.subdistrict,student.road,student.district,student.province,student.postcode,student.idcard,vc.name AS vcname FROM student JOIN vc ON student.vcID = vc.id
WHERE student.id = $userID";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('sarabun', '', 'THSarabunNew.php');
$pdf->Image('img/form.jpg', 1, 1, 210, 297);
//รูป 2 นิ้ว
$pdf->Image("upload_img/$row[idcard]/$row[photo_img]", 175, 13, 25, 30);

$pdf->SetFont('sarabun', '', 15);

//First Name
$pdf->SetXY(36, 69);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['name'],));

//Lastname
$pdf->SetXY(135, 69);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['lastname'],));

//Age
$pdf->SetXY(37, 76);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['age'],));

//Birthday
$pdf->SetXY(90, 76);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['birthday'],));

//ethnicity
$pdf->SetXY(141, 76);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['ethnicity'],));

//nationality
$pdf->SetXY(175, 76);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['nationality'],));

//religion
$pdf->SetXY(45, 83.5);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['religion'],));

//idcard
$pdf->SetXY(100, 83.5);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['idcard'],));

//house number
$pdf->SetXY(63, 90.5);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['housenumber'],));

//moo
$pdf->SetXY(93, 91);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['moo'],));

//subdistrict
$pdf->SetXY(123, 91);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['subdistrict'],));

//road
$pdf->SetXY(173, 91);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['road'],));

//district
$pdf->SetXY(45, 98);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['district'],));

//province
$pdf->SetXY(100, 98);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['province'],));

//postcode
$pdf->SetXY(170, 98);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['postcode'],));

//phone
$pdf->SetXY(80, 105.5);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['phone'],));

//studying
$pdf->SetXY(70, 120);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['studying'],));

//schoolname
$pdf->SetXY(115, 120);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['schoolname'],));

//schooladdress
$pdf->SetXY(45, 127.5);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['schooladdress'],));

//yoursaka
$pdf->SetXY(110, 134.5);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['yoursaka'],));

//workings
$pdf->SetXY(65, 142);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['workings'],));

//talent
$pdf->SetXY(65, 149.5);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['talent'],));

//gpa
$pdf->SetXY(55, 157);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['gpa'],));

//vc name
$pdf->SetXY(105, 164);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['vcname'],));

//sakaname
$pdf->SetXY(55, 171.5);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $row['sakaname'],));


//ติ๊กถูก
$pdf->SetXY(31.5, 163);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', '/',));

//ลายเซ็น
$fullname = "$row[name] $row[lastname]";
$pdf->SetXY(135.5, 208);
$pdf->Cell(0, 10, iconv('UTF-8', 'cp874', $fullname,));




$pdf->Output();
?>
