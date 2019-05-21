<?php

function Connect()
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "db_scuola";
    $db = mysqli_connect($host, $user, $pass, $database);
    return $db;
}

function GetNomeCognome($db, $utente)
{
    $stmt = $db->prepare('SELECT * FROM gestutenti WHERE Utente = ?');
    $stmt->bind_param('s', $utente); //'s' => string
    $stmt->execute();

    $result = $stmt->get_result();
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0)
    {
        if ($row = mysqli_fetch_assoc($result))
            return array($row['Nome'], $row['Cognome']);
    }
    else
        return null;
}

function GetDatiUtente($db, $utente)
{
    $stmt = $db->prepare('SELECT * FROM gestutenti WHERE Utente = ?');
    $stmt->bind_param('s', $utente); //'s' => string
    $stmt->execute();

    $result = $stmt->get_result();
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0)
    {
        if ($row = mysqli_fetch_assoc($result))
            return array($row['Nome'], $row['Cognome'], $row['Email'], 
                            $row['DataDiNascita'], $row['CodiceFiscale'], $row['Residenza'], 
                            $row['Cellulare'], $row['PercorsoFoto']);
    }
    else
        return null;
}

function GetPercorsoFoto($db, $utente)
{
    $stmt = $db->prepare('SELECT * FROM gestutenti WHERE Utente = ?');
    $stmt->bind_param('s', $utente); //'s' => string
    $stmt->execute();

    $result = $stmt->get_result();
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0)
    {
        if ($row = mysqli_fetch_assoc($result))
		{
			if ($row['PercorsoFoto'] != null)
			{
				echo "/RegistroElettronicoPHP/storage/photos/".$row['PercorsoFoto'];
				return;
			}
		}
    }
	
	echo "/RegistroElettronicoPHP/images/avatars/default.png";
}

function ValidateUsernamePassword($db, $username, $tipoutente, $password)
{
    $stmt = $db->prepare('SELECT * FROM utenti WHERE Utente = ? AND TipoUtente = ?');
    $stmt->bind_param('si', $username, $tipoutente); //'s' => string, 'i' => integer --> evita l'SQL injection
    $stmt->execute();
    
    $result = $stmt->get_result();
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck < 1) 
    {
        return false;
    }
    else
    {
        if ($row = mysqli_fetch_assoc($result))
        {
            $hashedPwdCheck = password_verify($_POST['password'], $row['Password']);
            return $hashedPwdCheck;
        }
    }
}

function ValidatePasswordProfessore($db, $idprofessore, $password)
{
    if (empty($password))
        return false;


    $stmt = $db->prepare('SELECT professori.Utente, password FROM utenti, professori
    WHERE professori.IdProfessore = ? AND professori.Utente = utenti.Utente');
    $stmt->bind_param('s', $idprofessore);
    $stmt->execute();

    $result = $stmt->get_result();
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) 
    {
        return false;
    }
    else
    {
        if ($row = mysqli_fetch_assoc($result))
        {
            $hashedPwdCheck = password_verify($password, $row['password']);
            return $hashedPwdCheck;
        }
    }
}

?>