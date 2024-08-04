<?php
include "connection.php";
$id = $_GET["id"];
$sql = "DELETE FROM `vet` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: index_vet.php?msg=Record deleted Successfully");
}
else {
    echo "Failed: ".mysqli_error($conn);
}


?>