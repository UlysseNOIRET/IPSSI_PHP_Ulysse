<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="post" action="./">
        <label>Username : </label>
        <input type="text" name="username"><br/>
 
        <label>Password : </label>
        <input type="password" name="password"><br/>
 
        <input type="submit" value="Valider" name="register">
    </form>
 
    <h1>Connection</h1>
    <form method="post" action="./">
        <label>Username : </label>
        <input type="text" name="username"><br/>
 
        <label>Password : </label>
        <input type="password" name="password"><br/>
 
        <input type="submit" value="Valider" name="connect">
    </form>
</body>
</html>
 
<?php
if (isset($_POST['register'])) {
    if ($_POST['username'] != '' && $_POST['password'] != '') {
        $hash = password_hash($_POST['password'], algo: PASSWORD_DEFAULT);
        $sth = $dbh->prepare( query: 'INSERT INTO `user` (`username`, `password`) VALUES (:username, :password)');
        $sth->execute([
            'username' => $_POST['username'],
            'password' => $hash,
        ]);
        echo "<b>Votre inscription est valide</b>";
    }
}
 
if (isset($_POST['register'])) {
    $stmt = $dbh->prepare(query: "SELECT * FROM user WHERE username = :username");
    $stmt->execute(['username' => $_POST['username']]);
    $user = $stmt->fetch(mode: PDO::FETCH_ASSOC);
 
    if ($user) {
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['username'] = $_POST['username'];
        }
    }
}
if (isset($_POST['connect'])) {
    $stmt = $dbh->prepare(query: "SELECT * FROM user WHERE username = :username");
    $stmt->execute(['username' => $_POST['username']]);
    $user = $stmt->fetch(mode: PDO::FETCH_ASSOC);
 
    if ($user) {
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['username'] = $_POST['username'];
        }
    }
}