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

  <section class="text-white items-center w-screen bg-gray-800 flex h-[70vh] justify-center">
    <form
      action="./auths/update_profile.php"
      method="POST"
      enctype="multipart/form-data"
      class="bg-gray-950 flex flex-col h-[80%] w-[20%] rounded-lg shadow-lg shadow-neutral-950"
    >

      <label class="pt-5 self-center place-self-center cursor-pointer">
        <img 
          class="lg:h-[200px] lg:w-[200px] md:w-[100px] md:h-[100px]" 
          src="<?php echo $user['avatar_url']; ?>"
          alt="Escolher imagem"
        >
        <input 
          type="file" 
          class="hidden" 
          name="imagem" 
          accept="image/*"
        >
      </label>

      <script>
        const input = document.querySelector('input[type="file"]');
        const img = document.querySelector('label img');
      
        input.addEventListener('change', (event) => {
          const file = event.target.files[0];
          if (file) {
            img.src = URL.createObjectURL(file);
          }
        });
      </script>
      

        <article class="justify-center items-center py-5 text-2xl text-wrap flex flex-col">
            <textarea name="username" class="bg-gray-900 outline-white outline text-center text-white placeholder-gray-500 rounded-md h-[50%] w-[73%] resize-none overflow-hidden"  maxlength="16"><?php echo $user['username'];?></textarea>
          </article>

        <section class="justify-center items-center flex flex-col row-start-4 row-span-2 bg-gray-900 rounded-b-md  w-full h-full">
          <div class=" w-[92%] h-[82%] text-wrap text-center lg:text-xl md:text-xs flex flex-col items-center justify-center">
            <textarea name="description" class="bg-gray-900 outline-white outline text-center text-white placeholder-gray-500 rounded-md w-[90%] h-[90%]" maxlength="207" placeholder="Escreva qualquer coisa aqui! Sua própria descrição!"
            ><?php echo $user['description'];?></textarea>
          </div>
        </section>
      
        <button type="submit" id="submit" class="bg-green-600 py-2 shadow-lg rounded-b-xl shadow-green-900 w-full">Salvar Alterações</button>
      </form>


  </section>

</body>
</html>