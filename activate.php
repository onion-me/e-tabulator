<?php

	 $uid=$_POST['uid'];
	 $db=$_POST['db'];
	$con= mysqli_connect("localhost", "root", '','tesdacmi_users');
	$sql="UPDATE `tblusers` SET `status`='activated' WHERE uid='$uid';";
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