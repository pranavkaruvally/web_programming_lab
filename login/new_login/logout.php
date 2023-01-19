<html>
<?php
    session_start();

    $user = $_SESSION['user'];
    echo $_SESSION['user']." logged out";

    session_destroy();
?>

<body>
    <a href="index.php"><button>Home</button></a>