<!-- Modal -->
<div class="modal fade" id="restoremodal" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">Restore</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
   
   
   
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
    
    $user=$_SESSION['username']['username'];
    $password=$_POST['password'];
    $sql="select * from tblusers where username='$user' and password='$password'";
    $res=mysqli_query($con2,$sql);
      //dito mo lagay
    $DbName=$_POST['selecteddb'];
    $con=mysqli_connect('localhost','root','',$DbName);
	$con2=mysqli_connect('localhost','root','','tesdacmi_users');
	
	$sql="drop table tblscore";
	mysqli_query($con,$sql);
	$sql2="drop table tblcriteriascore";
	mysqli_query($con,$sql2);
	$sql3="drop table tblcandidate";
	mysqli_query($con,$sql3);
	$sql4="drop table tbllock";
	mysqli_query($con,$sql4);
	$sql5="drop table tblcriteria";
	mysqli_query($con,$sql5);
	$sql6="drop table tblcategory";
	mysqli_query($con,$sql6);
	$sql7="drop table tblsetting";
	mysqli_query($con,$sql7);
	$sql8="drop table tbltitle";
	mysqli_query($con,$sql8);
	$sql9="drop table tbljudge";
	mysqli_query($con,$sql9);
	
	
	$sql200="drop table tblstat";
	mysqli_query($con,$sql200);
	
	$sql10="drop table tblscoretop";
	mysqli_query($con,$sql10);
	$sql11="drop table tblcriteriascoretop";
	mysqli_query($con,$sql11);
	$sql12="drop table tblcandidatetop";
	mysqli_query($con,$sql12);
	$sql13="drop table tbllocktop";
	mysqli_query($con,$sql13);
	$sql14="drop table tblcriteriatop";
	mysqli_query($con,$sql14);
	$sql15="drop table tblcategorytop";
	mysqli_query($con,$sql15);
	$sql16="drop table tblelimination";
	mysqli_query($con,$sql16);
	
	$sql17="delete from tblusers where db='$DbName' and usertype='judge'";
	$res17=mysqli_query($con2,$sql17);
	$sql18="delete from tblaudittrail where db='$DbName'";
	$res18=mysqli_query($con2,$sql18);
	
	$sql99="CREATE TABLE tblcandidate (
canid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
address VARCHAR(50) NOT NULL,
image LONGBLOB NOT NULL,
gender VARCHAR(10) NOT NULL,
age VARCHAR(2) NOT NULL,
cannumber VARCHAR(2) NOT NULL,
reg_date TIMESTAMP
)";
$res99=mysqli_query($con,$sql99);
  
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
    $sqlt="TRUNCATE TABLE tblscore";
    $res=mysqli_query($conn,$sqlt);
    // $sqlcc="TRUNCATE TABLE tblcandidate";
//    $res2=mysqli_query($conn,$sqlcc);
     $sqlc="TRUNCATE TABLE tblcriteriascore";
    $res3=mysqli_query($conn,$sqlc);
    return $response;
}

?>


    
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
             <div class="group">
                                               
                                              <label for="usr"><span style="font-size:"></span>Password</label>
                                                 <input type="hidden" style="width:px" class="form-control" value="<?php echo $_SESSION['username']['username']; ?>" name="password" id="usr">
                                              <input type="text" style="width:px" class="form-control" value="" required name="password" id="usr">
                                            
                                            </div>
            <div>Choose Backup File</div>
            <div>
                <input type="file" name="backup_file" class="input-file" />
            </div>
        <?php
                      
                        // Usage without mysql_list_dbs()
                        
   $con = mysqli_connect('localhost', 'root', '');
   ?>
<div class="col-md-12">
                          

       <?php echo $DB=$_GET['name']; ?>
      <input type="hidden" name="selecteddb" value="<?php echo $DB; ?>">
       
      

 </select><div style="height:10px"></div>
        <div>
            <input type="submit" class="btn btn-dark" name="restore" value="Restore"
                class="btn-action" />
        </div>
    </form>

   
   
   
   
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->

