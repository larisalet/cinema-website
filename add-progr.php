<?php
 include("connection.php");
 error_reporting(0);
 ?>
<!DOCTYPE html>
<html lang='ro'>
    <head>
        <title>Popcorn Cinema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/fadmin3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    </head>
    <body>
        <div id="page-container">
        <div id="container">

        <nav class="menu">
            <a href="mainadmin.php"><span class="menu-item" id="nonact">Home</span></a>
            <a href="program-admin.php"><span class="menu-item"id="act">Program</span></a>
            <a href="filme-admin.php"><span class="menu-item" id="nonact">Movies</span>  </a>
            <a href="users-admin.php"><span class="menu-item"id="nonact">Users</span> </a>
            <a href="login.php"><span class="menu-item" id="lgout">Log Out</span></a> 
           
        </nav>

        
        <div class="logo">
            <div class="img-logo">
                <img src="css/images/logo.png" style="width:100%">
            </div>
        </div>
  

        <div class="tabelfilme">

       

<h2><br><b>Add a movie in the program :</b></h2>

<p><span class="error">* required field</span></p><br>
<form method="get" action="">  


  
  <div style="float:left; width:15%; padding:1%;">Movie:</div>
  <?php
  $sql4="SELECT id_film, nume_film FROM film";
  $result4 = mysqli_query($conn, $sql4);
  ?>
  <select id="sel" name="movietitle" required>
  <?php
  while($row4 = mysqli_fetch_assoc($result4))
  {
      echo"<option value='$row4[id_film]'>".$row4['nume_film']."</option>";
  }
  ?>
  </select>
   * <br> <br><br>

   <div style="float:left; width:15%; padding:1%;">Hall: </div>
   <?php
  $sql5="SELECT id_sala FROM sala";
  $result5 = mysqli_query($conn, $sql5);
  ?>
  <select id="sel" name="idsala" required>
  <?php
  while($row5 = mysqli_fetch_assoc($result5))
  {
      echo"<option value='$row5[id_sala]'>".$row5['id_sala']."</option>";
  }
  ?>
  </select>
   * <br> <br> <br>

   <div style="float:left; width:15%; padding:1%;"> Date: </div>
    <input id="sel" type="date" name="date" min="2021-01-01" max="2021-03-03"></select>
   * <br> <br> <br>

   <div style="float:left; width:15%; padding:1%;">Time: </div>
    <input id="sel" type="time" name="time"></select>
   * <br> <br><br>

   <div style="float:left; width:15%; padding:1%;">Price: </div>
    <input id="sel" type="number" name="price" min=0></select>
   * <br> <br> <br>
  
  <input id="btn" type="submit" name="submit" value="Add">
</form> 
<?php

//$output=$output+1;

//$title = $genre = $desc = $desc = $lang = $subt = "";




$movietitle = $_GET['movietitle'];
$idsala = $_GET['idsala'];
$date = $_GET['date'];
$time = $_GET['time'];
$price = $_GET['price'];



//echo $movietitle.'  '.$idsala.'  '.$date.'  '.$time.'  '.$price;
$sql2="SELECT MAX(id_progr) AS count FROM progr";
$v = mysqli_query($conn, $sql2);  
while ($row = mysqli_fetch_assoc($v)){
    $output=$row['count']+1;
}
//echo $sf;
$sql6="SELECT * FROM progr 
        WHERE sala_id_sala=$idsala AND data_film=$date AND ora=$time";
$v3= mysqli_query($conn,$sql6);
if ($row1 = mysqli_fetch_assoc($v)){
    $sf=1;
}
if($sf==0){
//echo "<br>".$movietitle.'  '.$idsala.'  '.$date.'  '.$time.'  '.$price;
$sql="INSERT INTO progr VALUES ($output,'$idsala','$movietitle','$date','$price','$time');";
//$sql="INSERT INTO progr VALUES (20,'1','1','$date','$price','$time');";

$result = mysqli_query($conn, $sql);  
if($result)
    {
        header ("Location: program-admin.php");
        echo '';
    }
else
    echo '';
}
/*
if(strlen($title)==0 || strlen($genre)==0 || strlen($desc)==0 || strlen($lang)==0){
$sql3="DELETE FROM film WHERE id_film=$output";
$v2 = mysqli_query($conn, $sql3);
}
else{*/
    


?> 

       </div>
</div>
<div id="footer">
    <div id="text-footer">
Realizat de <b>Larisa Leț</b>
       &copy; 2021 

       <a href="https://www.termsfeed.com/privacy-policy/fd9df40914f279ef8f01a66bc1d09504" style="color:white" >Privacy Policy</a>
</div>
<div id="social">
    <img id="s-img" src="css/images/social/fb.png">
    <img id="s-img" src="css/images/social/ig.png">
    <img id="s-img" src="css/images/social/tw.png">
</div>  
</div>
</div>
<script>
$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#txtDate').attr('max', maxDate);
}); 
</script>

    </body>
</html>