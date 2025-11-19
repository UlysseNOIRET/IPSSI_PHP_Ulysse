<!DOCTYPE html>
<html>
<head>
    <title>Inversion de chaîne de caractères</title>
    <meta charset="UTF-8">
</head>
<body>

<h1>Inversion de chaîne de caractères</h1>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="original_string">Entrez une chaîne de caractères :</label>
    <input type="text" id="original_string" name="original_string" required>
    <button type="submit">Inverser</button>
</form>

<?php
function my_strrev(string $string): string {
    $length = strlen($string);
    $reversed_string = '';

    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed_string .= $string[$i];
    }

    return $reversed_string;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $original_string = $_POST["original_string"];

    if (!empty($original_string)) {
        $reversed_string = my_strrev($original_string);

        echo "<p>Chaîne originale : " . htmlspecialchars($original_string) . "</p>";
        echo "<p>Chaîne inversée : " . htmlspecialchars($reversed_string) . "</p>";
    } else {
        echo "<p>Veuillez entrer une chaîne de caractères.</p>";
    }
}
?>
</body>
</html>

