 <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-" id="sidebar" role="navigation" style="border:1px solid gray;background-image: url('');">
    <div class = "container">

      <div class="row">
           
          <div class ="col-md-10" style="margin-bottom">
    <?php if($_SESSION['username']['usertype']=='organizer'):?>
    <a class="nav-link" id="createlink" href="adminhome.php" style = "color:gray;font-family:helvetica">Create New</a>
    <?php endif; ?>
   <?php
                      
  if(!isset($_GET['name'])){
     $con = mysqli_connect('localhost','root','');    
      $sql = "SELECT table_schema FROM INFORMATION_SCHEMA.tables where table_schema like 'tesdacmi_slot%'
                        GROUP BY table_schema limit 1";
      $res = mysqli_query($con,$sql);
      while($row=mysqli_fetch_array($res)){
        $DB=$row['table_schema'];
      }
      echo "<script>
  open('adminhome.php?name=$DB','_self');
  </script>";

    }else{
    $DB =$_GET['name'];
  }
                        // Usage without mysql_list_dbs()
                         if($_SESSION['username']['usertype']=='admin'):
                        $con = mysqli_connect('localhost','root','');
                        endif;
                         if($_SESSION['username']['usertype']=='organizer'):
                        $con = mysqli_connect('localhost','root','','tesdacmi_users');
                        endif;
                         if($_SESSION['username']['usertype']=='admin'):
                        $sql = "SELECT table_schema FROM INFORMATION_SCHEMA.tables where table_schema like 'tesdacmi_slot%'
                        GROUP BY table_schema;";
                         endif;
                          $user=$_SESSION['username']['username'];
                          $password=$_SESSION['username']['password'];
                        
                          if($_SESSION['username']['usertype']=='organizer'):
                        $sql = "SELECT db FROM tblusers where username='$user' and password='$password'";
                         endif;
                        $res = mysqli_query($con,$sql);

                        while ($row = mysqli_fetch_array($res)) {
                        	 //echo $row['db'];
                          ?>

         <style>
a#<?php echo $row['table_schema']; ?>:hover,a.selected {
  color: red;
  background: #efefef;
  border-radius: 10px;
}
a#<?php echo $row['db']; ?>:hover,a.selected {
  color: red;
  background: #efefef;
  border-radius: 10px;
}
  a#createlink:hover,a.selected {
  color: red;
  background: #efefef;
  border-radius: 10px;
}
a#<?php echo $row['table_schema']; ?>::first-letter { 
    font-size: 150%;
    color: gray;
}

         </style>                
    <ul class="nav nav-pills flex-column"><span></span>
    <?php
    if($_SESSION['username']['usertype']=='admin'):
     $DB = $row['table_schema'];
     //echo 'difadsfsdafdsafsfasadfdsafsdafsadto';
     endif;
     if($_SESSION['username']['usertype']=='organizer'):
     $DB = $row['db'];
      //echo 'difadsfsdafdsafsfasadfdsafsdafsadto';
    if($DB=='tesdacmi_users'){
      continue;
    }
     endif;
     $contitle = mysqli_connect('localhost','root','',$DB);
     $sqltitle="select title from tbltitle";
     $restitle1=mysqli_query($contitle,$sqltitle);
     while($rowtitle=mysqli_fetch_array($restitle1)){
       
                 ?>

       <?php if($DB==$_GET['name']):?>
       <?php if($_SESSION['username']['usertype']=='admin'): ?>
        <ul class="nav nav-pills flex-column"><span></span>
       <li class="nav-item"><a class="nav nav-link" style = "text-transform:capitalize;color:gray;background-color:#efefef;font-family:helvetica" id="<?php echo $row['table_schema'];?>" href="#" onclick="reply_click(this.id);"> <?php  echo $rowtitle['title']; ?></a></li>
         </ul>
         <?php endif; ?>
         <?php if($_SESSION['username']['usertype']=='organizer'): ?>
        <ul class="nav nav-pills flex-column"><span></span>
       <li class="nav-item"><a class="nav nav-link" style = "text-transform:capitalize;color:gray;background-color:#efefef;font-family:helvetica" id="<?php echo $row['db'];?>" href="#" onclick="reply_click(this.id);"> <?php  echo $rowtitle['title']; ?></a></li>
         </ul>
         <?php endif; ?>
       <?php endif; ?>
       
    <?php if($DB!=$_GET['name']):?>
      <?php if($_SESSION['username']['usertype']=='admin'): ?>
      <ul class="nav nav-pills flex-column"><span></span>
       <li class="nav-item"><a class="nav nav-link" style = "text-transform:capitalize;color:gray;font-family:helvetica" id="<?php echo $row['table_schema'];?>" href="#" onclick="reply_click(this.id);"> <?php  echo $rowtitle['title']; ?></a></li>
    </ul>
    <?php endif?>
    <?php if($_SESSION['username']['usertype']=='organizer'): ?>
      <ul class="nav nav-pills flex-column"><span></span>
       <li class="nav-item"><a class="nav nav-link" style = "text-transform:capitalize;color:gray;font-family:helvetica" id="<?php echo $row['db'];?>" href="#" onclick="reply_click(this.id);"> <?php  echo $rowtitle['title']; ?></a></li>
    </ul>
    <?php endif?>
    <?php endif; ?>
   <?php
     }
    ?>
   <input type = "hidden" id ="sing" value = "red">
                      <?php
                        }
                        ?>
                        

                        </div>
                    

            </div>
        </div>
 
  </div>