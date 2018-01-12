<?php
	include_once('cms/config.php');
	session_start();
	$aboutus = $out = '';
	$lang = 'nl';
	if (isset($_GET['lang']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
			$lang = $_SESSION['lang'] = $_GET['lang'];
 	}
	if (isset($_SESSION['lang'])){
        $lang = $_SESSION['lang'];
    }
	if (isset($_GET['taal']) && !empty($_GET['taal']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
		$taal = $_GET['taal'];
		if ($taal === 'nl'){
			$taal = '';
			$_SESSION['taal'] = 'nl';
		}elseif ($taal === 'en'){
			$taal = '_en';
			$_SESSION['taal'] = 'en';
		}else{
			$taal = '';
		}
	}
	if (isset($_SESSION['taal'])){
		$script = '<script>const refresh = false;</script>';
	}else{
		$script = '<script>const refresh = true;</script>';
	}
	$conn = new mysqli('localhost', 'root', 'root', 'krashosting');
	$querypakketten = 'SELECT * FROM producten';
	$queryaboutus = 'SELECT * FROM sitecontent WHERE pagename = "about us"';

	$respakketten = $conn->query($querypakketten);
	$resaboutus = $db->query($queryaboutus);

	while($row = $respakketten->fetch_assoc()){
		($row['zichtbaar'] === 'true' ? $visible = 'flex' : $visible = 'none');
		$gb = $row['mb'] / 1000;
		$ssl = $row['ssl'];
		($ssl === 'TRUE' ? $ssl = 'Yes' : $ssl = 'No');

		$out .= '<div style="display:' . $visible . '" id="pakket" class="columns">';
		$out .= '<ul class="price">';
		$out .= '<li class="header">' . ucfirst($row['naam']) . '</li>';
		$out .= '<li class="grey">€' . $row['ppm'] . ' / month</li>';
		$out .= '<li>' . $gb . 'GB Storage</li>';
		$out .= '<li>SSL Certificate: ' . $ssl . '</li>';
		$out .= '<li>' . $row['domeinen'] . ' Domains</li>';
		$out .= '<li>' . ucfirst($row['bandbreedte']) . ' Bandwidth</li>';
		$out .= '<li class="grey"><a href="#" class="buttonPakketten">Sign Up</a></li>';
		$out .= '<li class="grey"><div id="' . $row['naam'] . '" class="buttonPakketten">Detail</a></li>';
		$out .= '</ul>';
		$out .= '</div>';
	}
	while($row = $resaboutus->fetch_assoc()){
		$aboutus .= '<p>' . $row['teksten' . $taal] . '</p>';
	}
	$conn->close();
//	session_destroy();
?>
<!DOCTYPE html>
<html lang="<?php echo $lang?>">
<head>
    <title>Krashosting</title>
    <meta name="viewport" content="initial-scale=1">
    <meta name="description" content="Krashosting">
    <meta name="author" content="Joey Lau">
	<?php echo $script;?>
    <script src="js/smoothscroll.js" type="text/javascript" defer></script>
    <script src="js/main.js" type="text/javascript" defer></script>
    <script src="js/domeincheck.js" type="text/javascript" defer></script>
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet">
    <link href="css/nav.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
		<div id="vertalen">
			<div id="nederlands"></div>
			<div id="engels"></div>
		</div>
        <div class="mobile-nav" id="mobile-nav">
            <ul>
                <li><a href="#home" id="m_home">Home</a></li>
                <li><a href="#pakketten" id="m_pakketten">Pakketten</a></li>
                <li><a href="#nieuws" id="m_nieuws">Nieuwsbericht</a></li>
                <li><a href="#over_ons" id="m_over_ons">Over Ons</a></li>
                <li><a href="#contact" id="m_contact">Contact</a></li>
            </ul>
        </div>
        <header>
            <div class="header-position">
                <div class="logo"></div>
                <nav class="menu">
                    <ul>
                        <li><a href="#home" id="scroll_home">Home</a></li>
                        <li><a href="#pakketten" id="scroll_pakketten">Pakketten</a></li>
                        <li><a href="#nieuws" id="scroll_nieuws">Nieuwsbericht</a></li>
                        <li><a href="#over_ons" id="scroll_over_ons">Over Ons</a></li>
                        <li><a href="#contact" id="scroll_contact">Contact</a></li>
                    </ul>
                </nav>
                <a href="#" class="copyright"></a>
                <div class="mobile-nav-toggle" id="mobile-nav-toggle"><span></span></div>
            </div>
        </header>
        <div class="content">
            <div class="banner top home">
                <div id="slidercontainer"></div>
            </div>
            <div class="domainCheck">
                <form action="" method="post" class="domaincheck">
                    <input id="domeincheck" type="text" title="Check your domain here" name="domain" placeholder=" Check hier voor een domeinnaam">
                    <input type="submit" name="submited" title="Check domain" value="CHECK">
                    <div class="domaincheck_msg"><span class="msg"></span><span class="icon"></span></div>
                </form>
            </div>
            <div class="pakketten" class="item">
                 <?php echo $out;?>
            </div>
<!--            <div id="extraStarter" class="extra">starter</div>-->
<!--            <div id="extraBasic" class="extra">basic</div>-->
<!--            <div id="extraAdvanced" class="extra">advanced</div>-->
<!--            <div id="custom">Bel ons of Mail ons voor een custom pakket</div>-->

            <div id="extraStarter" class="extra"><h2>Starter pakket</h2><br>
                <p class="extrainfo">Dit pakket is om een simpele webpagina te beginnen waarin alle informatie gezien kan worden.<br>
                    Dan zit u met het starter pakket helemaal goed. Een mooi pakket voor een standaard lage prijs.</p>
            </div>
            <div id="extraBasic" class="extra"><h2>Basic pakket</h2><br>
                <p>Dit pakket is  meer bedoeld voor portfolio's.<br>
                    Dit pakket is zeer goed voor het laten zien in je website van foto's/projecten. Lekker veel opslag.</p>
            </div>
            <div id="extraAdvanced" class="extra"><h2>Advanced pakket</h2><br>
                <p>Dit pakket is bedoeld voor bijvoorbeeld een grote webshop.<br>
                    Een envoudig pakket met super veel MB's. Perfect voor mensen die niet van stoppen weten.</p>
            </div>

            <div class="nieuws">
                <div class="slider">
                    <div class="bericht">
                        <h1 class="title">Title</h1>
                        <p class="nieuwsinfo">dit is een nieuws bericht en hier moeten de items in. hbjlkasdfkhas`dglfhkjahf`c</p>
                        <a href="#">Lees meer</a>
                    </div>
                    <div class="bericht">
                        <h1 class="title">Title</h1>
                        <p class="nieuwsinfo">dit is een nieuws bericht en hier moeten de items in. hbjlkasdfkhas`dglfhkjahf`c</p>
                        <a href="#">Lees meer</a>
                    </div>
                    <div class="bericht">
                        <h1 class="title">Title</h1>
                        <p class="nieuwsinfo">dit is een nieuws bericht en hier moeten de items in. hbjlkasdfkhas`dglfhkjahf`c</p>
                        <a href="#">Lees meer</a>
                    </div>
                </div>
            </div>
            <div class="over_ons">
                <div class="hoofden">
                    <img class="hoofd" src="img/hoofd1.jpg" alt="foto1">
                    <img class="hoofd" src="img/hoofd2.jpg" alt="foto1">
                </div>
                <div class="info">
                    <?php echo $aboutus;?>
				</div>
            </div>
            <div class="contact">
                <form action="/message_send.html">
                    <label id="naamvoor" for="voornaam">Voornaam</label>
                    <input type="text" id="voornaam" name="firstname" placeholder="Voornaam...">

                    <label id="naamachter" for="achternaam">Achternaam</label>
                    <input type="text" id="achternaam" name="lastname" placeholder="Achternaam...">

                    <label id="werponder" for="onderwerp">Onderwerp</label>
                    <select id="onderwerp" name="onderwerp">
                        <option id="kiesoptie" value="Kies een optie">Kies een optie...</option>
                        <option id="custompakket" value="Custom pakket">Custom pakket</option>
                        <option id="algemeeninfo" value="Algemene informatie">Algemene informatie</option>
                        <option id="betaalinfo" value="Anders namelijk...">Betaal informatie</option>
                    </select>
                    <label id="ichtber" for="bericht">Bericht</label>
                    <textarea id="bericht" name="bericht" placeholder="Plaats uw bericht..." style="height:200px"></textarea>

                    <input id="submit" type="submit" value="Verzenden">
                </form>
            </div>
            <div class="maps"></div>
            <div class="footer"></div>
        </div>
    </div>
</body>
</html>