






<?php include_once("header.php"); ?>

<div class="container">
      <form method="post">
      
        <div class="input-group mb-3">
          <input type="text"  name="name" class="form-control" placeholder="name" Required>
         
        </div>

        <div class="input-group mb-3">
        <select name="gender" class="form-control">
        <option value="">Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        
        </select>
        </div>
        <div class="input-group mb-3">
          <input type="text"  name="age" class="form-control" placeholder="Age" Required>
         
        </div>

        <div class="input-group mb-3">
          <input type="text"  name="book" class="form-control" placeholder="No of Books"Required >
         
        </div>


        <div class="input-group mb-3">
        <select name="language" class="form-control" Required>
        <option value="">Language</option>
        <option value="English">English</option>
        <option value="Urdu">Urdu</option>
        <option value="Pashto">Pashto</option>
        </select>
        </div>
        <select name="status" class="form-control" Required>
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
            <button type="submit" name="submit" class="btn btn-primary btn-block">Add Author Details </button>
          </div>
         </div>
         </div>
         </form>
         <br>

         <br>
         <br>
<div class="container">


<?php 



    $select ="select * from author" ;
    $query = mysqli_query($con , $select);
    $exe = mysqli_num_rows($query);


    if ($exe > 0) {
        echo "<div class='container-fluid'>
        <table class='table table-border' id='myTable'>
             <thead>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                 
                  <th>Gender</th>
                  <th>Age</th>
                  <th>No of books</th>
                  <th>Language</th>
                  <th>Subcategory Id</th>
               
                  <th>Delete</th>
                  <th>Edit</th>
              </tr>
             </thead>
             <tbody>";
         while($rec = mysqli_fetch_array($query)){
              echo" <tr>
              <td>$rec[0]</td>
              <td>$rec[1]</td>
              <td>$rec[3]</td>
              <td>$rec[4]</td>
              <td>$rec[5]</td>
              <td>$rec[6]</td>
              <td>$rec[2]</td>
        
              <td><a href='delaut.php?id=$rec[0]'><img src ='delete.png' width='50' height='50'></a></td>
              <td><a href='editaut.php?id=$rec[0]'><img src ='edit.png' width='50' height='50'></a></td>
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
        $gender =$_POST["gender"];
        $age = $_POST["age"];
        $book = $_POST["book"];
        $language = $_POST["language"];

     $drop =$_POST["status"];
   

        require_once("../connection.php");

     
            $query = "INSERT INTO `author`( `Name`, `SubCategory_Id`, `gender`, `age`, `no_of_books`, `language`) 
            VALUES ('$name','$drop','$gender',' $age',' $book','$language')";
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



</body>
</html>








