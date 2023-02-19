<?php include_once("header.php"); ?>


<?php 



    $select ="select * from contact" ;
    $query = mysqli_query($con , $select);
    $exe = mysqli_num_rows($query);


    if ($exe > 0) {
        echo "<div class='container-fluid'>
        <table class='table table-border' id='myTable'>
             <thead>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>Message</th>
               <th>Delete</th>
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
              <td><a href='delcon.php?id=$rec[0]'><img src ='delete.png' width='50' height='50'></a></td>
              </tr>";
         }
             echo "</tbody>
             </table>";
        }

 
    
    ?>





<?php include_once("footer.php"); ?>