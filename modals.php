<!-- Modal -->
<div class="modal fade" id="trashmodal<?php echo $DB; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">CLEAR</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="cleardatabase.php" method="POST" role="form" autocomplete="off" id="" onsubmit="backbut.disabled = true; return true;">                           
                            <input type="hidden" value="<?php echo $DB; ?>" name="data"> 
                            <div class="alert alert-danger">
                                <strong>Warning!</strong>  <h5>Before taking this action make sure to backup this database.<br>Are you sure you want clear database <span style="text-transform: uppercase;font-weight: bold"><?php echo $DB; ?></span> ?<br> This is irreversible.</h5>
                            </div>
                            <hr>
                               
                                <input type="hidden" name="database" value="<?php echo $DB; ?>">
                                <button type="submit" name="backbut" class="btn btn-danger float-right">Yes </button>
                                  <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">

                                  <span aria-hidden="true">No</span>
                                 <span class="sr-only">Close</span>
                                   </button>
                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="backups<?php echo $DB; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">BACKUP</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="backup.php" method="POST" role="form" autocomplete="off" id="" onsubmit="backbut.disabled = true; return true;">                            <input type="hidden" value="<?php echo $DB; ?>" name="data">     
                                <h5>Are you sure you want to backup database <span style="text-transform: uppercase;font-weight: bold"><?php echo $DB; ?></span> ?</h5><hr>
                                <button type="submit" name="backbut" class="btn btn-dark btn-md float-right">Yes </button>
                                  <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">

                                  <span aria-hidden="true">Close</span>
                                 <span class="sr-only">Close</span>
                                   </button>
                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="reset<?php echo $DB; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">Reset</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="reset.php" method="POST" role="form" autocomplete="off" id="" onsubmit="backbut.disabled = true; return true;"> 
   
    <input type="hidden" value="<?php echo $DB; ?>" name="data">     
                                <h5>This action will clear scores.<br>Do you want to continue?</h5><hr>
                                <button type="submit" name="backbut" class="btn btn-dark btn-md float-right">Yes </button>
                                  <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">

                                  <span aria-hidden="true">Close</span>
                                 <span class="sr-only">Close</span>
                                   </button>
                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
  <script>
$(document).ready(
function () {
$('input[type="text"],textarea').bind('change', function () {
// $('textarea[id$=txtfpconfirmcomments]').change(function (event) {

if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
}
});
});

    </script>

<!-- Modal -->
<div class="modal fade" id="conmodal" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">ADD CANDIDATE</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
   
<?php
  ini_set('mysqli.connect_timeout',300);
  ini_set('default_socket_timeout',300);
?>
<html>
  <body>
    <form action="" method="POST" enctype="multipart/form-data">
    <br>
     <div class="form-group">
                                    <label for="uname1">Name</label>
                                    <input type="hidden" name="db" value="<?php echo $DB; ?>">
                                    <input type="text" style="text-transform: capitalize;" placeholder="Firstname-Lastname" class="form-control form-control-md rounded-0" name="fullname" id="uname1" required="">
                                </div>
                                  

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" style="text-transform: capitalize;" placeholder="Brgy-City-Province" class="form-control form-control-md rounded-0" id="pwd1" name="address" required="" autocomplete="new-password">
                                </div>
                                <div class="row" style="">
                                  
                                  <div class="col-md-4">
                                    <label>Age</label>
                                    <input type="number" placeholder="yrs-old" min="16" class="form-control form-control-md rounded-0" name="age" id="pwd1" required="" autocomplete="new-password">
                                </div>
                                <!--<div class="col-md-4">
                                    <label>Candidate No.</label>
                                    <input type="number" placeholder="#" class="form-control form-control-md rounded-0" id="pwd1" name="number" required="" autocomplete="new-password">
                                </div>-->
                                
                                      <?php 
                                        $con=mysqli_connect('localhost','root','',$DB);
                                        $sqlcategory="select * from tblsetting";
                                        $rescategory=mysqli_query($con,$sqlcategory);
                                        while($rowcategory=mysqli_fetch_array($rescategory)){
                                        $ket =  $rowcategory['category'];
                                        }
                                 
                                      ?>
                                    <?php if($ket=='Both'): ?>
                                 <div class="col-md-4">
                                 <label>Select</label>
                                 <select class="custom-select" id="single_select" required="" name="gender"  required>
                                  <option  selected disabled value="">Choose</option>
                                  <option  value="Male">Male</option>
                                  <option  value="Female">Female</option>
                                  </select>
                                </div>
                                  <?php endif; ?>
                                   <?php if($ket=='Group'): ?>
                                    <input type="hidden" value="Group" name="gender">
                                  <?php endif; ?>
                                   <?php if($ket=='Male'): ?>
                                    <input type="hidden" value="Male" name="gender">
                                  <?php endif; ?>
                                   <?php if($ket=='Female'): ?>
                                    <input type="hidden" value="Female" name="gender">
                                  <?php endif; ?>
                                  
                              </div>
                                <div class="form-group">
                                 <label>Upload photo</label>
                                 <div>
                                  <input type="file" name="image" required>
                                  </div>
                                  </div>
   
     
   
    <?php
      if(isset($_POST['sumit']))
    {
        if(getimagesize($_FILES['image']['tmp_name'])== FALSE)
      {
        echo "Please select an image.";
      }
      else
      {
        $image= addslashes($_FILES['image']['tmp_name']);
        $name = addslashes($_FILES['image']['name']);
        $image= file_get_contents($image);
        $image= base64_encode($image);
        $fullname=$_POST['fullname'];
        $gender=$_POST['gender'];
        $age=$_POST['age'];
        $address=$_POST['address'];
        
          for($x=1;100>$x;$x++){
          $sql1="select cannumber from tblcandidate where cannumber='$x' and gender='$gender'";
          $res1=mysqli_query($con,$sql1);
          $number=mysqli_num_rows($res1);
          if($number==0){
              $cannumber=$x;
              break;
          }else{
              continue;
          }
         
      }
    
      
        saveimage($image,$fullname,$age,$address,$cannumber,$gender);
        
      }
    }
   
    function saveimage($image,$fullname,$age,$address,$cannumber,$gender)
    { 
      $DB =$_GET['name'];
      
      $con=mysqli_connect("localhost","root","",$DB);
      if($gender=="Female"){
      $sqlcheck = "select * from tblcandidate where cannumber = $cannumber and gender='female'";
      $rescheck = mysqli_query($con,$sqlcheck);
      $numrow=mysqli_num_rows($rescheck);
      if($numrow!=0){
      echo "<script>alert('candidate number already exists!.')</script>";
      }else{
      $qry="insert into tblcandidate values(null,'$fullname','$address','$image','$gender','$age','$cannumber',null)";
      $result=mysqli_query($con,$qry);
      if($result)
      {
         echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
      }
      else
      {
        echo "<script>alert('image not uploaded.')</script>";
      }
    }
      }else  if($gender=="Male"){
      $sqlcheck = "select * from tblcandidate where cannumber = $cannumber and gender='male'";
      $rescheck = mysqli_query($con,$sqlcheck);
      $numrow=mysqli_num_rows($rescheck);
      if($numrow!=0){
      echo "<script>alert('candidate number already exists!.')</script>";
      }else{
      $qry="insert into tblcandidate values(null,'$fullname','$address','$image','$gender','$age','$cannumber',null)";
      $result=mysqli_query($con,$qry);
      if($result)
      {
         echo "<script>open('selecteddb.php?name=$DB','_self')</script>";
      }
      else
      {
        echo "<script>alert('image not uploaded.')</script>";
      }
      
      }
    }
      

    function displayimage()
    { $DB =$_GET['name'];
      $con=mysqli_connect("localhost","tesdacmi_athan","athan2018athan",$DB);
      $sql="select * from tblcandidate";
      $res=mysqli_query($con,$sql);
      while($row=mysqli_fetch_array($res))
      {

        echo "<img height='300' width='300' src='data:image/JPEG;base64,".$row[3]."'>";
        
        

      }
      mysqli_close($con);
    }
  }
    ?>
<!-------------------------------------uplod end---------------------------------------------->
                                
                                <button type="submit" name="sumit" class="btn btn-dark btn-md float-right">save</button>
    </form>
    
    
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->


<!-- Judge Modal -->

<!-- Modal -->

   <?php
    $DB=$_GET['name'];
    $con = mysqli_connect('localhost','root','',$DB);
    $sqlstat="select * from tblstat";
    $resstat=mysqli_query($con,$sqlstat);
    while($rowstat=mysqli_fetch_array($resstat)){
        $stat=$rowstat['status'];
    }
    $sqlsetting="select elimination from tblsetting";
    $ressetting=mysqli_query($con,$sqlsetting);
    while($rowsetting=mysqli_fetch_array($ressetting)){
       $eli=$rowsetting['elimination'];
       $eli2=$rowsetting['elimination']+1;
    }
    $sqltype = "select * from tblsetting";
    $restype = mysqli_query($con,$sqltype);
    while($rowtype = mysqli_fetch_array($restype)){
       $TYPE = $rowtype['type'];
       $CAT = $rowtype['category'];
    }
    $conyat=mysqli_connect('localhost','root','','tesdacmi_users');
	$sqlshing="select * from tblusers where db='$DB'and usertype='judge' and status='activated'";
	$resshing=mysqli_query($conyat,$sqlshing);
    $judgenumber = mysqli_num_rows($resshing);
	while($row=mysqli_fetch_array($resshing)){
	}
	$nums=mysqli_num_rows($resshing);

//FOR FEMALE ONLY	
	if($TYPE=='ranking'):
	    if($stat==0):
        $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender  ='female' group by canid order by total asc limit $eli";
        endif;
        if($stat==1):
        $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblcriteriascore a inner join tblcandidate b on a.canid = b.canid where b.gender  ='female' group by canid order by total asc limit $eli";
        endif;
  endif;
  if($TYPE=='percentage'):
  $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score)/'$nums' as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='female' group by canid order by total desc limit $eli";
  endif;
	$resscore=mysqli_query($con,$sqlscore);
    $num=mysqli_num_rows($resscore);
    $count=0;
    if($num!=0){
	while($rowscore=mysqli_fetch_array($resscore)){ 
	   $count++;     	
	   if($count==$num){
	   
	           	   $canid1=$rowscore['canid'];
				  $can1f=$rowscore['fullname'];
				   $score1=number_format($rowscore['total'],2);
				
	   
	   }
	}
}else{
  $score1='';
}
    // PARA SA TOP 4 
    	if($TYPE=='ranking'):
	    if($stat==0):
        $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender  ='female' group by canid order by total asc limit $eli2";
        endif;
        if($stat==1):
        $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblcriteriascore a inner join tblcandidate b on a.canid = b.canid where b.gender  ='female' group by canid order by total asc limit $eli2";
        endif;
  endif;
  if($TYPE=='percentage'):
  $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score)/'$nums' as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='female' group by canid order by total desc limit $eli2";
  endif;
	$resscore=mysqli_query($con,$sqlscore);
    $num=mysqli_num_rows($resscore);
    $count=0;
    if($num!=0){
	while($rowscore=mysqli_fetch_array($resscore)){ 
	   $count++;     	
	   if($count==$num){
	   
	             $canid2=$rowscore['canid'];
			    $can2f=$rowscore['fullname'];
			    $score2=number_format($rowscore['total'],2);
				
	 
	   }
	}
}else{
  $score2='';
}
   //FOR MALE ONLY	
	if($TYPE=='ranking'):
	    if($stat==0):
        $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender  ='male' group by canid order by total asc limit $eli";
        endif;
        if($stat==1):
        $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblcriteriascore a inner join tblcandidate b on a.canid = b.canid where b.gender  ='male' group by canid order by total asc limit $eli";
        endif;
  endif;
  if($TYPE=='percentage'):
  $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score)/'$nums' as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='male' group by canid order by total desc limit $eli";
  endif;
	$resscore=mysqli_query($con,$sqlscore);
    $num=mysqli_num_rows($resscore);
    $count=0;
    if($num!=0){
	while($rowscore=mysqli_fetch_array($resscore)){ 
	   $count++;     	
	   if($count==$num){
	   
	           	  $canid3=$rowscore['canid'];
				  $can3f=$rowscore['fullname'];
				   $score3=number_format($rowscore['total'],2);
				
	   
	   }
	}
}else{
  $score3='';
}
    // PARA SA TOP 4 
    	if($TYPE=='ranking'):
	    if($stat==0):
        $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender  ='male' group by canid order by total asc limit $eli2";
        endif;
        if($stat==1):
        $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score) as total from tblcriteriascore a inner join tblcandidate b on a.canid = b.canid where b.gender  ='male' group by canid order by total asc limit $eli2";
        endif;
  endif;
  if($TYPE=='percentage'):
  $sqlscore="select a.jid,b.cannumber,b.fullname,a.canid,sum(score)/'$nums' as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='male' group by canid order by total desc limit $eli2";
  endif;
	$resscore=mysqli_query($con,$sqlscore);
    $num=mysqli_num_rows($resscore);
    $count=0;
    if($num!=0){
	while($rowscore=mysqli_fetch_array($resscore)){ 
	   $count++;     	
	   if($count==$num){
	   
	            $canid4=$rowscore['canid'];
			    $can4f=$rowscore['fullname'];
			    $score4=number_format($rowscore['total'],2);
				
	 
	   }
	}
}else{
  $score4='';
}
   
   ?>
   <?php if($score1!=''&&$score1==$score2||$score3!=''&&$score3==$score4): ?>
   <!-- Modal -->
<div class="modal fade" id="tiebreaker<?php echo $DB; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">Tie Breaker</span></h3>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
     </button>
   
   </div>
     <div class="modal-body">
       
            <form method="POST" action="extract.php?name=<?php echo $DB; ?>">
             
              <input type="hidden" name="database" value="<?php echo $DB; ?>">
              <input type="hidden" name="stat" value="<?php echo $stat; ?>">
              <input type="hidden" name="type" value="<?php echo $TYPE; ?>">
              <h5>Choose candidate who will move on to final round</h5>
              <?php if($score1!=0): ?>
              <?php if($score1==$score2): ?>
              female:<br>
              <input type="radio" required name="plus" value="<?php echo $can1f; ?>" > <span style="text-transform:capitalize"><?php echo $can1f; ?></span>
              <input type="radio" name="plus" value="<?php echo $can2f; ?>"> <span style="text-transform:capitalize"><?php echo $can2f; ?></span><br>
              <?php endif; ?>
              <?php endif; ?>
              <?php if($score3!=0): ?>
               <?php if($score3==$score4): ?>
               male:<br>
              <input type="radio" required name="plus1" value="<?php echo $can3f; ?>" > <span style="text-transform:capitalize"><?php echo $can3f; ?></span>
              <input type="radio" name="plus1" value="<?php echo $can4f; ?>"> <span style="text-transform:capitalize"><?php echo $can4f; ?></span><br>
              <?php endif; ?>
              <?php endif; ?>
              
             
              
           
                                
      <button type="submit" name="backbut" class="btn btn-dark btn-md float-right">Submit </button>
       </form>
        <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">Close</span>
        <span class="sr-only">Close</span>
        </button>
    </form>
   </div>
    
  </div>
 </div>
</div>
<!-- Modal -->
   <?php endif; ?>
   <?php if($score1!=''&&$score1!=$score2||$score3!=''&&$score3!=$score4): ?>
   <!-- Modal -->
<div class="modal fade" id="tiebreaker<?php echo $DB; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">Final Round</span></h3>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
     </button>
   
   </div>
     <div class="modal-body">
       
                                <h5>Extract Finalist? </h5><hr>
                                
                                
        <a href="extract.php?name=<?php echo $DB; ?>" class="btn btn-dark btn-md float-right">yes </a>
        <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">Close</span>
        <span class="sr-only">Close</span>
        </button>
    </form>
   </div>
    
  </div>
 </div>
</div>
<!-- Modal -->
  
   <?php endif; ?>
   
   
   <!-- Modal -->
<div class="modal fade" id="org" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">Add Organizer</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="insertorg.php" method="POST" role="form" autocomplete="off" id="" onsubmit="backbut.disabled = true; return true;"> 
   
    <input type="hidden" value="<?php echo $DB; ?>" name="data">     
                               
                                <div class="card-body" >
                            <form class="form" role="form" action ="insertjudge.php" method="POST" autocomplete="off" id="">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $DB; ?>" name="db">
                                    <label for="uname1">Username</label>
                                    <input type="text"  id="uname123" style="text-transform: ;" onchange="usernamecheck()" class="form-control form-control-lg rounded-0"  name="username"  required="" minlength="6">
                                     <p align="center" style="color:red" id="usernamecheck"></p>
                                      <div class="alert alert-danger" id="username_error" role="alert" style="display:none">
                                     <strong>Invalid input:</strong> Enter atleast 6 characters!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="pwd123"  onkeyup="checkpassword()" name="password" class="form-control form-control-lg rounded-0"  required="" autocomplete="new-password">
                                </div>
                                <div class="alert alert-danger" id="length_error" role="alert" style="display:none">
                                     <strong>Invalid input:</strong> Password is too short enter atleast 6 characters!
                                    </div>
                                 <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password"  onkeyup="checkpassword()" class="form-control form-control-lg rounded-0" id="pwd234" required="" autocomplete="new-password">
                                    <p align="center" id="passwordcheck" style="color:red"></p>
                                     <p align="center" id="lengthcheck" style="color:red"></p>
                                     <div class="alert alert-danger" id ="match_error" style="display:none" role="alert">
                                     <strong>Invalid input:</strong> Password doesn't matched!
                                    </div>
                                     
                                    
                                    
                                </div>
                              



<script>

$(document).ready(
function () {
$('input[type="text"],textarea').bind('change', function () {
// $('textarea[id$=txtfpconfirmcomments]').change(function (event) {

if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
}
});
});

function usernamecheck(){
  var x = document.getElementById('uname123').value;
  var y = document.getElementById('usernamecheck');
  var z = document.getElementById('username_error');
  var j = document.getElementById('uname123').value;


//alert(x);
        
  if(x.length<6){
     
      
      z.style.display = "block";

    }else if(x.length>=6){
     
        z.style.display = "none";
    }
}
function checkpassword(){
  var w = document.getElementById('length_error');
  var v = document.getElementById('match_error');
  var x = document.getElementById('pwd123').value;
  var y = document.getElementById('pwd234').value;
  //alert(x);
  if(x.length>=6){
    w.style.display = "none";
     document.getElementById('jack').style.visibility='';
  
  if(x==y){
    v.style.display = "none";
     document.getElementById('jack').style.visibility='';
  }else if(y.length!=0 && x!=y){
    v.style.display = "block";
    document.getElementById('jack').style.visibility='hidden';
  }

  }else if(x.length>0&&x.length<=5){
     w.style.display = "block";
    document.getElementById('jack').style.visibility='hidden';
  }
 
}
</script>
                              <hr> 
                                <button type="submit" id='jack' class="btn btn-dark btn-md float-right">Register</button>
                                 <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">Close</span>
                                 <span class="sr-only">Close</span>
                                   </button>
                            </form>
                        </div>
                                
                             
                                 

                             
                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
    
    
    <!-- Modal -->
<div class="modal fade" id="finalize<?php echo $DB; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">finalize</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="finalized.php" method="POST" role="form" autocomplete="off" id="" onsubmit="backbut.disabled = true; return true;">                           
                            <input type="hidden" value="<?php echo $DB; ?>" name="data"> 
                           
                                <strong>finalize?</strong>  <h5><span style="text-transform: uppercase;font-weight: bold"><?php echo $DB; ?></span> ?<br>.</h5>
                           
                            <hr>
                               
                                <input type="hidden" name="database" value="<?php echo $DB; ?>">
                                <button type="submit" name="backbut" class="btn btn-dark float-right">Yes </button>
                                  <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="no">

                                  <span aria-hidden="true">No</span>
                                 <span class="sr-only">Close</span>
                                   </button>
                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
  
 

