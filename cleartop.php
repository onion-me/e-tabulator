<?php
        
	     $gender=$_POST['gender'];
		 $category=$_POST['category'];
		 $judge =$_POST['jid'];
		 $candidate =$_POST['cid'];
			$DB=$_POST['db'];
		
$con=mysqli_connect('localhost','root','',$DB);
$sql="delete from tblscoretop
 where canid = '$candidate' 
 and jid = '$judge' 
 and category ='$category' 
 and gender = '$gender'";
 $res=mysqli_query($con,$sql);
 if($res){
    



     $sql2="delete from tblcriteriascoretop where jid='$judge' and criteria='$category' and gender = '$gender' and category = '$category' and canid = '$candidate'";
     $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
     
     	if($res2){
     	    
     $sql3="delete from tblcriteriascoretop where jid='$judge' and gender = '$gender' and category = '$category' and canid = '$candidate'";
     $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
     	 $candidate=trim($candidate);
          echo "<script>open('finaljudgehome.php?category=$category#candidate$candidate','_self');</script>";
          //echo "<script>open('finaljudgehome.php?category=$category','_self');</script>";

     	}else{
     	    echo 'fail';
     	}
 }
?>