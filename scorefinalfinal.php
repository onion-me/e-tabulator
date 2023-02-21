
<?php 
$DB=$_GET['db'];
$con=mysqli_connect('localhost','root','',$DB);
$sqlstat="select * from tblstat";
$resstat=mysqli_query($con,$sqlstat);
while($rowstat=mysqli_fetch_array($resstat)){
    $stat=$rowstat['status'];
}
$sqltype = "select * from tblsetting";
$restype = mysqli_query($con,$sqltype);
while($rowtype = mysqli_fetch_array($restype)){
   $TYPE = $rowtype['type'];
   $CAT = $rowtype['category'];
    $eli = $rowtype['elimination'];
}
?>

<div class="container-fluid">
	<div class="row">
		
			<div class="col-md-12" style="height:50px"><span style="float:right"><?php
echo  date("Y/m/d");
?></span></div>
	<?php 
	$conyat=mysqli_connect('localhost','root','','tesdacmi_users');
	$DB = $_GET['db'];
	$sqlshing="select * from tblusers where db='$DB'and usertype='judge' and status='activated'";
	$resshing=mysqli_query($conyat,$sqlshing);
  $judgenumber = mysqli_num_rows($resshing);
	while($row=mysqli_fetch_array($resshing)){
	}
	$num=mysqli_num_rows($resshing);

	
	if($TYPE=='ranking'):
	     if($stat==0):
  $sql="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblscoretop a inner join tblcandidate b on a.canid = b.canid where b.gender='female' group by canid order by total asc limit $eli";
        endif;
         if($stat==1):
  $sql="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblcriteriascoretop a inner join tblcandidate b on a.canid = b.canid where b.gender='female' group by canid order by total asc limit $eli";
        endif;
  endif;
  if($TYPE=='percentage'):
  $sql="select a.jid,b.cannumber,b.fullname,a.canid,sum(score)/'$num' as total from tblscoretop a inner join tblcandidate b on a.canid = b.canid where b.gender='female' group by canid order by total desc limit $eli";
  endif;
	$res=mysqli_query($con,$sql);
	
	?>
   
    
	<div class="col-md-7" id="printableArea"> <h3 align="">Total Score 100% </h3>

	<table  class="table table-default" id="myTable" style="boder:1px solid black">
			<tr>
        <th>Ranking</th>
				<th>Candidate no.</th>
				<th>Contestant</th>
				<th>TOTAL</th>
			</tr>
		<?php $x = 1;
	while($row=mysqli_fetch_array($res)){
		$row['total'];
     
		?>


		


			<tr>
				<td><?php echo $x.substr(date('jS', mktime(0,0,0,1,($x%10==0?9:($x%100>20?$x%10:$x%100)),2000)),-2); $x=$x+1; ?></td>
				<td><?php echo $row['cannumber']?></td>
				<td ><h5 style="text-transform: capitalize;"><?php echo $row['fullname']?></h5></td>
				<td><?php echo number_format($row['total'],2)?></td>
			</tr>


		



<?php

	}
?>
</table>
		</div><!--class="final score col-md-6"-->




   
    <div class="col-md-5"><!--div2 putana saket sa ulo neto-->
     <div class="table-responsive">
      <table class="table table-striped">
       <thead class="thead-inverse">
       
          <?php  
          $con=mysqli_connect('localhost','root','',$DB); 
          $sqlcategory = "select * from tblcategorytop";
          $rescategory = mysqli_query($con,$sqlcategory);
          $rowcategory = mysqli_num_rows($rescategory);
          $sqlcan = "select * from tblcandidate where gender='female'";
          $rescan = mysqli_query($con,$sqlcan);
          $candidatenumber = $eli;
          ?>
         <h3 align="">Judge Voting <?php $judgemax = $rowcategory*$candidatenumber; ?></h3><br>
        
     
    <?php
      $conjudge = mysqli_connect('localhost','root','','tesdacmi_users');
      $DB=$_GET['db'];
      $sqljudge = "select * from tblusers where usertype='judge' and db = '$DB' and status='activated'";
      $resjudge = mysqli_query($conjudge,$sqljudge);
      while($rowjudge=mysqli_fetch_array($resjudge)){
        $judgeshit = $rowjudge['uid'];
        echo $judgename = $rowjudge['username'].'<br>';
      
      $con=mysqli_connect('localhost','root','',$DB);
      $sql="select * from tblscoretop where jid='$judgeshit'  and gender='female' group by jid";
       $sqlt="select * from tblscoretop where jid='$judgeshit' and gender='female'";
       $rest=mysqli_query($con,$sqlt);
      $res=mysqli_query($con,$sql);

      
      $roww = mysqli_num_rows($rest);
      
      if($roww != 0)
      {

        $res2=mysqli_query($con,$sql);

        while($row=mysqli_fetch_array($res2))
        {
     
    ?>
      
            <?php
           
             $final=$roww/$judgemax*100; ?> <div class="progress">
  <div class="progress-bar bg-dark" role="progressbar" aria-valuenow=""
  aria-valuemin="0" aria-valuemax="7" style="; width:<?php echo $final; ?>%"><?php echo (number_format($final,0)); ?>%
    <span class="sr-only">70% Complete</span>
  </div>

</div>
         
         
          
          
      
        <?php 
        } 
      }
      }
        ?>
           
       </tbody>
      </table>
     </div>
     </div><!--div2-->
    <!--category start :) gagraduate kame :) -->
    <div class="col-md-12" style="height:50px"><hr></div>
   <?php 
  $conyat=mysqli_connect('localhost','root','','tesdacmi_users');
  $DB = $_GET['db'];
  $sqlshing="select * from tblusers where db='$DB'and usertype='judge' and status='activated'";
  $resshing=mysqli_query($conyat,$sqlshing);
  while($row=mysqli_fetch_array($resshing)){
    
  }
  $con=mysqli_connect('localhost','root','',$DB);
  $ssqqll="select * from tblcategorytop";
  $rreess=mysqli_query($con,$ssqqll);
  $y=1;
  while($rrooww=mysqli_fetch_array($rreess)){
     $cathehe = $rrooww['category'];
      $per = $rrooww['percentage'];
      

  $num=mysqli_num_rows($resshing);

  $DB=$_GET['db'];
  if($TYPE=='percentage'):
  $sql="select a.jid,b.cannumber,b.fullname,a.category,a.canid,b.cannumber,sum(score)/'$num'/'$per'*100 as total from tblscoretop a inner join tblcandidate b on a.canid = b.canid where a.category = '$cathehe' and b.gender='female' group by canid order by total desc limit $eli";
  endif;
  if($TYPE=='ranking'):
      if($stat==0):
         $sql="select a.jid,b.cannumber,b.fullname,a.category,a.canid,b.cannumber,sum(score)/'$per'*100 as total from tblscoretop a inner join tblcandidate b on a.canid = b.canid where a.category = '$cathehe' and b.gender='female' group  by canid order by total asc limit $eli";
         endif;
         if($stat==1):
         $sql="select a.jid,b.cannumber,b.fullname,a.category,a.canid,b.cannumber,sum(score) as total from tblcriteriascoretop a inner join tblcandidate b on a.canid = b.canid where a.category = '$cathehe' and b.gender='female' group  by canid order by total asc limit $eli";
         endif;
  endif;
  $res=mysqli_query($con,$sql);
  ?>
    <div class="col-md-12"><h3 align="" style="text-transform: capitalize;"><?php echo $cathehe.' '.$per.'%'; ?></h3></div>
  <div class="col-md-7" id="printableArea<?php echo $y; $y++;?>" >
  <table  class="table table-default" id="myTable" style="boder:1px solid black">
      <tr>
        <th>Candidate no.</th>
        <th >Contestant</th>
        <th>TOTAL</th>
      </tr>
    <?php
  while($row=mysqli_fetch_array($res)){
    $row['total'];

    ?>


    


      <tr>
        
        <td><?php echo $row['cannumber']?></td>
        <td colspan="" ><h5 style="text-transform: capitalize;"><?php echo $row['fullname']?></h5></td>
        <?php if($TYPE=='ranking'): ?>
        <td><?php echo (number_format($row['total'],0))?></td>
        <?php endif; ?>
        <?php if($TYPE=='percentage'): ?>
        <td><?php echo (number_format($row['total'],2))?></td>
        <?php endif; ?>
      </tr>


    



<?php
  }

?>
</table>
    </div><!--class="final score col-md-6" hehehee nice-->
    
    
    <div class="col-md-5">
        <table  class="table table-default" id="myTable" style="boder:1px solid black">
            	   <tr>
            	       <th>Judge</th>
            	       <th>Status</th>
            	   </tr>
        <?php 
           
            $conyat=mysqli_connect('localhost','root','','tesdacmi_users');
	        $DB = $_GET['db'];
	        $sqlshing="select * from tblusers where db='$DB'and usertype='judge' and status='activated'";
	        $resshing=mysqli_query($conyat,$sqlshing);
            	while($row=mysqli_fetch_array($resshing)){  $jid=$row['uid']; $username=$row['username']; ?>
            	 
            	<?php 
            	    $sqll="select * from tbllocktop where jid='$jid' and category='$cathehe'";
            	    $resl=mysqli_query($con,$sqll);
            	    $numr=mysqli_num_rows($resl);
            	  ?>
            	   
            	    <?php if($numr!=0): ?>
            	   <tr>
            	       <td><h5> <?php echo $username; ?></h5> </td>
            	  
            	       <td><h5><span class="fa fa-lock"></span></h5> </td>
            	   </tr>
            	    <?php endif; ?>
            	     <?php if($numr==0): ?>
            	   <tr>
            	       <td><h5><?php echo $username; ?></h5></td>
            	   
            	       <td><h5><span class="fa fa-unlock"></span></h5> </td>
            	   </tr>
            	    <?php endif; ?>
            	  
            	 
            	 
            	 
            	  
            	 
        <?php
        	}
        ?>
         </table>
    </div>
    
    
<?php  } ?>
 
    <div class="col-sm-6"><!--div3-->
    </div><!--div3-->
    <div class="col-sm-6"><!--div4-->
    </div><!--div4-->
                   
  	</div><!--row-->
</div><!--container-->