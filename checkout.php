      <?php
      require_once("files/header.php");
      require_once("files/function.php");
      require_once("files/footer.php")
       ?>   

         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
               <div class="row">
                  <div id="cart" class="card-block show p-0 col-12">
                     <div class="row align-item-center">
                        <div class="col-lg-8">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Shopping Cart</h4>
                                 </div>
                              </div>
                              <?php 
                                $sql = "SELECT * FROM cart WHERE user_id = $uid";
                                 $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                   ?>
                              <div class="iq-card-body">
                                 <ul class="list-inline p-0 m-0">
                                    <li class="checkout-product">
                                       <div class="row align-items-center">
                                          <div class="col-sm-2">
                                             <span class="checkout-product-img">
                                             <a href="javascript:void();"><img class="img-fluid rounded" src="images/browse-products/<?php 
                                             $pid = $row['product_id'];
                                             $sql="SELECT * FROM products WHERE product_id=$pid";
                                             $presult = $conn->query($sql);
                                             $prow = $presult->fetch_assoc();
                                             echo $prow['product_photos'];
                                              ?>" alt=""></a>
                                             </span>
                                          </div>
                                          <div class="col-sm-4">
                                             <div class="checkout-product-details">
                                                <h5><?php echo $prow['product_name']; ?></h5>
                                                <p class="text-success">In stock</p>
                                                <div class="price">
                                                   <h5><?php echo $prow['product_price']; ?></h5>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="row">
                                                <div class="col-sm-10">
                                                   <div class="row align-items-center mt-2">
                                                      <div class="col-sm-7 col-md-6">
                                                         <button type="button" class="fa fa-minus qty-btn" id="btn-minus"></button>
                                                         <input type="text" id="quantity" value="0">
                                                         <button type="button" class="fa fa-plus qty-btn" id="btn-plus"></button>
                                                      </div>
                                                      <div class="col-sm-5 col-md-6">
                                                         <span class="product-price"><?php
                                                          echo $prow['product_price']; ?></span>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <a href="<?php 
                                             $deltid = $row['item_id'];
                        $sql = "DELETE FROM cart WHERE item_id = $deltid";
                                        $conn->query($sql);
                                              ?>" class="text-dark font-size-20"><i class="ri-delete-bin-7-fill"></i></a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <?php 
                           }
                        }
                               ?>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="iq-card">
                              <div class="iq-card-body">
                                 <hr>
                                 <p><b>Price Details</b></p>
                                 <div class="d-flex justify-content-between mb-1">
                                    <span>Total MRP</span>
                                    <span> <?php echo $prow['product_price']; ?></span>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                    <span>Delivery Charges</span>
                                    <span class="text-success">Free</span>
                                 </div>
                                 <hr>
                                 <div class="d-flex justify-content-between">
                                    <span class="text-dark"><strong>Total</strong></span>
                                    <span class="text-dark"><strong><?php echo $prow['product_price'];?></strong></span>
                                 </div>
                                 <button type="submit" ><a id="place-order" href="address.php" class="btn btn-primary d-block mt-3 next">Place order</a></button>
                              </div>
                           </div>
                           <div class="iq-card ">
                              <div class="card-body iq-card-body p-0 iq-checkout-policy">
                                 <ul class="p-0 m-0">
                                    <li class="d-flex align-items-center">
                                       <div class="iq-checkout-icon">
                                          <i class="ri-checkbox-line"></i>
                                       </div>
                                       <h6>Security policy (Safe and Secure Payment.)</h6>
                                    </li>
                                    <li class="d-flex align-items-center">
                                       <div class="iq-checkout-icon">
                                          <i class="ri-truck-line"></i>
                                       </div>
                                       <h6>Delivery policy (Home Delivery.)</h6>
                                    </li>
                                    <li class="d-flex align-items-center">
                                       <div class="iq-checkout-icon">
                                          <i class="ri-arrow-go-back-line"></i>
                                       </div>
                                       <h6>Return policy (Easy Retyrn.)</h6>
                                    </li>
                                 </ul>
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