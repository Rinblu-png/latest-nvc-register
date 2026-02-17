<?php
include('db.php');
include('status.php');

$sql = "SELECT * FROM year";
$query = mysqli_query($conn, $sql);

?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300&display=swap" rel="stylesheet">

<!-- Add Year Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa-solid fa-plus"></i> เพิ่มปีการศึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="adminFile/action/year_add.php" method="POST" class="form-group g-2">
                <div class="modal-body p-5">

                    <label class="form-label">ปีการศึกษา</label>
                    <input type="text" name="year" class="form-control" maxlength="4" placeholder="กรอกปีการศึกษา" required>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn" style="background-color: #3085d6;color:white;" value="ยืนยัน" name="done">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Confirm delete Modal -->
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <center>
                <img class="p-4" width="140" src="https://cdn-icons-png.flaticon.com/512/179/179386.png" alt="">
            </center>
            <h3 class="p-3 text-center">คุณแน่ใจแล้วใช่หรือไม่?</h3>

            <form action="adminFile/action/year_delete.php" method="POST">


                <input type="hidden" name="yearID" id="yearID">


                <div class="modal-body">
                    <center>

                        <button type="submit" style="background-color: #3085d6;color:white;" name="delete" class="btn btn-primary">ยืนยัน</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="row d-flex justify-content-center mt-3">
    <div class="col-md-8">
        <div class="d-flex justify-content-end my-3 p-2">
            <button type="button" class="btn btn-primary rounded shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-plus"></i> เพิ่มปีการศึกษา
            </button>
        </div>


        <table class="table shadow bg-white table-hover table-borderless caption-top">
            <caption class="" style="background-color: #4169E1;">
                <h5 class="p-2 text-white">ปีการศึกษา</h5>
            </caption>
            <thead class="">
                <tr>
                    <th>#</th>
                    <th class="text-start">ปีการศึกษา</th>
                    <th>สถานะ</th>
                    <th class="text-end">จัดการสถานะ</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $status_name = $yearStatus[$row['status']][0];
                    $status_color = $yearStatus[$row['status']][1];
                    $id = $row['id'];
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td class="text-start"><?php echo $row['name'] ?></td>
                        <td><span class="badge <?php echo $status_color; ?>"><?php echo $status_name ?></span></td>

                        <td class="text-end">
                            <a class="btn btn-sm btn-warning" data-bs-target="#edit<?php echo $row['id'] ?>" data-bs-toggle="modal"><i class="fa-solid fa-pen text-white"></i></a>
                            <a class="btn btn-sm btn-danger deletebtn" data-bs-target="#confirm" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>

                    <!-- Edit Year Modal -->
                    <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> แก้ไขปีการศึกษา</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="adminFile/action/year_edit.php" method="POST" class="form-control g-3">
                                    <div class="modal-body p-5">

                                        <label class="form-label">ปีการศึกษา</label>
                                        <input type="hidden" name="yearID" value="<?php echo $row['id'] ?>">
                                        <input type="text" name="year" class="form-control" maxlength="4" value="<?php echo $row['name'] ?>" required>

                                        <br>

                                        <label for="form-label">สถานะ: <span class="badge <?php echo $status_color; ?>"><?php echo $status_name ?></span></label>
                        
                                        <select class="form-select" name="status" required>
                                            <option value="0">เลือกสถานะ</option>
                                            <option value="1">เปิดรับสมัคร</option>
                                            <option value="2">ปิดรับสมัคร</option>
                                        </select>


                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn" style="background-color: #3085d6;color:white;" value="ยืนยัน" name="done">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </tbody>

        </table>
    </div>
</div>


<?php
//นำเข้าไฟล์ round_manage.php = จัดการรอบสมัครเรียน
include('adminFile/round_manage.php');

?>




<script>
    $(document).ready(function() {

        $('.deletebtn').on('click', function() {

            $('#confirm').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            // console.log(data);

            $('#yearID').val(data[0]);

        });
    });
</script>