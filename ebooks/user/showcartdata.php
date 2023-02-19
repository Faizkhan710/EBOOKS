<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include_once("header.php"); ?>

<div class="container">
<table>
    <tr>
        <th>name</th>
        <th>image</th>
        <th>price</th>
        <th>quantity</th>
        <th>total</th>
    </tr>

    <?php 
    $total = 0;
    if(empty($_SESSION["mycart"]) == True){
        ?>
        <tr>
            <td class="text-danger text-center">Nothing added to cart; (</td>
        </tr>
        
            <?php } else{
                $i = 0;
                if(!isset($_SESSION["quant"])) {
                    $_SESSION["quant"] = array_fill(0, count($_SESSION["mycart"]), 1);
            }
         
            $sarlids = implode(",",$_SESSION["mycart"]);
            $fetch = "SELECT * FROM `book` where ISBN in ($sarlids)";
            $run = mysqli_query($con, $fetch);

            while($d = mysqli_fetch_array($run)){ ?>
            <tr>
                <td><?php echo $d[1] ?></td>
                <td><img src="<?php  echo $d[10]?>" alt="" width="100" height="100"></td>
                <td><?php echo "RS " . $d[8]?> </td>
                <td><input type="number" class="form-control" value="<?php echo $_SESSION["quant"][$i]?>"></td>
                <td><?php echo "RS " . $d[8] * $_SESSION["quant"][$i]; ?></td>
            </tr>

            <?php $total = $total + ($d[8] * $_SESSION["quant"][$i]);
            $i++; }
  }
  ?>
  <tr>
      <th class="text-danger text-right" colspan="4">GRAND TOTAL</th>
      <th class="text-danger text-right"><?php echo "RS " . $total; ?></th>
  </tr>
</table>

<div class="tecxt-right">
<a href="clearcart.php" class="btn btn-dark">Clear</a>
<a href="" class="btn btn-success">Checkout</a>

</div>
</div>





<?php include_once("footer.php"); ?>
</body>
</html>