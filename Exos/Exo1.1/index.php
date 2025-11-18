<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire age</title>
</head>
<body>

    <h1>Quelle est votre age</h1>
    <form method="post">
        <label for="age">Age :</label>
        <input type="text" id="age" name="age" required>
        <br><br>
        <button type="submit">Envoyer</button>
    </form>

    <?php
    function school($age) {
        if ($age < 3) {
        return "creche";
        }
        if ($age < 6) {
        return "maternelle";
        }
        if ($age < 11) {
        return "primaire";
        }
        if ($age < 16) {
        return "collège";
        }
        if ($age < 18) {
        return "lycée";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $age = intval($_POST["age"]);
        $resultat = school($age);
        echo "<h2>Vous devez aller à : <strong>$resultat</strong></h2>";
    }
    ?>
</body>
</html>