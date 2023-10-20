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
                              <h4 class="card-title">Categories</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="admin_addcategory.php" class="btn btn-primary">Add New Category</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;">Category ID</th>
                                        <th style="width: 12%;">Category Name</th>
                                        <th style="width: 18%;">Category Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                   $sql = "SELECT * FROM category";
                                   $result = $conn->query($sql);

                                  if ($result->num_rows > 0) {
                                   while ($row = $result->fetch_assoc()) {
                                   ?>
                                  <tr>
                                  <td><?php echo $row['category_id']; ?></td>
                                  <td><?php echo $row['category_name']; ?></td>
                                  <td><?php echo $row['category_description']; ?></td>
                                  </tr>
                                  <?php
                                   }
                                  } else {
                                 ?>
                               <tr>
                               <td colspan="3">No categories found.</td>
                                 </tr>
                                <?php
                                 }
                                  ?>
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
      
