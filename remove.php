<?php
    $DB=$_POST['db'];
    $UID=$_POST['uid'];
     $con=mysqli_connect('localhost','root','','tesdacmi_users');
    $sql="DELETE FROM `tblusers` WHERE db='$DB' and uid='$UID' ";
    $res=mysqli_query($con,$sql)or die(mysqli_error($con));
    if($res){
        echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
    }else{
        echo 'fail';
    }
?>