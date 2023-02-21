
<?php




$x=1;
 $DB =$_POST['database'];

$DB = str_replace(' ', '', $DB);
$type=$_POST['type'];
$count = $_POST["counter"];
$top=$_POST['top'];
$con = mysqli_connect('localhost','root','',$DB)or die (mysqli_error($con));






$sqlmini="CREATE TABLE tblcriteriascoretop (
csid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
jid INT(3) NOT NULL,
criteria VARCHAR(50) NOT NULL,
score FLOAT(8) NOT NULL,
gender VARCHAR(10) NOT NULL,
category VARCHAR(50) NOT NULL,
canid INT(6) NOT NULL
)";
$resmini=mysqli_query($con,$sqlmini);

$sqllock="CREATE TABLE tbllocktop (
jid INT(3) NOT NULL,
category VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";
$reslock=mysqli_query($con,$sqllock);


$sql99="CREATE TABLE tblcandidatetop (
canid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
address VARCHAR(50) NOT NULL,
image LONGBLOB NOT NULL,
gender VARCHAR(10) NOT NULL,
age VARCHAR(2) NOT NULL,
cannumber VARCHAR(2) NOT NULL,
reg_date TIMESTAMP
)";
$res99=mysqli_query($con,$sql99);

$s="CREATE TABLE tblscoretop (
sid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
canid INT(3) NOT NULL,
jid INT(3) NOT NULL,
category VARCHAR(50) NOT NULL,
criteria VARCHAR(50) NOT NULL,
score FLOAT(5) NOT NULL,
gender VARCHAR(10) NOT NULL,
reg_date TIMESTAMP
)";
$r=mysqli_query($con,$s)or (mysqli_error($con));


$sql666="CREATE TABLE tblcriteriatop (
critid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
criteria VARCHAR(50) NOT NULL,
percentage INT(3) NOT NULL,
category VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";
$res666=mysqli_query($con,$sql666);


if($type=='ranking'){
for($x=1;$x<$count+1;$x++){
$category = $_POST["category$x"];
$sqlcriteria = "insert into tblcriteriatop values (null,'$category',100,'$category',null)";
$rescriteria = mysqli_query($con,$sqlcriteria) or die (mysqli_error($con));
}
}




$sql1="CREATE TABLE tblcategorytop (
cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(50) NOT NULL,
percentage FLOAT(5) NOT NULL,
reg_date TIMESTAMP
)";
$res1 = mysqli_query($con,$sql1)or die(mysqli_error($con));
if($res1){




for($x=1;$x<$count+1;$x++){
$category = $_POST["category$x"];
//$percent = $_POST["percentage$x"];
$percent = mysqli_real_escape_string($con,$_POST["percentage$x"]);



$sql = "insert into tblcategorytop values (null,'$category','$percent',null)";


$res=mysqli_query($con,$sql)or die (mysqli_error($con));
}


 
echo "<script>

open('selecteddb.php?name=$DB','_self');
</script>";



}else{
	echo 'failtitle';
}



 ?>

