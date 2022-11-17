<?php
include 'scripts.php';
$categories = getAllCategories();
$brands = getAllBrands();
$products = getAllProducts();
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
            <a href="users.php" class="flex justify-start items-center p-2 space-x-2 rounded-md hover:bg-gray-100">
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
            <a href="products.php" class="flex justify-start items-center p-2 space-x-2 rounded-md bg-gray-100">
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
          <h1 class="text-2xl font-semibold whitespace-nowrap">Manage Products</h1>
        </div>

        <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
        <div class="flex items-center justify-between">
          <h3 class="mt-6 text-xl">All Products</h3>
          <button onclick="openModal()" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Add products
          </button>
        </div>


        <div class="flex flex-col mt-6">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Model</th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        description
                      </th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">quantity</th>
                      <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">price</th>
                    </tr>
                  </thead>

                  <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    foreach ($products as  $product) { ?>
                      <tr class="transition-all hover:bg-gray-100 hover:shadow-lg" onclick="getProduct(<?= $product['id'] ?>)" id="<?= $product['id'] ?>">
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12">
                              <img class="picture w-12 h-12 rounded-md" product="<?= $product['picture'] ?>" src="assets/img/products/<?= $product['picture'] ?>" alt="" />
                            </div>
                            <div class="ml-4">
                              <div class="model text-sm font-medium text-gray-900" product="<?= $product['model'] ?>"><?= $product['model'] ?></div>
                              <div class="category text-sm text-gray-500" product="<?= $product['categories_id'] ?>"><?= $product['category'] ?> - <?= $product['brand'] ?></div>
                            </div>
                          </div>
                        </td>
                        <td class="brand px-6 py-4 whitespace-nowrap" product="<?= $product['brands_id'] ?>">
                          <p class="description text-sm truncate max-w-sm text-gray-900" product="<?= $product['description'] ?>"><?= $product['description'] ?></p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="quantity inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full" product="<?= $product['quantity'] ?>"> <?= $product['quantity'] ?> </span>
                        </td>
                        <td class="price px-6 py-4 text-sm text-gray-500 whitespace-nowrap" product="<?= $product['price'] ?>">$<?= $product['price'] ?></td>
                      </tr>
                    <?php } ?>

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
  <!-- Modal -->
  <div id="modal" class="z-20 h-screen w-full hidden fixed left-0 top-0 justify-center items-center bg-black bg-opacity-50">
    <div class="bg-white rounded shadow-lg md:w-3/4 md:mx-0 w-full mx-2">
      <form action="scripts.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id_product" name="id_product">
        <input type="hidden" id="type" name="">
        <div class="border-b px-4 py-2">
          <h3>Add Product</h3>
        </div>
        <div class="p-2">
          <div class="flex justify-center">

            <!-- xl:w-96 -->
            <div class="mb-1">
              <div class="picture rounded-sm w-16 mx-auto">

              </div>
              <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Model</label>
                <input type="text" id="model" name="model" placeholder="Model" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
              </div>
              <div class="mb-2 flex">
                <div class="mr-2 w-1/2">
                  <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Brand</label>
                  <select name="brand" id="brand" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="" disabled selected>Select Brand</option>
                    <?php
                    foreach ($brands as $brand) {
                    ?>
                      <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                    <?php
                    } ?>
                  </select>
                </div>
                <div class="ml-2 w-1/2">
                  <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Category</label>
                  <select name="category" id="category" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="" disabled selected>Select Category</option>
                    <?php
                    foreach ($categories as $category) {
                    ?>
                      <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php
                    } ?>
                  </select>
                </div>
              </div>

              <div class="mb-2 flex">
                <div class="mr-2 w-1/2">
                  <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Quantity</label>
                  <input type="number" id="quantity" name="quantity" placeholder="Quantity" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                </div>
                <div class="ml-2 w-1/2">
                  <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Price</label>
                  <input type="number" id="price" name="price" placeholder="Price" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                </div>
              </div>

              <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Description</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"> </textarea>
              </div>
              <div class="mb-1">
                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Picture</label>
                <input id="picture" name="picture" type="file" class="form-control cursor-pointer block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-describedby="file_input_help" />
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-end items-center w-100 border-t p-2">
          <button type="button" id="cancel" onclick="closeModal()" class="bg-gray-600 hover:bg-gray-700 px-3 py-1 rounded text-white mr-1">cancel</button>
          <button type="submit" id="add" onclick="setType('add')" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white mr-1">save</button>
          <button type="submit" id="update" onclick="setType('update')" class="bg-orange-500 hover:bg-orange-600 px-3 py-1 rounded text-white mr-1">update</button>
          <button type="submit" id="delete" onclick="setType('delete')" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">delete</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Modal -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="assets/js/sweetalert.js"></script>
  <script src="assets/js/main.js"></script>
  <?php
  include 'include/alert.php';
  ?>
</body>

</html>