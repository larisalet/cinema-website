<?php 
    include("connection.php");
    $udata=$_GET['userd']; 
?>
<!DOCTYPE html>
<html lang='ro'>
    <head>
        <title>Popcorn Cinema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/program-user.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <div id="page-container">
        <div id="container">

        <?php  
             $sql4="SELECT * FROM users WHERE id_user=$udata";
             $result4 = $conn -> query($sql4);
             if ($result4 -> num_rows > 0){
                while($row4 = $result4 -> fetch_assoc()){
                   $oneuser = $row4['prenume'];
                }
            }
            ?>
    <nav class="menu">
            <a href="main.php?userd=<?php echo $udata;?>"><span class="menu-item" id="nonact">Home</span></a>
            <span class="menu-item" id="act">Program</span>
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
                
            </div>
        </div>
       
        <div class="tabelfilme" style="padding-top:10px;">
            <br><br>
      

            <?php
                 
            $sql1="SELECT id_film, nume_film, gen_film, poza_film, descriere, subtitrare,limba
                FROM film;";
            
            $result1 = $conn -> query($sql1);

            $sf=0;
            if ($result1 -> num_rows > 0){
                while($row = $result1 -> fetch_assoc()){
                    if($sf<8){ 
                        echo "
                        <div class='film'>
                            <div class='film-img'>
                            ";
                            if($row["poza_film"]!=NULL){
                            echo "
                                <input onclick='myFunction1($row[id_film])' type='image' src='".$row["poza_film"]."' style='width:100%'>";
                            }
                            else {
                            echo "
                                <input onclick='myFunction1($row[id_film])' type='image' src='css/images/noimg.jpg' style='width:100%'>";
                            
                            }
                            echo"
                            </div>
                            <div class='descr-film'>
                                <p style='font-size:20px;'><b>".$row["nume_film"]."</b></p>
                                <br><b>Genre:</b> ".$row["gen_film"]."
                                <br><b>Language:</b> ".$row["limba"]."
                                <br><b>Subtitle:</b> ".$row["subtitrare"]."<br><br>";
                        
                                $v1=$row["id_film"];
                            $sql3="SELECT id_progr,data_film, ora 
                                FROM progr 
                                JOIN film ON id_film=film_id_film
                                AND id_film=$row[id_film]
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
                          
                            </div>
                        </div>
                        ";
                    }
                    
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
function myFunction(delid) {
  var txt;
  var r = confirm("Are you sure you want to delete this?");
  if (r == true) {
      window.location.href='delete-user.php?rn='+delid+'';
  }
}

function myFunction1(nr){
        window.location.href='film.php?userd='+ <?php echo $udata; ?> +'&rn='+nr+'';
    }
</script>
    </body>
</html>