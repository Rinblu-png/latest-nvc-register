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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Login | Admin</title>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card shadow">
                    <center><img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" style="width: 170px;" class="mt-3"></center>
                    <h4 class="card-title text-center mt-3">เข้าสู่ระบบ | สำหรับเจ้าหน้าที่</h4>
                    <div class="card-body">

                        <form action="checklogin.php" method="POST">
                            <label for="">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">

                            <label for="">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">

                            <input type="submit" class="btn btn-primary w-100 mt-3" value="เข้าสู่ระบบ">

                            <div class="d-flex justify-content-center">
                                <a class="mt-2 text-center" href="index.php">กลับหน้าหลัก</a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        * {
            font-family: 'Kanit';
        }

        body,
        html {
            background: rgb(22, 147, 255);
            background: linear-gradient(90deg, rgba(22, 147, 255, 1) 0%, rgba(1, 160, 255, 1) 35%, rgba(66, 76, 241, 1) 100%);
        }

        h4 {
            font-weight: 888;
        }

        .container {
            margin-top: 10%;
        }
        .card {
            border-radius: 16px;
        }
        .btn {
            border-radius: 16px;
        }
        a {
            text-decoration: none;
            color: gray;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>