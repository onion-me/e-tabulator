<?php
	$DB=$_POST['db'];
    $_POST['Description'];
	$title=$_POST['title'];
	echo "<script>
    open('createcategory.php?name=$DB+&count=0+&title=$title','_self');
    </script>";
?>