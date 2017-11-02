<?php
$id = '';
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("config.php");

if (isset($_POST) && $_SERVER["REQUEST_METHOD"] === "POST"){

    $id = $_GET['id'];
    $naam = $_POST['naam'];
    $ppm = $_POST['ppm'];
    $mb = $_POST['mb'];
    $ssl = $_POST['ssl'];
    $domeinen = $_POST['domeinen'];
    $bandbreedte = $_POST['bandbreedte'];

    $array = array('naam' => $naam, 'ppm' => $ppm, 'mb' => $mb, 'ssl' => $ssl, 'domeinen' => $domeinen, 'bandbreedte' => $bandbreedte);

    if(isset($naam, $ppm, $mb, $ssl, $domeinen, $bandbreedte)){
        if(!empty($naam) || !empty($ppm) || !empty($mb) || !empty($ssl) || !empty($domeinen) || !empty($bandbreedte)) {

            foreach ($array as $k => $v){
                $$k = $db->real_escape_string($v);
                if (preg_match('/script/', $v)){
                    $v = '';
                }
            }
            $sql = "UPDATE producten SET naam = '$naam', mb = '$mb', `ssl` = '$ssl', ppm = $ppm, domeinen = $domeinen, bandbreedte = '$bandbreedte' WHERE idproducten = $id";
            echo $sql;
            if ($db->query($sql)) {
                header('Location:change.php');
            }
            $db->close();
        }
    }
}
