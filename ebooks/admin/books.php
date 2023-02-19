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
        <input type="text" name="isbn" class="form-control" Required>

        <p>Enter Book Name</p>
        <input type="text" name="name" class="form-control" Required>


        <p>Select SubCategory</p>
        <select name="subcatname" class="form-control" Required>
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
        <select name="aname" class="form-control" Required>
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
        <select name="pname" class="form-control" Required>
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









      

        <p>Select Category</p>
        
        <select name="cat" class="form-control" Required>
            <?php
            $fetch = "select * from category";
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
        <input type="date" name="date" class="form-control" Required>




        <div class="input-group mb-3">
        <select name="availability" class="form-control" Required>
        <option value="">Availability</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>

        </select>
        </div>

        <p>Enter Price </p>
        <input type="number" name="Price" class="form-control" Required>


        <p>Enter Description </p>
        <input type="text" name="Description" class="form-control" Required>




        </select>
        <p>upload Product Image</p>
        <input type="file" name="myimage" onchange="lalala.src=window.URL.createObjectURL(this.files[0])" Required> 
        <img id="lalala" alt="" height="150px" width="150px">
        <br><br>

        </select>
        <p>upload pdf</p>
        <input type="file" name="mypdf" onchange="gotofile.src=window.URL.createObjectURL(this.files[0])" Required> 
        <img id="gotofile" alt="" height="150px" width="150px">
        <br><br>

        <button type="submit" name="btn" class="btn btn-primary">Add Book</button>
    </form>



  

  


    <?php

    if (isset($_POST["btn"])) {
        $id = $_POST["isbn"];
        $name = $_POST["name"];
        $sub = $_POST["subcatname"];
        $auto = $_POST["aname"];
        $pub = $_POST["pname"];
        $cate = $_POST["cat"];
        $date = $_POST["date"];
        $avail = $_POST["availability"];
        $price = $_POST["Price"];
        $desc = $_POST["Description"];
       
        $image_name = $_FILES["myimage"]["name"];
        $imageLoc = $_FILES["myimage"]["tmp_name"];
        $imagetype = $_FILES["myimage"]["type"];
        $imagesize = $_FILES["myimage"]["size"];
        $pdf_name = $_FILES["mypdf"]["name"];
        $pdfLoc = $_FILES["mypdf"]["tmp_name"];
        $pdftype = $_FILES["mypdf"]["type"];
        $pdfsize = $_FILES["mypdf"]["size"];

        $Folder = "../image/" . $image_name;
        $Folders = "../pdf/" . $pdf_name;
        // Check Product With Same Name
        $query1 = "select * from book where name = '$name'";
        $execute = mysqli_query($con, $query1);
        $category_number = mysqli_num_rows($execute);

        if ($category_number ===0) {
            if (($imagetype == "image/png" || $imagetype == "image/jpg"|| $imagetype == "image/jpeg") && $pdftype == "application/pdf") {
                if ($imagesize <= 5000000) {
                    $insert_query = "INSERT INTO `book`(`ISBN`, `name`, `SUBCATEGORY_ID`, `AUTHOR_ID`, `PUBLISHER_ID`, `CATEGORY_ID`, `published_date`, `avalaibility`, `price`, `description`, `image`, `book_pdf`)
                     VALUES ('$id','$name','$sub','$auto','$pub','$cate','$date','$avail','$price','$desc','$Folder','$Folders')";
                    $executee = mysqli_query($con, $insert_query);
                    if(move_uploaded_file($imageLoc, $Folder)){
                    echo "<script>alert('Book Added');</script>";
                    }
                    if(move_uploaded_file($pdfLoc, $Folders)){
                        echo "<script>alert('pdf Added');</script>";
                        }
                    else {
                        echo "<script>alert('img prblm');</script>";
                    }
                  
                } 
                
                else {
                   echo "Invalid Size";
                }               
            } else {
                echo "Invalid Extension";
            }
        } else {
            echo "<script>alert('Book Already Exist');</script>";
        }
        
    }
    else{
        echo mysqli_error($con);
    }
    ?>
    
    <?php
        require_once("footer.php");


       
    ?>
          
</body>

<?php 
$select ="select * from book" ;
$query = mysqli_query($con , $select);
$exe = mysqli_num_rows($query);


if ($exe > 0) {
    echo "<div style='overflow-x:auto;'>
    <table class='table table-border' id='myTable'>
         <thead>
          <tr>
              <th>ISBN</th>
              <th>Name</th>
              <th>Subcategory Id</th>
              <th>Author Id</th>
              <th>Publisher Id</th>
              <th>Category Id</th>
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
          <td>$rec[5]</td>
          <td>$rec[6]</td>
          <td>$rec[7]</td>
          <td>$rec[8]</td>
          <td>$rec[9]</td>
          <td><a href='$rec[10]' target='_blank'><img src='$rec[10]' width=100 hieght=100></img></a></td>
          <td>$rec[11]</td>
    
          
          </tr>";
     }
         echo "</tbody>
         </table>";
    }



?>
</html>