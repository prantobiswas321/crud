<?php
session_start();
if(!isset($_SESSION["adminEmail"])){
    header("location: adminLogin.php");
}
?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Admin Home</h1><?php echo $_SESSION["adminEmail"] ?>
    <a href="adminLogout.php">Logout</a>
</body>
</html> -->

<!-- delete user -->
<?php
                                
$conn = mysqli_connect('localhost','root','','crud');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    $delete = "DELETE FROM user WHERE user_id='$del_id'";
    $run_del = mysqli_query($conn,$delete);
    if($run_del === true){
        echo "Record has been deleted";
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
        <title>Admin Home</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="adminHome.php">CRUD</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="adminHome.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>



                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                    <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="adminHome.php">User List</a>
                                            <a class="nav-link" href="userRegister.php">Register</a>
                                            <a class="nav-link" href="adminLogout.php">Logout</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["adminEmail"] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <br> <br>
                    <div class="container-fluid px-4">
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="adminHome.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">User List</li>
                        </ol>

                                <br> <br>
                                <div class="container">
                                  <!-- <h2>Bordered Table</h2> -->
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                           $conn = mysqli_connect('localhost','root','','crud');
                                           $select = "SELECT * FROM user";
                                           $run = mysqli_query($conn,$select);
                                           while($row_user = mysqli_fetch_array($run)){
                                            $user_id = $row_user['user_id'];
                                            $user_name = $row_user['user_name'];
                                            $user_email = $row_user['user_email'];
                                            $user_status = $row_user['user_status'];
                                        ?>
                                      <tr>
                                        <td><?php echo $user_name ?></td>
                                        <td><?php echo $user_email ?></td>
                                        <td><a href="#"><?php echo $user_status ?></a></td>
                                        <td><a class="btn btn-success" href="userEdit.php?edit=<?php echo $user_id ?>">Edit</a></td>
                                        <td><a class="btn btn-danger" href="adminHome.php?del=<?php echo $user_id ?>">Delete</a></td>
                                      </tr>
                                      <?php } ?>
                                    </tbody>
                                  </table>
                                </div>

                       
                        
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
    </body>
</html>