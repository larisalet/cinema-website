<?php
    include("connection.php");

    $v=$_GET['rn'];

    $sql="DELETE FROM film WHERE id_film='$v';";
    $result = mysqli_query($conn, $sql);
    header("Location: filme-admin.php");
    
?>