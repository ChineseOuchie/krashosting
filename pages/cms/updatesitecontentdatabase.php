<?php
$id = '';
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("config.php");

if (isset($_POST) && $_SERVER["REQUEST_METHOD"] === "POST"){

    $id = $_GET['id'];
    $content = $_POST['content' . $id];

    $array = array('content' => $content);

    if(isset($content)){
        if(!empty($content)) {

            foreach ($array as $k => $v){
                $$k = $db->real_escape_string($v);
                if (preg_match('/script/', $v)){
                    $v = '';
                }
            }
            $sql = "UPDATE sitecontent SET teksten = '$content' WHERE idsitecontent = $id";
//            echo $sql;
            if ($db->query($sql)) {
                header('Location:change.php');
            }
            $db->close();
        }
    }
}
