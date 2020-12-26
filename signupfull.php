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
    $name = $_POST['stu_name'];
    $email = $_POST['stu_email'];
    $gender = $_POST['stu_gender'];
    $state = $_POST['stu_state'];
    $pass = $_POST['stu_password'];
    $c_pass = $_POST['stu_c_password'];
    if($pass == $c_pass){
        $p_pass = password_hash($pass,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `student_info` (`name`, `email`, `state`, `gender`, `password`) VALUES ('$name' , '$email' , '$state' , '$gender' , '$p_pass')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Congratulations !</strong> You have signed up successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        else{
            echo "something wrong here";
        }
    }
    else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error !</strong> Your password is not matching to confirm password. Please enter a valid password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
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
                background-size:cover;
                background-repeat:no-repeat;
            }
            #whole_page{
                background-image:url('./signup_bg.jpg');
                background-size:cover;
                position:absolute;
                top:3vw;
                left:15vw;
                width:70vw;
                height:60vw;
                border-radius:1vw;
            }
            #welcome_part{
                display:inline-block;
                width:34vw;
                height:35vw;
            }
            #sign_main{
                display:inline-block;
                position:absolute;
                top:0vw;
                width:34vw;
                height:60vw;
                background-color:white;
            }
            .c_t_i{
                border:none;
                border-bottom:0.1vw solid crimson;
                margin-bottom:2vw;
                margin-top:0.3vw;
                padding-right:7vw;
                font-size:1.2vw;
                background-color:white;
            }
            .c_t_l{
                font-size:1.3vw;
                margin-bottom:1vw;
            }
            #add_this{
                font-size:1.5vw;
                text-align:center;
                color:crimson;
                padding-top:4vw;
            }
        </style>
    </head>
    <body>
        <div id="whole_page">
            <div id="welcome_part">
                <div style="text-align:center;font-size:3vw;margin-top:27vw;">Welcome</div>
                <div style="font-size:2vw;text-align:center;padding-top:3vw;">To the Megalith Family</div>
                <div id="add_this"></div>
            </div>
            <div id="sign_main">
                <div style="text-align:center;font-size:2.5vw;color:crimson;margin:2vw 0vw;">Sign Up</div>
                <div id="form_data">
                <form style="margin-left:7vw;" method="post" action="signupfull.php">
                    <label class="c_t_l" for="name_cand">Name :</label><br>
                    <input class="c_t_i" type="text" id="name_cand" name="stu_name" required><br>
                    <label class="c_t_l" for="email_cand">Email :</label><br>
                    <input class="c_t_i" type="email" id="email_cand" name="stu_email" required><br>
                    <label class="c_t_l" for="mobile_cand">State :</label><br>
                    <input class="c_t_i" type="text" id="mobile_cand" name="stu_state" required><br>
                    <label class="c_t_l">Gender :</label><br>
                    <label class="c_t_l" for="gen_male">Male </label>
                    <input class="c_t_i" type="radio" style="margin-right:3vw;" id="gen_male" name="stu_gender" value="Male" required>
                    <label class="c_t_l" for="gen_fem">Female </label>
                    <input class="c_t_i" type="radio" id="gen_fem" name="stu_gender" value="Female" required><br>
                    <label class="c_t_l" for="password_cand">Password :</label><br>
                    <input class="c_t_i" type="text" id="password_cand" name="stu_password" required><br>
                    <label class="c_t_l" for="password_c_cand">Confirm Password :</label><br>
                    <input class="c_t_i" type="text" id="password_c_cand" name="stu_c_password" required><br>
                    <input style="margin-left:7vw;font-size:1.5vw;margin-top:2vw;background-color:crimson;color:white;padding:0.5vw 1vw;cursor:pointer;" type="submit" name="Submit">
                </form>
                </div>
            </div>
        </div>
    </body>
</html>