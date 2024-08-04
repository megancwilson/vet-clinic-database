<?php
include "connection.php";
$id = $_GET["id"];
$sql = "DELETE FROM `appointment` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: index_appt.php?msg=Record deleted Successfully");
}
else {
    echo "Failed: ".mysqli_error($conn);
}


?>