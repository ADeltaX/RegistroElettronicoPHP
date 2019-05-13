<?php

function StampaNavItems($tipoutente)
{
	//APPELLO
	if ($tipoutente == 1) //professore
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/professori/appello.php">
		<i class="material-icons">hearing</i><span>Appello</span></a></li>';

	//VOTI
	if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/comuni/voti.php">
		<i class="material-icons"> accessible_forward</i><span>Voti</span></a></li>';
	else if ($tipoutente == 1) //professore
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/professori/voti.php">
		<i class="material-icons"> accessible_forward</i><span>Inserisci voti</span></a></li>';

	//ASSENZE
	if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/comuni/assenze.php">
		<i class="material-icons">vertical_split</i><span>Assenze</span></a></li>';
	else if ($tipoutente == 1) //professore
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/professori/assenze.php">
		<i class="material-icons">vertical_split</i><span>Gestione assenze</span></a></li>';

	//COMUNICAZIONI - per tutti
	echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/comuni/comunicazioni.php">
	  <i class="material-icons">vertical_split</i><span>Comunicazioni</span></a></li>';
		
	//MATERIE (+ classi per professore)
	if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/comuni/materie.php">
		<i class="material-icons">vertical_split</i><span>Materie</span></a></li>';
	else if ($tipoutente == 1) //professore
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/professori/materieclassi.php">
		<i class="material-icons">vertical_split</i><span>Materie e Classi</span></a></li>';

	//PROFESSORI
	if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/comuni/professori.php">
		<i class="material-icons">vertical_split</i><span>Professori</span></a></li>';

	//ORARIO
	if ($tipoutente == 2 || $tipoutente == 3) //genitore e studente
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/comuni/orario.php">
		<i class="material-icons">vertical_split</i><span>Orario lezioni</span></a></li>';
	else if ($tipoutente == 1) //professore
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/professori/orario.php">
		<i class="material-icons">vertical_split</i><span>Orario</span></a></li>';

	//NOTE e ANNOTAZIONI
	if ($tipoutente == 2) //genitore
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/genitori/note.php">
		<i class="material-icons">vertical_split</i><span>Note disciplinari e annotazioni</span></a></li>';
	else if ($tipoutente == 1) //professore
	  echo '<li class="nav-item"><a class="nav-link" href="/RegistroElettronicoPHP/pages/professori/note.php">
		<i class="material-icons">vertical_split</i><span>Inserisci note</span></a></li>';
}

function StampaFooter()
{
	echo '<ul class="nav"><li class="nav-item"><a class="nav-link" href="">Dashboard</a></li></ul>
		<span class="copyright ml-auto my-auto mr-2">Copyright © '.date("Y").' <a href="https://fakelog.it" rel="nofollow">FAKElog</a></span>';
}

function StampaNotificheEsempio()
{
	echo '<div class="dropdown-menu dropdown-menu-big" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="#">
			  <div class="notification__icon-wrapper">
				<div class="notification__icon">
				  <i class="material-icons">accessible_forward</i>
				</div>
			  </div>
			  <div class="notification__content">
				<span class="notification__category">Voti</span>
				<p>Il tuo professore di matematica ti ha dato 
				  <span class="text-success text-semibold">8</span>. Congratulazioni!</p>
			  </div>
			</a>
			<a class="dropdown-item" href="#">
			  <div class="notification__icon-wrapper">
				<div class="notification__icon">
				  <i class="material-icons">&#xE8D1;</i>
				</div>
			  </div>
			  <div class="notification__content">
				<span class="notification__category">Note e comunicazioni</span>
				<p>Hai una nota 
				  <span class="text-danger text-semibold">disciplinare</span></p>
			  </div>
			</a>
			<a class="dropdown-item notification__all text-center" href="#">Visualizza tutte le notifiche </a>
		  </div>';
}

?>