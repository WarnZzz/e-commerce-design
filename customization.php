<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to the login page
    header('location:login.php');
    exit;
}

// User is logged in, retrieve user ID from the session
$userId = $_SESSION['user_id'];
require_once("files/function.php");
$total=0;
      $cabinet=$cpu=$gpu=$ram=$mb=$ssd=$hdd=$power_supply=$cpu_cooler="";

      if (isset($_POST['submit'])) // fetching values
      {
         if(!empty($_POST['cabinet']))
         {
           $cabinet=$_POST['cabinet'];
         }
         if(!empty($_POST['cpu']))
         {
           $cpu=$_POST['cpu'];
         }
         if(!empty($_POST['gpu']))
         {
           $gpu=$_POST['gpu'];
         }
         if(!empty($_POST['ram']))
         {
           $ram=$_POST['ram'];
         }
         if(!empty($_POST['mb']))
         {
           $mb=$_POST['mb'];
         }
         if(!empty($_POST['ssd']))
         {
           $ssd=$_POST['ssd'];
         }
         if(!empty($_POST['hdd']))
         {
           $hdd=$_POST['hdd'];
         }
         if(!empty($_POST['power_supply']))
         {
           $power_supply=$_POST['power_supply'];
         }    
        //  setting $_SESSION['cabinet_price'] and $_SESSION['cabinet_full_name']
         $new1=(int)$cabinet;
         $_SESSION['cabinet_price']=$new1;
         $res1=mysqli_query($database, "select product_name from products where category_id=9 and price= $new1");
         $data1=mysqli_fetch_assoc($res1);
         $_SESSION['cabinet_full_name'] = $data1['full_name'];
         echo $_SESSION['cabinet_full_name'];
          
        //  setting $_SESSION['cpu_price'] and $_SESSION['cpu_full_name']
         $new2=(int)$cpu;
         $_SESSION['cpu_price']=$new2;
         $res2=mysqli_query($database, "select product_name from products where category_id=9 and price= $new2");
         $data2=mysqli_fetch_assoc($res2);
         $_SESSION['cpu_full_name'] = $data2['cpu_full_name'];
         
        //  setting $_SESSION['gpu_price'] and $_SESSION['gpu_full_name']
         $new3=(int)$gpu;
         $_SESSION['gpu_price']=$new3;
         $res3=mysqli_query($database, "select product_name from products where category_id=9 and price= $new3");
         $data3=mysqli_fetch_assoc($res3);
         $_SESSION['gpu_full_name'] = $data3['gpu_full_name'];
         
        //  setting $_SESSION['ram_price'] and $_SESSION['ram_full_name']
         $new4=(int)$ram;
         $_SESSION['ram_price']=$new4;
         $res4=mysqli_query($database, "select product_name from products where category_id=9 and price= $new4");
         $data4=mysqli_fetch_assoc($res4);
         $_SESSION['ram_full_name'] = $data4['ram_full_name'];
         
        //  setting $_SESSION['mb_price'] and $_SESSION['mb_full_name']
         $new5=(int)$mb;
         $_SESSION['mb_price']=$new5;
         $res5=mysqli_query($database, "select product_name from products where category_id=9 and price= $new5");
         $data5=mysqli_fetch_assoc($res5);
         $_SESSION['mb_full_name'] = $data5['mb_full_name'];
         
        //  setting $_SESSION['ssd_price'] and $_SESSION['ssd_full_name']
         $new6=(int)$ssd;
         $_SESSION['ssd_price']=$new6;
         $res6=mysqli_query($database, "select product_name from products where category_id=9 and price= $new1");
         $data6=mysqli_fetch_assoc($res6);
         $_SESSION['ssd_full_name'] = $data6['ssd_full_name'];
         
        //  setting $_SESSION['hdd_price'] and $_SESSION['hdd_full_name']
         $new7=(int)$hdd;
         $_SESSION['hdd_price']=$new7;
         $res7=mysqli_query($database, "select product_name from products where category_id=9 and price= $new1");
         $data7=mysqli_fetch_assoc($res7);
         $_SESSION['hdd_full_name'] = $data7['hdd_full_name'];
         
        //  setting $_SESSION['power_supply_price'] and $_SESSION['power_supply_full_name']
         $new8=(int)$power_supply;
         $_SESSION['power_supply_price']=$new8;
         $res8=mysqli_query($database, "select product_name from products where category_id=9 and price= $new1");
         $data8=mysqli_fetch_assoc($res8);
         $_SESSION['power_supply_full_name'] = $data8['ps_full_name'];
        

        //  redirecting
         echo '<script>
                window.location.href = "cart.php";
              </script>';
        }
       

    ?>

    <!-- header end -->

    <!-- main content -->
    <div class="customrig-main">

      <div class="build_image"> <!-- cabinet images -->
        <img id='cabinet_image' src="" alt="Please select a cabinet" style="width: 250px;">
      </div>

      <div class="build_inputs"> <!-- form inputs -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          
          <select required name="cabinet" id="cabinet_select" onchange="input_entered(this.name);calc_total(this.value);display(this.text)">
            <option disabled selected value='0'>-- Select Your Cabinet --</option>
              <?php
                
                $res=mysqli_query($database, "select * from products where category_id=9");
                while($data=mysqli_fetch_array($res))
                { 
                  echo "<option value='". $data['product_price'] ."'>" .$data['product_name'] ."</option>";
                  // echo "<option value='". $data['price'] ."'>" .$data['full_name'] ."</option>";
                  
                  
                }
              ?>
            
          </select>
          
          <!-- PROCESSOR -->
          <select  name="cpu" id="cpu_select" onchange="input_entered(this.name);calc_total(this.value);"> 
            <option disabled selected value='0'>-- Select Your Processor --</option>
              <?php
                // $sql = "select company from cabinet where company='Corsair'";
                $res=mysqli_query($database, "select * from products where category_id=1");
                while($data=mysqli_fetch_array($res))
                { 
                  echo "<option value='". $data['product__price'] ."'>" .$data['product_name'] ."</option>";
                  
                }
              ?>
            
          </select>

          <!-- GPU -->
          <select  name="gpu" id="gpu_select" onchange="input_entered(this.name);calc_total(this.value);">
            <option disabled selected value='0'>-- Select Your Graphic Card --</option>
              <?php
                // $sql = "select company from cabinet where company='Corsair'";
                $res=mysqli_query($database, "select * from products where category_id = 2");
                while($data=mysqli_fetch_array($res))
                { 
                  echo "<option value='". $data['price'] ."'>" .$data['gpu_full_name'] ."</option>";
                  
                }
              ?>
            
          </select>

          <!-- RAM -->
          <select  name="ram" id="ram_select" onchange="input_entered(this.name);calc_total(this.value);">
            <option disabled selected value='0'>-- Select Your RAM --</option>
              <?php
                // $sql = "select company from cabinet where company='Corsair'";
                $res=mysqli_query($database, "select * from products where category_id=10");
                while($data=mysqli_fetch_array($res))
                { 
                  echo "<option value='". $data['price'] ."'>" .$data['ram_full_name'] ."</option>";
                  
                }
              ?>
            
          </select>

          <!-- MOTHERBOARD -->
          <select  name="mb" id="mb_select" onchange="input_entered(this.name);calc_total(this.value);">
            <option disabled selected value='0'>-- Select Your Motherboard --</option>
              <?php
                // $sql = "select company from cabinet where company='Corsair'";
                $res=mysqli_query($database, "select * from products where category_id=11");
                while($data=mysqli_fetch_array($res))
                { 
                  echo "<option value='". $data['product_price'] ."'>" .$data['product_name'] ."</option>";
                  
                }
              ?>
            
          </select>

          <!-- SSD -->
          <select  name="ssd" id="ssd_select" onchange="input_entered(this.name);calc_total(this.value);">
            <option disabled selected value='0'>-- Select Your SSD --</option>
              <?php
                // $sql = "select company from cabinet where company='Corsair'";
                $res=mysqli_query($database, "select * from products where category_id=3");
                while($data=mysqli_fetch_array($res))
                { 
                  echo "<option value='". $data['product_price'] ."'>" .$data['product_name'] ."</option>";
                  
                }
              ?>
            
          </select>

          <!-- HDD -->
          <select  name="hdd" id="hdd_select" onchange="input_entered(this.name);calc_total(this.value);">
            <option disabled selected value='0'>-- Select Your HDD --</option>
              <?php
                // $sql = "select company from cabinet where company='Corsair'";
                $res=mysqli_query($database, "select * from products where category_id=3");
                while($data=mysqli_fetch_array($res))
                { 
                  echo "<option value='". $data['product_price'] ."'>" .$data['product_name'] ."</option>";
                  
                }
              ?>
            
          </select>

          <!-- POWER SUPPLY -->
          <select  name="power_supply" id="psu_select" onchange="input_entered(this.name);calc_total(this.value);">
            <option disabled selected value='0'>-- Select Your Power Supply --</option>
              <?php
                // $sql = "select company from cabinet where company='Corsair'";
                $res=mysqli_query($database, "select * from products where category_id=4");
                while($data=mysqli_fetch_array($res))
                { 
                  echo "<option value='". $data['product_price'] ."'>" .$data['product_name'] ."</option>";
                  
                }
              ?>
            
          </select>

          <label for="" id="total_label">Total: 0</label>
          
          <button class="button-inp" onclick="reset_selection()" style="margin: 20px;
  padding: 10px;background-color: rgb(51, 1, 109);border:none;color:white;border-radius:15px;font-size:1em;cursor: pointer;">Reset</button>
          <input class="button-inp" type="submit" name="submit" value="Place Order" onclick="submit_redirect()" style="margin: 20px;
  padding: 10px;background-color: rgb(51, 1, 109);border:none;color:white;border-radius:15px;font-size:1em;cursor: pointer;">
        </form>
      </div>
        
    </div>
     <script src="./script/custom-reg.js"></script>
    
  </body>
</html>
    