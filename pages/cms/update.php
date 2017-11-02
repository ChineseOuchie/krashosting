<?php
    include_once("config.php");
    $form = $id = '';
    if (isset($_GET) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM producten WHERE idproducten = $id;";
        $result = $db->query($sql);
        while ($row = $res->fetch_assoc()) {
            $form .= "<label for='naam'>Naam: </label>";
            $form .= "<input id='naam' placeholder='naam' type='text' name='naam' value='" . $row['naam'] . "' required>";
            $form .= "<label for='ppm'>Prijs per maand: </label>";
            $form .= "<input id='ppm' placeholder='ppm' type='number' name='ppm' value='" . $row['ppm'] . "'>";
            $form .= "<label for='mb'>Hoeveelheid MB: </label>";
            $form .= "<input id='mb' placeholder='mb' type='number' name='mb' value='" . $row['mb'] . "'>";
            $form .= "<label for='ssl'>Ssl certificaat: (TRUE/FALSE)</label>";
            $form .= "<input id='ssl' placeholder='ssl' type='text' name='ssl' value='" . $row['ssl'] . "' required>";
            $form .= "<label for='domeinen'>Aantal domeinen: </label>";
            $form .= "<input id='domeinen' placeholder='domeinen' type='number' name='domeinen' value='" . $row['domeinen'] . "' required>";
            $form .= "<label for='bandbreedte'>Hoeveelheid bandbreedte: </label>";
            $form .= "<input id='bandbreedte' placeholder='bandbreedte' type='text' name='bandbreedte' value='" . $row['bandbreedte'] . "'>";
        }
        $db->close();
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

