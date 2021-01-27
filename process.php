<?php
    include("connection.php");

    if(isset($_POST['user']) && isset($_POST['pass'])){
        function validate ($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $un = validate($_POST['user']);
        $psw = validate($_POST['pass']);

        if (empty($un)){
            header("Location: login.php?error=Username is required");
            exit();

        }
        else if(empty($psw)){
            header("Location: login.php?error=Password is required");
            exit();

        }
        else{
            //hashing the password
            //$psw=md5($psw);

            $sql = "SELECT * FROM users WHERE username='$un' AND pw='$psw';";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)===1){
                $row = mysqli_fetch_assoc($result);
                if($row['username']===$un && $row['pw'] === $psw){
                    if($un=='admin')
                    header("Location: mainadmin.php");
                    else
                    header("Location: main.php?userd=$row[id_user]");
                }
                else
                {
                    header("Location: login.php?error=Incorect username or paassword");
                    exit();
                }
            }
            else{
                header("Location: login.php?error=Incorect username or paassword");
                exit();
            }
        }
    }
    else{
        header("Location: login.php");
        exit();
    }
?>