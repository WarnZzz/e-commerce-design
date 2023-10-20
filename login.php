<!doctype html>
<html lang="en">
   
<!-- Mirrored from iqonic.design/themes/booksto/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Mar 2021 03:55:53 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>INFINITRON | Tech E-Commerce & PC Customization Site</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body>
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container p-0">
                <div class="row no-gutters height-self-center">
                  <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                      <div class="col-sm-12 sign-in-page-data">
                          <div class="sign-in-from bg-primary rounded">
                              <h3 class="mb-0 text-center text-white">Sign in</h3>
                              <p class="text-center text-white">Enter your email address and password to access customer panel.</p>
                              <form method="post" class="mt-4 form-text">
                                  <div class="form-group">
                                      <label for="email">Email address</label>
                                      <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email">
                                    </div>
                                  <div class="form-group">
                                      <label for="Password">Password</label>
                                      <a href="register.php" class="float-right text-dark">Forgot password?</a>
                                      <input type="password" name="Password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
                                  </div>
                                  <div class="sign-info text-center">
                                      <button type="submit" class="btn btn-white d-block w-100 mb-2">Sign in</button>
                                      <span class="text-dark dark-color d-inline-block line-height-2">Don't have an account? <a href="register.php" class="text-white">Sign up</a></span>
                                  </div>
                              </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
        <?php
        session_start();
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $email = $_POST['email'];
        $Password = $_POST['Password'];

        // Validate the form data (you can add more validation as needed)
        if (empty($email) || empty($Password)) {
            echo "Please enter both email and password.";
        } else {
                require_once ("files/function.php");
            

            // Prepare and execute the SQL statement
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email' and Password='$Password'");
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if the user exists
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                // Verify the password
                $_SESSION['user_id'] = $row['user_id'];
               header('location:index.php');
                    // Successful login
                    // Redirect or perform further actions
                     } else {
                // User does not exist
                echo "Invalid username or Password.";
            }

            // Close the statement and the database connection
            $stmt->close();
            $conn->close();
        }
        }
    
    ?>