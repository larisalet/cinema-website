<?php 
    include("connection.php");
    $udata=$_GET['userd'];
    $mdata=$_GET['rn'];
    $prdata=$_GET['prdata']; 
?>

<!DOCTYPE html>
<html lang='ro'>
    <head>
        <title>Popcorn Cinema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/rez-user.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <div id="page-container">
        <div id="container">

        <?php  
             $sql10="SELECT * FROM users WHERE id_user=$udata";
             $result10 = $conn -> query($sql10);
             if ($result10 -> num_rows > 0){
                while($row10 = $result10 -> fetch_assoc()){
                   $oneuser = $row10['prenume'];
                }
            }
            ?>

        <nav class="menu">
            <a href="main.php?userd=<?php echo $udata;?>"><span class="menu-item" id="nonact">Home</span></a>
            <a href="program.php?userd=<?php echo $udata;?>"><span class="menu-item" id="act">Program</span></a>
            <a href="main.php?userd=<?php echo $udata;?>#contact"><span class="menu-item" id="nonact">Contact</span> </a>
            <a href="oneuser.php?userd=<?php echo $udata;?>"><span class="menu-item" id="nonact">
            <?php  
            echo $oneuser
            ?>
            </span> 
            <a href="login.php"><span class="menu-item" id="lgout">Log Out</span> </a>
                           
        </nav>
        <div class="logo">
            <div class="img-logo">
                <img src="css/images/logo.png" style="width:100%">
            </div>
            <div class="text-logo">
                
            </div>
        </div>
        <div class="film" style="padding-bottom:15px;">
        <h2>Confirm your reservation:</h2>
        </div>
        <div class="film" style="padding-bottom:0px;">
        <div class="tabl">
        <br><h4><b>Movie information:</b></h4><br>
       
        <div class="mov-inf">Movie title:</div><div class="mov-inf" style="width:70%;"> 
        <?php  
        $sql1="SELECT * FROM film WHERE id_film=$mdata";
        $result1 = $conn -> query($sql1);
        if ($result1 -> num_rows > 0){
            while($row1 = $result1 -> fetch_assoc()){
                echo $row1['nume_film'];
            }
        }
        ?>
        </div>
        <br>
        <br><div class="mov-inf">Date: </div><div class="mov-inf" style="width:70%;">
        <?php  
        $sql2="SELECT * FROM progr WHERE id_progr=$prdata";
        $result2 = $conn -> query($sql2);
        if ($result2 -> num_rows > 0){
            while($row2 = $result2 -> fetch_assoc()){
                echo $row2['data_film'];
                echo "<br></div><br><div class='mov-inf'>Time: </div><div class='mov-inf' style='width:70%;'>".$row2['ora'];
                echo "<br></div><br><div class='mov-inf'>Hall: </div><div class='mov-inf' style='width:70%;'>".$row2['sala_id_sala'];
                echo "</div>";
                $pr=$row2['id_progr'];
                $sala=$row2['sala_id_sala'];
                $pret=$row2['pret_film'];
           }
        }
        ?>
        </div>
        <div class="tabl">
        <br><h4><b>Personal information:</b></h4><br>
        <br><br><div class="mov-inf">First name: </div><div class="mov-inf" style='width:70%;'>
        <?php  
        $sql3="SELECT * FROM users WHERE id_user=$udata";
        $result3 = $conn -> query($sql3);
        if ($result3 -> num_rows > 0){
            while($row3 = $result3 -> fetch_assoc()){
                echo $row3['prenume'];
                echo "</div><br><div class='mov-inf'>Last name: </div><div class='mov-inf' style='width:70%;'>".$row3['nume'];
                echo "</div><br><div class='mov-inf'>Email: </div><div class='mov-inf' style='width:70%;'>".$row3['email'];
                $un=$row3['username'];
            }
        }
        ?>
        </div>
        <?php

        $nrloc=0;
        $sql4="SELECT progr_id_progr FROM rez WHERE progr_id_progr=$pr;";
        $result4 = $conn -> query($sql4 );
        if ($result4 -> num_rows > 0){
            while($row4 = $result4 -> fetch_assoc()){
                $nrloc++;
            }
        }

        $sql5="SELECT nr_locuri FROM sala WHERE id_sala=$sala";
        $result5 = $conn -> query($sql5 );
        if ($result5 -> num_rows > 0){
            while($row5 = $result5 -> fetch_assoc()){
                $nrlocsala= $row5['nr_locuri'];
            }
        }

       

       ?>
        <br><br>

        
        </div>
    </div>
        <div class="film">
        <?php
               
               echo "<br>Price: ".$pret."$";   
               $nrlocurilibere=$nrlocsala-$nrloc;
        
               echo "<br><br> Available seats: ".$nrlocurilibere;
               
               if($nrlocurilibere>0){
                   
                   echo "
                   <br><br><a href='user_add_rez.php?un1=".$un."&pr1=".$pr."&userd=".$udata."'> 
                   <button id='btn'>Confirm reservation</button>
                   </a>";
               }
               else
                   echo "No available seats!";

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