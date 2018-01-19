<?php
session_start();
if (isset($_SESSION['type'])) {
	include('session.php');
} else{
    header('Location: login.php');
}
?>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
<h1>Welkom <?php echo $_SESSION['welkom']; ?> bij het Krashosting werknemers panel</h1>
<a href= "change.php">Aanpassingen maken</a><br>
<a href= "addklant.php">Klant toevoegen</a><br>
<a href= "logout.php">Log uit</a>
</body>

</html>