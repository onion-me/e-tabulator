<?php
    //ENTER THE RELEVANT INFO BELOW
	
   
    $DbName             = $_POST['data'];
   
       	$con=mysqli_connect('localhost','root','',$DbName);
	$con2=mysqli_connect('localhost','root','','tesdacmi_users');
	
	$sql="drop table tblscore";
	mysqli_query($con,$sql);
	$sql2="drop table tblcriteriascore";
	mysqli_query($con,$sql2);
	$sql3="drop table tblcandidate";
	mysqli_query($con,$sql3);
	$sql4="drop table tbllock";
	mysqli_query($con,$sql4);
	$sql5="drop table tblcriteria";
	mysqli_query($con,$sql5);
	$sql6="drop table tblcategory";
	mysqli_query($con,$sql6);
	$sql7="drop table tblsetting";
	mysqli_query($con,$sql7);
	$sql8="drop table tbltitle";
	mysqli_query($con,$sql8);
	$sql9="drop table tbljudge";
	mysqli_query($con,$sql9);
	
	
	$sql200="drop table tblstat";
	mysqli_query($con,$sql200);
	
	$sql10="drop table tblscoretop";
	mysqli_query($con,$sql10);
	$sql11="drop table tblcriteriascoretop";
	mysqli_query($con,$sql11);
	$sql12="drop table tblcandidatetop";
	mysqli_query($con,$sql12);
	$sql13="drop table tbllocktop";
	mysqli_query($con,$sql13);
	$sql14="drop table tblcriteriatop";
	mysqli_query($con,$sql14);
	$sql15="drop table tblcategorytop";
	mysqli_query($con,$sql15);
	$sql16="drop table tblelimination";
	mysqli_query($con,$sql16);
	
	$sql17="delete from tblusers where db='$DbName'";
	$res17=mysqli_query($con2,$sql17);
	$sql18="delete from tblaudittrail where db='$DbName'";
	$res18=mysqli_query($con2,$sql18);
	if($res18)
	{
	echo "<script>open('adminhome.php','_self')</script>";
	}
        


	

	
?>