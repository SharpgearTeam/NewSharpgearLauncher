<?php
    require_once 'auths/getUserInfo.php';

    $conn = new mysqli("localhost", "root", "", "sharpgear_users");

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    
    $user = getUser();

    if($user == null){
        header("Location: cadastro.php");
        exit;
    }
?>

<!DOCTYPE html>
    <html lang="pt-bt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sharpgear Launcher | Página loja</title>
        <link rel="stylesheet" href="style/loja_pag_style.css">
    </head>
    
    <body>
        <!--HEADER FIXA-->
        <div id="header"></div>
        <script>
            fetch('header.php')
            .then(res => res.text())
            .then(data => {
            document.getElementById('header').innerHTML = data;
            });
        </script>
        
        
        <div class="frame-main">
            <div class="frame-left">
                <h1 style="justify-self: left;">
                    HELL-O WORLD
                </h1>
                <img src="src\h0w screenshots\h0w_print_2.png">

                <div style="display:flex; width: 20%; gap: 8%; justify-self: left; margin-left:8%">
                    <img src="src\h0w screenshots\h0w_print_1.png" alt="">
                    <img src="src\h0w screenshots\h0w_print_0.png" alt="">
                    <img src="src\h0w screenshots\h0w_print_3.png" alt="">
                    <img src="src\h0w screenshots\h0w_print_4.png" alt="">
                </div>
                
                <p style="margin-top: 2%;">
                    HELL-O WORLD é um jogo PvP para 2-4 jogadores que utiliza o sistema de Rollback Beta do GMS2. Convide seus amigos (se você tiver algum) para destruí-los nesse jogo de tiro competitivo Top-Down. -Criado por AdriN.
                </p>
            </div>

            <div class="frame-right">
                <img src="src\placeholders\HELL-O WORLD Color.svg" alt="" style="width: 90%; margin-bottom: 5%; margin-top: 5%;">

                 <form method="POST" action="" style="width: 350px; height: 50px;">
                    <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
                    <button style=" width: 350px; height: 50px;" type="submit" name="add">ADQUIRIR</button>
                </form>

                <?php
                    if (isset($_POST['add']) && isset($_POST['game_id'])) {
                        //$game_id = (int)$_POST['game_id'];
                        $game_id = 3;

                        // primeiro: verificar se já existe
                        $sql_check = "SELECT 1 FROM user_library WHERE user_id = ? AND game_id = ?";
                        $stmt_check = $conn->prepare($sql_check);
                        $stmt_check->bind_param("ii", $user["id"], $game_id);
                        $stmt_check->execute();
                        $stmt_check->store_result();
                    
                        
                        if ($stmt_check->num_rows > 0) {
                            // já tem
                            echo "<p style='color: orange'>Esse jogo já está na sua biblioteca.</p>";
                        } else {
                            // não tem ainda — insere
                            $sql_insert = "INSERT INTO user_library (user_id, game_id) VALUES (?, ?)";
                            $stmt_insert = $conn->prepare($sql_insert);
                            $stmt_insert->bind_param("ii", $user["id"], $game_id);

                            if ($stmt_insert->execute()) {
                                echo "<p style='color: green'>Jogo adicionado à biblioteca!</p>";
                            } else {
                                echo "<p style='color: red'>Erro ao adicionar: {$stmt_insert->error}</p>";
                            }

                            $stmt_insert->close();
                        }

                        $stmt_check->close();
                    }
                ?>

                <p style="font-size: 10px;">
                    Adquire a licença de uso do jogo: HELL-O WORLD desenvolvido pela: Sharpgear Underground.
                    A licença de uso é vitalícia, e você jamais vai perder o acesso ao seu jogo.
                </p>

                <div style="display:flex; justify-content: space-between;">
                    <b style="min-width: max-content;">
                        Desenvolvedor:      <br>
                        Distribuidora:      <br>
                        Data de Lançamento: <br>
                        Plataformas:        <br>
                    </b>
              
                    <p style="min-width:max-content; text-align: right;">
                        Sharpgear Studios       <br>
                        Sharpgear Publishing    <br>
                        69/69/69                <br>
                        Windows, Linux & Mac
                    </p>
                </div>
                
                <img src="src\placeholders\rating.svg" alt="rating 16">
            </div>
            
        </div>
        
    </body>
</html>