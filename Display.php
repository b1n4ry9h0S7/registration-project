<html>
<?php include("./classes/navbar.html") ?>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

</style>
<?php include_once("./classes/navbar.html"); ?>
</head>
<body bgcolor="#EEFDEF">
<br>

 <div class="page-header">
    <h1 align="center">Registered Colleges</h1>      
    <hr>
</div>
  <div class="container">
<?php
include("./classes/DB.php");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 
$sql = "SELECT name, email, address, contact, partnum, events FROM college";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  echo '<div class="table-responsive">    
    <table class="table table-bordered">
<tr>
<th>College Name</th>
<th>Email</th>
<th>Address</th>
</tr>'; 

    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['address'] . "</td>";
  echo "</tr>";
   }
    echo "</table>";

} else {
    echo "No Records yet...!";
    
}
$con->close();
?>

<br>
<div align="center">
<a href="index.php" class="btn btn-info">Back</a>
 </div>
</div>

 </body>