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
    </head>
    <body>
    <div id="page-container">
        <div id="container">

        <nav class="menu">
            <a href="mainadmin.php"><span class="menu-item" id="nonact">Home</span></a>
            <a href="program-admin.php"><span class="menu-item"id="nonact">Program</span></a>
            <a href="filme-admin.php"><span class="menu-item" id="act">Movies</span>  </a>
            <a href="users-admin.php"><span class="menu-item"id="nonact">Users</span> </a>
            <a href="login.php"><span class="menu-item" id="lgout">Log Out</span></a> 
           
        </nav>


        <div class="logo">
            <div class="img-logo">
                <img src="css/images/logo.png" style="width:100%">
            </div>
            <div class="text-logo">
                
            </div>
        </div>
        <div class="tabelfilme">

<br>
<h2>Add movie:</h2>
<p><span class="error">* required field</span></p>
<form method="get" action="">  
  
<div style="float:left; width:15%; padding:1%;">Title: </div><input id="sel" type="text" name="title" required> * <br><br><br>
<div style="float:left; width:15%; padding:1%;">Genre: </div><input id="sel" type="text" name="genre" required> * <br><br><br>
<div style="float:left; width:15%; padding:1%;">Description: </div><textarea id="sel" name="desc" rows="5" cols="40" required> </textarea> * <br><br><br><br><br><br><br>
<div style="float:left; width:15%; padding:1%;">Language: </div><input id="sel" type="text" name="lang"required> * <br><br><br>
<div style="float:left; width:15%; padding:1%;">Subtitle: </div><input id="sel" type="text" name="subt"><br><br><br>
  
  <input id="btn" type="submit" name="submit" value="Add">
</form> 
<?php

//$output=$output+1;

//$title = $genre = $desc = $desc = $lang = $subt = "";

$title = $_GET['title'];
$genre = $_GET['genre'];
$desc = $_GET['desc'];
$lang = $_GET['lang'];
$subt = $_GET['subt'];

$sql2="SELECT MAX(id_film) AS count FROM film";
$v = mysqli_query($conn, $sql2);  
while ($row = mysqli_fetch_assoc($v)){
    $output=$row['count']+1;
}


$sql="INSERT INTO film VALUES ('$output','$title','$genre','$desc','$lang','$subt','','');";
$result = mysqli_query($conn, $sql);  
if($result)
    {
        echo '';
    }
else
    echo 'fail';

if(strlen($title)==0 || strlen($genre)==0 || strlen($desc)==0 || strlen($lang)==0){
$sql3="DELETE FROM film WHERE id_film=$output";
$v2 = mysqli_query($conn, $sql3);
}
else{
    header ("Location: filme-admin.php");
}
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
    </body>
</html>