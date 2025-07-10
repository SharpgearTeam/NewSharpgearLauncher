<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function getUser() {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        require_once('sessionupdate.php');
        
        return [
            'id' => $_SESSION['user_id'],
            'username' => $_SESSION['username'],
            'description' => $_SESSION['description'],
            'avatar_url' => $_SESSION['avatar_url'],
            'is_admin' => $_SESSION['isAdmin'],
        ];
    }
    return null;
}
?>