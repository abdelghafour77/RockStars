<?php
include 'scripts.php';
if (isset($_GET['id'])) {
  $category = getCategory($_GET['id']);
  if ($category == null) {
    header('location: 404.php');
  }
  $products = getProducts($_GET['id']);
} else {
  header('location: 404.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poor+Story&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/main.css">
  <title>RockStars - <?= $category['name']  ?> </title>
</head>

<body class="font-Poppins bg-gray-100 ">
  <div id="background-img" class="flex flex-col justify-between h-72 " style="background-image: url(assets/img/categories/<?= $category['picture']  ?>) ;">
    <?php
    include 'include/navbar.php';
    ?>
    <div class="opacity-100 transition duration-300 ease-in-out absolute from-black/80 to-transparent bg-gradient-to-t inset-x-0 bottom-0 pt-36 items-end">
      <h2 class="flex container mb-4 text-white  text-shadow-md text-3xl "><?= $category['name']  ?></h2>
    </div>
  </div>

  <!-- Breadcrumb -->
  <nav class="container flex py-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li class="inline-flex items-center">
        <a href="index.php" class="inline-flex items-center text-sm font-medium hover:text-gray-700 text-gray-400">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
          </svg>
          Home
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
          </svg>
          <a href="index.php#categories" class="ml-1 text-sm font-medium hover:text-gray-700 text-gray-400">Categories</a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
          </svg>
          <span class="ml-1 text-sm font-medium md:ml-2 text-gray-400"><?= $category['name']  ?></span>
        </div>
      </li>
    </ol>
  </nav>

  <div class="py-10 w-full min-h-max gap-4 flex-wrap flex justify-center items-center">

    <?php
    $count = -1;
    foreach ($products as $count => $product) {
    ?>
      <!-- Card -->
      <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
        <!-- Image -->
        <img class="h-40 mx-auto object-cover rounded-xl" src="assets/img/products/<?= $product['picture'] ?>" alt="<?= $product['model'] ?>">
        <div class="p-2">
          <!-- Heading -->
          <h2 class="font-bold text-lg mb-2 truncate" title="<?= $product['model'] ?>"><?= $product['model'] ?></h2>
          <h2 class="text-xs mb-2 "><?= $product['brand'] ?></h2>
          <!-- Description -->
          <p class="text-sm text-gray-600 truncate h-10" title="<?= $product['description'] ?>"><?= $product['description'] ?></p>
        </div>
        <!-- CTA -->
        <div class="m-2 flex justify-between">
          <h2 class="font-bold">$<?= $product['price'] ?></h2>
          <a role='button' href='#' class="text-white bg-yellow-500 px-3 py-1 rounded-md hover:bg-lightGold">More</a>
        </div>
      </div>
    <?php
    }
    if ($count == -1) {
      echo '<h2 class="font-bold">No data available now !</h2>';
    }
    ?>
  </div>
  <?php
  include 'include/footer.php'
  ?>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>