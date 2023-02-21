<?php

	 $uid=$_POST['uid'];
	 $db=$_POST['db'];
	 $log=$_POST['log'];
	$con= mysqli_connect("localhost", "root", '','tesdacmi_users');
	if($log==1){
	$sql="UPDATE `tblusers` SET `log`='0' WHERE uid='$uid';";
	}else{
	$sql="UPDATE `tblusers` SET `log`='1' WHERE uid='$uid';";	
	}
	$res=mysqli_query($con,$sql)or die(mysqli_error($con));
	if($res){
		echo
		    
		        "<script>
				open('selecteddb.php?name=$db#judgetable','_self')
				</script>";
	}else{
	    echo 'fail';
	}
?>