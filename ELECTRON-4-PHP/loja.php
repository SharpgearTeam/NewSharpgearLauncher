<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sharpgear Launcher | Loja </title>
        <link rel="stylesheet" href="style\loja_style.css">
    </head>

    <div id="header"></div>
        <link rel="stylesheet" href="style\style.css">
        <script>
            fetch('header.php')
            .then(res => res.text())
            .then(data => {
            document.getElementById('header').innerHTML = data;
            });
            
        </script>


    <body>
        <div class="frame-main">
            <h1>ORIGINAIS SHARPGEAR</h1>

            <!--Jogo em Destaque-->
            <div class="main-destaque" >
                <img src="src/placeholders/splash_survnlive.png" alt="gamesplashart">
                <div class="destaque-desc">
                    <h1>SURV N  LIVE</h1>
                    <div class="destaque-desc-images">
                        <img src="src/placeholders/snl_gameplay.png" alt="">
                        <img src="src/placeholders/snl_gameplay.png" alt="">
                    </div>
                    <p>
                        Surv N' Live é um jogo indie top down no qual você assume o papel de três jovens de um grupo de hackers que foram “convidados” de maneira curta e gentil a participar de uma série de desafios que valem sua liberdade... ou até mesmo sua vida.
                    </p>
                    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-top: 4%;">
                        <div style="display: flex;">
                            <h1 style="color: greenyellow;">
                                R$20,99
                            </h1>
                            <s>R$30,00</s>

                        </div>
                        
                        <a href="pag_loja_snlv.php">
                            <button>
                                COMPRAR
                            </button>
                        </a>

                        
                    </div>
                </div>
            </div>

            <div class="main-destaque" >
                
                <div class="destaque-desc">
                    <h1>HELL-O WORLD</h1>
                    <div class="destaque-desc-images">
                        <img src="src\h0w screenshots\h0w_print_2.png" alt="">
                        <img src="src\h0w screenshots\h0w_print_3.png" alt="">
                    </div>
                    <p>
                        HELL-O WORLD é um jogo PvP para 2-4 jogadores que utiliza o sistema de Rollback Beta do GMS2. Convide seus amigos (se você tiver algum) para destruí-los nesse jogo de tiro competitivo Top-Down. -Criado por AdriN.
                    </p>
                    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-top: 4%;">
                        <div style="display: flex;">
                            <h1 style="color: greenyellow;">
                                GRATUITO
                            </h1>
                        </div>
                        
                        <a href="pag_loja_h0w.php">
                            <button>
                                COMPRAR
                            </button>
                        </a>
                        
                    </div>
                </div>
                <img src="src\placeholders\HELL-O WORLD GAME COVER.png" alt="gamesplashart">
            </div>

           
        </div>
    </body>

    <div style="margin-top: 400px" id="footer"></div>
    <script>
        fetch('footer.php')
        .then(r => r.text())
        .then(html => {
        document.getElementById('footer').innerHTML = html;
        });
    </script>

</html> 