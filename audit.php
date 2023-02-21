<html>
  <?php include 'head.php';
       
   include 'nav.php';
   include 'modals.php';
   ?>
    <body>
    <?php


  if(!isset($_GET['name'])){
    echo "<script> open('#','_self')</script>";
  }else{
  $DB =$_GET['name'];
}
?>

     <?php
    if($_SESSION['username']['usertype']!='admin'&&$_SESSION['username']['usertype']!='organizer'){
    echo "<script>
    alert('your not an admin!');
    open('judgehome.php','_self');
    </script>";
  }
  ?>

 
     
<div class="container-fluid" id="main" style="border:1px solid black">

  <div class="row row-offcanvas row-offcanvas-left" style="boder:3px solid brown">
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

  <div class="col-sm-9 col-lg-10 main" style="boder:1px solid blue">
   
<!--<?php  $DB =  $_GET['name']; ?>-->
  
    <div class="row">
   <div class="container-fluid" style="boder:1px solid black">
   
    <div class="col-lg-12 col-sm-8">
     <div class="table-responsive">
      <table class="table table-striped">
       <thead class="thead-inverse">
       
        <div class="col-md-12" style="height:20px"></div> 
         <h3 align="">Audit Trail </h3><br>
         <a id="judgetable"></a>
      <table class="table table-striped" id="myTable">
        <thead class="thead-inverse"> 
          <tr>
      
            <!--<th>Database</th>-->
            <!--<th>User ID</th>-->
            <th>Username/type</th>
             <th>Action</th>
            <th>Date and Time</th>
          </tr>
        </thead>
          <tbody>
    <?php
     
    $con = mysqli_connect('localhost','root','','tesdacmi_users');
    $sql = "select * from tblaudittrail where db = '$DB'";
    $res = mysqli_query($con,$sql);

  
      $row = mysqli_num_rows($res);
      
      if($row != 0)
      {
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res))
        {
     
    ?>
        <tr>
         
          <!--<td><?php echo $row['db']; ?></td>-->
          <!--<td><?php echo $row['uid']; ?></td>-->
          <td><?php echo $row['user']; ?></td>
          <td><?php echo $row['action']; ?></td>
          <td><?php echo $row['reg_date']; ?></td>
          
           
        </tr>
        <?php 
        } 
      }
      else
      { 
        ?>
        <tbody>
         
     <?php
      } 
      ?>     
       </tbody>
      </table>
     </div>
    </div>
    </div>
    </div>
  
  </div>
  </div>
  </div><!--container fluid-->

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
       
    });
      });
       $(document).ready(function(){
    $('#data').DataTable({
       
    });
      });
      </script>
      <?php include 'footer.php'; ?>
      </div>
<body>
</html>