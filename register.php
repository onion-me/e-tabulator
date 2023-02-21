<html>
    <head>
    <?php include 'head.php'; ?>
    </head>
    <body>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">Bootstrap 4 Login Form</h2>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <span class="anchor" id="formLogin"></span>

                    <!-- form card login -->
                    <div class="card rounded-0" style = "width:400px">
                        <div class="card-header">
                            <h3 class="mb-0">Register</h3>
                        </div>
                        <div class="card-body" >
                            <form class="form" role="form" autocomplete="off" id="formLogin">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="username" id="uname1" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" name="password" required="" autocomplete="new-password">
                                </div>
                                 <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
                                </div>
                                 <?php
                      
                        // Usage without mysql_list_dbs()
                        $con = mysqli_connect('localhost', 'root','');
                        $sql = "SELECT table_schema FROM INFORMATION_SCHEMA.tables where table_schema like 'sys%'
                        GROUP BY table_schema;";
                        $res = mysqli_query($con,$sql); ?>
                         <div class="form-group">
                                <select class="custom-select" id="single_select" name="db" value="db" required>
                                        <option selected="true" disabled="disabled" value="">select database</option>
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                          ?>
                         
    

                           
                                        <option value="<?php echo $row['table_schema'];?>"><?php echo $row['table_schema'];?></option>
                               
  
                      <?php
                        }
                        ?>
                         </select>
                                     </div>

                               
                               
                                <button type="button" class="btn btn-dark btn-lg float-right">Register</button>
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
</body>
</html>