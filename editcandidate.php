<?php
 $DB=$_POST['database'];
 $con=mysqli_connect('localhost','root','',$DB);
 $canid=$_POST['canid'];
 $fullname=$_POST['fullname'];
 
 $address=$_POST['address'];
 $gender=$_POST['gender'];
 $age=$_POST['age'];


$sql="UPDATE `tblcandidate` SET `fullname`='$fullname',`address`='$address',`gender`='$gender',`age`='$age' WHERE canid='$canid'";
$res=mysqli_query($con,$sql)or die(mysqli_error($con));
if($res){
    echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
}else{
    echo 'fail';
}

?>