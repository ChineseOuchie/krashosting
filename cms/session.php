<?php
session_start();
if (isset($_SESSION['type'])) {
    include('config.php');

    $user_check = $_SESSION['login_user'];

    $ses_sql = $db->query("SELECT voornaam FROM medewerkers WHERE bedrijfsemail = '$user_check'");

    $row = $ses_sql->fetch_assoc();

    $_SESSION['welkom'] = $row['voornaam'];

    if (!isset($_SESSION['login_user'])) {
        header("location:login.php");
    }
} else{
    header('Location: login.php');
}