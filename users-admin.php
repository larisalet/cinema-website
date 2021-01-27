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
<br>
        <div class="tabelfilme">
       <h3><b>Users:</b></h3>
           
        </div>
        <div class="tabelfilme"  style="padding-bottom:120px; padding-top:20px;">
            <table>
                <tr>
                    
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Delete</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "cinema");
                if($conn -> connect_error){
                    die("Connection failed: ".$conn -> connect_error);
                }
               

                $sql="SELECT id_user, nume, prenume, email, username, pw FROM users";
                $result = $conn -> query($sql);

                if ($result -> num_rows > 0){
                    while($row = $result -> fetch_assoc())
                    
                    if($row["username"]!=='admin'){
                        echo "
                        <tr>
                        <td>".$row["prenume"]."</td>
                        <td>".$row["nume"]."</td>
                        <td>".$row["email"]."</td>
                        <td><a href='oneuser-admin.php?id_u=".$row['id_user']."'>".$row['username']."</a></td>
                        <td>".$row["pw"]."</td>
                        <td><input type='button' onclick='myFunction($row[id_user])' name='Delete' value='Delete'></td>
                        </tr>";
                    }
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
  var r = confirm("Are you sure you want to delete this user?");
  if (r == true) {
      window.location.href='delete-user.php?rn='+delid+'';
  }
}
</script>
    </body>
</html>