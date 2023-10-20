        <?php 
        require_once("files/header.php");
         ?>
 <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 similar-detail">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Products</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
    <div class="iq-card-body"> 
        <?php 
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $counter = 0;
            echo '<div class="row">'; // Start the row outside the while loop
            while ($row = $result->fetch_assoc()) {
                if ($counter % 4 == 0 && $counter != 0) {
                    echo '</div><div class="row">'; // Close the previous row and start a new row for every 4th product
                }
                ?> 
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                        <div class="iq-card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="col-6 p-0 position-relative image-overlap-shadow">
                                    <a href="javascript:void();">
                                        <?php 
                                        $photo = $row['product_photos'];
                                        ?>
                                        <img src="images/browse-products/<?php echo $photo;?>" alt="" class="img-fluid rounded w-100">
                                    </a>
                                    <div class="view-book">
                                        <a href="book-page.html" class="btn btn-sm btn-white">View Details</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <h6 class="mb-1"><?php echo $row['product_name']; ?></h6>
                                    </div>
                                    <div class="price d-flex align-items-center">
                                        <h6><b><?php echo $row['product_price']; ?></b></h6>
                                    </div>
                                    <div class="iq-product-action">  
                                        <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="add" href="<?php 
                                        $addid = $row['product_id'];
                                        $stmt = $conn->prepare("INSERT INTO cart (product_id) VALUES (?)");
                                        $stmt->bind_param("s",$addid);
                                        $stmt->execute();
                                        ?>"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $counter++;
            }
            echo '</div>'; // Close the last row
        } else {
            echo "Product not found";
        }
        ?>
    </div>
</div>
</div>
</div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->