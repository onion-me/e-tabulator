 
 
<?php
$DB=$_GET['name'];
$con = mysqli_connect('localhost','root','',$DB);
$sqlsetting="select elimination from tblsetting";
$ressetting=mysqli_query($con,$sqlsetting);
while($rowsetting=mysqli_fetch_array($ressetting)){
   $elim=$rowsetting['elimination'];
}
$sql="select category from tblcategory";
$res=mysqli_query($con,$sql);
$catnum=mysqli_num_rows($res);
$conj = mysqli_connect('localhost','root','','tesdacmi_users');
$sql1="select uid from tblusers where usertype='judge' and db='$DB' and status='activated'";
$res1=mysqli_query($conj,$sql1);
$judnum=mysqli_num_rows($res1);
$product=$catnum*$judnum;
$sql2="select * from tbllock";
$res2=mysqli_query($con,$sql2);
$mul=mysqli_num_rows($res2);
if($product!=0||$mul!=0){
if($product==$mul){
    
    
    
    
    
  
	$con=mysqli_connect('localhost','root','',$DB);
   
if (isset($_POST['stat'])) 
{ 
 $stat=$_POST['stat']; 
} 

if (isset($_POST['plus'])) 
{ 
 $fone=$_POST['plus']; 
} 
if (isset($_POST['plus1'])) 
{ 
 $mone=$_POST['plus1']; 
} 
	if (isset($_POST['type'])) 
{ 
 $TYPE=$_POST['type']; 

	//FOR FEMALE ONLY	
        $sqlcan="select * from tblcandidate where fullname='$fone'";
	    $rescan=mysqli_query($con,$sqlcan);
	    while($row=mysqli_fetch_array($rescan)){
	        echo $canid=$row['canid'];
	    }
		if($TYPE=='ranking'):
	    if($stat==0):
	        
        $sql="select * from tblscore where canid='$canid' limit 1";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res)){
            echo $canid=$row['canid'];
            echo $score=$row['score'];
            echo $category=$row['category'];
            echo $date=$row['reg_date'];
        }
        $sqlp="update tblscore set score=$score-1 where canid='$canid' and reg_date='$date'";
        $resp=mysqli_query($con,$sqlp);
        if($resp){
            echo "nice";
        }
        
        endif;
        if($stat==1):
        
          $sql="select * from tblcriteriascore where canid='$canid' limit 1";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res)){
            echo $canid=$row['canid'];
            echo $score=$row['score'];
            echo $category=$row['category'];
                 $id=$row['csid'];
            
        }
        $sql="update tblcriteriascore set score=$score-1 where csid='$id'";
        $res=mysqli_query($con,$sql);
        
        endif;
        endif;
        if($TYPE=='percentage'):
            
          $sql="select * from tblscore where canid='$canid' limit 1";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res)){
             $canid=$row['canid'];
             $score=$row['score'];
             $category=$row['category'];
             $date=$row['reg_date'];
        }
        $sqlp="update tblscore set score=$score+1 where canid='$canid' and category='$category' and score='$score' and reg_date='$date'";
        $resp=mysqli_query($con,$sqlp);
        if($resp){
           
        }
    
         endif;
				
	   
	 
		//FOR MALE ONLY	
		$sqlcan="select * from tblcandidate where fullname='$mone'";
	    $rescan=mysqli_query($con,$sqlcan);
	    while($row=mysqli_fetch_array($rescan)){
	      echo  $canid=$row['canid'];
	    }
 
		if($TYPE=='ranking'):
	    if($stat==0):
       
            
        $sql="select * from tblscore where canid='$canid' limit 1";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res)){
            echo $canid=$row['canid'];
            echo $score=$row['score'];
            echo $category=$row['category'];
            echo $date=$row['reg_date'];
        }
        $sqlp="update tblscore set score=$score-1 where canid='$canid' and reg_date='$date'";
        $resp=mysqli_query($con,$sqlp);
        if($resp){
            echo 'nice';
        }
       
       
        endif;
        if($stat==1):
                
             
          $sql="select * from tblcriteriascore where canid='$canid' limit 1";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res)){
            echo $canid=$row['canid'];
            echo $score=$row['score'];
            echo $category=$row['category'];
                 $id=$row['csid'];
            
        }
        $sql="update tblcriteriascore set score=$score-1 where csid='$id'";
        $res=mysqli_query($con,$sql);
    
        endif;
        endif;
        if($TYPE=='percentage'):
        
             
          $sql="select * from tblscore where canid='$canid' limit 1";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res)){
             $canid=$row['canid'];
             $score=$row['score'];
             $category=$row['category'];
             $date=$row['reg_date'];
             $id=$row['sid'];
        }
        $sqlp="update tblscore set score=$score+1 where sid='$id'";
        $resp=mysqli_query($con,$sqlp);
        if($resp){
           
        }
        
         endif;
       
            
         }
        
      
				
	

	

    
    
    
    
    
    
    $sql="insert into tblelimination values(null,'elim',1)";
    mysqli_query($con,$sql);
    echo "<script>open('monitorfinal.php?name=$DB','_self')</script>";
    //echo "<script>open('#','_self')</script>";
}else{
    echo $mul.$product;
    echo "<script>alert('judging is ongoing');
    open('monitor.php?name=$DB','_self');
    </script>";
    }
}else{
     echo "<script>alert('back');
    open('monitor.php?name=$DB','_self');
    </script>";
}
?>
   
