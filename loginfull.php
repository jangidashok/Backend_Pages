<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "megalith_info";
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    $conn = mysqli_connect($server,$user,$pass,$database);
    if(!$conn){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error !</strong> Sorry for inconvenience we are not able to connect server.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    else{
        $email = $_POST['stu_email'];
        $pass = $_POST['stu_password'];
        $sql = "SELECT * FROM `student_info` WHERE `email` = '$email'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num == 0){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Incredential details !</strong>Please enter correct email.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else{
            $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                if(password_verify($pass,$row['password'])){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Congo !</strong> You have logged in successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'; 
                    $count += 1;
                    break; 
                }
            }
            if($count == 0){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Incredential details !</strong>Please enter correct password.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        }
}
}

?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Ashok_Jangir(19CE10012)">
        <title>Megalith</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <style>
            body{
                background-color:rgb(255, 153, 0);
            }
            #whole_page{
                background-image:url('./login_bg1.jpg');
                background-size:cover;
                position:absolute;
                top:8vw;
                left:15vw;
                width:70vw;
                height:35vw;
                border-radius:1vw;
            }
            #sign_main{
                display:inline-block;
                position:absolute;
                top:0vw;
                margin-left:19vw;
                width:34vw;
                height:35vw;
            }
            .c_t_i{
                border:none;
                border-bottom:0.1vw solid crimson;
                margin-bottom:2vw;
                margin-top:0.3vw;
                padding-right:2vw;
                font-size:1.5vw;
                background-color:rgb(0, 162, 255);
            }
            #statement{
                font-size:1.5vw;
                margin:2vw;
                text-align:center;
                color:white;
            }
            #after_login{
                display:none;
            }
            #first_head{
                display:inline-block;
                width:70vw;
                font-size:2.5vw;
                left:0;
                top:0;
                text-align:center;
                margin-top: 2vw;
                margin-bottom: 2vw;
            }
            #login_inform{
                display:inline-block;
                width:25vw;
                right:0;
                top:0;
            }
            td,th{
                text-align:center;
                font-size:1.5vw;
                padding:0.5vw 8vw;
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <div id="whole_page">
            <div id="sign_main">
                <div style="font-size:3.5vw;color:white;margin:2vw 9.5vw;">:: Login ::</div>
                <div id="statement">Welcome back!</div>
                <div id="form_data">
                <form style="margin-left:7vw;" method="post" action="loginfull.php">
                    <input class="c_t_i" type="email" placeholder="Email" id="email_cand" name="stu_email" required><br>
                    <input class="c_t_i" type="password" placeholder="Password" id="password_cand" name="stu_password" required><br>
                    <input style="margin-left:4.5vw;font-size:1.5vw;margin-top:0.5vw;background-color:crimson;color:white;padding:0.5vw 1vw;cursor:pointer;" value="Continue &#8594;" type="submit" name="Login">
                </form>
                </div>
                <div style="margin-top: 2vw;font-size: 1.3vw;color: white;margin-left: 6vw;">Don't have an account ? want to <a style="color:rgb(185, 109, 121);" href="signupfull.php">sign-up</a></div>
            </div>
        </div>
    </body>
</html>