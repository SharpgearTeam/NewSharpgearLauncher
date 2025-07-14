<?php
require_once "auths/getUserInfo.php";
$user = getUser();

$avatarUrl = null;
$loggedIn = false;
if ($user !== null) {
    $loggedIn = true;
    $avatarUrl = $user['avatar_url'];
} else {
    $avatarUrl = "src\placeholders\ph_userimage.svg";
}

?>
<header class="header">
    <link rel="stylesheet" href="style\style.css">
    <div class="header_left">
        <img src="src\Sharpgear Logo.svg" alt="" width="40">
        <a href="index.php">BIBLIOTECA</a>
        <a href="loja.php">LOJA</a>
    </div>

    <div class="header_right">
        <a href="insert_games.php">ADMIN</a>
        <a href="perfil_page.php">PERFIL</a>
        <a href="<?= $loggedIn ? 'perfil_page.php' : 'cadastro.php' ?>">
            <img src="<?= htmlspecialchars($avatarUrl)?>" width="40" style="border-radius: 5px;">
        </a>
    </div>
</header>

<!--
    <div id="header"></div>
    <script>
    fetch('header.html')
        .then(res => res.text())
        .then(data => {
        document.getElementById('header').innerHTML = data;
        });
    </script>
-->