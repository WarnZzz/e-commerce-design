<?php
      require_once("files/header.php");
      require_once("files/function.php");
       ?>   
 <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
               <div class="row">
                  <div id="payment" class="card-block show p-0 col-12">
                     <div class="row align-item-center">
                        <div class="col-lg-8">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Payment Options</h4>
                                 </div>
                              </div>
                              <form method="post">
                              <div class="iq-card-body">
                                 <div class="card-lists">
                                    <div class="form-group">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" id="cod" name="cod" class="custom-control-input">
                                          <label class="custom-control-label" for="cod"> Cash On Delivery</label><br>
                                          <hr>
                                          <div class="col-lg-4">
                           <div class="iq-card">
                              <div class="iq-card-body">
                                 <h4 class="mb-2">Price Details</h4>
                                 <?php 
                                $sql = "SELECT * FROM cart WHERE user_id = $uid";
                                 $result = $conn->query($sql);
                                 $total =0;

                                if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                   ?>
                                 <div class="d-flex justify-content-between">
                                    <span> <?php 
                                             $pid = $row['product_id'];
                                             $sql="SELECT * FROM products WHERE product_id=$pid";
                                             $presult = $conn->query($sql);
                                             $prow = $presult->fetch_assoc();
                                             echo $prow['product_name'];
                                              ?></span>
                                    <span><strong><?php echo $prow['product_price'];
                                    $total =$total + $prow['product_price']; ?></strong></span>
                                 </div>
                                 <?php 
                                 }
                                 } ?>
                                 <div class="d-flex justify-content-between">
                                    <span>Delivery Charges</span>
                                    <span class="text-success">Free</span>
                                 </div>
                                 <hr>
                                 <div class="d-flex justify-content-between">
                                    <span>Amount Payable</span>
                                    <span><strong><?php echo $total; ?></strong></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>             <button type="submit" class="btn btn-primary"><a id="place-order" href="" class="btn btn-primary d-block mt-3 next">Order Confirm</a></button>
                                           
                                       </div>
                                    </div>
                                 </form>
                                 </div>
                                <hr>
                              </div>
                           </div>
                        
               </div>
               </div>
         </div>
      </div>
       <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $status = $_POST['cod'];
        $totalp = $total;
        $orderby = $uid;
        $currentDate = date('Y-m-d');
        // Validate the form data (you can add more validation as needed)
        if (empty($status) ) {
            echo "Please select cash on delivery option";
        } else {
            // Connect to the database
            require_once("files/function.php");
            }

            // Prepare and execute the SQL statement
            $stmt = $conn->prepare("INSERT INTO orders (order_date, order_status, order_by, order_total) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss",$currentDate, $status, $orderby, $totalp);
            if ($stmt->execute()) {
                echo "order registered successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement and the database connection
            $stmt->close();
            $conn->close();
        }
    
    ?> 
      <!-- Wrapper END -->
<?php require_once("files/footer.php") ?>