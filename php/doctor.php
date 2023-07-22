<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="doctor_login.css">
  

  <title>Login</title>
</head>

<body>


  <?php
include "connect.php";
  

  if (isset($_POST['login_btn'])) {

  

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from doctor where email = '$email' AND password = '$password' ";
    $query = mysqli_query($con, $email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
      $email_pass = mysqli_fetch_assoc($query);
  
      $db_pass = $email_pass['password'];
  
      $_SESSION['username'] = $email_pass['doctorname'];
      
      
      if($db_pass){

        
     
        ?>
        <script>
        
          location.replace("doctorDashboard.php");
        </script>
       
         
      <?php
      }else{
        
        ?>
        <script>
          alert("Password incorrect");
        </script>
        <?php
      }
      }else{
     
        ?>
        <script>
        alert("Invalid credential");
      </script>
      <?php
      
      }
      }
      ?>




  <div class="wrapper">
    <h2>Doctor Login</h2>
    <form id="form1" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

      <div class="input-box">
        <label for="email" class="details">Email</label>
        <input type="email" id="txtEmail" class="form-control" placeholder="Enter your email" name="email" required>
        <span class="formerror hide" id="email"> Email field is required</span>
      </div>
      <div class="input-box">
        <label for="password" class="details">Password</label>
        <input type="password" id="txtPassword" class="form-control" placeholder="Enter your password" name="password" required>
        <span class="formerror hide" id="password">Password is required </span>
      </div>


      <div class="input-box button">
        <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
      </div>

    </form>

    <div class="login-signup">
      <label for="link" class="text">Not registered?
        <a href="doctor_registration.php" class="text signup-link">Signup now</a>
      </label>
    </div>
  </div>
</body>

</html>