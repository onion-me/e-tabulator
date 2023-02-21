

 <?php
                      
                        // Usage without mysql_list_dbs()
   $con = mysqli_connect('localhost', 'root', '');
   $sql = "SELECT schema_name FROM INFORMATION_SCHEMA.schemata  where schema_name like 'sys%'
                        GROUP BY schema_name;;";
   $res = mysqli_query($con,$sql);

  while ($row = mysqli_fetch_array($res)) {
    


  
       $DB=$row['schema_name'];

  $sqls="select * from information_schema.tables where table_type = 'BASE TABLE' and table_schema = '$DB'";
  $ress=mysqli_query($con,$sqls);
  $count=mysqli_num_rows($ress);
 
  if($count==0)
  {
     echo $DB=$row['schema_name'];
       echo '<br>'; 
  }else{
    continue;
  }

   }
?>