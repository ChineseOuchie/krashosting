<?php
include('config.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = $db->query("SELECT voornaam FROM medewerkers WHERE bedrijfsemail = '$user_check'");

$row = $ses_sql->fetch_assoc();

$_SESSION['welkom'] = $row['voornaam'];

if(!isset($_SESSION['login_user'])){
    header("location:login.php");
}