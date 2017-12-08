<?php
	$out = '';
	$conn = new mysqli('localhost', 'root', 'root', 'krashosting');
	$query = 'SELECT * FROM producten';
	$res = $conn->query($query);
	while($row = $res->fetch_assoc()){
		($row['zichtbaar'] === 'true' ? $visible = 'block' : $visible = 'none');
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
		$out .= '</ul>';
		$out .= '</div>';
	}
	$conn->close();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Krashosting</title>
    <meta name="viewport" content="initial-scale=1">
    <meta name="description" content="Krashosting">
    <meta name="author" content="Joey Lau">
    <script src="js/smoothscroll.js" type="text/javascript" defer></script>
    <script src="js/main.js" type="text/javascript" defer></script>
    <script src="js/domeincheck.js" type="text/javascript" defer></script>
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet">
    <link href="css/nav.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="mobile-nav" id="mobile-nav">
            <ul>
                <li><a href="#home" id="m_home">Home</a></li>
                <li><a href="#pakketten" id="m_pakketten">Pakketten</a></li>
                <li><a href="#nieuws" id="m_nieuwsbericht">Nieuwsbericht</a></li>
                <li><a href="#over_ons" id="m_over_ons">Over Ons</a></li>
                <li><a href="#contact" id="m_contact">Contact</a></li>


            </ul>
        </div>
        <header>
            <div class="header-position">
                <nav class="menu">
                    <ul>
                        <li><a href="#home" id="scroll_home">Home</a></li>
                        <li><a href="#pakketten" id="scroll_pakketten">Pakketten</a></li>
                        <li><a href="#nieuws" id="scroll_nieuws">Nieuwsbericht</a></li>
                        <li><a href="#over_ons" id="scroll_over_ons">Over Ons</a></li>
                        <li><a href="#contact" id="scroll_contact">Contact</a></li>
                    </ul>
                </nav>
                <div class="mobile-nav-toggle" id="mobile-nav-toggle"><span></span></div>
            </div>
        </header>
        <div class="content">
            <div class="banner top home">
                <div id="slidercontainer"></div>
            </div>
            <div class="domainCheck">
                <form action="" method="post" class="domaincheck">
                    <input type="text" title="Check your domain here" name="domain" placeholder=" Check hier voor een domeinnaam">
                    <input type="submit" name="submited" title="Check domain" value="CHECK">
                    <div class="domaincheck_msg"><span class="msg"></span><span class="icon"></span></div>
                </form>
            </div>
            <div class="pakketten" class="item">
                 <?php echo $out;?>
            </div>
            <div class="nieuws">
                <div class="slider">
                    <div class="bericht">d</div>
                    <div class="bericht">d</div>
                    <div class="bericht">d</div>
                    <div class="bericht">d</div>
                    <div class="bericht">d</div>
                </div>
            </div>
            <div class="over_ons">
                <div class="hoofden">
                    <img class="hoofd" src="img/hoofd1.jpg" alt="foto1">
                    <img class="hoofd" src="img/hoofd2.jpg" alt="foto1">
                </div>
                <div class="info">trtgs</div>
            </div>
            <div class="contact">contact</div>
            <div class="maps"></div>
            <div class="footer"></div>
        </div>
    </div>
</body>
</html>