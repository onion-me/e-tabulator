<?php 
	$total=100;
	$DB=$_POST['db'];
	$category=$_POST['category'];
	$con=mysqli_connect('localhost','root','',$DB);
	$value1=$_POST['criteria1'];
	$percent1=$_POST['percentage1'];
	$value2=$_POST['criteria2'];
	$percent2=$_POST['percentage2'];
	$value3=$_POST['criteria3'];
	$percent3=$_POST['percentage3'];



	if($_POST['criteria1']!='' && $percent1=$_POST['percentage1']!=''){
	 	$value1=$_POST['criteria1'];
	 	$percent1=$_POST['percentage1'];
	 	if($_POST['criteria2']!='' && $percent2=$_POST['percentage2']!=''){
	 	$value2=$_POST['criteria2'];
	 	$percent2=$_POST['percentage2'];
	if($_POST['criteria3']!='' && $percent3=$_POST['percentage3']!=''){
	 	$value3=$_POST['criteria3'];
	 	$percent3=$_POST['percentage3'];
	 	if($_POST['criteria4']!=='' && $percent4=$_POST['percentage4']!=''){
	 			$value4=$_POST['criteria4'];
	 			$percent4=$_POST['percentage4'];
	 			if($_POST['criteria5']!=='' && $percent5=$_POST['percentage5']!=''){
			$value5=$_POST['criteria5'];
			$percent5=$_POST['percentage5'];

			$sql="insert into tblcriteriatop values(null,'$value1','$percent1','$category',null),(null,'$value2','$percent2','$category',null),(null,'$value3','$percent3','$category',null),(null,'$value4','$percent4','$category',null),(null,'$value5','$percent5','$category',null)";
			if($percent1+$percent2+$percent3+$percent4+$percent5!=100){
			echo "<script>alert('sum of values must be equal to 100!'); open('selecteddb.php?name=$DB#crits','_self')</script>";
		}else{
		$res=mysqli_query($con,$sql);
		if($res){
			
			echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
		}
	}

			}else{
		$sql="insert into tblcriteriatop values(null,'$value1','$percent1','$category',null),(null,'$value2','$percent2','$category',null),(null,'$value3','$percent3','$category',null),(null,'$value4','$percent4','$category',null)";
		if($percent1+$percent2+$percent3+$percent4!=100){
			echo "<script>alert('sum of values must be equal to 100!'); open('selecteddb.php?name=$DB#crits','_self')</script>";
		}else{
		$res=mysqli_query($con,$sql)or die (mysqli_error($con));
		if($res){
			
			echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
			//echo "<script>open('#','_self')</script>";
		}else{
			echo 'fail';
		}
	}
	 	}
	 }else{
		$sql="insert into tblcriteriatop values(null,'$value1','$percent1','$category',null),(null,'$value2','$percent2','$category',null),(null,'$value3','$percent3','$category',null)";
		if($percent1+$percent2+$percent3!=100){
			echo "<script>alert('sum of values must be equal to 100!'); open('selecteddb.php?name=$DB#crits','_self')</script>";
		}else{
		$res=mysqli_query($con,$sql)or die (mysqli_error($con));
		if($res){
			
			echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
			//echo "<script>open('#','_self')</script>";
		}else{
			echo 'fail';
		}
	}

	}
	}else{
		$sql="insert into tblcriteriatop values(null,'$value1','$percent1','$category',null),(null,'$value2','$percent2','$category',null)";
		if($percent1+$percent2!=100){
			echo "<script>alert('sum of values must be equal to 100!'); open('selecteddb.php?name=$DB#crits','_self')</script>";
		}else{	
		$res=mysqli_query($con,$sql)or die (mysqli_error($con));
		

		if($res){
			echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
			//echo "<script>open('#','_self')</script>";
		}else{
			echo 'fail';
		}
	}
	}
	}else{
		
		if($percent1!=100){
			echo "<script>alert('sum of values must be equal to 100!'); open('selecteddb.php?name=$DB#crits','_self')</script>";
		}else{
		$sql="insert into tblcriteriatop values(null,'$value1','$percent1','$category',null)";
		$res=mysqli_query($con,$sql);
		if($res){
			echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
			    }
		}
	}
	}else{
			echo "<script>alert('invalid input!'); open('selecteddb.php?name=$DB','_self')</script>";
		}
	

	


?>