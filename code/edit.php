<?php
include 'scripts.php';
if (isset($_SESSION['id'])) {
  if (isset($_GET['id_user'])) {
    $user = getUser($_GET['id_user']);
  } else {
    $user = getUser($_SESSION['id']);
  }
} else {
  header('location: 404.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poor+Story&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <title>RockStars</title>
</head>

<body class="font-Poppins">
  <div class="flex h-screen overflow-y-hidden bg-white">
    <!-- Sidebar -->
    <?php
    include 'include/sidebar-dashboard.php';
    sidebar('users');
    ?>

    <div class="flex flex-col flex-1 h-full overflow-hidden">
      <!-- Navbar -->
      <?php include 'include/header-dashboard.php'; ?>
      <!-- Main content -->
      <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
        <!-- Main content header -->
        <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
          <h1 class="text-2xl font-semibold whitespace-nowrap">Dashboard</h1>
        </div>
        <!-- start -->

        <div class="bg-gray-50 py-10 w-full min-h-max gap-4 flex-wrap flex justify-center items-start">

          <div class=" p-2 bg-white rounded-xl transform transition-all shadow-lg">
            <div class="mb-2 text-center">
              <div class="w-24 h-24 flex items-center">
                <img class="w-20 h-20 mx-auto rounded-md bg-gray-200" src="assets/img/users/<?= $user['picture'] != null ? $user['picture'] : 'avatar.png' ?>" alt="">
              </div>
              <label for="exampleFormControlInput1" class="form-label text-center inline-block mb-2 text-gray-700">ID : <?= $user['id'] ?></label>
            </div>
          </div>
          <div class="p-2 bg-white rounded-xl transform transition-all shadow-lg w-1/2">
            <form action="scripts.php" method="post">
              <input type="hidden" name="id" value="<?= $user['id'] ?>">
              <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">First Name</label>
                <input autocomplete="off" type="text" id="first_name" name="first_name" placeholder="First Name" value="<?= $user['first_name'] ?>" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
              </div>
              <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Last Name</label>
                <input autocomplete="off" type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?= $user['last_name'] ?>" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
              </div>
              <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Email</label>
                <input autocomplete="off" type="email" id="email" name="email" placeholder="Email" value="<?= $user['email'] ?>" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
              </div>

              <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Phone</label>
                <input autocomplete="off" type="text" id="phone" name="phone" placeholder="Phone" value="<?= $user['phone'] ?>" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
              </div>
              <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Change Password</label>
                <input autocomplete="off" type="password" id="password" name="password" placeholder="Password" value="" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
              </div>
              <div class="text-end">
                <button type="submit" name="update_user" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Update</button>
              </div>
            </form>
          </div>

        </div>

        <!-- end -->
      </main>
      <!-- Main footer -->
      <footer class="py-1 bg-transparentBlack">
        <div class="container mx-auto">
          <p class="text-shadow-lg text-xs md:text-base text-center text-white">Made with ❤️ by ABDELGHAFOUR AOUAD 🌪</p>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/sweetalert.js"></script>
  <?php
  include 'include/alert.php';
  ?>
</body>

</html>