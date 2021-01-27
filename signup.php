<!DOCTYPE html>
<html lang='ro'>
    <head>
        <title>Popcorn Cinema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/signup1.css">
        </head>
    <body>
        <div class="maintext">
            <div class="logo">
                <img src="css/images/logo.png" style="width:100%;padding-left:25%;padding-right: 25%;">
            </div>
            <div class="loginform">
                <form action="signup-check.php" method="POST">
                <h2>SIGN UP</h2>
                    <?php 
                        if(isset($_GET['error'])){ ?>
                            <p class="error"><?php echo $_GET['error'];?></p><?php    
                        }
                    ?>

                        <label id="lbl">First name:</label>
                        <?php if(isset($_GET['fn'])){ ?>
                        <input type="text" id="user" name="fname" value="<?php echo $_GET['fn'];?>" />
                        <?php } else{ ?>
                        <input type="text" id="user" name="fname">
                        <?php } ?>

                        <label id="lbl">Last name:</label>
                        <?php if(isset($_GET['ln'])){ ?>
                        <input type="text" id="user" name="lname" value="<?php echo $_GET['ln'];?>"/>
                        <?php } else{ ?>
                        <input type="text" id="user" name="lname">
                        <?php } ?>

                        <label id="lbl">Email:</label>
                        <?php if(isset($_GET['em'])){ ?>
                        <input type="text" id="user" name="email" value="<?php echo $_GET['em'];?>" />
                        <?php } else{ ?>
                        <input type="text" id="user" name="email" />
                        <?php } ?>
                        
                       <label id="lbl">Username: <br></label>
                       <?php if(isset($_GET['un'])){ ?>
                        <input type="text" id="user" name="user" value="<?php echo $_GET['un'];?>"/>
                        <?php } else{ ?>
                        <input type="text" id="user" name="user" />
                        <?php } ?>

                        <label id="lbl">Password: <br></label>
                        <input type="password" id="pass" name="pass" />

                        <label id="lbl">Confirm password: <br></label>
                        <input type="password" id="pass" name="cpass" /><br>

                   
                        <button type="submit">Sign up</button>
                        <a href="login.php" class="ca">Already have an account?</a>
                    
                        
                </form>
            </div>
        </div>

    </body>
</html>