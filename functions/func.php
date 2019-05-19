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



?>