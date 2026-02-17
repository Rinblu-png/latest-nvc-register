<?php

include('db.php');
include('alert.php');
include('status.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/531c9c430e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/search.css">
    <title>NVC | Search</title>
</head>

<body>


    <div class="p-3 d-flex justify-content-start">
        <a href="index.php"><i class="fa-solid fa-house"></i> กลับหน้าหลัก</a>
    </div>



    <div class="main-content">
        <center><img width="190" src="https://www.nc.ac.th/img/logo.png" alt=""></center>
        <center>
            <h1 class="mt-2 fw-bold">ตรวจสอบผลการสมัครเรียน</h1>
            <h3>วิทยาลัยอาชีวศึกษานครปฐม</h3>
            <p>NAKHON PATHOM VOCATIONAL COLLEGE</p>
        </center>

        <form action="" method="POST" class="row d-flex justify-content-center">

            <div class="col-md-7">
                <div class="input-group">
                    <div class="input-group-text">ค้นหารายชื่อ</div>
                    <input type="search" class="form-control text-center" placeholder="กรอกเลขประจำตัวประชาชน" name="idcard" required>
                    <button type="submit" class="btn btn-primary" name="search"><i class="fas fa-search"></i> </button>
                </div>
            </div>
        </form>

        <div class="row  d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <?php

                if (isset($_POST['search'])) {
                    $idcard = $_POST['idcard'];
                    $sql = "SELECT * FROM student WHERE idcard LIKE '%$idcard%' ";
                    $query = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($query);

                    if ($count > 0) {

                ?>

                        <table class="table bg-white shadow table-hover table-border table-borderless">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-สกุล</th>
                                    <th>เลขประจำตัวประชาชน</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>


                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                                $status_name = $status[$row['status']][0];
                                $status_color = $status[$row['status']][1];
                            ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo "$row[name] $row[lastname]" ?></td>
                                        <td><?php echo $row['idcard'] ?></td>
                                        <td><span class="badge <?php echo $status_color; ?>"><?php echo $status_name ?></span></td>
                                        <td><a class="btn-sm btn-primary" target="_blank" href="print.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-print"></i> ปริ้น</a></td>
                                    </tr>
                                </tbody>

                            <?php } ?>

                        </table>

                <?php
                    } else {
                        echo "<h4 class='text-center text-danger'>ไม่พบข้อมูลที่ค้นหา</h4>";
                    }
                }
                ?>

            </div>
        </div>
    </div>

    


    <!-- Footer -->
    <footer>
        <div class="row d-flex text-white py-3 ms-3">
            <div class="col-md-6 text-start">

                <img src="img/logo-footer.png" alt="" width="250">

                <p class="lead">ที่ตั้ง 90 ถนน เทศา ตำบล พระปฐมเจดีย์ อำเภอ เมือง นครปฐม 73000 </p>
                <p class="lead"> เบอร์โทร : 037-252-790 034-241-853 ต่อ 1105</p>
                <p class="lead">E-mail : saraban@nc.ac.th</p>
            </div>

            <div class="col-md-6 mt-4 text-center">
                <p class="lead"> ผู้ดูแลระบบ : งานศูนย์ข้อมูลสารสนเทศ</p>
                <p class="lead">E-mail : tamayari@nc.ac.th</p>
            </div>

        </div>
    </footer>



    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>