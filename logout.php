<?php

ob_start();
session_start();
session_unset();
if (isset($_COOKIE[session_name()])) {
    // Delete the session cookie 
    setcookie(session_name(), '', time() - 7000000, '/');
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach ($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time() - 1000);
        setcookie($name, '', time() - 1000, '/');
    }
}
header('location:user-authentication.php');
?>