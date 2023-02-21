<?php
$DB=$_POST['database'];
$canid=$_POST['canid'];
$con=mysqli_connect('localhost','root','',$DB);
$sql="delete from tblcandidate where canid='$canid'";
$res=mysqli_query($con,$sql);
if($res){
    echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
}

?>