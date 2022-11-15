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
    <aside class="inset-y-0 z-10 flex flex-col flex-shrink-0 w-fit max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none">
      <!-- sidebar header -->
      <div class="flex items-center justify-between flex-shrink-0 p-2 lg:justify-center">
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
      <header class="flex-shrink-0 border-b">
        <div class="flex items-center justify-end p-2">
          <!-- Navbar right -->
          <div class="relative flex items-center space-x-3">
            <!-- avatar button -->
            <div class="relative">
              <button id="dropdown" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                <img class="object-cover w-8 h-8 rounded-full" src="assets/img/users/404-1662642451.jfif" alt="Abdelghafour aouad" />
              </button>

              <!-- Dropdown card -->
              <div id="dropdown-card" class="hidden absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max">
                <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                  <span class="text-gray-800">abdelghafour AOUAD</span>
                  <span class="text-sm text-gray-400">a.aouad@student.youcode.ma</span>
                </div>
                <ul class="flex flex-col p-2 my-2 space-y-1">
                  <li>
                    <a href="editProfil.php" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Edit profil</a>
                  </li>
                </ul>
                <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                  <a href="#">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
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
                <span class="text-lg font-semibold">50</span>
              </div>
              <div class="p-10 bg-gray-200 rounded-md"></div>
            </div>
            <div>
              <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
              <span>From last month</span>
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
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Role</th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-10 h-10 rounded-full" src="assets/img/users/404-1662642451.jfif" alt="" />
                          </div>
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Abdelghafour AOUAD</div>
                            <div class="text-sm text-gray-500">a.aouad@student.youcode.ma</div>
                          </div>
                        </div>
                      </td>
                      <!-- <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                        <div class="text-sm text-gray-500">Optimization</div>
                      </td> -->
                      <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"> Active </span>
                      </td>
                      <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Admin</td>
                      <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                      </td>
                    </tr>
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
</body>

</html>