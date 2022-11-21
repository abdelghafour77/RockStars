<?php
require_once 'scripts.php';
include 'include/role.php';

$users = getAllUsers();
$countProducts = countProducts();
$countUsers = countUsers();
$countCategories = countCategories();
$countBrands = countBrands();
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
  <link rel="stylesheet" href="assets/css/main.css" />
  <title>Dashboard - RockStars</title>
</head>

<body class="font-Poppins">
  <div class="flex h-screen overflow-y-hidden bg-white">
    <!-- Sidebar -->
    <?php
    include 'include/sidebar-dashboard.php';
    sidebar('dashboard');
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

        <!-- Start Content -->
        <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">

          <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start justify-between">
              <div class="flex flex-col space-y-2">
                <span class="text-gray-400">Total Products</span>
                <span class="text-lg font-semibold"><?= $countProducts ?></span>
              </div>
              <div class="h-24 w-24 flex justify-center bg-gray-100 rounded-md">
                <img class="w-20 my-auto" src="assets/img/product.png" alt="">
              </div>
            </div>
          </div>

          <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start justify-between">
              <div class="flex flex-col space-y-2">
                <span class="text-gray-400">Total Categories</span>
                <span class="text-lg font-semibold"><?= $countCategories ?></span>
              </div>
              <div class="h-24 w-24 flex justify-center bg-gray-100 rounded-md">
                <img class="w-20 my-auto" src="assets/img/categories.png" alt="">
              </div>
            </div>
          </div>

          <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start justify-between">
              <div class="flex flex-col space-y-2">
                <span class="text-gray-400">Total Users</span>
                <span class="text-lg font-semibold"><?= $countUsers ?></span>
              </div>
              <div class="h-24 w-24 flex justify-center bg-gray-100 rounded-md">
                <img class="w-20 my-auto" src="assets/img/users.png" alt="">
              </div>
            </div>
          </div>

          <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
            <div class="flex items-start justify-between">
              <div class="flex flex-col space-y-2">
                <span class="text-gray-400">Total Brands</span>
                <span class="text-lg font-semibold"><?= $countBrands ?></span>
              </div>
              <div class="h-24 w-24 flex justify-center bg-gray-100 rounded-md">
                <img class="w-20 my-auto" src="assets/img/brands.png" alt="">
              </div>
            </div>
          </div>

        </div>

        <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
        <h3 class="mt-6 text-xl">Users</h3>
        <div class="flex flex-col mt-6">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th>
                      <!-- <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Title
                      </th> -->
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Phone</th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Role</th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    foreach ($users as $user) {

                    ?>
                      <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                              <img class="w-10 h-10 rounded-full" src="assets/img/users/<?= ($user['picture']) ?  $user['picture'] :  'avatar.png' ?>" alt="<?= $user['first_name'] . '_' . $user['last_name'] ?>" />
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900"><?= $user['first_name'] . ' ' . $user['last_name'] ?></div>
                              <div class="text-sm text-gray-500"><?= $user['email'] ?></div>
                            </div>
                          </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"> <?= ($user['phone']) ?  $user['phone'] :  'Null' ?> </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><?= $user['role'] ?></td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                          <a href="edit.php?id_user=<?= $user['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
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