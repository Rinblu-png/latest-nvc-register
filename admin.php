<?php
session_start();
include('db.php');
include('status.php');

//Check login or not login
if (!isset($_SESSION['admin'])) {
    header('location: login.php');
}

$user = $_SESSION['admin'];
$userID = $user['id'];
$name = $user['name'];

//Check admin or user
$usertypeID = $user['usertypeID'];
if(($usertypeID != 1)) {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>

    <div class="main-container d-flex">
        <div class="sidebar  shadow" id="side_nav" style="background-color: #4169E1;">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-center mt-2">
                <h1 class="fs-4"><span class="bg-white text-dark  shadow p-2 head">Admin Dashboard</h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-backward"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <li class="<?php echo !isset($_GET['menu']) && empty($_GET['menu']) ? 'active' : '' ?>"><a href="admin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house"></i> หน้าแรก</a></li>
                <li class="<?php echo isset($_GET['menu']) && $_GET['menu'] == "year_manage" ? 'active' : '' ?>"><a href="admin.php?menu=year_manage" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar"></i> จัดการปีการศึกษา</a></li>
                <li class="<?php echo isset($_GET['menu']) && $_GET['menu'] == "saka_manage" ? 'active' : '' ?>"><a href="admin.php?menu=saka_manage" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                        <span><i class="fa-solid fa-book"></i> จัดการสาขาวิชา</span>
                    </a>
                </li>

                <!-- <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i> Services</a></li>
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i> Customers</a></li> -->

            </ul>
            <hr class="h-color mx-2 text-light">

            <ul class="list-unstyled px-2">
                <li class="<?php echo isset($_GET['menu']) && $_GET['menu'] == "admin_manage" ? 'active' : '' ?>"><a href="admin.php?menu=admin_manage" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-gear"></i> จัดการสมาชิก</a></li>
                <li class="<?php echo isset($_GET['menu']) && $_GET['menu'] == "account" ? 'active' : '' ?>"><a href="admin.php?menu=account" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> ตั้งค่าบัญชี</a></li>
                <li class=""><a href="logout.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
            </ul>



        </div>

        <div class="content">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
                <div class="container-fluid">
                    <div class="d-flex justify-content-center d-md-none d-block">
                        <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-bars"></i></button>
                    </div>

                    <?php 
                    $sql = "SELECT admin.id,usertype.name FROM admin JOIN usertype ON admin.usertypeID = usertype.id WHERE admin.id = $userID";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($query);
                    ?>
                    <h3>ระบบสมัครเรียนวิทยาลัยอาชีวศึกษา</h3>
                     <h5><i class="fa-solid fa-user-gear"></i> <?php echo strtoupper($row['name']) ?></h5>

                </div>


            </nav>

            <div class="dashboard-content px-3 pt-4">
                <?php

                if (isset($_GET['menu'])) {
                    $menu = $_GET['menu'];
                } else {
                    $menu = "";
                }

                switch ($menu) {
                    case "year_manage": {
                            $file = "year_manage.php";
                            break;
                        }
                    case "student_manage": {
                            $file = "student_manage.php";
                            break;
                        }
                    case "saka_manage": {
                            $file = "saka_manage.php";
                            break;
                        }
                    case "edit_student": {
                            $file = "edit_student.php";
                            break;
                        }
                    case "account": {
                            $file = "account.php";
                            break;
                        }
                    case "admin_manage": {
                            $file = "admin_manage.php";
                            break;
                        }
                    case "user_add": {
                            $file = "action/user_add.php";
                            break;
                        }
                        case "user_edit": {
                            $file = "action/user_edit.php";
                            break;
                        }
                    default: {
                            $file = "main.php";
                            break;
                        }
                }
                include("adminFile/$file");

                ?>
            </div>
        </div>
    </div>



    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #eee;
            font-family: 'Chakra Petch', sans-serif;
        }

        #side_nav {

            min-width: 250px;
            max-width: 250px;
            transition: all 0.3s;
        }

        .head {
            border-radius: 10px;
        }

        .content {
            min-height: 100vh;
            width: 100%;
        }

        hr.h-color {
            background: #eee;
        }

        .sidebar li.active {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
        }

        .sidebar li.active a,
        .sidebar li.active a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar li a {
            color: #fff;
        }

        @media(max-width: 767px) {
            #side_nav {
                margin-left: -250px;
                position: fixed;
                min-height: 100vh;
                z-index: 1;

            }

            #side_nav.active {
                margin-left: 0;
            }
        }
    </style>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        $(".sidebar ul li").on('click', function() {
            $(".sidebar ul li.active").removeClass('active');
            $(this).addClass('active');
        });

        $('.open-btn').on('click', function() {
            $('.sidebar').addClass('active');

        });


        $('.close-btn').on('click', function() {
            $('.sidebar').removeClass('active');

        })
    </script>

</body>

</html>