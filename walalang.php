<?php
    include 'con.php';
    $usn = mysqli_real_escape_string($con, $_POST['usn']);
    $usn = htmlentities( $usn );
    $sql="select * from tblusers where usn='$usn'";
    $res=mysqli_query($con,$sql);
    $array=mysqli_fetch_array($res);
    $numrow=mysqli_num_rows($res);
    if($numrow!=0)
    {
        if($usn==15000899700500)
        {
            session_start();
            $_SESSION['username']=$array;
            echo "<script> alert('HI CRUSH <3<3<3'); open('elect.php','_self'); </script>";
        }
        else
        {
            session_start();
            $_SESSION['username']=$array;
             echo "<script> open('elect.php','_self'); </script>";
        }
    }
    else
    {
       echo "<script> alert('invalid usn!'); open('index.php','_self'); </script>" 
    }
?>