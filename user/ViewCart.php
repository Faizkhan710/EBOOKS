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

    <form action="" method="post">
        <table class="container table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    if(!empty($_SESSION["cart"])){
                        if (!isset($_SESSION["qty_array"])) {
                            $_SESSION["qty_array"] = array_fill(0, count($_SESSION["cart"]),1);
                        }
                        $index = 0;
                
                        $id =  implode(",",$_SESSION["cart"] );
                        $sql = "select * from book where id in ($id)";
                        $run = mysqli_query($con , $sql);
                        while($d = mysqli_fetch_array($run)){
                            ?>
                            <tr>
                                <td><?php echo $d[1]; ?></td>
                                <td><?php echo $d[2]; ?></td>
                                <td><?php echo  $_SESSION["qty_array"][$index]?></td>
                                <td><?php echo $d[2]*$_SESSION["qty_array"][$index] ; ?></th>
                                <?php $total += $d[2]*$_SESSION["qty_array"][$index] ; ?>
                            </tr>

                        <?php }
                    }
                    else{
                        echo "<tr>
                            <td colspan='4' style='text-align:center'>No Item Found</td>
                        </tr>";
                    }

                ?>
                <tr>
                    <td  colspan='4' style="text-align:center"><?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>
    </form>

    <?php require_once("footer.php"); ?>
</body>
</html>