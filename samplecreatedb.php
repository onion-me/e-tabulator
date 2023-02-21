<?php  

include("xmlapi.php");  
$db_host = "e-tabulator.com";  
$cpuser = "tesdacmi";  
$cppass = "adminall2016";  

$xmlapi = new xmlapi($db_host);  
$xmlapi->set_port(2083);  
$xmlapi->password_auth($cpuser,$cppass);  
$xmlapi->set_debug(1);  
//create database  
print $xmlapi->api1_query($cpuser, "Mysql", "adddb", 'tesdacmi_myDatabaseName');  
//create user  
print $xmlapi->api1_query($cpuser, "Mysql", "adduser", array('tesdacmi_myDBUser','myDBPwd'));  
//add user to database  
$xmlapi->api1_query($cpuser, "Mysql", "adduserdb", array(  
                    'tesdacmi_myDatabaseName',  
                    'tesdacmi_myDBUser',  
                    'all'));  

?>
