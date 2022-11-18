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

<body class="font-Poppins">
  <div id="background-img" class="h-72 from-black/80 to-transparent bg-gradient-to-t inset-x-0" style="background-image: url(assets/img/categories/<?= $category['picture']  ?>) ;">
    <?php
    include 'include/navbar.php';
    ?>
  </div>
  <div class="bg-gray-100 py-10 w-full min-h-max gap-4 flex-wrap flex justify-center items-center">
    <?php
    $count = 0;
    foreach ($products as $count => $product) {
    ?>
      <!-- Card -->
      <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
        <!-- Image -->
        <img class="h-40 mx-auto object-cover rounded-xl" src="assets/img/products/<?= $product['picture'] ?>" alt="<?= $product['model'] ?>">
        <div class="p-2">
          <!-- Heading -->
          <h2 class="font-bold text-lg mb-2 "><?= $product['model'] ?></h2>
          <h2 class="text-xs mb-2 "><?= $product['brand'] ?></h2>
          <!-- Description -->
          <p class="text-sm text-gray-600 truncate h-10"><?= $product['description'] ?></p>
        </div>
        <!-- CTA -->
        <div class="m-2 flex justify-between">
          <h2 class="font-bold">$<?= $product['price'] ?></h2>
          <a role='button' href='#' class="text-white bg-yellow-500 px-3 py-1 rounded-md hover:bg-lightGold">More</a>
        </div>
      </div>
    <?php
    }
    if ($count == 0) {
      echo '<h2 class="font-bold">No data available now !</h2>';
    }
    ?>
  </div>
  <?php
  include 'include/footer.php'
  ?>
</body>

</html>