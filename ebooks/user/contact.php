  
  <?php include_once("header.php"); ?>
  
  
  <!-- inner page section -->
  <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Contact us</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form method="post" action="">
                        <fieldset>
                           <input type="text" placeholder="Enter your full name" name="name" required />
                           <input type="email" placeholder="Enter your email address" name="email" required />
                           <input type="text" placeholder="Enter phonenumber" name="phone" required />
                           <textarea placeholder="Enter your message" name="message" required></textarea>
                           <input type="submit" value="Submit" name="submit"/>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end why section -->
      <!-- arrival section -->
      <section class="arrival_section">
         <div class="container">
            <div class="box">
               <div class="arrival_bg_box">
                  <img src="images/arrival-bg.png" alt="">
               </div>
               <div class="row">
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h2>
                           #NewArrivals
                        </h2>
                     </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                        Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                     </p>
                     <a href="">
                     Shop Now
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end arrival section -->


      <?php include_once("footer.php"); ?>



      
<?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $message = $_POST["message"];
   
   
   
   

        require_once("../connection.php");

        if ($check == 0) {
            $query = "INSERT INTO `contact`( `Name`, `Phonenumber`, `Email`, `Message`)
            VALUES ('$name','$phone','$email','$message')";
            $run = mysqli_query($con , $query);
            if ($run == true) {
                echo '<script> 
                alert("Record send successfully");         
                window.location.href="contact.php";
                </script>';
            } else {
                echo mysqli_error($con);
            }
            
        } 
        
        else {
            echo '<script>          
            alert("messade has not send");
            </script>';
        }
        

    }

?>



