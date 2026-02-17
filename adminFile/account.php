<?php

include('db.php');
include('alert.php');

$_SESSION['user'] = $user;
$id = $user['id'];

$sql = "SELECT * FROM admin WHERE id = $id";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

?>



<div class="p-3">
    <form action="adminFile/action/updateaccount.php" method="POST" enctype="multipart/form-data" class="row d-flex justify-content-center shadow bg-white g-3 p-2">

        <h1 class="text-center mt-3">แก้ไขข้อมูลส่วนตัว</h1>
        <center><img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" width="300" alt=""></center>

        <input type="hidden" name="oid" value="<?php echo $id; ?>">

        <div class="col-md-7">
            <label class="form-labe">ผู้ใช้งาน</label>
            <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
        </div>
        

        <div class="col-md-7">
            <label class="form-labe">รหัสผ่านใหม่</label>
            <input type="password" class="form-control" name="npassword">
        </div>

        <div class="col-md-7">
            <label class="form-labe">ยืนยันรหัสผ่าน</label>
            <input type="password" class="form-control" name="rpassword">
        </div>


        <div class="col-md-7">
            <label class="form-labe">ชื่อจริง</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
        </div>

        <div class="col-md-7">
            <label class="form-labe">นามสกุล</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'] ?>">
        </div>

        <div class="col-md-7">
            <label class="form-labe">อีเมล</label>
            <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>">
        </div>

        <div class="col-md-7">
            <label class="form-labe">เบอร์โทร</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>">
        </div>

        <div class="col-md-7">
            <label class="form-labe">ที่อยู่</label>
            <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>">
        </div>

        <div class="col-md-6">
            <input type="submit" class="btn btn-primary w-100" value="แก้ไขข้อมูล">
            <center><a class="text-decoration-none  text-secondary mt-2" href="admin.php">ย้อนกลับ</a></center>
        </div>



    </form>
</div>