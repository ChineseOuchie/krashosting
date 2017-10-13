<?php
$out = $err = '';
session_start();
if (isset($_SESSION['login'])) {
    $out = $_SESSION['login'];
    $out .= '<br>';
    $out .= '<a href="logindatabase.php?logout=true">Logout</a>';
}
if (isset($_SESSION['err'])){
	$err = $_SESSION['err'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<script src="../js/login.js" async></script>
</head>
<body>
<div id="test"></div>
	<div id="container">
		<form action="logindatabase.php" method="post" enctype="multipart/form-data">
			<input name="email" type="text" placeholder="Email">
			<input name="password" type="password" placeholder="Wachtwoord">
			<input type="submit" value="Login">
		</form>
	</div>
	<!--			popup-->
	<div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
<!--			mail link-->
			<a href="mailto:admin@krashosting.nl?subject=Inloggegevens%20vergeten&body=Beste%20systeembeheerder,%0D%0A%0D%0AIk%20ben%20mijn%20inloggegevens%20vergeten%20en%20heb%203%20keer%20verkeerd%20ingelogd.%20Zou%20u%20mijn%20gevegens%20kunnen%20opzoeken%20en%20deze%20popup%20weg%20kunnen%20halen.%0D%0A%0D%0ANaam:%20'naam'%0D%0AWerk%20email:%20'email'">Email systeembeheerder!</a>
		</div>
	</div>
	<!--			mail link-->
	<a id='email' href="mailto:admin@krashosting.nl?subject=Inloggegevens%20vergeten&body=Beste%20systeembeheerder,%0D%0A%0D%0AIk%20ben%20mijn%20inloggegevens%20vergeten%20en%20heb%203%20keer%20verkeerd%20ingelogd.%20Zou%20u%20mijn%20gevegens%20kunnen%20opzoeken%20en%20deze%20popup%20weg%20kunnen%20halen.%0D%0A%0D%0ANaam:%20'naam'%0D%0AWerk%20email:%20'email'">Email systeembeheerder!</a>
	<?php echo $out;?>

	<!-- dit was om de sessiondestroy te testen -->
<!--	<a href="logindatabase.php?logout=true">Logout</a>-->

	<script>let x = <?php echo $err;?>;</script>
</body>
</html>
