<?php
echo"test";
function verifyPassword(string $password) {
 $hasUppercase = false;
 $hasLowercase = false;
 $hasNumber = false;
 $hasSymbol = false;
 // Vérifie chaque caractère du mot de passe
 for ($i = 0; $i < strlen($password); $i++) {
 $caractere = $password[$i];
 // Vérifie si c'est une majuscule
 if (ctype_upper($caractere)) {
 $hasUppercase = true;
 }
 // Vérifie si c'est une minuscule
 if (ctype_lower($caractere)) {
 $hasLowercase = true;
 }
 // Vérifie si c'est un chiffre
 if (ctype_digit($caractere)) {
 $hasNumber = true;
 }
 // Vérifie si c'est un caractère spécial
 if (!ctype_alnum($caractere)) {
 $hasSymbol = true;
 }
 }
 // Vérifie si toutes les conditions sont remplies
 if (strlen($password) > 12 && $hasUppercase && $hasLowercase && $hasNumber && $hasSymbol) {
 return true;
 } else {
 return false;
 }
}