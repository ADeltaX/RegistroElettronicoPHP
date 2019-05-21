<!DOCTYPE html>
<html lang="en">
<head>
    <title>Generatore di Script</title>
</head>
<body>
<form action ="generatoreHash.php" method="post">
<label for = "Password"> Password: </label><br>
<input type="password" name="password" placeholder="Inserire la Password" maxlength="15"> <br> <br>
<input type="submit" value="HASHA !"> </form>


<?php 
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    echo $password;
?>


    
</body>
</html>