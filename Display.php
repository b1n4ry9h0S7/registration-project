
/*

Hello World
*/

<html>
<head>
	<head>
  <title>Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
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

$host="localhost";//host name  
$username="id2701771_nishanthdev"; //database username  
$password="1234567";//database word  
$db_name="id2701771_reg";//database name 
$con=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");//connection string

if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 
$sql = "SELECT name, email, address, contact, partnum, events FROM college";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'>
<tr>
<th>College Name</th>
<th>Email</th>
<th>Address</th>
<th>Mobile</th>
<th>Participants</th>
<th>Events</th>
</tr>"; 

    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['address'] . "</td>";
  echo "<td>" . $row['contact'] . "</td>";
  echo "<td>" . $row['partnum'] . "</td>";
  echo "<td>" . $row['events'] . "</td>";
  echo "</tr>";
   }
    echo "</table>";

} else {
    echo "0 results";
}
$con->close();
?>

<br>
<div align="center">
<a href="http://www.csvcputtur.in/" class="btn btn-info">Main Site</a>
 </div>
</div>

 </body>
