<?php

    include("connection.php");
    
    $uname = $_POST["uname"];
    $passwd = $_POST["passwd"];

    $sql = "select * from login where user='$uname' and ktuid='$passwd'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "\n<b>User found!</b>";
    }
    else {
        echo "\n<b>User not found!</b>";
    }
?>
