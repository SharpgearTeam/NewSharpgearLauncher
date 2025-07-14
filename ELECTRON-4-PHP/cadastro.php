<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="./style/cadastro.css">
	
</head>
<body>

<!--HEADER-->
<div id="header"></div>
<script>
	fetch('header.php')
	.then(res => res.text())
	.then(data => {
	document.getElementById('header').innerHTML = data;
	});
</script>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="database\userRegister.php" method="POST"">
			<h1>Crie sua conta </h1>
			<input type="text" placeholder="Username" name="Username" />
            <input type="date" placeholder=date" name="dt_birth"/>
			<input type="email" placeholder="Email" name="us_email" />
			<input type="password" placeholder="Password" name="us_password"/>
        
			<button>Registrar</button>
		</form>
	</div>

	<div class="form-container sign-in-container">
		<form action="database\userLogin.php" method="POST">
			<h1>ENTRAR</h1>
			<input type="email" placeholder="Email" name="us_email" />
			<input type="password" placeholder="Password" name="us_password"/>
			<button>ENTRE</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bem vindo de volta!</h1>
				<p>Para se manter conectado conosco , por favor insira seus dados pessoais </p>
				<button class="ghost" id="signIn">ENTRE</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>FALA, BROTHER!</h1>
				<p>Entre com seus dados pessoais e comece sua jornada conosco!</p>
				<button class="ghost" id="signUp">registre-se</button>
			</div>
		</div>
	</div>
</div>

<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>
    
</body>
</html>