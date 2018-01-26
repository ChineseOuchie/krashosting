<?php
session_start();
if (isset($_SESSION['type'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("config.php");
    $form = $id = '';
    if (isset($_GET) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM klanten WHERE idklanten = $id;";
        $res = $db->query($sql);
        while ($row = $res->fetch_assoc()) {
			($row['betaald'] === 'true' ? $checked = 'checked' : $checked = '/');
			$pakket = $row['idproducten'];
			$selected1 = $selected2 = $selected3 = $selected4 = '';
            if ($pakket == 1){
                $selected1 = 'selected';
            }elseif ($pakket == 2){
                $selected2 = 'selected';
            }elseif ($pakket == 3){
                $selected3 = 'selected';
            }elseif ($pakket == 4){
                $selected4 = 'selected';
            }

            $form .= "<label for='naam'>Voornaam: </label><br>";
            $form .= "<input id='naam' placeholder='voornaam' type='text' name='voornaam' value='" . $row['voornaam'] . "' required><br>";
            $form .= "<label for='tv'>Tussenvoegsel: </label><br>";
            $form .= "<input id='tv' placeholder='tussenvoegsel' type='text' name='tv' value='" . $row['tussenvoegsel'] . "'><br>";
            $form .= "<label for='achternaam'>Achternaam: </label><br>";
            $form .= "<input id='achternaam' placeholder='achternaam' type='text' name='achternaam' value='" . $row['achternaam'] . "' required><br>";
            $form .= "<label for='email'>Email: </label><br>";
            $form .= "<input id='email' placeholder='email' type='email' name='email' value='" . $row['email'] . "' required><br>";
            $form .= "<label for='telefoonnummer'>Telefoonnummer: </label><br>";
            $form .= "<input id='telefoonnummer' placeholder='telefoonnummer' type='text' name='telefoon' value='" . $row['telefoonnummer'] . "' required><br>";
            $form .= "<label for='pakket'>Pakket: </label>";
            $form .= "<select id='pakket' name='pakket'>";
		    $form .= "<option value='1' $selected1>Starter</option>";
		    $form .= "<option value='2' $selected2>Basic</option>";
		    $form .= "<option value='3' $selected3>Advanced</option>";
		    $form .= "<option value='4' $selected4>Custom</option>";
	        $form .= "</select><br>";
            $form .= "<label for='betaald'>Betaald: </label><br>";
            $form .= "<input id='betaald' placeholder='true/false' type='checkbox' name='betaald' value='" . $row['betaald'] . "' $checked><br>";
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
    <form action="updateklantdb.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
        <?php echo $form; ?>
        <input id="verzenden" type="submit" name="verzenden" value="Verstuur!">
    </form>
</div>
</body>
</html>

