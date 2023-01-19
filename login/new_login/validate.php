<?php
    include("connection.php");
    session_start();

    $user = $_POST["uname"];
    $password = $_POST["pword"];

    $sql = "SELECT * FROM login WHERE ktuid=$password";
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    if($num) {
        echo "$user signed in successfully!";
        $_SESSION['user'] = $user;

        $new_sql = "SELECT * FROM login";
        $new_res = mysqli_query($conn, $new_sql);
        $new_num = mysqli_num_rows($new_res);

        echo "<br><br>";
        
        for ($i=0; $i < $new_num; $i++) {
            $ktu_details = mysqli_fetch_assoc($new_res);
            printf("%s: %d<br>", $ktu_details['user'], $ktu_details['ktuid']);
        }

    } else {
        echo "User not found\n";
    }
?>
<br>
<a href="logout.php">Sign out</a>