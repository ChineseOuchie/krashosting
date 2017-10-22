<?php
session_start();
include('session.php');
?>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
<h1>Welkom <?php echo $_SESSION['welkom']; ?> bij het Krashosting werknemers panel</h1>
<a href="change.php">Aanpassingen maken</a><br>
<a href = "logout.php">Log uit</a>
</body>

</html>