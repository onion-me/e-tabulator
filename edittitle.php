<?php

$DB = $_POST['db'];
$id = $_POST['tid'];
$title = $_POST['title'];
$con = mysqli_connect('localhost','root','',$DB);

$sql = "UPDATE `tbltitle` SET `title`='$title',`reg_date`=null WHERE tid = '$id';";
$res = mysqli_query($con,$sql);
if ($res){
	echo "<script>
	open('selecteddb.php?name=$DB','_self')
	</script>";
}else{
	echo 'fail';
}

?>