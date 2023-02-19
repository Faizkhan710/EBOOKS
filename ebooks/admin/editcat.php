<?php
include_once("../connection.php");
    $catid = $_GET["id"];
    $execute = mysqli_query($con , "select * from category where id = '$catid'");
    $data = mysqli_fetch_array($execute);

?>

                 


<?php include_once("header.php"); ?>

<div class="container">
      <form method="post">
      
        <div class="input-group mb-3">
          <input type="name"  name="name" class="form-control" placeholder="name" value="<?php echo $data[1]?>">
         
        </div>
        <br>
        <div class="row">
          <div class="col-3">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Edit Category</button>
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
     

        $update = "UPDATE `category` SET 
        `name`='$name'
         WHERE id = $catid";

         $run = mysqli_query($con , $update);

         if ($run) {
             echo "<script>
             window.location.href='category.php';
             </script>";
         } else {
             echo mysqli_error($con);
         }
         


       
        

    }

?>