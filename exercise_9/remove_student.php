<?php
if ($_GET['id']) {
    $ktu_id = $_GET['id'];
    include 'connection.php';
    $result = mysqli_query($conn, "DELETE FROM student WHERE ktu_id='$ktu_id';");
    header("Location:dashboard_students.php");
}
