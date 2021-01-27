<?php 
    include("connection.php");
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
            <a href="filme-admin.php"><span class="menu-item" id="nonact">Movies</span>  </a>
            <a href="users-admin.php"><span class="menu-item"id="act">Users</span> </a>
            <a href="login.php"><span class="menu-item" id="lgout">Log Out</span></a> 
           
        </nav>

        <div class="logo">
            <div class="img-logo">
                <img src="css/images/logo.png" style="width:100%">
            </div>
            <div class="text-logo">
                
            </div>
        </div>

        <?php
         $v1=$_GET['id_u'];            

         $sql1="SELECT id_user, nume, prenume, username, email 
                 FROM users
                 WHERE id_user='$v1';";
         $result1 = $conn -> query($sql1);
        
        ?>
        <div class="tabelfilme" style="padding-bottom:20px;">
            <br>
       <h3><b>User - details:</b></h3>
       <?php 
            if ($result1 -> num_rows > 0){
            while($row1 = $result1 -> fetch_assoc()){
                echo "<h3> ".$row1["prenume"]." ".$row1["nume"]."</h3>";
                echo "<h5> <b>Username: </b>".$row1["username"].
                     "<br> <b> Email: </b>".$row1["email"].
                     "<br><br> <b> Number of reservations:  </b> ";
                
                     $username1=$row1["username"];
                    
                }
            }
            $nrrez=0;
            
            $sql2="SELECT * FROM rez";
            $result2 = $conn -> query($sql2);

            if ($result2 -> num_rows > 0){
                while($row2 = $result2 -> fetch_assoc()){
                    if($row2["progr_username"]==$username1)     
                    $nrrez++;
                }
                echo $nrrez;
            }
            else
                echo $nrrez;
                    

       ?>
       
           
        </div>
        <div class="tabelfilme" style="padding-bottom:100px; padding-top:20px;">
            <table>
            <h3>Reservations: <br></h3>
                <tr>
                    
                    <th>Movie</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                </tr>
                <?php

                $sql3="SELECT * FROM rez";
                $result3 = $conn -> query($sql3);

                if ($result3 -> num_rows > 0){
                    while($row3 = $result3 -> fetch_assoc()){
                        if($row3["progr_username"]==$username1){
                        $id_programarefilm=$row3["progr_id_progr"];

                        echo "
                        <tr>
       
                        <td>";
                        $sql5="SELECT * FROM progr WHERE id_progr=$id_programarefilm";
                        $result5 = $conn -> query($sql5);
                    
                        if ($result5 -> num_rows > 0){
                        $row5 = $result5 -> fetch_assoc();
                        $id_film1=$row5["film_id_film"];
                        
                        $sql6="SELECT nume_film FROM film WHERE id_film=$id_film1";
                        $result6=$conn -> query($sql6);
                        if ($result6 -> num_rows > 0){
                        $row6 = $result6 -> fetch_assoc();
                            echo $row6["nume_film"];
                        }
                        echo "</td>
                        <td>".$row5["data_film"]."</td>
                        <td>".$row5["ora"]."</td>
                        <td>".$row5["pret_film"]."</td>
                        </tr>";
                        }
                    }
                    }
                }
                
/*
                $sql="SELECT * FROM rez ";
                $result = $conn -> query($sql);

                $nrrez=0;
                if ($result -> num_rows > 0){
                    while($row = $result -> fetch_assoc())
                    
                    if($row["progr_username"]!== $username1){
                        $nrrez++;
                    }
                }
                else
                    echo "0";
              */
                ?>
            </table>
           
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
function myFunction(delid) {
  var txt;
  var r = confirm("Are you sure you want to delete this user?");
  if (r == true) {
      window.location.href='delete-user.php?rn='+delid+'';
  }
}
</script>
    </body>
</html>