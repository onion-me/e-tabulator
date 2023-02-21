<?php
echo $username=$_POST['username'];
$password=$_POST['password'];
$password = md5($password);
$con=mysqli_connect('localhost','root','','tesdacmi_users');
$sql="insert into tblusers values(null,'$username','$password','admin','tesdacmi_users','activated',0,null)";
$res=mysqli_query($con,$sql)or die(myslqi_erro($con));
		if($res)
		{
			echo "<script>
				open('index.php','_self');
			</script>";
		}
		else
		{
			echo 'you failed in capstone';
		}
?>