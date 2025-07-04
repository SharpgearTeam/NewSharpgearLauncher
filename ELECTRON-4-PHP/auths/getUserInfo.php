<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function getUser() {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        return [
            'id' => $_SESSION['user_id'],
            'username' => $_SESSION['username'],
            'description' => $_SESSION['description'],
            'avatar_url' => $_SESSION['avatar_url']
        ];
    }
    return null;
}
?>