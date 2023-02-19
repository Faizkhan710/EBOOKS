<?php
include_once("../connection.php");
    $subid = $_GET["id"];
    $execute = mysqli_query($con , "select * from subcategory where id = '$subid'");
    $data = mysqli_fetch_array($execute);

?>

<?php include_once("header.php"); ?>


<div class="container">
      <form method="post">
      
        <div class="input-group mb-3">
          <input type="name"  name="name" class="form-control" placeholder="name" value="<?php echo $data[1]?>">
         
        </div>


        <select name="status" class="form-control" value="<?php echo $data[2]?>">
        <?php 
        $fetch ="select * from category";
        $run=mysqli_query($con, $fetch);
        $num=mysqli_num_rows($run);
        if($num > 0){
            while($data = mysqli_fetch_array($run)){
                echo "<option value='$data[0]'>$data[1]</option>";
            }
        }
        else{
            echo"<option value='0'>no data</option>";
        }    
        ?>
        </select>
        <br>
        <div class="row">
          <div class="col-3">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Edit SubCategory</button>
          </div>
         </div>
         </div>
         <br>

         <br>
         <br>




         <?php include_once("header.php"); ?>










<?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $status = $_POST["status"];

        $update = "UPDATE `subcategory` SET 
        `name`='$name',`Category_Id`='$status'
         WHERE id = $subid";

         $run = mysqli_query($con , $update);

         if ($run) {
             echo "<script>
             window.location.href='subcategory.php';
             </script>";
         } else {
             echo mysqli_error($con);
         }
         


       
        

    }

?>