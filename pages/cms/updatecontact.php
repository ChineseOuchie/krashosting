<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("config.php");
$form = $id = '';
if (isset($_GET) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $sql = 'SELECT * FROM sitecontent WHERE pagename = "contact' . $id . '"';
    $res = $db->query($sql);
    $count = 1;
    while ($row = $res->fetch_assoc()) {
        $name = "content$id";
        $form .= "<label for='$name'>Content $id: </label><br>";
        $form .= "<textarea id='$name' name='$name' required>" . $row['teksten'] . "</textarea><br>";
        $count++;
    }
    $db->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <style>
        textarea{
            width: 400px;
            height: 100px;
        }
    </style>
</head>
<body>
<div>
    <form action="updatecontactdatabase.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
        <?php echo $form; ?>
        <input id="verzenden" type="submit" name="verzenden" value="Verstuur!">
    </form>
</div>
</body>
</html>