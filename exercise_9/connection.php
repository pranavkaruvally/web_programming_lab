<?php
$conn = mysqli_connect("localhost", "root", null, "college");

if (!$conn) {
    die("FATAL: DB CONNECTION FAILED");
}
