<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css"
  rel="stylesheet"
/>
    
</head>
<body>


<section class="vh-100 bg-image"
  style="background-image: url('https://img.freepik.com/premium-photo/front-view-pile-books-with-copy-space_23-2148255858.jpg?w=2000');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form class="mx-1 mx-md-4" action="" method="post">

               

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

               
                
              
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" name="btn">Login</button>
                  </div>


                <p class="text-center text-muted mt-5 mb-0">Don't Have Account? <a href="Registration.php"
                    class="fw-bold text-body"><u><a href="Registration.php">Register Here Yourself </u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>
<?php
         if (isset($_POST["btn"])) {
            $email = $_POST["email"];
            $pswd = $_POST["password"];
    
            require_once("../connection.php");
            session_start();
            $login = "SELECT * FROM `user` where us_email = '$email' 
            and us_password = '$pswd'";
            $execute = mysqli_query($con, $login);
            $check = mysqli_num_rows($execute);
            
            

            if ($check > 0 ) {      
              $dataya = mysqli_fetch_array($execute);                      
                
                  $_SESSION["us_id"] =  $dataya[0];
                  $_SESSION["us_name"] =  $dataya[1];
                  $_SESSION["us_email"] =  $dataya[2];
                  header("location: Home.php");
               
            } 
            else {
                echo '<script>          
                alert("Invalid Credentials");
                </script>';
               
            }
            

         }
?>

