<?php

$servername="localhost";
$username="root";
$password="";
$database="banktransfer";
//create a connection
$conn= mysqli_connect($servername, $username, $password, $database);
//die if connection is fail
if(!$conn){
    die("sorry connection is failled".mysqli_connect_error());

}
//  else{
//      echo "connection was successfull"; //no need to write else bcoz die function quit the programm
// }

?>