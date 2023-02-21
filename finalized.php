<?php
$DB=$_POST['database'];
$con=mysqli_connect('localhost','root','',$DB);
$sql="insert into tblelimination values(null,'finalize',1)";	
$res=mysqli_query($con,$sql);
if($res){
	echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
}else{
	echo 'failed!';
}

?>