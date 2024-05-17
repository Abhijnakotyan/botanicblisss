<?php
 $host="localhost";
 $user="root";
 $password="";
 $database="botanicbliss";
 //createconnection
$con=mysqli_connect($host,$user,$password,$database);
 //check connection
 if(!$con)
 {
 die("connection failed:" .mysqli_connect_error());
 }
 ?>