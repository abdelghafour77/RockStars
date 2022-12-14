<?php
session_start();
if (isset($_SESSION['id'])) {
  header('location: index.php');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poor+Story&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
  <!-- Style CSS -->
  <link rel="stylesheet" href="assets/css/main.css" />
  <title>Log in - RockStars</title>
</head>

<body class="font-Poppins">
  <!--  -->
  <div id="background-img">

    <!-- Navbar -->
    <?php
    include 'include/navbar.php';
    ?>

    <!-- Hero Section -->
    <section id="hero" class="flex justify-center min-h-full pt-2 ">
      <!-- items-center -->
      <div class="container felx glass-effect md:felx-row items-center mx-auto my-20 mb-40 space-y-0 md:space-y-0 max-h-fit max-w-2xl">
        <h3 class="text-3xl text-center font-bold p-4">Log in </h3>
        <form id="form_login" action="scripts.php" method="post" class="px-8 pt-6 pb-8 mb-4">
          <div class="mb-4">
            <label class="block text-gray-900 text-sm font-bold mb-2" for="email">
              Email
            </label>
            <input name="email" value="<?= (isset($_COOKIE['email'])) ? $_COOKIE['email'] : '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
          </div>
          <div class="mb-4">
            <label class="block text-gray-900 text-sm font-bold mb-2" for="password">
              Password
            </label>
            <input name="password" value="<?= (isset($_COOKIE['password'])) ? $_COOKIE['password'] : '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Password">
          </div>
          <input type="hidden" name="login">
          <div class="flex items-center mb-4">
            <input id="default-checkbox" checked type="checkbox" name="remember_me" class="w-4 h-4 accent-gold bg-gray-100 rounded border-gray-300 focus:ring-lightGold dark:focus:ring-gold dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-checkbox" class="ml-2 text-sm font-medium text-black dark:text-black">Remember Me</label>
          </div>
          <div class="flex items-center justify-end">
            <!-- <a class="inline-block align-baseline font-bold text-sm text-gold hover:text-lightGold" href="#">
              Forgot Password?
            </a> -->
            <button class="bg-gold hover:bg-lightGold text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Log in
            </button>
          </div>
        </form>

      </div>

    </section>

  </div>

  <?php
  include 'include/footer.php'
  ?>
  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/sweetalert.js"></script>
  <?php
  include 'include/alert.php';
  ?>
</body>

</html>