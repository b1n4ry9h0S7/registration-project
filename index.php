<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</head>
<body>
<?php

include("./classes/navbar.html");
?>


 <div class="jumbotron">
  <h1 align="center">REGISTRATIONS</h1>
  <h4 align="center">Register here to participate in the IT Fest...!</h4>
</div>
<div class="container">
	<form method="post">
		<div class="form-group">
			<label>College Name:</label>
			<input class="form-control" id="cname" type="text" name="cname" placeholder="Enter college name...">
       <?php echo "<p class='note'>".$msg_name."</p>";?>  
  <?php echo "<p class='note'>".$msg2_name."</p>";?>  
		</div>
		<div class="form-group">
			<label>Email:</label>
			<input class="form-control" type="email" id="email" name="email" placeholder="Enter email address...">
         <?php echo "<p class='note'>".$msg_email."</p>";?>  
  <?php echo "<p class='note'>".$msg2_email."</p>";?> 
		</div>
			
			 <div class="form-group">
			 	<label>College Address:</label>
    <textarea class="form-control" name="caddress" id="caddress" rows="3" placeholder="Enter college address..."></textarea>
		</div>

<div class="form-group">
      <label>Contact Number:</label>
      <input class="form-control" id="cnum" type="text" name="cnum" placeholder="Enter contact number...">
    </div>

    <div class="form-group">
      <label>Number of Participants:</label>
      <input class="form-control" id="pnum" type="number" name="pnum" placeholder="Enter number of Participants...">
    </div>
    <br>
    <hr>
    <br>

	<div class="form-group container">
    <div>
      <h2 align="center">Select Events</h2>
      <h4 align="center">Select the events to participate...!</h4>
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
      <input type="checkbox" name="itmanager" value="IT Manager" class="form-check-input">
      IT Manager
    </label>
	</div></li>
</ul><br>
<div align="center">
		<button type="submit" name="sub" class="btn btn-success">Submit</button>
		<button type="reset" class="btn btn-primary">Reset</button>
	</form>
  </div>
</div>

<?php  
if(isset($_POST['sub']))  
{  
//checking name
if(empty($_POST['name']))
$msg_name = "You must supply your name";
$name_subject = $_POST['full_name'];
$name_pattern = '/^[a-zA-Z ]*$/';
preg_match($name_pattern, $name_subject, $name_matches);
if(!$name_matches[0])
$msg2_name = "Only alphabets and white space allowed";
//check email
if(empty($_POST['email_addr']))
$msg_email = "You must supply your email";
$email_subject = $_POST['email_addr'];
$email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
preg_match($email_pattern, $email_subject, $email_matches);
if(!$email_matches[0])
$msg2_email = "Must be of valid email format";

//checking for non-empty and non-negative integer
if(empty($_POST['pnum']))
$msg_persons = "You must supply number of participants";
if(!empty($_POST['pnum']))
{
$persons = $_POST['pnum'];
preg_match("@^([1-9][0-9]*)$@", $persons, $persons_match);
if(!$persons_match[0])
$msg2_persons = "Must be non negative integer";
}


if(empty($_POST['cnum']))
$msg_persons = "You must supply number of participants";
if(!empty($_POST['cnum']))
{
$persons = $_POST['cnum'];
preg_match("@^([1-9][0-9]*)$@", $persons, $persons_match);
if(!$persons_match[0])
$msg2_persons = "Must be non negative integer";
}
//check discount coupon
//[^a-z0-9_]
if($_POST['dis_code'])
{
 $dis_code = $_POST['dis_code'];
 preg_match("/^[a-zA-Z0-9]+$/", $dis_code, $dis_match);
 if(!$dis_match[0])
 $msg_dis = "Must be alphanumric"; 
 if(strlen($dis_code)!='10')
 $msg2_dis = "Must be 10 characters long";
}
//checking facilities
$facilities = $_POST['facilities'];
  if(empty($facilities)) 
  {
    $msg_facilities = "You must select facilities";
  } 
 
 if(!empty($_POST['facilities'])) {
    $no_checked = count($_POST['facilities']);
    if($no_checked<2)
    $msg2_facilities = "Select at least two options";
    }
}

$host="localhost";//host name  
$username="root"; //database username  
$password=" ";//database word  
$db_name="Reg";//database name
$con=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");//connection string

$name=$_POST['cname'];
$email=$_POST['email'];
$add=$_POST['caddress'];
$cnum=$_POST['cnum'];
$pnum=$_POST['pnum'];
$checkbox1=$_POST['events']; 
         // define variables and set to empty values


$chk= implode(", ",$checkbox1);

/*
foreach($checkbox1 as $chk1)  
   {  
    if ($chk1==last)
    {
      $chk .= $chk1;
      break;
    }
    else {
   $chk .= $chk1.", "; 
      }
   }*/  
  // $sql= "insert into college(events) values('$chk')";
$sql="insert into college( events, name, email, address, contact, partnum) values('$chk','$name', '$email', '$add', '$cnum', '$pnum')";


if ($con->multi_query($sql) === TRUE)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';
   }  
else  
   {  
     echo'<script>alert("Failed To Insert")</script>';  
    //echo "Error: " . $sql . "<br>" . $conn->error;
   }  
}  
?>
</body>
</html>