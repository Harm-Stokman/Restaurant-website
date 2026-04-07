<?php
session_start();
include_once 'includes/pdo.php';

if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == "true") {
} else {
    header("Location: login.php");
}

if (isset($_POST["toevoegen"])) {

   $sql = "INSERT INTO gerechten (gerechtnaam, ingrediënten, prijs) VALUES (?, ?, ?)";

    $addStatement = $pdo->prepare($sql);

    $addStatement->bindParam(1, $_POST["gerechtnaam"]);
    $addStatement->bindParam(2, $_POST["ingrediënten"]);
    $addStatement->bindParam(3, $_POST["prijs"]);
    $addStatement->execute();

    echo "<div> Het gerecht is toegevoegd. </div>";

    // echo $_POST["gerechtnaam"];
    // echo $_POST["ingrediënten"];
    // echo $_POST["prijs"];
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerecht toevoegen</title>
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"
        rel="stylesheet" />
    <script src="scripts/defer.js"></script>
</head>

<body>
    <form class="admin-form" action="adminadd.php" method="post">
        <label>Vul hier het gerechtnaam in.</label>
        <input class="input-field" type="text" name="gerechtnaam" placeholder="Gerechtnaam">
        <label>Vul hier de ingrediënten in.</label>
        <input class="input-field" type="text" name="ingrediënten" placeholder="Ingrediënten">
        <label>Vul hier de prijs van het gerecht in.</label>
        <input class="input-field" type="number" name="prijs" placeholder="Prijs" step="0.01">
        <div>
            <a href="admin.php"><site-button>Terug</site-button></a>
            <input type="submit" name="toevoegen" value="Toevoegen">
        </div>
    </form>
</body>

</html>