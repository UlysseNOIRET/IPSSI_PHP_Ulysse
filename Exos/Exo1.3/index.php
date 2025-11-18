<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
 
<h1>Choisissez un nombre</h1>

<form method="POST" action="index.php">
    <label for="boucle">Nombre</label>
    <input type="text" id="boucle" name="boucle" placeholder="Nombre">
   
    <button type="submit">Envoyer</button>
</form>
 <?php
 
$boucle = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $boucle = $_POST['boucle'];
}
 
for ($i = 1; $i <= $boucle; $i++) {
    echo "";  
    for ($j = 1; $j <= $i; $j++) {
    echo "$i";     }
    echo "<br>";
 
}
?>
</body>
</html>


 