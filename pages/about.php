<?php
	$aboutus = '';
	include_once('cms/config.php');
	$sqlaboutus = 'SELECT * FROM sitecontent WHERE pagename = "about us"';
	$resaboutus = $db->query($sqlaboutus);
	while($row = $resaboutus->fetch_assoc()){
		$aboutus .= $row['teksten'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kras Hosting</title>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="initial-scale=1">
    <script src="../js/main.js" defer></script>
</head>
<body>
<body>
    <div class="container">
        <div class="banner">
            <img class="banner" src="../img/banner.gif">
        </div>
        <nav id="nav">
            <a class="link" href="../index.php">Home</a>
            <a class="link" href="../pages/pakketten.php">Package</a>
            <a class="link" href="../pages/contact.php">Contact</a>
            <a class="link active" href="about.php">About Us</a>
        </nav>
    <div>
        <div class="about_img_container">
            <img src="../img/hoofd1.jpg" class="about_img">
            <img src="../img/hoofd2.jpg" class="about_img">
        </div>
        <div class="about">
            <p class="info_about">
			<?php echo $aboutus;?>
            </p>
        </div>
    </div>
</body>
</html>
