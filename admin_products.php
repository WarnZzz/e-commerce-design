<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location:admin-login.php");
    exit;
} require_once("files/admin_header.php");
       require_once("files/footer.php");
       require_once("files/function.php");
  ?>
 <!--page content-->
 <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Products</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="admin_addproducts.php" class="btn btn-primary">Add New Products</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;">Product ID</th>
                                        <th style="width: 12%;">Product Image</th>
                                        <th style="width: 15%;">Product Name</th>
                                        <th style="width: 15%;">Category</th>
                                        <th style="width: 18%;">Product Description</th>
                                        <th style="width: 7%;">Product Price</th>
                                        <th style="width: 7%;">Seller</th>
                                        <th style="width: 15%;">Quantity</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $sql = "SELECT * FROM products";
                                 $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                   ?>
                                   <tr>
                                   <td><?php echo $row['product_id']; ?></td>
                                    <td>
                                    <?php 
                                     $photo = $row['product_photos'];
                                                 ?>
                                    <img src="images/browse-products/<?php echo $photo;?>"alt="" class="img-fluid rounded w-100">
                                       
                                     </td>
                                   <td><?php echo $row['product_name']; ?></td>
                                   <td>
                                   <?php 
                                   $cid = $row['category_id'];
                                    $sql = "SELECT category_name FROM category WHERE category_id='$cid'";
                                   $catResult = $conn->query($sql);
                                   if ($catResult->num_rows > 0) {
                                   $catRow = $catResult->fetch_assoc();
                                  echo $catRow['category_name'];
                                 } else {
                                 echo "Category not found";
                                }
                               ?>
                               </td>
                              <td><?php echo $row['product_details']; ?></td>
                              <td><?php echo $row['product_price']; ?></td>
                              <td><?php echo $row['Seller']; ?></td>
                              <td><?php echo $row['quantity']; ?></td>
                             
                                         <?php
                                 }
                                 } else {
                                     ?>
                                 <tr>
                                <td colspan="8">No products found.</td>
                            
                                  <?php
                                    }
                                    ?>
                                    </tr>
                               </tbody>
                            </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>