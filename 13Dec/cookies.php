<?php
session_start();

$_SESSION['username'] = "admin";
$_SESSION['password'] = "admin";

print_r($_SESSION);

$_SESSION['username'] = "user";
$_SESSION['password'] = "user";

session_unset();

session_destroy();

setcookie("username", "user", time() + 3600, "/");

if (isset($_COOKIE['username'])) {
    echo "Cookie is set ";
    echo $_COOKIE['username'];
} else {
    echo "Cookie is not set";
}


setcookie("username", "admin", time() + 3600, "/");
setcookie("username", "", time() - 3600);
?>
