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
    <?php  include 'head.php';?>
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
    alert('your not an admin!');
    open('judgehome.php','_self');
    </script>";
  }

  ?>

    <body>   
        <div class="container-fluid" id="main" style="boder:1px solid violet">
            <div class="row row-offcanvas row-offcanvas-left">
                  <?php include 'sidenav.php' ?>
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
               </div>
               

<?php 
$restoredb=$_POST['selecteddb'];
$conn = mysqli_connect("localhost", "root", '', $restoredb);
if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
        exec('rm ' . $filePath);
    } // end if file exists
    
    return $response;
}

?>




    <h2>MySQL database restore using PHP</h2>
<?php
if (! empty($response)) {
    ?>
<div class="response <?php echo $response["type"]; ?>">
<?php echo nl2br($response["message"]); ?>
</div>
<?php
}
?>
    <form method="post" action="" enctype="multipart/form-data"
        id="frm-restore">
        <div class="form-row">
            <div>Choose Backup File</div>
            <div>
                <input type="file" name="backup_file" class="input-file" />
            </div>
        </div><?php
                      
                        // Usage without mysql_list_dbs()
                        
   $con = mysqli_connect('localhost', 'root', '');
   $sql = "SELECT schema_name FROM INFORMATION_SCHEMA.schemata  where schema_name like 'tesdacmi_slot%'
                        GROUP BY schema_name;";

   $res = mysqli_query($con,$sql); ?>

                            <label for="exampleAccount">Select Database</label>
 <select class="custom-select" id="single_select" name="selecteddb" value="db" required>
    <option selected="true" disabled="disabled" value="">select database</option>
<?php
  while ($row = mysqli_fetch_array($res)) {
    


  
       $DB=$row['schema_name'];

  $sqls="select * from information_schema.tables where table_type = 'BASE TABLE' and table_schema = '$DB'";
  $ress=mysqli_query($con,$sqls);
  $count=mysqli_num_rows($ress);
  $yy;
  if($count==0)
  {
       ?>
       
      
         <option  value="<?php echo $DB=$row['schema_name']; ?>"><?php echo $DB=$row['schema_name']; ?></option>
      
    <?php
  }else{
    continue;
  }

   }

?>
 </select>
        <div>
            <input type="submit" name="restore" value="Restore"
                class="btn-action" />
        </div>
    </form>

          
<!--/.container-->
        <?php include 'footer.php' ?>

    </body>
   
</html>


<!-- Modal -->
