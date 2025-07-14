<?php
require_once "auths/quickAuth.php";
require_once "auths/getUserInfo.php";

$user = getUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SharpgearAPP - Tailwind + DaisyUI + Vite</title>
<link rel="stylesheet" href="style/output.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-black font-poppins bg-gray-800 overflow-x-hidden flex flex-col justify-center items-center min-h-screen">
<div class="navbar text-white flex justify-between items-center">
    <!--HEADER FIXA-->
    <div id="header"></div>
    <script>
    fetch('header.php')
        .then(res => res.text())
        .then(data => {
        document.getElementById('header').innerHTML = data;
        });
    </script>
</div>  

  <section class="text-white items-center flex-row w-screen bg-gray-800 align-items-center flex h-[70vh] justify-center">
    <div class="bg-gray-950 grid-cols-5 grid grid-rows-5 h-[80%] w-[37%] rounded-lg shadow-lg shadow-neutral-950">
        <img class="row-start-1 col-start-1 row-span-3 col-span-2 self-center place-self-center lg:h-[200px] lg:w-[200px] md:w-[100px] md:h-[100px]" src="<?= htmlspecialchars($user["avatar_url"]) ?>">

        <article class="col-start-3 col-span-3 row-start-1 row-span-3 justify-center text-2xl text-wrap flex flex-col">
        <section>
          <?= htmlspecialchars($user["username"]) ?>
        </section>

        <section>
          <?= htmlspecialchars($user["email"]) ?>
        </section>

        <section class="font-semibold text-lg py-2">

          <span class="px-1">
                <span class="bg-green-500 px-2.5 py-0.5 rounded-full">
                  Membro
                </span>
          </span>

          <?php if ($user["role"] == "admin"): ?>
            <span class="px-1">
              <span class="bg-red-600 shadow-lg shadow-red-900 px-2.5 py-0.5 rounded-full">
                Administrador
              </span>
            </span>
          <?php endif; ?>

          <?php if ($user["role"] == "vip"): ?>
            <span class="px-1">
              <span class="bg-yellow-500 shadow-lg shadow-yellow-800 px-2.5 py-0.5 rounded-full">
                VIP
              </span>
            </span>
          <?php endif; ?>

        </section>
         
            <a href="editprofile.php">
              Edit Profile
            </a>

        </article>

        <section class="col-start-1 col-span-5 justify-center items-center flex flex-col row-start-4 row-span-2 bg-gray-900 rounded-b-md  w-full h-full">
          <div class=" w-[92%] h-[82%] text-wrap text-center lg:text-xl md:text-xs flex flex-col items-center justify-center">
            <h1>
            <?= htmlspecialchars($user["description"]) ?>
            </h1>
          </div>
        </section>
    </div>
  </section>
</body>
</html>