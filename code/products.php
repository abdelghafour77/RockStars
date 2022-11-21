<?php
include 'scripts.php';
if (!isset($_SESSION['id'])) {
  header('location: 404.php');
  die();
}
$categories = getAllCategories();
$brands = getAllBrands();
$products = getAllProducts();
$countProducts = countProducts();
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
  <title>Dashboard products - RockStars</title>
</head>

<body class="font-Poppins">
  <div class="flex h-screen overflow-y-hidden bg-white">
    <!-- Sidebar -->
    <?php
    include 'include/sidebar-dashboard.php';
    sidebar('products');
    ?>
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
        <div class="flex mt-6 items-center justify-between">
          <h3 class="text-xl">All Products (<?= $countProducts ?>)</h3>
          <button onclick="openModal()" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Add product
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
                            <div class="flex-shrink-0 w-12 h-12 ">
                              <img class="mx-auto picture h-12 rounded-md" product="<?= $product['picture'] ?>" src="assets/img/products/<?= $product['picture'] ?>" alt="" />
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
                          <span class="quantity inline-flex px-2 text-xs font-semibold leading-5 <?= $product['quantity'] <= 5 ? 'text-red-800 bg-red-100' : ' text-green-800 bg-green-100' ?> rounded-full" product="<?= $product['quantity'] ?>"> <?= $product['quantity'] ?> </span>
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
  <div id="modal" class="z-20 snap-x h-screen w-full hidden fixed left-0 top-0 justify-center items-center bg-black bg-opacity-50">
    <div class="z-30 bg-white max-h-screen rounded shadow-lg md:w-3/4 md:mx-0 w-full mx-2">
      <form action="scripts.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id_product" name="id_product">
        <input type="hidden" id="type" name="">
        <div class="flex justify-between border-b px-4 py-2">
          <h3>Add Product</h3>
          <button type="button" onclick="closeModal()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="p-2">
          <div class="flex justify-center">

            <!-- xl:w-96 -->
            <div class="mb-1">
              <div id="picture" class="hidden picture rounded-sm h-16 justify-center">

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