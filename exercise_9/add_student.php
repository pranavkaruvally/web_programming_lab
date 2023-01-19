<?php
if ($_POST) {
    include 'connection.php';
    $ktu_id = $_POST['ktu_id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "INSERT INTO student VALUES ('$ktu_id', '$name', '$password');");
    header("Location:dashboard_students.php");
}
