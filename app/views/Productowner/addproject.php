<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard</title>
    <meta name="title" content="Team and project management for DataWare">
    <meta name="keywords" content="team, project, Members, team management, project management">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inika&family=Inter:wght@100&family=Ruda&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inika&family=Inter:wght@100&family=Ruda&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <!-- js -->
    <script src="js/navbar.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    Saira: ["Saira Condensed", "sans-serif"],
                },
                extend: {
                    colors: {
                        dark: "#1e1b4b",
                        secondary: "#312e81",
                        blueText: "#1e40af",
                        primary: "#1d4ed8",
                        blutextbtn: "#2563eb",
                        blueText2: "#3b82f6",
                        background: "#60a5fa",
                        btn: "#93c5fd",
                        deleted: "#FF6D4D",
                        hoverd: "#FF4F4D",
                    },
                },
            },
        };
    </script>
</head>

<body class="md:overflow-y-hidden">
    <div class="flex gap-4 mr-4">
        <div class="h-screen w-1/6 bg-white border-r shadow-md md:bg-dark">
            <ul class="space-y-4 text-lg sidebar bg-dark text-white mt-5">
                <div class="flex items-center justify-center">
                    <img src="<?= BASE_URL_ASSETS ?>img/testlogo.png" alt="logo.png" class="w-full">
                </div>
                <li>
                    <a href="./home" class="block py-2 px-4 hover:bg-btn hover:text-dark text-xl">Home</a>
                </li>
                <li>
                    <a href="" class="block py-2 px-4 hover:bg-btn hover:text-dark text-2xl">Projects</a>
                </li>
                <li>
                    <a href="./team" class="block py-2 px-4 hover:bg-btn hover:text-dark text-xl">Teams</a>
                </li>
                <li>
                    <a href="./member" class="block py-2 px-4 hover:bg-btn hover:text-dark text-xl">Members</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>public/User/logout" class="block py-2 px-4 hover:bg-btn hover:text-dark text-xl">Log out</a>
                </li>
            </ul>
        </div>
        <div class="w-3/6 m-auto">
            <form action="./Add_project" class=" m-auto bg-blueText2 w-full md:w-4/6 rounded-lg" method="post">
                <div class="mb-5 mx-4">
                    <label class="block p-4 text-sm font-medium  dark:text-white">Project name :</label>
                    <input type="name" id="name" name="nameprojet" class="bg-white  border border-dark text-gray-500 text-sm rounded-lg w-full  p-2.5  " placeholder="project name" required>
                </div>
                <div class="mb-5 mx-4">
                    <label class="block block px-2 pb-2 text-sm font-medium  dark:text-white">Start_date:</label>
                    <input type="date" id="date" name="startdate" class="bg-white border border-dark text-sm rounded-lg w-full  p-2.5 text-gray-500 " placeholder="mm-dd-yyyy" required>
                </div>
                <div class="mb-5 mx-4">
                    <label class="block px-2 pb-2 text-sm font-medium  dark:text-white">End_date:</label>
                    <input type="date" id="date" name="enddate" class="bg-white border border-dark  text-sm rounded-lg w-full  p-2.5 text-gray-500 " placeholder="mm-dd-yyyy" required>
                </div>
                <div class="mx-4">
                    <button type="submit" name="submit" class="text-white bg-dark hover:bg-blue-700 font-medium rounded-lg text-sm w-full mb-4  py-2.5 text-center">Submit</button>
                    <p class="text-dark text-center pb-4"><?php
                                                            echo $this->view_data["error"];
                                                            ?></p>
                </div>
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>