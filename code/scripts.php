<?php
session_start();
include_once 'connection.php';

// var_dump($_SERVER);
// var_dump($_REQUEST);
// die;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_REQUEST['signup'])) signup();
      if (isset($_REQUEST['login'])) signIn();
      if (isset($_REQUEST['add'])) addProduct();
      if (isset($_REQUEST['update'])) updateProduct();
      if (isset($_REQUEST['delete'])) deleteProduct();
      if (isset($_REQUEST['update_user'])) updateUser();
      if (isset($_REQUEST['delete_user'])) deleteUser();
      if (isset($_REQUEST['add_brand'])) addBrand();
      if (isset($_REQUEST['update_brand'])) updateBrand();
      if (isset($_REQUEST['delete_brand'])) deleteBrand();
      if (isset($_REQUEST['add_category'])) addCategory();
      if (isset($_REQUEST['update_category'])) updateCategory();
      if (isset($_REQUEST['delete_category'])) deleteCategory();
}

function getAllBrands()
{
      global $conn;

      $sql = "SELECT * FROM brands";
      $res = mysqli_query($conn, $sql);
      return $res;
}

function getAllCategories()
{
      global $conn;

      $sql = "SELECT * FROM categories";
      $res = mysqli_query($conn, $sql);
      return $res;
}

function signup()
{
      extract($_POST);
      global $conn;
      $sql = "SELECT *  FROM users WHERE email = '$email' ";
      $res = mysqli_query($conn, $sql);
      $res = mysqli_fetch_assoc($res);

      if (isset($res["id"])) {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Email are already used";
            header('location: signup.php');
            die();
      }
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (first_name, last_name, email, password, created_at)
                values (?,?,?,?,?)";
      $statement = mysqli_prepare($conn, $sql);
      $date = date("Y-m-d H:i:s");
      mysqli_stmt_bind_param($statement, 'sssss', $first_name, $last_name, $email, $password, $date);
      $res = mysqli_stmt_execute($statement);

      if ($res) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "Account are created with success";
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Error in creation ! try again later";
      }
      header('location: login.php');
}

function signIn()
{
      extract($_POST);
      global $conn;
      $sql = "SELECT users.* , roles.name as role FROM users inner join roles on roles.id=users.role_id WHERE email = '$email' ";
      $res = mysqli_query($conn, $sql);
      $res = mysqli_fetch_assoc($res);

      if (!isset($res["password"])) {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Email incorrect";
            header('location: login.php');
            die();
      }
      $ress = password_verify($password, $res["password"]);
      if ($ress) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "Welcome to RockStars";
            $_SESSION['id'] = $res['id'];
            $_SESSION['first_name'] = $res['first_name'];
            $_SESSION['last_name'] = $res['last_name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['picture'] = $res['picture'];
            $_SESSION['role'] = $res['role'];
            $_SESSION['role_id'] = $res['role_id'];
            if (isset($remember_me)) {
                  if ($remember_me == 'on') {
                        setcookie('email', $email, time() + 3600 * 24 * 7);
                        setcookie('password', $password, time() + 3600 * 24 * 7);
                  }
            }
            if ($_SESSION['role_id'] == 2)
                  header('location: dashboard.php');
            else
                  header('location: index.php');
            die();
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Password incorrect";
            header('location: login.php');
            die();
      }
}

function getAllUsers()
{

      global $conn;
      $sql = "SELECT users.id, users.first_name, users.last_name, users.email, users.picture , users.phone,
      roles.name as role FROM users inner join roles on roles.id=users.role_id";
      $res = mysqli_query($conn, $sql);
      return $res;
}

function addProduct()
{
      extract($_POST);
      global $conn;
      if ($_FILES['picture']['name'] != "") {
            $fileName = $_FILES['picture']['name'];
            $fileTmpName = $_FILES['picture']['tmp_name'];
            $fileSize = $_FILES['picture']['size'];
            $fileError = $_FILES['picture']['error'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileActualExt, $allowed)) {
                  if ($fileError === 0) {
                        if ($fileSize < 8388608) {  // 8MB
                              $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique Id using time and date and name of 'cours'
                              $fileNameNew = preg_replace('/\s+/', '_', $fileNameNew); //replace all space with "_"
                              $fileDestination = "assets/img/products/" . $fileNameNew;
                              move_uploaded_file($fileTmpName, $fileDestination);

                              $sql = "INSERT INTO 
                              `products`(`model`, `description`, `brands_id`, `categories_id`, `quantity`, `price`, `picture`, `created_at`, `updated_at`, `created_by`, `updated_by`) 
                              VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                              $id = $_SESSION['id'];
                              $time = date("Y-m-d H:i:s");
                              $statement = mysqli_prepare($conn, $sql);
                              mysqli_stmt_bind_param($statement, 'ssiiiisssii', $model, $description, $brand, $category, $quantity, $price, $fileNameNew, $time, $time, $id, $id);

                              $res = mysqli_stmt_execute($statement);

                              if ($res) {
                                    $_SESSION['type_message'] = "success";
                                    $_SESSION['message'] = "Product are created with success";
                              } else {
                                    $_SESSION['type_message'] = "error";
                                    $_SESSION['message'] = "Error in creation ! try again later";
                              }
                        } else {
                              $_SESSION['message'] = "Le fichier est trop grand";
                        }
                  } else {
                        $_SESSION['message'] = "Erreur de téléchargement de fichier";
                  }
            } else {
                  $_SESSION['message'] = "Erreur";
            }
      }
      header('location: products.php');
}
function getAllProducts()
{

      global $conn;
      $sql = "SELECT products.* , categories.name as category ,brands.name as brand FROM products INNER JOIN(brands) on brands.id= products.brands_id INNER JOIN(categories) on categories.id=products.categories_id";
      $res = mysqli_query($conn, $sql);
      return $res;
}
function updateProduct()
{
      extract($_POST);
      global $conn;
      if ($_FILES['picture']['name'] != "") {
            $fileName = $_FILES['picture']['name'];
            $fileTmpName = $_FILES['picture']['tmp_name'];
            $fileSize = $_FILES['picture']['size'];
            $fileError = $_FILES['picture']['error'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileActualExt, $allowed)) {
                  if ($fileError === 0) {
                        if ($fileSize < 8388608) {  // 8MB
                              $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique Id using time and date and name of 'cours'
                              $fileNameNew = preg_replace('/\s+/', '_', $fileNameNew); //replace all space with "_"
                              $fileDestination = "assets/img/products/" . $fileNameNew;
                              move_uploaded_file($fileTmpName, $fileDestination);
                              $sql = "SELECT * from products where id=$id_product";
                              $res = mysqli_query($conn, $sql);
                              $re = mysqli_fetch_row($res);
                              // var_dump($re);
                              // die();
                              unlink('assets/img/products/' . $re[7]);
                              $sql = "UPDATE `products` SET
                               `model`=?,
                               `description`=?,
                               `brands_id`=?,
                               `categories_id`=?,
                               `quantity`=?,
                               `price`=?,
                               `picture`=?,
                               `updated_at`=?,
                               `updated_by`=? 
                              WHERE 
                              `id`=?";

                              $id = $_SESSION['id'];
                              $time = date("Y-m-d H:i:s");
                              $statement = mysqli_prepare($conn, $sql);
                              mysqli_stmt_bind_param($statement, 'ssiiiissii', $model, $description, $brand, $category, $quantity, $price, $fileNameNew, $time, $id, $id_product);

                              $res = mysqli_stmt_execute($statement);

                              if ($res) {
                                    $_SESSION['type_message'] = "success";
                                    $_SESSION['message'] = "Product are updated with success";
                              } else {
                                    $_SESSION['type_message'] = "error";
                                    $_SESSION['message'] = "Error in update ! try again later";
                              }
                        } else {
                              $_SESSION['message'] = "Le fichier est trop grand";
                        }
                  } else {
                        $_SESSION['message'] = "Erreur de téléchargement de fichier";
                  }
            } else {
                  $_SESSION['message'] = "Erreur";
            }
      } else {
            $sql = "UPDATE `products` SET
            `model`=?,
            `description`=?,
            `brands_id`=?,
            `categories_id`=?,
            `quantity`=?,
            `price`=?,
            `updated_at`=?,
            `updated_by`=? 
           WHERE 
           `id`=?";

            $id = $_SESSION['id'];
            $time = date("Y-m-d H:i:s");
            $statement = mysqli_prepare($conn, $sql);
            $a = mysqli_stmt_bind_param($statement, 'ssiiiisii', $model, $description, $brand, $category, $quantity, $price,  $time, $id, $id_product);
            // var_dump($_POST);
            // die();
            $res = mysqli_stmt_execute($statement);
            if ($res) {
                  $_SESSION['type_message'] = "success";
                  $_SESSION['message'] = "product are updated with success";
            } else {
                  $_SESSION['type_message'] = "error";
                  $_SESSION['message'] = "Error in update ! try again later";
            }
      }
      header('location: products.php');
      die();
}
function deleteProduct()
{
      extract($_POST);
      global $conn;
      $sql = "SELECT * from products where id=$id_product";
      $res = mysqli_query($conn, $sql);
      $re = mysqli_fetch_row($res);
      unlink('assets/img/products/' . $re[7]);
      $sql = "DELETE FROM `products`
           WHERE 
           `id`=?";
      $statement = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($statement, 'i', $id_product);

      $res = mysqli_stmt_execute($statement);
      if ($res) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "Account are created with success";
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Error in creation ! try again later";
      }
      header('location: products.php');
      die();
}
function countProducts()
{

      global $conn;
      $sql = "SELECT count(id) FROM products ";
      $res = mysqli_fetch_assoc(mysqli_query($conn, $sql))['count(id)'];

      return $res;
}
function countBrands()
{

      global $conn;
      $sql = "SELECT count(id) FROM brands ";
      $res = mysqli_fetch_assoc(mysqli_query($conn, $sql))['count(id)'];

      return $res;
}
function countCategories()
{

      global $conn;
      $sql = "SELECT count(id) FROM categories ";
      $res = mysqli_fetch_assoc(mysqli_query($conn, $sql))['count(id)'];

      return $res;
}
function countUsers()
{

      global $conn;
      $sql = "SELECT count(id) FROM users ";
      $res = mysqli_fetch_assoc(mysqli_query($conn, $sql))['count(id)'];

      return $res;
}
function getCategory($id)
{

      global $conn;
      $sql = "SELECT * FROM categories where id = $id ";

      $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
      return $res;
}
function getProducts($id)
{

      global $conn;
      $sql = "SELECT products.* , brands.name as brand FROM products  inner join (brands) on products.brands_id=brands.id  where categories_id = $id";

      $res = mysqli_query($conn, $sql);
      return $res;
}
function getUser($id)
{
      global $conn;
      $sql = "SELECT * FROM users where id = $id ";

      $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
      // var_dump($res);
      // die();
      return $res;
}
function updateUser()
{
      extract($_POST);
      global $conn;
      if ($password != '') {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE `users` SET
            `first_name`=?,
            `last_name`=?,
            `email`=?,
            `phone`=?,
            `password`=?,
            `role_id`=?,
            `updated_at`=?,
            `updated_by`=? 
           WHERE 
           `id`=?";

            $id_update = $_SESSION['id'];
            $time = date("Y-m-d H:i:s");
            $statement = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($statement, 'sssssssss', $first_name, $last_name, $email, $phone, $password, $role, $time, $id_update, $id);
      } else {
            $sql = "UPDATE `users` SET
            `first_name`=?,
            `last_name`=?,
            `email`=?,
            `phone`=?,
            `role_id`=?,
            `updated_at`=?,
            `updated_by`=? 
           WHERE 
           `id`=?";

            $id_update = $_SESSION['id'];
            $time = date("Y-m-d H:i:s");
            $statement = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($statement, 'ssssssss', $first_name, $last_name, $email, $phone, $role, $time, $id_update, $id);
      }

      // var_dump($statement);
      // die();
      $res = mysqli_stmt_execute($statement);
      if ($res) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "Account are updated with success";
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Error in update ! try again later";
      }
      if ($id == $id_update) {

            $sql = "SELECT users.* , roles.name as role FROM users inner join roles on roles.id=users.role_id WHERE users.id = '$id_update' ";
            $res = mysqli_query($conn, $sql);
            $res = mysqli_fetch_assoc($res);

            $_SESSION['id'] = $res['id'];
            $_SESSION['first_name'] = $res['first_name'];
            $_SESSION['last_name'] = $res['last_name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['picture'] = $res['picture'];
            $_SESSION['role'] = $res['role'];
            $_SESSION['role_id'] = $res['role_id'];
      }

      header("location: edit.php?id_user=$id");
      die();
}
function deleteUser()
{
      $id_user = $_POST['id'];
      global $conn;
      $sql = "SELECT * from users where id=$id_user";
      $res = mysqli_query($conn, $sql);
      $re = mysqli_fetch_row($res);
      if ($re[10] != '')
            unlink('assets/img/users/' . $re[10]);
      $sql = "DELETE FROM `users`WHERE `id`=?";
      $statement = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($statement, 'i', $id_user);

      $res = mysqli_stmt_execute($statement);
      if ($res) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "User are deleted with success";
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Error in delete ! try again later";
      }
      header('location: users.php');
      die();
}
function addBrand()
{
      extract($_POST);
      global $conn;
      if ($_FILES['picture']['name'] != "") {
            $fileName = $_FILES['picture']['name'];
            $fileTmpName = $_FILES['picture']['tmp_name'];
            $fileSize = $_FILES['picture']['size'];
            $fileError = $_FILES['picture']['error'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileActualExt, $allowed)) {
                  if ($fileError === 0) {
                        if ($fileSize < 8388608) {  // 8MB
                              $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique Id using time and date and name of 'cours'
                              $fileNameNew = preg_replace('/\s+/', '_', $fileNameNew); //replace all space with "_"
                              $fileDestination = "assets/img/brands/" . $fileNameNew;
                              move_uploaded_file($fileTmpName, $fileDestination);

                              $sql = "INSERT INTO 
                              `brands`(`name`, `description`, `picture`) 
                              VALUES (?,?,?)";

                              $statement = mysqli_prepare($conn, $sql);
                              mysqli_stmt_bind_param($statement, 'sss', $name, $description, $fileNameNew);

                              $res = mysqli_stmt_execute($statement);

                              if ($res) {
                                    $_SESSION['type_message'] = "success";
                                    $_SESSION['message'] = "Brand are created with success";
                              } else {
                                    $_SESSION['type_message'] = "error";
                                    $_SESSION['message'] = "Error in creation ! try again later";
                              }
                        } else {
                              $_SESSION['message'] = "Le fichier est trop grand";
                        }
                  } else {
                        $_SESSION['message'] = "Erreur de téléchargement de fichier";
                  }
            } else {
                  $_SESSION['message'] = "Erreur";
            }
      }
      header('location: brands.php');
}
function updateBrand()
{
      extract($_POST);
      global $conn;
      if ($_FILES['picture']['name'] != "") {
            $fileName = $_FILES['picture']['name'];
            $fileTmpName = $_FILES['picture']['tmp_name'];
            $fileSize = $_FILES['picture']['size'];
            $fileError = $_FILES['picture']['error'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileActualExt, $allowed)) {
                  if ($fileError === 0) {
                        if ($fileSize < 8388608) {  // 8MB
                              $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique Id using time and date and name of 'cours'
                              $fileNameNew = preg_replace('/\s+/', '_', $fileNameNew); //replace all space with "_"
                              $fileDestination = "assets/img/brands/" . $fileNameNew;
                              move_uploaded_file($fileTmpName, $fileDestination);
                              $sql = "SELECT * from brands where id=$id_brand";
                              $res = mysqli_query($conn, $sql);
                              $re = mysqli_fetch_row($res);
                              // var_dump($re);
                              // die();
                              unlink('assets/img/brands/' . $re[3]); //khassni ntesti
                              $sql = "UPDATE `brands` SET
                               `name`=?,
                               `description`=?,
                               `picture`=?
                              WHERE 
                              `id`=?";

                              $statement = mysqli_prepare($conn, $sql);
                              mysqli_stmt_bind_param($statement, 'ssss', $name, $description, $fileNameNew, $id_brand);

                              $res = mysqli_stmt_execute($statement);

                              if ($res) {
                                    $_SESSION['type_message'] = "success";
                                    $_SESSION['message'] = "Brand are updated with success";
                              } else {
                                    $_SESSION['type_message'] = "error";
                                    $_SESSION['message'] = "Error in update ! try again later";
                              }
                        } else {
                              $_SESSION['message'] = "Le fichier est trop grand";
                        }
                  } else {
                        $_SESSION['message'] = "Erreur de téléchargement de fichier";
                  }
            } else {
                  $_SESSION['message'] = "Erreur";
            }
      } else {
            $sql = "UPDATE `brands` SET
            `name`=?,
            `description`=? 
           WHERE 
           `id`=?";
            $statement = mysqli_prepare($conn, $sql);
            $a = mysqli_stmt_bind_param($statement, 'sss', $name, $description, $id_brand);
            // var_dump($_POST);
            // die();
            $res = mysqli_stmt_execute($statement);
            if ($res) {
                  $_SESSION['type_message'] = "success";
                  $_SESSION['message'] = "brand are updated with success";
            } else {
                  $_SESSION['type_message'] = "error";
                  $_SESSION['message'] = "Error in update ! try again later";
            }
      }
      header('location: brands.php');
      die();
}
function deleteBrand()
{
      extract($_POST);
      global $conn;
      $sql = "SELECT * from brands where id=$id_brand";
      $res = mysqli_query($conn, $sql);
      $re = mysqli_fetch_row($res);
      unlink('assets/img/brands/' . $re[3]);
      $sql = "DELETE FROM `brands`
           WHERE 
           `id`=?";
      $statement = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($statement, 'i', $id_brand);

      $res = mysqli_stmt_execute($statement);
      if ($res) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "Brand are created with success";
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Error in delete ! try again later";
      }
      header('location: brands.php');
      die();
}
function addCategory()
{
      extract($_POST);
      global $conn;
      if ($_FILES['picture']['name'] != "") {
            $fileName = $_FILES['picture']['name'];
            $fileTmpName = $_FILES['picture']['tmp_name'];
            $fileSize = $_FILES['picture']['size'];
            $fileError = $_FILES['picture']['error'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileActualExt, $allowed)) {
                  if ($fileError === 0) {
                        if ($fileSize < 8388608) {  // 8MB
                              $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique Id using time and date and name of 'cours'
                              $fileNameNew = preg_replace('/\s+/', '_', $fileNameNew); //replace all space with "_"
                              $fileDestination = "assets/img/categories/" . $fileNameNew;
                              move_uploaded_file($fileTmpName, $fileDestination);

                              $sql = "INSERT INTO 
                              `categories`(`name`, `description`, `picture`) 
                              VALUES (?,?,?)";

                              $statement = mysqli_prepare($conn, $sql);
                              mysqli_stmt_bind_param($statement, 'sss', $name, $description, $fileNameNew);

                              $res = mysqli_stmt_execute($statement);

                              if ($res) {
                                    $_SESSION['type_message'] = "success";
                                    $_SESSION['message'] = "Category are created with success";
                              } else {
                                    $_SESSION['type_message'] = "error";
                                    $_SESSION['message'] = "Error in creation ! try again later";
                              }
                        } else {
                              $_SESSION['message'] = "Le fichier est trop grand";
                        }
                  } else {
                        $_SESSION['message'] = "Erreur de téléchargement de fichier";
                  }
            } else {
                  $_SESSION['message'] = "Erreur";
            }
      }
      header('location: categories.php');
}
function updateCategory()
{
      extract($_POST);
      global $conn;
      if ($_FILES['picture']['name'] != "") {
            $fileName = $_FILES['picture']['name'];
            $fileTmpName = $_FILES['picture']['tmp_name'];
            $fileSize = $_FILES['picture']['size'];
            $fileError = $_FILES['picture']['error'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileActualExt, $allowed)) {
                  if ($fileError === 0) {
                        if ($fileSize < 8388608) {  // 8MB
                              $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique Id using time and date and name of 'cours'
                              $fileNameNew = preg_replace('/\s+/', '_', $fileNameNew); //replace all space with "_"
                              $fileDestination = "assets/img/categories/" . $fileNameNew;
                              move_uploaded_file($fileTmpName, $fileDestination);
                              $sql = "SELECT * from categories where id=$id_category";
                              $res = mysqli_query($conn, $sql);
                              $re = mysqli_fetch_row($res);
                              unlink('assets/img/categories/' . $re[3]);
                              $sql = "UPDATE `categories` SET
                               `name`=?,
                               `description`=?,
                               `picture`=?
                              WHERE 
                              `id`=?";

                              $statement = mysqli_prepare($conn, $sql);
                              mysqli_stmt_bind_param($statement, 'ssss', $name, $description, $fileNameNew, $id_category);

                              $res = mysqli_stmt_execute($statement);

                              if ($res) {
                                    $_SESSION['type_message'] = "success";
                                    $_SESSION['message'] = "Category are updated with success";
                              } else {
                                    $_SESSION['type_message'] = "error";
                                    $_SESSION['message'] = "Error in update ! try again later";
                              }
                        } else {
                              $_SESSION['message'] = "Le fichier est trop grand";
                        }
                  } else {
                        $_SESSION['message'] = "Erreur de téléchargement de fichier";
                  }
            } else {
                  $_SESSION['message'] = "Erreur";
            }
      } else {
            $sql = "UPDATE `categories` SET
            `name`=?,
            `description`=? 
           WHERE 
           `id`=?";
            $statement = mysqli_prepare($conn, $sql);
            $a = mysqli_stmt_bind_param($statement, 'sss', $name, $description, $id_category);
            // var_dump($_POST);
            // die();
            $res = mysqli_stmt_execute($statement);
            if ($res) {
                  $_SESSION['type_message'] = "success";
                  $_SESSION['message'] = "Category are updated with success";
            } else {
                  $_SESSION['type_message'] = "error";
                  $_SESSION['message'] = "Error in update ! try again later";
            }
      }
      header('location: categories.php');
      die();
}
function deleteCategory()
{
      extract($_POST);
      global $conn;
      $sql = "SELECT * from categories where id=$id_category";
      $res = mysqli_query($conn, $sql);
      $re = mysqli_fetch_row($res);
      unlink('assets/img/categories/' . $re[3]);
      $sql = "DELETE FROM `categories`
           WHERE 
           `id`=?";
      $statement = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($statement, 'i', $id_category);

      $res = mysqli_stmt_execute($statement);
      if ($res) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "Category are deleted with success";
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Error in delete ! try again later";
      }
      header('location: categories.php');
      die();
}
function getRoles()
{
      global $conn;
      $sql = "SELECT * FROM roles";

      $res = mysqli_query($conn, $sql);
      return $res;
}
