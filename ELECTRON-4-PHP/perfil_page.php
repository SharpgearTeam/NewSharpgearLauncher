<?php
require_once "src/php/auths/quickAuth.php";
require_once "src/php/auths/getUserInfo.php";
require_once "src/php/getUserById.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
 
  header("Location: ./index.php");
  exit();
}

$userId = intval($_GET['id']);

$user = getUser();

$userTarget = getUserById($userId);

if (!$userTarget) {
  echo "Usuário não encontrado.";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SharpgearAPP - Tailwind </title>
<link rel="stylesheet" href="../src/output.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body class="bg-black font-poppins overflow-x-hidden flex flex-col items-start min-h-screen">
<div class="navbar bg-black h-24 text-white flex justify-between items-center px-6">
    <a class="btn btn-ghost">
    <img class="h-14 -mt-1" src="public/sharpgear-files/Sharpgear Branding/Gearpunk.png">
    </a>

    <!--HEADER FIXA-->
    <div id="header"></div>
    <script>
    fetch('header.php')
        .then(res => res.text())
        .then(data => {
        document.getElementById('header').innerHTML = data;
        });
    </script>

    <span>
      <?php if ($user): ?>
        <a href="profilepage.php?id=<?= urlencode($user["id"]) ?>" class="link link-hover btn btn-ghost text-xl">
          <?= htmlspecialchars($user["username"])?>
        </a>
        <?php else: ?>
          <a href="cadastro.php" class="link link-hover btn btn-ghost text-xl">
            Registrar
          </a>
      <?php endif; ?>
    </span>
  </div>  

  <section class="text-white items-center w-screen flex h-[70vh] justify-center">
    <div   style="background-color: rgb(33, 33, 33);" class="bg-gray-950 grid-cols-5 grid grid-rows-5 h-[80%] w-[37%] rounded-lg shadow-lg shadow-neutral-950">
        <img class="row-start-1 col-start-1 row-span-3 col-span-2 self-center place-self-center lg:h-[200px] lg:w-[200px] md:w-[100px] md:h-[100px]" src="<?= htmlspecialchars($userTarget["avatar_url"]) ?>">

        <article class="col-start-3 col-span-3 row-start-1 row-span-3 justify-center text-2xl text-wrap flex flex-col">
        <section>
        <?= htmlspecialchars($userTarget["username"]) ?>
        </section>

        <section>
        <?= htmlspecialchars($userTarget["email"]) ?>
        </section>

        <section class="font-semibold text-lg py-2">

        <span class="px-1">
                <span class="bg-green-500 px-2.5 py-0.5 rounded-full">
                Membro
                </span>
        </span>

        <?php if ($userTarget["role"] === "admin"): ?>
            <span class="px-1">
            <span class="bg-red-600 shadow-lg shadow-red-900 px-2.5 py-0.5 rounded-full">
                Administrador
            </span>
            </span>
        <?php endif; ?>

        <?php if ($userTarget["role"] === "vip"): ?>
            <span class="px-1">
            <span class="bg-yellow-500 shadow-lg shadow-yellow-800 px-2.5 py-0.5 rounded-full">
                VIP
            </span>
            </span>
        <?php endif; ?>
            

        </section>
        <?php if ($userTarget["id"] === $user["id"]): ?>
            <a href="editprofile.php">
            Edit Profile
            </a>
        <?php endif; ?>
        </article>

        <section class="col-start-1 col-span-5 justify-center items-center flex flex-col row-start-4 row-span-2 bg-gray-300 rounded-b-md  w-full h-full">
        <div class=" w-[92%] h-[82%] text-wrap text-center lg:text-xl md:text-xs flex flex-col items-center justify-center">
            <h1>
            <?= htmlspecialchars($userTarget["description"]) ?>
            </h1>
        </div>
        </section>




</body>
</html>