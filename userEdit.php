<?php
session_start();
if(!isset($_SESSION["adminEmail"])){
    header("location: adminLogin.php");
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
        <title>Edit User</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit User</h3></div>
                                    <div class="card-body">

                                    <!-- for edit user -->
                                    <?php
                                
                                    $conn = mysqli_connect('localhost','root','','crud');
                                    if(isset($_GET['edit'])){
                                        $edit_id = $_GET['edit'];
                                        

                                        $select = "SELECT * FROM user WHERE user_id='$edit_id'";
                                           $run = mysqli_query($conn,$select);
                                           $row_user = mysqli_fetch_array($run);
                                            // $user_id = $row_user['user_id'];
                                            $user_name = $row_user['user_name'];
                                            $user_email = $row_user['user_email'];
                                            $user_password = $row_user['user_password'];
                                            $user_status = $row_user['user_status'];
                                    }
                                    
                                    ?>

                                        <form action="" method="POST">
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="inputName" name="userName" value="<?php echo $user_name ?>" type="text" placeholder="Username" />
                                                <label for="inputEmail">Username</label>
                                        </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="userEmail" value="<?php echo $user_email ?>" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="userPassword" value="<?php echo $user_password ?>" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputText" name="userStatus" value="<?php echo $user_status ?>" type="text" placeholder="User Status" />
                                                <label for="inputText">Status</label>
                                            </div>
                                            
                                            <div class="text-center mt-4 mb-0">
                                                <input class="btn text-white bg-primary" name="submit_btn" type="submit" value="Update">
                                            </div>
                                            
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

            <?php 
                $conn=mysqli_connect('localhost','root','','crud');

                if(isset($_POST['submit_btn'])){
                    $euserName = $_POST['userName'];
                    $euserEmail = $_POST['userEmail'];
                    $euserPassword = $_POST['userPassword'];
                    $euserStatus = $_POST['userStatus'];
                
                    $update = "UPDATE user SET user_name='$euserName', user_email='$euserEmail', user_password='$euserPassword', user_status='$euserStatus' WHERE user_id='$edit_id'";
                    $run_update = mysqli_query($conn,$update);
                    if($run_update === true){
                        // echo "Data has been updated";
                        header("location: adminHome.php");
                    }
                    else{
                        echo "Failed, try again";
                    }
                }
            
            
            ?>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>