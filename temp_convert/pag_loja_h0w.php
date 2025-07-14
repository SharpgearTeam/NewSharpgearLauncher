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
            fetch('header.html')
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

                <div style="display: flex; width: 20%; gap: 8%; justify-content: center;">
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

                <button>GRATUITO</button>
                <button>+Lista de Desejos</button>

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