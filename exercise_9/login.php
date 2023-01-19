<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Please Login to Continue....</title>
</head>

<body>
    <?php
    include "connection.php";
    ?>
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="flex flex-col space-y-2 shadow-xl p-5">
            <h1 class="text-2xl font-bold self-center">Teacher Login</h1>
            <form action="login.php" method="post">
                <div class="my-4 flex items-center justify-between">
                    <label for="name">Name: </label>
                    <input class="inline-flex border rounded-md px-2 py-1" type="text" name="name" required placeholder="name">
                </div>
                <div class="my-4 gap-4 flex items-center justify-between">
                    <label for="password">Password: </label>
                    <input class="border rounded-md px-2 py-1" type="password" name="password" required placeholder="******">
                </div>
                <div class="flex w-full gap-5">
                    <input class="w-full rounded-md bg-red-400 text-white rounded-md px-2 py-1" type="reset">
                    <input class="w-full rounded-md bg-black text-white rounded-md px-2 py-1" type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
    <?php
    if ($_POST) {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM teacher WHERE name='$name' AND password='$password';");
        $user = mysqli_fetch_row($result);
        if ($user) {
            echo "<script>alert('Login Success!');</script>";
            session_start();
            $_SESSION['teacher_name'] = $name;
            header("Location:dashboard_home.php");
        } else {
            echo "<script>alert('Login Failed!');</script>";
        }
    }

    ?>
</body>

</html>