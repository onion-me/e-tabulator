<html>
    <?php include 'head.php'; 
    
    
      $category=$_GET['category'];
      $gender=$_GET['gender'];
     $DB=$_GET['database'];
   
$DB=$_GET['database'];
$gender=$_GET['gender'];
$con=mysqli_connect('localhost','root','',$DB);
$sqlstat="select * from tblstat";
$resstat=mysqli_query($con,$sqlstat);
while($rowstat=mysqli_fetch_array($resstat)){
    $stat=$rowstat['status'];
}
$sqltitle="select title from tbltitle";
$restitle=mysqli_query($con,$sqltitle);
while($rowtitle=mysqli_fetch_array($restitle)){
    $title = $rowtitle['title'];
}
$sqltype = "select * from tblsetting";
$restype = mysqli_query($con,$sqltype);
while($rowtype = mysqli_fetch_array($restype)){
   $TYPE = $rowtype['type'];
   $CAT = $rowtype['category'];
}
?>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<style>
    html,
body {
margin:0;
padding:0;
height:100%;
}
#wrapper {
min-height:100%;
position:relative;
}
#header {
padding:10px;
background:;
}
#content {
padding:10px;
padding-bottom:80px; /* Height of the footer element */
}
#footer {
width:100%;
height:80px;
position:absolute;
bottom:0;
left:0;
background:;
}

.signature {
    border: 0;
    border-bottom: 1px solid #000;
    width:190px;
}

</style>
    <body>
        <div class="container">
            <div class="row">
                	<div class="col-md-12"><h1 align="center" style="font-family:lucida handwriting;text-transform:capitalize" id="header"><?php echo $title; ?></h1></div>
			<div class="col-md-12" style="height:50px"><span style="float:right"><?php
date_default_timezone_set('Asia/Manila');
echo  date("Y/m/d").'<br>'.date("h:i:sa");
?></span></div>
                
            <?php
   
    
  
  $conyat=mysqli_connect('localhost','root','','tesdacmi_users');

  $sqlshing="select * from tblusers where db='$DB'and usertype='judge' and status='activated'";
  $resshing=mysqli_query($conyat,$sqlshing);
  while($row=mysqli_fetch_array($resshing)){
    
  }
  $con=mysqli_connect('localhost','root','',$DB);
  $sqltype = "select * from tblsetting";
$restype = mysqli_query($con,$sqltype);
while($rowtype = mysqli_fetch_array($restype)){
   $TYPE = $rowtype['type'];
   $CAT = $rowtype['category'];
}


  $ssqqll="select * from tblcategory where category='$category'";
  $rreess=mysqli_query($con,$ssqqll);
  $y=1;
  while($rrooww=mysqli_fetch_array($rreess)){
     $cathehe = $rrooww['category'];
      $per = $rrooww['percentage'];
      

  $num=mysqli_num_rows($resshing);


  if($TYPE=='percentage'):
  $sql="select a.jid,b.cannumber,b.fullname,a.category,a.canid,b.cannumber,sum(score)/'$num'/'$per'*100 as total from tblscore a inner join tblcandidate b on a.canid = b.canid where a.category = '$cathehe' and b.gender='$gender' group by canid order by total desc";
  endif;
  if($TYPE=='ranking'):
  $sql="select a.jid,b.cannumber,b.fullname,a.category,a.canid,b.cannumber,sum(score)/'$per'*100 as total from tblscore a inner join tblcandidate b on a.canid = b.canid where a.category = '$cathehe' and b.gender='$gender' group  by canid order by total asc";
  endif;
  $res=mysqli_query($con,$sql);
  ?>
  
  <div class="col-md-12" id="printableArea<?php echo $y; $y++;?>" > <h3 align="" style="text-transform: capitalize;"><?php echo $cathehe.' '.$per.'%'; ?></h3>
  <table  class="table table-default" id="myTable" style="height:auto;width:100%">
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
<?php  } ?>

















	<div class="container">
		<div class="row">
		    	
        



  <table  class="table table-default" style="boder:1px solid black;width:50px;height:auto">
            <tr>
                <th>No.</th>
            </tr>
            
            <?php 
            $sqlcan="select * from tblcandidate where gender='$gender'";
            $rescan=mysqli_query($con,$sqlcan);
            while($rowcan=mysqli_fetch_array($rescan)){
            ?>
            <tr>
                <td><?php echo $rowcan['cannumber']; ?></td>
            </tr>
            <?php } ?>
       
        </table>
        
      
        <?php
                         $DB=$_GET['database'];    
	                    $sql="select * from tblusers where db='$DB' and usertype='judge' and status='activated'";
	                    $res=mysqli_query($conyat,$sql)or die(mysqli_error($conyat));
	                    while($row=mysqli_fetch_array($res)){ 
	                    $jid=$row['uid']; ?>
	        	<table  class="table table-default" style="boder:1px solid black;width:150px">
	            <tr>
	                <th style="text-align:center"><?php echo $row['username']?></th>
	            </tr>
	         <?php
	                $sqlcrit="select criteria from tblcriteria where category='$category'";
	                $rescrit=mysqli_query($con,$sqlcrit);
	                $critcount=mysqli_num_rows($rescrit);
	               $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score)/'$critcount' as total from tblcriteriascore a inner join tblcandidate b on a.canid = b.canid where b.gender='$gender' and jid='$jid' and category='$category' group by canid order by ABS(cannumber) asc";
	               $rescore=mysqli_query($con,$sqlscore);
	               while($rowscore=mysqli_fetch_array($rescore)){?>
	            <tr>
	                <td style="text-align:center" ><?php echo number_format($rowscore['total'],2)?></td>
	            </tr>
	        <?php } ?>
	            </table>
	           <?php } ?>
		    
		</div>
	</div>
































    <?php
            $conyat=mysqli_connect('localhost','root','','tesdacmi_users');
 $DB=$_GET['database'];
  $sqlshing="select * from tblusers where db='$DB'and usertype='judge' and status='activated'";
  $resshing=mysqli_query($conyat,$sqlshing);
	        while($rowjudge=mysqli_fetch_array($resshing)){
	    ?>
	   
	  <div class="col-md-3">
	  <input type="text" class="signature" value=" " /><br>              
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="text-align:center;font-size:20px;text-transform:capitalize"><?php echo $rowjudge['username']; ?></span><br><br>
       </div>                 
	     
	   <?php
	        }
	    ?>
       
  	</div><!--row-->
  	 <footer class="container  text-center" id="footer" >
         <p class="text-right small " ><span class="" style="color:white;font-size:15px;font-family:italic">	Copyright &copy; <?php echo date("Y");?>  <i class="fa fa-user"></i> Team Panga</span></p>
        </footer>
                   
</div><!--container-->    
        <script type="text/javascript">
 window.print();
    window.close();
	function back(){
		//alert('working!');
		open('monitor.php?name=$DB', '_self');
	}
</script>
    </body>
</html>


