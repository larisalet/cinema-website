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
        <div class="tabelfilme" style="padding-bottom:10px;">
       <br>
        <h3><b>Movies:</b></h3>
           
        </div>
       
        <div class="tabelfilme" style="padding-bottom:15px; padding-top:20px;">
        
        <a href="addmovie.php"><div class="buton">
                Add movie 
            </div></a>
        </div>
        <div class="tabelfilme" >
            <table>
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Descriere</th>
                    <th>Language</th>
                    <th>Subtitle</th>
                    <th>Delete</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "cinema");
                if($conn -> connect_error){
                    die("Connection failed: ".$conn -> connect_error);
                }
               

                $sql="SELECT id_film, nume_film, gen_film, descriere, limba, subtitrare FROM film";
                $result = $conn -> query($sql);

                if ($result -> num_rows > 0){
                    while($row = $result -> fetch_assoc())
                        echo "
                        <tr>
                        <td><a href='film-admin.php?rn=".$row['id_film']."'>".$row["nume_film"]."</a></td>
                        <td>".$row["gen_film"]."</td>
                        <td>".$row["descriere"]."</td>
                        <td>".$row["limba"]."</td>
                        <td>".$row["subtitrare"]."</td>
                        <td><input type='button' onclick='myFunction($row[id_film])' name='Delete' value='Delete'></td>
                        </tr>";
                }
                else
                    echo "0";

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
  var r = confirm("Are you sure you want to delete this movie?");
  if (r == true) {
      window.location.href='delete.php?rn='+delid+'';
  }
}
</script>
    </body>
</html>