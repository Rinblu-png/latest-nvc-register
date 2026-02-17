<?php


$userID = $_GET['id'];

$sql = "SELECT admin.id,admin.username,admin.name,admin.lastname,admin.email,admin.phone,admin.address,usertype.id AS utid,usertype.name AS utname FROM admin JOIN usertype ON admin.usertypeID = usertype.id WHERE admin.id = $userID";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);


?>


<div class="p-3">
    <form action="adminFile/action/user_process.php" method="POST" enctype="multipart/form-data" class="row d-flex justify-content-center shadow bg-white g-3 p-2">

        <h1 class="text-center mt-3">แก้ไขข้อมูลสมาชิก</h1>

        <input type="hidden" name="oid" value="<?php echo $userID; ?>">

        <div class="col-md-7">
            <label class="form-labe">ผู้ใช้งาน</label>
            <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" >
        </div>


        <div class="col-md-7">
            <label class="form-label">รหัสผ่านใหม่</label>
            <input type="password" class="form-control" name="npassword" >
        </div>

        <div class="col-md-7">
            <label class="form-label">ยืนยันรหัสผ่าน</label>
            <input type="password" class="form-control" name="rpassword" >
        </div>

        <?php

        $sqlType = "SELECT * FROM usertype";
        $queryType = mysqli_query($conn, $sqlType);

        ?>
        <div class="col-md-7">
            <label class="form-label">ระดับผู้ใช้งาน</label>
            <select name="usertypeID" class="form-select" >
            <option value="<?php echo $row['utid'] ?>" selected><?php echo "ระดับตอนนี้: " . ucfirst($row['utname']) ?></option>
                <?php
                while ($rowType = mysqli_fetch_array($queryType)) {
                ?>

                    <option value="<?php echo $rowType['id'] ?>"><?php echo ucfirst($rowType['name']) ?></option>

                <?php } ?>
            </select>
        </div>


        <div class="col-md-7">
            <label class="form-label">ชื่อจริง</label>
            <input type="text" class="form-control" name="name"  value="<?php echo $row['name'] ?>" >
        </div>

        <div class="col-md-7">
            <label class="form-label">นามสกุล</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'] ?>" >
        </div>

        <div class="col-md-7">
            <label class="form-labe">อีเมล</label>
            <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" >
        </div>

        <div class="col-md-7">
            <label class="form-label">เบอร์โทร</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>" >
        </div>

        <div class="col-md-7">
            <label class="form-label">ที่อยู่</label>
            <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>" >
        </div>


        <div class="col-md-6">
            <input type="submit" name="edit" class="btn btn-primary text-white w-100" value="แก้ไขข้อมูล">
        </div>



    </form>
</div>