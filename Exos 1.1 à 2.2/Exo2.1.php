<?php

function calcMoy(array $nombres) {
    if (count($nombres) === 0) {
        return null;
    }
    return array_sum($nombres) / count($nombres);
}

$moyenne = null;

if (isset($_POST['notes'])) {
    $notes = array_filter($_POST['notes'], fn($n) => $n !== "");
    $notes = array_map('floatval', $notes);
    $moyenne = calcMoy($notes);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calcul de moyenne</title>
</head>
<body>

<h2>Entrer vos notes</h2>
<form method="post">
    <label>Note 1 : <input type="number" name="notes[]"></label><br><br>
    <label>Note 2 : <input type="number" name="notes[]"></label><br><br>
    <label>Note 3 : <input type="number" name="notes[]"></label><br><br>
    <label>Note 4 : <input type="number" name="notes[]"></label><br><br>

    <button type="submit">Calculer la moyenne</button>
</form>

<?php if ($moyenne !== null): ?>
    <h3>La moyenne est : <?= number_format($moyenne, 2) ?></h3>
<?php endif; ?>

</body>
</html>
