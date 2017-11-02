<?php
$r = '';
// Required field names
$required = array('field1', 'field2', 'field3', 'field4');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
    if (empty($_POST[$field])) {
        $error = true;
    }
}
if ($error) {
    $r .= "Niet alle velden zijn ingevuld";
}else{
    $r .= "succesvol verstuurd u ontvangt een email";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kras Hosting</title>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <script src="../js/main.js" defer></script>
    <style>
        h1{
            font-size: 40px;
            color: black;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="banner">
        <img class="banner" src="../img/banner.gif">
    </div>
    <nav id="nav">
        <a class="link" href="../index.php">Home</a>
        <a class="link" href="../pages/pakketten.php">Package</a>
        <a class="link" href="../pages/contact.php">Contact</a>
        <a class="link" href="about.php">About Us</a>
    </nav>
    <div id="plaats"></div>
    <div class="form-style-6">
        <h1>Stel uw pakket samen</h1>
        <form action="custom.php" method="post">
            <input type="text" name="field1" placeholder="Aantal GB (min 15)*" >
            <input type="text" name="field2" placeholder="Aantal domeinen (min 2)*" >
            <input type="text" name="field3" placeholder="Bandbreedte*" >
            <input type="text" name="field4" placeholder="SSL certificaat (ja of nee)*" >

            <input id="submit" type="submit" value="Send" >
            <?php echo $r; ?>
        </form>
    </div>
</div>
</body>
</html>