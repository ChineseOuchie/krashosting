<?php
include_once ('config.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$id = $_SESSION['renewpassword'];
    if (isset($_POST['password'], $_POST['password_sec'])){
        if ($_POST['password_sec'] !== $password){
            $err[] = 'Uw wachtwoord komt niet overeen.';
        }
        $password = $db->real_escape_string($_POST['password']);
        $sql = "UPDATE medewerkers SET wachtwoord ='$password' WHERE idmedewerkers = $id";
        if($db->query($sql)){
        	header('Location: login.php');
		}
        $db->close();
    }
}


?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Wachtwoord aanpassen</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Eerste keer inloggen</h1>
<p>Omdat u voor de eerste keer inlogt bent u verplicht om uw wachtwoord te veranderen.</p>


<form method="post" action="">
    <label for="password1">Uw nieuwe wachtwoord:</label><br>
    <input type="password" name="password" id="password1"><br>
    <label for="password2">Uw nieuwe wachtwoord nogmaals invoeren:</label><br>
    <input type="password" name="password_sec" id="password2"><br>
    <input type="submit" value="Veranderen">
</form>
</body>
</html>
