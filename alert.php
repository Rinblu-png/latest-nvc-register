<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
<style>
  body,
  html {
    font-family: 'Kanit';
  }
</style>
<?php
function loginSuccess($url)
{
  echo '
    <script>
    $(document).ready(function() {
    Swal.fire({
        title: "Login Success",
        text: "เข้าสู่ระบบสำเร็จ",
        confirmButtonColor: "#3085d6",
        icon: "success"
      });
    });
    </script>
    ';
  header("refresh:2; url='$url'");
}

function loginFailed($url)
{
  echo '
    <script>
    $(document).ready(function() {
    Swal.fire({
        title: "Login Failed",
        text: "เข้าสู่ระบบไม่สำเร็จ",
        icon: "error"
      });
    });
    </script>
    ';
  header("refresh:2; url='$url'");
}

function success($url, $msg)
{
  echo "
    <script>
    $(document).ready(function() {
    Swal.fire({
        title: 'สำเร็จ',
        text: '$msg',
        icon: 'success'
      });
    });
    </script>
    ";
  header("refresh:2; url='$url'");
}

function failed($url, $msg)
{
  echo "
    <script>
    $(document).ready(function() {
    Swal.fire({
        title: 'ไม่สำเร็จ',
        text: '$msg',
        icon: 'error'
      });
    });
    </script>
    ";
  header("refresh:3; url='$url'");
}





?>