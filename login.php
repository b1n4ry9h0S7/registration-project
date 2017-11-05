
<?php
  // Include db config
include("./classes/DB.php");
include("./classes/navbar.html");
  // Init vars
  $email = $password = '';
  $email_err = $password_err = '';
  // Process form when post submit
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    // Put post vars in regular vars
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    // Validate email
    if(empty($email)){
      $email_err = 'Please enter email';
    }
    // Validate password
    if(empty($password)){
      $password_err = 'Please enter password';
    }
    // Make sure errors are empty
    if(empty($email_err) && empty($password_err)){
      // Prepare query
      $sql = 'SELECT name, email, password FROM users WHERE email = :email';
      // Prepare statement
      if($stmt = $pdo->prepare($sql)){
        // Bind params
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        // Attempt execute
        if($stmt->execute()){
          // Check if email exists
          if($stmt->rowCount() === 1){
            if($row = $stmt->fetch()){
              $hashed_password = $row['password'];
              if(password_verify($password, $hashed_password)){
                // SUCCESSFUL LOGIN
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $row['name'];
                header('location: index.php');
              } else {
                // Display wrong password message
                $password_err = 'The password you entered is not valid';
              }
            }
          } else {
            $email_err = 'No account found for that email';
          }
        } else {
          die('Something went wrong');
        }
      }
      // Close statement
      unset($stmt);
    }
    // Close connection
    unset($pdo);
  }
?>
 <div class="jumbotron">
  <h1 align="center">Login</h1>
  <h4 align="center">login here to edit your information...!</h4>
</div>
<body>
  <div class="container">
          <h2>Login</h2>
          <p>Fill in your credentials</p>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">   
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
              <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="submit" value="Login" class="btn btn-success btn-block">
              </div>
              <div class="col">
                <a href="register.php" class="btn btn-primary btn-block">No account? Register</a>
              </div>
            </div>
          </form>
     </div>
  </div>
</body>
</html>
<?php include("./classes/footer.html"); ?>