<?php

if (isset($_POST['submit'])) 
{
	require('./functions/func.php');
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

		$stmt = $db->prepare('SELECT * FROM utenti WHERE Utente = ? AND TipoUtente = ?');
		$stmt->bind_param('si', $username, $tipoutente); //'s' => string, 'i' => integer --> evita l'SQL injection
		$stmt->execute();
		
		$result = $stmt->get_result();
		$resultCheck = mysqli_num_rows($result);
		
		if ($resultCheck < 1) 
		{
			header("Location: /RegistroElettronicoPHP/index.php?login=error");
			exit();
		}
		else
		{
			if ($row = mysqli_fetch_assoc($result))
			{
				$hashedPwdCheck = password_verify($_POST['password'], $row['Password']);
		 
				if ($hashedPwdCheck == false)
				{
					header("Location: /RegistroElettronicoPHP/index.php?login=error");
					exit();
				}
				elseif ($hashedPwdCheck == true)
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
	}
}
else
{
	header("index.php?login=error");
	exit();
}

?>