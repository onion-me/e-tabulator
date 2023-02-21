<?php
	$DB=$_POST['db'];
	$password = $_POST['password'];
	$password = md5($password);
	$judge=$_POST['username'];
	//$password=string password_hash ( string $password , int $algo [, array $options ] );
	//$password = password_hash($password, PASSWORD_DEFAULT);
	$conyat=mysqli_connect('localhost','root','','tesdacmi_users');
	$sqlyat="select * from tblusers where username='$judge' and password='$password'";
	$resyat=mysqli_query($conyat,$sqlyat);
	$rowshing=mysqli_num_rows($resyat);
	if($rowshing != 0){
			echo "<script>
				alert('username and password already exists!')
				open('selecteddb.php?name=$DB#addjudge','_self')
				</script>";
	}else{
	
	$con = mysqli_connect('localhost','root','','tesdacmi_users');
	$con1 = mysqli_connect('localhost','root','',$DB);
	$sql="insert into tblusers values(null,'$judge','$password','judge','$DB','activated',0,null)";
	$res = mysqli_query($con,$sql) or die (mysqli_error($con));
	$sql1="insert into tbljudge values(null,'$judge','$password',null)";
	$res1 = mysqli_query($con1,$sql1) or die (mysqli_error($con1));
			if($res&&$res1)
			{
				echo "<script>
				open('selecteddb.php?name=$DB#judgetable','_self')
				</script>";
			}
			else
			{
				echo 'fail';
			}
		}
?>