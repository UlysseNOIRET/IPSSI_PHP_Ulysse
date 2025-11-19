<?php
require_once("config.php");

$sort = "nom";
if (isset($_GET["sort"])){
    $sort = $_GET["sort"];
}

$order = "desc";
if (isset($_GET["order"])){
    $order = $_GET["order"];
}

$sth = $dbh->prepare("SELECT * FROM jo.100 order by " .$sort. " " .$order);
$sth->execute();

$data = $sth->fetchAll(PDO::FETCH_ASSOC);
echo"<table>
    <thead>
        <tr>
            <th>Nom<a href='http://localhost/IPSSI_PHP_Ulysse/Exo%206/request.php?sort=nom&order=asc'>⬆️</a><a href='http://localhost/IPSSI_PHP_Ulysse/Exo%206/request.php?sort=nom&order=desc'>⬇️</a></th>
            <th>Pays<a href='http://localhost/IPSSI_PHP_Ulysse/Exo%206/request.php?sort=pays&order=asc'>⬆️</a><a href='http://localhost/IPSSI_PHP_Ulysse/Exo%206/request.php?sort=pays&order=desc'>⬇️</a></th>
            <th>Course<a href='http://localhost/IPSSI_PHP_Ulysse/Exo%206/request.php?sort=course&order=asc'>⬆️</a><a href='http://localhost/IPSSI_PHP_Ulysse/Exo%206/request.php?sort=course&order=desc'>⬇️</a></th>
            <th>Temps<a href='http://localhost/IPSSI_PHP_Ulysse/Exo%206/request.php?sort=temps&order=asc'>⬆️</a><a href='http://localhost/IPSSI_PHP_Ulysse/Exo%206/request.php?sort=temps&order=desc'>⬇️</a></th>
        </tr>
    </thead>";
    foreach ($data as $value) {
        echo "<tr>
            <td>".$value["nom"]."</td>
            <td>".$value["pays"]."</td>
            <td>".$value["course"]."</td>
            <td>".$value["temps"]."</td>
        </tr>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
</body>
</html>