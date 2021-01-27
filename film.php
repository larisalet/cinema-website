<?php 
    include("connection.php");
    $udata=$_GET['userd']; 
?>

<!DOCTYPE html>
<html lang='ro'>
    <head>
        <title>Popcorn Cinema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/film3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <div id="page-container">
        <div id="container">\

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
            <a href="program.php?userd=<?php echo $udata;?>"><span class="menu-item"id="act">Program</span></a>
          <a href="main.php?userd=<?php echo $udata;?>#contact"><span class="menu-item" id="nonact">Contact</span> </a>
            <a href="oneuser.php?userd=<?php echo $udata;?>"><span class="menu-item" id="nonact">
            <?php  
            echo $oneuser;
            ?>
            </span> 
            <a href="login.php"><span class="menu-item" id="lgout">Log Out</span></a>                
        </nav>
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
                    
                    echo "
                    <div class='img-film'> <img src='".$row["poza_film"]."' width='100%'> </div>
                    <div class='descr-film'>
                        <div class='titlu-film'>".$row["nume_film"]." (2020)</div>
                        <div class='d-film'>
                            <br>Genre: ".$row["gen_film"]."
                            <br>Language: ".$row["limba"]."
                            <br>Subtitle: ".$row["subtitrare"]."
                            <br><br>Description: <br>".$row["descriere"]."
                            <br><br>Actors: 
                    ";
                    
                    if ($result2 -> num_rows > 0){
                        while($row2 = $result2 -> fetch_assoc()){
                            echo 
                                $row2["prenume"]." ".$row2["nume"].", ";
                        }
                    }
                    else {
                        printf("Query failed: %s\n", $conn->error);
                    
                    }
                    echo "<br><br>";
                    $sql3="SELECT id_progr,data_film, ora 
                           FROM progr 
                           JOIN film ON id_film=film_id_film
                           AND id_film=$v1
                           ORDER BY data_film,ora;";
                     $result3 = $conn -> query($sql3);
                    
                     $sf1=0;
                     if ($result3 -> num_rows > 0){
                        while($row3 = $result3 -> fetch_assoc()){
                            if($row3["data_film"] >= date("Y-m-d")){
                             echo"
                             <a href='user-rez.php?userd=".$udata."&rn=".$v1."&prdata=".$row3['id_progr']."'>
                             <div class='bloc'>"
                                .$row3["data_film"]."<br>"
                                .$row3["ora"].
                             "</div></a>
                             ";
                             $sf1++;
                            }
                            
                        }
                    }
                    if($sf1==0)
                         echo "<p style='padding:5px;border:1px solid white; width:20%; text-align:center; border-radius:4px;'> Coming Soon </p>";




                    echo "
                        <br>
                        </div>
                        </div>
                    </div>
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

<script>
function myFunction1(pr_id){
    window.location.href='user-rez.php?userd='+ <?php echo $udata; ?> +'&rn='+v1+'&prdata='+pr_id;
}
</script>
        
    </body>
</html>