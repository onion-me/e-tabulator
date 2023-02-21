<html>
  <?php include 'head.php';
        include 'nav.php';
   $DB =$_GET['name'];
   
   ?>
    <body >
         <?php include 'modals.php'; ?>
     <?php
    if($_SESSION['username']['usertype']!='admin'&& $_SESSION['username']['usertype']!='organizer'){
    echo "<script>
    alert('restricted!');
    open('judgehome.php','_self');j
    </script>";
  }
  

  ?>
     
 
     
<div class="container-fluid " id="main" style="boder:1px solid black;margin-bottom:0px">

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

  <div class="col-sm-9 col-lg-10 main" style="boder:1px solid blue;">
   
<?php if (!isset($_GET['name'])){
                $DB='tesdacmi_users';
                }else{
                    $DB=$_GET['name'];
                    } ?>
              
                   
   <!--toggle sidebar button-->
  

  
   <?php
    $con=mysqli_connect('localhost','root','',$DB);
    $sql="select * from tbltitle";
    $res=mysqli_query($con,$sql);
    if($res){

          }
     while($row=mysqli_fetch_array($res)){
     
?>
    
 <h1 class="display-1 hidden-xs-down" style="text-transform: capitalize;">

   <?php echo $row['title']; ?> 
      <?php if($_SESSION['username']['usertype']=='organizer'):?>
   <input class="btn btn-dark" type="button" data-target="#<?php echo $row['tid'].$_GET['name']; ?>" data-toggle="modal" value="edit">
   <?php endif; ?>
   </h1>  
             
 <!-- Modal -->
<div class="modal fade" id="<?php echo $row['tid'].$_GET['name']; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">EDIT TITLE</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="edittitle.php" method="POST" role="form" autocomplete="off" id="">

                                <div class="form-group">
                                    <label for="uname1">Enter New Title</label>
                                    <input type="text" placeholder="" style="text-transform: capitalize;" class="form-control form-control-md rounded-0" name="title" id="" required="">
                                    <input type="hidden" name="db" value="<?php echo $_GET['name']; ?>">
                                    <input type="hidden" name="tid" value="<?php echo $row['tid']; ?> ">
                                </div>
                               
                                <button type="submit" class="btn btn-dark btn-md float-right">Save</button>

                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
   <?php } ?>
   <div class="container">
   <p class="lead">(online tabulator)</p>
   
   

   <div class="row">
    <?php
      $con=mysqli_connect('localhost','root','',$DB);
      
        $sqlcheck="select elimination from tblsetting";
        $rescheck=mysqli_query($con,$sqlcheck);
        while($rowcheck=mysqli_fetch_array($rescheck)){
              $eliminate=$rowcheck['elimination'];
        }
        if($eliminate!=0){
  $sql44="select type from tblelimination where type='finalize'";
  $res44=mysqli_query($con,$sql44);
  $rowcount=mysqli_num_rows($res44);
}else{
  $rowcount=0;
  }
      $sql="select * from tblcategory";
      $res=mysqli_query($con,$sql);
      $row = mysqli_num_rows($res);
      
      if($row != 0)
      {
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res))
        {
     
    ?>
    <div class="col-lg-3 col-md-6">
     <div class="card text-white card-dark " style="boder-radius: 10px">
      <div class="card-body bg-dark">
       <div class="rotate">
        <i class="fa fa-bar-chart"></i>
       </div>
       <h6 class="text-uppercase"><?php echo $row['category']?></h6>
       <h1 class="display-1"><?php echo $row['percentage'].'%'?></h1>
      </div>
     </div>
    </div>
   <?php }} ?>
   </div>

   </div>
  
 
<div id="app" class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-faded" >
        <a class="navbar-brand" href="#"></a>
       
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>

            </ul>
            <ul class="navbar-nav">
              
                
                 <li>
                    <a class="nav-link" href="">-</a>
                </li>
                
                <li>
                    <!--<a class="nav-link" data-target="#judmodal" data-toggle="modal" href="">VIEW JUDGES</a>-->
                    <a class="nav-link" href="#judgetable">VIEW JUDGES</a>
                </li>
                 <li>
                    <a class="nav-link" href="">-</a>
                </li>
                
                <li>
                 <a class="nav-link" href="#candidate">VIEW CONTESTANTS</a>
                    <!--<a class="nav-link" data-target="#judmodal" data-toggle="modal" href="">VIEW CANDIDATES</a>-->
                </li>
            </ul>
        </div>
    </nav>

<hr>
  
   
<!--start-->
  <div class="jumbotron" style="boder:1px ">
      <div class="row" >
          <div class="col-sm-4 " >
              <div class="table-responsive">
                  <a id="category"></a>
                 <a id="crits"></a>
                  <table class="table table-default" id="">
                      <thead class="thead-inverse"> 
                          <tr>
                              <th>Category</th>
                              <th>Percentage</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
      <?php
        $con=mysqli_connect('localhost','root','',$DB);
        $sql="select * from tblcategory";
        $res=mysqli_query($con,$sql);
        $row = mysqli_num_rows($res);
        
        if($row != 0)
        {
          $res=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($res))
          {
       
      ?>
                        <tr>

                            <td><?php echo $category = $row['category']; ?></td>
                            <td><?php echo $row['percentage'].'%'; ?></td>

                            <?php 
                              $con=mysqli_connect('localhost','root','',$DB);
                              $ew=$row['category'];
                              $sql11="select * from tblcriteria where category='$ew'";
                              $res11=mysqli_query($con,$sql11);
                              $e=mysqli_num_rows($res11);
                                if($_SESSION['username']['usertype']=='organizer' && $rowcount==0):
                                if($e!=0): ?>
                               <td><button type="button" class="btn btn-dark" type="button" value="Add " data-target="#editcrit<?php echo $row['cid'].$_GET['name']; ?>" data-toggle="modal">edit <span></span></button></td>
                              <?php endif;  ?>
                              <?php if($e==0): ?>
                            <td><button type="button" class="btn btn-dark" type="button" value="Add Criteria" data-target="#crit<?php echo $row['cid'].$_GET['name']; ?>" data-toggle="modal">criteria <span class="fa fa-plus"></span></button></td>
                               <?php endif; ?>
                               <?php endif; ?>
                        </tr>
                        

                         
                        
                          <!-- Modal -->
<div class="modal fade" id="crit<?php echo $row['cid'].$_GET['name']; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true" style="text-transform: capitalize;">Add Criteria for <?php echo $row['category']; ?></span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
        <div class="modal-body">
          <form class="form" action="insertcriteria.php" method="POST" role="form" autocomplete="off" id=""> 
             <div class="row">     
                <div class="col-sm-6 pb-3"><h5>Insert atleast one criteria<br>start on criteria 1</h5></div> 
                  <div class="col-sm-6 pb-3"><h5>Sum must be equal to 100!</h5>  </div> 
                    <input type="hidden" name="db" value="<?php echo $DB ?>">
                    <input type="hidden" name="category" value="<?php echo $row['category']; ?>">
                    <div class="col-sm-6 pb-3">   
                            <input type="text"  style="text-transform: capitalize;" name="criteria1" value =""  class="form-control"  placeholder="Criteria1">
                    </div>
                    <div class="col-sm-6 pb-3">
                         <input type="number" step="5"  max="100" min="10" id="one" name="percentage1"  class="form-control"  placeholder="Percentage">
                    </div>
                    <div class="col-sm-6 pb-3">
                         <input type="text" style="text-transform: capitalize;" name="criteria2"  value =""  class="form-control"  placeholder="Criteria2">
                    </div>
                    <div class="col-sm-6 pb-3">
                           <input type="number" step="5"  max="100" min="10" id="two" name="percentage2"  class="form-control" placeholder="Percentage">
                    </div>
                    <div class="col-sm-6 pb-3">  
                            <input type="text" style="text-transform: capitalize;" name="criteria3" value =""  class="form-control"  placeholder="Criteria3">
                    </div>
                     <div class="col-sm-6 pb-3">
                         <input type="number" step="5"  max="100" min="10" id="three" name="percentage3"  class="form-control"  placeholder="Percentage">
                    </div>
                    <div class="col-sm-6 pb-3">
                         <input type="text" style="text-transform: capitalize;" name="criteria4" value =""  class="form-control"  placeholder="Criteria4">
                    </div>
                     <div class="col-sm-6 pb-3">
                          <input type="number" step="5"  max="100" min="10" id="four" name="percentage4"  class="form-control" placeholder="Percentage">
                    </div>
                    <div class="col-sm-6 pb-3">
                           <input type="text"  name="criteria5" value =""  class="form-control" placeholder="Criteria5">
                    </div>
                     <div class="col-sm-6 pb-3">    
                            <input type="number" style="text-transform: capitalize;" onchange="check()" step="5"  max="100" min="10" id="five"  name="percentage5"  class="form-control"  placeholder="Percentage">
                    </div>
                   <script>
                        function check(){
                          //var a = ParseInt(document.getElementById('one').value);
                          //alert('hi');
                        }
                   </script>
             </div>
                
                                <div class="form-group">
    
                                    <label for="uname1"></label>
                                   
                                    <input type="hidden" name="db" value="<?php echo $_GET['name']; ?>">
                                    <input type="hidden" name="tid" value="<?php echo $row['category']; ?> ">
                                    <input type="hidden" name="tid" value="<?php echo $row['percentage']; ?> ">
                                </div>
                               
                                <button type="submit" class="btn btn-dark btn-md float-right">Save</button>

                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
  
                          <!-- Modal -->
<div class="modal fade" id="editcrit<?php echo $row['cid'].$_GET['name']; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true" style="text-transform: capitalize;">Edit Criteria for <?php echo $row['category']; ?></span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
        <div class="modal-body">
          <form class="form" action="editcriteria.php" method="POST" role="form" autocomplete="off" id=""> 
             <div class="row">     
                <div class="col-sm-6 pb-3"><h5>Criteria<br></h5></div> 
                  <div class="col-sm-6 pb-3"><h5>Sum must be equal to 100!</h5>  </div> 
                    <input type="hidden" name="db" value="<?php echo $DB ?>">
                    <input type="hidden" name="category" value="<?php echo $row['category']; ?>">

                    <?php
                      $con=mysqli_connect('localhost','root','',$DB);
                      $sqlcriteria="select * from tblcriteria where category='$category'";
                      $rescriteria=mysqli_query($con,$sqlcriteria);
                      $critrow=mysqli_num_rows($rescriteria);
                      $y=1;
                      while($row=mysqli_fetch_array($rescriteria)){
                        $criteria=$row['criteria'];
                         $percent=$row['percentage'];

                    ?>
                    <div class="col-sm-6 pb-3">   
                            <input type="text"  style="text-transform: capitalize;"  name="criteria<?php echo $y; ?>" value ="<?php echo $criteria ?>"  class="form-control"  placeholder="Criteria">
                            
                    </div>
                    <div class="col-sm-6 pb-3">
                         <input type="number" step="5"  max="100" min="10" id="one"  name="percentage<?php echo $y; ?>"  class="form-control" placeholder="Percentage" value="<?php echo $percent; ?>">
                    </div>

                   <?php   $y++; } ?>
                    <input type="hidden" name="critrow" value="<?php echo $critrow; ?>">
                   <script>
                        function check(){
                          //var a = ParseInt(document.getElementById('one').value);
                          //alert('hi');
                        }
                   </script>
             </div>
                
                                <div class="form-group">
    
                                    <label for="uname1"></label>
                                   
                                    <input type="hidden" name="db" value="<?php echo $_GET['name']; ?>">
                                    <input type="hidden" name="tid" value="<?php echo $row['category']; ?> ">
                                    <input type="hidden" name="tid" value="<?php echo $row['percentage']; ?> ">
                                </div>
                               
                                <button type="submit" class="btn btn-dark btn-md float-right">Save</button>
                                 
                               


                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
        
        <?php 
        } 
      }
      else
      { 
        ?>
                    <tbody>
                         <tr>
                            <td colspan=3  align ="center"><?php echo"nothing to display"; ?></td>
                          </tr>
     <?php
      } 
      ?>     
               </tbody>
              </table>
             </div>
               
           </div>
  
            <div class="col-sm-8 table-responsive " >
                <table class="table table-striped">
                <thead class="bg-dark">
                  <th style="color:gray;text-align: center">Category</th>
                  <th style="color:gray;text-align: center">Percentage</th>
                  <th style="color:gray;text-align: center">Criteria</th>
                  <th style="color:gray;text-align: center">Percentage</th>
                </thead>
                <?php
                $sql="Select a.percentage,a.category,b.criteria,b.percentage as percentage2 from tblcategory a inner join tblcriteria b on a.category = b.category";
                $res = mysqli_query($con,$sql);
                 $numrow = mysqli_num_rows($res);
                while($row=mysqli_fetch_array($res)){
                  ?>
                  <tr>
                    <td style="text-transform: capitalize;text-align: center"><?php echo $row['category']; ?></td>
                    <td style="text-transform: capitalize;text-align: center"><?php echo $row['percentage']; ?></td>
                    <td style="text-transform: capitalize;text-align: center"><?php echo $row['criteria']; ?></td>
                    <td style="text-transform: capitalize;text-align: center"><?php echo $row['percentage2']; ?></td>
                  </tr>
                <?php
                }
                ?>
                </table>

            </div>

            <div class="col-sm-4 ">
              
            </div>

            <div class="col-sm-3 ">

            </div>
 
                  
                  </div><!--container end -->
     <!--/row-->
     </div><!--end-->
  
<!--start-->
<?php 
$con=mysqli_connect('localhost','root','',$DB);
        $sqlcheck="select elimination from tblsetting";
        $rescheck=mysqli_query($con,$sqlcheck);
        while($rowcheck=mysqli_fetch_array($rescheck)){
              $eliminate=$rowcheck['elimination'];
        }
        if($eliminate!=0){
?>
  <div class="jumbotron" style="boder:1px ">
      <div class="row" >
          <div class="col-sm-4 " >
              <div class="table-responsive">
                  <a id="category"></a>
                 <a id="crits"></a>
                  <table class="table table-default" id="">
                      <thead class="thead-inverse"> 
                          <tr>
                              <th>Category</th>
                              <th>Percentage</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
      <?php
        $con=mysqli_connect('localhost','root','',$DB);
        $sql="select * from tblcategorytop";
        $res=mysqli_query($con,$sql);
        $row = mysqli_num_rows($res);
        
        if($row != 0)
        {
          $res=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($res))
          {
       
      ?>
                        <tr>

                            <td><?php echo $category = $row['category']; ?></td>
                            <td><?php echo $row['percentage'].'%'; ?></td>

                            <?php 
                              $con=mysqli_connect('localhost','root','',$DB);
                              $ew=$row['category'];
                              $sql11="select * from tblcriteriatop where category='$ew'";
                              $res11=mysqli_query($con,$sql11);
                             
                              $e=mysqli_num_rows($res11);
                                 if($_SESSION['username']['usertype']=='organizer' && $rowcount==0):
                                if($e!=0): ?>
                               <td><button type="button" class="btn btn-dark" type="button" value="Add " data-target="#editcrittop<?php echo $row['cid'].$_GET['name']; ?>" data-toggle="modal">edit  <span></span></button></td>
                              <?php endif;  ?>
                              <?php if($e==0): ?>
                            <td><button type="button" class="btn btn-dark" type="button" value="Add Criteria" data-target="#crittop<?php echo $row['cid'].$_GET['name']; ?>" data-toggle="modal">criteria <span class="fa fa-plus"></span></button></td>
                               <?php endif; ?>
                               <?php endif; ?>
                        </tr>
                        

                         
                        
                          <!-- Modal -->
<div class="modal fade" id="crittop<?php echo $row['cid'].$_GET['name']; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true" style="text-transform: capitalize;">Add Criteria for <?php echo $row['category']; ?></span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
        <div class="modal-body">
          <form class="form" action="insertcriteriatop.php" method="POST" role="form" autocomplete="off" id=""> 
             <div class="row">     
                <div class="col-sm-6 pb-3"><h5>Insert atleast one criteria<br>start on criteria 1</h5></div> 
                  <div class="col-sm-6 pb-3"><h5>Sum must be equal to 100!</h5>  </div> 
                    <input type="hidden" name="db" value="<?php echo $DB ?>">
                    <input type="hidden" name="category" value="<?php echo $row['category']; ?>">
                    <div class="col-sm-6 pb-3">   
                            <input type="text"  style="text-transform: capitalize;" name="criteria1" value =""  class="form-control" placeholder="Criteria1">
                    </div>
                    <div class="col-sm-6 pb-3">
                         <input type="number" step="5"  max="100" min="10" id="one" name="percentage1"  class="form-control"  placeholder="Percentage">
                    </div>
                    <div class="col-sm-6 pb-3">
                         <input type="text" style="text-transform: capitalize;" name="criteria2"  value =""  class="form-control"  placeholder="Criteria2">
                    </div>
                    <div class="col-sm-6 pb-3">
                           <input type="number" step="5"  max="100" min="10" id="two" name="percentage2"  class="form-control"  placeholder="Percentage">
                    </div>
                    <div class="col-sm-6 pb-3">  
                            <input type="text" style="text-transform: capitalize;" name="criteria3" value =""  class="form-control"  placeholder="Criteria3">
                    </div>
                     <div class="col-sm-6 pb-3">
                         <input type="number" step="5"  max="100" min="10" id="three" name="percentage3"  class="form-control"  placeholder="Percentage">
                    </div>
                    <div class="col-sm-6 pb-3">
                         <input type="text" style="text-transform: capitalize;" name="criteria4" value =""  class="form-control"  placeholder="Criteria4">
                    </div>
                     <div class="col-sm-6 pb-3">
                          <input type="number" step="5"  max="100" min="10" id="four" name="percentage4"  class="form-control" placeholder="Percentage">
                    </div>
                    <div class="col-sm-6 pb-3">
                           <input type="text"  name="criteria5" value =""  class="form-control" placeholder="Criteria5">
                    </div>
                     <div class="col-sm-6 pb-3">    
                            <input type="number" style="text-transform: capitalize;" onchange="check()" step="5"  max="100" min="10" id="five"  name="percentage5"  class="form-control" placeholder="Percentage">
                    </div>
                   <script>
                        function check(){
                          //var a = ParseInt(document.getElementById('one').value);
                          //alert('hi');
                        }
                   </script>
             </div>
                
                                <div class="form-group">
    
                                    <label for="uname1"></label>
                                   
                                    <input type="hidden" name="db" value="<?php echo $_GET['name']; ?>">
                                    <input type="hidden" name="tid" value="<?php echo $row['category']; ?> ">
                                    <input type="hidden" name="tid" value="<?php echo $row['percentage']; ?> ">
                                </div>
                               
                                <button type="submit" class="btn btn-dark btn-md float-right">Save</button>

                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
  
                          <!-- Modal -->
<div class="modal fade" id="editcrittop<?php echo $row['cid'].$_GET['name']; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true" style="text-transform: capitalize;">Edit Criteria for <?php echo $row['category']; ?></span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
        <div class="modal-body">
          <form class="form" action="editcriteriatop.php" method="POST" role="form" autocomplete="off" id=""> 
             <div class="row">     
                <div class="col-sm-6 pb-3"><h5>Criteria<br></h5></div> 
                  <div class="col-sm-6 pb-3"><h5>Sum must be equal to 100!</h5>  </div> 
                    <input type="hidden" name="db" value="<?php echo $DB ?>">
                    <input type="hidden" name="category" value="<?php echo $row['category']; ?>">

                    <?php
                      $con=mysqli_connect('localhost','root','',$DB);
                      $sqlcriteria="select * from tblcriteriatop where category='$category'";
                      $rescriteria=mysqli_query($con,$sqlcriteria);
                      $critrow=mysqli_num_rows($rescriteria);
                      $y=1;
                      while($row=mysqli_fetch_array($rescriteria)){
                        $criteria=$row['criteria'];
                         $percent=$row['percentage'];

                    ?>
                    <div class="col-sm-6 pb-3">   
                            <input type="text"  style="text-transform: capitalize;"  name="criteria<?php echo $y; ?>" value ="<?php echo $criteria ?>"  class="form-control"  placeholder="Criteria">
                            
                    </div>
                    <div class="col-sm-6 pb-3">
                         <input type="number" step="5"  max="100" min="10" id="one"  name="percentage<?php echo $y; ?>"  class="form-control" id="exampleAccount" placeholder="Percentage" value="<?php echo $percent; ?>">
                    </div>

                   <?php   $y++; } ?>
                    <input type="hidden" name="critrow" value="<?php echo $critrow; ?>">
                   <script>
                        function check(){
                          //var a = ParseInt(document.getElementById('one').value);
                          //alert('hi');
                        }
                   </script>
             </div>
                
                                <div class="form-group">
    
                                    <label for="uname1"></label>
                                   
                                    <input type="hidden" name="db" value="<?php echo $_GET['name']; ?>">
                                    <input type="hidden" name="tid" value="<?php echo $row['category']; ?> ">
                                    <input type="hidden" name="tid" value="<?php echo $row['percentage']; ?> ">
                                </div>
                               
                                <button type="submit" class="btn btn-dark btn-md float-right">Save</button>
                                 
                               


                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
        
        <?php 
        } 
      }
      else
      { 
        ?>
                    <tbody>
                         <tr>
                            <td colspan=3  align ="center"><?php echo"nothing to display"; ?></td>
                          </tr>
     <?php
      } 
      ?>     
               </tbody>
              </table>
             </div>
               
           </div>
  
            <div class="col-sm-8 table-responsive " >
                <table class="table table-striped">
                <thead class="bg-dark">
                  <th style="color:gray;text-align: center">Category</th>
                  <th style="color:gray;text-align: center">Percentage</th>
                  <th style="color:gray;text-align: center">Criteria</th>
                  <th style="color:gray;text-align: center">Percentage</th>
                </thead>
                <?php
                $sql="Select a.percentage,a.category,b.criteria,b.percentage as percentage2 from tblcategorytop a inner join tblcriteriatop b on a.category = b.category";
                $res = mysqli_query($con,$sql);
                 $numrow = mysqli_num_rows($res);
                while($row=mysqli_fetch_array($res)){
                  ?>
                  <tr>
                    <td style="text-transform: capitalize;text-align: center"><?php echo $row['category']; ?></td>
                    <td style="text-transform: capitalize;text-align: center"><?php echo $row['percentage']; ?></td>
                    <td style="text-transform: capitalize;text-align: center"><?php echo $row['criteria']; ?></td>
                    <td style="text-transform: capitalize;text-align: center"><?php echo $row['percentage2']; ?></td>
                  </tr>
                <?php
                }
                ?>
                </table>

            </div>

            <div class="col-sm-4 ">
              
            </div>

            <div class="col-sm-3 ">

            </div>
 
                  
                  </div><!--container end -->
     <!--/row-->
     </div><!--end-->
   
   <?php } ?>
   <div class="container-fluid" style="boder:1px solid black">
   <div class="row">
   <div class="col-lg-12 col-sm-8"><h3>Judge Table</h3></div>
   <?php if($_SESSION['username']['usertype']=='organizer'): ?>
    <div class="col-lg-7 col-sm-8">
        <?php endif; ?>
        <?php if($_SESSION['username']['usertype']=='admin'): ?>
    <div class="col-lg-12 col-sm-12">
        <?php endif; ?>
     <div class="table-responsive">
      
       
     
        
         <a id="judgetable"></a>

      <table class="table table-striped" id="myTable">
        <thead class="thead-inverse"> 
          <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
            <th colspan="2" style="text-align:center"></th>
          </tr>
        </thead>
          <tbody>
    <?php
      $con=mysqli_connect('localhost','root','','tesdacmi_users');
      $sql="select * from tblusers where usertype='judge' and db='$DB'";
      $res=mysqli_query($con,$sql);
      $row = mysqli_num_rows($res);
      
      if($row != 0)
      {
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res))
        {
     
    ?>
        <tr>
          
          <td><?php echo $row['username']; ?></td>
          
          <td><?php echo substr($row['password'],11); ?></td>
          <td><?php echo $row['status']; ?></td>
        
          <?php if($_SESSION['username']['usertype']=='organizer'):?>
            <?php if($row['status']=='activated')
            {
            ?> 
                <form  action="deactivate.php" method="POST">
                <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
                <input type="hidden" name="db" value="<?php echo $row['db']; ?>" >
                 <td><button type = "submit" class="btn btn-dark" >  <span class="">deactivate</span></button></td>
                </form>
                
            <?php 
            }
            else
            {
            ?>
            <form method="POST" action="activate.php">
           <td><button type = "submit" class="btn btn-dark" >  <span class="">activate</span></button></td>      
             <input type="hidden" value="<?php echo $row['uid']; ?>" name="uid">
                <input type="hidden" value="<?php echo $row['db']; ?>" name="db">
             </form>
            
            <?php 
            
                
            }
            ?>
                        <?php if($row['log']==1)
            {
            ?> 
                <form  action="changelog.php" method="POST">
                 <input type="hidden" name="log" value="<?php echo $row['log']; ?>">
                <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
                <input type="hidden" name="db" value="<?php echo $row['db']; ?>" >
                 <td><button type = "submit" class="btn btn-default" >  <span class="fa fa-lock"></span></button></td>
                </form>
                
            <?php 
            }
            else
            {
            ?>
            <form method="POST" action="changelog.php">
            <input type="hidden" name="log" value="<?php echo $row['log']; ?>">
           <td><button type = "submit" class="btn btn-default" >  <span class="fa fa-unlock"></span></button></td>      
             <input type="hidden" value="<?php echo $row['uid']; ?>" name="uid">
                <input type="hidden" value="<?php echo $row['db']; ?>" name="db">
             </form>
            
            <?php 
            
                
            }
            ?>
          <?php endif; ?>
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
  <?php
    if($_SESSION['username']['usertype']=='organizer'): ?>
       <div class="col-sm-5 ">
     <div class="card rounded-0" style = "">
                        <div class="card-header">
                        <a id="addjudge"></a>
                            <h3 class="mb-0">Add Judge</h3>
                        </div>
                        <div class="card-body" >
                            <form class="form" role="form" action ="insertjudge.php" method="POST" autocomplete="off" id="">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $DB; ?>" name="db">
                                    <label for="uname1">Username</label>
                                    <input type="text"  id="uname23" style="text-transform: ;" onchange="usernamechecks()" class="form-control form-control-lg rounded-0"  name="username"  required="" minlength="6">
                                     <p align="center" style="color:red" id="usernamecheck"></p>
                                      <div class="alert alert-danger" id="username_errors" role="alert" style="display:none">
                                     <strong>Invalid input:</strong> Enter atleast 6 characters!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="pwd23"  onkeyup="checkpasswords()" name="password" class="form-control form-control-lg rounded-0"  required="" autocomplete="new-password">
                                </div>
                                <div class="alert alert-danger" id="length_errors" role="alert" style="display:none">
                                     <strong>Invalid input:</strong> Password is too short enter atleast 6 characters!
                                    </div>
                                 <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password"  onkeyup="checkpasswords()" class="form-control form-control-lg rounded-0" id="pwd34" required="" autocomplete="new-password">
                                    <p align="center" id="passwordcheck" style="color:red"></p>
                                     <p align="center" id="lengthcheck" style="color:red"></p>
                                     <div class="alert alert-danger" id ="match_errors" style="display:none" role="alert">
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

function usernamechecks(){
  var x = document.getElementById('uname23').value;
  var y = document.getElementById('usernamechecks');
  var z = document.getElementById('username_errors');
  var j = document.getElementById('uname23').value;


//alert(x);
        
  if(x.length<6){
     
      
      z.style.display = "block";

    }else if(x.length>=6){
     
        z.style.display = "none";
    }
}
function checkpasswords(){
  var w = document.getElementById('length_errors');
  var v = document.getElementById('match_errors');
  var x = document.getElementById('pwd23').value;
  var y = document.getElementById('pwd34').value;
  //alert(x);
  if(x.length>=6){
    w.style.display = "none";
     document.getElementById('jack').style.visibility='';
  
  if(x==y){
    v.style.display = "none";
     document.getElementById('jacks').style.visibility='';
  }else if(y.length!=0 && x!=y){
    v.style.display = "block";
    document.getElementById('jacks').style.visibility='hidden';
  }

  }else if(x.length>0&&x.length<=5){
     w.style.display = "block";
    document.getElementById('jacks').style.visibility='hidden';
  }
 
}
</script>
                                
                                <button type="submit" id='jacks' class="btn btn-dark btn-md float-right">Register</button>
                              
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                  
    </div><?php endif; ?>
    </div>
  


  
   
  
   <a id="more"></a>
   <hr>
  
  
  <hr>

   <div class="jumbotron" style="boder:1px ">
    <h2 class="sub-header" align="center">CONTESTANTS</h2>
    <div style="height:50px"></div>
      <div class="row ">

 <a id="candidate"></a>
      <?php
        $con=mysqli_connect('localhost','root','',$DB);
        $sql="select * from tblcandidate where gender='female'  order by ABS(cannumber)";
        $res=mysqli_query($con,$sql);
          $row=mysqli_num_rows($res);
          if($row!=0){
        while($row=mysqli_fetch_array($res))
        {
         
       ?>
       
        <div class="col-sm-3  ">
          <a href="#" >
           <?php   echo "<img height='380' width='260' src='data:image/JPEG;base64,".$row[3]."'>";?>
          </a>
          <h3 align="center" style="text-transform: capitalize;"><?php echo $row['fullname']; ?></h3>
          <h4 align="center">contestant no. <?php echo $row['cannumber']; ?></h4>
            <?php
    if($_SESSION['username']['usertype']=='organizer'): ?>
          <div align="center"><button align="center"  data-target="#editconmodal<?php echo $DB.$row['canid'];?>" data-toggle="modal" class="btn btn-dark" value="edit">edit</button>&nbsp&nbsp<form method="POST" action="deletecandidate.php">
              <input type="hidden" name="canid" value="<?php echo $row['canid']; ?>">
              <input type="hidden" name="database" value="<?php echo $DB; ?>">
              
              <button align="center" type="submit" class="btn btn-dark" value=""><span style="color:pink">drop</span></button>
              </form></div>
              <?php endif; ?>
        
          <div style="height:50px;boder:1px solid black"></div>
        </div>
        <!-- Modal -->
<div class="modal fade" id="editconmodal<?php echo $DB.$row['canid']; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">Edit Candidate</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="editcandidate.php" method="POST" role="form" autocomplete="off" id="" onsubmit="backbut.disabled = true; return true;">                           
                            <input type="hidden" value="<?php echo $DB; ?>" name="database"> 
                            <input type="hidden" value="<?php echo $row['canid']; ?>" name="canid">
                            
                             <div class="form-group">
                                    <label for="uname1">Name</label>
                                    <input type="hidden" name="db" value="<?php echo $DB; ?>">
                                    <input type="text" value="<?php echo $row['fullname']; ?>" style="text-transform: capitalize;" placeholder="Firstname-Lastname" class="form-control form-control-md rounded-0" name="fullname" id="" required="">
                                </div>
                                  

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" style="text-transform: capitalize;" value="<?php echo $row['address']; ?>" placeholder="Brgy-City-Province" class="form-control form-control-md rounded-0" id="pwd1" name="address" required="" autocomplete="new-password">
                                </div>
                                <div class="row" style="">
                                  
                                  <div class="col-md-4">
                                    <label>Age</label>
                                    <input type="number" placeholder="yrs-old" min="16" value="<?php echo $row['age']; ?>" class="form-control form-control-md rounded-0" name="age" id="pwd1" required="" autocomplete="new-password">
                                </div>
                               
                                

                                 <div class="col-md-4">
                                 <label>Select</label>
                                <select  class="custom-select" id="" required="" name="gender"  required>
                                  <option  value="Male"<?php if($row['gender']=='Male'): ?> selected <?php endif; ?> >Male</option>
                                  <option  value="Female" <?php if($row['gender']=='Female'):?>selected <?php endif; ?> >Female</option>
                                  </select>
                                </div>
                                 
                                  
                              </div>
                                
                            <hr>
                               
                                <input type="hidden" name="database" value="<?php echo $DB; ?>">
                                <button type="submit" name="backbut" class="btn btn-dark float-right">Yes </button>
                                  <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">

                                  <span aria-hidden="true">No</span>
                                 <span class="sr-only">Close</span>
                                   </button>
                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->

        <?php } }else{ ?>

         <div class="col-sm-4 ">
         </div>
       <div class="col-sm-4 col-sm-offset-12">
          <a href="#" >
          
           
           
          </a>
          <h3 align="center">Nothing to display  for female!</h3>
          <h4 align="center"></h4>
        
        </div>
        </div>
        <div class="row">
              <?php } 
               $sql="select * from tblcandidate where gender='male'  order by ABS(cannumber)";
        $res=mysqli_query($con,$sql);
          $row=mysqli_num_rows($res);
          if($row!=0){
        while($row=mysqli_fetch_array($res))
        {
         
       ?>
       
       
        <div class="col-sm-3  ">
          <a href="#" >
           <?php   echo "<img height='380' width='260' src='data:image/JPEG;base64,".$row[3]."'>";?>
          </a>
          <h3 align="center" style="text-transform: capitalize;"><?php echo $row['fullname']; ?></h3>
          <h4 align="center">contestant no. <?php echo $row['cannumber']; ?></h4>
                  <?php
    if($_SESSION['username']['usertype']=='organizer'): ?>
          <div align="center"><button align="center"  data-target="#editconmodal<?php echo $DB.$row['canid'];?>" data-toggle="modal" class="btn btn-dark" value="edit">edit</button>&nbsp&nbsp
                    <form method="POST" action="deletecandidate.php">
              <input type="hidden" name="canid" value="<?php echo $row['canid']; ?>">
              <input type="hidden" name="database" value="<?php echo $DB; ?>">
              
              <button align="center" type="submit" class="btn btn-dark" value=""><span style="color:pink">drop</span></button>
              </form></div><?php endif; ?>
           
          <div style="height:50px;boder:1px solid black"></div>
        </div>
         <!-- Modal -->
<div class="modal fade" id="editconmodal<?php echo $DB.$row['canid']; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">Edit Candidate</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="editcandidate.php" method="POST" role="form" autocomplete="off" id="" onsubmit="backbut.disabled = true; return true;">                           
                            <input type="hidden" value="<?php echo $DB; ?>" name="database"> 
                            <?php 
                           	$con=mysqli_connect('localhost','root','',$DB);
                            
                           	//$sql="select * from tblcandidate where canid='$canid'";
                            ?>
                            <input type="hidden" value="<?php echo $row['canid']; ?>" name="canid">
                               <div class="form-group">
                                    <label for="uname1">Name</label>
                                    <input type="hidden" name="db" value="<?php echo $DB; ?>">
                                    <input type="text" value="<?php echo $row['fullname']; ?>" style="text-transform: capitalize;" placeholder="Firstname-Lastname" class="form-control form-control-md rounded-0" name="fullname" id="" required="">
                                </div>
                                  

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" style="text-transform: capitalize;" value="<?php echo $row['address']; ?>" placeholder="Brgy-City-Province" class="form-control form-control-md rounded-0" id="pwd1" name="address" required="" autocomplete="new-password">
                                </div>
                                <div class="row" style="">
                                  
                                  <div class="col-md-4">
                                    <label>Age</label>
                                    <input type="number" placeholder="yrs-old" min="16" value="<?php echo $row['age']; ?>" class="form-control form-control-md rounded-0" name="age" id="pwd1" required="" autocomplete="new-password">
                                </div>
                              
                                

                                 <div class="col-md-4">
                                 <label>Select</label>
                                <select  class="custom-select" id="" required="" name="gender"  required>
                                  <option  value="Male"<?php if($row['gender']=='Male'): ?> selected <?php endif; ?> >Male</option>
                                  <option  value="Female" <?php if($row['gender']=='Female'):?>selected <?php endif; ?> >Female</option>
                                  </select>
                                </div>
                                  
                              </div>
                                
                            <hr>
                               
                                <input type="hidden" name="database" value="<?php echo $DB; ?>">
                                <button type="submit" name="backbut" class="btn btn-dark float-right">Yes </button>
                                  <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">

                                  <span aria-hidden="true">No</span>
                                 <span class="sr-only">Close</span>
                                   </button>
                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="dropcon<?php echo $row['canid']; ?>" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3><span aria-hidden="true">Edit Candidate</span></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
     <span class="sr-only">Close</span>
    </button>
   
   </div>
   <div class="modal-body">
    <form class="form" action="dropcandidate.php" method="POST" role="form" autocomplete="off" id="" onsubmit="backbut.disabled = true; return true;">                           
                            <input type="hidden" value="<?php echo $DB; ?>" name="database"> 
                            
                                  
                            
                                
                            <hr>
                               
                                <input type="hidden" name="database" value="<?php echo $DB; ?>">
                                <button type="submit" name="backbut" class="btn btn-dark float-right">Yes </button>
                                  <button type="button" class="btn btn-dark btn-md float-left" data-dismiss="modal" aria-label="Close">

                                  <span aria-hidden="true">No</span>
                                 <span class="sr-only">Close</span>
                                   </button>
                            </form>
   </div>
  
  </div>
 </div>
</div>
<!-- Modal -->
        <?php } }else{ ?>

         <div class="col-sm-4 ">
         </div>
       <div class="col-sm-4 col-sm-offset-12">
          <a href="#" >
          
           
           
          </a>
          <?php
          $sqlcateg="select * from tblsetting";
          $rescateg=mysqli_query($con,$sqlcateg);
          while($rowcateg=mysqli_fetch_array($rescateg)){
              $categ=$rowcateg['category'];
          }
          if($categ!='Female'): ?>
          <h3 align="center">Nothing to display for male!</h3>
          <?php endif; ?>
          <h4 align="center"></h4>
        
        </div>
              <?php } ?>
           
      </div>
        
  </div>
  <!--/main col-->
    </div><!--/blue one-->
  </div>
 
</div>
<!--/.container-->
 <?php include 'footer.php' ?>
<script>
       $(document).ready(function(){
    $('#myTable').DataTable({
       "paging": false
    });
     
    $('#data').DataTable({
       
    });
      });
      </script>
      
         <script>
$(document).ready(
function () {
$('input[type="text"],textarea').bind('change', function () {
// $('textarea[id$=txtfpconfirmcomments]').change(function (event) {

if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
}
});
$('input[type="number"],textarea').bind('change', function () {
// $('textarea[id$=txtfpconfirmcomments]').change(function (event) {

if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
}
});
});

    </script>

     
<body>
</html>