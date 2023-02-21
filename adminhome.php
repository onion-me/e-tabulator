 <?php 
  session_start();
  if(!isset($_SESSION['username'])){
    echo "<script>
    alert('you must login first!');
    open('index.php','_self');
    </script>";
  }

  if(!isset($_GET['name'])){
    echo "<script> open('#','_self')</script>";
  }else{
  $DB =$_GET['name'];
}
  
?>
<html>  
    <?php  
    include 'head.php';
   

     if(isset($_GET['name'])){
      include 'modals.php'; 
      //echo "there is a name";
      }
    
    ?>
<div id="app" style="width:100%">
    <nav class="navbar navbar-expand-md navbar-light bg-faded"  style="background-color:; width: %; height: 50px; background-size: 100%;" >
        <a class="nav-item" href="home.php"><strong></strong></a>
        
        
       
            
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php include 'head.php'; ?>
   <a class="navbar-brand" href="adminhome.php" style="color:gray"><strong><h3>E-Tabulator  <span class="fa fa-bar-chart fa-1x"></span></h3></strong></a>
   
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        
        <ul class="navbar-nav ml-auto">
            <?php if($_SESSION['username']['usertype']=='admin'):?>
           
            <li class="nav-item">
                     <a class="nav-link"  data-target="#org" data-toggle="modal" href="">Organizer <span id="" class="fa fa-user-plus "></span></a>
            </li>
            <?php endif; ?>
          
           <li class="nav-item">
                    <a class="nav-link" href="logout.php"><?php echo $_SESSION['username']['username'] ?> <span class="fa fa-sign-out"></span></a>
            </li>
            
            
            
        </ul>
        
    </div>
</nav>
</div>
 <?php
    if($_SESSION['username']['usertype']!='admin'){
    echo "<script>
    alert('you're not an admin!');
    open('judgehome.php','_self');
    </script>";
  }

  ?>

    <body>   
        <div class="container-fluid" id="main" style="boder:1px solid violet">
            <div class="row row-offcanvas row-offcanvas-left">
                  <?php include 'sidenav.php';
                  
                  ?>
  <!--/col-->
                                                      <!--SCRIPT-->    

                                                        <script type="text/javascript">
                                                      function reply_click(clicked_id)
                                                      {
                                                          var x = document.getElementById('sing').value;
                                                          var y = clicked_id;
                                                          window.location.href = "selecteddb.php?name=" + y +"&color=" + x;
                                                           /*window.location.href = "beginning.php?name=" + y +"&color=" + x;*/  


                                                      }
                                                      </script>
                                                     <!--END SCRIPT -->

              <div class="col-md-9 col-lg-10 main" style="boder:1px solid blue">
                          <h1 class="display-1 hidden-xs-down">CREATE</h1>
                              <p class="lead">(online tabulator)</p><hr>  

                    <div class ="jumbotron" style="boder:1px solid black">
                        <div class="row" >
                            <div class="col-md-6" style="boder:1px solid brown">
                <form action="selectdb.php" method="POST">
                    <!-- form complex example -->
                      <div class="row">
                       

                        <!--HARD-->





 <?php
                      
                        // Usage without mysql_list_dbs()
   $con = mysqli_connect('localhost', 'root','');
   $sql = "SELECT schema_name FROM INFORMATION_SCHEMA.schemata  where schema_name like 'tesdacmi%'
                      GROUP BY schema_name;";
   //$sql = "SELECT table_schema FROM INFORMATION_SCHEMA.tables where table_schema like 'tesdacmi_tab_slot%'
                   //     GROUP BY table_schema;";

   $res = mysqli_query($con,$sql); ?>
<div class="col-md-12">
                            <label for="exampleAccount">Select Database</label>
 <select class="custom-select" id="single_select" name="db" value="db" required <?php if($_SESSION['username']['usertype']=='admin'):?>disabled<?php endif; ?>>
    <option selected="true" disabled="disabled" value="">select database</option>
<?php
  while ($row = mysqli_fetch_array($res)) {
    


  
       $DBs=$row['schema_name'];

  $sqls="select table_schema from information_schema.tables where table_type = 'BASE TABLE' and table_schema = '$DBs'";
  $ress=mysqli_query($con,$sqls);
  $count=mysqli_num_rows($ress);
  $yy;
  if($count==0)
  {
       ?>
       
      
         <option value="<?php echo $DB=$row['schema_name']; ?>"><?php echo $DB=$row['schema_name']; ?></option>
      
    <?php
  }else{
    continue;
  }

   }

?>
 </select>

</div>


                        <!--HARD-->
                         <div class="col-md-12">
                            <label for="exampleAccount">Competition Title</label>
                            <input type="text" <?php if($_SESSION['username']['usertype']=='admin'):?>disabled<?php endif; ?> maxlength="" style="text-transform: capitalize;" name="title" class="form-control" required id="exampleAccount" placeholder="">
                            
                        </div>
                        <div class="col-md-12">
                        
                            <label for="exampleAccount">Description</label>
                            <textarea  <?php if($_SESSION['username']['usertype']=='admin'):?>disabled<?php endif; ?> name="Description" class="form-control" required id="exampleAccount" placeholder=""></textarea> 
                            
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

    </script>

                       </div>
                       <div class="col-md-5" style="boder:1px solid brown"></div>
                        <div class="col-md-1" style="boder:1px solid brown">
                        
                        <input type="submit" <?php if($_SESSION['username']['usertype']=='admin'):?>disabled<?php endif; ?> class="btn btn-dark" style="float:right" value="NEXT" >
                     
                        </div>
                        </form>
                        </div>
               </div>
            </div>
            <?php include 'footer.php' ?>

        </div>
<!--/.container-->
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
    </body>
   
</html>


<!-- Modal -->
