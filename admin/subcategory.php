






<?php include_once("header.php"); ?>

<div class="container">
      <form method="post">
      
        <div class="input-group mb-3">
          <input type="name"  name="name" class="form-control" placeholder="name">
         
        </div>
        <select name="status" class="form-control">
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
            <button type="submit" name="submit" class="btn btn-primary btn-block">Add SubCategory</button>
          </div>
         </div>
         </div>
         </form>
         <br>

         <br>
         <br>
<div class="container">


<?php 



    $select ="select * from subcategory" ;
    $query = mysqli_query($con , $select);
    $exe = mysqli_num_rows($query);


    if ($exe > 0) {
        echo "<div class='container-fluid'>
        <table class='table table-border' id='myTable'>
             <thead>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Category Id</th>
               
                  <th>Delete</th>
                  <th>Edit</th>
              </tr>
             </thead>
             <tbody>";
         while($rec = mysqli_fetch_array($query)){
              echo" <tr>
              <td>$rec[0]</td>
              <td>$rec[1]</td>
              <td>$rec[2]</td>
        
              <td><a href='delsub.php?id=$rec[0]'><img src ='delete.png' width='50' height='50'></a></td>
              <td><a href='editsub.php?id=$rec[0]'><img src ='edit.png' width='50' height='50'></a></td>
              </tr>";
         }
             echo "</tbody>
             </table>";
        }

 
    
    ?>



</div>



         <?php include_once("footer.php"); ?>
         


 



<?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $drop =$_POST["status"];
   

        require_once("../connection.php");

     
            $query = "INSERT INTO `subcategory`(`Name`, `Category_Id`) 
            VALUES ('$name','$drop')";
            $run = mysqli_query($con , $query);
            if ($run == true) {
                echo '<script>          
                window.location.href="subcategory.php";
                </script>';
            } else {
                echo mysqli_error($con);
            }
            
        }
        
      

    

?>



</body>
</html>








