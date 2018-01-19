<?php

session_start();

$cookie = $_GET['cookie'];
setcookie('type', $cookie, mktime(0, 0, 0, 0, 0, 69), "/");

header('location:../../index.php');