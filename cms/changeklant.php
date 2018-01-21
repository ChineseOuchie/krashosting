<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_SESSION['type'])){
    include_once("config.php");
    $out = '';
    $idtype = $_SESSION['type'];
    $sql = 'SELECT * FROM klanten INNER JOIN producten ON klanten.idproducten = producten.idproducten ORDER BY betaald, voornaam, achternaam';
    $res = $db->query($sql);
    while($row = $res->fetch_assoc()){
    	if ($row['betaald'] === 'false'){
    		$betaald = '<span style="color: red"> &#10007</span>';
		}else{
    		$betaald = '<span style="color: lime"> &#10003</span>';
		}
        $out .= '<h3 class="showklant">Klantgegevens: <span>' . $row['voornaam'] . ' ' . $row['achternaam'] . '</span>' . $betaald . '</h3>';
        $out .= '<p class="klantgegevens"><span class="bold">Voornaam: </span>' . $row['voornaam'] . '<br>';
        $out .= '<span class="bold">Tussenvoegsel: </span>' . $row['tussenvoegsel'] . '<br>';
        $out .= '<span class="bold">Achternaam: </span>' .$row['achternaam'] . '<br>';
        $out .= '<span class="bold">Email: </span>' .$row['email'] . '<br>';
        $out .= '<span class="bold">Telefoonnummer: </span>' .$row['telefoonnummer'] . '<br>';
        $out .= '<span class="bold">Aankoopdatum: </span>' .$row['aankoopdatum'] . '<br>';
        $out .= '<span class="bold">Betaald: </span>' .$row['betaald'] . '<br>';
        $out .= '<span class="bold">Datumbetaald: </span>' .$row['datumbetaald'] . '<br><br>';
        $out .= '<span class="showproduct">Productgegevens:</span>';
        $out .= '<span class="productgegevens">';
        $out .= '<span class="bold">Pakkettype: </span>' . $row['naam'] . '<br>';
        $out .= '<span class="bold">MB: </span>' . $row['mb'] . '<br>';
		$out .= '<span class="bold">Ssl ceritficaat: </span>' . $row['ssl'] . '<br>';
		$out .= '<span class="bold">Prijs per maand: </span>' . $row['ppm'] . '<br>';
		$out .= '<span class="bold">Aantal domeinnamen: </span>' . $row['domeinen'] . '<br>';
		$out .= '<span class="bold">Hoeveelheid bandbreedte: 	</span>' . $row['bandbreedte'] . '</span></p>';

//        $out .= $row['datumbetaald'] . '</p>';

    }
} else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kras Hosting</title>
    <link href="../css/cms.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div>
		<input type="text" id="search" placeholder="Search..." title="Voer een naam in">
        <?php echo $out?>
    </div>
    <a href="welcome.php">Terug</a>
<script>
    const showproduct = document.getElementsByClassName('showproduct');
    const showklant = document.getElementsByClassName('showklant');

    //show on click
	for(let i = 0; i < showproduct.length; i++){
	    showproduct[i].addEventListener('click', function() {
            const productgegevens = document.getElementsByClassName('productgegevens')[i];
            if(productgegevens.style.display === 'block'){
                productgegevens.style.display = 'none';
            }else{
                productgegevens.style.display = 'block';
            }
        });
        showklant[i].addEventListener('click', function (){
            const klantgegevens = document.getElementsByClassName('klantgegevens')[i];
            if(klantgegevens.style.display === 'block'){
                klantgegevens.style.display = 'none';
            }else{
                klantgegevens.style.display = 'block';
            }
        });

    }

    //search
	document.getElementById('search').addEventListener('keydown', search);
    function search() {
        const input = document.getElementById("search");
        const filter = input.value.toUpperCase();
        const h3 = document.getElementsByTagName("h3"); //line 50
        for (let i = 0; i < h3.length; i++) {
			let span = h3[i].getElementsByTagName("span")[0];
            if (span.innerHTML.toUpperCase().indexOf(filter) > -1) {
                h3[i].style.display = "block";
            } else {
                h3[i].style.display = "none";

            }
        }
    }
</script>
</body>
</html>

