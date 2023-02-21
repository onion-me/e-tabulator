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
                $it=$cat;
                $gender=$row['gender'];
                $sqle="select * from tblscore 
                        where canid = '$candid' 
                        and jid = '$uid' 
                        and category ='$it' 
                        and gender = '$gender'";
                $rese=mysqli_query($con,$sqle);
                $numshing=mysqli_num_rows($rese);
                if($numshing==0){
            ?>
                <div class="modal-body" >
                  <form class="form" action="insertscore.php" method="POST" role="form" onsubmit="subbutton.disabled = true; return true;" autocomplete="off" id="formLogin">
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-7">
                              <?php  echo '<h4 style="text-transform:capitalize">#'.$row['cannumber'].' '.$row['fullname'].'<h4>'."<img class='img-responsive rounded border border-secondary' height='280' width='200' src='data:image/JPEG;base64,".$row[3]."'>";?>
                          </div>
                          <div class="col-md-5">
                              <div class="row">
                                <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
                                <input type="hidden" value="<?php echo $row['gender']; ?>" name="gender">
                                <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
                                <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
                                <input type="hidden" value="<?php echo $cat; ?>" name="category">
                                <?php
                                    $candid=$row['canid'];
                                    $uid=$_SESSION['username']['uid'];
                                    $it=$cat;  
                                    $sql2="select * from tblcategory where category = '$it'";
                                    $res2=mysqli_query($con,$sql2);
                                    $m=1;
                                    while($s=mysqli_fetch_array($res2)){
                                        $percent=$s['percentage']
         
                                ?>
                                <input type="hidden" value="<?php echo $percent; ?>" name="catpercent">
                                <?php $m++; } ?>
                                <?php
                                    $cat;
                                    $con1=mysqli_connect('localhost','root','',$DB);
                                    $sql9="select * from tblcriteria where category='$cat'";
                                    $res9=mysqli_query($con1,$sql9);
                                    $shitrow=mysqli_num_rows($res9); 
                                ?>
                                <input type="hidden" value="<?php echo $shitrow ?>" name="row">
                                <?php 
                                    $y=1;
                                    while($row=mysqli_fetch_array($res9)){
                                ?>
                                <div class="col-md-12" style="height:30px">  </div>
                                    <div class="col-md-12" style="border:">  
                                        <label form="uname1"><h5 style="text-transform: capitalize;"><?php echo $row['criteria']; ?>    </h5>
                                        </label>
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

            <?php }
                  else
                  { ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">Close</button>
            <?php }
          }
          else
          { ?>
              <div class="modal-body" >
                  <div class="row">
                      <div class="col-md-1"></div>
                          <div class="col-md-10">
                                           <h3  style="text-transform:capitalize;">You already provided score for this candidate! <?php echo $row['fullname']; ?> </h3>
                                             <?php
                                    $sqlcheckoncriteria="select * from tblcriteriascore where gender='$gender' and jid='$uid' and category='$it' and canid='$candid'";
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
                                             <input type="hidden" value="<?php echo $cat; ?>" name="category">
                                         Clear all the ranking score?
                                         <button type="submit" class="btn btn-danger">clear all</button>    
                                     </form>-->
                                         
                                   
                                     <form method="POST" action="clear.php">
                                             <input type="hidden" value="<?php echo $_SESSION['username']['db'] ?>" name="db">
                                             <input type="hidden" value="<?php echo $row['gender']; ?>" name="gender">
                                             <input type="hidden" value="  <?php echo $row['canid']; ?>" name="cid">
                                             <input type="hidden" value=" <?php echo $_SESSION['username']['uid']?>" name="jid">
                                             <input type="hidden" value="<?php echo $cat; ?>" name="category">
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

