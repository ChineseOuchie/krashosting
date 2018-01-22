<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (isset($_SESSION['type'])) {
    include('config.php');
    $firstname = $lastname = $telephone = $email =	 "";
    $msg = [];
    $date = date("d-m-Y");

    if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['telephone'], $_POST['email'])) {
            if (!empty($_POST['firstname']) && preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u", $_POST['firstname'])) {
                $firstname = $db->real_escape_string($_POST['firstname']);
            } else {
                $msg[] = "U bent vergeten uw voornaam in te vullen.";
            }
            $tv = $db->real_escape_string($_POST['tv']);
            $pakket = $db->real_escape_string($_POST['pakket']);
            if (!empty($_POST['lastname']) && preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u", $_POST['lastname'])) {
                $lastname = $db->real_escape_string($_POST['lastname']);
            } else {
                $msg[] = "U bent vergeten uw achternaam in te vullen.";
            }
            if (!empty($_POST['telephone']) && preg_match("/[0-9]{10}/", $_POST['telephone'])) {
                $telephone = $db->real_escape_string($_POST['telephone']);
            } else {
                $msg[] = "U heeft een onjuist telefoonnummer ingevuld of u bent vergeten het telefoonnummer in te vullen.";
            }
            if (!empty($_POST['email'])) {
                $postemail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $email = $db->real_escape_string($postemail);
            } else {
                $msg[] = "U bent vergeten uw email in te vullen.";
            }
        } else {
            $msg[] = "Er is iets fout gegaan tijdens het versturen. Neem contact op met systeembeheer van Krashosting.";
        }
        $sql = "INSERT INTO klanten (voornaam, tussenvoegsel, achternaam, email, telefoonnummer, aankoopdatum, betaald, datumbetaald, idproducten) VALUES ('$firstname', '$tv', '$lastname', '$email', '$telephone', '$date', 'false', 'N.v.t.', $pakket)";
        if(empty($msg)){
        	if ($db->query($sql)){
        		header('Location: changeklant.php');
        	}
		}
    }
} else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Kras Hosting - Klantgegevens aanmaken</title>
    <meta charset="UTF-8">
    <style>

    </style>
</head>
<body>
<h1>Welkom bij de Krashosting Klanttoevoegen Panel</h1>
<p>Op deze pagina kunt u klantgegevens aanmaken.</p>

<form method="post">
    <label for="firstname">Voornaam:</label><br>
    <input id="firstname" type="text" name="firstname"><br>
    <label for="tv">Tussenvoegsel:</label><br>
    <input id="tv" type="text" name="tv"><br>
    <label for="lastname">Achternaam:</label><br>
    <input id="lastname" type="text" name="lastname"><br>
    <label for="email">Uw email:</label><br>
    <input id="email" type="email" name="email"><br>
    <label for="telephone">Telefoonnummer:</label><br>
    <input id="telephone" type="tel" name="telephone"><br>
	<label for="pakket">Pakket:</label><br>
	<select id="pakket" name="pakket">
		<option value="1">Starter</option>
		<option value="2">Basic</option>
		<option value="3">Advanced</option>
		<option value="4">Custom</option>
	</select><br>
    <input type="submit">
</form>

<?php
foreach ($msg as $value) {
    echo $value . "<br>";
}
?>
<a href="welcome.php">Terug</a>
</body>
</html>
