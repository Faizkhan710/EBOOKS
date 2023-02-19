    
   <?php include_once("header.php"); ?> 
    
    
    
    
    <!-- inner page section -->
    <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="container">
    <div class="row">
    <?php
    $name = $_GET["n"];
    $query = "select * from book where SUBCATEGORY_ID = '$name'";
    $run =  mysqli_query($con,$query);
    $check = mysqli_num_rows($run);
    if ($check > 0) {
     while($x = mysqli_fetch_array($run)){?>
    <div class="col-md-4">
    <div class="card">
         <img src="<?php echo $x[10] ?>" alt="image not available" class="card-img-top">
         <div class="card-body">
         <b><p class="card-title text-uppercase"><?php echo $x[1] ?></p></b>
         <b><p class="card-title text-uppercase">Author Name <?php echo $x[3] ?></p></b>
         <p class="card-text text-danger">RS.<?php echo $x[8] ?></p>
         <button class= "btn btn-primary">BUY</button>
         </div>
    </div>
</div>
    <?php }}
    else {
        echo "<option value='0'>Nothing to Show</option>";
    }?>
      </section>
     
      <!-- end product section -->

      
      <?php include_once("footer.php"); ?>
      