<?php

include('db.php');
include('alert.php');

$studentID = $_GET['id'];

$sql = "SELECT student.id,student.name,student.lastname,student.age,student.birthday,student.nationality,student.sakaname
,student.housenumber,student.moo,student.subdistrict,student.road,student.district,student.province,student.postcode
,student.phone,student.status,student.religion,student.ethnicity,student.idcard,student.workings,student.talent,student.gpa
,student.studying,student.schoolname,student.schooladdress,student.yoursaka,student.qc_img,student.photo_img,student.idcard_img,student.house_img
,round.name AS roundname,vc.name AS vcname ,year.name AS year
FROM student JOIN year ON student.yearID = year.id 
JOIN vc ON student.vcID = vc.id
JOIN round ON student.roundID = round.id WHERE student.id = $studentID ORDER BY student.id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

?>

<h2 class="text-center">แก้ไขข้อมูลของนักศึกษา</h2>
<div class="box">
    <form action="adminFile/action/student_edit.php" method="POST" class="row g-3 d-flex justify-content-center bg-white shadow mt-3 p-3">

        <input type="hidden" name="oid" value="<?php echo $studentID ?>">

        <div class="col-md-6">
            <label class="form-label">ชื่อจริง</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">นามสกุล</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">อายุ</label>
            <input type="text" class="form-control" name="age" value="<?php echo $row['age'] ?>">
        </div>


        <div class="col-md-6">
            <label class="form-label">วันเกิด</label>
            <input type="text" class="form-control" name="birthday" value="<?php echo $row['birthday'] ?>">
        </div>


        <div class="col-md-6">
            <label class="form-label">เชื้อชาติ</label>
            <input type="text" class="form-control" name="ethnicity" value="<?php echo $row['ethnicity'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">สัญชาติ</label>
            <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">ศาสนา</label>
            <input type="text" class="form-control" name="religion" value="<?php echo $row['religion'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">เลขประจำตัวประชาชน</label>
            <input type="text" class="form-control" name="idcard" value="<?php echo $row['idcard'] ?>">
        </div>


        <div class="col-md-3">
                <label class="form-label">บ้านเลขที่</label>
                <input type="text" class="form-control" name="housenumber" placeholder="บ้านเลขที่" value="<?php echo $row['housenumber'] ?>" >
            </div>

            
            <div class="col-md-3">
                <label class="form-label">หมู่</label>
                <input type="text" class="form-control" name="moo" placeholder="หมู่" value="<?php echo $row['moo'] ?>" >
            </div>

            
            <div class="col-md-3">
                <label class="form-label">ตำบล</label>
                <input type="text" class="form-control" name="subdistrict" placeholder="ตำบล" value="<?php echo $row['subdistrict'] ?>" >
            </div>

            
            <div class="col-md-3">
                <label class="form-label">ถนน</label>
                <input type="text" class="form-control" name="road" placeholder="ถนน" value="<?php echo $row['road'] ?>" >
            </div>

            
            <div class="col-md-3">
                <label class="form-label">อำเภอ</label>
                <input type="text" class="form-control" name="district" placeholder="อำเภอ" value="<?php echo $row['district'] ?>" >
            </div>

            
            <div class="col-md-3">
                <label class="form-label">จังหวัด</label>
                <input type="text" class="form-control" name="province" placeholder="จังหวัด" value="<?php echo $row['province'] ?>" >
            </div>

            
            <div class="col-md-3">
                <label class="form-label">รหัสไปรษณีย์</label>
                <input type="text" class="form-control" name="postcode" placeholder="รหัสไปรษณีย์" value="<?php echo $row['postcode'] ?>" >
            </div>


        <div class="col-md-3">
            <label class="form-label">เบอร์โทร</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">กำลังศึกษาอยู่ในระดับ</label>
            <input type="text" class="form-control" name="studying" value="<?php echo $row['studying'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">โรงเรียน/วิทยาลัย</label>
            <input type="text" class="form-control" name="schoolname" value="<?php echo $row['schoolname'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">ที่อยู่</label>
            <input type="text" class="form-control" name="schooladdress" value="<?php echo $row['schooladdress'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">สาขางาน/กรณีศึกษาอยู่ระดับชั้น ปวช.และปวส.</label>
            <input type="text" class="form-control" name="yoursaka" value="<?php echo $row['yoursaka'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">ผลงาน/รางวัลที่ได้รับ</label>
            <input type="text" class="form-control" name="workings" value="<?php echo $row['workings'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">ความสามารถพิเศษ</label>
            <input type="text" class="form-control" name="talent" value="<?php echo $row['talent'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">เกรดเฉลี่ยสะสม</label>
            <input type="text" class="form-control" name="gpa" value="<?php echo $row['gpa'] ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label">มีความประสงค์ขอศึกษาต่อในระดับชั้น</label>
            <select class="form-select" id="vc" name="vcID" required>
                <option value="1">ปวช.</option>
                <option value="2">ปวส.</option>
                <option value="3">ป.ตรี</option>
            </select>
        </div>


        <div class="col-md-6">
            <label class="form-label">สาขาวิชา/สาขางาน</label>
            <input type="text" class="form-control" name="sakaname" value="<?php echo $row['sakaname'] ?>">
        </div>


        <div class="col-md-6">
            <label class="form-label">ปีการศึกษา</label>
            <input type="text" class="form-control" disabled value="<?php echo $row['year'] ?>">
        </div>


        <div class="col-md-12">
            <label class="form-label">วุฒิการศึกษา</label>
            <br>
            <img width="100" src="<?php echo "upload_img/$row[idcard]/$row[qc_img]" ?>">
        </div>

        <div class="col-md-12">
            <label class="form-label">สำเนาบัตรประจำตัวประชาชน </label>
            <br>
            <img width="100" src="<?php echo "upload_img/$row[idcard]/$row[idcard_img]" ?>">
        </div>

        <div class="col-md-12">
            <label class="form-label">สำเนาทะเบียนบ้าน</label>
            <br>
            <img width="100" src="<?php echo "upload_img/$row[idcard]/$row[house_img]" ?>">
        </div>


        <div class="col-md-12">
            <center><input style="width: 300px;background-color: #ffef63;" type="submit" name="edit" class="btn " value="แก้ไขข้อมูล"></center>
            <center><a class="text-decoration-none  text-secondary mt-2" href="admin.php">ย้อนกลับ</a></center>
        </div>

    </form>
</div>

<style>
    .box {
        padding: 20px;
    }
</style>