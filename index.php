<?php
require_once("files/header.php");
require_once("files/function.php");
?>
<style>
.carousel-item img {
  object-fit: cover;
  width: 100%;
  height: 90vh; 
/* Set the height to cover the entire viewport */
</style>
<style >
   
    p{
      color: yellow;
    }
    .abc{
      color: yellow;
    }
    .nms{
      background-color: whitesmoke;
      color: black;
    }
    }
</style>
<!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" width="640" height="360" src="images/browse-products/01.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    <h5 class="abc">Intel Core i7-13700K</h5>
    <p class="nms">Cores: 16Threads: 24Base clock: 3.4GHzBoost clock: 5.4GHzCache: 54MBTDP: 125W</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" width="640" height="360" src="images/browse-products/10.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
    <h5 class="abc" >Nvidia GeForce RTX 3090</h5>
    <p class="nms">Stream Processors: 10,496Core Clock: 1.40 GHz (1,70 GHz boost)Memory: 24 GB GDDR6XMemory Clock: 19.5GbpsPower Connectors: 2x PCIe 8-pinOutputs: HDMI 2.1, 3x DisplayPort 1.4a
</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" width="640" height="360"src="images/browse-products/16.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <h5 class="abc">G.Skill Trident Z5 Neo</h5>
    <p class="nms"> G.Skill Trident Z5 Neo RGB DDR5-6000 (2 x 16GB)+Superb performance+Cheaper than the competition+AMD EXPO certified</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Browse Products</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">                              
                              <a href="category.php" class="btn btn-sm btn-primary view-more">View More</a>
                           </div>
                        </div> 
                        <div class="iq-card-body"> 
                        <?php 
                                $sql = "SELECT * FROM products LIMIT 8 ";
                                 $result = $conn->query($sql);
                                 

                                if ($result->num_rows > 0) {
                                 $counter =0;
                                while ($row = $result->fetch_assoc() ) {
                                 if ($counter % 4 == 0) {
                    // Start a new row for every 4th product
                              echo '<div class="row">';}
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
                                             <img src="images/browse-products/<?php echo $photo;?>"alt="" class="img-fluid rounded w-100"></a>
                                             <div class="view-book">
                                                <a href="book-page.html" class="btn btn-sm btn-white">View Details</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                  <h6 class="mb-1"><?php echo $row['product_name']; ?></h6>
                                             </div>
                                             <div class="price d-flex align-items-center">
                                                <h6><b><?php echo $row['product_price']; ?>
                                                </b></h6>
                                             </div> 
                                             <div class="iq-product-action">  
               <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="add" href="<?php 
                                             $addid = $row['product_id'];
                        $stmt = $conn->prepare("INSERT INTO cart (product_id,user_id) VALUES (?)");
                                        $stmt->bind_param("ss",$addid,$uid);
                                          $stmt->execute() ;
                                        ?>"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                             </div>                                      
                                          </div>
                                          <?php 
                                          if ($counter % 4 == 3) {
                    // Close the row after every 4th product
                    echo '</div>';}
                    $counter++;
                                      }
                                      }
                                      else
                                      {
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
<?php require_once("files/footer.php") ?>