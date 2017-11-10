<?php
session_start();
if (isset($_SESSION['type'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("config.php");
    $form = $id = '';
    if (isset($_GET) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];
        $sql = 'SELECT * FROM sitecontent WHERE idsitecontent =' . $id;
        $res = $db->query($sql);
        $count = 1;
        while ($row = $res->fetch_assoc()) {
            $name = "content$id";
            $form .= "<label for='$name'>Content: </label><br>";
            $form .= "<textarea id='$name' name='$name' required>" . $row['teksten'] . "</textarea><br>";
            $count++;
        }
        $db->close();
    }
} else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <style>
        textarea{
            width: 500px;
            height: 300px;
        }
    </style>
</head>
<body>
<div>
    <form action="updatesitecontentdatabase.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
        <?php echo $form; ?>
        <input id="verzenden" type="submit" name="verzenden" value="Verstuur!">
    </form>
</div>
</body>
</html>