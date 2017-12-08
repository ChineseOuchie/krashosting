<?php
session_start();
if (isset($_SESSION['type'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("config.php");
    $form = $id = '';
    if (isset($_GET) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM producten WHERE idproducten = $id;";
        $res = $db->query($sql);
        while ($row = $res->fetch_assoc()) {
			($row['zichtbaar'] === 'true' ? $checked = 'checked' : $checked = '/');

            $form .= "<label for='zichtbaarheid'>Zichtbaar: </label><br>";
            $form .= "<input id='zichtbaarheid' placeholder='true/false' type='checkbox' name='cheekybox' value='" . $row['zichtbaar'] . "' $checked><br>";
            $form .= "<label for='naam'>Naam: </label><br>";
            $form .= "<input id='naam' placeholder='naam' type='text' name='naam' value='" . $row['naam'] . "' required><br>";
            $form .= "<label for='ppm'>Prijs per maand: </label><br>";
            $form .= "<input id='ppm' placeholder='ppm' type='number' name='ppm' value='" . $row['ppm'] . "' required><br>";
            $form .= "<label for='mb'>Hoeveelheid MB: </label><br>";
            $form .= "<input id='mb' placeholder='mb' type='number' name='mb' value='" . $row['mb'] . "' required><br>";
            $form .= "<label for='ssl'>Ssl certificaat: (TRUE/FALSE)</label><br>";
            $form .= "<input id='ssl' placeholder='ssl' type='text' name='ssl' value='" . $row['ssl'] . "' required><br>";
            $form .= "<label for='domeinen'>Aantal domeinen: </label><br>";
            $form .= "<input id='domeinen' placeholder='domeinen' type='number' name='domeinen' value='" . $row['domeinen'] . "' required><br>";
            $form .= "<label for='bandbreedte'>Hoeveelheid bandbreedte: </label><br>";
            $form .= "<input id='bandbreedte' placeholder='bandbreedte' type='text' name='bandbreedte' value='" . $row['bandbreedte'] . "' required><br>";
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
</head>
<body>
<div>
    <form action="updatedatabase.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
        <?php echo $form; ?>
        <input id="verzenden" type="submit" name="verzenden" value="Verstuur!">
    </form>
</div>
</body>
</html>

