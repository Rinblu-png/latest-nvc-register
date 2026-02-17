<?php


include('db.php');
include('alert.php');

$sql = "SELECT admin.id,admin.username,admin.name,admin.lastname,admin.email,admin.phone,admin.address,usertype.name AS utname FROM admin JOIN usertype ON admin.usertypeID = usertype.id";
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

            <form action="adminFile/action/user_delete.php" method="POST">


                <input type="hidden" name="userID" id="userID">


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


<div class="row d-flex justify-content-center mt-5">
    <div class="col-md-12">

        <div class="d-flex justify-content-end mb-2">
            <a class="btn btn-primary" href="admin.php?menu=user_add"><i class="fa-solid fa-user-plus"></i> เพิ่มสมาชิก</a>
        </div>

        <table class="table bg-white shadow table-hover  caption-top table-borderless">
            <caption class="bg-dark">
                <h4 class="p-2 text-white">จัดการสมาชิก แอดมิน</h4>
            </caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ผู้ใช้งาน</th>
                    <th>ชื่อ-สกุล</th>
                    <th>เบอร์โทร</th>
                    <th>อีเมล</th>
                    <th>ที่อยู่</th>
                    <th>ตำแหน่ง</th>
                    <th>จัดการ</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($query)) { ?>

                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo "$row[name] $row[lastname]" ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo ucfirst($row['utname'] )?></td>

                        <td>

                            <a class="btn btn-sm btn-warning" href="admin.php?menu=user_edit&id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen text-white"></i></a>

                            <a class="btn btn-sm btn-danger deletebtn" href="#"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>

        </table>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('.deletebtn').on('click', function() {

            $('#confirm').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            // console.log(data);

            $('#userID').val(data[0]);

        });
    });
</script>