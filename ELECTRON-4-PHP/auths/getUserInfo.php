<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    function formatarAvatarUrl($url) {
        $base = 'http://localhost:8080/';
        
        if (strpos($url, $base) === 0) {
            return $url; // Já começa com o domínio
        }

        // Adiciona o domínio manualmente (removendo possível barra inicial extra)
        return $base . ltrim($url, '/');
    }

    function getUser() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            require_once('sessionupdate.php');
            
            return [
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username'],
                'description' => $_SESSION['description'],
                'avatar_url' => formatarAvatarUrl($_SESSION['avatar_url']),
                'is_admin' => $_SESSION['isAdmin'],
                'role' => $_SESSION['role'],
                'email' => $_SESSION['email']
            ];
        }
        return null;
    }
?>