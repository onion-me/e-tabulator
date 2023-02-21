<?php
$x = $_POST['dbname'];
$DB = preg_replace('/[^A-Za-z0-9]/', "", $x);
$servername = "localhost";
$username = "root";
$password = '';

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE 	sys$DB";
if ($conn->query($sql) === TRUE) {


	/*$con=mysqli_connect('localhost','root','',$DB);
	$sql2="CREATE TABLE tblcategory (
cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
category VARCHAR(30) NOT NULL,
percentage INT(30) NOT NULL,
reg_date TIMESTAMP
)";
	$res2=mysqli_query($con,$sql2);
	if($res2){*/
      echo "<script>
   
    open('createcategory.php?name=$DB+&count=+0','_self');
    </script>";
}else{
	 echo "<script>
   alert('database already exists!');
    open('index.php','_self');
    </script>";
}
/*
} else {
   echo "failed";
}*/

$conn->close();
?>