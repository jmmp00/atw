<?php 
session_start();

session_unset();
session_destroy();

if (isset($_COOKIE["USERINFO"])) {
    setcookie("USERINFO", "", time()-3600);
    unset($_COOKIE["USERINFO"]);
}
header("Location: login.php");