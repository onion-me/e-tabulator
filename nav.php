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

<div id="app" style="width:100%">
    <nav class="navbar navbar-expand-md navbar-light bg-faded"  style="background-color:; width: %; height: 50px; background-size: 100%;" >
    
        
        
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php include 'head.php'; ?>
   <a class="navbar-brand" href="adminhome.php" style="color:gray"><strong><h3>E-Tabulator <span class="fa fa-bar-chart fa-1x"></span></h3></strong></a>
   
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
        <span class="navbar-toggler-icon"></span>
    </button>
    
       <style>
a.nav-link:hover,a.selected {
  color: red;
  background: gray;
  border-radius: 10px;
}

      </style>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        
        <ul class="navbar-nav ml-auto">
         <li>
                    <a class="nav-link" style="text-transform: uppercase;"  href="selecteddb.php?name=<?php echo $DB; ?>"><?php echo $DB?> <span id="canicon" class="fa fa-home "></span></a>
          </li>
                  <?php
    if($_SESSION['username']['usertype']=='organizer'): ?>
         <li>
                    <a class="nav-link"  data-target="#conmodal" data-toggle="modal" href="">Contestant <span id="canicon" class="fa fa-user-plus "></span></a>
                </li>
                <?php endif; ?>
            <?php  $DB =  $_GET['name'];
$con=mysqli_connect('localhost','root','',$DB);
$sqltype = "select * from tblsetting";
$restype = mysqli_query($con,$sqltype);
while($rowtype = mysqli_fetch_array($restype)){
   $TYPE = $rowtype['type'];
   $CAT = $rowtype['category'];
}
?>      <?php if($CAT=='Female'||$CAT=='Both'): ?>
          <li>
                    <!--<a class="nav-link" data-target="#judmodal" data-toggle="modal" href="">VIEW JUDGES</a>-->
            <a class="nav-link" href="monitor.php?name=<?php echo $DB; ?>">Score <span class="fa fa-table "></span></a>
          </li>
          <?php endif; ?>
          <?php if($CAT=='Male'): ?>
          <li>
                    <!--<a class="nav-link" data-target="#judmodal" data-toggle="modal" href="">VIEW JUDGES</a>-->
            <a class="nav-link" href="monitormale.php?name=<?php echo $DB; ?>">Score <span class="fa fa-table "></span></a>
          </li>
          <?php endif; ?>
           <li class="nav-item">
                    <a class="nav-link" href="audit.php?name=<?php echo $DB; ?>" >Audit trail <span class="fa fa-book"></a>
                </li>

            <li class="nav-item">

                    
                    <a class="nav-link"  data-target="#backups<?php echo $DB; ?>" data-toggle="modal" href="">Backup <span id="canicon" class="fa fa-database "></span></a>
            </li>
                    <?php
    if($_SESSION['username']['usertype']=='organizer'): ?>
             <li class="nav-item">

                    
                    <a class="nav-link"  data-target="#restoremodal" data-toggle="modal" href="">Restore <span id="canicon" class="fa fa-repeat"></span></a>
            </li><?php endif; ?>
                    <?php
    if($_SESSION['username']['usertype']=='organizer'): ?>
               <li class="nav-item">

                    
                    <a class="nav-link"  data-target="#reset<?php echo $DB;?>" data-toggle="modal" href="">Reset <span id="canicon" class="fa fa-undo "></span></a>
            </li>
            <?php endif; ?>
           
             <li class="nav-item">

                    
                    <a class="nav-link"  data-target="#trashmodal<?php echo $DB;?>" data-toggle="modal" href="">Clear <span id="canicon" class="fa fa-trash "></span></a>
            </li>
           
             <?php if($_SESSION['username']['usertype']=='organizer'): ?>
             <li class="nav-item">

                    
                    <a class="nav-link"  data-target="#finalize<?php echo $DB;?>" data-toggle="modal" href="">Finalize <span id="canicon" class="fa fa-save "></span></a>
            </li>
            <?php endif; ?>
           <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="text-transform: uppercase;"><?php echo $_SESSION['username']['username'] ?> <span class="fa fa-sign-out"></span></a>
            </li>
            
        </ul>
        
    </div>

</nav>
</div>
