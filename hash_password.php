<?php

require 'vendor/autoload.php';

use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;

// Demande du mot de passe à hacher
echo "Please enter the password to hash: ";
$password = trim(fgets(STDIN));

$hasherFactory = new PasswordHasherFactory([
    'common' => ['algorithm' => 'bcrypt'],
]);

$hasher = $hasherFactory->getPasswordHasher('common');
$hashedPassword = $hasher->hash($password);

echo "Hashed password: $hashedPassword\n";
