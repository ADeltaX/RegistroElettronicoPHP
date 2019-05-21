<?php

$pathfunctions = $_SERVER['DOCUMENT_ROOT'].'/RegistroElettronicoPHP/functions/';
require($pathfunctions.'func.php');

if (isset($_POST['submit'])) 
{
	$db = Connect();
  
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING); 
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$logintype = filter_var($_POST['logintype'], FILTER_SANITIZE_STRING);

	if (empty($username) || empty($password) || empty($logintype)) 
	{
		header("Location: /RegistroElettronicoPHP/index.php?login=error_empty_field");
		exit();
	}
	else
	{	
		
		switch ($logintype) {
			case 'professore':
				$tipoutente = 1;
				break;
			case 'genitore':
				$tipoutente = 2;
				break;
			case 'studente':
				$tipoutente = 3;
				break;
			default:
				$tipoutente = -1;
				break;
		}

		$result = ValidateUsernamePassword($db, $username, $tipoutente, $password);
		if ($result == false)
		{
			header("Location: /RegistroElettronicoPHP/index.php?login=error");
			exit();
		}
		elseif ($result == true)
		{
			//log in
			session_start();

			$_SESSION['id'] = $username;
			$_SESSION['tipoutente'] = $tipoutente;
			header("Location: /RegistroElettronicoPHP/homepage.php");
			exit();
		}
	}
}
else
{
	header("index.php?login=error");
	exit();
}

?>