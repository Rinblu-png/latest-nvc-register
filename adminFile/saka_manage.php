<?php

include('db.php');
include('alert.php');
$sql = "SELECT * FROM vc";
$query = mysqli_query($conn, $sql);

?>

<!-- Confirm delete Modal -->
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <center>
                <img class="p-4" width="140" src="https://cdn-icons-png.flaticon.com/512/179/179386.png" alt="">
            </center>
            <h3 class="p-3 text-center">คุณแน่ใจแล้วใช่หรือไม่?</h3>

            <form action="adminFile/action/saka_delete.php" method="POST">


                <input type="hidden" name="sakaID" id="sakaID">


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


<!-- Add Saka Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa-solid fa-plus"></i> เพิ่มสาขาวิชา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="adminFile/action/saka_add.php" method="POST" class="form-group g-2">
                <div class="modal-body p-5">

                <label class="form-label">สาขาวิชาระดับ</label>
                <select class="form-select" id="vc" name="vcID" required>
                    <option selected>เลือกระดับชั้น</option>
                    <option value="1">ปวช.</option>
                    <option value="2">ปวส.</option>
                    <option value="3">ป.ตรี</option>
                </select>

                <label class="form-label">ชื่อสาขาวิชา</label>
                <input type="text" name="addSaka" class="form-control" required>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn" style="background-color: #3085d6;color:white;" value="ยืนยัน" name="done">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="row d-flex justify-content-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary text-white shadow" data-bs-target="#add" data-bs-toggle="modal"><i class="fa-solid fa-plus"></i> เพิ่มสาขาวิชา</button>
        </div>

        <?php
        while ($row = mysqli_fetch_array($query)) {
            $vcID = $row['id'];
            $sql = "SELECT * FROM saka WHERE vcID = $vcID";
            $querySaka = mysqli_query($conn, $sql);

        ?>
            <table class="table bg-white shadow table-hover table-borderless caption-top" id="saka<?php echo $vcID ?>">
                <caption class="" style="background-color: #4169E1;">
                    <h5 class="p-2 text-white">สาขาวิชาระดับ <?php echo $row['name'] ?></h5>
                </caption>
                <thead>
                    <tr>
                        <!-- <th>#</th> -->
                        <th>ชื่อสาขาวิชา</th>
                        <th class="text-end">จัดการ</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    
                    while ($rowSaka = mysqli_fetch_array($querySaka)) {
                 
                    ?>
                        <tr>
                         
                            <td><?php echo $rowSaka['name'] ?></td>


                            <td class="text-end">
                                <a class="btn btn-sm btn-warning" data-bs-target="#edit<?php echo $rowSaka['id'] ?>" data-bs-toggle="modal"><i class="fa-solid fa-pen text-white"></i></a>
                                <a class="btn btn-sm btn-danger deletebtn" data-bs-target="#confirm" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i></a>
                            </td>

                            <!-- Edit Year Modal -->
                            <div class="modal fade" id="edit<?php echo $rowSaka['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> แก้ไขปีการศึกษา</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="adminFile/action/saka_edit.php" method="POST" class="form-group g-2">
                                            <div class="modal-body p-5">

                                                <label class="form-label">ชื่อสาขาวิชา</label>
                                                <input type="hidden" name="sakaID" value="<?php echo $rowSaka['id'] ?>">
                                                <input type="text" name="sakaname" class="form-control" value="<?php echo $rowSaka['name'] ?>" required>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn" style="background-color: #3085d6;color:white;" value="ยืนยัน" name="done">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        <?php } ?>
    </div>
</div>


<style>
    .dataTables_filter {
        display: none;
    }
</style>



<link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#saka1').DataTable({
            "language": {
                "lengthMenu": "จำนวน _MENU_ หน้า",
                "zeroRecords": "",
                "info": "แสดงหน้า _PAGE_ ถึง _PAGES_",
                "infoEmpty": "ไม่พบข้อมูลที่บันทึก",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first": "แรก",
                    "last": "สุดท้าย",
                    "next": "ถัดไป",
                    "previous": "กลับ"
                }
            }
        });
    });


    $(document).ready(function() {
        $('#saka2').DataTable({
            "language": {
                "lengthMenu": "จำนวน _MENU_ หน้า",
                "zeroRecords": "",
                "info": "แสดงหน้า _PAGE_ ถึง _PAGES_",
                "infoEmpty": "ไม่พบข้อมูลที่บันทึก",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first": "แรก",
                    "last": "สุดท้าย",
                    "next": "ถัดไป",
                    "previous": "กลับ"
                }
            }
        });
    });


    $(document).ready(function() {
        $('#saka3').DataTable({
            "language": {
                "lengthMenu": "จำนวน _MENU_ หน้า",
                "zeroRecords": "",
                "info": "แสดงหน้า _PAGE_ ถึง _PAGES_",
                "infoEmpty": "ไม่พบข้อมูลที่บันทึก",
                "infoFiltered": "(filtered from _MAX_ total records)",
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


<script>
    $(document).ready(function() {

        $('.deletebtn').on('click', function() {

            $('#confirm').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            // console.log(data);

            $('#sakaID').val(data[0]);

        });
    });
</script>