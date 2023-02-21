<?php

 session_start();
  if(!isset($_SESSION['username'])){
    echo "<script>
    alert('you must login first!');
    open('index.php','_self');
    </script>";

  }
                
       $DB = $_GET['db']; 
  
    $con=mysqli_connect('localhost','root','',$DB);
   $conusers=mysqli_connect('localhost','root','','tesdacmi_users');
  

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
               
                 $ket=$_GET['category'];
                 $con=mysqli_connect('localhost','root','',$DB);
                $sql="select status from tblelimination where type='goodbye'";
                $res=mysqli_query($con,$sql);
                $row=mysqli_num_rows($res);
                if($row!=0)
                {
                  while($roweli=mysqli_fetch_array($res)){
                     $status=$roweli['status'];
                  }
                  if($status==1)
                  {
                    $ans=1;
                  }
                  else
                  {
                    $ans=0;
                  }
                }
                else
                {
                 $ans=0;
                }
              ?>
              
 <?php if($ans==0):?>
 
   
                 
                 
                 
                 
                  <?php if($type=="ranking"):?>
         
                                <table class="table table-default" style="width:50%" align="center"  id="">
                                    <thead class="thead-inverse"> 
                                        <tr>
                                            <th>Candidate no.</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $jid=$_SESSION['username']['uid'];
                                            $sql="select b.cannumber,sum(a.score) as total from tblcriteriascoretop a inner join tblcandidate b on a.canid=b.canid where  a.category='$ket' and  a.jid='$jid' group by a.canid order by total asc";
                                            $res=mysqli_query($con,$sql);
                                            while($row=mysqli_fetch_array($res)){
                                            $y=$row['score'];
                                        ?>
                                            <tr>
                                                <td><?php  echo $score=$row['cannumber']; ?></td>                                      
                                                <td><?php  echo $y.substr(date('jS', mktime(0,0,0,1,($x%10==0?9:($x%100>20?$x%10:$x%100)),2000)),-2); ?></td>
                                            </tr>      
                                               
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
     <?php endif; ?>
      <?php if($type=="percentage"):?>
         <table class="table table-default" style="width:50%" align="center"  id="">
                                    <thead class="thead-inverse"> 
                                        <tr>
                                            <th>Candidate no.</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sqlcatnum="select criteria from tblcriteriatop where category='$ket'";
                                            $rescatnum=mysqli_query($con,$sqlcatnum);
                                            $catnum=mysqli_num_rows($rescatnum);
                                            $jid=$_SESSION['username']['uid'];
                                            $sql="select b.cannumber,sum(a.score)/$catnum as total from tblcriteriascoretop a inner join tblcandidate b on a.canid=b.canid where  a.category='$ket' and  a.jid='$jid' group by a.canid order by total desc";
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
                               
      <?php endif; ?>

<?php endif; ?>
 <?php if($ans==1):?>
                    
                  <script>open('goodbyemessage.php','_self')</script>
               
               
                 <?php endif; ?>
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
               