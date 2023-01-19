<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_lab";

    //$conn = mysqli_connect("localhost", "root", "", "mysql");
    $conn = mysqli_connect($host, $username, $password, $dbname);
    
    if ($conn -> connect_errno) {
        echo "Failed with " . $conn->connect_errno;
        exit();
    }
?>
