<?php 
    include("connection.php");
?>

<!DOCTYPE html>
<html lang='ro'>
    <head>
        <title>Popcorn Cinema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/film-adm.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <div style="width:100%, float:left">
        <div class="logo">
            <div class="img-logo">
                <img src="css/images/logo.png" style="width:100%">
            </div>
            <div class="text-logo">
                <b>PROGRAM</b><br>
                <b>Monday - Friday: </b> 08:00 AM - 11:00 PM <br>
                <b>Saturday - Sunday: </b> 08:00 AM - 00:00 AM
            </div>
        </div>
    </div>

        <div class='film'>
        <?php

            $v1=$_GET['rn'];            

            $sql1="SELECT id_film, nume_film, gen_film, descriere, limba, subtitrare, poza_film, trailer 
                    FROM film 
                    WHERE id_film='$v1';";
            $result1 = $conn -> query($sql1);

            $sql2="SELECT nume, prenume 
                   FROM actor  
                        JOIN actor_film ON actor.id_actor=actor_film.actor_id_actor
                        JOIN film ON actor_film.film_id_film=film.id_film
                        AND film.id_film='$v1';";
        
            $result2 = $conn -> query($sql2);

            if ($result1 -> num_rows > 0){
                while($row = $result1 -> fetch_assoc()){
                    if(!empty($row["poza_film"]))
                    echo "
                        <div class='img-film'> <img src='".$row["poza_film"]."' width='100%'> </div>";
                    
                    echo "
                    <div class='descr-film'>
                        <div class='titlu-film'>".$row["nume_film"]." (2020)</div>
                        <div class='d-film'>
                            <br><b>Genre:</b> ".$row["gen_film"]."
                            <br><b>Language:</b> ".$row["limba"]."
                            <br><b>Subtitle:</b> ".$row["subtitrare"]."
                            <br><br><b>Description:</b> <br>".$row["descriere"]."
                            <br><br><b>Actors: </b>
                    ";
                    
                    if ($result2 -> num_rows > 0){
                        while($row2 = $result2 -> fetch_assoc()){
                            echo 
                                $row2["prenume"]." ".$row2["nume"].", ";
                        }
                    }
                    else {
                        printf("No actors found.", $conn->error);
                    }
                    echo "<br><br>";
                    $sql3="SELECT data_film, ora 
                           FROM progr 
                           JOIN film ON id_film=film_id_film
                           AND id_film=$v1
                           ORDER BY data_film,ora;";
                     $result3 = $conn -> query($sql3);
  
                     if ($result3 -> num_rows > 0){
                        while($row3 = $result3 -> fetch_assoc()){
                             echo"
                             <div class='bloc'>"
                                .$row3["data_film"]."<br>"
                                .$row3["ora"].
                             "</div>
                             ";
                        }
                    }
                    


                    
                    echo"

                    </div>
                    </div>
                    
                    <br>
                   
                    <br>
                    </div>

                    ";

                    ?>
                    <br>
                                      
                    <div class='trailer-film'>
                    <div class='tabelfilme'>
                    <?php
                    echo "
                    <br><br>
                    Number of reservations:  ";
                    
                    $nrrez=0;
            
                    $sql7="SELECT * FROM progr";
                    $result7 = $conn -> query($sql7);
        
                    if ($result7 -> num_rows > 0){
                        while($row7 = $result7 -> fetch_assoc()){
                            if($row7["film_id_film"]==$v1)     
                            {
                                $id_pr=$row7["id_progr"];
                                $sql8="SELECT * FROM rez";
                                $result8 = $conn -> query($sql8);

                                if($result8 -> num_rows > 0){
                                    while($row8 = $result8 -> fetch_assoc()){
                                        if($row8["progr_id_progr"]==$id_pr)
                                        $nrrez++;
                                    }
                                }
                            
                            
                            
                            }
                        }
                        echo $nrrez;
                    }
                    else
                        echo $nrrez;
                            
        
               ?>
               
                   
                </div>
                <div class="tabelfilme">
                    <table>
                    <h3>Reservations: <br></h3>
                
                        <tr>
                            
                            <th>User</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Price</th>
                        </tr>
                    
                        <?php
        
                        $sql9="SELECT * FROM progr";
                        $result9 = $conn -> query($sql7);

                        if ($result9 -> num_rows > 0){
                            while($row9 = $result9 -> fetch_assoc()){
                                if($row9["film_id_film"]==$v1)     
                                {
                                    $id_pr=$row9["id_progr"];
                                    $sql10="SELECT * FROM rez";
                                    $result10 = $conn -> query($sql10);

                                    if($result10 -> num_rows > 0){
                                        while($row10 = $result10 -> fetch_assoc()){
                                            if($row10["progr_id_progr"]==$id_pr)
                                               {
                                                echo "
                                                <tr>
                                                <td>".$row10["progr_username"]."</td>
                                                <td>".$row9["data_film"]."</td>
                                                <td>".$row9["ora"]."</td>
                                                <td>".$row9["pret_film"]."</td>
                                                </tr>";
                                               } 
                                        }
                                    }
                
                
                
                                }
                            }
                        }
                
                    ?>
                       </table>
                       
                        <br>
                        <br>
                    </div>
                    </div>
                    <?php
                    echo"
                    
                    <div class='trailer-film' style='padding-bottom:100px;'>
                        

                        <br>Watch the trailer:<br><br>";
                        if(!empty($row["trailer"]))
                        echo"
                        <iframe width='100%' height='400' src='".$row["trailer"]."'></iframe>";
                        else
                        echo"
                        No trailer available.
                    </div>
                    
                    ";
                    
                  

            }
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