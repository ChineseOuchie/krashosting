<?php
session_start();
if (isset($_SESSION['type'])) {
    $id = '';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("config.php");

    if (isset($_POST) && $_SERVER["REQUEST_METHOD"] === "POST"){

        $id = $_GET['id'];
        $voornaam = $_POST['voornaam'];
        $tv = $_POST['tv'];
        $achternaam = $_POST['achternaam'];
        $email = $_POST['email'];
        $telefoon = $_POST['telefoon'];
        $pakket = $_POST['pakket'];
        (isset($_POST['betaald']) ? $betaald = 'true' : $betaald = 'false');
        ($betaald === 'true' ? $betaaldatum = date('d-m-Y') : $betaaldatum = 'N.v.t.');

        $array = array('voornaam' => $voornaam, 'tv' => $tv, 'achternaam' => $achternaam, 'email' => $email, 'telefoon' => $telefoon, 'pakket' => $pakket, 'betaald' => $betaald, 'betaaldatum' => $betaaldatum);

        if(isset($voornaam, $tv, $achternaam, $email, $telefoon, $pakket, $betaald, $betaaldatum)){
            if(!empty($voornaam) || !empty($achternaam) || !empty($email) || !empty($telefoon) || !empty($pakket) || !empty($betaald) || !empty($betaaldatum)) {

                foreach ($array as $k => $v){
                    $$k = $db->real_escape_string($v);
                    if (preg_match('/script/', $v)){
                        $v = '';
                    }
                }
                $sql = "UPDATE klanten SET voornaam = '$voornaam', tussenvoegsel = '$tv', achternaam = '$achternaam', `email` = '$email', `telefoonnummer` = $telefoon, idproducten = $pakket, betaald = '$betaald', `datumbetaald` = '$betaaldatum' WHERE idklanten = $id";
                //            echo $sql;
                if ($db->query($sql)) {
                    header('Location:changeklant.php');
                }
                $db->close();
            }
        }
    }
} else{
    header('Location: login.php');
}
