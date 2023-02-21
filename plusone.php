<?php
    $DB=$_POST['database'];
	$con=mysqli_connect('localhost','root','',$DB);
   
	
	echo $stat=$_POST['stat'];
    echo $TYPE=$_POST['type'];
	echo $DB=$_POST['database'];
	echo $fone=$_POST['plus'];
	echo $mone=$_POST['plus1'];

	//FOR FEMALE ONLY	
        $sqlcan="select * from tblcandidate where fullname='$fone'";
	    $rescan=mysqli_query($con,$sqlcan);
	    while($row=mysqli_fetch_array($rescan)){
	        echo $canid=$row['canid'];
	    }
		if($TYPE=='ranking'):
	    if($stat==0):
        $sqlupdate="update tblscore set score=1 where canid='$canid'";
        $res=mysqli_query($con,$sqlupdate);
        endif;
        if($stat==1):
        $sqlupdate="update tblcriteriascore set score=1 where canid='$canid'";
        $res=mysqli_query($con,$sqlupdate);
        endif;
        endif;
        if($TYPE=='percentage'):
         $sqlupdate="update tblscore set score=99 where canid='$canid'";
         $res=mysqli_query($con,$sqlupdate);
         endif;
				
	   
	 
		//FOR MALE ONLY	
		$sqlcan="select * from tblcandidate where fullname='$mone'";
	    $rescan=mysqli_query($con,$sqlcan);
	    while($row=mysqli_fetch_array($rescan)){
	      echo  $canid=$row['canid'];
	    }
 
		if($TYPE=='ranking'):
	    if($stat==0):
        $sqlupdate="update tblscore set score=1 where canid='$canid'";
        $res=mysqli_query($con,$sqlupdate);
        endif;
        if($stat==1):
        $sqlupdate="update tblcriteriascore set score=1 where canid='$canid'";
        $res=mysqli_query($con,$sqlupdate);
        endif;
        endif;
        if($TYPE=='percentage'):
         $sqlupdate="update tblscore set score=99 where canid='$canid'";
         $res=mysqli_query($con,$sqlupdate);
         endif;
				
	
	echo "<script>open('extract.php?name=$DB','_self')</script>";
	
?>