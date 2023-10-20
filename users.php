<?php require_once("files/admin_header.php");
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
                              <h4 class="card-title">Users</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">User ID</th>
                                        <th style="width: 12%;">User Name</th>
                                        <th style="width: 12%;">Address</th>
                                        <th style="width: 12%;">Country</th>
                                        <th style="width: 12%;">City</th>
                                        <th style="width: 12%;">Phone</th>
                                        <th style="width: 12%;">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                   $sql = "SELECT * FROM users";
                                   $result = $conn->query($sql);

                                  if ($result->num_rows > 0) {
                                   while ($row = $result->fetch_assoc()) {
                                   ?>
                                  <tr>
                                  <td><?php echo $row['user_id']; ?></td>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['address']; ?></td>
                                  <td><?php echo $row['country']; ?></td>
                                  <td><?php echo $row['city']; ?></td>
                                  <td><?php echo $row['phone']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                  </tr>
                                  <?php
                                   }
                                  } else {
                                 ?>
                               <tr>
                               <td colspan="3">No users found.</td>
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
      