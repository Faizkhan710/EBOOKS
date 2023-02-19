<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("header.php");
    require_once("../connection.php");
    ?>
<div class="container-fluid">

    <form action="" method="post" enctype="multipart/form-data">
        <p>Enter Book Isbn</p>
        <input type="text" name="isbn" class="form-control">

        <p>Enter Book Name</p>
        <input type="text" name="name" class="form-control">


        <p>Select SubCategory</p>
        <select name="subcatname" class="form-control">
            <?php
            $fetch = "select * from subcategory";
            $run = mysqli_query($con, $fetch);
            $num = mysqli_num_rows($run);
            if ($num > 0) {
                while ($data = mysqli_fetch_array($run)) {
                    echo "<option value='$data[0]'>$data[1]</option>";
                }
            } else {
                echo "<option value='0'>Nothing to Show</option>";
            }


            ?>
            </select>




        <p>Select Author Name</p>
        <select name="aname" class="form-control">
            <?php
            $fetch = "select * from author";
            $run = mysqli_query($con, $fetch);
            $num = mysqli_num_rows($run);
            if ($num > 0) {
                while ($data = mysqli_fetch_array($run)) {
                    echo "<option value='$data[0]'>$data[1]</option>";
                }
            } else {
                echo "<option value='0'>Nothing to Show</option>";
            }


            ?>
            </select>




        <p>Select Publisher Name</p>
        <select name="pname" class="form-control">
            <?php
            $fetch = "select * from publisher";
            $run = mysqli_query($con, $fetch);
            $num = mysqli_num_rows($run);
            if ($num > 0) {
                while ($data = mysqli_fetch_array($run)) {
                    echo "<option value='$data[0]'>$data[1]</option>";
                }
            } else {
                echo "<option value='0'>Nothing to Show</option>";
            }


            ?>
            </select>



        <p>Enter Published Date</p>
        <input type="date" name="date" class="form-control">




        <p>Select Availability</p>
        <select name="availability" class="form-control">
        <option value="">Availability</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>

        </select>


        <p>Enter Price </p>
        <input type="number" name="Price" class="form-control">


        <p>Enter Description </p>
        <input type="text" name="Description" class="form-control">




        </select>
        <p>upload Product Image</p>
        <input type="file" name="myimage" onchange="lalala.src=window.URL.createObjectURL(this.files[0])"> 
        <img id="lalala" alt="" height="150px" width="150px">
        <br><br>


        <p>Upload pdf </p>
        <input type="text" name="pdf" class="form-control">


        <button type="submit" name="btn" class="btn btn-primary">Add Book</button>
    </form>



  

    <?php 


$select ="select * from book" ;
$query = mysqli_query($con , $select);
$exe = mysqli_num_rows($query);


if ($exe > 0) {
    echo "<div class='container-fluid'>
    <table class='table table-border' id='myTable'>
         <thead>
          <tr>
              <th>ISBN</th>
              <th>Name</th>
              <th>Subcategory Id</th>
              <th>Author Id</th>
              <th>Publisher Id</th>
              <th>Published Date</th>
              <th>Availability</th>
              <th>Price</th>
              <th>Description</th>
              <th>Image</th>
              <th>Pdf</th>
          </tr>
         </thead>
         <tbody>";
     while($rec = mysqli_fetch_array($query)){
          echo" <tr>
          <td>$rec[0]</td>
          <td>$rec[1]</td>
          <td>$rec[2]</td>
          <td>$rec[3]</td>
          <td>$rec[4]</td>
          <td>$rec[6]</td>
          <td>$rec[7]</td>
          <td>$rec[8]</td>
          <td>$rec[9]</td>
          <td>$rec[10]</td>
          <td>$rec[11]</td>
    
          
          </tr>";
     }
         echo "</tbody>
         </table>";
    }



?>














































    <?php

    if (isset($_POST["btn"])) {
        $id = $_POST["isbn"];
        $name = $_POST["name"];
        $sub = $_POST["subcatname"];     
        $auto = $_POST["aname"];     
        $pub = $_POST["pname"];        
        $date = $_POST["date"];
        $avail = $_POST["availability"];
        $price = $_POST["Price"];
        $desc = $_POST["Description"];
        $pdf = $_POST["pdf"];
        $image_name = $_FILES["myimage"]["name"];
        $imageLoc = $_FILES["myimage"]["tmp_name"];
        $imagetype = $_FILES["myimage"]["type"];
        $imagesize = $_FILES["myimage"]["size"];

        $Folder = "../image/" . $image_name;
        // Check Product With Same Name
        $query = "select * from book where name = '$name'";
        $execute = mysqli_query($con, $query);
        $category_number = mysqli_num_rows($execute);

        if ($category_number == 0) {
            if ($imagetype == "image/png" || $imagetype == "image/jpg"|| $imagetype == "image/jpeg") {
                if ($imagesize <= 5000000) {
                    $insert_query = "INSERT INTO `book`(`ISBN`, `name`, `SUBCATEGORY_ID`, `AUTHOR_ID`, `PUBLISHER_ID`, `published_date`, `avalaibility`, `price`, `description`, `image`, `book_pdf`) 
                                     VALUES ('$id','$name','$sub','$auto','$pub','$date','$avail','$price','$desc','$Folder','$pdf')";
                    $executee = mysqli_query($con, $insert_query);
                    move_uploaded_file($imageLoc, $Folder);
                    echo "Book Added";
                } else {
                   echo "Invalid Size";
                }               
            } else {
                echo "Invalid Extension";
            }
        } else {
            echo "<script>alert('Book Already Exist');</script>";
        }
    }
    ?>
    <?php
        require_once("footer.php");


       
    ?>
          
</body>

</html>