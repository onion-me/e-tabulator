<?php 
	$total=100;
	$row=$_POST['critrow'];
	$DB=$_POST['db'];
	$category=$_POST['category'];
	$con=mysqli_connect('localhost','root','',$DB);
	$sum=0;
	for($y=1;$y<=$row;$y++){		
		$percentage=$_POST["percentage$y"];
		$sum=$percentage+$sum;
	}
	
	if($sum!=100){
		echo "<script>alert('sum of values must be equal to 100! not $sum'); open('selecteddb.php?name=$DB#crits','_self')</script>";
	}else{
		$sql="DELETE FROM `tblcriteria` WHERE category='$category'";
		$res=mysqli_query($con,$sql);
		if($res)
		{
		for($y=1;$y<=$row;$y++){
	    $criteria=$_POST["criteria$y"];
		$percentage=mysqli_real_escape_string($con,$_POST["percentage$y"]);
		if($criteria==''||$percentage==''){
		    continue;
		}
		$sqlinsert="insert into tblcriteria values(null,'$criteria','$percentage','$category',null)";
		$resinsert=mysqli_query($con,$sqlinsert);
			}
			echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
		}
		else
		{
			echo 'fail to insert/delete';
		}
		
	}
	
	/**/
?>