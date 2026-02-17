<?php

$sql = "SELECT * FROM student";
$query = mysqli_query($conn, $sql);
$allStudent = mysqli_num_rows($query);


?>

<h2 class="text-center mt-3">รายงานการสมัคร นักศึกษาใหม่</h2>
<div class="row d-flex justify-content-center mt-4 p-4">
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title text-center">จำนวนการสมัครทั้งหมด</h4>
                <div class="card-text d-flex justify-content-between">
                    <div class="lead display-5"><?php echo $allStudent; ?> </div>
                    <i class="fa-solid fa-graduation-cap display-5 text-dark"></i>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $allStudent ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $sql = "SELECT * FROM student WHERE vcID = 1";
    $query = mysqli_query($conn, $sql);
    $vc1 = mysqli_num_rows($query);
    ?>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title text-center">นักศึกษาระดับ ปวช.</h4>
                <div class="card-text d-flex justify-content-between">
                    <div class="lead display-5"><?php echo $vc1; ?> </div>
                    <i class="fa-solid fa-user display-5 text-dark"></i>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $vc1 ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>


    <?php
    $sql = "SELECT * FROM student WHERE vcID = 2";
    $query = mysqli_query($conn, $sql);
    $vc2 = mysqli_num_rows($query);
    ?>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title text-center">นักศึกษาระดับ ปวส.</h4>
                <div class="card-text d-flex justify-content-between">
                    <div class="lead display-5"><?php echo $vc2; ?> </div>
                    <i class="fa-solid fa-user-tie display-5 text-dark"></i>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $vc2 ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $sql = "SELECT * FROM student WHERE vcID = 3";
    $query = mysqli_query($conn, $sql);
    $vc3 = mysqli_num_rows($query);
    ?>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title text-center">นักศึกษาระดับ ป.ตรี</h4>
                <div class="card-text d-flex justify-content-between">
                    <div class="lead display-5"><?php echo $vc3; ?> </div>
                    <i class="fa-solid fa-users display-5 text-dark"></i>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $vc3 ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Table Student -->

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive-md">
            <table class="table bg-white shadow caption-top table-responsive-md table-hover table-borderless" id="main">
                <caption class="bg-dark">
                    <h5 class="p-2 text-white">ตารางนักเรียน-นักศึกษา</h5>
                </caption>
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>ชื่อ-สกุล</th>
                        <th>เบอร์โทร</th>
                        <th>ระดับชั้น</th>
                        <th>รอบสมัคร</th>
                        <th>ปีการศึกษา</th>
                        <th>สถานะ</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>

                <?php
                $sqlStudent = "SELECT student.id,student.name,student.lastname,student.phone,
            student.idcard,student.status,student.photo_img,student.housenumber,student.moo,student.subdistrict,student.road,student.district,student.province,student.postcode,
            round.name AS roundname,vc.name AS vcname ,year.name AS year
                FROM student JOIN year ON student.yearID = year.id 
                JOIN vc ON student.vcID = vc.id
                JOIN round ON student.roundID = round.id ORDER BY student.id";
                ?>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, $sqlStudent);

                    while ($row = mysqli_fetch_array($query)) {
                        $status_name = $status[$row['status']][0];
                        $status_color = $status[$row['status']][1];
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td>
                                <img width="50" src="<?php echo "upload_img/$row[idcard]/$row[photo_img]" ?>" alt="">
                                <?php echo "$row[name] $row[lastname] " ?>
                            </td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['vcname'] ?></td>
                            <td><?php echo $row['roundname'] ?></td>
                            <td><?php echo $row['year'] ?></td>
                            <td><span class="badge <?php echo $status_color; ?>"><?php echo $status_name ?></span></td>

                            <td>

                                <a class="btn btn-sm btn-info text-white" href="user.php?menu=view_student&id=<?php echo $row['id'] ?>"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .card {
        height: 11rem;
        margin-bottom: 20px;
    }
</style>

<link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>

<script>
    $(document).ready(function() {

        $('.deletebtn').on('click', function() {

            $('#confirm').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            // console.log(data);

            $('#studentID').val(data[0]);

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#main').DataTable({
            "language": {
                "lengthMenu": "จำนวน _MENU_ หน้า",
                "zeroRecords": "",
                "info": "แสดงหน้า _PAGE_ ถึง _PAGES_",
                "infoEmpty": "ไม่พบข้อมูลที่บันทึก",
                "search": "ค้นหา:",
                "infoFiltered": "",
                "paginate": {
                    "first": "แรก",
                    "last": "สุดท้าย",
                    "next": "ถัดไป",
                    "previous": "กลับ"
                }
            }
        });
    });
</script>