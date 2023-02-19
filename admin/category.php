






<?php include_once("header.php"); ?>

<div class="container">
      <form method="post">
      
        <div class="input-group mb-3">
          <input type="name"  name="name" class="form-control" placeholder="name">
         
        </div>
        <br>
        <div class="row">
          <div class="col-3">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Add Category</button>
          </div>
         </div>
         </div>
</form>
         <br>

         <br>
         <br>
<div class="container">


<?php 



    $select ="select * from category" ;
    $query = mysqli_query($con , $select);
    $exe = mysqli_num_rows($query);


    if ($exe > 0) {
        echo "<div class='container-fluid'>
        <table class='table table-border' id='myTable'>
             <thead>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
               
                  <th>Delete</th>
                  <th>Edit</th>
              </tr>
             </thead>
             <tbody>";
         while($rec = mysqli_fetch_array($query)){
              echo" <tr>
              <td>$rec[0]</td>
              <td>$rec[1]</td>
              <td><a href='delcate.php?id=$rec[0]'><img src ='delete.png' width='50' height='50'></a></td>
              <td><a href='editcat.php?id=$rec[0]'><img src ='edit.png' width='50' height='50'></a></td>
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
   

        require_once("../connection.php");

        
            $query = "INSERT INTO `category`(`name`) 
            VALUES ('$name')";
            $run = mysqli_query($con , $query);
            if ($run == true) {
                echo '<script>          
                window.location.href="category.php";
                </script>';
            } else {
                echo mysqli_error($con);
            }
            
        
        
     
        

    }

?>



</body>
</html>








