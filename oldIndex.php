<?php

include('db.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/531c9c430e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/oldIndex.css">
    <title>NVC | Test</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow"  style="background-color: #0039C9;">
        <div class="container-fluid">
            <img src="https://nc.ac.th/img/logo.png" style="width: 50px;margin-right: 10px;" alt="">
            <a class="navbar-brand" href="#">วิทยาลัยอาชีวศึกษานครปฐม</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-right-to-bracket"></i> สมัครเรียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php"><i class="fa-solid fa-magnifying-glass"></i> ตรวจสอบผล</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-address-card"></i> ติดต่อ</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>



    <!-- Text center hero -->

    <div class="container">
        <div class="px-4 mt-5 text-center">
            <h1 data-aos="fade-up" data-aos-delay="350" class="display-5 text-body-emphasis fw-bold">เปิดรับสมัครนักศึกษาใหม่ ปีการศึกษา 2567</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-3" data-aos="fade-up" data-aos-delay="350"> วิทยาลัยอาชีวศึกษานครปฐม จังหวัดนครปฐม</p>
                <p class="" data-aos="fade-up" data-aos-delay="350">สถานศึกษารางวัลพระราชทาน ปีการศึกษา พ.ศ.2537, พ.ศ.2549 และ พ.ศ. 2562</p>
            </div>
        </div>
    </div>

    <!-- Img -->
    <div class="container d-flex justify-content-center">
        <div data-aos="fade-up" data-aos-delay="350">
            <img class="img-fluid shadow" src="https://nc.ac.th/nvc/wp-content/uploads/2023/11/404281052_1209594213299275_5971195227193757843_n.jpg" alt="">
        </div>
    </div>

    <!-- Register Informationn -->

    <div class="container mt-5" data-aos="flip-left" data-aos-delay="350">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8 p-3">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h2 class="card-title display-6 fw-bold">ข้อมูลเกี่ยวกับการสมัคร</h2>

                        <p class="lead fw-bold">ระดับชั้น ปวช.</p>
                        <p>เป็นผู้สำเร็จการศึกษาชั้น ม.3 หรือเทียบเท่า</p>
                        <p>กำลังเรียนอยู่ชั้น ม.3 และจะจบหลักสูตร</p>
                        <p>เป็นผู้มีความถนัด ความสนใจในสาขาวิชาที่สมัคร</p>
                        <hr data-aos="flip-right" data-aos-delay="350">

                        <h2 class="lead fw-bold">ระดับชั้น ปวส.</h2>
                        <p>เป็นผู้สำเร็จการศึกษาชั้น ม.6 ปวช.3 หรือเทียบเท่า</p>
                        <p>กำลังเรียนอยู่ชั้น ม.6 ปวช.3 หรือเทียบเท่า </p>
                        <p>เป็นผู้มีความถนัด ความสนใจในสาขาวิชาที่สมัคร</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Register zone -->

    <div class="container" data-aos="fade-up" data-aos-delay="450">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <center><img style="width: 200px;" src="https://static.vecteezy.com/system/resources/previews/014/440/927/original/document-icon-design-in-blue-circle-png.png" alt=""></center>
                    <div class="card-body text-center">
                        <h2 class="card-title fw-bold text-center">กรอกใบสมัครเรียน</h2>
                        <?php
                        $roundSql = "SELECT * FROM round WHERE status = 'open' ";
                        $queryRound = mysqli_query($conn, $roundSql);

                        ?>
                        <center>
                        <form action="checkForm.php" method="POST">
                            <select name="roundID" id="" class="form-select" style="width:300px" required>
                                <option value="" selected>เลือกรอบสมัคร</option>
                                <?php
                                while ($round = mysqli_fetch_array($queryRound)) {
                                ?>
                                    <option value="<?php echo $round['id'] ?>"><?php echo $round['name'] ?></option>

                                <?php } ?>

                            </select>
                            <input type="submit" class="btn btn-primary mt-2" style="width:300px" value="สมัครเรียน">
                        </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- All Saka -->
    <div class="container">
        <h1 class="mt-5 text-center" data-aos="fade-up" data-aos-delay="350"> สาขาวิชาทั้งหมด</h1>
        <div class="row d-flex justify-content-center text-start mt-4 ">

            <?php
            $sql = "SELECT * FROM saka WHERE vcID = 1";
            $query = mysqli_query($conn, $sql);
            ?>
            <div class="col-md-4 mb-2">
                <div class="card h-100 shadow rounded" data-aos="flip-down" data-aos-delay="350">
                    <h2 class="card-header bg-primary text-white"><i class="fa-solid fa-pen"></i> ระดับปวช.</h2>
                    <div class="card-body">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <p>•  <?php echo "สาขา" . $row['name']; ?></p>

                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM saka WHERE vcID = 2";
            $query = mysqli_query($conn, $sql);
            ?>
            <div class="col-md-4 mb-2">
                <div class="card h-100 shadow" data-aos="flip-down" data-aos-delay="350">
                    <h2 class="card-header bg-primary text-white"><i class="fa-solid fa-cloud"></i> ระดับปวส.</h2>
                    <div class="card-body">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <p>• <?php echo "สาขา" . $row['name']; ?></p>

                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM saka WHERE vcID = 3";
            $query = mysqli_query($conn, $sql);
            ?>
            <div class="col-md-4 mb-2">
                <div class="card h-100 shadow" data-aos="flip-down" data-aos-delay="350">
                    <h2 class="card-header bg-primary text-white"><i class="fa-solid fa-link"></i> ระดับป.ตรี</h2>
                    <div class="card-body">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <p>• <?php echo "สาขา" . $row['name']; ?></p>

                        <?php } ?>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Video Present -->

    <div class="container mt-4" data-aos="fade-left" data-aos-delay="350">
        <div class="row d-flex justify-content-center text-center">
            <h2>Video Present</h2>
            <div class="col-md-6">

                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/C7Yth4gsvk4?si=FiVhuB_u4a_XEewk" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-md-6">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/csdRvhhUdnE?si=pYXRLwk1zwzssDNY" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="" style="background-color: #0039C9;">
        <div class="row d-flex text-white py-3">
            <div class="col-md-6 text-start">

                <img src="https://nc.ac.th/nvc/wp-content/uploads/2023/07/logo5-300x64.png" alt="" width="370">

                <p class="lead">ที่ตั้ง 90 ถนน เทศา ตำบล พระปฐมเจดีย์ อำเภอ เมือง นครปฐม 73000 </p>
                <p class="lead"> เบอร์โทร : 037-252-790 034-241-853 ต่อ 1105</p>
                <p class="lead">E-mail : saraban@nc.ac.th</p>
            </div>

            <div class="col-md-6 mt-4">
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