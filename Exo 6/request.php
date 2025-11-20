<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    unset($_SESSION['username']);      
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Session Username</title>
</head>
<body>

<?php
if (!isset($_SESSION['username'])) {
    ?>
    <form method="post">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required>
        <button type="submit">Valider</button>
    </form>
    <?php
}

else {
    echo "<p>Bonjour, <strong>" . htmlspecialchars($_SESSION['username']) . "</strong> !</p>";
    ?>
    <form method="post">
        <button type="submit" name="logout" value="1">Logout</button>
    </form>
<?php
}
?>

</body>
</html>

