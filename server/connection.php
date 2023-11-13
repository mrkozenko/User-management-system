<?php
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$database = "webdb"; 

function get_connection_db(){
    global $servername, $username, $password, $database;    
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

?>