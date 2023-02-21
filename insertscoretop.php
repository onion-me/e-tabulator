<?php   session_start();
		$DB=$_POST['db'];
		
		$con=mysqli_connect('localhost','root','',$DB);
		$count=$_POST['row'];
		$gender=$_POST['gender'];
		$category=$_POST['category'];
		$judge =$_POST['jid'];
		$candidate =$_POST['cid'];
		$total=0;
		$catpercent = $_POST['catpercent'];

 $sqle="select * from tblscoretop 
 where canid = '$candidate' 
 and jid = '$judge' 
 and category ='$category' 
 and gender = '$gender'";
          $rese=mysqli_query($con,$sqle);
          $numshing=mysqli_num_rows($rese);
          if($numshing==0){
		for($x=1;$x<$count+1;$x++){

		
		$score = $_POST["score$x"]/100*$_POST["percent$x"];
		$criteria=$_POST["criteria$x"];
		$total=$total+$score;

		/*audit trail*/
	$scoremini = $_POST["score$x"];
	$sqlmini = "insert into tblcriteriascoretop values('null','$judge','$criteria','$scoremini','$gender','$category','$candidate')";	
	$resmini = mysqli_query($con,$sqlmini);
	$conny = mysqli_connect('localhost','root','','tesdacmi_users');
	$USERTYPE = $_SESSION['username']['usertype'];
    $DB=$_SESSION['username']['db'];
    $UID=$_SESSION['username']['uid'];
    $action= "Scored candidate no:".$_POST["cid"]." on criteria:".$_POST["criteria$x"] ;
    $USER=$_SESSION['username']['username'].'('.$_SESSION['username']['usertype'].')';
    $slq="insert into tblaudittrail values('null','$DB','$UID','$USER','$action',null)";
    $rees = mysqli_query($conny,$slq) or die (mysqli_error($conny));
		/*audit trail*/	
	

		
	}
		
	$total = $total/100*$catpercent;
	$sqlcheck="select * from tblscoretop where category='$category' and jid='$judge' and canid='$candidate'";
	$rescheck=mysqli_query($con,$sqlcheck);
	$numrow=mysqli_num_rows($rescheck);
	
	$sql="insert into tblscoretop values(null,'$candidate','$judge','$category','$catpercent','$total','$gender',null)";
		$res=mysqli_query($con,$sql)or die(mysqli_error($con));
		if($res)
		{

			$candidate=trim($candidate);
			echo "<script>open('finaljudgehome.php?category=$category#candidate$candidate','_self');</script>";
			//echo "<script>open('finaljudgehome.php?category=$category','_self');</script>";
		}
		else
		{
			echo 'faled to spell it correctly';
		}
          }else{
              	echo "<script>alert('duplicates are not allowed'); open('finaljudgehome.php?category=$category','_self');</script>";
          }

		
?>