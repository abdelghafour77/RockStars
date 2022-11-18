<header class="flex-shrink-0 border-b">
      <div class="flex items-center justify-end p-2">
            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">
                  <!-- avatar button -->
                  <div class="relative">
                        <button id="dropdown" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                              <img class="object-cover w-8 h-8 rounded-full" src="assets/img/users/<?php echo ($_SESSION['picture']) ?  $_SESSION['picture'] :  'avatar.png' ?>" alt="<?= $_SESSION['first_name'] . '_' . $_SESSION['last_name'] ?>" />
                        </button>

                        <!-- Dropdown card -->
                        <div id="dropdown-card" class="z-20 hidden absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max">
                              <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                                    <span class="text-gray-800"><?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></span>
                                    <span class="text-sm text-gray-400"><?= $_SESSION['email'] ?></span>
                              </div>
                              <ul class="flex flex-col p-2 my-2 space-y-1">
                                    <li>
                                          <a href="edit.php" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Edit profil</a>
                                    </li>
                              </ul>
                              <div class="flex items-center justify-center p-4 text-blue-700 border-t">
                                    <a href="logout.php">Logout</a>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</header>