<?php

//Vediamo se è già loggato, se sì lo reindirizzamo all'homepage.
session_start();
if (isset($_SESSION['id'])) {
	header("Location: /RegistroElettronicoPHP/homepage.php");
	exit();
}

?>

<!doctype HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width,initial-scale=1" name="viewport">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-deep_purple.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
		<link rel="stylesheet" href="/RegistroElettronicoPHP/fonts/fontello/css/fontello.css" />
		<link rel="stylesheet" href="/RegistroElettronicoPHP/css/offset-right.css">
		<link rel="stylesheet" href="/RegistroElettronicoPHP/css/style.css">
		<title>FAKElog login</title>
	</head>
	<body>
		<div class="container">
			<div class="child">
				<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 no-padding" style="z-index:1; perspective: 1500px;">
					<div id="brandblock" class="item">
						<div style="position: relative;">
							<img id="responsiveimg" alt="logo" src="images/Fakelogo_WB.svg">
						</div>
						<div id="responsivetxt" class="item-content">
							<h3>Registro elettronico</h3>
							<p><i>Gestisci e visualizza il registro elettronico comodamente da casa e da scuola!</i></p>
						</div>
					</div>
				</div>
				<!-- Login -->

				<div class="col-lg-6 col-lg-offset-right-1 col-md-6 col-md-offset-right-1 col-sm-12 col-xs-12 no-padding">
					<div class="mlt-content">
						<ul class="nav nav-tabs">
							<li class="active professore">
								<a href="#loginProfessore" data-toggle="tab">Professore</a>
							</li>
							<li class="genitore">
								<a href="#loginGenitore" data-toggle="tab">Genitore</a>
							</li>
							<li class="studente">
								<a href="#loginStudente" data-toggle="tab">Studente</a>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<?php
								$result = filter_input(INPUT_GET, 'login', FILTER_SANITIZE_URL);

								if ($result=="error") {
									echo '<div class="alert alert-danger alert-dismissible fade in" style="margin-top: -48px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Accesso negato!</strong> Il nome utente e/o la password sono sbagliati.</div>';
								}
								else if ($result=="error_empty_field") {
									echo '<div class="alert alert-warning alert-dismissible fade in" style="margin-top: -48px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Attenzione!</strong> I campi sono vuoti!</div>';
								}
								else if ($result=="quitted") {
									echo '<div class="alert alert-info alert-dismissible fade in" style="margin-top: -48px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Logout effettuato con successo!</strong></div>';
								}
								else if ($result=="expired") {
									echo '<div class="alert alert-warning alert-dismissible fade in" style="margin-top: -48px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Attenzione!</strong> La tua sessione è scaduta. Reinserisci le credenziali per accedere.</div>';
								}
							?>
							<div class="tab-pane fade in active" id="loginProfessore">
								<!--login form for Professore-->
								<form action="login.php" method="POST">
									<input type="hidden" name="logintype" value="professore">  
									<div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text" name="username">
											<label class="mdl-textfield__label" for="emailAddress">Nome utente</label>
										</div>
									</div>

									<div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="password" name="password">
											<label class="mdl-textfield__label" for="password">Password</label>
										</div>
									</div>
								
									<div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
										<button type="submit" name="submit" class="btn lt-login-btn professore">login<i class="icon-right"></i></button>
									</div>
								</form>
							</div>
							<div class="tab-pane fade in" id="loginGenitore">
								<!--login form for Genitore-->
								<form action="login.php" method="POST">
									<input type="hidden" name="logintype" value="genitore"> 
									<div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text" name="username">
											<label class="mdl-textfield__label" for="emailAddress">Nome utente</label>
										</div>
									</div>

									<div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="password" name="password">
											<label class="mdl-textfield__label" for="password">Password</label>
										</div>
									</div>

									<div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
										<button type="submit" name="submit" class="btn lt-login-btn genitore">login<i class="icon-right"></i></button>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="loginStudente">
								<!--login form for Studente-->
								<form action="login.php" method="POST">
									<input type="hidden" name="logintype" value="studente"> 
									<div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="text" name="username">
											<label class="mdl-textfield__label" for="emailAddress">Nome utente</label>
										</div>
									</div>

									<div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="password" name="password">
											<label class="mdl-textfield__label" for="password">Password</label>
										</div>
									</div>

									<div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
										<button type="submit" name="submit" class="btn lt-login-btn studente">login<i class="icon-right"></i></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js" crossorigin="anonymous"></script>
		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js "></script>
		<?php
			if ($result != null)
			{
				//Puliamo l'url dalle querystring
				echo '<script>if(typeof window.history.replaceState == "function") { window.history.replaceState({}, "Hide", "./"); } </script>';
			}
		?>
	</body>
</html>