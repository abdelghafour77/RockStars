<?php
session_start();
include_once 'connection.php';

if (isset($_POST['register'])) register();
if (isset($_POST['signup'])) signup();

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
      header('location: signup.php');
}

function signup()
{
      extract($_POST);
      global $conn;
      $sql = "SELECT *  FROM users WHERE email = '$email' ";
      $res = mysqli_query($conn, $sql);
      $res = mysqli_fetch_assoc($res);

      if (!isset($res["password"])) {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Email incorrect";
            header('location: signup.php');
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
            header('location: dashboard.php');
            die();
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Password incorrect";
            header('location: signup.php');
            die();
      }
}

function getAllUsers()
{

      global $conn;
      $sql = "SELECT id, first_name, last_name, email, picture  FROM users";
      $res = mysqli_query($conn, $sql);
      return $res;
}
