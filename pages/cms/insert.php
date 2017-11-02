<?php
    include_once("config.php");
    if (isset($_POST) && $_SERVER["REQUEST_METHOD"] === "POST"){

        $naam = $_POST['naam'];
        $ppm = $_POST['ppm'];
        $mb = $_POST['mb'];
        $ssl = $_POST['ssl'];
        $domeinen = $_POST['domeinen'];
        $bandbreedte = $_POST['bandbreedte'];

        if(isset($naam, $ppm, $mb, $ssl, $domeinen, $bandbreedte)){
            if(!empty($naam) || !empty($ppm) || !empty($mb) || !empty($ssl) || !empty($domeinen) || !empty($bandbreedte)) {
                $sql = "INSERT INTO medewerkers (naam, mb, ssl, ppm, domeinen, bandbreedte) VALUES ('$naam', '$mb', $ssl, '$ppm', '$domeinen', '$bandbreedte')";
                if ($db->query($sql)) {
                    header('Location:change.php');
                }
                $db->close();
            }
        }
    }