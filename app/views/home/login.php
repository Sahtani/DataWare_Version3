<?php require_once 'includes/head.php' ?>
<?php require_once 'includes/header.php' ?>
<div class="border-2 border-dark bg-white flex flex-col items-center   md:w-1/4 md:m-auto mx-4 mt-12 rounded-lg">
    <img src="<?= BASE_URL_ASSETS ?>img/profile.svg" alt="face.jpg" class="w-40 h-40 rounded-full mt-3" />
    <form action="../user/Userlogin" method="post" class="flex flex-col mt-5 w-full   ">
        <div class="mx-4">
            <label class="text-dark" for="username">Email:</label>

            <input class="border border-dark  w-full  rounded-full px-2 py-2" type="email" id="username" name="email" required class="">
        </div>
        <div class="mx-4">
            <label class="text-dark" for="password">Password:</label>

            <input class="border border-dark  w-full  rounded-full md:px-2 py-2" type="password" id="password" name="password" required>
        </div>

        <p class=" mt-3 text-center ">Already a member?<a class="font-bold" href="signup.php"> Sign up</a></p>
        <div class="mx-4">

            <button class="px-4 py-3 w-full text-white rounded-full bg-dark mt-5 mb-5" name="submit" type="submit">Login</button>
        </div>
    </form>
    <p class="text-red-500 text-center mb-4"> <?php echo $this->view_data["error"]; ?></p>
</div>
</body>

</html>