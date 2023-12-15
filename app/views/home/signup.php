<?php require_once 'includes/head.php' ?>
<?php require_once 'includes/header.php' ?>

<div class="border-2 border-dark bg-white md:m-auto md:mt-12 md:w-1/2 grid grid-cols-1 md:grid mx-2 md:grid-cols-2 md:gap-10 rounded-lg mt-12">
    <img class="md:m-auto md:ml-4" src="<?= BASE_URL_ASSETS ?>img/undraw_engineering_team_a7n2.svg" alt="signup">
    <div class="flex flex-col items-center   md:w-full mt-10  ">
        <h1 class="text-2xl font-bold  text-center mt-3">Sign up</h1>
        <form action="./Usersignup" method="post" class="flex flex-col mt-4 gap-4 w-full">
            <div class="mx-4">
                <input class="border-2 border-dark px-2 py-2   w-full  " type="text" id="fisrtname" name="firstname" required placeholder="First Name">
            </div>
            <div class="mx-4">
                <input class="border-2 border-dark w-full px-2 py-2  " type="text" id="lastname" name="lastname" required placeholder="Last Name">
            </div>
            <div class="mx-4">
                <input class="border-2 border-dark  w-full px-2 py-2" type="email" id="username" name="email" required placeholder="E-mail">
            </div>
            <div class="mx-4">
                <input class="border-2 border-dark   w-full px-2 py-2" type="password" id="password" name="password" required placeholder="Password">
            </div>
            <div class="mx-4">
                <button class="px-4 py-3 text-white w-full  bg-dark mb-5" name="submit" type="submit">Add</button>
            </div>
        </form>
        <p class="text-red-500 text-center mb-2"><?php 
            // die("test");
            echo $this->view_data["error"];
         ?></p>
    </div>
</div>



</body>

</html>