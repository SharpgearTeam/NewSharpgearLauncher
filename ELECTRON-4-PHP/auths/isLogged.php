<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}
?>