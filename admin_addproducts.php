<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location:admin-login.php");
    exit;
} require_once("files/admin_header.php") ?>
<!--page content-->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add Products</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form method="post" action="admin_addproducts.php">
                              <div class="form-group">
                                 <label for productname>Product Name:</label>
                                 <input type="text" name="productname" class="form-control" placeholder="Product Name">
                              </div>
                              <div class="form-group">
                                 <label for="categoryid">Product Category:</label>
                                 <select class="form-control" name="categoryid" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Product Category</option>
                                    <option value="1">Microprocessor</option>
                                    <option value="2">Graphic Card</option> 
                                    <option value="3">Storage</option> 
                                    <option value="4">Power supply</option> 
                                    <option value="5">Laptop</option> 
                                    <option value="6">Monitor</option> 
                                    <option value="7">Keyboard</option> 
                                    <option value="8">Mouse</option> 
                                    <option value="9">Case</option>
                                    <option value="10">RAM</option>
                                    <option value="10">MotherBoard</option>    
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="seller">Product seller:</label>
                                 <input type="text" class="form-control" name="seller" placeholder="Seller Name">
                              </div>
                              <div class="form-group">
                                 <label>Product Image:</label>
                                 <div>
                                    <label for="productphoto">Product Image:</label>
                                    <input type="file" name="productphoto" id="productPhoto"><br>
                                  </div>
                              </div>
                              <div class="form-group">
                                 <label for="price">Product Price:</label>
                                 <input type="text" class="form-control" name="price" placeholder="Price">
                              </div>
                              <div class="form-group">
                                 <label for="productsdetails">Product Specification:</label>
                                 <textarea class="form-control" rows="4" name="productdetails"></textarea>
                              </div>
                              <div>
                                 <label for="quantity">Quantity</label>
                                 <input type="number" name="quantity" placeholder="quantity" min="1" max="100" class="form-control">
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn btn-danger">Reset</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--page content ends-->
      <?php 
      if($_SERVER['REQUEST_METHOD']==='POST') {
      	// Get the form data
        $productname = $_POST['productname'];
        $categoryid = $_POST['categoryid'];
        $productphoto=$_POST['productphoto'];
        $price = $_POST['price'];
        $productdetails = $_POST['productdetails'];
        $quantity = $_POST['quantity'];
        $seller = $_POST['seller'];


         // Validate the form data (you can add more validation as needed)
        if (empty($productname) || empty($categoryid) || empty($productphoto) || empty($price) || empty($productdetails) || empty($quantity) || empty($seller)) {
            echo "Please fill in all required fields.";
        } else {
            require_once("files/function.php");
            }
             // Prepare and execute the SQL statement
            $stmt = $conn->prepare("INSERT INTO products (product_name,category_id,product_photos,product_price,product_details,Seller,quantity) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss",$productname, $categoryid, $productphoto, $price, $productdetails, $seller, $quantity);
            if ($stmt->execute()) {
                echo "Products registered successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement and the database connection
            $stmt->close();
            $conn->close();
        }
      ?>
      <?php require_once("files/footer.php") ?>