<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once("config.php");
$out = '';
if (isset($_SESSION['type'])){
    $idtype = $_SESSION['type'];
    $sql = 'SELECT * FROM klanten INNER JOIN producten ON klanten.idproducten = producten.idproducten';
    $res = $db->query($sql);
    while($row = $res->fetch_assoc()){
        $out .= '<h3 id="showklant">Klantgegevens: ' . $row['voornaam'] . ' ' . $row['achternaam'] . '</h3>';
        $out .= '<p id="klantgegevens"><span class="bold">Voornaam: </span>' . $row['voornaam'] . '<br>';
        $out .= '<span class="bold">Tussenvoegsel: </span>' . $row['tussenvoegsel'] . '<br>';
        $out .= '<span class="bold">Achternaam: </span>' .$row['achternaam'] . '<br>';
        $out .= '<span class="bold">Email: </span>' .$row['email'] . '<br>';
        $out .= '<span class="bold">Telefoonnummer: </span>' .$row['telefoonnummer'] . '<br>';
        $out .= '<span class="bold">Aankoopdatum: </span>' .$row['aankoopdatum'] . '<br>';
        $out .= '<span class="bold">Betaald: </span>' .$row['betaald'] . '<br>';
        $out .= '<span class="bold">Datumbetaald: </span>' .$row['datumbetaald'] . '<br><br>';
        $out .= '<span id="showproduct">Productgegevens:</span>';
        $out .= '<span id="productgegevens"></span>';
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
    const showproduct = document.getElementById('showproduct');
    const showklant = document.getElementById('showklant');

    if (<?php echo $idtype?> == 1){

    }else{
        for (let a = 0; del.length > a; a++){
            del[a].style.visibility = 'hidden';
        }
    }
    showproduct.addEventListener('click', productshow);
    showklant.addEventListener('click', klantshow);
    function productshow() {
        const productgegevens = document.getElementById('productgegevens');
        if(productgegevens.style.display === 'block'){
            productgegevens.style.display = 'none';
        }else{
            productgegevens.style.display = 'block';
        }
    }
    function klantshow() {
        const klantgegevens = document.getElementById('klantgegevens');

        if(klantgegevens.style.display === 'block'){
            klantgegevens.style.display = 'none';
        }else{
            klantgegevens.style.display = 'block';
        }
    }
</script>
</body>
</html>

