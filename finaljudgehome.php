 <?php 
  include 'head.php';
   ?>
   <?php
 session_start();
  if(!isset($_SESSION['username'])){
    echo "<script>
    alert('you must login first!');
    open('index.php','_self');
    </script>";

  }
   $con=mysqli_connect('localhost','root','',$_SESSION['username']['db']);
   $conusers=mysqli_connect('localhost','root','','tesdacmi_users');
   $DB = $_SESSION['username']['db'];
    $sqlstat="select * from tblstat";
            $resstat=mysqli_query($con,$sqlstat);
            while($rowstat=mysqli_fetch_array($resstat)){
                $stat=$rowstat['status'];
            }
              $sqlsetting = "select * from tblsetting";
              $ressetting = mysqli_query($con,$sqlsetting);
              while($rowsetting = mysqli_fetch_array($ressetting)){
               
                $max = $rowsetting['max'];
               $min = $rowsetting['min'];
                $categorygender = $rowsetting['category'];
                $type = $rowsetting['type'];
               $eli = $rowsetting['elimination'];
              }
?>
<html>
<style>html { 
  background: url(images/back.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}</style>
</style>

    <?php
       if(isset($_GET['category']))
      {
        $cat=$_GET['category'];
      }else{
        $cat='';
      }
        $judge=$_SESSION['username']['uid'];
        $sqllock="select * from tbllocktop where jid='$judge' and category='$cat'";
        $reslock=mysqli_query($con,$sqllock);
        $rowlock=mysqli_num_rows($reslock);
    ?>
    <?php if($rowlock==0): ?>
    <?php if($type=="percentage"): ?>
    
    <body style="font-family:lucida;background: url() no-repeat"> 

<div id="app" class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-light bg-faded" style="background: url() no-repeat; width: 100%; background-size: 100%;" >
        <?php
    $sqltitle="select * from tbltitle";
    $restitle=mysqli_query($con,$sqltitle);
    while($rowtitle=mysqli_fetch_array($restitle)){
?>
      
          <h2 style="text-transform:capitalize;font-family:lucida handwriting"><?php echo $rowtitle['title']; ?></h2>
        <?php } ?>
        <!--<span class="fa fa-user">hello</span>-->
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
              </ul>
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item" >
                        <img src="images/AMA_University_logo.png" height="40px" width="100px">
                    </li>
                </ul>
            <ul class="navbar-nav">
                         
                

            </ul>
        </div>
    </nav>
</div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php include 'head.php'; ?>
   <a class="navbar-brand" href="finaljudgehome.php" style="color:gray"><strong><h3><span class="fa fa-bar-chart fa-1x"></span>E-Tabulator</h3></strong></a>
   
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        
        <ul class="navbar-nav ml-auto">
        

         
               <?php 
             
               
              $sql="select * from tblcategorytop";
              $res=mysqli_query($con,$sql);
              while($row=mysqli_fetch_array($res)){
                $cat = $row['category'];
               
              
            ?>
                  
                 <li class="nav-item" >
                    <a class="nav-link" href="finaljudgehome.php?category=<?php echo $cat; ?>" ><h4 style="text-transform: capitalize;"><?php echo $cat ?></h4></a>
                </li>
                

                <?php } ?>
               

           <li class="nav-item">
                    <a class="nav-link"  data-target="#logout" data-toggle="modal" ><span class="fa fa-sign-out fa-2x"></span><?php echo $_SESSION['username']['username']; ?></a>
            </li>
            
        </ul>
        
    </div>
</nav>
<?php if(!isset($_GET['category'])): ?>
        
    <div class="container text-center" style="height:80%">
  <div class="jumbotron" style="background:white;margin-bottom:;margin-top:;">
    <h1><img class='img-responsive ' height='500' width='500' src='images/logos.png'></h1>
    <h3></h3>
    
  </div>
</div>
 <?php include 'footer.php'; ?>
     <?php endif;   ?>
        <div class="container-fluid"  style="boder:3px solid violet;height:80%">
            <div class="row ">
           <div class="col-md-12  main" style="boder:1px solid blue;background-color:a">
           <?php if(isset($_GET['category'])){?>
               <h1 align="center" style="font-family:lucida;text-transform: capitalize;"> <?php echo $cat=$_GET['category']; ?>
             <?php
           
            $conc=mysqli_connect('localhost','root','',$DB);
             $conusers=mysqli_connect('localhost','root','','tesdacmi_users');
           
            $sqlc="select * from tblcandidate";
            $resc=mysqli_query($conc,$sqlc);
            $numberofcandidates=mysqli_num_rows($resc);
            $cat=$_GET['category'];
            $judge=$_SESSION['username']['uid'];
            $sqls="select * from tblscoretop where category='$cat' and jid=$judge";
            $ress=mysqli_query($conc,$sqls);
            $numberofcandidates.'<br>';
            $sqljudge="select * from tblusers where db='$DB'";
            $resjudge=mysqli_query($conusers,$sqljudge);
            $numberofjudge=mysqli_num_rows($resjudge);
             $product=$eli*$numberofjudge;
             $numberofscore=mysqli_num_rows($ress);
             
             $eli;
             if( $categorygender=='Both'){
                 $numberofscore=$numberofscore/2;
             }
                 
                 ?>
                 
            <?php if($eli==$numberofscore): ?>
            
           
           <button data-target="#lock<?php echo $cat; ?>" data-toggle="modal" class="btn btn-default bg-dark" style="color:white">Finalize the Scores  <span class="fa fa-lock"></span></button>
           <!-- Modal -->
<div class="modal fade" id="lock<?php echo $cat; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">LOCK</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="finalizetop.php" method="POST" role="form" autocomplete="off" id="formLogin" onsubmit="backbut.disabled = true; return true;">                          
               <input type="hidden" name="uid" value="<?php echo $_SESSION['username']['uid'];?>">
               <input type="hidden" name="category" value="<?php echo $cat;?>">
               <input type="hidden" name="database" value="<?php echo $DB;?>">     
                                <h5>Are you sure you want to lock score on category <span style="text-transform:capitalize"><?php echo $cat; ?></span>? this is action can't be undone! </h5>
                                  <table class="table table-default" id="">
                                    <thead class="thead-inverse"> 
                                        <tr>
                                            <th>Candidate no.</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sqlcatnum="select criteria from tblcriteriatop where category='$cat'";
                                            $rescatnum=mysqli_query($con,$sqlcatnum);
                                            $catnum=mysqli_num_rows($rescatnum);
                                            $jid=$_SESSION['username']['uid'];
                                            $sql="select b.cannumber,sum(a.score)/$catnum as total from tblcriteriascoretop a inner join tblcandidate b on a.canid=b.canid where  a.category='$cat' and  a.jid='$jid' group by a.canid order by total desc";
                                            $res=mysqli_query($con,$sql);
                                            while($row=mysqli_fetch_array($res)){ 
                                        ?>
                                            <tr>
                                                <td><?php  echo $score=$row['cannumber']; ?></td>                                      
                                                <td><?php  echo $score=number_format($row['total'],2); ?></td>
                                            </tr>      
                                               
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <hr>
                                <button type="submit" name="backbut" class="btn btn-dark btn-md float-right">Yes </button>
                                  <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">

                                  <span aria-hidden="true">No</span>
                                 <span class="sr-only">No</span>
                                   </button>
     </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
           
           <?php endif; ?>
           </h1>
           </div>
            <?php if($eli!=$numberofscore): ?>
                <h5 align="center">A lock button will appear after scoring all the candidates...</h5>
            <?php endif; ?>
           <div class="col-md-12  main" style="boder:1px solid blue;backgroun-color:brown;boder:1px solid black;height:50px">
            
           </div>
           <div class="container-fluid" style="bottomder:5px solid brown;background-color: ">
           <div class="row ">
        
      <?php
        $DB=$_SESSION['username']['db'];
        $con=mysqli_connect('localhost','root','',$DB);
       
            $sql="select a.jid,b.cannumber,b.image,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='female' group by canid order by total desc, ABS(b.cannumber) limit $eli";
        
        $res=mysqli_query($con,$sql);
          $row=mysqli_num_rows($res);
          if($row!=0){
        while($row=mysqli_fetch_array($res))
        {

       ?>
        <div class="col-sm-3  ">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div id="imageko" class="col-md-9 ">
    
          <!--type of scoring php-->
        
          <a href="#"  data-target="#<?php echo $row['canid'] ?>" data-toggle="modal"  >
               <?php   echo "<img class='rounded border border-secondary' height='380' width='280' src='data:image/JPEG;base64,".$row[2]."'>";?>
               <?php 
    $gender='female';
 $candid=$row['canid'];
$uid=$_SESSION['username']['uid'];
 $it=$_GET['category'];
 $sqle="select * from tblscoretop where canid = '$candid' and jid = '$uid' and category ='$it' and gender='female'";
          $rese=mysqli_query($con,$sqle);
          $numshing=mysqli_num_rows($rese);
          if($numshing!=0){
             ?>
               <div class="centered"><img height='150' width='150' src='images/white.png'></div>
               <?php } ?>
          </a>
          </div>
           <style>
              /* Container holding the image and the text */
#imageko {
    position: relative;
    text-align: center;
    color: white;
}

/* Bottom left text */
.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

/* Top left text */
.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

/* Top right text */
.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

/* Bottom right text */
.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

/* Centered text */
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
          </style>
        </div>
        <div class="col-md-12" style="height:20px">
        </div>
        <div class="col-sm-12" style="background-color:;border:0px solid dark;height:70px;border-radius:10px">
          <h3 align="center" style="text-transform: capitalize;"><?php echo $row['fullname']; ?></h3>
          <h4 align="center">candidate no. <?php echo $row['cannumber']; ?></h4>
        </div>
        <div class="col-md-12" style="height:50px">
        </div>
              
        </div>

<!-- Modal -->

<div class="modal fade" id="<?php echo $row['canid']?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header" style="background-color:dark">
    <h3><span aria-hidden="true" style="color:gray;text-transform: capitalize;"><?php echo $_GET['category']?></span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
    <?php 
 $candid=$row['canid'];
 $uid=$_SESSION['username']['uid'];
 $it=$_GET['category'];
 $gender='female';

 $sqle="select * from tblscoretop 
 where canid = '$candid' 
 and jid = '$uid' 
 and category ='$it' 
 and gender = '$gender'";
          $rese=mysqli_query($con,$sqle);
          $numshing=mysqli_num_rows($rese);
          if($numshing==0){
             ?>

   <div class="modal-body" >
    <form class="form" action="insertscoretop.php" method="POST" role="form" onsubmit="subbutton.disabled = true; return true;" autocomplete="off" id="formLogin">
         <div class="form-group">
         <div class="row">
            <div class="col-md-7">
             <?php  echo '<h4 style="text-transform:capitalize">#'.$row['cannumber'].' '.$row['fullname'].'<h4>'."<img height='280' width='200' src='data:image/JPEG;base64,".$row[2]."'>";?>
            </div>
            <div class="col-md-5">
                <div class="row">
          <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
           <input type="hidden" value="female" name="gender">
        <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
         <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
         <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
         <?php
          $candid=$row['canid'];
          $uid=$_SESSION['username']['uid'];
          $it=$_GET['category'];
         

          
         $sql2="select * from tblcategorytop where category = '$it'";
         $res2=mysqli_query($con,$sql2);
         $m=1;
         while($s=mysqli_fetch_array($res2)){
         $percent=$s['percentage']
         
         ?>
          <input type="hidden" value="<?php echo $percent; ?>" name="catpercent">

          <?php $m++; } ?>
    <?php
      $cat=$_GET['category'];
      $con1=mysqli_connect('localhost','root','',$DB);
      $sql9="select * from tblcriteriatop where category='$cat'";
      $res9=mysqli_query($con1,$sql9);
       $shitrow=mysqli_num_rows($res9); ?>
        <input type="hidden" value="<?php echo $shitrow ?>" name="row">
      <?php 
        $y=1;
      while($row=mysqli_fetch_array($res9)){
        
      
    ?>
                                       <div class="col-md-12" style="height:30px">  </div>
                                    <div class="col-md-12" style="border:">  
                                    <label form="uname1"><h5 style="text-transform: capitalize;"><?php echo $row['criteria']; ?></h5></label>
                                     <script>
                                function myFunction() {
                            var x = document.getElementById("num");
                            
                               x.value.toUpperCase();
                              }
                                </script>
                                    
                                    <input type="number" step="any" style="" min="<?php  echo $min; ?>" max="<?php  echo $max; ?>" onkeyup="myFunction()" id = "num" step="" placeholder="<?php echo $row['percentage'].'%' ?>" class="form-control form-control-md rounded-0" name="score<?php echo $y ?>" required="">
                                    </div>
                                    
                                    <input type="hidden" value="<?php echo $row['percentage']?>" name="percent<?php echo $y?>">
                                    
                                     <input type="hidden" value="<?php echo $row['criteria']?>" name="criteria<?php echo $y; ?>">
                                    
                                    
                                
                               <?php $y++; }  ?>
                               <?php if($shitrow!=0){?>
                               </div>
                               </div>
                               </div>
                               </div>
                                <button type="submit" name="subbutton" class=" btn btn-default float-right bg-dark" style="color:white;background-color:">Submit the Score</button>
                                </div>
                                <?php }else{ ?>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
                                 
                                <?php } }else{?>
                                   <div class="modal-body" >
                                   <div class="row">
                                       <div class="col-md-3"></div>
                                       <div class="col-md-7">
                                           <h3>You already provided score!</h3>
                                            <h4 style="text-transform:capitalize;font-weight:bold"><?php echo $row['fullname']; ?></h4>
                                             <?php
                                    $sqlcheckoncriteria="select * from tblcriteriascoretop where gender='$gender' and jid='$uid' and category='$it' and canid='$candid'";
                                    $rescheckoncriteria=mysqli_query($con,$sqlcheckoncriteria);
                                    while($rowcheckoncriteria=mysqli_fetch_array($rescheckoncriteria)){
                                        ?>
                                       <h5 style="text-transform:capitalize"><?php echo $rowcheckoncriteria['criteria'].': '.'<strong>'.$rowcheckoncriteria['score'].'</strong>';?></h5>
                                        <?php
                                    }
                                   ?>
                                       
                                   
                                     <form method="POST" action="cleartop.php">
                                             <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
                                             <input type="hidden" value="female" name="gender">
                                           
                                             <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
                                             <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
                                             <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
                                         want to clear the score?
                                         <button type="submit" class="btn btn-dark">clear</button>    
                                     </form>
                                          </div>
                                            <div class="col-md-2"></div>
                                       </div>
                                   </div>

                                <?php }?>
                               
                                <!--confirm modal-->
    
<!--confirm modal-->
    </form>
   
  </div>
 </div>
</div>


<!-- Modal -->
                
        <?php } }   else{ ?>

         <div class="col-sm-4 ">
         </div>
       <div class="col-sm-4 col-sm-offset-12">
          
        
        </div>
              <?php } } ?>
           
    
           
            </div>
            <!-----------------------------------------------ditoooo-------------------------------->
                        <div class="row ">
           <div class="col-md-12  main" style="boder:1px solid blue;background-color:a">
           <?php if(isset($_GET['category'])){?>
              
             <?php
           
            $conc=mysqli_connect('localhost','root','',$DB);
            $sqlc="select * from tblcandidate";
            $resc=mysqli_query($conc,$sqlc);
            $numberofcandidates=mysqli_num_rows($resc);
            $cat=$_GET['category'];
            $judge=$_SESSION['username']['uid'];
            $sqls="select * from tblscoretop where category='$cat' and jid=$judge";
            $ress=mysqli_query($conc,$sqls);
            $numberofcandidates.'<br>';
            $sqljudge="select * from tblusers where db='$DB'";
            $resjudge=mysqli_query($conusers,$sqljudge);
            $numberofjudge=mysqli_num_rows($resjudge);
             $product=$eli*$numberofjudge;
              $numberofscore=mysqli_num_rows($ress);
             
              $eli;
             if( $categorygender=='both'){
                 $eli=$eli*2;
             }
                 ?>
            
           </h1>
           </div>
           
           <div class="col-md-12  main" style="boder:1px solid blue;backgroun-color:brown;boder:1px solid black;height:50px">
            
           </div>
           <div class="container-fluid" style="bottomder:5px solid brown;background-color: ">
           <div class="row ">
        
      <?php
        $DB=$_SESSION['username']['db'];
        $con=mysqli_connect('localhost','root','',$DB);
       
            $sql="select a.jid,b.cannumber,b.image,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='male' group by canid order by total desc, ABS(b.cannumber) asc limit $eli";
        
        $res=mysqli_query($con,$sql);
          $row=mysqli_num_rows($res);
          if($row!=0){
        while($row=mysqli_fetch_array($res))
        {

       ?>
        <div class="col-sm-3  ">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div id="imageko" class="col-md-9 ">
    
          <!--type of scoring php-->
        
          <a href="#"  data-target="#<?php echo $row['canid'] ?>" data-toggle="modal"  >
               <?php   echo "<img class='rounded border border-secondary' height='380' width='280' src='data:image/JPEG;base64,".$row[2]."'>";?>
               <?php 
    $gender='male';
 $candid=$row['canid'];
$uid=$_SESSION['username']['uid'];
 $it=$_GET['category'];
 $sqle="select * from tblscoretop where canid = '$candid' and jid = '$uid' and category ='$it' and gender='male'";
          $rese=mysqli_query($con,$sqle);
          $numshing=mysqli_num_rows($rese);
          if($numshing!=0){
             ?>
               <div class="centered"><img height='150' width='150' src='images/white.png'></div>
               <?php } ?>
          </a>
          </div>
           <style>
              /* Container holding the image and the text */
#imageko {
    position: relative;
    text-align: center;
    color: white;
}

/* Bottom left text */
.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

/* Top left text */
.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

/* Top right text */
.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

/* Bottom right text */
.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

/* Centered text */
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
          </style>
        </div>
        <div class="col-md-12" style="height:20px">
        </div>
        <div class="col-sm-12" style="background-color:;border:0px solid dark;height:70px;border-radius:10px">
          <h3 align="center" style="text-transform: capitalize;"><?php echo $row['fullname']; ?></h3>
          <h4 align="center">candidate no. <?php echo $row['cannumber']; ?></h4>
        </div>
        <div class="col-md-12" style="height:50px">
        </div>
              
        </div>

<!-- Modal -->

<div class="modal fade" id="<?php echo $row['canid']?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header" style="background-color:dark">
    <h3><span aria-hidden="true" style="color:gray;text-transform: capitalize;"><?php echo $_GET['category']?></span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
    <?php 
 $candid=$row['canid'];
 $uid=$_SESSION['username']['uid'];
 $it=$_GET['category'];
 $gender='male';

 $sqle="select * from tblscoretop 
 where canid = '$candid' 
 and jid = '$uid' 
 and category ='$it' 
 and gender = 'male'";
          $rese=mysqli_query($con,$sqle);
          $numshing=mysqli_num_rows($rese);
          if($numshing==0){
             ?>

   <div class="modal-body" >
    <form class="form" action="insertscoretop.php" method="POST" role="form" onsubmit="subbutton.disabled = true; return true;" autocomplete="off" id="formLogin">
         <div class="form-group">
         <div class="row">
            <div class="col-md-7">
             <?php  echo '<h4 style="text-transform:capitalize">#'.$row['cannumber'].' '.$row['fullname'].'<h4>'."<img height='280' width='200' src='data:image/JPEG;base64,".$row[2]."'>";?>
            </div>
            <div class="col-md-5">
                <div class="row">
          <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
           <input type="hidden" value="male" name="gender">
        <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
         <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
         <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
         <?php
          $candid=$row['canid'];
          $uid=$_SESSION['username']['uid'];
          $it=$_GET['category'];
         

          
         $sql2="select * from tblcategorytop where category = '$it'";
         $res2=mysqli_query($con,$sql2);
         $m=1;
         while($s=mysqli_fetch_array($res2)){
         $percent=$s['percentage']
         
         ?>
          <input type="hidden" value="<?php echo $percent; ?>" name="catpercent">

          <?php $m++; } ?>
    <?php
      $cat=$_GET['category'];
      $con1=mysqli_connect('localhost','root','',$DB);
      $sql9="select * from tblcriteriatop where category='$cat'";
      $res9=mysqli_query($con1,$sql9);
       $shitrow=mysqli_num_rows($res9); ?>
        <input type="hidden" value="<?php echo $shitrow ?>" name="row">
      <?php 
        $y=1;
      while($row=mysqli_fetch_array($res9)){
        
      
    ?>
                                       <div class="col-md-12" style="height:30px">  </div>
                                    <div class="col-md-12" style="border:">  
                                    <label form="uname1"><h5 style="text-transform: capitalize;"><?php echo $row['criteria']; ?></h5></label>
                                     <script>
                                function myFunction() {
                            var x = document.getElementById("num");
                            
                               x.value.toUpperCase();
                              }
                                </script>
                                    
                                    <input type="number" step="any" style="" min="<?php  echo $min; ?>" max="<?php  echo $max; ?>" onkeyup="myFunction()" id = "num" step="" placeholder="<?php echo $row['percentage'].'%'; ?>" class="form-control form-control-md rounded-0" name="score<?php echo $y ?>" required="">
                                    </div>
                                    
                                    <input type="hidden" value="<?php echo $row['percentage']?>" name="percent<?php echo $y?>">
                                    
                                     <input type="hidden" value="<?php echo $row['criteria']?>" name="criteria<?php echo $y; ?>">
                                    
                                    
                                
                               <?php $y++; }  ?>
                               <?php if($shitrow!=0){?>
                               </div>
                               </div>
                               </div>
                               </div>
                                <button type="submit" name="subbutton" class=" btn btn-default float-right bg-dark" style="color:white;background-color:">Submit the Score</button>
                                </div>
                                <?php }else{ ?>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
                                 
                                <?php } }else{?>
                                   <div class="modal-body" >
                                   <div class="row">
                                       <div class="col-md-3"></div>
                                       <div class="col-md-7">
                                           <h3>You already provided score!</h3>
                                            <h4 style="text-transform:capitalize;font-weight:bold"><?php echo $row['fullname']; ?></h4>
                                             <?php
                                    $sqlcheckoncriteria="select * from tblcriteriascoretop where gender='$gender' and jid='$uid' and category='$it' and canid='$candid'";
                                    $rescheckoncriteria=mysqli_query($con,$sqlcheckoncriteria);
                                    while($rowcheckoncriteria=mysqli_fetch_array($rescheckoncriteria)){
                                        ?>
                                       <h5 style="text-transform:capitalize"><?php echo $rowcheckoncriteria['criteria'].': '.'<strong>'.$rowcheckoncriteria['score'].'</strong>';?></h5>
                                        <?php
                                    }
                                   ?>
                                       
                                   
                                     <form method="POST" action="cleartop.php">
                                             <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
                                             <input type="hidden" value="<?php echo 'male' ?>" name="gender">
                                             <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
                                             <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
                                             <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
                                         want to clear the score?
                                         <button type="submit" class="btn btn-dark">clear</button>    
                                     </form>
                                          </div>
                                            <div class="col-md-2"></div>
                                       </div>
                                   </div>

                                <?php }?>
                               
                                <!--confirm modal-->
    
<!--confirm modal-->
    </form>
   
  </div>
 </div>
</div>


<!-- Modal -->
                
        <?php } }   else{ ?>

         <div class="col-sm-4 ">
         </div>
       <div class="col-sm-4 col-sm-offset-12">
          
        
        </div>
              <?php } } ?>
           
    
           
            </div>
            </div>
             <?php if(isset($_GET['category'])):
                 include 'footer.php'; 
             endif;
             ?>
        </div>
       
      </div><!--fluid>
      </div>
      </div>
      </div>
<!--/.container-->
        

    </body>
  <?php endif; ?>

     <?php if($type=="ranking"): ?>
    <body style="font-family:lucida;background: url() no-repeat"> 

<?php
    $sqltitle="select * from tbltitle";
    $restitle=mysqli_query($con,$sqltitle);
    while($rowtitle=mysqli_fetch_array($restitle)){
?>
<div id="app" class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-light bg-faded" style="background: url() no-repeat; width: 100%;  background-size: 100%;" >
        <h2 style="text-transform:capitalize;font-family:lucida handwriting"><?php echo $rowtitle['title']; ?></h2>
        <?php } ?>
        <!--<span class="fa fa-user">hello</span>-->
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item" >
                        <img src="images/AMA_University_logo.png" height="40px" width="100px">
                    </li>
                </ul>

            </ul>
            <ul class="navbar-nav">
                         
                

            </ul>
        </div>
    </nav>
</div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php include 'head.php'; ?>
   <a class="navbar-brand" href="finaljudgehome.php" style="color:gray"><strong><h3  style="font-family:helvetica"><span class="fa fa-bar-chart fa-1x"></span>E-Tabulator</h3></strong></a>
   
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        
        <ul class="navbar-nav ml-auto">
        

         
               <?php 
             
               
              $sql="select * from tblcategorytop";
              $res=mysqli_query($con,$sql);
              while($row=mysqli_fetch_array($res)){
                $cat = $row['category'];
               
              
            ?>
                  
                 <li class="nav-item" >
                    <a class="nav-link" id="navcat" style="text-transform: capitalize;" href="finaljudgehome.php?category=<?php echo $cat; ?>" ><h4 style="text-transform: capitalize;"><?php echo $cat ?>   |</h4></a>
                </li>
                     <style>
              a#navcat:hover,
              a.selected {
                color: black;
                background: #efefef;
                border-radius: 8px;
                      }
                      
                      </style>  
                

                <?php } ?>

           <li class="nav-item">
                   <a class="nav-link"  data-target="#logout" data-toggle="modal" ><span class="fa fa-sign-out fa-2x"></span><?php echo $_SESSION['username']['username']; ?></a>
            </li>
            
        </ul>
        
    </div>
</nav>
<?php if(!isset($_GET['category'])): ?>
        
      <div class="container text-center" style="height:80%">
  <div class="jumbotron" style="background:white;margin-bottom:;margin-top:;">
    <h1><img class='img-responsive ' height='500' width='500' src='images/logos.png'></h1>
    <h3></h3>
    
  </div>
</div>
 <?php include 'footer.php'; ?>
     <?php endif;   ?>
        <div class="container-fluid"  style="boder:3px solid violet;height:80%">
            <div class="row ">
           <div class="col-md-12  main" style="boder:1px solid blue;background-color:a">
           <?php if(isset($_GET['category'])){?>
           <h1 align="center" style="font-family:lucida;text-transform: capitalize;"> <?php echo $_GET['category']; ?>
           <?php
           
            $conc=mysqli_connect('localhost','root','',$DB);
            $sqlc="select * from tblcandidate";
            $resc=mysqli_query($conc,$sqlc);
              $numberofcandidates=mysqli_num_rows($resc);
             $cat=$_GET['category'];
             $judge=$_SESSION['username']['uid'];
            $sqls="select * from tblscoretop where category='$cat' and jid=$judge";
            $ress=mysqli_query($conc,$sqls);
            $numberofcandidates.'<br>';
             $numberofscore=mysqli_num_rows($ress);
             $numberofjudge;
             
            if($categorygender=='Both'){
                $numberofscore=$numberofscore/2;
            }
             $categorygender;
            $eli;
            $numberofscore;
                 ?>
            <?php if($eli==$numberofscore): ?>
              
           <button data-target="#lock<?php echo $cat; ?>" data-toggle="modal" class="btn btn-default bg-dark" style="color:white">Finalize the Scores  <span class="fa fa-lock"></span></button>
           <!-- Modal -->
<div class="modal fade" id="lock<?php echo $cat; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">LOCK</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="finalizetop.php" method="POST" role="form" autocomplete="off" id="formLogin" onsubmit="backbut.disabled = true; return true;">                          
               <input type="hidden" name="uid" value="<?php echo $_SESSION['username']['uid'];?>">
               <input type="hidden" name="category" value="<?php echo $cat;?>">
               <input type="hidden" name="database" value="<?php echo $DB;?>">     
                                <h5>Are you sure you want to lock score on category <span style="text-transform:capitalize"><?php echo $cat; ?></span>? this action can't be undone! </h5>
                                <table class="table table-default" id="">
                                    <thead class="thead-inverse"> 
                                        <tr>
                                            <th>Candidate no.</th>
                                            <th>Criteria</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $jid=$_SESSION['username']['uid'];
                                            $sql="select * from tblcriteriascore a inner join tblcandidate b on a.canid=b.canid where a.jid='$jid' and a.category='$cat' order by ABS(b.cannumber asc)";
                                            $res=mysqli_query($con,$sql);
                                            while($row=mysqli_fetch_array($res)){ 
                                        ?>
                                            <tr>
                                                <td><?php  echo $score=$row['cannumber']; ?></td>
                                                <td><?php  echo $score=$row['criteria']; ?></td>
                                                <td><?php  echo $score=$row['score']; ?></td>
                                            </tr>      
                                               
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                
                                <hr>
                                <button type="submit" name="backbut" class="btn btn-dark btn-md float-right">Yes </button>
                                  <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">

                                  <span aria-hidden="true">No</span>
                                 <span class="sr-only">No</span>
                                   </button>
     </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
           </form>
           <?php endif; ?>
           </h1>
           </div>
            <?php if($eli!=$numberofscore): ?>
                <h5 align="center">A lock button will appear after scoring all the candidates...</h5>
            <?php endif; ?>
           
           <div class="col-md-12  main" style="boder:1px solid blue;backgroun-color:brown;boder:1px solid black;height:50px">

           </div>
           <div class="container-fluid" style="bottomder:5px solid brown;background-color: ">
           <div class="row ">

      <?php
        $DB=$_SESSION['username']['db'];
        $con=mysqli_connect('localhost','root','',$DB);
       if($type=='ranking'){
           if($stat==0):
            $sql="select a.jid,b.cannumber,b.image,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='female' group by canid order by total asc, ABS(b.cannumber) asc limit $eli";
            endif;
             if($stat==1):
            $sql="select a.jid,b.cannumber,b.image,b.fullname,a.canid,sum(score) as total from tblcriteriascore a inner join tblcandidate b on a.canid = b.canid where b.gender='female' group by canid order by total asc, ABS(b.cannumber) asc limit $eli";
            endif;
        
        }else{
            $sql="select a.jid,b.cannumber,b.image,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='female' group by canid order by total desc, ABS(b.cannumber) asc limit $eli";
        }
        $res=mysqli_query($con,$sql);
          $row=mysqli_num_rows($res);
          if($row!=0){
        while($row=mysqli_fetch_array($res))
        {

       ?>
        <div class="col-sm-3  ">
            
        <div class="row">
            <div class="col-md-2">
               
            </div>
            <div id="imageko" class="col-md-9 ">
    
          <!--type of scoring php-->
        
          <a href="#"  data-target="#<?php echo $row['canid'] ?>" data-toggle="modal"  >
               <?php   echo "<img class='rounded border border-secondary' height='380' width='280' src='data:image/JPEG;base64,".$row[2]."'>";?>
               <?php 
    $gender='female';
 $candid=$row['canid'];
$uid=$_SESSION['username']['uid'];
 $it=$_GET['category'];
 $sqle="select * from tblscoretop where canid = '$candid' and jid = '$uid' and category ='$it' and gender='$gender'";
          $rese=mysqli_query($con,$sqle);
          $numshing=mysqli_num_rows($rese);
          if($numshing!=0){
             ?>
               <div class="centered"><img height='150' width='150' src='images/white.png'></div>
               <?php } ?>
          </a>
          </div>
          <style>
              /* Container holding the image and the text */
#imageko {
    position: relative;
    text-align: center;
    color: white;
}

/* Bottom left text */
.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

/* Top left text */
.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

/* Top right text */
.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

/* Bottom right text */
.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

/* Centered text */
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
          </style>
        </div>
        <div class="col-md-12" style="height:20px">
        </div>
        <div class="col-sm-12" style="background-color:;border:0px solid dark;height:70px;border-radius:10px">
          <h3 style="text-transform: capitalize;" align="center"><?php echo $row['fullname']; ?></h3>
          <h4 align="center">candidate no. <?php echo $row['cannumber']; ?></h4>
        </div>
        <div class="col-md-12" style="height:50px">
        </div>
              
        </div>

<!-- Modal -->

<div class="modal fade" id="<?php echo $row['canid']?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header" style="background-color:dark">
    <h3><span aria-hidden="true" style="color:gray;text-transform: capitalize;"><?php echo $_GET['category']?></span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
    <?php 
    $gender='female';
 $candid=$row['canid'];
$uid=$_SESSION['username']['uid'];
 $it=$_GET['category'];
 $sqle="select * from tblscoretop where canid = '$candid' and jid = '$uid' and category ='$it' and gender='$gender'";
          $rese=mysqli_query($con,$sqle);
          $numshing=mysqli_num_rows($rese);
          if($numshing==0){
             ?>

   <div class="modal-body" >
    <form class="form" action="insertscoretop.php" method="POST" onsubmit="subrank.disabled = true; return true;" role="form" autocomplete="off" id="formLogin">
         <div class="form-group">
         <div class="row">
            <div class="col-md-7">
             <?php  echo '<h4>#'.$row['cannumber'].' '.$row['fullname'].'<h4>'."<img height='280' width='200' src='data:image/JPEG;base64,".$row[2]."'>";?>
            </div>
            <div class="col-md-5">
                <div class="row">
          <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
        <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
         <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
         <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
         <?php
          $candid=$row['canid'];
          $uid=$_SESSION['username']['uid'];
          $it=$_GET['category'];
           
         
     
       
         $sql2="select * from tblcategorytop where category = '$it'";
         $res2=mysqli_query($con,$sql2);
         $m=1;
         while($s=mysqli_fetch_array($res2)){
         $percent=$s['percentage']
         
         ?>
          <input type="hidden" value="<?php echo $percent; ?>" name="catpercent">
          <input type="hidden" value="<?php echo $gender; ?>" name="<?php echo $gender; ?>">

          <?php $m++; } ?>
    <?php
     
            $sqlcount = "select * from tblcandidate where gender='$gender'";
            $rescount = mysqli_query($con,$sqlcount);
            $rowcount = mysqli_num_rows($rescount);
            
            //echo $rowcount;
             
      $cat=$_GET['category'];
      $con1=mysqli_connect('localhost','root','',$DB);
      $sql9="select * from tblcriteriatop where category='$cat'";
      $res9=mysqli_query($con1,$sql9);
       $shitrow=mysqli_num_rows($res9); ?>
        <input type="hidden" value="<?php echo $shitrow ?>" name="row">
      <?php 
        $y=1;
      while($row=mysqli_fetch_array($res9)){
        
      
    ?>
                                       <div class="col-md-12" style="height:30px">  </div>
                                    <div class="col-md-12" style="border:">  
                                    <label form="uname1"><h5 style="text-transform:capitalize"><?php echo $row['criteria']; ?></h5></label>
                                     <script>
                                function myFunction() {
                            var x = document.getElementById("num");
                            
                               x.value.toUpperCase();
                              }
                                </script>
                                    
                                   <div class="form-group">
           
            <select required="required" name = "score<?php echo $y ?>" class="form-control" id="sel1" style="width:">
            <option value="">Ranking</option>
            <?php
            $judgeid = $uid=$_SESSION['username']['uid'];
             for($x=1;$x <= $eli;$x++){ 
              $cri =  $row['criteria'];
             
              $sqlmini = "select * from tblcriteriascoretop where score = '$x' and criteria = '$cri' and jid = $judgeid and gender='$gender' and category='$it'";
              $resmini = mysqli_query($con,$sqlmini);
             $rowmini = mysqli_num_rows($resmini);
              if($rowmini!=0){
                continue;
              }
              ?>

              <option value="<?php  echo $x; ?>"><?php echo $x.substr(date('jS', mktime(0,0,0,1,($x%10==0?9:($x%100>20?$x%10:$x%100)),2000)),-2); ?></option>
             <?php } ?>
             <!-- <option value="both">ranking & percentage</option>-->
            </select>
          </div>
                                    </div>
                                    
                                    <input type="hidden" value="<?php echo $row['percentage']?>" name="percent<?php echo $y?>">
                                    
                                     <input type="hidden" value="<?php echo $row['criteria']?>" name="criteria<?php echo $y; ?>">
                                     
                                     
                                      
                                     
                                    
                                
                               <?php $y++; }  ?>
                              
                               <?php if($shitrow!=0){?>
                               </div>
                               </div>
                               </div>
                               </div>
                                <input type="hidden" value="<?php echo $gender; ?>" name="gender">
                                <button type="submit" name="subrank" class=" btn btn-default float-right bg-dark" style="color:white;background-color:">Submit the Score</button>
                                </div>
                                <?php }else{ ?>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
                                 
                                <?php } }else{?>
                                   <div class="modal-body" >
                                   <div class="row">
                                       <div class="col-md-1"></div>
                                       <div class="col-md-10">
                                           <h3  style="text-transform:capitalize;">You already provided score <?php echo $row['fullname']; ?> </h3>
                                             <?php
                                    $sqlcheckoncriteria="select * from tblcriteriascoretop where gender='$gender' and jid='$uid' and category='$it' and canid='$candid'";
                                    $rescheckoncriteria=mysqli_query($con,$sqlcheckoncriteria);
                                    while($rowcheckoncriteria=mysqli_fetch_array($rescheckoncriteria)){
                                        ?>
                                       <h4 style="text-transform:capitalize"><?php echo $rowcheckoncriteria['criteria'].': '.'<strong>'.$rowcheckoncriteria['score']; ?></strong></h4>
                                        <?php
                                    }
                                   ?>
                                   
                                     
                                     <!--<form method="POST" action="clearall.php">
                                             <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
                                             <input type="hidden" value="<?php echo $row['gender']; ?>" name="gender">
                                             <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
                                             <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
                                             <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
                                         Clear all the ranking score?
                                         <button type="submit" class="btn btn-danger">clear all</button>    
                                     </form>-->
                                         
                                   
                                     <form method="POST" action="cleartop.php">
                                             <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
                                             <input type="hidden" value="<?php echo 'female'; ?>" name="gender">
                                             <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
                                             <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
                                             <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
                                         Clear the score of this specific candidate?
                                         <button type="submit" class="btn btn-dark">clear</button>    
                                     </form>
                                          </div>
                                            <div class="col-md-1"></div>
                                       </div>
                                     
                                     
                                   </div>

                                <?php }?>
                               
                                <!--confirm modal-->
    
<!--confirm modal-->
    </form>
   
  </div>
 </div>
</div>


<!-- Modal -->
                
        <?php } }   else{ ?>

         <div class="col-sm-4 ">
         </div>
       <div class="col-sm-4 col-sm-offset-12">
          
        
        </div>
              <?php } } ?>
           
    
           
            </div>
            </div>
            
           
        </div>
       <!------------------------------------------------------------------------------------ditoooooo-------------------------------------------------------->
                   <div class="row ">
           <div class="col-md-12  main" style="boder:1px solid blue;background-color:a">
           <?php if(isset($_GET['category'])){?>
           
           <?php
           
            $conc=mysqli_connect('localhost','root','',$DB);
            $sqlc="select * from tblcandidate";
            $resc=mysqli_query($conc,$sqlc);
              $numberofcandidates=mysqli_num_rows($resc);
             $cat=$_GET['category'];
             $judge=$_SESSION['username']['uid'];
            $sqls="select * from tblscoretop where category='$cat' and jid=$judge";
            $ress=mysqli_query($conc,$sqls);
            $numberofcandidates.'<br>';
             $numberofscore=mysqli_num_rows($ress);
             $numberofjudge;
            
           
                 ?>
            
           </h1>
           </div>
           
           
           <div class="col-md-12  main" style="boder:1px solid blue;backgroun-color:brown;boder:1px solid black;height:50px">

           </div>
           <div class="container-fluid" style="bottomder:5px solid brown;background-color: ">
           <div class="row ">

      <?php
        $DB=$_SESSION['username']['db'];
        $con=mysqli_connect('localhost','root','',$DB);
       if($type=='ranking'){
           if($stat==0):
            $sql="select a.jid,b.cannumber,b.image,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='male' group by canid order by total asc, ABS(b.cannumber) asc limit $eli";
            endif;
            if($stat==1):
            $sql="select a.jid,b.cannumber,b.image,b.fullname,a.canid,sum(score) as total from tblcriteriascore a inner join tblcandidate b on a.canid = b.canid where b.gender='male' group by canid order by total asc, ABS(b.cannumber) asc limit $eli";
            endif;
        
        }else{
            $sql="select a.jid,b.cannumber,b.image,b.fullname,a.canid,sum(score) as total from tblscore a inner join tblcandidate b on a.canid = b.canid where b.gender='male' group by canid order by total desc, ABS(b.cannumber) asc limit $eli";
        }
        $res=mysqli_query($con,$sql);
          $row=mysqli_num_rows($res);
          if($row!=0){
        while($row=mysqli_fetch_array($res))
        {

       ?>
        <div class="col-sm-3  ">
            
        <div class="row">
            <div class="col-md-2">
               
            </div>
            <div id="imageko" class="col-md-9 ">
    
          <!--type of scoring php-->
        
          <a href="#"  data-target="#<?php echo $row['canid'] ?>" data-toggle="modal"  >
               <?php   echo "<img class='rounded border border-secondary' height='380' width='280' src='data:image/JPEG;base64,".$row[2]."'>";?>
               <?php 
    $gender='male';
 $candid=$row['canid'];
$uid=$_SESSION['username']['uid'];
 $it=$_GET['category'];
 $sqle="select * from tblscoretop where canid = '$candid' and jid = '$uid' and category ='$it' and gender='$gender'";
          $rese=mysqli_query($con,$sqle);
          $numshing=mysqli_num_rows($rese);
          if($numshing!=0){
             ?>
               <div class="centered"><img height='150' width='150' src='images/white.png'></div>
               <?php } ?>
          </a>
          </div>
          <style>
              /* Container holding the image and the text */
#imageko {
    position: relative;
    text-align: center;
    color: white;
}

/* Bottom left text */
.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

/* Top left text */
.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

/* Top right text */
.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

/* Bottom right text */
.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

/* Centered text */
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
          </style>
        </div>
        <div class="col-md-12" style="height:20px">
        </div>
        <div class="col-sm-12" style="background-color:;border:0px solid dark;height:70px;border-radius:10px">
          <h3 style="text-transform: capitalize;" align="center"><?php echo $row['fullname']; ?></h3>
          <h4 align="center">candidate no. <?php echo $row['cannumber']; ?></h4>
        </div>
        <div class="col-md-12" style="height:50px">
        </div>
              
        </div>

<!-- Modal -->

<div class="modal fade" id="<?php echo $row['canid']?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header" style="background-color:dark">
    <h3><span aria-hidden="true" style="color:gray;text-transform: capitalize;"><?php echo $_GET['category']?></span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
    <?php 
    $gender='male';
 $candid=$row['canid'];
$uid=$_SESSION['username']['uid'];
 $it=$_GET['category'];
 $sqle="select * from tblscoretop where canid = '$candid' and jid = '$uid' and category ='$it' and gender='$gender'";
          $rese=mysqli_query($con,$sqle);
          $numshing=mysqli_num_rows($rese);
          if($numshing==0){
             ?>

   <div class="modal-body" >
    <form class="form" action="insertscoretop.php" method="POST" onsubmit="subrank.disabled = true; return true;" role="form" autocomplete="off" id="formLogin">
         <div class="form-group">
         <div class="row">
            <div class="col-md-7">
             <?php  echo '<h4>#'.$row['cannumber'].' '.$row['fullname'].'<h4>'."<img height='280' width='200' src='data:image/JPEG;base64,".$row[2]."'>";?>
            </div>
            <div class="col-md-5">
                <div class="row">
          <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
        <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
         <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
         <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
         <?php
          $candid=$row['canid'];
          $uid=$_SESSION['username']['uid'];
          $it=$_GET['category'];
           
         
     
       
         $sql2="select * from tblcategorytop where category = '$it'";
         $res2=mysqli_query($con,$sql2);
         $m=1;
         while($s=mysqli_fetch_array($res2)){
         $percent=$s['percentage']
         
         ?>
          <input type="hidden" value="<?php echo $percent; ?>" name="catpercent">
          <input type="hidden" value="<?php echo $gender; ?>" name="<?php echo $gender; ?>">

          <?php $m++; } ?>
    <?php
     
            $sqlcount = "select * from tblcandidate where gender='$gender'";
            $rescount = mysqli_query($con,$sqlcount);
            $rowcount = mysqli_num_rows($rescount);
            
            //echo $rowcount;
             
      $cat=$_GET['category'];
      $con1=mysqli_connect('localhost','root','',$DB);
      $sql9="select * from tblcriteriatop where category='$cat'";
      $res9=mysqli_query($con1,$sql9);
       $shitrow=mysqli_num_rows($res9); ?>
        <input type="hidden" value="<?php echo $shitrow ?>" name="row">
      <?php 
        $y=1;
      while($row=mysqli_fetch_array($res9)){
        
      
    ?>
                                       <div class="col-md-12" style="height:30px">  </div>
                                    <div class="col-md-12" style="border:">  
                                    <label form="uname1"><h5 style="text-transform:capitalize"><?php echo $row['criteria']; ?></h5></label>
                                     <script>
                                function myFunction() {
                            var x = document.getElementById("num");
                            
                               x.value.toUpperCase();
                              }
                                </script>
                                    
                                   <div class="form-group">
           
            <select required="required" name = "score<?php echo $y ?>" class="form-control" id="sel1" style="width:">
            <option value="">Ranking</option>
            <?php
            $judgeid = $uid=$_SESSION['username']['uid'];
             for($x=1;$x <= $eli;$x++){ 
              $cri =  $row['criteria'];
             
              $sqlmini = "select * from tblcriteriascoretop where score = '$x' and criteria = '$cri' and jid = $judgeid and gender='$gender' and category='$it'";
              $resmini = mysqli_query($con,$sqlmini);
             $rowmini = mysqli_num_rows($resmini);
              if($rowmini!=0){
                continue;
              }
              ?>

              <option value="<?php  echo $x; ?>"><?php echo $x.substr(date('jS', mktime(0,0,0,1,($x%10==0?9:($x%100>20?$x%10:$x%100)),2000)),-2); ?></option>
             <?php } ?>
             <!-- <option value="both">ranking & percentage</option>-->
            </select>
          </div>
                                    </div>
                                    
                                    <input type="hidden" value="<?php echo $row['percentage']?>" name="percent<?php echo $y?>">
                                    
                                     <input type="hidden" value="<?php echo $row['criteria']?>" name="criteria<?php echo $y; ?>">
                                     
                                     
                                      
                                     
                                    
                                
                               <?php $y++; }  ?>
                              
                               <?php if($shitrow!=0){?>
                               </div>
                               </div>
                               </div>
                               </div>
                                <input type="hidden" value="<?php echo $gender; ?>" name="gender">
                                <button type="submit" name="subrank" class=" btn btn-default float-right bg-dark" style="color:white;background-color:">Submit the Score</button>
                                </div>
                                <?php }else{ ?>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
                                 
                                <?php } }else{?>
                                   <div class="modal-body" >
                                   <div class="row">
                                       <div class="col-md-1"></div>
                                       <div class="col-md-10">
                                           <h3  style="text-transform:capitalize;">You already provided score <?php echo $row['fullname']; ?> </h3>
                                             <?php
                                    $sqlcheckoncriteria="select * from tblcriteriascoretop where gender='$gender' and jid='$uid' and category='$it' and canid='$candid'";
                                    $rescheckoncriteria=mysqli_query($con,$sqlcheckoncriteria);
                                    while($rowcheckoncriteria=mysqli_fetch_array($rescheckoncriteria)){
                                        ?>
                                       <h4 style="text-transform:capitalize"><?php echo $rowcheckoncriteria['criteria'].': '.'<strong>'.$rowcheckoncriteria['score']; ?></strong></h4>
                                        <?php
                                    }
                                   ?>
                                   
                                     
                                     <!--<form method="POST" action="clearall.php">
                                             <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
                                             <input type="hidden" value="<?php echo $row['gender']; ?>" name="gender">
                                             <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
                                             <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
                                             <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
                                         Clear all the ranking score?
                                         <button type="submit" class="btn btn-danger">clear all</button>    
                                     </form>-->
                                         
                                   
                                     <form method="POST" action="cleartop.php">
                                             <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
                                             <input type="hidden" value="<?php echo 'male'; ?>" name="gender">
                                             <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
                                             <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
                                             <input type="hidden" value="<?php echo $_GET['category'] ?>" name="category">
                                         Clear the score of this specific candidate?
                                         <button type="submit" class="btn btn-dark">clear</button>    
                                     </form>
                                          </div>
                                            <div class="col-md-1"></div>
                                       </div>
                                     
                                     
                                   </div>

                                <?php }?>
                               
                                <!--confirm modal-->
    
<!--confirm modal-->
    </form>
   
  </div>
 </div>
</div>


<!-- Modal -->
                
        <?php } }   else{ ?>

         <div class="col-sm-4 ">
         </div>
       <div class="col-sm-4 col-sm-offset-12">
          
        
        </div>
              <?php } } ?>
           
    
           
            </div>
            </div>
             <?php if(isset($_GET['category'])):
                 include 'footer.php'; 
             endif;
             ?>
           
        </div>
      </div><!--fluid>
      </div>
      </div>
      </div>
<!--/.container-->
        

    </body>
  <?php endif; ?>
  <?php endif; ?>
  <?php if($rowlock!=0): ?>
     
    <body style="font-family:lucida;background: url() no-repeat"> 
        <div id="app" class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light bg-faded" style="background: url() no-repeat; width: 100%; background-size: 100%;" >
                            <?php
                        $sqltitle="select * from tbltitle";
                        $restitle=mysqli_query($con,$sqltitle);
                        while($rowtitle=mysqli_fetch_array($restitle)){
                                ?>
      
                    <h2 style="text-transform:capitalize;font-family:lucida handwriting"><?php echo $rowtitle['title']; ?></h2>
                                <?php } ?>
                <!--<span class="fa fa-user">hello</span>-->
                <div id="navbarNavDropdown" class="navbar-collapse collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                        </li>
                        
        
                    </ul>
                    <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item" >
                        <img src="images/AMA_University_logo.png" height="40px" width="100px">
                    </li>
                </ul>
                    <ul class="navbar-nav">
                                 
                        
        
                    </ul>
                </div>
            </nav>
        </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <?php include 'head.php'; ?>
               <a class="navbar-brand" href="finaljudgehome.php" style="color:gray"><strong><h3><span class="fa fa-bar-chart fa-1x"></span>E-Tabulator</h3></strong></a>
               
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    
                    <ul class="navbar-nav ml-auto">
                    
            
                     
                           <?php 
                         
                           
                          $sql="select * from tblcategorytop";
                          $res=mysqli_query($con,$sql);
                          while($row=mysqli_fetch_array($res)){
                            $cat = $row['category'];
                           
                          
                        ?>
                              
                             <li class="nav-item" >
                                <a class="nav-link" href="finaljudgehome.php?category=<?php echo $cat; ?>" ><h4 style="text-transform: capitalize;"><?php echo $cat ?></h4></a>
                            </li>
                            
            
                            <?php } ?>
            
                       <li class="nav-item">
                                <a class="nav-link"  data-target="#logout" data-toggle="modal" ><span class="fa fa-sign-out fa-2x"></span><?php echo $_SESSION['username']['username']; ?></a>
                        </li>
                        
                    </ul>
                    
                </div>
    </nav>
        <div class="container-fluid"  style="boder:3px solid violet;height:80%">
            <div class="row ">
           <div class="col-md-12  main" style="boder:1px solid blue;background-color:a">
           <?php if(isset($_GET['category'])){?>
               <h1 align="center" style="font-family:lucida;text-transform: capitalize;"> <?php echo $cat=$_GET['category']; ?>  <span class="fa fa-lock"></span>
            </h1> <?php $ket=$_GET['category'];?>
    
<div id="auto"></div>
</div>

<?php $ket=$_GET['category'];?>
<script>

$(document).ready( function(){
$('#auto').load('load.php');
refresh();
});
 
function refresh()
{
  setTimeout( function() {
    $('#auto').load('goodbye.php?db=<?php echo $DB ?>&category=<?php echo $ket; ?>').fadeIn('slow');
    refresh();
  }, 3000);
}
</script>
                
            <?php } ?>
    </body>
  <?php endif; ?>

</html>


<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">Logout</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="logout.php" method="POST" role="form" autocomplete="off" id="" onsubmit="backbut.disabled = true; return true;"> 
   
    <input type="hidden" value="<?php echo $DB; ?>" name="data">     
                                <h5>Are you sure you want to logout?</h5><hr>
                                <button type="submit" name="backbut" class="btn btn-dark btn-md float-right">Yes </button>
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


<!--<script type="text/javascript">
setTimeout(onUserInactivity, 1000 * 600)
function onUserInactivity() {
   window.location.href = "inactive.php"
}
</script>-->

