<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//session_start();
include_once("config.php");
$out = '';
//if (isset($_SESSION) && $_SESSION['admin']){
    $sql = 'SELECT * FROM producten';
    $res = $db->query($sql);
    while($row = $res->fetch_assoc()){
        $out .= '<p>' . $row['naam'] . '<br>';
        $out .= $row['ppm'] . '<br>';
        $out .= $row['mb'] . '<br>';
        $out .= $row['ssl'] . '<br>';
        $out .= $row['domeinen'] . '<br>';
        $out .= $row['bandbreedte'] . '<br>';
        $out .= '<a href="update.php?id=' . $row["idproducten"] . '">Update</a><br>';
        $out .= '<a href="delete.php?id=' . $row["idproducten"] . '">Delete</a></p>';
    }
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kras Hosting</title>
</head>
<body>
	<?php echo $out?>
	<a href="insert.html">Add</a>
</body>
</html>

