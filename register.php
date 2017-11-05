<!DOCTYPE html>
<html>

<style type="text/css">
  .error {
    color: #FF0000;
}
</style>
<body>
<?php
include("./classes/navbar.html");
$nameErr = $addrErr = $emailErr = $eventsErr = $cnumErr = $pnumErr = "";
?>

<?php  
include("./classes/DB.php");

$name = $add = $email = $checkbox1 = $cnum = $pnum = "";


if(isset($_POST['sub']))  
{  

/*
$name=$_POST['cname'];
$email=$_POST['email'];
$add=$_POST['caddress'];
$cnum=$_POST['cnum'];
$pnum=$_POST['pnum'];

$checkbox1=$_POST['events']; 
*/
if (!empty($_POST['cname']))
{
   $name=$_POST['cname'];
    
    if (!empty($_POST["email"])) 
    {
       $email=$_POST['email'];
       
       if (!empty($_POST["password"]))
       {
          $password =$_POST['password'];
          $password = password_hash($password, PASSWORD_DEFAULT);
       }

        if (!empty($_POST["caddress"])) 
          {
             $add = $_POST["caddress"];
                
                if (!empty($_POST["cnum"])) 
                  {
                       $cnum = $_POST["cnum"];

                        if (!empty($_POST["pnum"])) 
                          {
                             $pnum = $_POST["pnum"];

                                if (isset($_POST["events"])) 
                                {
                                  $checkbox1=$_POST['events'];

                                      if (count($checkbox1) > 5) {

 $chk= implode(", ",$checkbox1);
$sql="insert into college( events, name, email, password, address, contact, partnum) values('$chk','$name', '$email', '$password', '$add', '$cnum', '$pnum')";


if ($con->multi_query($sql) === TRUE)  
  {  
     
     echo'<script>alert("Inserted Successfully")</script>';
      header('Location: Display.php');
  }  
else  
  {  
    echo'<script>alert("Failed To Insert")</script>';  
  //  echo "Error: " . $sql . "<br>" . $conn->error;
   } 


                                      } else {
                                  $eventsErr = "You must select 5 or more events";
                                }
                                    } else {
                                      $eventsErr = "You must select 5 or more events";
                                       }

                                            } else {
                                               $pnumErr = "Please enter number of participants..!";
                                             }

    

       } else {
      $cnumErr = "Please enter a contact number...!";
    }

    } else {
        $addrErr = "Please enter address...!";
       }

    } else { 
      $password_err = "Enter a passcode...!"
    }
        
    } else {
       $emailErr= "Please enter a email...!";
        }

    } else {
        $nameErr = "Please Enter a name...!";
    }
        if(empty($password)){
      $password_err = 'Please enter password';
    } elseif(strlen($password < 6)){
      $password_err = 'Password must be at least 6 characters';
    }
    // Validate Confirm password
    if(empty($confirm_password)){
      $confirm_password_err = 'Please confirm password';
    } else {
      if($password !== $confirm_password){
        $confirm_password_err = 'Passwords do not match';
      }
    }
  }    if(empty($password)){
      $password_err = 'Please enter password';
    } elseif(strlen($password < 6)){
      $password_err = 'Password must be at least 6 characters';
    }
    // Validate Confirm password
    if(empty($confirm_password)){
      $confirm_password_err = 'Please confirm password';
    } else {
      if($password !== $confirm_password){
        $confirm_password_err = 'Passwords do not match';
      }
    }
?>


 <div class="jumbotron">
  <h1 align="center">REGISTRATIONS</h1>
  <h4 align="center">Register here to participate in the IT Fest...!</h4>
</div>
<div class="container">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
      <label>College Name:</label>
      <input class="form-control" id="cname" type="text" name="cname" placeholder="Enter college name..." required>
      <span class="error"><?php echo $nameErr;?></span>
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input class="form-control" type="email" id="email" name="email" placeholder="Enter email address..." required>
      <span class="error"><?php echo $emailErr;?></span>
    </div>
    <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
              <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>  
       <div class="form-group">
        <label>College Address:</label>
    <textarea class="form-control" name="caddress" id="caddress" rows="3" placeholder="Enter college address..." required></textarea>
    <span class="error"><?php echo $addrErr;?></span>
    </div>

<div class="form-group">
      <label>Contact Number:</label>
      <input class="form-control" id="cnum" type="number" name="cnum" placeholder="Enter contact number..." required>
      <span class="error"><?php echo $cnumErr;?></span>
    </div>

    <div class="form-group">
      <label>Number of Participants:</label>
      <input class="form-control" id="pnum" type="number" name="pnum" placeholder="Enter number of Participants..." required min="10" max="14">
      <span class="error"><?php echo $pnumErr;?></span>
    </div>
    <br>
    <hr>
    <br>

  <div class="form-group container">
    <div>
      <h2 align="center">Select Events</h2>
      <h4 align="center">Select the events to participate...!</h4>
      <span class="error"><?php echo $eventsErr;?></span>
      <hr>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="events[]" class="form-check-input" value="Coding">
      Coding
    </label>
  </div></li>
<li class="list-group-item">
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="events[]" value="Quiz" class="form-check-input">
      Quiz
    </label>
  </div></li>
<li class="list-group-item">
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="events[]" value="Ad-Mad" class="form-check-input">
      Ad-Mad
    </label>
  </div></li>
<li class="list-group-item">
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="events[]" value="Web Designing" class="form-check-input">
      Web Designing
    </label>
  </div></li>

<li class="list-group-item">
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="events[]" value="Debate" class="form-check-input">
      Debate
    </label>
  </div></li>

<li class="list-group-item">
   <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="events[]" value="Treasure Hunt" class="form-check-input">
      Treasure Hunt
    </label>
  </div></li>

<li class="list-group-item">
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="events[]" value="IT Manager" class="form-check-input">
      IT Manager
    </label>
  </div></li>
</ul><br>
<div align="center">
    <button type="submit" name="sub" class="btn btn-success">Submit</button>
    <button type="reset" class="btn btn-primary">Reset</button>
    <a href="Display.php" class="btn btn-info">Already registered</a>
  </form>
  </div>
</div>
</body>
</html>