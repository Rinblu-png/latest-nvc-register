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
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/531c9c430e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <title>NVC | Test</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark py-3">
        <div class="container-fluid">
            <img src="https://nc.ac.th/img/logo.png" class="img-fluid" style="width: 50px;margin-right: 10px;" alt="">
            <a class="navbar-brand" href="#">วิทยาลัยอาชีวศึกษานครปฐม</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#register"><img src="img/icon/register.png" width="30"> สมัครเรียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php"><img src="img/icon/search.png" width="30"> ตรวจสอบผล</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-address-card"></i> ติดต่อ</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>


    <!-- Header section -->

    <div class="container-fluid header-bg text-secondary  text-center shadow">
        <img class="logo" src="https://nc.ac.th/img/logo.png" width="250">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white" style="text-shadow: 1px 2px 6px rgba(0,0,0,0.67);">เปิดรับสมัครนักศึกษาใหม่ ปีการศึกษา 2567</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-4 mb-4 text-white" style="text-shadow: 1px 2px 6px rgba(0,0,0,0.67);">วิทยาลัยอาชีวศึกษานครปฐม จังหวัดนครปฐม</p>
                <p class="fs-5 mb-4 text-white" style="text-shadow: 1px 2px 6px rgba(0,0,0,0.67);">สถานศึกษารางวัลพระราชทาน ปีการศึกษา พ.ศ.2537, พ.ศ.2549 และ พ.ศ. 2562</p>
                <!-- <div data-aos="fade-up" data-aos-delay="350">
                    <img class="img-fluid" src="https://nc.ac.th/nvc/wp-content/uploads/2023/11/404281052_1209594213299275_5971195227193757843_n.jpg">
                </div> -->
            </div>
        </div>
    </div>

    <!-- Text scrolling -->

    <div class="container">
        <div class="row d-flex justify-content-center p-3">
            <div class="col-md-10 bg-white">
                <marquee data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" style="padding: 10px;background: rgba(255, 255, 255, 0.17);border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.7px);-webkit-backdrop-filter: blur(6.7px);border: 1px solid rgba(255, 255, 255, 0.01);" class="fs-3">“ศูนย์การเรียนรู้ทักษะวิชาชีพ เทคโนโลยี และนวัตกรรม นำสู่สากล”</marquee>
            </div>
        </div>

        <!-- Image register -->
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-10 zoom-img">
                <div data-aos="fade-up" data-aos-delay="600">
                    <img class="img-fluid shadow" src="https://nc.ac.th/nvc/wp-content/uploads/2023/11/404281052_1209594213299275_5971195227193757843_n.jpg">
                </div>
            </div>
        </div>

        <!-- Register Zone -->
        <div class="row d-flex justify-content-center mt-3" id="register">
            <div class="col-md-10">
                <h1 data-aos="fade-up" data-aos-delay="350" class="text-start mt-3 shadow p-2 text-round text-white" style="background: rgb(22, 147, 255);background: linear-gradient(90deg, rgba(22, 147, 255, 1) 0%, rgba(1, 160, 255, 1) 35%, rgba(66, 76, 241, 1) 100%);border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.7px);-webkit-backdrop-filter: blur(6.7px);border: 1px solid rgba(255, 255, 255, 0.01);"><img src="img/icon/pen.png" width="40"> กรอกใบสมัคร</h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center mb-5">
            <?php
            $sqlRound = "SELECT * FROM round WHERE status = 'open' ";
            $queryRound = mysqli_query($conn, $sqlRound);
            while ($round = mysqli_fetch_array($queryRound)) {
            ?>
                <div class="col-md-5">
                    <a href="form/form.php?roundID=<?php echo $round['id'] ?>">
                        <div class="card shadow h-100 mb-2 card-reg" data-aos="zoom-in" data-aos-delay="600">
                            <div class="card-title text-center"><img src="img/icon/paper.png"></div>
                            <div class="card-body display-4 text-center text-dark">
                                <?php echo $round['name'] ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

    </div>

    <!-- Register Info -->

    <div class="container-fluid bg-light shadow mb-5 px-5">

        <div class="row align-items-center justify-content-center g-5 text-center">

            <div class="col-md-4" data-aos="fade-right" data-aos-duration="2000">
                <h1 class="display-5 fw-bold lh-1">ข้อมูลการสมัครเรียน</h1>
                <p class="lead">เป็นผู้สำเร็จการศึกษา หรือเทียบเท่า</p>
                <p class="lead">กำลังเรียนอยู่ชั้น ม.3 ม.6 ปวช.3 หรือ ป.ตรี </p>
                <p class="lead">เป็นผู้มีความถนัด ความสนใจในสาขาวิชาที่สมัคร</p>
            </div>

            <div class="col-md-4" data-aos="fade-left" data-aos-duration="2000">
                <h1 class="display-5 fw-bold lh-1">เอกสาร</h1>
                <p class="lead">ไฟล์รูปนักเรียน 2 นิ้ว, รูปวุฒิการศึกษา</p>
                <p class="lead">ไฟล์สำเนาบัตรประชาชน, สำเนาทะเบียนบ้าน</p>
            </div>

            <div class="col-md-4">
                <img src="img/icon/student.png" class="d-block mx-lg-auto img-fluid p-5" width="400" height="500" data-aos="zoom-in-right" data-aos-duration="2000">
            </div>
        </div>

    </div>


    <!-- All Saka -->
    <div class="container mb-3">
        <h1 class=" text-start text-white shadow bg-white p-3" data-aos="fade-up" data-aos-duration="2000" style="background: rgb(22, 147, 255);background: linear-gradient(90deg, rgba(22, 147, 255, 1) 0%, rgba(1, 160, 255, 1) 35%, rgba(66, 76, 241, 1) 100%);border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.7px);-webkit-backdrop-filter: blur(6.7px);border: 1px solid rgba(255, 255, 255, 0.01);"><img src="img/icon/learning.png" width="50"> สาขาวิชาทั้งหมด</h1>
        <div class="row d-flex justify-content-center text-start">

            <?php
            $sql = "SELECT * FROM saka WHERE vcID = 1";
            $query = mysqli_query($conn, $sql);
            ?>
            <div class="col-md-4 mb-2">
                <div class="card h-100 shadow" data-aos="zoom-in" data-aos-duration="2000">
                    <h2 class="card-header text-white bg-dark" style="border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.7px);-webkit-backdrop-filter: blur(6.7px);border: 1px solid rgba(255, 255, 255, 0.01);"><i class="fa-solid fa-pen"></i> ระดับปวช.</h2>
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
            $sql = "SELECT * FROM saka WHERE vcID = 2";
            $query = mysqli_query($conn, $sql);
            ?>
            <div class="col-md-4 mb-2">
                <div class="card h-100 shadow" data-aos="zoom-in" data-aos-duration="2000">
                    <h2 class="card-header text-white bg-dark" style="border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.7px);-webkit-backdrop-filter: blur(6.7px);border: 1px solid rgba(255, 255, 255, 0.01);"><i class="fa-solid fa-cloud"></i> ระดับปวส.</h2>
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
                <div class="card h-100 shadow" data-aos="zoom-in" data-aos-duration="2000">
                    <h2 class="card-header text-white bg-dark" style="border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.7px);-webkit-backdrop-filter: blur(6.7px);border: 1px solid rgba(255, 255, 255, 0.01);"><i class="fa-solid fa-link"></i> ระดับป.ตรี</h2>
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

    <div class="container mt-3 mb-3" data-aos="fade-left" data-aos-delay="350">
        <div class="row d-flex justify-content-center text-start">
            <h1 class="bg-white shadow p-3 text-white" style="background: rgb(22, 147, 255);background: linear-gradient(90deg, rgba(22, 147, 255, 1) 0%, rgba(1, 160, 255, 1) 35%, rgba(66, 76, 241, 1) 100%);border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.7px);-webkit-backdrop-filter: blur(6.7px);border: 1px solid rgba(255, 255, 255, 0.01);"><img src="img/icon/video.png" width="50"> วิดีโอแนะนำ</h1>
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

    <!-- Why do we need online register -->
    <div class="container mt-2 mb-4 p-4 "  data-aos="fade-up" data-aos-duration="1500">
        <h1 class="text-start p-3 text-white why" style="background: rgb(22, 147, 255);background: linear-gradient(90deg, rgba(22, 147, 255, 1) 0%, rgba(1, 160, 255, 1) 35%, rgba(66, 76, 241, 1) 100%);border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.7px);-webkit-backdrop-filter: blur(6.7px);border: 1px solid rgba(255, 255, 255, 0.01);"><img src="img/icon/why.png" width="60"> ทำไมต้องสมัครเรียนออนไลน์?</h1>
        <div class="row p-4 bg-white shadow" style="border-radius: 16px;box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);backdrop-filter: blur(6.7px);-webkit-backdrop-filter: blur(6.7px);border: 1px solid rgba(255, 255, 255, 0.01);">
            <div class="col-md-4">
                <center>
                    <img src="img/icon/like.png" width="150">
                    <h3 class="mt-2">สะดวกต่อการใช้งาน</h3>
                </center>
            </div>
            <div class="col-md-4">
                <center>
                    <img src="img/icon/clock.png" width="150">
                    <h3 class="mt-2">ประหยัดเวลาในการเดินทาง</h3>
                </center>
            </div>
            <div class="col-md-4">
                <center>
                    <img src="img/icon/love.png" width="150">
                    <h3 class="mt-2">รวดเร็ว ทันใจ</h3>
                </center>
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