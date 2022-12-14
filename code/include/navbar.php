<nav class="relative container mx-auto p-4">
      <!-- flex container -->
      <div class="flex items-center justify-between">
            <a href="index.php" class="pt-2">
                  <div class="font-RockStars font-semibold text-sm ms:text-xl md:text-xl text-white"><span class="text-gold">R</span>ock<span class="text-gold">S</span>tars</div>
            </a>
            <div class="flex space-x-3">
                  <?php
                  if (isset($_SESSION['id'])) { ?>
                        <div class="relative">
                              <div id="dropdown" class="flex items-center cursor-pointer">
                                    <div class="text-white mr-4 sm:block hidden"><?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></div>
                                    <button class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                                          <img class="object-cover w-8 h-8 rounded-full" src="assets/img/users/<?= ($_SESSION['picture']) ?  $_SESSION['picture'] :  'avatar.png' ?>" alt="<?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?>" />
                                    </button>
                              </div>
                              <!-- Dropdown card -->
                              <div id="dropdown-card" style="right: -200px;" class="z-20 hidden absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max">
                                    <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                                          <span class="text-gray-800"><?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></span>
                                          <span class="text-sm text-gray-400"><?= $_SESSION['email'] ?></span>
                                    </div>
                                    <ul class="flex flex-col p-2 my-2 space-y-1">
                                          <li>
                                                <a href="dashboard.php" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Dashboard</a>
                                          </li>
                                          <li>
                                                <a href="edit.php" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Edit profil</a>
                                          </li>
                                    </ul>
                                    <div class="flex items-center justify-center p-4 text-blue-700 border-t">
                                          <a href="logout.php">Logout</a>
                                    </div>
                              </div>
                        </div>
                  <?php
                  } else {
                  ?>
                        <a href="login.php" class="block px-3 py-1 p-1 md:p-2 md:px-6 md:py-2 text-gold border border-gold rounded-lg baseline hover:text-black hover:bg-lightGold hover:border-lightGold"> Log in </a>
                        <a href="signup.php" class="block px-3 py-1 p-1 md:p-2 md:px-6 md:py-2 bg-gold rounded-lg baseline text-white hover:bg-lightGold hover:text-black"> Sign up </a>
                  <?php
                  }
                  ?>
            </div>
      </div>
</nav>