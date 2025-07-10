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
                    SURV N LIVE
                </h1>
                <img src="src\placeholders\snl_gameplay.png">

                <div style="display: flex; width: 20%; gap: 8%; justify-content: center;">
                    <img src="src\placeholders\snl_gameplay.png" alt="">
                    <img src="src\placeholders\snl_gameplay.png" alt="">
                    <img src="src\placeholders\snl_gameplay.png" alt="">
                    <img src="src\placeholders\snl_gameplay.png" alt="">
                </div>
                
                <p style="margin-top: 2%;">
                    Surv N' Live é um jogo indie top down no qual você assume o papel de três jovens de um grupo de hackers que foram “convidados” de maneira curta e gentil a participar de uma série de desafios que valem sua liberdade... ou até mesmo sua vida.
                </p>
            </div>

            <div class="frame-right">
                <img src="src/placeholders/Surv N Live logo - White.png" alt="" style="width: 90%; margin-bottom: 5%; margin-top: 5%;">

                <button>COMPRAR R$20</button>
                <button>+Lista de Desejos</button>

                <p style="font-size: 10px;">
                    Adquire a licença de uso do jogo: Surv N Live desenvolvido pela: Sharpgear Underground.
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