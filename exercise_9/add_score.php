<?php
if ($_POST) {
    include 'connection.php';
    $ktu_id = $_POST['ktu_id'];
    $series_1 = $_POST['series_1'];
    $series_2 = $_POST['series_2'];
    $assignment_1 = $_POST['assignment_1'];
    $assignment_2 = $_POST['assignment_2'];
    $attendance = $_POST['attendance'];

    $result = mysqli_query($conn, "INSERT INTO score (ktu_id, series_1, series_2, assignment_1, assignment_2, attendance) VALUES ('$ktu_id', $series_1, $series_2, $assignment_1, $assignment_2, $attendance);");
    header("Location:dashboard_score.php");
}
