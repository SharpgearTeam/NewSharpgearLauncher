<?php
    require_once 'auths/getUserInfo.php';
    $user = getUser();

    if($user == null){
        header("Location: cadastro.php");
        exit;
    }

    $conn = new mysqli("localhost", "root", "", "sharpgear_users");

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // ID do usuário (pode vir da sessão)
    $user_id = $user["id"];

    // prepara a query
    $sql = "SELECT g.nome, g.logo, g.descr
            FROM user_library ul
            JOIN games g ON g.id = ul.game_id
            WHERE ul.user_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // pega todos os jogos em um array
    $jogos = [];
    while ($row = $result->fetch_assoc()) {
        $jogos[] = $row;
    }

    $stmt->close();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sharpgear Launcher | Biblioteca</title>
        <link rel="stylesheet" href="style\style.css">
    </head>

    <!--HEADER FIXA-->
    <div id="header"></div>
    <script>
        fetch('header.php')
        .then(res => res.text())
        .then(data => {
        document.getElementById('header').innerHTML = data;
        });
    </script>
    
     <!--BARRA LATERAL DA BIBLIOTECA-->
    <aside class="sidebar">
        <input type="text" placeholder="🔍︎">

        <ul class="game_list">
            <?php foreach ($jogos as $jogo): ?>
                <li class="game_item"
                    data-id="<?= htmlspecialchars($jogo['id']) ?>"
                    data-nome="<?= htmlspecialchars($jogo['nome']) ?>"
                    data-logo="<?= htmlspecialchars($jogo['logo']) ?>"
                    data-descr="<?= htmlspecialchars($jogo['descr']) ?>"
                >
                    <img src="<?= htmlspecialchars($jogo['logo']) ?>">
                    <span><?= htmlspecialchars($jogo['nome']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <div id="result">nenhum</div>
        
        <script>
            const gameItems = document.querySelectorAll('.game_item');

            gameItems.forEach(item => {
            item.addEventListener('click', () => {
                const nome = item.getAttribute('data-nome');
                const logo = item.getAttribute('data-logo');
                const desc = item.getAttribute('data-descr');

                //ALTERAR AS INFORMAÇÕES DE ACORDO COM O JOGO SELECIONADO.
                document.querySelector('#result').textContent = ' jogo selecionado: ' + nome;
                document.querySelector('#result').textContent = ' jogo selecionado: ' + nome;
                document.querySelector('#desc').textContent = ''+desc;
            });
            });

            document.querySelector('#btn').addEventListener('click', () => {
                document.querySelector('#result').textContent = 'clicado.';
            });
        </script>

    </aside>


    <!--JOGO SELECIONADO-->
    <section class="hero">
        
        <img class="hero-cover" src="src\placeholders\Surv N Live logo - White.png" alt="">

        <div class="hero-top">
            <button>JOGAR</button>
            <p><b>TEMPO DE JOGO</b><br>200 horas</p>

            <p><b>ULTIMA SESSÃO</b><br>20/06</p>
            
            <div style="margin-left: auto; display: flex; gap: 4%;">
                <button style="width: 50px;">⛯</button>
                <button style="width: 50px;">i</button>
            </div>
            
        </div>

        <div class="hero-desc">
            <p style="max-width: 40%;" id="desc">
                Surv N' Live é um jogo indie top down no qual você assume o papel de três jovens de um grupo de hackers que foram “convidados” de maneira curta e gentil a participar de uma série de desafios que valem sua liberdade... ou até mesmo sua vida.
            </p>

            <p style="text-align: right;">
                Desenvolvedora: Sharpgear Studios
                <br>
                Publisher: Shargear Publishing
                <br>
                <b>PÁGINA NA LOJA</b>
            </p>
        </div>
    </section>
</html>

