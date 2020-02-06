<?php
    $servername = "mysql.agh.edu.pl:3306";
    $username = "mkoz";
    $password = file_get_contents('./sec.txt');
    $dbname = "mkoz";
        
    $conn = new mysqli($servername, $username, $password, $dbname);
        
    // Check
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
?>