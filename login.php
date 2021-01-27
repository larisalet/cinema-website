<!DOCTYPE html>
<html lang='ro'>
    <head>
        <title>Popcorn Cinema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/login3.css">
        </head>
    <body>
        <div class="maintext">
            <div class="logo">
                <img src="css/images/logo.png" style="width:100%;padding-left:25%;padding-right: 25%;">
            </div>
            <div class="loginform">
                <form action="process.php" method="POST">
                <h2>LOGIN</h2>
                    <?php 
                        if(isset($_GET['error'])){ ?>
                            <p class="error"><?php echo $_GET['error'];?></p><?php    
                        }
                    ?>
                    
                
                       <label id="lbl">Username: <br></label>
                        <input type="text" id="user" name="user" />
                    
                        <label id="lbl">Password: <br></label>
                        <input type="password" id="pass" name="pass" /><br>
                   
                       
                        <button type="submit">Login</button>
                        <a href="signup.php" class="ca">Create an account</a>
                    

                </form>
            </div>
        </div>

    </body>
</html>