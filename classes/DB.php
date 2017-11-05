<?php 

$host="localhost";//host name  
$username="root"; //database username  
$password="";//database word  
$db_name="reg";//database name 
//$host="localhost";//host name  
//$username="id2701771_nishanthdev"; //database username  
//$password="1234567";//database word  
//$db_name="id2701771_reg";//database name   
//$tbl_name="request_quote"; //table name  
$con=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");//connection string
   // DB Credentials
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'reg');
  // Attempt to connect to MySQL
  try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
  } catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
  }