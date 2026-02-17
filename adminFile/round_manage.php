<?php

include('db.php');
include('status.php');

$sql = "SELECT * FROM round";
$query = mysqli_query($conn, $sql);


?>


<div class="row d-flex justify-content-center mt-3">
    <div class="col-md-8">
        <table class="table bg-white shadow table-hover table-borderless caption-top">
            <caption class="" style="background-color: #4169E1;">
                <h5 class="p-2 text-white">รอบการสมัครเรียน</h5>
            </caption>
            <thead class="">
                <tr>
                    <th>#</th>
                    <th class="text-start">รอบสมัคร</th>
                    <th>สถานะ</th>
                    <th class="text-end">จัดการสถานะ</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $status_name = $roundStatus[$row['status']][0];
                    $status_color = $roundStatus[$row['status']][1];
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td class="text-start"><?php echo $row['name'] ?></td>
                        <td><span class="badge <?php echo $status_color; ?>"><?php echo $status_name ?></span></td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-primary shadow" href="adminFile/action/round_process.php?processID=1&roundID=<?php echo $row['id'] ?>"><i class="fa-solid fa-check"></i></a>
                            <a class="btn btn-sm btn-danger shadow" href="adminFile/action/round_process.php?processID=2&roundID=<?php echo $row['id'] ?>"><i class="fa-solid fa-xmark"></i></a>
                        </td>

                    </tr>
                <?php } ?>

            </tbody>

        </table>
    </div>
</div>