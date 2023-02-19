<?php
include_once("../connection.php");
    $autid = $_GET["id"];
    $execute = mysqli_query($con , "select * from author where id = '$autid'");
    $data = mysqli_fetch_array($execute);

?>


<?php include_once("header.php"); ?>



<div class="container">
      <form method="post">
      
        <div class="input-group mb-3">
          <input type="text"  name="name" class="form-control" placeholder="name" value="<?php echo $data[1]?>" >
         
        </div>

        <div class="input-group mb-3">
        <select name="gender" class="form-control" >
        <option value="">Gender</option>
        <option value="Male"<?php if($data[3] == "Male") { echo "selected";} ?>>Male</option>
        <option value="Female"<?php if($data[3] == "Female") { echo "selected";} ?>>Female</option>
        
        </select>
        </div>
        <div class="input-group mb-3">
          <input type="text"  name="age" class="form-control" placeholder="Age" value="<?php echo $data[4]?>">
         
        </div>

        <div class="input-group mb-3">
          <input type="text"  name="book" class="form-control" placeholder="No of Books" value="<?php echo $data[5]?>">
         
        </div>


        <div class="input-group mb-3">
        <select name="language" class="form-control" >
        <option value="">Language</option>
        <option value="English"<?php if($data[6] == "English") { echo "selected";} ?>>English</option>
        <option value="Urdu"<?php if($data[6] == "Urdu") { echo "selected";} ?>>Urdu</option>
        <option value="Pashto" <?php if($data[6] == "Pashto") { echo "selected";} ?>>Pashto</option>
        </select>
        </div>
        <select name="status" class="form-control" value="<?php echo $data[2]?>">
        <?php 
        $fetch ="select * from subcategory";
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
            <button type="submit" name="submit" class="btn btn-primary btn-block">Edit Author Details </button>
          </div>
         </div>
         </div>





































<?php include_once("footer.php"); ?>












<?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $gender =$_POST["gender"];
        $age = $_POST["age"];
        $book = $_POST["book"];
        $language = $_POST["language"];

     $drop =$_POST["status"];
   

        require_once("../connection.php");

     
            $query = "UPDATE `author` SET `Name`=' $name',`SubCategory_Id`='$drop',`gender`='$gender',`age`=' $age',`no_of_books`='$book',`language`='$language' WHERE id = $autid";
            $run = mysqli_query($con,$query);
            if ($run == true) {
                echo '<script>          
                window.location.href="author.php";
                </script>';
            } else {
                echo mysqli_error($con);
            }
            
        }
        
      

    

?>

