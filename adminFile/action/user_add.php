<?php

include('db.php');
include('alert.php');




?>

<div class="p-3">
    <form action="adminFile/action/user_process.php" method="POST" enctype="multipart/form-data" class="row d-flex justify-content-center shadow bg-white g-3 p-2">

        <h1 class="text-center mt-3">เพิ่มข้อมูลสมาชิก</h1>


        <div class="col-md-7">
            <label class="form-labe">ผู้ใช้งาน</label>
            <input type="text" class="form-control" name="username" required>
        </div>


        <div class="col-md-7">
            <label class="form-labe">รหัสผ่าน</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <?php

        $sql = "SELECT * FROM usertype";
        $query = mysqli_query($conn, $sql);

        ?>
        <div class="col-md-7">
            <label class="form-label">ระดับผู้ใช้งาน</label>
            <select name="usertypeID" class="form-select">

                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>

                    <option value="<?php echo $row['id'] ?>"><?php echo strtoupper($row['name']) ?></option>

                <?php } ?>
            </select>
        </div>


        <div class="col-md-7">
            <label class="form-labe">ชื่อจริง</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="col-md-7">
            <label class="form-labe">นามสกุล</label>
            <input type="text" class="form-control" name="lastname" required>
        </div>

        <div class="col-md-7">
            <label class="form-labe">อีเมล</label>
            <input type="text" class="form-control" name="email" required>
        </div>

        <div class="col-md-7">
            <label class="form-labe">เบอร์โทร</label>
            <input type="text" class="form-control" name="phone" required>
        </div>

        <div class="col-md-7">
            <label class="form-labe">ที่อยู่</label>
            <input type="text" class="form-control" name="address" required>
        </div>


        <div class="col-md-6">
            <input type="submit" name="add" class="btn btn-dark text-white w-100" value="เพิ่มข้อมูล">
            <center><a class="text-decoration-none  text-secondary mt-2" href="admin.php?menu=admin_manage">ย้อนกลับ</a></center>
        </div>



    </form>
</div>

