<?php
	$contact = '';
	include_once('cms/config.php');
	$sqlcontact = 'SELECT * FROM sitecontent WHERE pagename = "contact1" OR pagename = "contact2"';
	$rescontact = $db->query($sqlcontact);
	while($row = $rescontact->fetch_assoc()){
		$contact .= '<p class="info">' . $row['teksten'] . '</p>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kras Hosting</title>
    <link href="../Oud%20website/css/main.css" rel="stylesheet" type="text/css">
    <script src="../Oud%20website/js/main.js" defer></script>
</head>
<body>
<div class="container">
    <div class="banner">
        <img class="banner" src="../Oud%20website/img/banner.gif">
    </div>
    <nav id="nav">
        <a class="link" href="../index.php">Home</a>
        <a class="link" href="../pages/pakketten.php">Package</a>
        <a class="link active" href="../pages/contact.php">Contact</a>
        <a class="link " href="about.php">About Us</a>
    </nav>
    <div>
        <div class="contact">
           <?php echo $contact;?>
        </div>
        <div class="maps"><iframe id="myIframe" src="https://www.mapsdirections.info/nl/maak-een-google-map/map.php?width=100%&height=600&hl=ru&q=Goirkestraat%2C%20Tilburg+(Kras%20Hosting)&ie=UTF8&t=&z=16&iwloc=A&output=embed" frameborder="0" scrolling="no"><a href="https://www.mapsdirections.info/nl/maak-een-google-map/">Maak een Google Map</a> van <a href="https://www.mapsdirections.info/nl/">Nederland Kaart</a></iframe></div><br />
    </div>
</div>
</body>
</html>
