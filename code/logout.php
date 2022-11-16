<?php
session_start();
session_destroy();
var_dump($_SESSION);
// die();
header('location: index.php');
