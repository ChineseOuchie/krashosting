<?php
include_once("config.php");
    if(isset($_GET) && $_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
        $sql = "DELETE FROM medewerkers WHERE idmedewerkers = $id";
        if ($db->query($sql)){
            header('Location:change.php');
        }
        $db->close();
    }