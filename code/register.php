<?php
session_start();
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
  <title>Register - RockStars</title>
</head>

<body class="font-Poppins">
  <!--  -->
  <div id="background-img">

    <!-- Navbar -->
    <nav class="relative container mx-auto p-4">

      <!-- flex container -->
      <div class="flex items-center justify-between">
        <a href="index.php" class="pt-2">
          <div class="font-RockStars font-semibold text-sm ms:text-xl md:text-xl text-white">
            <span class="text-gold">R</span>ock<span class="text-gold">S</span>tars
          </div>
        </a>
        <div class="flex space-x-3">
          <a href="signup.php" class="block px-3 py-1 p-1 md:p-2 md:px-6 md:py-2 text-gold border border-gold rounded-lg baseline  hover:text-black hover:bg-lightGold hover:border-lightGold">
            Sign Up
          </a>
          <a href="register.php" class="block px-3 py-1 p-1 md:p-2 md:px-6 md:py-2 bg-gold rounded-lg baseline text-white hover:bg-lightGold hover:text-black">
            Register
          </a>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="flex justify-center min-h-full pt-2 ">
      <!-- items-center -->
      <div class="container felx glass-effect md:felx-row items-center mx-auto my-20 mb-40 space-y-0 md:space-y-0 max-h-fit max-w-2xl">
        <h3 class="text-3xl text-center font-bold p-4">Register</h3>
        <form id="form_register" action="scripts.php" method="POST" class=" px-8 pt-6 pb-8 mb-4">
          <div class="mb-4">
            <label class="block text-gray-900 text-sm font-bold mb-2" for="first-name">
              First name
            </label>
            <input name="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="first-name" type="text" placeholder="First name">
          </div>

          <div class="mb-4">
            <label class="block text-gray-900 text-sm font-bold mb-2" for="last-name">
              Last name
            </label>
            <input name="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="last-name" type="text" placeholder="Last name">
          </div>

          <div class="mb-4">
            <label class="block text-gray-900 text-sm font-bold mb-2" for="email">
              Email
            </label>
            <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
          </div>

          <div class="mb-4">
            <label class="block text-gray-900 text-sm font-bold mb-2" for="password">
              Password
            </label>
            <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Password">
          </div>

          <div class="mb-4">
            <label class="block text-gray-900 text-sm font-bold mb-2" for="repeat-password">
              Repeat Password
            </label>
            <input name="repeat_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="repeat-password" type="password" placeholder="Repeat password">
          </div>
          <input type="hidden" name="register">
          <div class="flex items-end justify-end">
            <button class="bg-gold hover:bg-lightGold text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="register">
              Register
            </button>
          </div>
        </form>

      </div>
    </section>
  </div>

  <!-- Foooter -->
  <footer id="" class="bg-gray-900">
    <div class="max-w-screen-xl px-4 py-28 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
      <div class="flex flex-wrap justify-center mx-5 mb-12">
        <div class="font-RockStars font-semibold text-2xl text-white">
          <span class="text-gold">R</span>ock<span class="text-gold">S</span>tars
        </div>
      </div>
      <nav class="flex flex-wrap justify-center -mx-5 -my-2">
        <div class="px-5 py-2">
          <a href="#" class="text-base leading-6 text-white hover:text-gray-500">
            About Us
          </a>
        </div>
        <div class="px-5 py-2">
          <a href="#products" class="text-base leading-6 text-white hover:text-gray-500">
            Products
          </a>
        </div>
        <div class="px-5 py-2">
          <a href="#brands" class="text-base leading-6 text-white hover:text-gray-500">
            Brands
          </a>
        </div>
        <div class="px-5 py-2">
          <a href="#categories" class="text-base leading-6 text-white hover:text-gray-500">
            Categories
          </a>
        </div>
        <div class="px-5 py-2">
          <a href="#" class="text-base leading-6 text-white hover:text-gray-500">
            Contact
          </a>
        </div>
        <div class="px-5 py-2">
          <a href="#" class="text-base leading-6 text-white hover:text-gray-500">
            Terms
          </a>
        </div>
      </nav>
      <div class="flex justify-center mt-8 space-x-6">
        <a href="https://www.facebook.com/abdo.aouad1/" class="text-white hover:text-gray-500">
          <span class="sr-only">Facebook</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
          </svg>
        </a>
        <a href="https://www.instagram.com/abdo_aouad/" class="text-white hover:text-gray-500">
          <span class="sr-only">Instagram</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
          </svg>
        </a>
        <a href="https://github.com/abdelghafour77" class="text-white hover:text-gray-500">
          <span class="sr-only">Twitter</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
            </path>
          </svg>
        </a>
        <a href="https://github.com/abdelghafour77" class="text-white hover:text-gray-500">
          <span class="sr-only">GitHub</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
          </svg>
        </a>
        <a href="https://www.linkedin.com/in/abdelghafour-aouad/" class="text-white hover:text-gray-500">
          <span class="sr-only">Linkedin</span>
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>

    </div>
    <!-- Credit Section -->
    <div class="py-2 bg-transparentBlack">
      <div class="container mx-auto">
        <p class="text-shadow-lg text-xs md:text-base text-center text-white">Made with ❤️ by ABDELGHAFOUR AOUAD 🌪</p>
      </div>
    </div>
  </footer>
  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/sweetalert.js"></script>
  <script>
    <?php if (isset($_SESSION['message'])) { ?>
      const Toast = Swal.mixin({
        width: '25em',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: false,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: '<?= $_SESSION['type_message'] ?>',
        title: '<?= $_SESSION['message'] ?>'
      })
    <?php
      unset($_SESSION['type_message']);
      unset($_SESSION['message']);
    } ?>
  </script>
</body>

</html>