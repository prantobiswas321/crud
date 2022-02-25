<?php 
    $conn=mysqli_connect('localhost','root','','crud');

    if(isset($_POST['submit_btn'])){
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        // $userName = $_POST['userName'];
        $userStatus = 'active';

        $insert = "INSERT INTO user(user_name,user_email,user_password,user_status) VALUES('$userName','$userEmail','$userPassword','$userStatus')";
        $run_insert = mysqli_query($conn,$insert);
        if($run_insert === true){
            echo "Data has been inserted";
        }
        else{
            echo "Failed, try again";
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
        <title>Login - SB Admin</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="inputName" name="userName" type="text" placeholder="Username" />
                                                <label for="inputEmail">Username</label>
                                        </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="userEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="userPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            
                                            <div class="text-center mt-4 mb-0">
                                                <input class="btn text-white bg-primary" name="submit_btn" type="submit" value="Register">
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