<?php
    $servername = "localhost:3301";
    $username = "root";
    $password = "";
    $dbname = "assignment2_webdev";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    } 
?>