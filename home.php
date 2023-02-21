<html>
  <?php include 'head.php';
        include 'nav.php';
   
   ?>
    <body>
     <?php
    if($_SESSION['username']['usertype']!='admin'){
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

  <div class="col-sm-9 col-lg-10 main" style="border:1px solid blue">
   
<!--<?php  $DB =  $_GET['name']; ?>-->
  
    <div class="row">
   <div class="container-fluid" style="border:1px solid black">
   
    
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