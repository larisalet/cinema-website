<?php
    include("connection.php");

    $v=$_GET['rn'];

    $sql="DELETE FROM users WHERE id_user='$v';";
    $result = mysqli_query($conn, $sql);
    header("Location: users-admin.php");
    
?>