<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_SESSION['type'])){
    include_once("config.php");
    $out = '';
    $idtype = $_SESSION['type'];
    $sql = 'SELECT * FROM klanten INNER JOIN producten ON klanten.idproducten = producten.idproducten';
    $res = $db->query($sql);
    while($row = $res->fetch_assoc()){
        $out .= '<h3 class="showklant">Klantgegevens: ' . $row['voornaam'] . ' ' . $row['achternaam'] . '</h3>';
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
		$out .= '<span class="bold">Hoeveelheid bandbreedte: </span>' . $row['bandbreedte'] . '</span></p>';

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
        <?php echo $out?>
    </div>
    <a href="welcome.php">Terug</a>
<script>
    const del = document.getElementsByClassName('delete');
    const showproduct = document.getElementsByClassName('showproduct');
    const showklant = document.getElementsByClassName('showklant');

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

    if (<?php echo $idtype?> == 1){
    }else{
        for (let a = 0; del.length > a; a++){
            del[a].style.visibility = 'hidden';
        }
    }
</script>
</body>
</html>

