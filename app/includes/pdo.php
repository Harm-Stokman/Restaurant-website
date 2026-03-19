<?php 

$host = "db";
$db = "mydatabase";
$user = "user";
$password = "password";
$charset = 'utf8mb4';

$opties = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

//  dsn
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
//  Create the connection
    $pdo = new PDO($dsn, $user, $password, $opties);
//  Succes melding
    // echo "Database connectie gelukt <br/>";
} catch (PDOException $e) {
//  Foutmelding
    echo $e->getMessage();
//  Stop (die)
    die("Sorry. database probleem");
}
?>