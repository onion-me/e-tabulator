<?php
                $DB=$_GET['db'];
                 $con=mysqli_connect('localhost','root','',$DB);
                   $sqlcheck="select elimination from tblsetting";
        $rescheck=mysqli_query($con,$sqlcheck);
        while($rowcheck=mysqli_fetch_array($rescheck)){
              $eliminate=$rowcheck['elimination'];
        }
        if($eliminate!=0){
                $sql="select status from tblelimination where type='elim'";
                $res=mysqli_query($con,$sql);
                $row=mysqli_num_rows($res);
                
                if($row!=0){
                 while($roweli=mysqli_fetch_array($res)){
                     $status=$roweli['status'];
                 }
                if($status=='1'){
                    $ans=1;
                }else{
                    $ans=0;
                }
                }else{
                    $ans=0;
                }
                ?>


 <?php if($ans==1):?>
                    
                  <script>open('finaljudgehome.php','_self')</script>
               
               
                 <?php endif; } ?>