<?php

session_start(); //apri la sessione corrente
$_SESSION = array(); //puliscila
session_destroy(); //ora distruggila
header("Location: /RegistroElettronicoPHP/index.php?login=quitted"); //reindirizza alla pagina iniziale
exit(); //buonanotte

?>