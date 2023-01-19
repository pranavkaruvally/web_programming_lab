<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Teacher Dashboard</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['teacher_name'])) {
        header("Location:login.php");
    }
    $username = $_SESSION['teacher_name'];
    ?>

    <div id="main-area" class="flex relative">
        <div class="flex flex-col items-center shadow-2xl rounded-2xl px-16 h-screen justify-evenly m-5 w-72">
            <h1 class="font-bold text-2xl">ET-LAB PRO</h1>
            <nav>
                <ul>
                    <li>
                        <a href="dashboard_home.php" class="flex gap-2 my-4 border-2 rounded-md px-4 py-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            Home</a>
                    </li>
                    <li>
                        <a href="#" class="flex gap-2 my-4 border-2 border-black rounded-md px-4 py-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>

                            Students</a>
                    </li>
                    <li>
                        <a href="dashboard_score.php" class="flex gap-2 border-2 my-4 rounded-md px-4 py-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                            Score</a>
                    </li>
                    <li>
                        <a href="logout.php" class="flex gap-2 my-4 border-2 border-red-200 text-red-400 rounded-md px-4 py-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="w-full m-5 rounded-2xl shadow-2xl p-5">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-black rounded-md text-white">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            #
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            KTU ID
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'connection.php';
                                    $i = 0;
                                    $result = mysqli_query($conn, 'SELECT * FROM student');
                                    if ($result) {
                                        while ($row = mysqli_fetch_row($result)) {
                                            echo '<tr class="border">';
                                            echo '<th scope="col" class="text-sm font-medium px-6 py-4 text-left">';
                                            echo ++$i;
                                            echo '</th>';
                                            echo '<th scope="col" class="text-sm font-medium px-6 py-4 text-left">';
                                            echo $row[0];
                                            echo '</th>';
                                            echo '<th scope="col" class="text-sm font-medium px-6 py-4 text-left">';
                                            echo $row[1];
                                            echo '</th>';
                                            echo '<th scope="col" class="text-sm text-red-400 font-medium px-6 py-4 text-left">';
                                            echo '<a href="remove_student.php?id=' . $row[0] . '"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                          </svg></a>';
                                            echo '</th>';
                                            echo '</tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-end mt-10">
                    <button id="new-button" class="text-white bg-black rounded-md px-4 py-2">New</button>
                </div>
            </div>

        </div>
    </div>
    <div id="modal-box" class="hidden bg-white text-black rounded-md shadow-md p-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <h1 class="text-xl font-bold border-b-2 mb-4">New Student</h1>
        <form action="add_student.php" method="post" class="flex flex-col gap-3">
            <label for="ktu_id">KTU ID: </label><input class="border-2 p-2 rounded-md" type="text" name="ktu_id" placeholder="KTU ID">
            <label for="name">Name: </label><input class="border-2 p-2 rounded-md" type="text" name="name" placeholder="Name">
            <label for="password">Password: </label><input class="border-2 p-2 rounded-md" type="text" name="password" placeholder="Password">
            <div class="flex gap-3">
                <input type="button" value="Cancel" id="cancel-button" class="cursor-pointer w-1/2 mt-5 text-white bg-red-400 rounded-md px-4 py-2">
                <input type="submit" value="Add" class="cursor-pointer w-1/2 mt-5 text-white bg-black rounded-md px-4 py-2">
            </div>
        </form>
    </div>

    <script>
        const newButton = document.querySelector('#new-button');
        const cancelButton = document.querySelector('#cancel-button');
        const modalBox = document.querySelector('#modal-box');
        const mainArea = document.querySelector('#main-area');
        const toggleModal = () => {
            modalBox.classList.toggle('hidden');
            modalBox.classList.toggle('absolute');
            mainArea.classList.toggle('blur');
        }
        newButton.addEventListener('click', (e) => {
            e.preventDefault();
            toggleModal();
        })
        cancelButton.addEventListener('click', (e) => {
            e.preventDefault();
            toggleModal();
        })
    </script>

</body>

</html>