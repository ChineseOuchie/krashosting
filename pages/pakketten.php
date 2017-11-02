<?php
$out = '';
$conn = new mysqli('localhost', 'root', 'root', 'krashosting');
$query = 'SELECT * FROM producten';
$res = $conn->query($query);
while($row = $res->fetch_assoc()){
    $gb = $row['mb'] / 1000;
    $ssl = $row['ssl'];
    if($ssl === 'TRUE'){
        $ssl = 'Yes';
    }else{
        $ssl = 'No';
    }

    $out .= '<div class="columns2">';
    $out .= '<ul class="price">';
    $out .= '<li class="header">' . ucfirst($row['naam']) . '</li>';
    $out .= '<li class="grey">€' . $row['ppm'] . ' / month</li>';
    $out .= '<li>' . $gb . 'GB Storage</li>';
    $out .= '<li>SSL Certificate: ' . $ssl . '</li>';
    $out .= '<li>' . $row['domeinen'] . ' Domains</li>';
    $out .= '<li>' . ucfirst($row['bandbreedte']) . ' Bandwidth</li>';
    $out .= '<li class="grey"><a href="#" class="buttonPakketten">Sign Up</a></li>';
    $out .= '</ul>';
    $out .= '</div>';
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kras Hosting</title>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <script src="../js/main.js" defer></script>
</head>
<body>
<div class="container">
    <div class="banner">
        <img class="banner" src="../img/banner.gif">
    </div>
    <nav id="nav">
        <a class="link" href="../index.php">Home</a>
        <a class="link active" href="../pages/pakketten.php">Package</a>
        <a class="link" href="../pages/contact.php">Contact</a>
        <a class="link" href="about.php">About Us</a>
    </nav>
    <article id="artcl1">
        <?php echo $out?>
        <div class="columns2">
            <ul class="price">
                <li class="header">Custom</li>
                <li class="grey">$ 9.99 / year</li>
                <li>10GB Storage</li>
                <li>10 Emails</li>
                <li>10 Domains</li>
                <li>1GB Bandwidth</li>
                <li class="grey"><a href="custom.php" class="buttonPakketten">Sign Up</a></li>
            </ul>
        </div>
    </article>
</div>
</body>
</html>
