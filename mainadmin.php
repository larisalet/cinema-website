<?php 
    include("connection.php");
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang='ro'>
    <head>
        <title>Popcorn Cinema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/mainadmin.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <div id="page-container">
        <div id="container">

            <nav class="menu">
            <a href="mainadmin.php"><span class="menu-item" id="act">Home</span></a>
            <a href="program-admin.php"><span class="menu-item"id="nonact">Program</span></a>
            <a href="#contact"><span class="menu-item" id="nonact">Contact</span> </a>
            <a href="filme-admin.php"><span class="menu-item" id="nonact">Movies</span>  </a>
            <a href="users-admin.php"><span class="menu-item"id="nonact">Users</span> </a>
            <a href="login.php"><span class="menu-item" id="lgout">Log Out</span></a> 
           
        </nav>

      
        
        <div class="logo">
            <img class="mySlides" src="css/images/BS(1).png" style="width:100%">
            <img class="mySlides" src="css/images/BB3 (1).png" style="width:100%">
            <img class="mySlides" src="css/images/M(1).png" style="width:100%">
            <img class="mySlides" src="css/images/HT (1).png" style="width:100%">
        </div>
        
        <p id="txtm" ><span>NOW PLAYING</span></p>
        <div class="filme">
           <?php

            $sql1="SELECT id_film, nume_film, gen_film, poza_film
                FROM film;";
            
            $result1 = $conn -> query($sql1);

            $sf=0;
            if ($result1 -> num_rows > 0){
                while($row = $result1 -> fetch_assoc()){
                    if($sf<8){
                        echo "
                        <div class='film'>
                            <div class='film-img'>
                                <input onclick='myFunction1($row[id_film])' type='image' src='".$row["poza_film"]."' style='width:100%'>
                                <p><b>".$row["nume_film"]."</b></p>
                                <p>Genre:<br>".$row["gen_film"]." </p>
                            </div>
                        </div>
                        ";
                    }
                    $sf++; 
                }
            }
   
            ?>
        </div>
        <p id="txtm"><span>CONTACT</span></p>
           
        <div class="filme">
        <div id="contact"></div>
            <div class="map">
            <div style="float:left;" class="mapouter"><div class="gmap_canvas"><iframe width="630" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=Strada%20Nuf%C4%83rului%2030,%20Oradea%20410583&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies2.org"></a><br><style>.mapouter{position:relative;text-align:right;height:400px;width:630px;}</style><a href="https://google-map-generator.com"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:630px;}</style></div></div>
            </div>
                <div class="contact-info">
                <br><b><span style="color:rgb(158, 59, 59); ">Adress:</span></b> <br>Strada Nufărului 30, Oradea 410583
                <br><br><b><span style="color:rgb(158, 59, 59);">Phone number: </span></b><br>0712345678
                <br><br><b><span style="color:rgb(158, 59, 59);">Email: </span></b><br>popcorncineva@yahoo.com
            </div>
        </div>
        </div>
<div id="footer">
    <div id="text-footer">
Realizat de <b>Larisa Leț</b>
       &copy; 2021 

       <a href="https://www.termsfeed.com/live/9ed76aba-5880-41c7-91ea-eb8236e04320" style="color:white" >Privacy Policy</a>
</div>
<div id="social">
    <img id="s-img" src="css/images/social/fb.png">
    <img id="s-img" src="css/images/social/ig.png">
    <img id="s-img" src="css/images/social/tw.png">
</div>  
</div>
</div>
    
    
    <script>
    var slideIndex = 0;
    carousel();
    
    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
      }
      slideIndex++;
      if (slideIndex > x.length) {slideIndex = 1} 
      x[slideIndex-1].style.display = "block"; 
      setTimeout(carousel, 2000); 
    }

    function myFunction1(nr){
        window.location.href='film-admin.php?rn='+nr+'';
    }
    </script>
    </body>
</html>
<?php 
    //}
    ?>