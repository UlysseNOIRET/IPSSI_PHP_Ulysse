<?php
require_once("config.php");

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    if ($username != '' && $password != '') {
        $stmt = $dbh->prepare("SELECT * FROM login.user WHERE username = :username");
        $stmt->execute(['username' => $username]);
 
        if ($stmt->rowCount() > 0) {
            $message = "<b>Le nom d'utilisateur existe deja.</b>";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
 
            $sth = $dbh->prepare("INSERT INTO login.user (username, password) VALUES (:username, :password)");
            $sth->execute([
                'username' => $username,
                'password' => $hash,
            ]);
            $message = "<b>Votre inscription est validee.</b>";
        }
    } else {
        $message = "<b>Veuillez remplir tous les champs.</b>";
    }
}
 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    if ($username != '' && $password != '') {
        $stmt = $dbh->prepare("SELECT * FROM login.user WHERE username = :username");
        $stmt->execute(['username' => $username]);
 
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $message = "<b>Connexion reussie.</b>";
            } else {
                $message = "<b>Le mot de passe est incorrect.</b>";
            }
        } else {
            $message = "<b>Le nom d'utilisateur n'existe pas.</b>";
        }
    } else {
        $message = "<b>Veuillez remplir tous les champs.</b>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription et de connexion</title>
</head>
<body>
 
    <h2>Inscription</h2>
    <form method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required>
       
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
       
        <button type="submit" name="register">S'inscrire</button>
    </form>
 
    <h2>Connexion</h2>
    <form method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required>
       
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
       
        <button type="submit" name="login">Se connecter</button>
    </form>
 
    <?php if (isset($message)) { echo "<div>$message</div>"; } ?>
 
</body>
</html>