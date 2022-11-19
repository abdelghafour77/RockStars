<?php
session_start();
include_once 'connection.php';

// var_dump($_SERVER);
// var_dump($_REQUEST);
// die;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_REQUEST['register'])) register();
      if (isset($_REQUEST['signin'])) signIn();
      if (isset($_REQUEST['add'])) addProduct();
      if (isset($_REQUEST['update'])) updateProduct();
      if (isset($_REQUEST['delete'])) deleteProduct();
      if (isset($_REQUEST['update_user'])) updateUser();
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

function register()
{
      extract($_POST);
      global $conn;
      $sql = "SELECT *  FROM users WHERE email = '$email' ";
      $res = mysqli_query($conn, $sql);
      $res = mysqli_fetch_assoc($res);

      if (isset($res["id"])) {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Email are already used";
            header('location: register.php');
            die();
      }
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (first_name, last_name, email, password, created_at)
                values (?,?,?,?,?)";
      $statement = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($statement, 'sssss', $first_name, $last_name, $email, $password, date("Y-m-d H:i:s"));
      $res = mysqli_stmt_execute($statement);

      if ($res) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "Account are created with success";
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Error in creation ! try again later";
      }
      header('location: signin.php');
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
            header('location: signin.php');
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
            header('location: dashboard.php');
            die();
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Password incorrect";
            header('location: signin.php');
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
                              var_dump($re);
                              die();
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

      $sql = "UPDATE `users` SET
            `first_name`=?,
            `last_name`=?,
            `email`=?,
            `phone`=?,
            `updated_at`=?,
            `updated_by`=? 
           WHERE 
           `id`=?";

      $id_update = $_SESSION['id'];
      $time = date("Y-m-d H:i:s");
      $statement = mysqli_prepare($conn, $sql);
      $a = mysqli_stmt_bind_param($statement, 'sssssss', $first_name, $last_name, $email, $phone, $time, $id_update, $id);
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

            $sql = "SELECT *  FROM users WHERE id = '$id_update' ";
            $res = mysqli_query($conn, $sql);
            $res = mysqli_fetch_assoc($res);

            $_SESSION['id'] = $res['id'];
            $_SESSION['first_name'] = $res['first_name'];
            $_SESSION['last_name'] = $res['last_name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['picture'] = $res['picture'];
      }

      header("location: edit.php?id_user=$id");
      die();
}
