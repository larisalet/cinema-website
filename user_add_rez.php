 <?php
    include("connection.php");
    $un=$_GET['un1'];
    $pr=$_GET['pr1'];
    $udata=$_GET['userd']; 

    //echo $un." ".$pr."<br>"; 

    $sql2="SELECT MAX(id_rezervare) AS count FROM rez";
    $v = mysqli_query($conn, $sql2);  
    while ($row = mysqli_fetch_assoc($v)){
        $output=$row['count']+1;
    }

    $sql4="INSERT INTO rez VALUES($output,'$un','$pr','','');";
    $result4 = $conn -> query($sql4);
    if($result4){
        header("Location: main.php?userd=$udata");
    }
    else
        echo 'fail';

   
    
?>