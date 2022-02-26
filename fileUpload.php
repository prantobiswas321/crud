<?php
session_start();
if(!isset($_SESSION["userEmail"])){
    header("location: userLogin.php");
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
        <title>File Upload</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="userHome.php">CRUD</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <div class="text-white fs-4 fw-bold mx-auto"><p>User</p></div>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="userHome.php">
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
                                            <a class="nav-link" href="fileUpload.php">File upload</a>
                                            <a class="nav-link" href="userHome.php">File & group info</a>
                                            <a class="nav-link" href="userLogout.php">Logout</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["userEmail"] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <br> <br>
                    <div class="container-fluid px-4">
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="userHome.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">File upload</li>
                        </ol>

                        <form class="container" action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input class="form-control" placeholder="File Name" name="file_name" type="text">
                        <label for="formFile" class="form-label"></label>
                            <input class="form-control" type="file" name="txt_name" id="formFile">
                        </div>
                        
                        <input class="btn btn-primary text-white" name="upload_btn" type="submit" value="Upload">
                                            
                        </form>
                        
                        <?php
                            $conn = mysqli_connect('localhost','root','','crud');
                            // if(mysqli_connect_errno()){
                            //     echo "connection fail";
                            // }
                            // else{
                            //     echo "connection OK";
                            // }
                            if(isset($_POST['upload_btn'])){
                                $file_name = $_POST['file_name'];
                                $txt_name = $_FILES['txt_name']['name'];
                                $tmp_name = $_FILES['txt_name']['tmp_name'];

                                $insert = "INSERT INTO file(file_name,txt_file) VALUES('$file_name','$txt_name')";

                                $run_insert = mysqli_query($conn,$insert);

                                if($run_insert===true){
                                    echo "File uploaded";
                                    move_uploaded_file($tmp_name,"upload/$txt_name");
                                }
                                else{
                                    echo "Failed, try again";
                                }

                            }

                           
                        ?>


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