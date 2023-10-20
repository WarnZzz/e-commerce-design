
    <?php
      require_once("files/header.php");
      require_once("files/footer.php")
       ?>
         <div id="content-page" class="content-page">
            <div class="row">
               <div id="address" class="card-block show p-0 col-12">
               <div class="row align-item-center">
                  <div class="col-lg-8">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add New Address</h4>
                           </div>
                           <div class="iq-card-body">
                              <form method="post">
                                 <div class="row mt-3">
                                    <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Full Name: *</label> 
                                             <input type="text" class="form-control" name="fname" required="">
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Mobile Number: *</label> 
                                             <input type="text" class="form-control" name="mno" required="">
                                          </div>
                                       </div>
                                        <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Flat, House No: *</label> 
                                             <input type="text" class="form-control" name="houseno" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Town/City: *</label> 
                                             <input type="text" class="form-control" name="city" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Pincode: *</label> 
                                             <input type="text" class="form-control" name="pincode" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>State: *</label> 
                                             <input type="text" class="form-control" name="state" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary"><a id="deliver-address" href="payment.php" class="btn btn-primary d-block mt-1 next">Deliver To this Address</a></button> 
                                       </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
         <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $fname = $_POST['fname'];
        $mobilenumber = $_POST['mno'];
        $houseno = $_POST['houseno'];
        $city = $_POST['city'];
        $pin = $_POST['pincode'];
       $state = $_POST['state'];

        // Validate the form data (you can add more validation as needed)
        if (empty($fname) || empty($mobilenumber) || empty($houseno) || empty($city) || empty($pin) || empty($state)) {
            echo "Please fill in all required fields.";
        } else {
            // Connect to the database
            require_once("files/function.php");
            }

            // Prepare and execute the SQL statement
            $stmt = $conn->prepare("INSERT INTO delivery (full name, mobile, house_no., city, pincode, state,user_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss",$fname, $mobilenumber, $houseno, $city, $pin, $state,$uid);
            if ($stmt->execute()) {
                echo "address registered successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement and the database connection
            $stmt->close();
            $conn->close();
        }
    
    ?> 
    <?php require_once("files/footer.php") ?> 
          