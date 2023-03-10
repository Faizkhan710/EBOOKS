<?php
    session_start();
    require_once("../connection.php");

    if (!isset($_SESSION['us_id'])){
        header("location:login.php");
    }
    
    
    
    

?>
    
    

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>EBooks</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="Home.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Book</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
              
            </div>
            <div class="col-lg-3 col-6 text-right">
                
                <a href="viewcartitem.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <?php
                        if (isset($_SESSION["cart"])) {?>
                            <span class="badge"><?php echo count($_SESSION["cart"]); ?></span>

                      <?php  } else { ?>
                           <span class="badge">0</span>

                   <?php     }
                        
                    ?>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden">
                       <?php
                            require_once("../Connection.php");
                            $go = mysqli_query($con, "select * from subcategory");
                            $num = mysqli_num_rows($go);
                            if ($num > 0 ) {
                                while($d = mysqli_fetch_array($go)){
                                   echo "<a href='Product.php?Id=$d[0]' class='nav-item nav-link'>                                       
                                             $d[1]                                 
                                    </a>";
                               }
                            } else {
                              ?>  <a href="" class="nav-item nav-link">
                                       No Category Found
                                    </a>
                          <?php  }
                            

                       ?>
                        

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="Home.php" class="nav-item nav-link active">Home</a>
                            <a href="allproducts.php" class="nav-item nav-link">Books</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                <?php
                            require_once("../Connection.php");
                            $go = mysqli_query($con, "select * from Author");
                            $num = mysqli_num_rows($go);
                            if ($num > 0 ) {
                                while($d = mysqli_fetch_array($go)){
                                   echo "<a href='Author.php?id=$d[0]' class='dropdown-item'>                                       
                                             $d[1]                                 
                                    </a>";
                               }
                            } else {
                              ?>  <a href="" class="nav-item nav-link">
                                       No Author Found
                                    </a>
                          <?php  }
                            

                       ?>
                                    
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>

                        <div class="navbar-nav ml-auto py-0">
                            <a href="../Logout.php" class="nav-item nav-link">Logout</a>
                            <a href="#" class="nav-item nav-link"><?php echo $_SESSION['us_name']; ?></a>
                        </div>
                    </div>
                </nav>
            
                   
                       
                
            </div>
        </div>
    </div>
</body>
</html>