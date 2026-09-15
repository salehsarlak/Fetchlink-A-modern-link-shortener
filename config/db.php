<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "link";


$conn = new mysqli($servername , $username , $password , $dbname);

if($conn->connect_error){
    die("connection field :" . $conn->connect_error);
}


?>



                            

                    
