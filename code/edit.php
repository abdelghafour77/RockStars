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
    <aside class="inset-y-0 z-10 flex flex-col flex-shrink-0 w-fit max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none">
      <!-- sidebar header -->
      <div class="flex items-center justify-center flex-shrink-0 p-2">
        <a href="index.php" class="pt-2">
          <div class="font-RockStars font-semibold text-sm ms:text-xl md:text-xl">
            <span class="text-gold">RS</span>
          </div>
        </a>
      </div>
      <!-- Sidebar links -->
      <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="p-2 overflow-hidden">
          <li>
            <a href="dashboard.php" class="flex justify-start items-center p-2 space-x-2 rounded-md hover:bg-gray-100">
              <span>
                <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span class="hidden md:block">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="users.php" class="flex justify-start items-center p-2 space-x-2 rounded-md bg-gray-100">
              <span>
                <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
              </span>
              <span class="hidden md:block">Users</span>
            </a>
          </li>
          <li>
            <a href="categories.php" class="flex justify-start items-center p-2 space-x-2 rounded-md hover:bg-gray-100">
              <span>
                <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
              </span>
              <span class="hidden md:block">Categories</span>
            </a>
          </li>
          <li>
            <a href="brands.php" class="flex justify-start items-center p-2 space-x-2 rounded-md hover:bg-gray-100">
              <span>
                <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                </svg>
              </span>
              <span class="hidden md:block">Brands</span>
            </a>
          </li>
          <li>
            <a href="products.php" class="flex justify-start items-center p-2 space-x-2 rounded-md hover:bg-gray-100">
              <span>
                <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
              </span>
              <span class="hidden md:block">Products</span>
            </a>
          </li>
          <!-- Sidebar Links... -->
        </ul>
      </nav>
    </aside>

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
                <input type="submit" name="update_user" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
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