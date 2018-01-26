<?php
session_start();
if (isset($_SESSION['type']) && $_SESSION['type'] === '1') {

    include_once("config.php");
    if(isset($_GET) && $_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
        $sql = "DELETE FROM klanten WHERE idklanten = $id";
        if ($db->query($sql)){
            header('Location:changeklant.php');
        }
        $db->close();
    }
} else{
    header('Location: login.php');
}