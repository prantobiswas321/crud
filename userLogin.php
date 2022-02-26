<?php

$host="localhost";
$user="root";
$password="";
$db="crud";

session_start();

$data=mysqli_connect($host,$user, $password, $db);
if($data===false){
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $userEmail = $_POST["userEmail"];
    $userPassword= $_POST["userPassword"];

    $sql="SELECT * from user where user_email='".$userEmail."' AND user_password='".$userPassword."'";

    $result = mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row["user_email"] AND $row["user_status"]=='active'){
        $_SESSION["userEmail"] = $userEmail;
        header("location: userHome.php");
    }
    else if($row["user_status"]=='block'){
        echo '<script>alert("User blocked, contact with admin")</script>';
    }
    else{
        echo '<script>alert("Email or Password is incorrect")</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">User Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="userEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="userPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            
                                            <div class="text-center mt-4 mb-0">
                                                <input class="btn text-white bg-primary" type="submit" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>