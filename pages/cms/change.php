<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//session_start();
include_once("config.php");
$pakketten = $contact = $aboutus = '';
$count = 1;
//if (isset($_SESSION) && $_SESSION['admin']){
    $sqlpakketten = 'SELECT * FROM producten';
	$sqlcontact = 'SELECT * FROM sitecontent WHERE pagename = "contact1" OR pagename = "contact2"';
	$sqlaboutus = 'SELECT * FROM sitecontent WHERE pagename = "about us"';

    $respakketten = $db->query($sqlpakketten);
    $rescontact = $db->query($sqlcontact);
    $resaboutus = $db->query($sqlaboutus);
    while($row = $respakketten->fetch_assoc()){
        $pakketten .= '<p>' . $row['naam'] . '<br>';
        $pakketten .= $row['ppm'] . '<br>';
        $pakketten .= $row['mb'] . '<br>';
        $pakketten .= $row['ssl'] . '<br>';
        $pakketten .= $row['domeinen'] . '<br>';
        $pakketten .= $row['bandbreedte'] . '<br>';
        $pakketten .= '<a href="update.php?id=' . $row["idproducten"] . '">Update</a><br>';
        $pakketten .= '<a href="delete.php?id=' . $row["idproducten"] . '">Delete</a></p>';
    }
    while($row = $rescontact->fetch_assoc()){
    	$contact .= 'Content ' . $count .':<br><br>';
    	$contact .= $row['teksten'] . '<br>';
        $contact .= '<a href="updatesitecontent.php?id=' . $row["idsitecontent"] . '">Update</a><br>';
        $contact .= '<a href="delete.php?id=' . $row["idsitecontent"] . '">Delete</a><br><br><br>';
        $count++;
	}
	while($row = $resaboutus->fetch_assoc()){
    	$aboutus .= $row['teksten'] . '<br><br>';
        $aboutus .= '<a href="updatesitecontent.php?id=' . $row["idsitecontent"] . '">Update</a><br>';
        $aboutus .= '<a href="delete.php?id=' . $row["idsitecontent"] . '">Delete</a>';
	}
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kras Hosting</title>
	<style>
		#pakketten, #contact, #aboutus{
			display: none;
		}
	</style>
</head>
<body>
	<h3 id="pakketaanpassen">Klik om pakketten aan te passen:</h3>
	<div id="pakketten">
		<?php echo $pakketten?>
		<a href="insert.html">Add</a>
	</div>
	<h3 id="contactaanpassen">Klik om contact aan te passen:</h3>
	<div id="contact">
        <?php echo $contact?>
	</div>
	<h3 id="aboutusaanpassen">Klik om about us aan te passen:</h3>
	<div id="aboutus">
        <?php echo $aboutus?>
	</div>
<script>
	const pakket = document.getElementById('pakketten');
	const pakketaanpassen = document.getElementById('pakketaanpassen');
	const contact = document.getElementById('contact');
	const contactaanpassen = document.getElementById('contactaanpassen');
	const aboutus = document.getElementById('aboutus');
	const aboutusaanpassen = document.getElementById('aboutusaanpassen');

	pakketaanpassen.addEventListener('click', pakketshow);
	contactaanpassen.addEventListener('click', contactshow);
	aboutusaanpassen.addEventListener('click', aboutusshow);

	function pakketshow() {
		pakket.style.display = 'block';
		contact.style.display = 'none';
		aboutus.style.display = 'none';
    }
    function contactshow() {
		pakket.style.display = 'none';
		contact.style.display = 'block';
		aboutus.style.display = 'none';
    }
    function aboutusshow() {
		pakket.style.display = 'none';
		contact.style.display = 'none';
		aboutus.style.display = 'block';
    }
</script>
</body>
</html>

