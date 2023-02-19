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
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" required/>
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" required />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="tel" id="form3Example3cg" class="form-control form-control-lg" name="phone" required />
                  <label class="form-label" for="form3Example3cg">Your Phone Number</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3cg" class="form-control form-control-lg" name="address" required />
                  <label class="form-label" for="form3Example3cg">Your Address</label>
                </div>
                <div class="form-outline mb-4">
                  <select name="package" class="form-control">
                  <option value="">Select Package</option>
                    <option value="0">No Package</option>
                    <?php
                    require_once("../connection.php");
                    $fetch = "select * from package";
                    $run = mysqli_query($con, $fetch);
                    $num = mysqli_num_rows($run);
                    if ($num > 0) {
                        while ($data = mysqli_fetch_array($run)) {
                            echo "<option value='$data[0]'>$data[1]</option>";
                        }
                    }  
                    ?>
    
                  </select>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" required />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="cpassword" required/>
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" required />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" name="btn">Register</button>
                  </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u><a href="Login.php">Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>






<?php
    if (isset($_POST["btn"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pswd = $_POST["password"];
        $cpswd = $_POST["cpassword"];
        $phone = $_POST["phone"];
        $add = $_POST["address"];
        $pack = $_POST["package"];


        require_once("../connection.php");
        $fetch2 = "select * from user where us_email = '$email'";
        $run2 = mysqli_query($con, $fetch2);
        $num1 = mysqli_num_rows($run2);
        if ($num1 == 0) {
          if ($pswd == $cpswd) {
            $query = "INSERT INTO `user`( `us_name`, `us_email`, `us_password`, `Address`, `PhoneNumber`, `PackageId`) 
            VALUES ('$name','$email','$pswd','$add','$phone','$pack')";
             $run3 = mysqli_query($con , $query);
             if ($run3 == true) {
                 echo '<script>          
                 window.location.href="Login.php";
                 </script>';
             } else {
                 echo mysqli_error($con);
             }
             
         } 
         
         else {
             echo '<script>          
             alert("Password Does not match");
             </script>';
         }
        } else {
          echo '<script>          
          alert("Email Already Exists");
          </script>';
        }
        
      
        

    }

?>



</body>
</html>