<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once("header.php"); ?>
        <table class=" container table table-bordered table-hover">
            <tr class="text-center">
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>
            <?php
                $total = 0;
              
                if (!empty($_SESSION["cart"])) {
                   $id = implode(",", $_SESSION["cart"]);
                   $run = mysqli_query($con, "select * from book where ISBN  in ($id)");
                   if (!isset($_SESSION["qty"])) {
                        $_SESSION["qty"] = array_fill(0 , count($_SESSION["cart"]),1);
                   }
                   $index = 0;
                   while ($d = mysqli_fetch_array($run)) {?>
                        <tr>
                            <td><?php echo $d[1]; ?></td>
                            <td><?php echo "Rs." . $d[7]; ?></td>
                            <td><input type="text" class="form-control" readonly value="<?php echo $_SESSION["qty"][$index]; ?>" name="qty_<?php echo $index;?>"></td>
                            <td><?php echo $_SESSION["qty"][$index] * $d[7] ; ?></td>
                        </tr>   
               <?php 
                        $total +=  $_SESSION["qty"][$index] * $d[7] ;
                        $_SESSION["total"] = $total;
                        $index++;
                  }
                  ?>
							<tr>
                            <td>
                          <a href="AllProducts.php" class="btn btn-dark">Back</a>
                        </td>
                        <td>
                          <a href="clearcart.php" class="btn btn-dark">Clear Cart</a>
                        </td>
                        <td>
                          <a href="confirm.php" class="btn btn-dark">Confirm Order</a>
                        </td>
								<td colspan="2" class="text-right"><?php echo "Rs." . $total; ?></td>
							</tr>
							<?php
                } else {?>
                   <tr>

                       <td colspan="4" style="text-align: center;color:red;">No Item in Cart</td>
                   </tr>
               <?php }
                
            
            
            ?>

        </table>
    <?php require_once("footer.php"); ?>
</body>
</html>