<?php
$id = '';
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("config.php");

if (isset($_POST) && $_SERVER["REQUEST_METHOD"] === "POST"){

    $id = $_GET['id'];
    $content1 = $_POST['content1'];
    $content2 = $_POST['content2'];

    $array = array('content1' => $content1, 'content2' => $content2);

    if(isset($content1, $contentt2)){
        if(!empty($content1) || !empty($content2)) {

            foreach ($array as $k => $v){
                $$k = $db->real_escape_string($v);
                if (preg_match('/script/', $v)){
                    $v = '';
                }
            }
            $sql = "UPDATE producten SET content1 = '$content1', content2 = $content2 WHERE idsitecontent = $id";
            echo $sql;
            if ($db->query($sql)) {
                header('Location:change.php');
            }
            $db->close();
        }
    }
}
