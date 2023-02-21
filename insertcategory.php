<?php

$top=$_POST['top'];

$max=$_POST['max'];
$min=$_POST['min'];
$category=$_POST['category'];
$category=ucfirst($category);
$type=$_POST['type'];
$x=1;
if($type=='ranking1'){
    $type='ranking';
    $stat=1;
}else{
    $stat=0;
}
$DB =$_POST['database'];

$DB = str_replace(' ', '', $DB);


$pageant = $_POST['title'];
$pageant = ucfirst($pageant);
$count = $_POST["counter"];
$con = mysqli_connect('localhost','root','',$DB)or die (mysqli_error($con));
$con2 = mysqli_connect('localhost','root','','tesdacmi_users')or die (mysqli_error($con));
$user=$_POST['username'];
$psword=$_POST['password'];
$sqlo="insert into tblusers values(null,'$user','$psword','organizer','$DB','activated',0,null)";
$reso=mysqli_query($con2,$sqlo);

$sqlpure="CREATE TABLE tblstat (
pid INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
status int(1) NOT NULL
)";
$respure=mysqli_query($con,$sqlpure);
if($respure){
	$sql78="insert into tblstat values (null,'$stat')";
	$res78 = mysqli_query($con,$sql78);
}




$sqlsetting="CREATE TABLE tblsetting (
setid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
type VARCHAR(50) NOT NULL,
category VARCHAR(50) NOT NULL,
max INT(3) NOT NULL,
min INT(3) NOT NULL,
elimination INT(1) NOT NULL,
reg_date TIMESTAMP
)";
$ressetting=mysqli_query($con,$sqlsetting);
if($ressetting){
	$sql="insert into tblsetting values (null,'$type','$category','$max','$min','$top',null)";
	$res = mysqli_query($con,$sql);
}


$sqlelim="CREATE TABLE tblelimination (
eid INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
type VARCHAR(20) NOT NULL,
status INT(1) NOT NULL
)";
$reselim=mysqli_query($con,$sqlelim);


$sqlmini="CREATE TABLE tblcriteriascore (
csid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
jid INT(3) NOT NULL,
criteria VARCHAR(50) NOT NULL,
score FLOAT(8) NOT NULL,
gender VARCHAR(10) NOT NULL,
category VARCHAR(50) NOT NULL,
canid INT(6) NOT NULL
)";
$resmini=mysqli_query($con,$sqlmini);

$sqllock="CREATE TABLE tbllock (
jid INT(3) NOT NULL,
category VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";
$reslock=mysqli_query($con,$sqllock);


$sql99="CREATE TABLE tblcandidate (
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

$s="CREATE TABLE tblscore (
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
$sql999="CREATE TABLE tbljudge (
fid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";
$res999=mysqli_query($con,$sql999);

$sql666="CREATE TABLE tblcriteria (
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
$sqlcriteria = "insert into tblcriteria values (null,'$category',100,'$category',null)";
$rescriteria = mysqli_query($con,$sqlcriteria) or die (mysqli_error($con));
}
}



$sql2="CREATE TABLE tbltitle (
tid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";
$res2 = mysqli_query($con,$sql2) or die (mysqli_error($con));
if($res2){
$sql1="CREATE TABLE tblcategory (
cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(50) NOT NULL,
percentage FLOAT(5) NOT NULL,
reg_date TIMESTAMP
)";
$res1 = mysqli_query($con,$sql1)or die(mysqli_error($con));
if($res1){

$sql3="insert into tbltitle values(null,'$pageant',null)";
$res3=mysqli_query($con,$sql3);



for($x=1;$x<$count+1;$x++){
$category = $_POST["category$x"];
//$percent = $_POST["percentage$x"];
$percent = mysqli_real_escape_string($con,$_POST["percentage$x"]);



$sql = "insert into tblcategory values (null,'$category','$percent',null)";


$res=mysqli_query($con,$sql)or die (mysqli_error($con));
}

if($top!=0){
  //open('settop.php?name=$DB&top=$top&type=$type','_self');
    echo "<script>
        open('settop.php?name=$DB&top=$top&type=$type','_self');
        </script>";

}else{
    if($res){
echo "<script>
open('selecteddb.php?name=$DB','_self');
</script>";
}else{
	echo 'failcategory';
}
    
}

}else{
	echo 'failtitle';
}
}else{
	echo 'failcategorytable';
}


 ?>

