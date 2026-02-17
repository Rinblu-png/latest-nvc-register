<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/datepicker.css">

    <script src="js/bootstrap-datepicker-thai.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/locales/bootstrap-datepicker.th.js"></script>
</head>

<body>






   <div class="container">
   <center>
        <br>
        <h1 class="text-info">THAI Datepicker</h1>

        <form action="" method="POST" >
            <label>th-th</label>
            <input id="datepicker" name="datepicker" type="text" data-provide="datepicker" class="form-control" data-date-language="th-th">


            <input type="submit" name="ok">
       
        </form>

    </center>
   </div>




    <script>
        $(function() {
            $("#datepicker").datepicker({
                language:'th-th',
                autoclose: true
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>
</html>



<?php


if(isset($_POST['ok'])) {

    $date = $_POST['datepicker'];

    var_dump($date);
}

?>