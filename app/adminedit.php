<?php

session_start();
include_once 'includes/pdo.php';


if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == "true") {
} else {
    header("Location: login.php");
}
 

if (isset($_GET["id"])) {
$nameStatement = $pdo->prepare("SELECT * FROM gerechten
WHERE id = ?"); 
$nameStatement->bindParam(1, $_GET["id"]);
$nameStatement->execute();
} else {
$nameStatement = $pdo->prepare("SELECT * FROM gerechten
WHERE id = ?"); 
$nameStatement->bindParam(1, $_POST["id"]);
$nameStatement->execute();
}
$result= $nameStatement->fetch();


if (isset($_POST["opslaan"])) {

$id = $result['id'];
$naam = $_POST['editgerechtnaam'];
$ingrediënt = $_POST['editingrediënten'];
$prijs = $_POST['editprijs'];

$saveStatement = $pdo->prepare("UPDATE gerechten 
SET gerechtnaam =  ?, ingrediënten = ?, prijs = ?
WHERE id =  $id");
$saveStatement->bindParam(1, $naam);
$saveStatement->bindParam(2, $ingrediënt);
$saveStatement->bindParam(3, $prijs);
$saveStatement->execute();
header("Location: admin.php");

// echo "Gerecht bewerkt, ga terug om de aanpassingen te zien.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerecht bewerken</title>
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"
        rel="stylesheet" />
    <script src="scripts/defer.js"></script>
</head>

<body>
    <form class="admin-form" action="adminedit.php" method="post">
        <input class="input-field" type="hidden" name="id" value="<?php echo $result['id'] ?>">
        <label>Vul hier het gerechtnaam in.</label>
        <input class="input-field" type="text" name="editgerechtnaam" placeholder="Gerechtnaam" value="<?php echo $result['gerechtnaam'] ?>">
        <label>Vul hier de ingrediënten in.</label>
        <input class="input-field" type="text" name="editingrediënten" placeholder="Ingrediënten" value="<?php echo $result['ingrediënten'] ?>">
        <label>Vul hier de prijs van het gerecht in.</label>
        <input class="input-field" type="text" name="editprijs" placeholder="Prijs" value="<?php echo $result['prijs'] ?>">
        <div>
            <a href="admin.php"><site-button>Terug</site-button></a>
            <input type="submit" name="opslaan" value="Opslaan">
        </div>
    </form>

</body>

</html>