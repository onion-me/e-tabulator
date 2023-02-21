<?php
 session_start();
  if(isset($_SESSION['username'])){
      if($_SESSION['username']['usertype']=='admin'){
    echo "<script>
    alert('you must logout first!');
    open('adminhome.php','_self');
    </script>";
      }else if($_SESSION['username']['usertype']=='organizer'){
    echo "<script>
    alert('you must logout first!');
    open('adminhome.php','_self');
    </script>";
}else{
       echo "<script>
    alert('you must logout first!');
    open('judgehome.php','_self');
    </script>";
      }
  }
    

?>    
<!DOCTYPE html>
<html>
    <?php include 'head.php';?>

<body>
    

<div class="container">
   
        
      
<?php 
$con = mysqli_connect('localhost','root','','tesdacmi_users');
$sql = "select * from tblusers where usertype='admin'";
$res = mysqli_query($con,$sql);
$rows = mysqli_num_rows($res);
    if($rows !=0){
?>
    <div class="container >
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">HAHAHAHH!</h2>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <span class="anchor" id="formLogin"></span>

                    <!-- form card login -->
                    <div class="card rounded-0" style = "width:400px">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body" >
                            <form class="form" role="form" action ="checkuser.php" method="POST" autocomplete="off" id="formLogin">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" style="text-transform: ;" class="form-control form-control-lg rounded-0" name="username" id="uname1" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password"  name="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
                                </div>
                                <!--<div class="form-group" align="center">
                                    <span>Doesn't have an account? </span><br><span>Register </span><a href="register.php">here</a>
                                </div>-->

                               
                                <button type="submit" class="btn btn-dark btn-lg float-right">Login</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->


                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
</div>
    
<?php }else{ ?>
    <div class="container ">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">HAHAHAHAH</h2>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <span class="anchor" id="formLogin"></span>

                    <!-- form card login -->
                    <div class="card rounded-0" style = "width:400px">
                        <div class="card-header">
                            <h3 class="mb-0">Register</h3>
                        </div>
                        <div class="card-body" >
                            <form class="form" role="form" action="registeradmin.php" method="POST" autocomplete="off" id="formLogin">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" style="text-transform: capitalize;" class="form-control form-control-lg rounded-0" name="username" id="uname1" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
                                </div>
                                 <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password2" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
                                </div>
                               
                                <button type="submit" class="btn btn-dark btn-lg float-right">Register</button>


                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->


                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
</div>
    <?php } ?>

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
</body>
</html>

