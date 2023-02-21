 
 
<?php
$DB=$_GET['name'];
$con = mysqli_connect('localhost','root','',$DB);

$sql="select category from tblcategorytop";
$res=mysqli_query($con,$sql);
$catnum=mysqli_num_rows($res);
$conj = mysqli_connect('localhost','root','','tesdacmi_users');
$sql1="select uid from tblusers where usertype='judge' and db='$DB' and status='activated'";
$res1=mysqli_query($conj,$sql1);
$judnum=mysqli_num_rows($res1);
$product=$catnum*$judnum;
$sql2="select * from tbllocktop";
$res2=mysqli_query($con,$sql2);
$mul=mysqli_num_rows($res2);
if($product!=0||$mul!=0){
if($product==$mul){
    
    
    
    
    
    
    
    
    
    $sql="insert into tblelimination values(null,'goodbye',1)";
    mysqli_query($con,$sql);
    echo "<script>alert('finalized...'); open('monitorfinal.php?name=$DB','_self')</script>";
}else{
    echo $mul.$product;
    echo "<script>alert('judging is ongoing');
    open('monitorfinal.php?name=$DB','_self');
    </script>";
    }
}else{
     echo "<script>alert('back');
    open('monitorfinal.php?name=$DB','_self');
    </script>";
}
?>
   
