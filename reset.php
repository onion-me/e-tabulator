<?php 
	$DB=$_POST['data'];
	$con=mysqli_connect('localhost','root','',$DB);
	$con2=mysqli_connect('localhost','root','','tesdacmi_users');
	$ss="truncate table tbllocktop";
	$rr=mysqli_query($con,$ss);
	$s="truncate table tbllock";
	$r=mysqli_query($con,$s);
	
	
	$sqlll="truncate table tblelimination";
	$resss=mysqli_query($con,$sqlll)or die (mysqli_error($con));
	$sql="truncate table tblscore";
	$res=mysqli_query($con,$sql)or die (mysqli_error($con));
	$sql1="truncate table tblcriteriascore";
	$res1=mysqli_query($con,$sql1)or die (mysqli_error($con));;

	
	$check="select elimination from tblsetting";
	$rescheck=mysqli_query($con,$check);
	while($checkrow=mysqli_fetch_array($rescheck)){
		$co=$checkrow['elimination'];
	}
	if($co!=0){
	$sqll="truncate table tblscoretop";
	$ress=mysqli_query($con,$sqll)or die (mysqli_error($con));
	
	
	    
	    
	$sql11="truncate table tblcriteriascoretop";
	$res11=mysqli_query($con,$sql11)or die (mysqli_error($con));;
	
	}
	
	
	$sql4="DELETE FROM tblaudittrail WHERE db='$DB'";
	$res4=mysqli_query($con2,$sql4)or die (mysqli_error($con2));
	if($res4){
	    echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
	}else{
	    echo 'fail';
	}

		
	
	
	
	
?>