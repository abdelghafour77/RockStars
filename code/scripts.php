<?php
session_start();
include_once 'connection.php';

if (isset($_POST['register'])) register();
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
      $sql = "INSERT INTO users (first_name, last_name, email, password, created_at)
                values (?,?,?,?,?)";
      $statement = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($statement, 'ssss', $first_name, $last_name, $email, $password, date("Y-m-d H:i:s"));
      $res = mysqli_stmt_execute($statement);

      if ($res) {
            $_SESSION['type_message'] = "success";
            $_SESSION['message'] = "Task has been added successfully !";
      } else {
            $_SESSION['type_message'] = "error";
            $_SESSION['message'] = "Error in insert to database !";
      }

      header('location: index.php');
}
