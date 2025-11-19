<?php
require_once("config.php");

$sth = $dbh->prepare("select * from jo.100;");
$sth->execute();

$data = $sth->fetchAll(PDO::FETCH_ASSOC);
echo"<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Pays</th>
            <th>Course</th>
            <th>Temps</th>
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

