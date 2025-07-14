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

<link rel="stylesheet" href="style\style.css">
<header class="header">
    <div class="header_left">
        <img src="src\Sharpgear Logo.svg" alt="" width="40">

        <?php if ($user != null):?>
            <a href="index.php">BIBLIOTECA</a>
            <a href="loja.php">LOJA</a>
        <?php endif;?>


    </div>

    <div class="header_right">
        <a href="<?= $loggedIn ? 'perfil_page.php' : 'cadastro.php' ?>">
            <?= $loggedIn ? strtoupper($user['username']) : 'LOGIN'?>
        </a>
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