 <?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location:admin-login.php");
    exit;
} require_once("files/admin_header.php")?>
 <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add Categories</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form method="post" action="admin_addcategory.php">
                              <div class="form-group">
                                 <label for="category">Category Name:</label>
                                 <input type="text" class="form-control" name="category">
                              </div>
                              <div class="form-group">
                                 <label for="categorydescription">Category Description:</label>
                                 <textarea class="form-control" rows="4" name="categorydescription"></textarea>
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
      
      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $category = $_POST['category'];
        $categorydescription = $_POST['categorydescription'];

        // Validate the form data (you can add more validation as needed)
        if (empty($category) || empty($categorydescription)) {
            echo "Please fill in all required fields.";
        } else {
            // Connect to the database
            require_once("files/function.php");
            }

            // Prepare and execute the SQL statement
            $stmt = $conn->prepare("INSERT INTO category (category_name, category_description) VALUES (?, ?)");
            $stmt->bind_param("ss",$category, $categorydescription);
            if ($stmt->execute()) {
                echo "Category registered successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement and the database connection
            $stmt->close();
            $conn->close();
        }
    
    ?>
    <?php require_once("files/footer.php") ?>