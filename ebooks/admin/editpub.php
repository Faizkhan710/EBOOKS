<?php
include_once("../connection.php");
    $pubid = $_GET["id"];
    $execute = mysqli_query($con , "select * from publisher where id = '$pubid'");
    $data = mysqli_fetch_array($execute);

?>

                 


<?php include_once("header.php"); ?>

<div class="container">
      <form method="post">
      
        <div class="input-group mb-3">
          <input type="name"  name="name" class="form-control" placeholder="name" value="<?php echo $data[1]?>">
         
        </div>
        
        <div class="input-group mb-3">
          <input type="address"  name="address" class="form-control" placeholder="address" value="<?php echo $data[2]?>">
         
        </div>
        <br>
        <div class="row">
          <div class="col-3">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Edit Publisher</button>
          </div>
         </div>
         </div>
         <br>

         <br>
         <br>





         <?php include_once("footer.php"); ?>







<?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $address = $_POST["address"];
     

        $update = "UPDATE `publisher` SET 
        `name`='$name',`address`='$address'
         WHERE id = $pubid";

         $run = mysqli_query($con , $update);

         if ($run) {
             echo "<script>
             window.location.href='publisher.php';
             </script>";
         } else {
             echo mysqli_error($con);
         }
         


       
        

    }

?>