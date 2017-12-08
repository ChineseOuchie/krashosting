<?php
//Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//PHP code voor de controle van het bestel formulier van een particuliere besteller
$voornaam = $achternaam = $postcode = $plaats = $email = $telefoon = $pakketnaam = $betaalmethode = "";

$msg = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['voornaam'], $_POST['achternaam'], $_POST['postcode'], $_POST['plaats'],
        $_POST['email'], $_POST['telefoon'], $_POST['pakket'], $_POST['betaaling'])){
        if (!empty($_POST['voornaam']) && preg_match('/\w/', $_POST['voornaam']) && !preg_match('/[<]script.*?\/script[>]/', $_POST['voornaam'])){
            $voornaam = mysqli_real_escape_string($base, $_POST['voornaam']);
        }else {
            $msg[] = "U bent vergeten uw voornaam in te vullen<br>";
        }

    }
}

//Naam (volledig)



//Postcode (met een spatie er tussen -> 5045 DM) en plaats

//Email

//Telefoon

//Pakketnaam (id van het pakket)

//Betaal methode (iDeal, Paypal, Credit Card, Auto inkasso) (bevestiging van betaling + klantnummer van 12500 en wachtwoord (random wachtwoord))

//Gegevens kunnen pas aangepast worden na de betaling

