<?php
	session_start();
  if(!isset($_SESSION['username'])){
    echo "<script>
    alert('You don't have to logout!');
    open('index.php','_self');
    </script>";
  }
    $con = mysqli_connect('localhost','root','','tesdacmi_users');
    $DB=$_SESSION['username']['db'];
    $UID=$_SESSION['username']['uid'];
    $action="Successfully Logout";
    $USER=$_SESSION['username']['username'].'('.$_SESSION['username']['usertype'].')';
    $slq="insert into tblaudittrail values('null','$DB','$UID','$USER','$action',null)";
    $rees = mysqli_query($con,$slq) or die (mysqli_error($con));
    if($rees){
        $sql="update tblusers set log=0 where uid='$UID'";
        $resupdate=mysqli_query($con,$sql);
        unset($_SESSION['username']);
		session_destroy();

		echo "<script>
		   
			open('index.php','_self');
		</script>";
    }else{
        echo 'fail:c';
    }
?>