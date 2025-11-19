<?php
try {
    echo"PHPmyadmin";
    $mysqlClient = new PDO("mysql:host=localhost;dbname=jo;charset=utf8","root","");
} catch (PDOException $e) {
    die ($e->getMessage());
}
?>