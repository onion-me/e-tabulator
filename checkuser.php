<?php
$con = mysqli_connect('localhost','root','','tesdacmi_users');
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$username = htmlentities( $username );
$password = htmlentities( $password );

$password = md5($password);
$sql = "select * from tblusers where username='$username' and password='$password' and status='activated'";
$res = mysqli_query($con,$sql);
$array=mysqli_fetch_array($res);
$rows = mysqli_num_rows($res);
//echo $row;
$DB=$array['db'];
$USERTYPE = $array['usertype'];
$UID = $array['uid'];
$LOG = $array['log'];
$USER = $array['username'].'('.$USERTYPE.')';
$action = "Successfully Login";
if($rows!=0){
		
	if($array['usertype']=='admin'||$array['usertype']=='organizer' ){
		
		$slq="insert into tblaudittrail values('null','$DB','$UID','$USER','$action',null)";
		$rees = mysqli_query($con,$slq) or die (mysqli_error($con));
		if($rees){
	session_start();
	$_SESSION['username']=$array;
	echo "<script>
	open('adminhome.php','_self');
	</script>";
		}
	//
}else{
    if($LOG==0)
    {
        $sql="update tblusers set log=1 where uid='$UID'";
        $resupdate=mysqli_query($con,$sql);
    	$slq="insert into tblaudittrail values('null','$DB','$UID','$USER','$action',null)";
    		$rees = mysqli_query($con,$slq) or die (mysqli_error($con));
    	if($rees)
    	{
    	session_start();
    	$_SESSION['username']=$array;
    	echo "<script>
    	open('judgehome.php','_self');
    	</script>";
        }
    }
    else
    {
        echo "<script>
        alert('This account is already on use, Please contact administrator for help');
    	open('index.php','_self');
    	</script>";    
    }
}
}else{
	echo "<script>
	alert('invalid username or password');
	open('index.php','_self');
	</script>";
}


?>