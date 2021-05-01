<?php
function OpenCon()
 {
$host = 'localhost';
$username = 'id16219776_root'; 
$password = 'f7/1{?E/7>YMlXPl' ; 
$database = 'id16219776_webform';

 //connection string with database  
$conn = mysqli_connect($host, $username, $password, $database) or die("Connection failed: ".$conn->connect_error);  

 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }?>