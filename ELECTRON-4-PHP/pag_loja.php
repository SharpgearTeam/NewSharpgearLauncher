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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolores libero eaque ipsa dolorem enim non vitae rerum natus amet, eius sequi maxime sunt omnis adipisci perferendis nobis consectetur magnam!
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