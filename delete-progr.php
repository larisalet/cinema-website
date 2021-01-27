<?php
    include("connection.php");

    $v=$_GET['rn'];

    $sql="DELETE FROM progr WHERE id_progr='$v';";
    $result = mysqli_query($conn, $sql);
    header("Location: program-admin.php");
    
?>