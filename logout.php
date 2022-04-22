<?php 
session_start();

session_unset();
session_destroy();

if (isset($_COOKIE["USERINFO"])) {
    unset($_COOKIE["USERINFO"]);
    setcookie("USERINFO", '', time() - 60 * 60 * 24 * 30, '/');
}
header("Location: login.php");