<?php
    include("connection.php");

    if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['cpass'])){
        function validate ($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $fn = validate($_POST['fname']);
        $ln = validate($_POST['lname']);
        $em = validate($_POST['email']);
        $un= validate($_POST['user']);
        $psw = validate($_POST['pass']);
        $cpsw = validate($_POST['cpass']);
        $user_data = 'fn='.$fn.'&ln='.$ln.'&em='.$em.'&un='.$un;

        if(empty($fn)){
            header("Location: signup.php?error=First name is required&$user_data");
            exit();

        }
        else if(empty($ln)){
            header("Location: signup.php?error=Last name is required&$user_data");
            exit();

        }
        else if(empty($em)){
            header("Location: signup.php?error=Email is required&$user_data");
            exit();

        }
        else if (empty($un)){
            header("Location: signup.php?error=Username is required&$user_data");
            exit();

        }
        else if(empty($psw)){
            header("Location: signup.php?error=Password is required&$user_data");
            exit();

        }
        else if(empty($cpsw)){
            header("Location: signup.php?error=Confirm your password&$user_data");
            exit();

        }
        else if($psw !== $cpsw){
            header("Location: signup.php?error=The confirmation password does not match&$user_data");
            exit();
        }
        
        else{
            //hashing the password
            //$psw=md5($psw);

            
            $sql3="SELECT MAX(id_user) AS count FROM users";
            $v1 = mysqli_query($conn, $sql3);  
            while ($row1 = mysqli_fetch_assoc($v1)){
                $output1=$row1['count']+1;
            }

            $sql ="SELECT * FROM users WHERE username='$un'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                header("Location: signup.php?error=The username is taken, try another one&$user_data");
            exit();
            }
            else{
                $sql2="INSERT INTO users (id_user, username, pw, nume, prenume, email) 
                        VALUES('$output1','$un','$psw','$ln','$fn','$em')";
                $result2 = mysqli_query($conn, $sql2);
                
                if($result2){
                    header("Location: main.php");
                }
            }

        }
    }
    else{
        header("Location: signup.php");
        exit();
    }
?> 