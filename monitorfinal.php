<html>
  <?php include 'head.php';
      include 'nav.php';
      
   $DB =$_GET['name'];
   ?>
   <?php
 
  if(!isset($_GET['name'])){
    echo "<script> open('#','_self')</script>";
  }else{
  $DB =$_GET['name'];
}
?>
<?php include 'modals.php';; 
 ?>

    <body>
     <?php
    if($_SESSION['username']['usertype']!='admin'&&$_SESSION['username']['usertype']!='organizer'){
    echo "<script>
    alert('your not an admin!');
    open('judgehome.php','_self');
    </script>";
  }
  ?>
     
 
     
<div class="container-fluid" id="main" style="boder:1px solid black">

  <div class="row row-offcanvas row-offcanvas-left">

 <?php include 'sidenav.php' ?>

  <!--/col-->
                                                      <!--SCRIPT--> 
                                                    


                                                        <script type="text/javascript">



                                                          function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}


                                                      function reply_click(clicked_id)
                                                      {
                                                          var x = document.getElementById('sing').value;
                                                          var y = clicked_id;
                                                          window.location.href = "selecteddb.php?name=" + y +"&color=" + x;
                                                           /*window.location.href = "beginning.php?name=" + y +"&color=" + x;*/  


                                                      }
                                                      </script>
                                                     <!--END SCRIPT -->

  <div class="col-sm-9 col-lg-10 main" style="boder:1px solid blue">
   



<?php  $DB =  $_GET['name'];
$con=mysqli_connect('localhost','root','',$DB);
$sqltype = "select * from tblsetting";
$restype = mysqli_query($con,$sqltype);
while($rowtype = mysqli_fetch_array($restype)){
   $TYPE = $rowtype['type'];
   $CAT = $rowtype['category'];
}
?>

	<nav class="navbar navbar-expand-lg navbar-light ">
      
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        
      <li class="nav-item">
          <a class="nav-link" href="printtop.php?database=<?php echo $DB; ?>&gender=female" value="print final result" >FINAL Result<span class="fa fa-print"></span></a>
      </li>
       
        <?php 
        $con = mysqli_connect('localhost','root','',$DB);
        $sqlset="select * from tblsetting";
        $resset=mysqli_query($con,$sqlset);
        while($rowset=mysqli_fetch_array($resset)){
            $cate=$rowset['category'];
        }
        
        $sqlnum="select category from tblcategorytop;";
        $resnum=mysqli_query($con,$sqlnum);
       $x=1;
       
         while($rowcat=mysqli_fetch_array($resnum)){
        $rownum=mysqli_num_rows($resnum);
        if($cate='Both'){
           $rownum=$rownum*2;
       }
        ?>
        <li class="nav-item">
        <a style="text-transform:capitalize"  class="nav-link" href="printcategorytop.php?database=<?php echo $DB; ?>&gender=female&category=<?php   echo $rowcat['category']; ?>" value="print final result" > <?php   echo $rowcat['category']; ?><span class="fa fa-print"></span> </a>
        </li>
                 <?php $x++;  } ?>
     
      <?php if($CAT=='Both'||$CAT=='Male'):?>
       <li class="nav-item">
          <a class="nav-link" href="monitorfinalmale.php?name=<?php echo $DB; ?>">Male Result<span class="fa fa-arrow-circle-right"></span></a>
      </li>
        <?php endif; ?>
         
         <li class="nav-item">
          <a class="nav-link" href="monitor.php?name=<?php echo $DB; ?>">Back<span class="fa fa-arrow-circle-right"></span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="extract2.php?name=<?php echo $DB; ?>">End<span class="fa fa-arrow-circle-right"></span></a>
      </li>
    </ul>
    
  </div>
</nav>
<div style="height:10px"></div>
 
     
     
  

<div id="auto"></div>



<script>

$(document).ready( function(){
$('#auto').load('load.php');
refresh();
});
 
function refresh()
{
  setTimeout( function() {
    $('#auto').load('scorefinalfinal.php?db=<?php echo $DB ?>').fadeIn('slow');
    refresh();
  }, 1000);
}
</script>




</html>
   
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
<!--/.container-->

<script>
       $(document).ready(function(){
    $('#myTable').DataTable({
       "paging": false
    });
      });
       $(document).ready(function(){
    $('#data').DataTable({
       
    });
      });
      </script>
  


      
      </div>
      <?php include 'footer.php'; ?>
</body>
</html>
