<?php

function StampaAccentCSS($tipoutente)
{
	switch ($tipoutente) {
		case 1: //professore
			echo '<link rel="stylesheet" href="/RegistroElettronicoPHP/styles/accent_professore.css">';
			break;
		case 2: //genitore
			echo '<link rel="stylesheet" href="/RegistroElettronicoPHP/styles/accent_genitore.css">';
			break;
		case 3: //studente
			echo '<link rel="stylesheet" href="/RegistroElettronicoPHP/styles/accent_studente.css">';
			break;
	}
}

function StampaNavItems($tipoutente, $nomepagina)
{
	echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "homepage" ? "active" : "").'" href="/RegistroElettronicoPHP/homepage.php">
		<i class="material-icons">home</i><span>Dashboard</span></a></li>';

	//APPELLO
	if ($tipoutente == 1) //professore
	  echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "appello" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/professori/appello.php">
		<i class="material-icons">pan_tool</i><span>Appello</span></a></li>';

	//VOTI
	if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
	  echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "voti" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/comuni/voti.php">
		<i class="material-icons">sentiment_very_satisfied</i><span>Voti</span></a></li>';
	else if ($tipoutente == 1) //professore
	  echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "voti" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/professori/voti.php">
		<i class="material-icons">edit</i><span>Inserisci voti</span></a></li>';

	//ASSENZE
	if ($tipoutente == 2) //genitore e studente
	  echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "assenze" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/genitori/assenze.php">
		<i class="material-icons">clear</i><span>Assenze</span></a></li>';
	// else if ($tipoutente == 1) //professore
	//   echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "assenze" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/professori/assenze.php">
	// 	<i class="material-icons">clear</i><span>Gestione assenze</span></a></li>';

	//COMUNICAZIONI - per tutti
	echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "comunicazioni" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/comuni/comunicazioni.php">
	<i class="material-icons">comment</i><span>Comunicazioni</span></a></li>';
		
	//ORARIO
	echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "orario" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/comuni/orario.php">
	<i class="material-icons">access_time</i><span>Orario lezioni</span></a></li>';
		
	//MATERIE e PROFESSORI (+ classi per professore)
	if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
	  echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "materieeprofessori" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/comuni/materieeprofessori.php">
		<i class="material-icons">supervisor_account</i><span>Materie e Professori</span></a></li>';
	// else if ($tipoutente == 1) //professore
	//   echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "materieclassi" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/professori/materieclassi.php">
	// 	<i class="material-icons">book</i><span>Materie e Classi</span></a></li>';

	//NOTE e ANNOTAZIONI
	if ($tipoutente == 2) //genitore
	  echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "note" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/genitori/note.php">
		<i class="material-icons">thumb_down_alt</i><span>Note</span></a></li>';
	else if ($tipoutente == 1) //professore
	  echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "note" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/professori/note.php">
		<i class="material-icons">thumb_down_alt</i><span>Note disciplinari</span></a></li>';

	// //UDIENZE
	// if ($tipoutente == 2) //genitore
	// 	echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "udienze" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/comuni/udienze.php">
	// 	<i class="material-icons">add_alert</i><span>Udienze</span></a></li>';
	// else if ($tipoutente == 1) //professore
	// 	echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "udienze" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/professori/udienze.php">
	// 	<i class="material-icons">add_alert</i><span>Gestione udienze</span></a></li>';

	// //IMPOSTAZIONI
	// if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
	// 	echo '<li class="nav-item"><a class="nav-link '.($nomepagina == "impostazioni" ? "active" : "").'" href="/RegistroElettronicoPHP/pages/comuni/impostazioni.php">
	// 	<i class="material-icons">settings</i><span>Impostazioni</span></a></li>';
}

function StampaCardHomepage($tipoutente)
{
		//Card Appello
		if ($tipoutente == 1) //professore
			echo '<a href="/RegistroElettronicoPHP/pages/professori/appello.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">APPELLO</h5>
								<p class="card-text">Da qui si può accedere nella sezione rigurdante all&rsquo;appello della tua classe.</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';


		//Card Voti
		if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
			echo '<a href="/RegistroElettronicoPHP/pages/comuni/voti.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">VOTI</h5>
								<p class="card-text">Da qui si può accedere nella sezione riguardante i voti che hai ricevuto.</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';
		else if ($tipoutente == 1) //professore
			echo '<a href="/RegistroElettronicoPHP/pages/professori/voti.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">INSERISCI VOTI</h5>
								<p class="card-text">Da qui si può accedere nella sezione riguardante l&rsquo;inserimento dei voti.</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';


		//Card Assenze
		if ($tipoutente == 2) //genitore
			echo '<a href="/RegistroElettronicoPHP/pages/genitori/assenze.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">ASSENZE</h5>
								<p class="card-text">Da qui si può accedere nella sezione riguardante le tue assenze.</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';
		// else if ($tipoutente == 1) //professore
		// 	echo '<a href="/RegistroElettronicoPHP/pages/professori/assenze.php"><div class="card card-item" style="width: 18rem;">
		// 					<div class="card-body">
		// 						<h5 class="card-title">GESTIONE ASSENZE</h5>
		// 						<p class="card-text">Da qui si può accedere nella sezione riguardante l&rsquo;inserimento delle assenze.</p>
		// 						<div class="btn btn-secondary" style="float: right;">Visualizza</div>
		// 					</div>
		// 				</div></a>';


		//Card COMUNICAZIONI
		if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
			echo '<a href="/RegistroElettronicoPHP/pages/comuni/comunicazioni.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">COMUNICAZIONI</h5>
								<p class="card-text">Da qui si può accedere nella sezione riguardante le tue comunicazioni.</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';
		else if ($tipoutente == 1) //professore
			echo '<a href="/RegistroElettronicoPHP/pages/professori/comunicazioni.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">COMUNICAZIONI</h5>
								<p class="card-text">Da qui si può accedere nella sezione riguardante le tue comunicazioni.</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';


		//Card ORARIO
		echo '<a href="/RegistroElettronicoPHP/pages/comuni/orario.php"><div class="card card-item" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">ORARIO</h5>
							<p class="card-text">Da qui si può accedere nella sezione riguardante il tuo orario scolastico.</p>
							<div class="btn btn-secondary" style="float: right;">Visualizza</div>
						</div>
					</div></a>';

		// //Card MATERIE E CLASSI
		// if ($tipoutente == 1) //professore
		// 	echo '<a href="/RegistroElettronicoPHP/pages/professori/materieeclassi.php"><div class="card card-item" style="width: 18rem;">
		// 					<div class="card-body">
		// 						<h5 class="card-title">MATERIE E CLASSI</h5>
		// 						<p class="card-text">Da qui si può accedere nella sezione riguardante le materie e le classi dell&rsquo;istituto.</p>
		// 						<div class="btn btn-secondary" style="float: right;">Visualizza</div>
		// 					</div>
		// 				</div></a>';


		//Card INSERISCI NOTE
		if ($tipoutente == 1) //professore
			echo '<a href="/RegistroElettronicoPHP/pages/professori/notedisciplinari.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">INSERISCI NOTE</h5>
								<p class="card-text">Da qui si può accedere nella sezione riguardante le note disciplinari</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';


		//Card MATERIE E PROFESSORI
		if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
			echo '<a href="/RegistroElettronicoPHP/pages/comuni/materieeprofessori.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">MATERIE E PROFESSORI</h5>
								<p class="card-text">Da qui si può accedere nella sezione riguardante le materie ed i prof della tua classe.</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';


		//Card NOTE
		if ($tipoutente == 2) //genitore
			echo '<a href="/RegistroElettronicoPHP/pages/genitori/note.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">NOTE DISCIPLINARI</h5>
								<p class="card-text">Da qui si può accedere nella sezione riguardante le note disciplinari</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';


		//Card UDIENZE
		if ($tipoutente == 2) //genitore
			echo '<a href="/RegistroElettronicoPHP/pages/comuni/udienze.php"><div class="card card-item" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">UDIENZE</h5>
								<p class="card-text">Da qui si può accedere nella sezione riguardante le prenotazioni delle udienze</p>
								<div class="btn btn-secondary" style="float: right;">Visualizza</div>
							</div>
						</div></a>';


		// //Card IMPOSTAZIONI
		// echo '<a href="/RegistroElettronicoPHP/pages/comuni/impostazioni.php"><div class="card card-item" style="width: 18rem;">
		// 				<div class="card-body">
		// 					<h5 class="card-title">IMPOSTAZIONI</h5>
		// 					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
		// 					<div class="btn btn-secondary" style="float: right;">Visualizza</div>
		// 				</div>
		// 			</div></a>';
}

function StampaFooter()
{
	echo '<ul class="nav"><li class="nav-item"><a class="nav-link" href="">Dashboard</a></li></ul>
		<span class="copyright ml-auto my-auto mr-2">Copyright © '.date("Y").' <a href="https://fakelog.it" rel="nofollow">FAKElog</a></span>';
}

function MostraAlertPasswordErrata()
{
	echo '<div class="alert alert-danger alert-dismissible fade show mb-0" style="font-size: 20px" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true" style="font-size: 32px">×</span>
					</button>
					<div class="mr-4">
						<i class="fa fa-exclamation-triangle mx-2" ></i>
						<strong>Attenzione!</strong> 
						La password è errata! Nessuna modifica è stata apportata al sistema.
					</div>
				</div>';
}

function MostraAlertSuccesso()
{
	echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<div class="mr-4">
						<i class="fa fa-info mx-2" ></i>
						Le modifiche sono state effettuate con successo!
					</div>
				</div>';
}

?>