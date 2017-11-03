<?php
session_start();

$base = new mysqli('localhost', 'root', 'root', 'krashosting');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['password'], $_POST['password_sec'])){
        $password = mysqli_real_escape_string($base, $_POST['password']);
    }
    if ($_POST['password_sec'] !== $password){
        $err[] = 'Uw wachtwoord komt niet overeen.';

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
