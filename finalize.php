<?php
     $DB=$_POST['database'];
     $category=$_POST['category'];
     $jid=$_POST['uid'];
    $con=mysqli_connect('localhost','root','',$DB);
    $sql="insert into tbllock values('$jid','$category',null)";
    $res=mysqli_query($con,$sql);
    if($res){
        echo "<script>open('judgehome.php?category=$category','_self')</script>";
    }else{
        echo 'fail';
    }
   
?>