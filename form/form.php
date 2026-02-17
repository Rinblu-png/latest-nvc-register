<?php

include("../db.php");
include("../alert.php");
$roundID = $_GET['roundID'];

$sqlRound =  "SELECT * FROM round WHERE id = $roundID ";
$queryRound = mysqli_query($conn,$sqlRound);
$round = mysqli_fetch_array($queryRound);



if($round['status'] !== "open") {
    failed('../index.php','รอบ' . $round['name'] . 'ปิดรับสมัครแล้ว!');
}


if ($roundID == 1) {
    $roundName = "โควต้า";
    $textColor = "text-primary";

} else if ($roundID == 2) {
    $roundName = "ปกติ";
    $textColor = "text-success";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/531c9c430e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">


    <link rel="stylesheet" href="../css/datepicker.css">
    <script src="../js/bootstrap-datepicker-thai.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/locales/bootstrap-datepicker.th.js"></script>
    <link rel="stylesheet" href="../css/index.css">

    <title>Register | NVC</title>
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
                        <a class="nav-link active" aria-current="page" href="../index.php"><img src="../img/icon/register.png" width="30"> สมัครเรียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../search.php"><img src="../img/icon/search.png" width="30"> ตรวจสอบผล</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center align-items-center mt-4">
            <div class="col-md-12">
                <div class="card shadow bg-white">

                    <h1 class="card-header bg-info text-white"><i class="fa-solid fa-file"></i> รายละเอียดใบสมัคร</h1>
                    <div class="card-body text-center fs-4">
                        <h1>วิทยาลัยอาชีวศึกษานครปฐม</h1>
                        <p>
                            ใบสมัครเรียน เป็นนักเรียน-นักศึกษา
                            <span>รอบ</span>
                            <span class="<?php echo $textColor; ?>"><strong><?php echo $roundName; ?></strong></span>
                            <br>
                            ระดับประกาศนียบัตรวิชาชีพ (ปวช.) ระดับประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)
                            <br>
                            และระดับปริญญาตรีสายโทคโนโลยีหรือสายปฎิบัติการ (ทล.บ.)
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Register Form -->
    <div class="container mt-4 p-3 shadow bg-white mb-5" data-aos="fade-down">
        <form action="processForm.php" method="POST" class="row g-3 d-flex justify-content-center align-items-center" enctype="multipart/form-data">
            <h2>กรอกรายละเอียดที่นี่</h2>

            <!-- rounID get and POST to processForm.php -->
            <input type="hidden" name="roundID" value="<?php echo $roundID; ?>">

            <div class="col-md-12">
                <div class="d-flex justify-content-end ">
                    <img style="width: 151px;height: 197px;" id="previewImg1" class="img-fluid shadow border border-white" src="../img/photoPreview.png">
                </div>

                <div style="font-size: 20px;" class="d-flex justify-content-end">รูปภาพนักเรียน 2 นิ้ว</div>

                <label class="form-label">รูปภาพนักเรียน 2 นิ้ว</label>
                <input type="file" class="form-control" accept="image/*" id="imgInput1" name="img[]" required>
            </div>

            <script>
                let imgInput1 = document.querySelector("#imgInput1");
                let previewImg1 = document.querySelector("#previewImg1");
                imgInput1.onchange = evt => {
                    const [file] = imgInput1.files;
                    if (file) {
                        previewImg1.src = URL.createObjectURL(file);
                    }
                }
            </script>

            <div class="col-md-6">
                <label class="form-label">ชื่อจริง</label>
                <input type="text" class="form-control" name="name" placeholder="ชื่อจริงภาษาไทย" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">นามสกุล</label>
                <input type="text" class="form-control" name="lastname" placeholder="นามสกุลภาษาไทย" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">อายุ</label>
                <input type="text" class="form-control" name="age" placeholder="อายุ" maxlength="3" required>
            </div>


            <div class="col-md-6">
                <label class="form-label">วันเกิด</label>
                <input id="datepicker" class="form-control" name="birthday" type="text" data-provide="datepicker" data-date-language="th-th" required>
            </div>


            <div class="col-md-6">
                <label class="form-label">เชื้อชาติ</label>
                <input type="text" class="form-control" name="ethnicity" placeholder="เชื้อชาติ" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">สัญชาติ</label>
                <input type="text" class="form-control" name="nationality" placeholder="สัญชาติ" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">ศาสนา</label>
                <input type="text" class="form-control" name="religion" placeholder="ศาสนา" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">เลขประจำตัวประชาชน</label>
                <input type="text" class="form-control" name="idcard" placeholder="เลขประจำตัวประชาชน 13 หลัก" maxlength="13" required>
            </div>


            <div class="col-md-3">
                <label class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" name="housenumber" placeholder="บ้านเลขที่" required>
            </div>


            <div class="col-md-3">
                <label class="form-label">หมู่</label>
                <input type="text" class="form-control" name="moo" placeholder="หมู่" required>
            </div>


            <div class="col-md-3">
                <label class="form-label">ถนน</label>
                <input type="text" class="form-control" name="road" placeholder="ถนน" required>
            </div>


            <div class="col-md-3">
                <label class="form-label">ตำบล</label>
                <input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="ตำบล" required>
            </div>


            <div class="col-md-3">
                <label class="form-label">อำเภอ</label>
                <input type="text" class="form-control" id="district" name="district" placeholder="อำเภอ" required>
            </div>


            <div class="col-md-3">
                <label class="form-label">จังหวัด</label>
                <input type="text" class="form-control" id="province" name="province" placeholder="จังหวัด" required>
            </div>


            <div class="col-md-3">
                <label class="form-label">รหัสไปรษณีย์</label>
                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="รหัสไปรษณีย์" required>
            </div>


            <div class="col-md-3">
                <label class="form-label">เบอร์โทร</label>
                <input type="text" class="form-control" name="phone" maxlength="10" placeholder="เบอร์โทรติดต่อ" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">กำลังศึกษาอยู่ในระดับ</label>
                <select name="studying" class="form-select" required>
                    <option value="" selected>เลือกระดับชั้น</option>
                    <option value="ม.3">ม.3</option>
                    <option value="ม.6">ม.6</option>
                    <option value="ปวช.3">ปวช.3</option>
                    <option value="ปวส.2">ปวส.2</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">โรงเรียน/วิทยาลัย</label>
                <input type="text" class="form-control" name="schoolname" placeholder="ชื่อโรงเรียนหรือวิทยาลัย" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" name="schooladdress" placeholder="ที่อยู่ของโรงเรียนหรือวิทยาลัย" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">สาขางาน/กรณีศึกษาอยู่ระดับชั้น ปวช.และปวส.</label>
                <input type="text" class="form-control" name="yoursaka" placeholder="กรณีกำลังศึกษาอยู่ ปวชหรือปวส">
            </div>

            <div class="col-md-6">
                <label class="form-label">ผลงาน/รางวัลที่ได้รับ</label>
                <input type="text" class="form-control" name="workings" placeholder="กรอกหากมีผลงาน">
            </div>

            <div class="col-md-6">
                <label class="form-label">ความสามารถพิเศษ</label>
                <input type="text" class="form-control" name="talent" placeholder="กรอกหากมีความสามารถพิเศษ">
            </div>

            <div class="col-md-6">
                <label class="form-label">เกรดเฉลี่ยสะสม</label>
                <input type="text" class="form-control" name="gpa" maxlength="4" placeholder="เกรดเฉลี่ยสะสม" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">มีความประสงค์ขอศึกษาต่อในระดับชั้น</label>
                <select class="form-select" id="vc" name="vcID" required>
                    <option value="" selected>เลือกระดับชั้น</option>
                    <option value="1">ปวช.</option>
                    <option value="2">ปวส.</option>
                    <option value="3">ป.ตรี</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">สาขาวิชา/สาขางาน</label>
                <select class="form-select" name="sakaID" id="saka">
                    <option selected>เลือกสาขาวิชา</option>

                </select>
            </div>

            <?php
            $sql = "SELECT * FROM year WHERE status = 'open' ";
            $query = mysqli_query($conn, $sql);
            ?>
            <div class="col-md-6">
                <label for="form-label">ปีการศึกษา</label>
                <select class="form-select" name="yearID" required>

                    <?php
                    while ($year = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $year['id'] ?>"><?php echo $year['name']; ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="col-md-12">
                <label class="form-label">วุฒิการศึกษา</label>
                <input type="file" name="img[]" class="form-control" required>
            </div>

            <div class="col-md-12">
                <label class="form-label">สำเนาบัตรประจำตัวประชาชน</label>
                <input type="file" name="img[]" class="form-control" required>
            </div>

            <div class="col-md-12">
                <label class="form-label">สำเนาทะเบียนบ้าน</label>
                <input type="file" name="img[]" class="form-control" required>
            </div>



            <div class="col-md-12 mt-3">
                <p class="text-success lead text-center">สามารถติดตามและตรวจสอบรายชื่อผู้มีสิทธิ์เข้าสอบ ได้ที่ <a href="https://www.nc.ac.th">www.nc.ac.th</a></p>
            </div>


            <div class="col-md-6">
                <input type="submit" name="submit" value="ส่งใบสมัคร" class="btn btn-primary w-100">
                <a class="text-secondary mt-2 text-decoration-none d-flex justify-content-center" href="../index.php">ย้อนกลับ</a>
            </div>

        </form>
    </div>


    <!-- Footer -->
    <footer>
        <div class="row d-flex text-white py-3 ms-3">
            <div class="col-md-6 text-start">

                <img src="../img/logo-footer.png" alt="" width="250">

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


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            background-color: #f5f5f5;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Kanit';
        }

        footer .lead {
            font-size: 17px;
        }

        footer {
            flex: 0 0 auto;

            background-color: #0039C9;
        }

        @media only screen and (max-width: 576px) {
            footer .lead {
                margin-top: 10px;
                float: left;
            }

        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        $(document).ready(function() {
            $("#vc").on("change", function() {

                var vcID = $("#vc").val();
                $.ajax({
                    url: "../getSaka.php",
                    type: "POST",
                    data: {
                        id: vcID
                    },
                    success: function(mydata) {
                        $("#saka").html(mydata);
                    }
                })
            })
        })
    </script>

    <script>
        $.Thailand({
            $district: $("#subdistrict"), // input ของตำบล
            $amphoe: $("#district"), // input ของอำเภอ
            $province: $("#province"), // input ของจังหวัด
            $zipcode: $("#postcode") // input ของรหัสไปรษณีย์
        });
    </script>


    <script>
        $(function() {
            $("#datepicker").datepicker({
                language: 'th-th',
                autoclose: true
            });
        });
    </script>

</body>

</html>