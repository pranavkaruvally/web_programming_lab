<?php
    $conn = mysqli_connect("localhost", "root", "", "web_lab");

    if ($conn->connect_errno) {
        die("Error!!!\nError: $connect_errno");
    }

    session_start();
?>