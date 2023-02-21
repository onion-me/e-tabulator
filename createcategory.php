 <html>
  <?php include 'head.php';
 
    ?>
    <body>
    <?php
 session_start();
  if(!isset($_SESSION['username'])){
    echo "<script>
    alert('you must login first!');
    open('login.php','_self');
    </script>";
  }
  if(!isset($_GET['name'])){
    echo "<script> open('#','_self')</script>";
  }else{
  $data =$_GET['name'];
}
?>

<div id="app" style="width:100%">
    <nav class="navbar navbar-expand-md navbar-light bg-faded"  style="background-color:; width: %; height: 50px; background-size: 100%;" >
        <a class="nav-item" href="home.php"><strong></strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
                

            </ul>
            <ul class="navbar-nav">
                    
                
                <li class="nav-item">
                    
                </li>
               
                
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php include 'head.php'; ?>
   <a class="navbar-brand" href="adminhome.php" style="color:gray"><strong><h3>E-Tabulator <span class="fa fa-bar-chart fa-1x"></span></h3></strong></a>
   
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
    if($_SESSION['username']['usertype']!='organizer'){
    echo "<script>
    alert('your not an organizer!');
    open('judgehome.php','_self');
    </script>";
  }
  ?>
     <?php
      $data =$_GET['name'];
     

      ?>
     
<div class="container-fluid" id="main" style="boder	:1px solid black">
 <div class="row row-offcanvas row-offcanvas-left">
  <?php include 'sidenav.php';?>
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

  <div class="col-md-9 col-lg-10 main" style="boder	:1px solid black">

   <!--toggle sidebar button-->
  

   <h1 class="display-1 hidden-xs-down">
      CREATE
   </h1 >
   <p class="lead">(online tabulator)</p>
     <hr>  
                <a id="category"></a>
                <form action="insertcategory.php" onsubmit="nextbut.disabled = true; return true;" method="POST" >
                <input type="hidden" name="database" value="<?php  echo $data;?>">
             
                    <!-- form complex example -->
                    
      <div class="jumbotron">
        <div class="panel-heading clearfix">
          <i class="icon-calendar"></i>
        
        </div>
        <div class="row" style="boder	:3px solid gray">
        <div class="col-sm-2   " style="boder : 3px solid blue"></div>
          <div class="col-sm-5   " style="boder	: 3px solid blue">
          <label><h5>Set the Number of Category</h5></label>
            <div class="col-md-7 " >
                     <input type="hidden" id = "title" name="title" value = "<?php echo $_GET['title']; ?>" >    

                         
      
       

                <div class="input-group"> 
                        <?php if($_GET['count']==0){ ?>
                         <input type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="[0-9]" step="1" style = "boder-color:red;float:left" onkeyup="myFunction()" class="form-control" placeholder="1-10"   required min="1" max="10" name="counter" class="form-control" id="num" value="<?php echo $_GET['count'];?>"> 
                         <?php }else{ ?>
                        <input type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" style="float:left" pattern="[0-9]" step="1" required onkeyup="myFunction()"  class="form-control" placeholder="required*"   min="1" max="10" name="counter" class="form-control" id="num" value="<?php echo $_GET['count'];?>">
                        <?php } ?>
                  <span class="input-group-btn">
                     
                    <button class="btn btn-dark" value="" id="<?php echo $data ?>" onclick="count(this.id)" type="button"><span class= "fa fa-check fa-2x"></span></button>
                  </span>
                </div><br><!-- /input-group -->
  

                                      
                      
                      
                          
                            </div>
    
     
                   
              
                          

                   
                   
                        <script>
                            function myFunction() {
                            var x = document.getElementById("num");
                       x.value = x.value.toUpperCase();
                              }
                            function count(id){
                              var y = id;
                             
                              var w =  document.getElementById('title').value ; 
                              /*alert(y);*/
                              var x = document.getElementById('num').value ; 
                             window.location.href = "createcategory.php?count="+x+"&name="+y+"&title="+w;

                            }
                        </script>
                       
    
                     <script>d
                            function hundred(id){
                              var total=0;
                              var y=document.getElementById(id).value;
                              var x=document.getElementById('limit').value;
                              for (i = 1; i <= x; i++) { 
                              var w=+document.getElementById(i).value;
                              if(w.length < 1){
                                w=100;
                              }
                              total=total+w;
                              }
                              if(total!==100){
                                document.getElementById('badalert').style.display="block";
                                 document.getElementById('divselection').style.display="none";
                                  document.getElementById('submitnext').style.visibility = 'hidden';
                                  document.getElementById('submitdisabled').style.visibility = 'hidden';
                              }else{
                                document.getElementById('divselection').style.display="block";
                                 document.getElementById('submitnext').style.visibility = 'visible';
                                document.getElementById('badalert').style.display="none";
                              }
                            }
                        </script>
        <div class="row">
            
            
            <div class="alert alert-danger" style="display:none" id="badalert">
                <strong>Alert!</strong> Percentage sum must be equal to 100.
            </div>
      <?php 
      $x = $_GET['count'];
    for($i=0;$i<$x;$i++)
      {?>

                      <div class="input-group">  
                       <div class="col-sm-7 pb-4"> 
                           
                            <input type="text" style="text-transform: capitalize;" required name="category<?php echo $i+1?>" value =""  class="form-control" id="exampleAccount" placeholder="Category <?php echo $i+1?>">
                        </div>
                        
                        <div class="col-sm-3 pb-3">
                           
                            <input type="number" id="<?php echo $i+1?>" step=".01" onkeyup="hundred(id)" required max="100" min="0"  name="percentage<?php echo $i+1?>"  class="form-control" id="exampleAccount" placeholder="%">
                            <input type="hidden" value="<?php echo $x; ?>" id="limit">
                        </div>
                        
                      </div>

                       
                        
                        
                      
                       
    
    
      <?php

      }

      ?>
                         <div class="col-md-5">
                            <label for="uname1">Max-score</label>
                            <input type="number" style="width:120px;" step="5"  max="100"   id"=1" name="max" value="100" class="form-control" id="exampleAccount" placeholder="MAX-Score">
                       </div>
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']['username'];?>">
                        <input type="hidden" name="password" value="<?php echo $_SESSION['username']['password'];?>">
                       <div class="col-md-5">
                            <label for="uname1">Min-score</label>
                           <input type="number" step="5" style="width:120px;" name="min" max="90"  value ="75"  class="form-control" id="exampleAccount" placeholder="MIN-Score">
                        </div>



                          </div>
                         
                       
                    </div><!--yellow-->
                   
                       
                          
                    

                  <!--paste-->
                
      <div class="col-md-4" style="boder:1px solid green;display:none" id="divselection">
         
          <div class="form-group">
            <label for="sel1"><h5>Type of Scoring:</h5></label>
            <select required="required" name="type" class="form-control" id="sel1" style="width:280px">
            <option value="">Please select</option>
              <option value="percentage">Percentage</option>
              <option value="ranking">Ranking with Percentage</option>
              <option value="ranking1">Ranking</option>
             <!-- <option value="both">ranking & percentage</option>-->
            </select>
          </div>
          
        <div class="panel-heading clearfix">
          <label for="defaultCheck1"><h5>
               Elimination </h5>
              </label>
        </div>

          
          <div class="row">
            <div class="col-md-6">
                 <div class="radio">
            <label><input type="radio" name="top" value = "" name="top"> No elimination</label>
          </div>
            <div class="radio">
            <label><input type="radio" name="top" value = "3" name="top"> Top 3</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="top" value="5" name="top"> Top 5</label>
          </div>
          </div>
          <div class="col-md-6">
          <div class="radio">
            <label><input type="radio" name="top" value="10" name="optradio"> Top 10</label>
          </div>
          
          
          
          </div>
          </div>
            

        
        <br>
        <label for="defaultCheck1"><h5>
               Choose </h5>
              </label>
        <div class="row">
            <div class="col-md-6">
            <div class="radio">
            <label><input type="radio" required="required" value = "female" name="category"> Female only</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="category" value="male" name="category"> Male only</label>
          </div>
          </div>
          <div class="col-md-6">
          <div class="radio">
            <label><input type="radio" name="category" value="both" name="category"> Male and Female</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="category" value="female" name="category"> All/Group</label>
          </div>
          
          
          </div>
          </div>
                 </div>
            <!--paste-->

              <div class="col-md-1" style="boder:1px solid pink">
              <?php if($x==0):?>
              <input class="btn btn-dark"  type="submit" id="submitdisabled" style="visibility:hidden" disabled="" name="nextbut" value="NEXT">
              <?php endif; ?>
               <?php if($x!=0):?>
              <input class="btn btn-dark" id="submitnext" style="visibility:hidden" type="submit" name="nextbut" value="NEXT">
              <?php endif; ?>
                </div>

               </div>  <!--gray-->
            </div>  <!--jumbotron-->     
    </div><!--row-->
     </form>
 </div><!--black-->

 </div><!--blue-->
 <?php include 'footer.php'; ?>

</div>

<!--/.container-->
<!--/.container-->




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
</html>