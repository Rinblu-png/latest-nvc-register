<?php 

include("db.php");
$id = $_POST['id'];
$sql = "SELECT * FROM saka WHERE vcID = $id";
$query = mysqli_query($conn,$sql);
$select = "";
foreach($query as $row) {
    $select .= "<option value='$row[id]'>$row[name]</option>";
}
echo $select;


?>