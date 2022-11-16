<?php
$password='';
$serverName='localhost';
$userName='root';
$dbName='bincomphptest';
$con=new mysqli($serverName,$userName,$password,$dbName);
if($con->connect_error!=''){
echo 'connection error';
print_r($con);
}


