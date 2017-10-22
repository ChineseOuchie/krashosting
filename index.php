<?php
$out = '';
$conn = new mysqli('localhost', 'root', 'root', 'krashosting');
$query = 'SELECT * FROM producten';
$res = $conn->query($query);
while($row = $res->fetch_assoc()){
    $gb = $row['mb'] / 1000;

    $out.= '<div class="columns">';
    $out.= '<ul class="price">';
    $out.= '<li class="header">' . ucfirst($row['naam']) . '</li>';
    $out.= '<li class="signupBG">€' . $row['ppm'] . ' / month</li>';
    $out.= '<li>' . $gb . 'GB Storage</li>';
    $out.= '<li>SSL Certificate: ' . ucfirst($row['ssl']) . '</li>';
    $out.= '<li>' . $row['domeinen'] . ' Domains</li>';
    $out.= '<li>' . ucfirst($row['bandbreedte']) . ' Bandwidth</li>';
    $out.= '<li class="signupBG"><a href="#" class="button">Sign Up</a></li>';
    $out.= '</ul>';
    $out.= '</div>';
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kras Hosting</title>
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <script src="js/main.js" defer></script>
</head>
    <body>
        <div class="container">
            <div class="banner">
                <img class="banner" src="img/banner.gif">
            </div>
            <nav id="nav">
                <a class="link active" href="index.php">Home</a>
                <a class="link" href="pages/pakketten.php">Pakketten</a>
                <a class="link" href="pages/contact.php">Contact</a>
                <a class="link" href="pages/about.php">Over Ons</a>
            </nav>
            <article id="artcl1">
                <?php echo $out?>
            </article>
            <div class="pro"><a href="#">Pro/Custom</a></div>
            <div class="slider">
                <div class="nieuws slide">
                    <div class="item">Nieuws Bericht #1</div>
                    <div class="item">Nieuws Bericht #2</div>
                    <div class="item">Nieuws Bericht #3</div>
                    <div class="item">Nieuws Bericht #4</div>
                    <div class="item">Nieuws Bericht #5</div>
                </div>
            </div>
        </div>
    </body>
</html>
